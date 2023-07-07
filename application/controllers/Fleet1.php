<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class fleet extends CI_Controller {

    function __construct() {
        parent::__construct();

        // To load the CI benchmark and memory usage profiler - set 1==1.
        if (1 == 2) {
            $sections = array(
                'benchmarks' => TRUE, 'memory_usage' => TRUE,
                'config' => FALSE, 'controller_info' => FALSE, 'get' => FALSE, 'post' => FALSE, 'queries' => FALSE,
                'uri_string' => FALSE, 'http_headers' => FALSE, 'session_data' => FALSE
            );
            $this->output->set_profiler_sections($sections);
            $this->output->enable_profiler(TRUE);
        }

        // Load required CI libraries and helpers.

        $this->load->helper('form');

        // IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded! 
        // It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
        $this->auth = new stdClass;

        // Load 'standard' flexi auth library by default.
        $this->load->library('flexi_auth');

        // Check user is logged in as an admin.
        // For security, admin users should always sign in via Password rather than 'Remember me'.
        if (!$this->flexi_auth->is_logged_in_via_password() || !$this->flexi_auth->is_admin()) {
            // Set a custom error message.
            $this->flexi_auth->set_error_message('You must login as an admin to access this area.', TRUE);
            $this->session->set_flashdata('error', $this->flexi_auth->get_messages());
            redirect('auth');
        }


        // Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
        $this->load->vars('menu_nevigation', 'fleetgr');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }



    public function addfleet(){

        if ($this->input->post('submit')) {
            $errorUploadType='';
            $form_data = $this->input->post();
            $form_data['puchase_date'] = convertToMySQLDate($form_data['puchase_date']);
            $form_data['tax_date'] = convertToMySQLDate($form_data['tax_date']);
            $form_data['challan_due_date'] = convertToMySQLDate($form_data['challan_due_date']);
            $form_data['fitness_due_date'] = convertToMySQLDate($form_data['fitness_due_date']);

            $form_data['status'] = 1;

            $form_data['permit_due_yr'] = convertToMySQLDate($form_data['permit_due_yr']);
            $form_data['pollution_due_date'] = convertToMySQLDate($form_data['pollution_due_date']);
            
            $form_data['emi_due_date'] = convertToMySQLDate($form_data['emi_due_date']);
            $form_data['permit_due_for_yr'] = convertToMySQLDate($form_data['permit_due_for_yr']);            
            $form_data['insurence_due_date'] = convertToMySQLDate($form_data['insurence_due_date']);
            $form_data= array_diff_key($form_data, array('submit'=>''));
            $form_data['added_on'] = date("Y-m-d h:i:s");

           // Upload Document
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
               $uploadData=array(); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                    
                    if (!is_dir('uploaded_files/fleet_document/'.$form_data['fleet_id_desc'])) {
                        mkdir('uploaded_files/fleet_document/'.$form_data['fleet_id_desc'], 0777, true);
                    }
                    $uploadPath = 'uploaded_files/fleet_document/'.$form_data['fleet_id_desc'];
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 

                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                            $uploadData[$i] = $fileData['file_name'].'/'.date("Y-m-d H:i:s");
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 

                    $form_data = array_diff_key($form_data, array('files'=>''));
                    $form_data['document_details'] = implode('|',$uploadData);
                    $settle_id = $this->functions->insert_into_table('tbl_master_vehicle', $form_data);                    
                    // Upload status message 
                    $statusMsg = $settle_id?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 

	                    if($settle_id && empty($errorUploadType)){
	                    	$this->session->set_flashdata('success', 'Fleet data and Files uploaded successfully');
	                    } elseif(!empty($statusMsg)){
	                    	$this->session->set_flashdata('info', array('Data and '.$statusMsg));
	                    }
                        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
                        redirect(base_url().'fleet/editfleet/'.$settle_id,$this->data);

                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            } else { 
                $settle_id = $this->functions->insert_into_table('tbl_master_vehicle', $form_data); 
					if($settle_id){
						$this->session->set_flashdata('success', 'Data Added successfully');
					}
                $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
                redirect(base_url().'fleet/editfleet/'.$settle_id,$this->data);                                
            } 
           // End 
         } else {
                $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
                $this->load->view('fleet/add_fleet',$this->data);
            }
    }

    public function editfleet($id){

        if ($this->input->post('submit')) {
            $form_data = $this->input->post();

            $form_data['puchase_date'] = convertToMySQLDate($form_data['puchase_date']);
            $form_data['tax_date'] = convertToMySQLDate($form_data['tax_date']);
            $form_data['challan_due_date'] = convertToMySQLDate($form_data['challan_due_date']);
            $form_data['fitness_due_date'] = convertToMySQLDate($form_data['fitness_due_date']);
            $form_data['status'] = 1;
            $form_data['permit_due_yr'] = convertToMySQLDate($form_data['permit_due_yr']);
            $form_data['pollution_due_date'] = convertToMySQLDate($form_data['pollution_due_date']);
            $form_data['emi_due_date'] = convertToMySQLDate($form_data['emi_due_date']);
            $form_data['permit_due_for_yr'] = convertToMySQLDate($form_data['permit_due_for_yr']);            
            $form_data['insurence_due_date'] = convertToMySQLDate($form_data['insurence_due_date']);
            $form_data= array_diff_key($form_data, array('submit'=>''));
            
           // Upload Document
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 

                 $rs = $this->db->select('fleet_id_desc, document_details')->where('vehicle_id', $id)->get('tbl_master_vehicle')->row();
                 $file = explode('|', $rs->document_details);
                for($i = 0; $i < $filesCount; $i++){ 
                	$statusMsg='';
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 

                    if (!is_dir('uploaded_files/fleet_document/'.$form_data['fleet_id_desc'])) {
                        mkdir('uploaded_files/fleet_document/'.$form_data['fleet_id_desc'], 0777, true);
                    }

                     
                    $uploadPath = 'uploaded_files/fleet_document/'.$form_data['fleet_id_desc']; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size']             = 500000; 
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    if (file_exists('uploaded_files/fleet_document/'.$form_data['fleet_id_desc'].'/'.$_FILES['file']['name']))
                     { 
                        unlink('uploaded_files/fleet_document/'.$form_data['fleet_id_desc'].'/'.$_FILES['file']['name']);
                     }


                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 

                         foreach ($file as $key => $value) {
                            $get_file = explode('/', $value);
                            if($get_file[0] == $fileData['file_name']){
                                unlink('uploaded_files/fleet_document/'.$form_data['fleet_id_desc'].'/'.$get_file[0]);
                                unset($file[$key]);            
                            }
                         }
                         $file[] = $fileData['file_name'].'/'.date("Y-m-d H:i:s"); 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($file)){ 
                    // Insert files data into the database 
                    $form_data = array_diff_key($form_data, array('files'=>''));
                    $form_data['document_details'] = implode('|',$file);
                   $result = $this->functions->update_table_rows('tbl_master_vehicle', 'vehicle_id', $id, $form_data); 
                    // Upload status message 
                    $statusMsg = $settle_id?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 

	                    if($result){
	                    	$this->session->set_flashdata('success', 'Data uploaded successfully');
	                    }/* elseif(!empty($statusMsg)){
	                    	$this->session->set_flashdata('info', 'Data and '.$statusMsg));
	                    } elseif($result && empty($statusMsg)){
	                    	$this->session->set_flashdata('message', 'Fleet data and Files uploaded successfully');
	                    }*/

                        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
                        redirect(base_url().'fleet/editfleet/'.$id,$this->data);

                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            } else { 
                $result = $this->functions->update_table_rows('tbl_master_vehicle', 'vehicle_id', $id, $form_data);
				if($result){
					$this->session->set_flashdata('success', 'Data Updated successfully');
				}
                $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
                redirect(base_url().'fleet/editfleet/'.$id,$this->data);                                
            } 
           // End 
         }   
        $this->data['fleetdetails'] = $this->functions->get_row_id_based('tbl_master_vehicle', 'vehicle_id', $id); 
         
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
        $this->load->view('fleet/edit_fleet',$this->data);
    }


    public function viewfleet(){
        $this->data['fleet'] = $this->functions->get_all_row('tbl_master_vehicle'); 
        $this->load->view('fleet/view_fleet', $this->data);
    }

    public function overdue(){

        $dt = date('Y-m-d');
        $this->data['fleet_due'] = $this->functions->get_fleet_overdue($dt); 
        $this->load->view('fleet/overdue', $this->data);
    }

    public function driversettlement(){
        if ($this->input->post('createbill')) {
            $data1 = $this->input->post('settlement');
            $tmpArr = array();
            $settle_id='';
            $dataInsertUpdate = array();
            $dataInsert = $this->input->post();
            $dataInsert['settle_date'] = convertToMySQLDate($dataInsert['settle_date']);
            $dataInsert['settle_create_date'] = convertToMySQLDate($dataInsert['settle_create_date']);
            $dataInsert['added_on'] = date("Y-m-d h:i:s");
            $dataInsert = array_diff_key($dataInsert, array('settlement'=>'', 'createbill'=>''));
            
            $dataInsert['grand_total']= $dataInsert['gross_salary'] + $dataInsert['previous'] + $dataInsert['duty'];

            $settle_id = $this->functions->insert_into_table('settlement_driver', $dataInsert);
            if($settle_id){
            foreach($data1['settle_date'] as $key => $value) {
                $tmpArr['settle_id_fk']       = $settle_id;
                $tmpArr['settle_date']        = $data1['settle_date'][$key];
                //$tmpArr['vechile_id_fk']      = $data1['vechile_id_fk'][$key];
                $vid = explode('_', $data1['vechile_id_fk'][$key]);

				$tmpArr['vechile_id_fk']      = $vid[0];
                $tmpArr['sgr_id_fk']          = $vid[1];
                $tmpArr['settle_destination'] = $data1['settle_destination'][$key];
                $tmpArr['settle_freight']     = $data1['settle_freight'][$key];
                $tmpArr['settle_advance']     = $data1['settle_advance'][$key];
                $tmpArr['settle_green_tax']   = $data1['settle_green_tax'][$key];
                $tmpArr['settle_tol_tax']     = $data1['settle_tol_tax'][$key];
                $tmpArr['settle_legal']       = $data1['settle_legal'][$key];
                $tmpArr['settle_dala']        = $data1['settle_dala'][$key];
                $tmpArr['settle_diesel']      = $data1['settle_diesel'][$key];
                $tmpArr['settle_maintanence'] = $data1['settle_maintanence'][$key];
                $tmpArr['settle_balance']     = $data1['settle_balance'][$key]; 
                $tmpArr['added_on'] = date("Y-m-d h:i:s");               
                $this->functions->insert_into_table('settlement_history', $tmpArr);
                $update_settle_data = array('settle_id_fk' =>$settle_id, 'settement_status'=>1);
                $this->functions->update_table_rows('settlement_gr', 'sgr_id', $vid[1], $update_settle_data);
                }
               } 
         }  
        $this->data['freight_methods'] = $this->functions->get_all_active_row('tbl_master_freight_method');
        $this->data['items'] = $this->functions->get_all_active_row('tbl_master_item');
        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
        $this->load->view('fleet/driver_settlement', $this->data);
    }

    public function settlementreport(){

        if (!empty($this->input->post('search'))) {
            $data = $this->input->post();
            if(!empty($data['driver_id_fk'])){
                $this->db->where('driver_id_fk', $data['driver_id_fk']);                
            }
            if (!empty($data['from_date'])) {
                $this->db->where('settle_date >=', convertToMySQLDate($data['from_date']));
            }
            if (!empty($data['to_date'])) {
                $this->db->where('settle_date <=', convertToMySQLDate($data['to_date']));
            }
            if (!empty($data['settle_number'])) {
                $this->db->where('settle_number', $data['settle_number']);
            }            
         }   

        $this->data['driver_settle'] = $this->db->get('settlement_driver')->result();
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
        $this->load->view('fleet/settlement_report', $this->data);
    }


   public function get_driver_details(){
        $driver_id = $this->input->post('driver_id');
        $returnval = $this->function_library->FindDriverDetails($driver_id);
        $vechile_option = '<option value="">- Select -</option>';
        $wh_query = array(
            'driver_id_fk' => $driver_id,
            'settement_status' =>0,
            'settle_id_fk'=>0
        );
        $get_gr_vechile = $this->db->select('sgr_id, vehicle_id_fk')->where($wh_query)->get('settlement_gr')->result();
        $vechile_data = array();
        $gr = array();
        foreach($get_gr_vechile as $key => $value){
         $rs = $this->db->where('vehicle_id', $value->vehicle_id_fk)->get('tbl_master_vehicle')->row();   
         $vechile_option .= '<option value="'.$rs->vehicle_id.'_'.$value->sgr_id.'">'.$rs->fleet_no.' (GR-'.$value->sgr_id.')</option>';
        }
        $ajax_data = array(
            'driver' => $returnval,
            'fleet_opt' => $vechile_option
        );
        echo json_encode($ajax_data);
   } 

   public function del_document(){
     $vehicle_id = $this->input->post('id');
     $filename = $this->input->post('filename');
     $rs = $this->db->select('document_details')->where('vehicle_id', $vehicle_id)->get('tbl_master_vehicle')->row();

     $file = explode('|', $rs->document_details);
     $file_array_count = count($file);
     foreach ($file as $key => $value) {
        $get_file = explode('/', $value);
        if($get_file[0] == $filename){
            unset($file[$key]);            
        }
     }
    $file_array_count1 = count($file);

     if($file_array_count > $file_array_count1){
        $ins_data = array(
            'document_details'=>implode('|', $file)
        );
     }
     $rs = $this->db->where('vehicle_id', $vehicle_id)->update('tbl_master_vehicle', $ins_data);
          if ($rs) {
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Deleted";
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
   }

   public function get_gr_details(){
    $gr_no = $this->input->post('grno');
    $gr_no = explode('_', $gr_no);
    $rs = $this->db->where('sgr_id', $gr_no[1])->get('settlement_gr')->row_array();
    $rs['desti'] = $this->function_library->FindStation($rs['to_station_fk']);
    $rs['gr_data'] = $rs;
    echo json_encode($rs);
   }


  function delete_fleet(){
        $fleetid = $this->input->post('id');

        $response = $this->db->where('vehicle_id', $fleetid)->delete('tbl_master_vehicle');
        if ($response) {
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Deleted";
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
     }


  function delete_settle(){
        $fleetid = $this->input->post('id');

        $response = $this->db->where('settle_id', $fleetid)->delete('settlement_driver');
        $settlet_gr_id = $this->db->select('sgr_id_fk')->where('settle_id_fk', $fleetid)->get('settlement_history')->result();
        $response_his = $this->db->where('settle_id_fk', $fleetid)->delete('settlement_history');
        $gr_list = array();
        foreach($settlet_gr_id as $key => $value){
                $gr_list[] = $value->sgr_id_fk;
        }
        $ins_data = array(
                    'settle_id_fk'=>0,
                    'settement_status'=>0
                );
        $rs = $this->db->where_in('sgr_id', $gr_list)->update('settlement_gr', $ins_data);
        if ($response && $response_his) {
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Deleted";
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
     }

  function print_settle($id){
        $data['settlement'] = $this->db->where('settle_id', $id)->get('settlement_driver')->row();
        $data['settlement_history'] = $this->db->where('settle_id_fk', $id)->get('settlement_history')->result();
        $this->load->view('fleet/print_settlement', $data);
     }


}

