<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {

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
        $this->load->vars('menu_nevigation', 'delivery_receipt');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function index() {
        if (!$this->flexi_auth->is_privileged('View Delivery')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }

        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');
            if (!empty($this->input->post('delevery_no'))) {
                $data['delivery_id'] = $this->input->post('delevery_no');
            } else {
                $data['delivery_id'] = $this->functions->next_id('tbl_delevery');
            }            

            $data['added_on'] = !empty($data['added_on']) ? system_date($data['added_on']) : NULL;
            $dr_id = $this->functions->insert_into_table('tbl_delevery', $data);

            // Update Challan
            $datalhc['delivery_status'] = 'Delivered';
            $lhcno = $data['lhc_number'];
            $res = $this->functions->update_table_rows('challan_dispatch', 'cdispatch_id', $lhcno, $datalhc);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $dr_id;
            $activites['activity_type'] = 'Delivery';
            $activites['action'] = 'added';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added booking.';
            $activites['module'] = 'delivery';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($dr_id) {
                $this->session->set_flashdata('success', "Delevery Created Successfully.");
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('delivery');
            }
        }
        $lhclistarray= array();
        $lhc_list =  $this->functions->get_all_row('tbl_delevery');
        foreach($lhc_list as $loop){
            $lhclistarray[] = $loop->lhc_number;
        }
        if(!empty($lhclistarray)){
            $this->data['dispatch_challans'] = $this->db->select('*')->where_not_in('cdispatch_id', $lhclistarray)->get('challan_dispatch')->result();
        }
        else{
            $this->data['dispatch_challans'] = $this->functions->get_all_row('challan_dispatch');
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('tracking/create_delivery_receipt', $this->data);
    }

    function edit($delivery_id) {
        if (!$this->flexi_auth->is_privileged('Edit GR')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');

            $data['added_on'] = !empty($data['added_on']) ? system_date($data['added_on']) : NULL;
            $dr_id = $this->functions->update_table_rows('tbl_delevery', 'delivery_id', $delivery_id, $data);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $dr_id;
            $activites['activity_type'] = 'Delivery';
            $activites['action'] = 'Delevery';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added booking.';
            $activites['module'] = 'delivery';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($dr_id) {
                $this->session->set_flashdata('success', "Delivery Updated Successfully.");
                redirect('delivery/edit/'. $delivery_id);
            } else {
                $this->session->set_flashdata('message', "Please try again later.");
                redirect('delivery');
            }
        }  
    // Loading
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['delivery_details'] = $tempdata = $this->functions->get_single_row('tbl_delevery', 'delivery_id', $delivery_id);
        $this->data['lhc_details']= $lhc_grnos = $this->functions->get_single_row('challan_dispatch', 'cdispatch_id', $tempdata->lhc_number);
        $grn = $lhc_grnos->gr_no_fk.','.$lhc_grnos->gr_no_inc;
        $this->data['grdetails'] = $grn;
        $this->load->view('tracking/edit_delivery_receipt',$this->data);

    }   
    
    function delete() {
        if (!$this->flexi_auth->is_privileged('Delete LHC')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges";
            echo json_encode($data_arr);
            die;
        }
        $cdispatch_id = $this->input->post('id');
        // Update LHC
            $tempdata = $this->functions->get_single_row('tbl_delevery', 'delivery_id', $cdispatch_id);
            $datalhc['delivery_status'] = 'Pending';
            $res = $this->functions->update_table_rows('challan_dispatch', 'cdispatch_id', $tempdata->lhc_number, $datalhc);
        // End
       $response = $this->functions->delete_single_row('tbl_delevery', 'delivery_id', $cdispatch_id);

        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $cdispatch_id;
        $activites['activity_type'] = 'Delivery';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted challan.';
        $activites['module'] = 'delivery';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);
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

    function view_dr(){
        if (!$this->flexi_auth->is_privileged('View Delivery')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['delivery_details'] =  $this->functions->get_all_row('tbl_delevery');
        $this->load->view('tracking/view_delivery_receipt', $this->data);
    }
    // Ajax 

    public function checkDR()
    {
      $dr_no = $this->input->post('delevery_no');  
      $resulst =  $this->functions->check_duplicate_value_in_col('tbl_delevery','delivery_id', $dr_no);
      if($resulst)
      {
        $data_arr['status'] ='fail';
        $data_arr["status_message"] = "DR Already exists.";
        echo json_encode($data_arr);
      } 
    }


    function fetch_lhc_gr_details(){
        $lhc_no = $this->input->post('lhcno');
        $srno = 1;
        $total_items = 0;
        $total_weight = 0;
        $grlist = '<tr>
        <th>Sr. No.</th>
            <th>GR. No.</th>
            <th>Consignor</th>
            <th>Consignee</th>
            <th>Package</th>
            <th>Quantity</th>
            <th>Weight</th>
            <th>Delivery Type</th>
        </tr>';
        $lhcno1 = array();
        $gr_details = array();
        $this->data['lhc_details'] = $lhc_details1= $this->functions->get_single_row('challan_dispatch', 'cdispatch_id', $lhc_no);
        $this->data['lhc_added_on'] = convertToHumanDate($lhc_details1->added_on);
/*         $this->data['station_from'] = $this->function_library->FindStation($lhc_details1->gr_fromstation);
        $this->data['station_to'] = $this->function_library->FindStation($lhc_details1->gr_tostation); */
        $this->data['station_from'] = $lhc_details1->gr_fromstation;
        $this->data['station_to'] = $lhc_details1->gr_tostation;

        $this->data['vechile'] = $this->function_library->FindVehicle($lhc_details1->vehicle_id_fk);        
        $grn = $lhc_details1->gr_no_fk.','.$lhc_details1->gr_no_inc;
        $lhcno1 = explode(',', $grn);

        $gr_details = $this->db->select('*')
                                ->where_in('bgr_id', $lhcno1)
                                ->get('booking_gr')
                                ->result(); 

          foreach($gr_details as $row){
            $pack_method = ''; 
            $pack_method_name = '';                                 
            $count_items = $this->functions->get_sum_of_column('tbl_gr_items','item_qty','bgr_id',$row->bgr_id);
            $item_weight = $this->functions->get_sum_of_column('tbl_gr_items','item_weight','bgr_id',$row->bgr_id);
            
            $gr_item_data = $this->functions->get_all_row_id_based('tbl_gr_items','bgr_id',$row->bgr_id);
            if(count($gr_item_data)>1){
                foreach($gr_item_data as $item_row){
                    $pack_method_name .= ', '.$this->function_library->FindPackage($item_row->item_method_of_pack_fk);
                }
                $pack_method_name = substr($pack_method_name, 1);
            }
            else{
                $pack_method = $this->functions->get_single_row_colum('tbl_gr_items','item_method_of_pack_fk','bgr_id',$row->bgr_id);
                $pack_method_name = $this->function_library->FindPackage($pack_method);
            }
             $grlist .= '<tr><td>'.$srno.'</td><td>'.$row->bgr_id.'</td><td>'
            . $this->function_library->FindPartyDetails($row->consignor_id_fk)->party_name.'</td><td>'
            .$this->function_library->FindPartyDetails($row->consignee_id_fk)->party_name.'</td><td>'
            .$pack_method_name.'</td><td>'.$count_items.'</td><td>'
            .$item_weight.'</td><td>'.$row->delivery.'</td></tr>'."\n";
            $srno++;                
         } 
         $this->data['grdetails'] = $grlist; 
         echo json_encode($this->data);
    }
    // End

}
