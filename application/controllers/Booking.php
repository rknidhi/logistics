<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

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
        $this->load->vars('menu_nevigation', 'bookinggr');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function index() {
      /*  if (!$this->flexi_auth->is_privileged('Create GR')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }*/
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');

            if (!empty($this->input->post('gr_no'))) {
                $data['bgr_id'] = $this->input->post('gr_no');
            } else {
                $data['bgr_id'] = $this->functions->next_id('booking_gr');
            }
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['status'] = 1;
            $data['added_on'] = date("Y-m-d h:i:s");
            $data['gr_date'] = !empty($data['gr_date']) ? system_date($data['gr_date']) : NULL;
            $data['invoice_date'] = !empty($data['invoice_date']) ? system_date($data['invoice_date']) : NULL;
            $data['payment_date'] = !empty($data['payment_date']) ? system_date($data['payment_date']) : NULL;
            $data['e_way_bill_date'] = !empty($data['e_way_bill_date']) ? system_date($data['e_way_bill_date']) : NULL;

            // Modified by Rakesh Dated: 29/07/19
            $gr_no_data = $this->input->post('gr_no');
            $gr_data['loading_ch'] = $data['item_loading_ch'];
            $gr_data['unloading_ch'] = $data['item_unloading_charges'];
            $gr_data['detention_net_amount'] = $data['item_detention_ch'];
            $gr_data['truck_freight'] = $data['item_booking_freight_rate'];
            $result = $this->functions->update_table_rows('challan_dispatch', 'gr_no_fk', $gr_no_data, $gr_data);
            // End


            // Modified by Rakesh Dated: 09-08-19
            $data1 = $this->input->post('data_gr');
            foreach($this->input->post('data_gr')['item_ft_method'] as $key => $value)
            {
                $insData = array();
                $insData['bgr_id']                 = $data['bgr_id'];
                $insData['item_ft_method']         = $data1['item_ft_method'][$key];
                $insData['item_qty']               = $data1['item_qty'][$key];
                $insData['item_name_fk']           = $data1['item_name_fk'][$key];
                $insData['item_method_of_pack_fk'] = $data1['item_method_of_pack_fk'][$key];
                $insData['item_weight']            = $data1['item_weight'][$key];
                $insData['item_weight_ch']         = $data1['item_weight_ch'][$key];
                $this->functions->insert_into_table('tbl_gr_items', $insData);
            }
            // End

            $bgr_id = $this->functions->insert_into_table('booking_gr', $data);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $bgr_id;
            $activites['activity_type'] = 'Booking';
            $activites['action'] = 'added';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added booking.';
            $activites['module'] = 'booking';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($bgr_id) {
                $this->session->set_flashdata('success', 'Booking GR Created Successfully.');
                if ($this->input->post('submit') == 'Print') {
                    redirect('booking/edit/' . $bgr_id . '/TRUE');
                } else {
                    redirect('booking/edit/' . $bgr_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('booking');
            }
        }
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->data['stations'] = $this->functions->get_all_active_row('tbl_master_station');
        $this->data['vehicles'] = $this->functions->get_all_active_row('tbl_master_vehicle');
        $this->data['freight_methods'] = $this->functions->get_all_active_row('tbl_master_freight_method');
        $this->data['items'] = $this->functions->get_all_active_row('tbl_master_item');
        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['delivery_modes'] = $this->functions->get_all_active_row('tbl_master_delivery_mode');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['brokers'] = $this->functions->get_all_active_row('tbl_master_broker');

        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver');        

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');

        $this->load->view('booking/create_gr', $this->data);
    }


    
    
    function get_party() {
        $party_id = $this->input->post('party_id');
        echo $this->function_library->party_details($party_id);
    }

    function delete_gr() {
/*        if (!$this->flexi_auth->is_privileged('Delete GR')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }*/
        $bgr_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('booking_gr', 'bgr_id', $bgr_id);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $bgr_id;
        $activites['activity_type'] = 'Booking';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted booking.';
        $activites['module'] = 'booking';
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

    function view() {
        if (!$this->flexi_auth->is_privileged('View GR')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['booking_grs'] = $this->db
                        ->select('bgr_id,consignor_id_fk,consignee_id_fk,from_station_fk,to_station_fk,gr_type,gr_date,branch_id_fk')
                        ->order_by('bgr_id', 'DESC')->get('booking_gr')->result();
        $this->load->view('booking/view_gr', $this->data);
    }

    function printgr($bgr_id) {
        $this->data['booking_gr'] = $grd =  $this->functions->get_single_row('booking_gr', 'bgr_id', $bgr_id);

//        $driver_name = $this->functions->get_all_row('challan_dispatch');

        $this->data['bgr_items'] = $this->functions->get_all_row_id_based('tbl_gr_items', 'bgr_id', $bgr_id);
        $this->load->view('booking/print_gr', $this->data);
    }

    function edit($bgr_id, $doprint = FALSE) {
        if (!$this->flexi_auth->is_privileged('Edit GR')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['doprint'] = $doprint;
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['gr_date'] = !empty($data['gr_date']) ? system_date($data['gr_date']) : NULL;
            $data['invoice_date'] = !empty($data['invoice_date']) ? system_date($data['invoice_date']) : NULL;
            $data['payment_date'] = !empty($data['payment_date']) ? system_date($data['payment_date']) : NULL;
            $data['e_way_bill_date'] = !empty($data['e_way_bill_date']) ? system_date($data['e_way_bill_date']) : NULL;
            if (empty($data['cancelled_gr']))
                $data['cancelled_gr'] = '';


            // Modified by Rakesh Dated: 29/07/19
/*             $gr_no_data = $this->input->post('gr_no');
            $gr_data['loading_ch'] = $data['item_loading_ch'];
            $gr_data['unloading_ch'] = $data['item_unloading_charges'];
            $gr_data['detention_net_amount'] = $data['item_detention_ch'];
            $gr_data['truck_freight'] = $data['item_booking_freight_rate'];
            $result = $this->functions->update_table_rows('challan_dispatch', 'gr_no_fk', $gr_no_data, $gr_data); */
            // End


            // Modified by Rakesh Dated: 10/08/19
            $data1 = $this->input->post('data_gr');

            foreach($this->input->post('data_gr')['item_ft_method'] as $key => $value)
            {
                $insData = array();
                $insData['bgr_id']                 = $bgr_id;
                $insData['item_ft_method']         = $data1['item_ft_method'][$key];
                $insData['item_qty']               = $data1['item_qty'][$key];
                $insData['item_name_fk']           = $data1['item_name_fk'][$key];
                $insData['item_method_of_pack_fk'] = $data1['item_method_of_pack_fk'][$key];
                $insData['item_weight']            = $data1['item_weight'][$key];
                $insData['item_weight_ch']         = $data1['item_weight_ch'][$key];

                $this->functions->insert_into_table('tbl_gr_items', $insData);
            }
            // End            

            $result = $this->functions->update_table_rows('booking_gr', 'bgr_id', $bgr_id, $data);
            
            // Update Challan/Bill Party Name Dated: 14-10-19
            $gr_no_data = $this->input->post('gr_no');
            $challangr_details = $this->functions->get_single_row('booking_gr', 'bgr_id', $gr_no_data);

                if($challangr_details->freight_by == 'Consignee'){
                    $pay_party_name= $challangr_details->consignee_id_fk;
                } 
                if($challangr_details->freight_by == 'Consignor'){
                    $pay_party_name= $challangr_details->consignor_id_fk;
                }
                if($challangr_details->freight_by == 'Third Party'){
                $pay_party_name= $challangr_details->thirdparty_id_fk;
                }

            $fetch_party =  $this->functions->get_single_row('tbl_master_party', 'party_id', $pay_party_name);

            $challan_data['booking_party'] = $fetch_party->party_name." (".$fetch_party->city.")";
            $update_challan = $this->functions->update_table_rows('challan_dispatch', 'gr_no_fk', $gr_no_data, $challan_data);

            $get_bill_no =  $this->functions->get_single_row_colum('book_billing', 'gr_nos', 'billing_id', $challangr_details->bill_number);

            $get_bill_no = explode(',',$get_bill_no);
            $ftmsg='';
            $ftmsg1 ='';
            if(count($get_bill_no)<2){
                $bill_data['bill_to'] = $fetch_party->party_name." (".$fetch_party->city.")";
                $bill_data['bill_to_id'] = $pay_party_name; 
                $update_bill_party = $this->functions->update_table_rows('book_billing', 'billing_id', $challangr_details->bill_number, $bill_data);
                if($update_bill_party){
                    $ftmsg = " and Billing party";
                }
            }
            else {
                $get_bill_no1 = array_diff($get_bill_no, array($gr_no_data));
                $ftmsg1 = " This GR bill merges with these GRs (".implode(',',$get_bill_no1).")";
            }                
            // End
            
            
            
            
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $bgr_id;
            $activites['activity_type'] = 'Booking';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated booking.';
            $activites['module'] = 'booking';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($result) {
                $this->session->set_flashdata('success', "GR$ftmsg Updated Successfully.$ftmsg1");
                if ($this->input->post('submit') == 'Print') {
                    redirect('booking/edit/' . $bgr_id . '/TRUE');
                } else {
                    redirect('booking/edit/' . $bgr_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('booking/edit/' . $bgr_id);
            }
        }

        $this->data['booking_gr'] = $booking_gr = $this->functions->get_single_row('booking_gr', 'bgr_id', $bgr_id);
        if (empty($booking_gr)) {
            redirect('booking');
        }
        
        // Special
        $dispid='';
        $lhc = $this->functions->get_all_row_id_based('challan_dispatch', 'delivery_status', 'Delivered');
        foreach($lhc as $lhcrow){
            $grs = $lhcrow->gr_no_fk .','. $lhcrow->gr_no_inc;
            $grs = explode(',',$grs);
            $grs = array_filter($grs);
            if(in_array($bgr_id, $grs)){
                $dispid = $lhcrow->cdispatch_id;
                break;
            }
        }
        if(!empty($dispid)){
            $this->data['deliverydetails'] = $deliverydetails =  $this->functions->get_all_row_id_based('tbl_delevery', 'lhc_number', $dispid);
        }
        // End Special
    
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->data['stations'] = $this->functions->get_all_active_row('tbl_master_station');
        $this->data['vehicles'] = $this->functions->get_all_active_row('tbl_master_vehicle');
        $this->data['freight_methods'] = $this->functions->get_all_active_row('tbl_master_freight_method');
        $this->data['items'] = $this->functions->get_all_active_row('tbl_master_item');
        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['delivery_modes'] = $this->functions->get_all_active_row('tbl_master_delivery_mode');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['brokers'] = $this->functions->get_all_active_row('tbl_master_broker');
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver');    

        // Modified by Rakesh Dated 09-08-19
            $this->data['gr_items'] = $this->functions->get_all_row_id_based('tbl_gr_items','bgr_id', $bgr_id);
        // End
        $this->load->view('booking/edit_gr', $this->data);
    }


// Moidified by Rakesh Dated: 05-08-19
    public function checkGR()
    {
      $gr_no = $this->input->post('gr_no');  
      $resulst =  $this->functions->check_duplicate_value_in_col('booking_gr','bgr_id', $gr_no);
      if($resulst)
      {
        $data_arr['status'] ='fail';
        $data_arr["status_message"] = "GR Already exists.";
        echo json_encode($data_arr);
      } 
    }

// Moidified by Rakesh Dated: 05-08-19
    public function checkGR1()
    {
      $gr_no = $this->input->post('gr_no');  
      $resulst =  $this->functions->check_duplicate_value_in_col('settlement_gr','sgr_id', $gr_no);
      if($resulst)
      {
        $data_arr['status'] ='fail';
        $data_arr["status_message"] = "GR Already exists.";
        echo json_encode($data_arr);
      } 
    }


// Modified by rakesh Dated: 08-08-19
   public function edit_gr_items($bgr_id)
   {
    $this->data['gr_items1'] = $this->functions->get_row_id_based('tbl_gr_items','item_id', $bgr_id);
    $this->data['freight_methods'] = $this->functions->get_all_active_row('tbl_master_freight_method');
    $this->data['items'] = $this->functions->get_all_active_row('tbl_master_item');
    $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
    $this->load->view('booking/edit_gr_items', $this->data);
    //$this->load->view('booking/edit_gr_items');
    
   }

 // Modified by rakesh Dated: 10-08-19
 public function del_gr_items()
{
    $item_id = $this->input->post('id');
    $response = $this->functions->delete_single_row('tbl_gr_items', 'item_id', $item_id);
    //FOR ACTIVIES LOG
    $activites['user_id'] = $this->flexi_auth->get_user_id();
    $activites['activity_id'] = $item_id;
    $activites['activity_type'] = 'GR Item details';
    $activites['action'] = 'deleted';
    $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted inward.';
    $activites['module'] = 'Booking';
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


public function update_gr_items($item_id)
{
    $data = $this->input->post('data');
    $response = $this->functions->update_table_rows('tbl_gr_items', 'item_id', $item_id, $data);
    //FOR ACTIVIES LOG
    // Modified by Rakesh Dated: 09-09-19
    $rowS = $this->functions->get_single_row('tbl_gr_items', 'item_id', $item_id);
    $noR = $this->functions->get_num_rows('tbl_gr_items', 'bgr_id', $rowS->bgr_id);
    if($noR==1){
        $grData['item_booking_freight_rate'] = $data['item_weight'] * $data['item_weight_ch'];
        $res = $this->functions->update_table_rows('booking_gr', 'bgr_id', $rowS->bgr_id, $grData);
    }
    // End
    $activites['user_id'] = $this->flexi_auth->get_user_id();
    $activites['activity_id'] = $item_id;
    $activites['activity_type'] = 'Inward';
    $activites['action'] = 'updated';
    $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated GR Items.';
    $activites['module'] = 'warehouse';
    $activites['created_at'] = date("Y-m-d h:i:s");
    $this->functions->insert_into_table('activities', $activites);
    if ($response) {
        $data_arr["status"] = 'success';
        $data_arr["status_message"] = "Updated";
        echo json_encode($data_arr);
        die;
    } else {
        $data_arr["status"] = 'fail';
        $data_arr["status_message"] = "Try Again";
        echo json_encode($data_arr);
    }
}

    // Modified by Rakesh Dated: 13-08-19
    function viewItems($gr_no)
    {
        $data['item_list'] = $this->functions->get_all_row_id_based('tbl_gr_items', 'bgr_id', $gr_no);
        $this->load->view('booking/gr_items_details', $data);
    }
// End 

 // modified by mkuk
    function grentry(){
        if (!$this->flexi_auth->is_privileged('Create GR')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }

        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');

           // print_r($data); die;
            if (!empty($this->input->post('gr_no'))) {
                $data['sgr_id'] = $this->input->post('gr_no');
            } else {
                $data['sgr_id'] = $this->functions->next_id('settlement_gr');
            }
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['added_on'] = date("Y-m-d h:i:s");
            $data['gr_date'] = !empty($data['gr_date']) ? system_date($data['gr_date']) : NULL;


            $sgr_id = $this->functions->insert_into_table('settlement_gr', $data);
            
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $sgr_id;
            $activites['activity_type'] = 'Settlement Booking';
            $activites['action'] = 'added';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added booking.';
            $activites['module'] = 'booking';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($bgr_id) {
                $this->session->set_flashdata('success', 'Settlement GR Created Successfully.');
                if ($this->input->post('submit') == 'Print') {
                    redirect('booking/grentry_edit/' . $bgr_id . '/TRUE');
                } else {
                    redirect('booking/grentry_edit/' . $bgr_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('booking/grentry');
            }
        }        
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->data['stations'] = $this->functions->get_all_active_row('tbl_master_station');
        $this->data['vehicles'] = $this->functions->get_all_active_row('tbl_master_vehicle');
        $this->data['brokers'] = $this->functions->get_all_active_row('tbl_master_broker');
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
        //$this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['freight_methods'] = $this->functions->get_all_active_row('tbl_master_freight_method');        
        
        $this->load->view('booking/gr_entry', $this->data);
    }



    function edit_grentry($sgr_id, $doprint = FALSE) {
        if (!$this->flexi_auth->is_privileged('Edit GR')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['doprint'] = $doprint;
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['gr_date'] = !empty($data['gr_date']) ? system_date($data['gr_date']) : NULL;

            $result = $this->functions->update_table_rows('settlement_gr', 'sgr_id', $sgr_id, $data);

            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $sgr_id;
            $activites['activity_type'] = 'Booking';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated booking.';
            $activites['module'] = 'booking';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($result) {
                $this->session->set_flashdata('success', "GR$ftmsg Updated Successfully.$ftmsg1");
                if ($this->input->post('submit') == 'Print') {
                    redirect('booking/edit_grentry/' . $sgr_id . '/TRUE');
                } else {
                    redirect('booking/edit_grentry/' . $sgr_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('booking/edit_grentry/' . $sgr_id);
            }
        }

        $this->data['gr_entry'] = $gr_entry = $this->functions->get_single_row('settlement_gr', 'sgr_id', $sgr_id);
        if (empty($gr_entry)) {
            redirect('booking/grentry');
        }

        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->data['stations'] = $this->functions->get_all_active_row('tbl_master_station');
        $this->data['vehicles'] = $this->functions->get_all_active_row('tbl_master_vehicle');
        $this->data['brokers'] = $this->functions->get_all_active_row('tbl_master_broker');
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver'); 
        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['freight_methods'] = $this->functions->get_all_active_row('tbl_master_freight_method');        
        $this->load->view('booking/edit_gr_entry', $this->data);
    }


    function print_gr_new($bgr_id) {
        //echo  $bgr_id; die;
        $this->data['booking_gr'] = $grd =  $this->functions->get_single_row('settlement_gr', 'sgr_id', $bgr_id);
        //$this->load->view('booking/print_gr1');
        $this->load->view('booking/print_gr', $this->data);
    }


    function gr_view() {
        if (!$this->flexi_auth->is_privileged('View GR')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['gr_entry_data'] = $this->db
                        ->select('sgr_id,party_id_fk,from_station_fk,to_station_fk,gr_type,gr_date')
                        ->order_by('sgr_id', 'DESC')->get('settlement_gr')->result();
        $this->load->view('booking/gr_view', $this->data);
    }

function delete_gr_gr() {
        $data_arr = array('test','pest');
        $bgr_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('settlement_gr', 'sgr_id', $bgr_id);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $bgr_id;
        $activites['activity_type'] = 'Booking';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted booking.';
        $activites['module'] = 'booking';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);
        if ($response) {
            $data_arr['status'] = 'success';
            $data_arr['status_message'] = "Deleted";
        } else {
            $data_arr['status'] = 'fail';
            $data_arr['status_message'] = "Try Again";
        }
        echo json_encode($data_arr);
    }

}

