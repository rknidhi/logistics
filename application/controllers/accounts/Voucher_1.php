<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

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
        $this->load->vars('menu_nevigation', '');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function index() {
        if (!$this->flexi_auth->is_privileged('Voucher')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }

        if (!empty($this->input->post('submit'))) {
            $dr_data = $this->input->post('dr_data');
            $cr_data = $this->input->post('cr_data');
            $data = $this->input->post('data');

            $srn = $this->db->select_max('voucher_no')->where('voucher_type', $data['voucher_type'])->get('tbl_vouchers')->row()->voucher_no;
            $next_id = $srn + 1;


            // Insert payment History
            $historydata = $this->input->post('dbvalue');
            $historydata = str_replace('"{','{',$historydata);    
            $historydata = str_replace('}"','}',$historydata);
            $historydata = json_decode($historydata);
            foreach($historydata as $innerA){
                $innerA = json_decode(json_encode($innerA),true);
                $innerA['date_time'] = date("Y-m-d h:i:s");
                $innerA['received_by'] = $this->flexi_auth->get_user_id();
                $innerA['voucher_type'] = $data['voucher_type'];
                $innerA['voucher_no'] = $next_id;
                $this->functions->insert_into_table('payment_history', $innerA);
            }
            // End

            // Dr. Entry
            $dr_data['voucher_type'] = $data['voucher_type'];
            $dr_data['branch_id_fk'] = $data['branch_id_fk'];
            $dr_data['transaction_type'] = 'Debit';
    //        $dr_data['ledger_from'] = $dr_data['ledger'];
    //        $dr_data['ledger_to'] = $cr_data['ledger'];
            $dr_data['gr_no'] = $data['gr_no'];
            $dr_data['gr_no_disp'] = $data['gr_no_disp'];            
            $dr_data['narration'] = $data['narration'];
            $dr_data['voucher_no'] = $next_id;
            $dr_data['modified_by'] = $this->flexi_auth->get_user_id();
            $dr_data['status'] = 1;
            $dr_data['added_on'] = date("Y-m-d h:i:s");
            $dr_data['voucher_date'] = !empty($data['voucher_date']) ? system_date($data['voucher_date']) : NULL;
            // End
            $response = $this->functions->insert_into_table('tbl_vouchers', $dr_data);

            // Cr. Entry
            $cr_data['voucher_type'] = $data['voucher_type'];
            $cr_data['branch_id_fk'] = $data['branch_id_fk'];
            $cr_data['transaction_type'] = 'Credit';
    //       $cr_data['ledger_from'] = $cr_data['ledger'];
    //       $cr_data['ledger_to'] =  $dr_data['ledger'];
            $cr_data['gr_no'] = $data['gr_no'];
            $dr_data['gr_no_disp'] = $data['gr_no_disp'];            
            $cr_data['narration'] = $data['narration'];
            $cr_data['voucher_no'] = $next_id;
            $cr_data['modified_by'] = $this->flexi_auth->get_user_id();
            $cr_data['status'] = 1;
            $cr_data['added_on'] = date("Y-m-d h:i:s");
            $cr_data['voucher_date'] = !empty($data['voucher_date']) ? system_date($data['voucher_date']) : NULL;
            // End

            $response1 = $this->functions->insert_into_table('tbl_vouchers', $cr_data);        
            if ($response && $response1) {
                $this->session->set_flashdata('success', 'Voucher Created Successfully.');                
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');                
            }
         } 
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');            
        $this->data['ledgers'] = $this->functions->get_all_row('ac_ledger_master');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/voucher/create_voucher', $this->data);

    }

    function add_voucher() {
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['ledger_master'] = $this->functions->get_all_active_row('ac_ledger_master');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['vouchers'] = $this->functions->get_all_row('tbl_vouchers');
        $this->load->view('account/voucher/add_voucher', $this->data);
    }

    function edit_voucher($voucher_id) {
        $this->data['voucher'] = $voucher = $this->functions->get_single_row('tbl_vouchers', 'voucher_id', $voucher_id);
        $this->load->view('account/ledger_master/edit', $this->data);
    }

    function delete_back() {
        $voucher_id = $this->input->post('id');

        // Modified by Rakesh Dated : 30-09-19
        $where_value = explode('|',$voucher_id);
        $wh_query = array('voucher_no'=>$where_value[0],'voucher_type'=>$where_value[1],'branch_id_fk'=>$where_value[2]);

//        $get_ids = $this->functions->get_voucher_id($wh_query);
        
        $response = $this->functions->delete_voucher_entry($wh_query);
        //$response = $this->functions->delete_single_row('tbl_vouchers', 'voucher_id', $voucher_id);

        //End


        if ($response) {
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Deleted";
            $data_arr["row_id"] = $get_ids; // Modified by Rakesh Dated : 30-09-19
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
    }


    function delete() {
        $voucher_id = $this->input->post('id');

        // Modified by Rakesh Dated : 30-09-19
        $where_value = explode("|",$voucher_id);
        $wh_query['voucher_no']   = $where_value[0];
        $wh_query['voucher_type'] = $where_value[1];
        $wh_query['branch_id_fk'] = $where_value[2];
        
        
        // Delete payment history
        $his_Wh_query['voucher_no']   = $where_value[0];
        $his_Wh_query['voucher_type'] = $where_value[1];

        $ref_no  = $this->functions->get_single_row_multipe_where('tbl_vouchers',$wh_query)->gr_no;
        $ref_no = explode(',', $ref_no);
        $del = $this->db->where_in('reference_no', $ref_no)
                        ->where($his_Wh_query)
                        ->delete('payment_history');
        // End        
        
        $response = $this->functions->delete_voucher_entry('tbl_vouchers',$wh_query);
        //End
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

    function printvoucher($voucher_id) {
        $this->data['voucher'] = $voucher = $this->functions->get_single_row('tbl_vouchers', 'voucher_id', $voucher_id);
        $this->load->view('account/voucher/print_voucher', $this->data);
    }

    function get_voucher_details() {
        $id = $this->input->post('id');
        $result = $this->functions->get_single_row('booking_gr', 'bgr_id', $id);
        #$voucher_result = $this->functions->get_single_row('tbl_vouchers', 'bgr_id_fk', $id);
        if (!empty($result->bgr_id)) {
            $data['from_station'] = $this->function_library->FindStation($result->from_station_fk);
            $data['to_station'] = $this->function_library->FindStation($result->to_station_fk);
            $data['vehicle_no'] = $this->function_library->FindVehicle($result->vehicle_id_fk);
            $data['item_weight'] = $result->vehicle_id_fk;
            $data['item_booking_freight_rate'] = $result->item_booking_freight_rate;
            $data['s_crossing_charges'] = $result->s_crossing_charges;
            $data['booking_party'] = $this->function_library->FindPartyDetails($result->consignor_id_fk)->party_name;

            $data_arr["status"] = 'success';
            $data_arr["data"] = $data;
            echo json_encode($data_arr);
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "No Record Found.";
            echo json_encode($data_arr);
        }
    }

    function add() {
        $dr_data = $this->input->post('dr_data');
        $cr_data = $this->input->post('cr_data');
        $data = $this->input->post('data');


        $srn = $this->db->select_max('voucher_no')->where('voucher_type', $data['voucher_type'])->get('tbl_vouchers')->row()->voucher_no;
        $next_id = $srn + 1;

        // Dr. Entry
        $dr_data['voucher_type'] = $data['voucher_type'];
        $dr_data['branch_id_fk'] = $data['branch_id_fk'];
        $dr_data['transaction_type'] = 'Debit';
//        $dr_data['ledger_from'] = $dr_data['ledger'];
//        $dr_data['ledger_to'] = $cr_data['ledger'];
        $dr_data['gr_no'] = implode(',', $data['gr_no']);
        $dr_data['narration'] = $data['narration'];
        $dr_data['voucher_no'] = $next_id;
        $dr_data['modified_by'] = $this->flexi_auth->get_user_id();
        $dr_data['status'] = 1;
        $dr_data['added_on'] = date("Y-m-d h:i:s");
        $dr_data['voucher_date'] = !empty($data['voucher_date']) ? system_date($data['voucher_date']) : NULL;
        // End
        $response = $this->functions->insert_into_table('tbl_vouchers', $dr_data);

        // Cr. Entry
        $cr_data['voucher_type'] = $data['voucher_type'];
        $cr_data['branch_id_fk'] = $data['branch_id_fk'];
        $cr_data['transaction_type'] = 'Credit';
 //       $cr_data['ledger_from'] = $cr_data['ledger'];
 //       $cr_data['ledger_to'] =  $dr_data['ledger'];
        $cr_data['gr_no'] = $data['gr_no'];
        $cr_data['narration'] = $data['narration'];
        $cr_data['voucher_no'] = $next_id;
        $cr_data['modified_by'] = $this->flexi_auth->get_user_id();
        $cr_data['status'] = 1;
        $cr_data['added_on'] = date("Y-m-d h:i:s");
        $cr_data['voucher_date'] = !empty($data['voucher_date']) ? system_date($data['voucher_date']) : NULL;
        // End

        $response1 = $this->functions->insert_into_table('tbl_vouchers', $cr_data);        
        if ($response && $response1) {
            if ($this->input->post('button_type') == 'Submit') {
                $data_arr["button_val"] = 'new';
            } else {
                $data_arr["button_val"] = 'print';
            }

            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Added";
            $data_arr["voucher_id"] = $response;
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
    }

    function inter_branch() {
        if (!$this->flexi_auth->is_privileged('Inter Branch Voucher')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {

            $this->db->select('*');
            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('voucher_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('voucher_date <=', system_date($this->input->post('to_date')));
            }
            $this->data['vouchers'] = $vouchers = $this->db->from('tbl_vouchers')->get()->result();

            $this->data['post_data'] = $this->input->post();
            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }

        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/voucher/inter_branch', $this->data);
    }

    function day_book_journal() {
        if (!$this->flexi_auth->is_privileged('Day Book Journal')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {
            $this->db->select('tbl_vouchers.*');
            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('company'))) {
                $this->db->where('ac_ledger_master.company_id_fk', $this->input->post('company'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('voucher_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('voucher_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('voucher_type'))) {
                $this->db->where('voucher_type', $this->input->post('voucher_type'));
            }
            $this->data['vouchers'] = $vouchers = $this->db->from('tbl_vouchers')->join('ac_ledger_master', "ac_ledger_master.ledger_id = tbl_vouchers.ledger")->get()->result();

            $this->data['post_data'] = $this->input->post();
            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }

        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/voucher/day_book_journal', $this->data);
    }

    function cashbook() {
        if (!$this->flexi_auth->is_privileged('Cash Book')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {
            $this->db->select('*');
            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('voucher_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('voucher_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('voucher_type'))) {
                $this->db->where('voucher_type', $this->input->post('voucher_type'));
            }
            $this->data['vouchers'] = $vouchers = $this->db->from('tbl_vouchers')->get()->result();

            $this->data['post_data'] = $this->input->post();
            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/voucher/cashbook', $this->data);
    }

    function bank_book() {
        if (!$this->flexi_auth->is_privileged('Bank Book')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {
            $this->db->select('*');
            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('voucher_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('voucher_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('ledger'))) {
                $this->db->where('ledger', $this->input->post('ledger'));
            }
            if (!empty($this->input->post('ltype_id_fk'))) {
                $this->db->where('ltype_id_fk', $this->input->post('ltype_id_fk'));
            }

            $this->data['vouchers'] = $vouchers = $this->db->from('tbl_vouchers')->get()->result();

            if (!empty($this->input->post('ltype_id_fk'))) {
                $this->data['ledgers'] = $this->functions->get_all_row_id_based('ac_ledger_master', 'ledger_type', $this->input->post('ltype_id_fk'));
            }

            $this->data['post_data'] = $this->input->post();
            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }

        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/voucher/bank_book', $this->data);
    }

    function get_ledger() {
        $id = $this->input->post('id');
        // Modified by Rakesh Dated: 11-09-19
        $wh_array['ledger_type'] = $id;
        $wh_array['aag_id_fk !='] = '';
        $wh_array['aag_id_fk !='] = NULL;
        $wh_array['opening_balance !='] = NULL;
        $datas = $this->functions->get_all_row_multipe_where('ac_ledger_master',$wh_array);
    //  $datas = $this->functions->get_all_row_id_based('ac_ledger_master', 'ledger_type', $id);
    // End
        $str = '<option value="">--Select--</option>';
        foreach ($datas as $data) {
            $str .= '<option value="' . $data->ledger_id . '">' . $data->ledger_name . '</option>';
        }
        echo $str;
    }

    function get_paymentFor() {
        $id = $this->input->post('id');        
    //  $datas = $this->functions->get_all_row_id_based('ac_ledger_master', 'ledger_type', $id);
    // End
        $str = '<option value="">--Select--</option>';
        foreach ($datas as $data) {
            $str .= '<option value="' . $data->payment_id . '">' . $data->ledger_name . '</option>';
        }
        echo $str;
    }

    // Modified by Rakesh Dated : 04-09-19
       function getboucherref()
       {
        $voucher_type = $this->input->post('id');
        $srn = $this->db->select_max('voucher_no')->where('voucher_type', $voucher_type)->get('tbl_vouchers')->row()->voucher_no;
        $next_id = $srn + 1;
        $data['success'] = 'success';
        $data['voucher_ref_no'] = $next_id;
        echo json_encode($data);            
       }
       
    // Added on 10-10-19


    function voucher_list() {
        if (!$this->flexi_auth->is_privileged('Voucher')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        if ($this->input->post('search')) {

            $voucher_id = $this->input->post('voucher_id');
            
            $this->db->select('*');
            if (!empty($voucher_id)) {
                $this->db->where('voucher_no', $voucher_id);
            }
            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('voucher_type'))) {
                $this->db->where('voucher_type', $this->input->post('voucher_type'));
            }
            if (!empty($this->input->post('date_from'))) {
                $this->db->where('voucher_date >=', convertToMySQLDate($this->input->post('date_from')));
            }
            if (!empty($this->input->post('date_to'))) {
                $this->db->where('voucher_date <=', convertToMySQLDate($this->input->post('date_to')));
            }

            $this->data['vouchers'] = $vouchers = $this->db->from('tbl_vouchers')->get()->result();
            $this->data['post_data'] = $this->input->post();
        }
        else {
            $this->data['vouchers'] = $vouchers = $this->db->from('tbl_vouchers')->get()->result();
        }
        
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');

        $this->load->view('account/voucher/view', $this->data);
    }       




     function getAccountGroup(){
        $drVal = $this->input->post('dr');
        $crVal = $this->input->post('cr');
        $cr = implode('\',\'', $crVal);
        $dr = implode('\',\'', $drVal); 
        if($drVal[0] == "All")
        {
            $optionDr = $this->functions->get_crdr_dropdown();
            $optionCr = $optionDr;
        }
        else {
            $optionDr = $this->functions->get_crdr_dropdown($dr);
            $optionCr = $this->functions->get_crdr_dropdown($cr);
        } 
        echo  $optionDr. " === " . $optionCr;          
     } 
     
     
//Added by Rakesh Dated :16-10-19
    function editvoucher($vdata){
        if (!empty($this->input->post('submit'))) {
            $dr_data = $this->input->post('dr_data');
            $cr_data = $this->input->post('cr_data');
            $data = $this->input->post('data');
            $drvoucherId = $this->input->post('drvoucherId');
            $crvoucherId = $this->input->post('crvoucherId');
            $vtype = $this->input->post('vouchertype');
            $vno = $this->input->post('voucherno');

            // Insert payment History
            $historydata = $this->input->post('dbvalue');
            $historydata = str_replace('"{','{',$historydata);    
            $historydata = str_replace('}"','}',$historydata);
            $historydata = json_decode($historydata);
            foreach($historydata as $innerA){
                $innerA = json_decode(json_encode($innerA),true);
                $innerA['date_time'] = date("Y-m-d h:i:s");
                $innerA['received_by'] = $this->flexi_auth->get_user_id();
                $innerA['voucher_type'] = $data['voucher_type'];
                $innerA['voucher_no'] = $next_id;
                $whereclouse = array('type'=>$vtype, 'voucher_type'=>$vtype,'voucher_no'=>$vno);
                $this->functions->update_payhistory_table_rows('payment_history', $whereclouse, $innerA);
            }
            // End

            // Dr. Entry
            $dr_data1['narration'] = $dr_data['amount'];
            $dr_data1['narration'] = $data['narration'];
            $dr_data1['modified_by'] = $this->flexi_auth->get_user_id();
            // End

            $response = $this->functions->update_table_rows('tbl_vouchers','voucher_id', $drvoucherId, $dr_data1);
    
            // Cr. Entry
            $cr_data1['narration'] = $cr_data['amount'];            
            $cr_data1['narration'] = $data['narration'];
            $cr_data1['modified_by'] = $this->flexi_auth->get_user_id();
            // End
            $response1 = $this->functions->update_table_rows('tbl_vouchers','voucher_id', $crvoucherId, $cr_data1);        
            if ($response && $response1) {
                $this->session->set_flashdata('success', "Voucher Updated Successfully");                
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('booking/edit/' . $vdata);
            }
        }
        $this->data['ledgers'] = $this->functions->get_all_row('ac_ledger_master');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['voucher'] = $voucher = $this->functions->get_single_row('tbl_vouchers', 'voucher_id', $vdata);
        // Pay history
        $historyCond['voucher_type'] = $voucher->voucher_type;
        $historyCond['voucher_no']= $voucher->voucher_no;
        $this->data['paytype'] = $this->functions->get_single_row_multipe_where('payment_history', $historyCond); 
        // End
        $whquery['voucher_no'] = $voucher->voucher_no; 
        $whquery['branch_id_fk'] = $voucher->branch_id_fk;
        $whquery['voucher_type'] = $voucher->voucher_type;
        $whquery['transaction_type'] = 'Credit';
        $this->data['vouchercr'] = $vouchercr = $this->functions->get_single_row_multipe_where('tbl_vouchers', $whquery); 
        $this->load->view('account/voucher/edit_voucher', $this->data);
    }


    function update_voucher_data($id=''){
        $dr_data = $this->input->post('dr_data');
        $cr_data = $this->input->post('cr_data');
        $data = $this->input->post('data');
        $drvoucherId = $this->input->post('drvoucherId');
        $crvoucherId = $this->input->post('crvoucherId');
        // Dr. Entry
        $dr_data['voucher_type'] = $data['voucher_type'];
        $dr_data['branch_id_fk'] = $data['branch_id_fk'];
        $dr_data['transaction_type'] = 'Debit';
        $dr_data['gr_no'] = $data['gr_no'];
        $dr_data['narration'] = $data['narration'];
        $dr_data['modified_by'] = $this->flexi_auth->get_user_id();
        $dr_data['voucher_date'] = !empty($data['voucher_date']) ? system_date($data['voucher_date']) : NULL;
        // End
        $response = $this->functions->update_table_rows('tbl_vouchers','voucher_id', $drvoucherId, $dr_data);

        // Cr. Entry
        $cr_data['voucher_type'] = $data['voucher_type'];
        $cr_data['branch_id_fk'] = $data['branch_id_fk'];
        $cr_data['transaction_type'] = 'Credit';
        $cr_data['gr_no'] = $data['gr_no'];
        $cr_data['narration'] = $data['narration'];
        $cr_data['modified_by'] = $this->flexi_auth->get_user_id();
        $cr_data['voucher_date'] = !empty($data['voucher_date']) ? system_date($data['voucher_date']) : NULL;
        // End

        $response1 = $this->functions->update_table_rows('tbl_vouchers','voucher_id', $crvoucherId, $cr_data);        
        if ($response && $response1) {
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Added";
            $data_arr["voucher_id"] = $response;
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
    }     

    // Below codes are added for  Multi selection and partial payment Start Nov 29 2019
    function fetch_gr_details(){
        $grno = $this->input->post('id');
        $this->data[] = $this->functions->get_single_row('booking_gr','bgr_id', $grno);
        $whq = array('reference_no'=>$grno,'billtype'=>'Gr');
        $this->data['received_amount'] = $this->functions->get_sum_of_pay_history('payment_history', 'amount', $whq);
        echo json_encode($this->data);
    }

    function fetch_lhc_details(){
        $lhcno = $this->input->post('id');
        $this->data[] = $this->functions->get_single_row('challan_dispatch','cdispatch_id', $lhcno);
        $whq = array('reference_no'=>$lhcno,'billtype'=>'Challan');
        $this->data['received_amount'] = $this->functions->get_sum_of_pay_history('payment_history', 'amount', $whq);
        echo json_encode($this->data);
    }

    function fetch_bill_details(){
        $billno = $this->input->post('id');
        $this->data[] = $this->functions->get_single_row('book_billing','billing_id', $billno);
        $this->data['billamount'] = $this->functions->get_sum_of_column('booking_gr', 'bill_total', 'bill_number', $this->data[0]->billing_id);
        $whq = array('reference_no'=>$billno,'billtype'=>'Bill');
        $this->data['received_amount'] = $this->functions->get_sum_of_pay_history('payment_history', 'amount', $whq);
        echo json_encode($this->data);
    } 


    function add_bia($branchID, $ledg) {
        $findid = $this->functions->get_single_row('ac_ledger_master','ledger_id', $ledg);
        $billlist =  $this->functions->get_all_row_id_based('book_billing','bill_to_id', $findid->reference_no);
        $opt = '';
        foreach($billlist as $bill){
            $opt .= '<option value="'.$bill->billing_id.'">'.$bill->invoice_no.'</option>'."\n";
        }
        $this->data['billnos'] = $opt;
        $this->load->view('account/voucher/add_bia', $this->data);
    }

    function add_lhca($branchID, $ledg) {
        $findid = $this->functions->get_single_row('ac_ledger_master','ledger_id', $ledg);        
        $lhclist =  $this->functions->get_all_row_id_based('challan_dispatch','broker_id_fk', $findid->reference_no);
        $opt = '';
        foreach($lhclist as $lhc){
            $opt .= '<option value="'.$lhc->cdispatch_id.'">'.$lhc->lhc_number.'</option>'."\n";
        }
        $this->data['lhcnos'] = $opt;
        $this->load->view('account/voucher/add_lhca', $this->data);
    }

    function add_gra($branchID) {
        $grlist =  $this->functions->get_all_row('booking_gr');        
        $opt = '';
        foreach($grlist as $grd){
            $opt .= '<option value="'.$grd->bgr_id.'">'.$grd->bgr_id.'</option>'."\n";
        }
        $this->data['groptions'] = $opt;
        $this->load->view('account/voucher/add_gra', $this->data);
    }


    function add_bia_ajax(){
        $ref_no = $this->input->post('data');
        $valdata = array();
        $indexV = 0;
        $total_amount = 0;
        $refno= array();  
        foreach($ref_no['billno'] as $key => $value){
            if($value != ''){
                $valdata['amount'] = $ref_no['amount'][$key];
                $valdata['reference_no'] = $value;
                $valdata['billtype'] = 'Bill';
                $total_amount += $ref_no['amount'][$key];
                $refno[]=$value;
                $valdata1[] = json_encode($valdata);
              }
        }
        $refno1 = array_unique($refno, SORT_NUMERIC);

        // Special condition
         $q = $this->db->select('*')
                      ->where_in('billing_id', $refno1)
                      ->get('book_billing')->result();
           foreach($q as $j){
               $grn[] = $j->invoice_no;
           }           
        $j = implode(',', $grn);              
        $ajaxdata['gr_no_visible'] = $j; 
        // End

        $return_ref_no = implode(',', $refno1);
        $ajaxdata['payhistory'] = str_replace('\\','',json_encode($valdata1));
        $ajaxdata['status'] = 'success';
        $ajaxdata['bill_no'] = $return_ref_no;
        $ajaxdata['amount'] = $total_amount;  
        echo json_encode($ajaxdata);
    }

    function add_lhca_ajax(){
        $ref_no = $this->input->post('data');
        $valdata = array();
        $indexV = 0;
        $total_amount = 0;
        $refno= array();  
        foreach($ref_no['lhcno'] as $key => $value){
            if($value != ''){
                $valdata['amount'] = $ref_no['amount'][$key];
                $valdata['reference_no'] = $value;
                $valdata['billtype'] = 'Challan';
                $total_amount += $ref_no['amount'][$key];
                $refno[]=$value;
                $valdata1[] = json_encode($valdata);
              }
        }
        $refno1 = array_unique($refno, SORT_NUMERIC);
        // Special condition
            $q = $this->db->select('*')
                ->where_in('cdispatch_id', $refno1)
                ->get('challan_dispatch')->result();
            foreach($q as $j){
            $grn[] = $j->lhc_number;
        }           
        $j = implode(',', $grn);              
        $ajaxdata['gr_no_visible'] = $j; 
        // End        
        $return_ref_no = implode(',', $refno1);
        $ajaxdata['payhistory'] = str_replace('\\','',json_encode($valdata1));
        $ajaxdata['status'] = 'success';
        $ajaxdata['lhc_no'] = $return_ref_no;
        $ajaxdata['amount'] = $total_amount;  
        echo json_encode($ajaxdata);
    }
    
    function add_gr_ajax(){
        $ref_no = $this->input->post('data');
        $valdata = array();
        $indexV = 0;
        $total_amount = 0;
        $refno= array();  
        foreach($ref_no['grno'] as $key => $value){
            if($value != ''){
                $valdata['amount'] = $ref_no['amount'][$key];
                $valdata['reference_no'] = $value;
                $valdata['billtype'] = 'Gr';
                $total_amount += $ref_no['amount'][$key];
                $refno[]=$value;
                $valdata1[] = json_encode($valdata);
              }
        }
        $refno1 = array_unique($refno, SORT_NUMERIC);
        $return_ref_no = implode(',', $refno1);
        $ajaxdata['payhistory'] = str_replace('\\','',json_encode($valdata1));
        $ajaxdata['status'] = 'success';
        $ajaxdata['gr_no'] = $return_ref_no;
        $ajaxdata['amount'] = $total_amount;  
        echo json_encode($ajaxdata);
    }    
    // End


    function edit_bia($branch, $vtype, $vno)
    {
        $grnos = array();
        $whereCond['branch_id_fk'] = $branch;
        $whereCond['voucher_no'] = $vno;
        $whereCond['voucher_type'] = $vtype;
        $redno =  $this->functions->get_single_row_multipe_where('tbl_vouchers', $whereCond);
        $grnos = explode(',', $redno->gr_no);
        $data['grnos'] = $grnos;
        $data['hisrec'] = $historyrec = $this->db->select('*')
                                ->where_in('reference_no', $grnos)
                                ->get('payment_history')->result(); 
        $this->load->view('account/voucher/edit_bia', $data);                        
    }

}
