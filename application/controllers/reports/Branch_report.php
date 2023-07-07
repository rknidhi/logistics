<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_report extends CI_Controller {

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
        $this->load->vars('menu_nevigation', 'reports');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function index() {
        if (!$this->flexi_auth->is_privileged('Branch Report')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = TRUE;
        if (!empty($this->input->post('submit'))) {
            #echo '<pre>';
            #print_r($this->input->post());
            #die;

            $filter = $this->input->post();

            //Total GR
            $this->db->select('*');
            $this->db->from('booking_gr');

            if (!empty($filter['from_date'])) {
                $this->db->where('gr_date >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('gr_date <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['from_station_fk'])) {
                $this->db->where('from_station_fk', $filter['from_station_fk']);
            }
            if (!empty($filter['to_station_fk'])) {
                $this->db->where('to_station_fk', $filter['to_station_fk']);
            }
            if (!empty($filter['branch_id_fk'])) {
                $this->db->where('branch_id_fk', $filter['branch_id_fk']);
            }
            $this->data['total_gr'] = $this->db->get()->num_rows();

            //Cancelled GR
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->db->where('cancelled_gr', 'Y');

            if (!empty($filter['from_date'])) {
                $this->db->where('gr_date >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('gr_date <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['from_station_fk'])) {
                $this->db->where('from_station_fk', $filter['from_station_fk']);
            }
            if (!empty($filter['to_station_fk'])) {
                $this->db->where('to_station_fk', $filter['to_station_fk']);
            }
            if (!empty($filter['branch_id_fk'])) {
                $this->db->where('branch_id_fk', $filter['branch_id_fk']);
            }
            $this->data['cancelled_gr'] = $this->db->get()->num_rows();

            //Total LHC
            $this->db->select('challan_dispatch.*');
            $this->db->from('challan_dispatch');
            $this->db->join('booking_gr', "booking_gr.bgr_id = challan_dispatch.gr_no_fk");

            if (!empty($filter['from_date'])) {
                $this->db->where('challan_dispatch.added_on >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('challan_dispatch.added_on <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['from_station_fk'])) {
                $this->db->where('booking_gr.from_station_fk', $filter['from_station_fk']);
            }
            if (!empty($filter['to_station_fk'])) {
                $this->db->where('booking_gr.to_station_fk', $filter['to_station_fk']);
            }
            if (!empty($filter['branch_id_fk'])) {
                $this->db->where('booking_gr.branch_id_fk', $filter['branch_id_fk']);
            }
            $this->data['total_lhc'] = $this->db->get()->num_rows();
            //TOTAL MAIN CHALLAN

            $this->db->select('main_challan.*');
            $this->db->from('main_challan');
            if (!empty($filter['from_date'])) {
                $this->db->where('main_challan.challan_date >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('main_challan.challan_date <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['branch_id_fk'])) {
                $this->db->where('booking_gr.branch_id_fk', $filter['branch_id_fk']);
            }
            if (!empty($filter['from_station_fk'])) {
                $this->db->where('booking_gr.from_station_fk', $filter['from_station_fk']);
            }
            if (!empty($filter['to_station_fk'])) {
                $this->db->where('booking_gr.to_station_fk', $filter['to_station_fk']);
            }
            $this->db->join('booking_gr', "booking_gr.bgr_id = main_challan.bgr_id_fk");
            $this->data['main_challan'] = $this->db->get()->num_rows();

            //TOTAL POD RECEIVED
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->db->where('pod_status', 'Received');
            if (!empty($filter['from_date'])) {
                $this->db->where('pod_received_date >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('pod_received_date <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['from_station_fk'])) {
                $this->db->where('from_station_fk', $filter['from_station_fk']);
            }
            if (!empty($filter['to_station_fk'])) {
                $this->db->where('to_station_fk', $filter['to_station_fk']);
            }
            if (!empty($filter['branch_id_fk'])) {
                $this->db->where('branch_id_fk', $filter['branch_id_fk']);
            }
            $this->data['pod_received'] = $this->db->get()->num_rows();

            //TOTAL POD PENDING
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->db->where('pod_status', 'Pending');
            if (!empty($filter['from_date'])) {
                $this->db->where('gr_date >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('gr_date <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['from_station_fk'])) {
                $this->db->where('from_station_fk', $filter['from_station_fk']);
            }
            if (!empty($filter['to_station_fk'])) {
                $this->db->where('to_station_fk', $filter['to_station_fk']);
            }
            if (!empty($filter['branch_id_fk'])) {
                $this->db->where('branch_id_fk', $filter['branch_id_fk']);
            }
            $this->data['pod_pending'] = $this->db->get()->num_rows();

            //TOTAl BILLING
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->db->where('bill_number !=', 0);

            if (!empty($filter['from_date'])) {
                $this->db->where('invoice_date >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('invoice_date <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['from_station_fk'])) {
                $this->db->where('from_station_fk', $filter['from_station_fk']);
            }
            if (!empty($filter['to_station_fk'])) {
                $this->db->where('to_station_fk', $filter['to_station_fk']);
            }
            if (!empty($filter['branch_id_fk'])) {
                $this->db->where('branch_id_fk', $filter['branch_id_fk']);
            }
            $this->data['total_billing_count'] = $this->db->get()->num_rows();

            //TOTAl BILLING AMOUNT
            $this->db->select_sum('bill_total');
            $this->db->from('booking_gr');
            $this->db->where('bill_number !=', 0);

            if (!empty($filter['from_date'])) {
                $this->db->where('invoice_date >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('invoice_date <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['from_station_fk'])) {
                $this->db->where('from_station_fk', $filter['from_station_fk']);
            }
            if (!empty($filter['to_station_fk'])) {
                $this->db->where('to_station_fk', $filter['to_station_fk']);
            }
            if (!empty($filter['branch_id_fk'])) {
                $this->db->where('branch_id_fk', $filter['branch_id_fk']);
            }
            $this->data['total_billing_amount'] = $this->db->get()->row()->bill_total;
            
            $this->data['display'] = TRUE;
        }
        else{
            //Total GR
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->data['total_gr'] = $this->db->get()->num_rows();

            //Cancelled GR
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->db->where('cancelled_gr', 'Y');
            $this->data['cancelled_gr'] = $this->db->get()->num_rows();

            //Total LHC
            $this->db->select('challan_dispatch.*');
            $this->db->from('challan_dispatch');
            $this->db->join('booking_gr', "booking_gr.bgr_id = challan_dispatch.gr_no_fk"); 
            $this->data['total_lhc'] = $this->db->get()->num_rows();
            
            //TOTAL MAIN CHALLAN
            $this->db->select('main_challan.*');
            $this->db->from('main_challan');
            $this->db->join('booking_gr', "booking_gr.bgr_id = main_challan.bgr_id_fk");
            $this->data['main_challan'] = $this->db->get()->num_rows();

            //TOTAL POD RECEIVED
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->db->where('pod_status', 'Received');
            $this->data['pod_received'] = $this->db->get()->num_rows();

            //TOTAL POD PENDING
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->db->where('pod_status', 'Pending');            
            $this->data['pod_pending'] = $this->db->get()->num_rows();

            //TOTAl PENDING DELIVERY
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->db->where('delivery_status =', 'Pending');
            $this->data['pending_delivery'] = $this->db->get()->num_rows();              
            
            //TOTAl DELIVERED DELIVERY
            $this->db->select('*');
            $this->db->from('booking_gr');
            $this->db->where('delivery_status =', 'Delivered');
            $this->data['delivered_delivery'] = $this->db->get()->num_rows();              

            //TOTAl BILLING
            $this->db->select('*');
            $this->db->from('book_billing');
//            $this->db->where('bill_number !=', 0);
            $this->data['total_billing_count'] = $this->db->get()->num_rows();

            //TOTAl BILLING AMOUNT
            $this->db->select_sum('bill_total');
            $this->db->from('booking_gr');
            $this->db->where('bill_number !=', 0);
            $gr_total = $this->db->get()->row()->bill_total;

            $this->db->select_sum('bill_total');
            $this->db->from('fresh_booking_gr');
            $this->db->where('bill_number !=', 0);
            $fresht_gr_total = $this->db->get()->row()->bill_total;
            $this->data['total_billing_amount'] = $gr_total + $fresht_gr_total; 


            //TOTAl PAYMENT RECEIVED
            $this->db->select_sum('bill_total');
            $this->db->from('booking_gr');
            $this->db->where('payment_date !=', NULL);
            $gr_total = $this->db->get()->row()->bill_total;

            $this->db->select_sum('bill_total');
            $this->db->from('fresh_booking_gr');
            $this->db->where('payment_date !=', NULL);
            $fresht_gr_total = $this->db->get()->row()->bill_total;
            $this->data['total_payment_received'] = $gr_total + $fresht_gr_total;             

            //TOTAl PAYMENT RECEIVED FOR BILLING
            $this->db->select('*');
            $this->db->from('book_billing');
            $this->db->where('payment_date !=', NULL);
            $this->data['total_received_bill'] = $this->db->get()->num_rows();


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

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->view('reports/branch_report', $this->data);
    }

}
