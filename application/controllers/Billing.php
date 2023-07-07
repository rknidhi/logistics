<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

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
        $this->load->vars('menu_nevigation', 'booking_bill');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function index() {
        if (!$this->flexi_auth->is_privileged('Manage Booking Bill')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
        $this->data['bill_display'] = FALSE;

        if ($this->input->post('search')) {
            $this->db->select('*')->where('pod_status', 'Received')->where('bill_number', 0);
            if (!empty($this->input->post('party'))) {
                $this->db->where('consignor_id_fk', $this->input->post('party'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('gr_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('gr_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('gr_no'))) {
                $this->db->where('bgr_id', $this->input->post('gr_no'));
            }
            $this->data['gr_details'] = $gr_details = $this->db->from('booking_gr')->get()->result();

            if (count($gr_details) > 0) {
                $this->data['display'] = TRUE;
                $this->data['records'] = 'No Record Found.';
            }

            //For Retriving Bills
            $this->db->select('*');
            if (!empty($this->input->post('party'))) {
                $this->db->where('bill_to_id', $this->input->post('party'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('invoice_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('invoice_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('gr_no'))) {
                $this->db->where_in('gr_nos', $this->input->post('gr_no'));
            }
            $this->data['bills'] = $this->db->from('book_billing')->get()->result();
            $this->data['bill_display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->load->view('billing/book_billing', $this->data);
    }

    function createbill() {
        if (empty($this->input->post('gr_nos'))) {
            $this->session->set_flashdata('message', 'Select party and atleast 1 GR');
            redirect('billing/newbilling');
        }


        if ($this->input->post('createbill')) {
            $financial_year = getfinancial_year();
            $invoice_count = $this->db->select_max('invoice_count')->where('financial_year', $financial_year)->get('book_billing')->row()->invoice_count;
            //$invoice_count = $this->db->select_max('invoice_count')->like('invoice_no',$this->config->item('title_prefix'),'after')->where('financial_year', $financial_year)->get('book_billing')->row()->invoice_count;
            $invoice_count = $invoice_count + 1;

            $data = $this->input->post('data');
            $finyear = array();

            $finyear = explode('-',$data['financial_year']);

            $finyear = array_filter($finyear);

            if(count($finyear)>0){

                $financial_year =   $data['financial_year']; 
            }

            $inv_no = $data['invoice_no']; 
            
            $data['financial_year'] = $financial_year;
            $data['invoice_count'] = $invoice_count;
            
            //$data['invoice_no'] = $this->config->item('title_prefix').'/' . $financial_year . '/' . sprintf('%03d', $invoice_count);
            $data['invoice_no'] = $this->config->item('title_prefix').'/' . $financial_year . '/' . $inv_no;
            
            //echo $data['invoice_no'];die;
            $data['gr_nos'] = $this->input->post('gr_nos');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['status'] = 1;
            $data['added_on'] = date("Y-m-d h:i:s");
            $data['invoice_date'] = !empty($data['invoice_date']) ? system_date($data['invoice_date']) : NULL;
            $data['po_date'] = !empty($data['po_date']) ? system_date($data['po_date']) : NULL;
            $billing_id = $this->functions->insert_into_table('book_billing', $data);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $billing_id;
            $activites['activity_type'] = 'Billing';
            $activites['action'] = 'added';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added billing.';
            $activites['module'] = 'billing';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);

            $tmpArr = array();
            $sn = 0;
            foreach (explode(',', $this->input->post('gr_nos')) as $gr_nos) {
                $tmpArr[$sn]['bgr_id'] = $gr_nos;
                $tmpArr[$sn]['bill_number'] = $billing_id;
                $tmpArr[$sn]['bill_vehicle_rate'] = $this->input->post('bill_vehicle_rate')[$gr_nos];
                $tmpArr[$sn]['bill_loading_chr'] = $this->input->post('bill_loading_chr')[$gr_nos];
                $tmpArr[$sn]['bill_unloading_chr'] = $this->input->post('bill_unloading_chr')[$gr_nos];
                $tmpArr[$sn]['bill_detention_chr'] = $this->input->post('bill_detention_chr')[$gr_nos];
                $tmpArr[$sn]['bill_border_exp'] = $this->input->post('bill_border_exp')[$gr_nos];
                $tmpArr[$sn]['bill_st_chr'] = $this->input->post('bill_st_chr')[$gr_nos];
                $tmpArr[$sn]['bill_sub_total'] = $this->input->post('bill_sub_total')[$gr_nos];
                $tmpArr[$sn]['bill_cgst'] = $this->input->post('bill_cgst')[$gr_nos];
                $tmpArr[$sn]['bill_sgst'] = $this->input->post('bill_sgst')[$gr_nos];
                $tmpArr[$sn]['bill_total'] = $this->input->post('bill_total')[$gr_nos];
                // Modified by Rakesh Dated:14-09-19
                $tmpArr[$sn]['item_crossing_ch'] = $this->input->post('item_crossing_ch')[$gr_nos];
                $tmpArr[$sn]['grand_total'] = $this->input->post('grand_total')[$gr_nos];
                $tmpArr[$sn]['bill_slip_no'] = $this->input->post('bill_slip_no')[$gr_nos];
                // End
                $sn++;
            }

            $this->db->update_batch('booking_gr', $tmpArr, 'bgr_id');
            if ($billing_id) {
                $this->session->set_flashdata('success', 'Bill Generated Successfully.');
                if ($this->input->post('createbill') == 'Print') {
                    redirect('billing/editbill/' . $billing_id . '/TRUE');
                } else {
                    redirect('billing/editbill/' . $billing_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('billing');
            }
        }
        $this->data['gr_nos'] = $this->input->post('gr_nos');
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->load->view('billing/createbill', $this->data);
    }

    function editbill_back($billing_id, $doprint = FALSE) {
        if (!$this->flexi_auth->is_privileged('Manage Booking Bill')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view zone.</p>');
            redirect('auth');
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['billing'] = $this->functions->get_single_row('book_billing', 'billing_id', $billing_id);
        $this->load->view('billing/editbill', $this->data);
    }

    function printbill($billing_id) {
        $this->data['billing'] = $this->functions->get_single_row('book_billing', 'billing_id', $billing_id);
        $this->load->view('billing/printbill', $this->data);
    }

    function printbillf($billing_id) {
        $this->data['billing'] = $this->functions->get_single_row('book_billing', 'billing_id', $billing_id);
        $this->load->view('billing/printbillf', $this->data);
    }    



// Edited by Rakesh Dated 26/07/19

    function newbilling() {
        if (!$this->flexi_auth->is_privileged('Manage Booking Bill')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if ($this->input->post('search')) {
            $this->db->select('*');
            if (!empty($this->input->post('party'))) {
              $this->db->where('bill_number', 0);
              $this->db->group_start();
              $this->db->group_start();
              $this->db->where('consignor_id_fk', $this->input->post('party'))->where('freight_by','Consignor');
              $this->db->group_end();

              $this->db->or_group_start();
              $this->db->where('consignee_id_fk', $this->input->post('party'))->where('freight_by','Consignee');
              $this->db->group_end();

              $this->db->or_group_start();  
              $this->db->where('thirdparty_id_fk', $this->input->post('party'))->where('freight_by','Third Party');
              $this->db->group_end();
              $this->db->group_end();
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('gr_date >=', system_date($this->input->post('from_date')))->where('bill_number', 0);
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('gr_date <=', system_date($this->input->post('to_date')))->where('bill_number', 0);
            }
            if (!empty($this->input->post('gr_no'))) {
                $this->db->where('bgr_id', $this->input->post('gr_no'))->where('bill_number', 0);
            } 
            $this->data['gr_details'] = $gr_details = $this->db->from('booking_gr')->get()->result();
        }    
            
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->load->view('billing/book_bill', $this->data);

    }




    function billed() {
        if (!$this->flexi_auth->is_privileged('Manage Booking Bill')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }

            //For Retriving Bills

            $this->db->select('*');
            if ($this->input->post('search')) {

            if (!empty($this->input->post('party'))) {
                $this->db->where('bill_to_id', $this->input->post('party'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('invoice_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('invoice_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('bill_no'))) {
                $financial_year = getfinancial_year();
                $invoice_gen = $this->config->item('title_prefix').'/' . $financial_year . '/' . sprintf('%03d', $this->input->post('bill_no'));
                $this->db->where_in('invoice_no', $invoice_gen);
            }
            $this->data['bills'] = $this->db->from('book_billing')->get()->result();
           }
           else{
            $this->data['bills'] = $this->db->from('book_billing')->get()->result();
           }
           
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->load->view('grbilling/book_billed', $this->data);
        }    


    function ajaxfetchdata() {
       if ($this->input->post('search')) {
            $this->db->select('*')->where('pod_status', 'Received')->where('bill_number', 0);
            if (!empty($this->input->post('party'))) {
                $this->db->where('consignor_id_fk', $this->input->post('party'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('gr_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('gr_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('gr_no'))) {
                $this->db->where('bgr_id', $this->input->post('gr_no'));
            }
           }
           else {
            $this->db->select('*')->where('pod_status', 'Received')->where('bill_number', 0);

           } 
            $this->data['gr_details'] = $gr_details = $this->db->from('booking_gr')->get()->result();

            $inc = 0;
            foreach ($gr_details as $row) {
                $gr_details1[$inc]['bgr_id'] = $row->bgr_id;
                $gr_details1[$inc]['consignor_id_fk'] = $row->consignor_id_fk;
                $gr_details1[$inc]['gr_date'] = convertToHumanDate($row->gr_date);
                $gr_details1[$inc]['pod_status'] = $row->pod_status;
                $gr_details1[$inc]['pod_branch'] = $this->function_library->FindBrachAgent($row->pod_branch);
                $gr_details1[$inc]['pod_received_date'] = convertToHumanDate($row->pod_received_date);
                $inc++;
            }
            echo json_encode($gr_details1);
    }

    // Modified by Rakesh Dated 21-08-19
    function freshbill() {
        if (!$this->flexi_auth->is_privileged('Manage Booking Bill')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if ($this->input->post('createbill')) {

            $data = $this->input->post('data');
                
/*            if(!isset($data['financial_year'])){
                $financial_year = getfinancial_year();                
            } else {
                $financial_year = $data['financial_year'];
            }*/
            $yr = Date('Y');
            $yr1 = $yr -1;
            $financial_year = $yr1.'-'.$yr;

            $invoice_count = $this->db->select_max('invoice_count')->where('financial_year', $financial_year)->get('book_billing')->row()->invoice_count;
            //$invoice_count = $this->db->select_max('invoice_count')->like('invoice_no',$this->config->item('title_prefix'),'after')->where('financial_year', $financial_year)->get('book_billing')->row()->invoice_count;
            $invoice_count = $invoice_count + 1;
        

            $data['bill_to_id'] = $data['bill_to'];
            $data['financial_year'] = $financial_year;
            $data['invoice_count'] = $invoice_count;
            $data['invoice_no'] = $this->config->item('title_prefix').'/' . $financial_year . '/' . sprintf('%03d', $invoice_count);           
           // $data['gr_nos'] = $this->input->post('gr_nos');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['status'] = 1;
            $data['added_on'] = date("Y-m-d h:i:s");
            $data['bill_to'] = $this->function_library->FindParty($data['bill_to']);
            $data['invoice_date'] = !empty($data['invoice_date']) ? system_date($data['invoice_date']) : NULL;
            //$data['po_date'] = !empty($data['po_date']) ? system_date($data['po_date']) : NULL;
            
            $billing_id = $this->functions->insert_into_table('book_billing', $data);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $billing_id;
            $activites['activity_type'] = 'Fresh Billing';
            $activites['action'] = 'added';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added billing.';
            $activites['module'] = 'billing';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);

            $data1 = $this->input->post('freshbill');
            $tmpArr = array();
            $grnos1 = '';
            foreach($this->input->post('freshbill')['gr_nos'] as $key => $value) {
                $tmpArr['bgr_id'] =  $data1['gr_nos'][$key];
                $tmpArr['bill_number'] = $billing_id;
                $tmpArr['weight_size'] = $data1['weight_size'][$key];
                $tmpArr['description'] = $data1['description'][$key];
                $tmpArr['bill_vehicle_rate'] = $data1['bill_vehicle_rate'][$key];
                $tmpArr['bill_loading_chr'] = $data1['bill_loading_chr'][$key];
                $tmpArr['bill_unloading_chr'] = $data1['bill_unloading_chr'][$key];
                $tmpArr['bill_detention_chr'] = $data1['bill_detention_chr'][$key];
                //$tmpArr['bill_border_exp'] = $data1['bill_border_exp'][$key];
                //$tmpArr['bill_st_chr'] = $data1['bill_st_chr'][$key];
                $tmpArr['bill_sub_total'] = $data1['bill_sub_total'][$key];
                $tmpArr['bill_cgst'] = $data1['bill_cgst'][$key];
                $tmpArr['bill_sgst'] = $data1['bill_sgst'][$key];
                $tmpArr['bill_total'] = $data1['bill_total'][$key];
                // Modified by Rakesh Dated:14-09-19
//                $tmpArr[$sn]['item_crossing_ch'] = $this->input->post('item_crossing_ch')[$gr_nos];
                // End

                if(!empty($grnos1)){
                    $grnos1 .= ",".$data1['gr_nos'][$key]; 
                }
                else{
                    $grnos1 = $data1['gr_nos'][$key]; 
                }
                $this->functions->insert_into_table('fresh_booking_gr', $tmpArr);
                }
            $grnos['gr_nos'] = $grnos1;
            $result = $this->functions->update_table_rows('book_billing', 'billing_id', $billing_id, $grnos);

            if ($billing_id) {
                $this->session->set_flashdata('success', 'Bill Generated Successfully.');
                if ($this->input->post('createbill') == 'Print') {
                    redirect('billing/editbill1/' . $billing_id . '/TRUE');
                } else {
                    redirect('billing/editbill1/' . $billing_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('billing');
            }
        }
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->load->view('billing/fresh_bill', $this->data);
    }    


    // Modified by Rakesh Dated 24-08-19

    function editbill($billing_id, $doprint = FALSE) {
        if (!$this->flexi_auth->is_privileged('Manage Booking Bill')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view zone.</p>');
            redirect('auth');
        }
        $this->data['doprint'] = $doprint;
        if (!empty($this->input->post('createbill'))) {
            $data = $this->input->post('data');

            // Modified by Rakesh Dated 29/07/19
            $payment_date     = !empty($data['payment_date']) ? system_date($data['payment_date']) : NULL;
            $payment_mode     = $data['mode_of_payment'];
            $check_dd_neft_no = $data['check_dd_neft_no'];
            $data['payment_date'] = $payment_date;
            // End


            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['invoice_date'] = !empty($data['invoice_date']) ? system_date($data['invoice_date']) : NULL;
            $data['po_date'] = !empty($data['po_date']) ? system_date($data['po_date']) : NULL;
            $result = $this->functions->update_table_rows('book_billing', 'billing_id', $billing_id, $data);


            //FOR ACTIVIES LOG

            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $billing_id;
            $activites['activity_type'] = 'Billing';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated billing.';
            $activites['module'] = 'billing';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);

            $tmpArr = array();
            $sn = 0;
            foreach (explode(',', $this->input->post('gr_nos')) as $gr_nos) {
                $tmpArr[$sn]['bgr_id'] = $gr_nos;
                
                $tmpArr[$sn]['bill_vehicle_rate'] = $this->input->post('bill_vehicle_rate')[$gr_nos];
                $tmpArr[$sn]['bill_loading_chr'] = $this->input->post('bill_loading_chr')[$gr_nos];
                $tmpArr[$sn]['bill_unloading_chr'] = $this->input->post('bill_unloading_chr')[$gr_nos];
                $tmpArr[$sn]['bill_detention_chr'] = $this->input->post('bill_detention_chr')[$gr_nos];
                $tmpArr[$sn]['bill_border_exp'] = $this->input->post('bill_border_exp')[$gr_nos];
                $tmpArr[$sn]['bill_st_chr'] = $this->input->post('bill_st_chr')[$gr_nos];
                $tmpArr[$sn]['bill_sub_total'] = $this->input->post('bill_sub_total')[$gr_nos];
                $tmpArr[$sn]['bill_cgst'] = $this->input->post('bill_cgst')[$gr_nos];
                $tmpArr[$sn]['bill_sgst'] = $this->input->post('bill_sgst')[$gr_nos];
                $tmpArr[$sn]['bill_total'] = $this->input->post('bill_total')[$gr_nos];

                // Modified by Rakesh Dated 29/07/19
                $tmpArr[$sn]['payment_mode'] = $payment_mode;
                $tmpArr[$sn]['check_dd_neft_no'] = $check_dd_neft_no;
                $tmpArr[$sn]['payment_date'] = $payment_date;
                // End
                // Modified by Rakesh Dated:14-09-19
                $tmpArr[$sn]['item_crossing_ch'] = $this->input->post('item_crossing_ch')[$gr_nos];
                $tmpArr[$sn]['bill_slip_no'] = $this->input->post('bill_slip_no')[$gr_nos];
                // End
                
                $sn++;
            }
            $this->db->update_batch('booking_gr', $tmpArr, 'bgr_id');

            if ($result) {
                $this->session->set_flashdata('success', 'Bill Updated Successfully.');
                if ($this->input->post('createbill') == 'Print') {
                    redirect('billing/editbill/' . $billing_id . '/TRUE');
                } else {
                    redirect('billing/editbill/' . $billing_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('billing/editbill/' . $billing_id);
            }
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['billing'] = $this->functions->get_single_row('book_billing', 'billing_id', $billing_id);
        $this->load->view('billing/editbill', $this->data);
    }


    // Fresh Bill

    function editbill1($billing_id, $doprint = FALSE) {
        if (!$this->flexi_auth->is_privileged('Manage Booking Bill')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view zone.</p>');
            redirect('auth');
        }
        $this->data['doprint'] = $doprint;
        if (!empty($this->input->post('createbill'))) {
            $data = $this->input->post('data');

            // Modified by Rakesh Dated 29/07/19
            $payment_date     = !empty($data['payment_date']) ? system_date($data['payment_date']) : NULL;
            $payment_mode     = $data['mode_of_payment'];
            $check_dd_neft_no = $data['check_dd_neft_no'];
            $data['payment_date'] = $payment_date;
            // End


            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['invoice_date'] = !empty($data['invoice_date']) ? system_date($data['invoice_date']) : NULL;
            $data['po_date'] = !empty($data['po_date']) ? system_date($data['po_date']) : NULL;
            $result = $this->functions->update_table_rows('book_billing', 'billing_id', $billing_id, $data);


            //FOR ACTIVIES LOG

            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $billing_id;
            $activites['activity_type'] = 'Billing';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated billing.';
            $activites['module'] = 'billing';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);

            $tmpArr = array();
            $sn = 0;
            foreach (explode(',', $this->input->post('gr_nos')) as $gr_nos) {
                $tmpArr[$sn]['bgr_id'] = $gr_nos;
//                $tmpArr[$sn]['bill_number'] = $billing_id;
                $tmpArr[$sn]['weight_size'] = $this->input->post('weight_size')[$gr_nos];
                $tmpArr[$sn]['description'] = $this->input->post('description')[$gr_nos];
                $tmpArr[$sn]['bill_vehicle_rate'] = $this->input->post('bill_vehicle_rate')[$gr_nos];
                $tmpArr[$sn]['bill_loading_chr'] = $this->input->post('bill_loading_chr')[$gr_nos];
                $tmpArr[$sn]['bill_unloading_chr'] = $this->input->post('bill_unloading_chr')[$gr_nos];
                $tmpArr[$sn]['bill_detention_chr'] = $this->input->post('bill_detention_chr')[$gr_nos];
                //$tmpArr[$sn]['bill_border_exp'] = $this->input->post('bill_border_exp')[$gr_nos];
                //$tmpArr[$sn]['bill_st_chr'] = $this->input->post('bill_st_chr')[$gr_nos];
                $tmpArr[$sn]['bill_sub_total'] = $this->input->post('bill_sub_total')[$gr_nos];
                $tmpArr[$sn]['bill_cgst'] = $this->input->post('bill_cgst')[$gr_nos];
                $tmpArr[$sn]['bill_sgst'] = $this->input->post('bill_sgst')[$gr_nos];
                $tmpArr[$sn]['bill_total'] = $this->input->post('bill_total')[$gr_nos];

                // Modified by Rakesh Dated 29/07/19
                $tmpArr[$sn]['payment_mode'] = $payment_mode;
                $tmpArr[$sn]['check_dd_neft_no'] = $check_dd_neft_no;
                $tmpArr[$sn]['payment_date'] = $payment_date;
                // End
                // Modified by Rakesh Dated:14-09-19
  //              $tmpArr[$sn]['item_crossing_ch'] = $this->input->post('item_crossing_ch')[$gr_nos];
                // End
                
                $sn++;
            }
            $this->db->update_batch('fresh_booking_gr', $tmpArr, 'bgr_id');

            if ($result) {
                $this->session->set_flashdata('success', 'Bill Updated Successfully.');
                if ($this->input->post('createbill') == 'Print') {
                    redirect('billing/editbill1/' . $billing_id . '/TRUE');
                } else {
                    redirect('billing/editbill1/' . $billing_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('billing/editbill/' . $billing_id);
            }
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['billing'] = $this->functions->get_single_row('book_billing', 'billing_id', $billing_id);
        $this->load->view('billing/fresh_editbill', $this->data);
    }


    function chkinvno(){
        $invno = $this->input->post('invoice_no');  
        $resulst =  $this->functions->check_duplicate_value_in_col('book_billing','invoice_no', $invno);
        if($resulst)
        {
          $data_arr['status'] ='fail';
          $data_arr["status_message"] = "GR Already exists.";
          echo json_encode($data_arr);
        }

    }

  function delete_bill(){
        $bill_id_fetch = $this->input->post('id');
        $bill_id_fetch = explode('|', $bill_id_fetch);
        $bill_id = $bill_id_fetch[0];
        if($bill_id_fetch[1] == 'fgr'){
            $fetch_grnos_fresh = $this->functions->get_single_row('book_billing', 'billing_id', $bill_id);
            $fetch_grnos_fresh = explode(',', $fetch_grnos_fresh->gr_nos);
            $response = $this->db->where_in('bgr_id',$fetch_grnos_fresh)
                            ->delete('fresh_booking_gr');
        }
        if($bill_id_fetch[1] == 'gr'){
        $fetch_grnos = $this->functions->get_single_row('book_billing', 'billing_id', $bill_id);
        $response = $this->functions->delete_single_row('book_billing', 'billing_id', $bill_id);
        $fetch_grnos = explode(',', $fetch_grnos->gr_nos);
        $fields_list = array(
            'bill_number'=>'',
            'settle_freight'=>'',
            'settle_green_tax'=>'',
            'settle_advance'=>'',
            'settle_total'=>''
        );
        $response= $this->functions->update_table_rows_gr_del_bill('settlement_gr','sgr_id', $fetch_grnos, $fields_list);
    }
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

    function delete_bill_back(){
        $bill_id_fetch = $this->input->post('id');
        $bill_id_fetch = explode('|', $bill_id_fetch);
        $bill_id = $bill_id_fetch[0];
        if($bill_id_fetch[1] == 'fgr'){
            $fetch_grnos_fresh = $this->functions->get_single_row('book_billing', 'billing_id', $bill_id);
            $fetch_grnos_fresh = explode(',', $fetch_grnos_fresh->gr_nos);
            $response = $this->db->where_in('bgr_id',$fetch_grnos_fresh)
                            ->delete('fresh_booking_gr');
        }
        if($bill_id_fetch[1] == 'gr'){
        $fetch_grnos = $this->functions->get_single_row('book_billing', 'billing_id', $bill_id);
        $response = $this->functions->delete_single_row('book_billing', 'billing_id', $bill_id);
        $fetch_grnos = explode(',', $fetch_grnos->gr_nos);
        $fields_list = array(
            'bill_number'=>'',
            'bill_vehicle_rate'=>'',
            'bill_loading_chr'=>'',
            'bill_unloading_chr'=>'',
            'bill_detention_chr'=>'',
            'bill_sub_total'=>'',
            'bill_cgst'=>'',
            'bill_total'=>'',
            'item_crossing_ch'=>''
        );
        $response= $this->functions->update_table_rows_gr_del_bill('booking_gr','bgr_id', $fetch_grnos, $fields_list);
    }
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


 /*Customer code*/


    function grbilling() {
        if (!$this->flexi_auth->is_privileged('Manage Booking Bill')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if ($this->input->post('search')) {
            $this->db->select('*');
            if (!empty($this->input->post('party'))) {
              $this->db->where('bill_number', 0);
              $this->db->where('party_id_fk', $this->input->post('party'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('gr_date >=', system_date($this->input->post('from_date')))->where('bill_number', 0);
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('gr_date <=', system_date($this->input->post('to_date')))->where('bill_number', 0);
            }
            if (!empty($this->input->post('gr_no'))) {
                $this->db->where('sgr_id', $this->input->post('gr_no'))->where('bill_number', 0);
            } 
            $this->data['gr_details'] = $gr_details = $this->db->from('settlement_gr')->get()->result();
        }    
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->load->view('grbilling/book_bill', $this->data);

    }



    function creategrbill() {

        if (empty($this->input->post('gr_nos'))) {
            $this->session->set_flashdata('message', 'Select party and atleast 1 GR');
            redirect('billing/newbilling');
        }


        if ($this->input->post('createbill')) {
            $data = $this->input->post();

            $financial_year = getfinancial_year();
            $invoice_count = $this->db->select_max('invoice_count')->where('financial_year', $financial_year)->get('book_billing')->row()->invoice_count;
            $invoice_count = $invoice_count + 1;

            $data = $this->input->post('data');
            $finyear = array();

            $finyear = explode('-',$data['financial_year']);

            $finyear = array_filter($finyear);

            if(count($finyear)>0){

                $financial_year =   $data['financial_year']; 
            }

            $inv_no = $data['invoice_no']; 
            
            $data['financial_year'] = $financial_year;
            $data['invoice_count'] = $invoice_count;
            
            $data['invoice_no'] = $this->config->item('title_prefix').'/' . $financial_year . '/' . $inv_no;
            
            $data['gr_nos'] = $this->input->post('gr_nos');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['status'] = 1;
            $data['added_on'] = date("Y-m-d h:i:s");
            $data['invoice_date'] = !empty($data['invoice_date']) ? system_date($data['invoice_date']) : NULL;
            $data['po_date'] = !empty($data['po_date']) ? system_date($data['po_date']) : NULL;
            $billing_id = $this->functions->insert_into_table('book_billing', $data);

            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $billing_id;
            $activites['activity_type'] = 'Billing';
            $activites['action'] = 'added';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added billing.';
            $activites['module'] = 'billing';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);

            $tmpArr = array();
            $sn = 0;

            foreach (explode(',', $this->input->post('gr_nos')) as $gr_nos) {
                $tmpArr[$sn]['sgr_id'] = $gr_nos;
                $tmpArr[$sn]['bill_number'] = $billing_id;
                $tmpArr[$sn]['settle_freight'] = $this->input->post('settle_freight')[$gr_nos];
                $tmpArr[$sn]['settle_green_tax'] = $this->input->post('settle_green_tax')[$gr_nos];
                $tmpArr[$sn]['settle_advance'] = $this->input->post('settle_advance')[$gr_nos];
                $tmpArr[$sn]['settle_total'] = $this->input->post('settle_total')[$gr_nos];
                $sn++;
            }

            $this->db->update_batch('settlement_gr', $tmpArr, 'sgr_id');

            if ($billing_id) {
                $this->session->set_flashdata('success', 'Bill Generated Successfully.');
                if ($this->input->post('createbill') == 'Print') {
                    redirect('billing/editgrbill/' . $billing_id . '/TRUE');
                } else {
                    redirect('billing/editgrbill/' . $billing_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('billing');
            }
        }
        $this->data['gr_nos'] = $this->input->post('gr_nos');
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->load->view('grbilling/createbill', $this->data);
    }




    function editgrbill($billing_id, $doprint = FALSE) {
        if (!$this->flexi_auth->is_privileged('Manage Booking Bill')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view zone.</p>');
            redirect('auth');
        }
        $this->data['doprint'] = $doprint;
        if (!empty($this->input->post('createbill'))) {
            $data = $this->input->post('data');
/*            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $billing_id;
            $activites['activity_type'] = 'Billing';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated billing.';
            $activites['module'] = 'billing';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);*/

            $tmpArr = array();
            $sn = 0;

            foreach (explode(',', $this->input->post('gr_nos')) as $gr_nos) {
                $tmpArr[$sn]['sgr_id'] = $gr_nos;
                $tmpArr[$sn]['bill_number'] = $billing_id;
                $tmpArr[$sn]['settle_freight'] = $this->input->post('settle_freight')[$gr_nos];
                $tmpArr[$sn]['settle_green_tax'] = $this->input->post('settle_green_tax')[$gr_nos];
                $tmpArr[$sn]['settle_advance'] = $this->input->post('settle_advance')[$gr_nos];
                $tmpArr[$sn]['settle_total'] = $this->input->post('settle_total')[$gr_nos];
                $sn++;
            }

            $this->db->update_batch('settlement_gr', $tmpArr, 'sgr_id');

            if ($billing_id) {
                $this->session->set_flashdata('success', 'Bill Generated Successfully.');
                if ($this->input->post('createbill') == 'Print') {
                    redirect('billing/editgrbill/' . $billing_id . '/TRUE');
                } else {
                    redirect('billing/editgrbill/' . $billing_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('billing');
            }
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['billing'] = $this->functions->get_single_row('book_billing', 'billing_id', $billing_id);
        $this->load->view('grbilling/editbill', $this->data);
    }



    // End
}