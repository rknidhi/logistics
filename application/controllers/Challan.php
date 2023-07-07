<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Challan extends CI_Controller {

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
            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            redirect('auth');
        }


        // Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
        $this->load->vars('menu_nevigation', 'challan');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function dispatch_challan() {
        if (!$this->flexi_auth->is_privileged('Create LHC')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');

            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['status'] = 1;
            $data['added_on'] = !empty($data['added_on']) ? system_date($data['added_on']) : NULL;
            $data['advance_payment_date'] = !empty($data['advance_payment_date']) ? system_date($data['advance_payment_date']) : NULL;
            $data['balance_payment_date'] = !empty($data['balance_payment_date']) ? system_date($data['balance_payment_date']) : NULL;
            
            // Extract Gr Number
            $grlist = $this->input->post('gr_nos');
            $data['vehicle_id_fk'] = $data['gr_vehicle_no'];
            $data['gr_vehicle_no']= $this->function_library->FindVehicle($data['gr_vehicle_no']);

//            $grlist = explode(',',$this->input->post('gr_nos'));
            $data['gr_no_fk'] =  $grlist[0];
            array_shift($grlist);
            $data['gr_no_inc'] = implode(',',$grlist);
            $cdispatch_id = $this->functions->insert_into_table('challan_dispatch', $data);

            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $cdispatch_id;
            $activites['activity_type'] = 'Challan';
            $activites['action'] = 'added';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added challan.';
            $activites['module'] = 'challan';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($cdispatch_id) {
                $this->session->set_flashdata('success', 'Dispatch Challan Created Successfully.');
                if ($this->input->post('submit') == 'Print') {
                    redirect('challan/edit_dispatch_challan/' . $cdispatch_id . '/TRUE');
                } else {
                    redirect('challan/edit_dispatch_challan/' . $cdispatch_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('challan/dispatch_challan');
            }
        }
        $this->data['stations'] = $this->functions->get_all_active_row('tbl_master_station');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['drivers'] = $this->functions->get_all_row('tbl_master_driver');
        $this->data['brokers'] = $this->functions->get_all_row('tbl_master_broker');
        $this->load->view('challan/dispatch_challan', $this->data);
    }

    function edit_dispatch_challan($cdispatch_id, $doprint = FALSE) {
        if (!$this->flexi_auth->is_privileged('Edit LHC')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['doprint'] = $doprint;
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['added_on'] = !empty($data['added_on']) ? system_date($data['added_on']) : NULL;
            $data['advance_payment_date'] = !empty($data['advance_payment_date']) ? system_date($data['advance_payment_date']) : NULL;
            $data['balance_payment_date'] = !empty($data['balance_payment_date']) ? system_date($data['balance_payment_date']) : NULL;

            // Extract Gr Number
            $grlist = $this->input->post('gr_nos');
            $grlistprev = explode(',',$this->input->post('grlisting')); //previous GR List
            array_merge($grlistprev, $grlist);
            $data['vehicle_id_fk'] = $data['vehicle_id_fk'];
            $data['gr_vehicle_no']= $this->function_library->FindVehicle($data['vehicle_id_fk']);

//            $grlist = explode(',',$this->input->post('gr_nos'));
            $data['gr_no_fk'] =  $grlist[0];
            array_shift($grlist);
            $data['gr_no_inc'] = implode(',',$grlist);

            // Update Advance
           // $this->data['dispatch_challan1'] = $dispatch_challan1 = $this->functions->get_single_row('challan_dispatch', 'cdispatch_id', $cdispatch_id);
          //  $data['advance'] = $data['advance'] + $dispatch_challan1->advance;
            // End

            $result = $this->functions->update_table_rows('challan_dispatch', 'cdispatch_id', $cdispatch_id, $data);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $cdispatch_id;
            $activites['activity_type'] = 'Challan';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated challan.';
            $activites['module'] = 'challan';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($result) {
                $this->session->set_flashdata('success', 'Dispatch Challan Updated Successfully.');
                if ($this->input->post('submit') == 'Print') {
                    redirect('challan/edit_dispatch_challan/' . $cdispatch_id . '/TRUE');
                } else {
                    redirect('challan/edit_dispatch_challan/' . $cdispatch_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('challan/edit_dispatch_challan/' . $cdispatch_id);
            }
        }

        $this->data['dispatch_challan'] = $dispatch_challan = $this->functions->get_single_row('challan_dispatch', 'cdispatch_id', $cdispatch_id);
        if (empty($dispatch_challan)) {
            redirect('challan/view_dispatch_challan');
            die;
        }

        // Generating GR List
        $grValues = $this->functions->get_all_row_id_based('challan_dispatch','gr_no_fk !=','');
        foreach($grValues as $grv){
            $grValues1[] =  $grv->gr_no_fk;
            $grValues1[] =  $grv->gr_no_inc;
        }
        $grValues1 = array_values(array_diff($grValues1,array("null","")));
        $grValues1 = implode(',',$grValues1);
        $grValues1= explode(',',$grValues1);

        $grlist = $this->functions->grlist_for_edit($grValues1, $dispatch_challan->vehicle_id_fk);

        $selectedgr = [];
        $selectedgr = explode(',',$dispatch_challan->gr_no_inc);
        array_push($selectedgr, $dispatch_challan->gr_no_fk);
        $selectedgr = array_values(array_diff($selectedgr,array("null","")));
        $optiongr1='';
        foreach($selectedgr as $optiongr){
            $optiongr1 .= '<option value="'.$optiongr.'" selected>'.$optiongr.'</option>'."\n";
        }
        
        // Special Query for Challan
        
        // $result =  $this->db->query("SELECT link_gr_no, voucher_type, sum(amount) as 'totamount' FROM `payment_history` WHERE billtype = 'Challan' AND reference_no = ". $cdispatch_id ." GROUP BY link_gr_no");        
        //$result =  $result->result();
        // End
        
        
        $whquery = array('billtype'=>'Challan', 'reference_no'=>$cdispatch_id);

        $this->data['payhistory'] = $this->functions->get_all_row_multipe_where('payment_history',$whquery);
        
        //$this->data['payhistory'] = $result; // Modified for payment_history
                $whquery = array('billtype'=>'Challan', 'reference_no'=>$cdispatch_id, 'voucher_type' =>'Payment');
        $this->data['payamount'] = $this->functions->get_sum_of_pay_history('payment_history','amount',$whquery);

        $this->data['grlist'] = $optiongr1."\n".$grlist;

        $this->data['stations'] = $this->functions->get_all_active_row('tbl_master_station');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['item_weight'] = $this->functions->get_sum_of_column('tbl_gr_items', 'item_weight', 'bgr_id', $dispatch_challan->gr_no_fk); // Modified by Rakesh Dated :21-08-19
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['drivers'] = $this->functions->get_all_row('tbl_master_driver');
        $this->data['brokers'] = $this->functions->get_all_row('tbl_master_broker');
        $this->load->view('challan/edit_dispatch_challan', $this->data);
    }

    function view_dispatch_challan() {
        if (!$this->flexi_auth->is_privileged('View LHC')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if ($this->input->post('search')) {
            echo '<pre>';
            print_r($this->input->post());
            die;
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['dispatch_challans'] = $this->functions->get_all_row('challan_dispatch');
        $this->load->view('challan/view_dispatch_challan', $this->data);
    }

    function delete_dispatch_challan() {
        if (!$this->flexi_auth->is_privileged('Delete LHC')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges";
            echo json_encode($data_arr);
            die;
        }
        $cdispatch_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('challan_dispatch', 'cdispatch_id', $cdispatch_id);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $cdispatch_id;
        $activites['activity_type'] = 'Challan';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted challan.';
        $activites['module'] = 'challan';
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

    function main_challan() {
        if (!$this->flexi_auth->is_privileged('View Main Challan')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
        $this->data['gr_no'] = '';
        if ($this->input->post('search') && $this->input->post('gr_no')) {
            $this->data['gr_no'] = $this->input->post('gr_no');
            $bgr_id = $this->input->post('gr_no');
            $this->data['gr_details'] = $gr_details = $this->functions->get_single_row('booking_gr', 'bgr_id', $bgr_id);
            $this->data['main_challans'] = $this->functions->get_all_row_id_based('main_challan', 'bgr_id_fk', $bgr_id);


            if (!empty($gr_details->broker_id_fk)) {
                $this->data['broker_details'] = $this->functions->get_single_row('tbl_master_broker', 'broker_id', $gr_details->broker_id_fk);
            } else {
                $this->data['broker_details'] = array();
            }
            if (!empty($gr_details->bgr_id)) {
                $this->data['display'] = TRUE;
            }
        } else {
            $this->data['display'] = FALSE;
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_row('tbl_master_party');
        $this->data['stations'] = $this->functions->get_all_row('tbl_master_station');
        $this->data['vehicles'] = $this->functions->get_all_row('tbl_master_vehicle');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['brokers'] = $this->functions->get_all_row('tbl_master_broker');
        $this->load->view('challan/main_challan', $this->data);
    }

    function add_main_challan($bgr_id_fk) {

        $this->data['bgr_id_fk'] = $bgr_id_fk;
        $this->load->view('challan/add_main_challan', $this->data);
    }

    function add_new_main_challan() {
        if (!$this->flexi_auth->is_privileged('Create Main Challan')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges.";
            echo json_encode($data_arr);
            die;
        }
        $data = $this->input->post('data');
        $data['challan_date'] = !empty($data['challan_date']) ? system_date($data['challan_date']) : NULL;
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['status'] = 1;
        $data['added_on'] = date("Y-m-d h:i:s");
        $response = $this->functions->insert_into_table('main_challan', $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $response;
        $activites['activity_type'] = 'Main Challan';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added main challan.';
        $activites['module'] = 'challan/main_challan';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);

        if ($response) {
            if ($this->input->post('button_type') == 'Submit') {
                $data_arr["button_val"] = 'new';
            } else {
                $data_arr["button_val"] = 'print';
            }
            $data_arr["main_challan_id"] = $response;
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Added";
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
    }

    function edit_main_challan($main_challan_id) {
        $this->data['main_challan'] = $this->functions->get_single_row('main_challan', 'main_challan_id', $main_challan_id);
        $this->load->view('challan/edit_main_challan', $this->data);
    }

    function printmainchallan($main_challan_id) {
        $this->data['main_challan'] = $main_challan = $this->functions->get_single_row('main_challan', 'main_challan_id', $main_challan_id);
        $this->data['gr_details'] = $gr_details = $this->functions->get_single_row('booking_gr', 'bgr_id', $main_challan->bgr_id_fk);
        $this->load->view('challan/print_main_challan', $this->data);
    }

    function update_main_challan($main_challan_id) {
        if (!$this->flexi_auth->is_privileged('Edit Main Challan')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges.";
            echo json_encode($data_arr);
            die;
        }
        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['challan_date'] = !empty($data['challan_date']) ? system_date($data['challan_date']) : NULL;
        $response = $this->functions->update_table_rows('main_challan', 'main_challan_id', $main_challan_id, $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $main_challan_id;
        $activites['activity_type'] = 'Main Challan';
        $activites['action'] = 'updated';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated main challan.';
        $activites['module'] = 'challan/main_challan';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);
        if ($response) {
            if ($this->input->post('button_type') == 'Submit') {
                $data_arr["button_val"] = 'new';
            } else {
                $data_arr["button_val"] = 'print';
            }
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

    function delete_main_challan() {
        if (!$this->flexi_auth->is_privileged('Delete Main Challan')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges.";
            echo json_encode($data_arr);
            die;
        }
        $main_challan_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('main_challan', 'main_challan_id', $main_challan_id);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $main_challan_id;
        $activites['activity_type'] = 'Main Challan';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted main challan.';
        $activites['module'] = 'challan/main_challan';
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

    function get_grdetails() {
        $id = $this->input->post('id');
        $challan = $this->functions->get_single_row('challan_dispatch', 'gr_no_fk', $id);
        if (!empty($challan->cdispatch_id)) {
            $data_arr["status"] = 'found';
            $data_arr["data"] = $challan->cdispatch_id;
            echo json_encode($data_arr);
            die;
        }
        $result = $this->functions->get_single_row('booking_gr', 'bgr_id', $id);
        if (!empty($result->bgr_id)) {
            
            // Modified by Rakesh Dated:04-09-19
                $pay_party_type = '';
                if($result->freight_by == 'Consignee'){
                    $pay_party_name= $result->consignee_id_fk;
                }
                if($result->freight_by == 'Consignor'){
                    $pay_party_name= $result->consignor_id_fk;
                }
                if($result->freight_by == 'Third Party'){
                    $pay_party_name= $result->thirdparty_id_fk;
                }
                
            // End            
            
            $data['from_station'] = $this->function_library->FindStation($result->from_station_fk);
            $data['to_station'] = $this->function_library->FindStation($result->to_station_fk);
            $data['vehicle_no'] = $this->function_library->FindVehicle($result->vehicle_id_fk);
           // $data['item_weight'] = $result->vehicle_id_fk;
            $data['item_weight'] = $this->functions->get_sum_of_column('tbl_gr_items', 'item_weight', 'bgr_id', $result->bgr_id); // Modified by Rakesh Dated :21-08-19
            $data['item_booking_freight_rate'] = $result->item_booking_freight_rate;
            $data['s_crossing_charges'] = $result->s_crossing_charges;
            // Modified by Rakesh Dated 04-09-19
            //$data['booking_party'] = $this->function_library->FindPartyDetails($result->consignor_id_fk)->party_name;                        
            if(!empty($pay_party_name)){
                $data['booking_party'] = $this->function_library->FindPartyDetails($pay_party_name)->party_name;
                $data['party_city'] = $this->function_library->FindPartyDetails($pay_party_name)->city;                                
            }
                
/*            }
            else
            {
                $data['booking_party'] = $result->third_party_name;                
            } */
            // End
    
            $data['broker_id_fk'] = $result->broker_id_fk;

            // Modified by Rakesh Dated 30/07/19
            $data['item_booking_freight_rate'] = $result->item_booking_freight_rate;
            $data['item_detention_ch'] =  $result->item_detention_ch;
            $data['item_loading_ch'] = $result->item_loading_ch;
            $data['item_unloading_charges'] =  $result->item_unloading_charges;   
            // End

            $data_arr["status"] = 'success';
            $data_arr["data"] = $data;
            echo json_encode($data_arr);
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "No Record Found.";
            echo json_encode($data_arr);
        }
    }

    function gr_dispatchchallan() {
        $gr_no_fk = $this->input->post('id');
        $results = $this->functions->get_all_row('challan_dispatch', 'gr_no_fk', $gr_no_fk);
        if (!empty($results)) {

            foreach ($results as $result) {
                $temp['gr_fromstation'] = $result->gr_fromstation;
                $temp['to_station'] = $result->gr_tostation;
                $data = $temp;
            }
            $data_arr["status"] = 'success';
            $data_arr["data"] = $data;
            echo json_encode($data_arr);
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "No Record Found.";
            echo json_encode($data_arr);
        }
    }

    function get_broker() {
        $broker_id = $this->input->post('broker_id');
        $result = $this->functions->get_single_row('tbl_master_broker', 'broker_id', $broker_id);
        echo json_encode($result);
    }

    function printdispatch($cdispatch_id) {
        $this->data['dispatch_challan'] = $this->functions->get_single_row('challan_dispatch', 'cdispatch_id', $cdispatch_id);
        $this->load->view('challan/print_dispatch_challan', $this->data);
    }

// Added on Dated:15-11-2019
    function getgrlist(){
        $total_items = 0;
        $total_weight = 0;
        $grlist = '<tr>
        <th>Sr. No.</th>
        <th>GR. No.</th>
        <th>Consignor</th>
        <th>Consignee</th>
        <th>Invoice No.</th>
        <th>Item</th>
        <th>Truck Freight</th>
        <th>Weight</th></tr>';

        $gr_list = $this->input->post('gr_no');
        if(!empty($gr_list)){
        $resultset = $this->db->select('*')
                     ->where_in('bgr_id',$gr_list)
                     ->get('booking_gr')->result();
                     $srno=1;
        foreach($resultset as $row){
            $count_items = $this->functions->get_sum_of_column('tbl_gr_items','item_qty','bgr_id',$row->bgr_id);
            $item_weight = (int) $this->functions->get_sum_of_column('tbl_gr_items','item_weight','bgr_id',$row->bgr_id);
            $total_items += $count_items;
            $total_weight += $item_weight;

            $grlist .= '<tr><td>'.$srno.'<td>'.$row->bgr_id.'</td><td>'. $this->function_library->FindPartyDetails($row->consignor_id_fk)->party_name.'</td><td>'.$this->function_library->FindPartyDetails($row->consignee_id_fk)->party_name.'</td><td>'.$row->invoice_no.'</td><td>'.$count_items.'</td><td>'.number_format($row->s_total_freight,2).'</td><td>'.$item_weight.'</td></tr>'."\n";
            $srno++;   
        }
    }

            $data['grlist'] = $grlist;
            $data['items']  = $total_items;
            $data['weight'] = $total_weight;
        echo json_encode($data);
    }

    function checkchallnno(){
        $challan_no = $this->input->post('challan_no');
        $resulst =  $this->functions->check_duplicate_value_in_col('challan_dispatch','lhc_number', $challan_no);
        if($resulst)
        {
          $data_arr['status'] ='fail';
          $data_arr["status_message"] = "LHC Already exists.";
          echo json_encode($data_arr);
        } 
    }

    function getchallanrelatedinfo(){
        $grValues = $this->functions->get_all_row_id_based('challan_dispatch','gr_no_fk !=','');
        foreach($grValues as $grv){
            $grValues1[] =  $grv->gr_no_fk;
            $grValues1[] =  $grv->gr_no_inc;
        }
        $grValues1 = array_values(array_diff($grValues1,array("null","")));
        $challan_no = $this->input->post('vchno');
        $grlist = $this->functions->get_gr_where_not_in_back1($grValues1, $challan_no);
        echo json_encode($grlist);
        die;
    }

    

// End
}