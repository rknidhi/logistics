<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Outward_report extends CI_Controller {

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
        if (!$this->flexi_auth->is_privileged('Outward Report')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
        if (!empty($this->input->post('submit'))) {
            #echo '<pre>';
            #print_r($this->input->post());
            #die;
            $filter = $this->input->post();
            $this->db->select('*');
            $this->db->from('tbl_outwards');

            if (!empty($filter['from_date'])) {
                $this->db->where('outward_date >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('outward_date <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['outward_no_from'])) {
                $this->db->where('outward_id >=', $filter['outward_no_from']);
            }
            if (!empty($filter['outward_no_to'])) {
                $this->db->where('outward_id <=', $filter['outward_no_to']);
            }
            if (!empty($filter['doc_invoice_no'])) {
                $this->db->where('doc_invoice_no', $filter['doc_invoice_no']);
            }
            if (!empty($filter['vendor_id_fk'])) {
                $this->db->where('vendor_id_fk', $filter['vendor_id_fk']);
            }
            if (!empty($filter['transport_name'])) {
                $this->db->like('transport_name', $filter['transport_name']);
            }
            if (!empty($filter['vehicle_no'])) {
                $this->db->like('vehicle_no', $filter['vehicle_no']);
            }
            if (!empty($filter['gr_no'])) {
                $this->db->where('gr_no', $filter['gr_no']);
            }
            if (!empty($filter['branch_id_fk'])) {
                $this->db->where('branch_id_fk', $filter['branch_id_fk']);
            }
            $this->data['records'] = $this->db->get()->result();
            #echo '<pre>';
            #print_r($this->db->last_query());
            #die;
            $this->data['display'] = TRUE;
        }
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->data['stations'] = $this->functions->get_all_active_row('tbl_master_station');
        $this->data['vehicles'] = $this->functions->get_all_active_row('tbl_master_vehicle');
        $this->data['freight_methods'] = $this->functions->get_all_active_row('tbl_master_freight_method');


        // Modified by Rakesh Dated 02&06/08/19
        // $this->data['items'] = $this->functions->get_all_active_row('tbl_master_item');
        $this->data['vendors'] = $this->functions->get_all_active_row('tbl_master_vendors'); //06
        $this->data['items'] = $this->functions->get_all_row('tbl_warehouse_item');
        $this->data['inwardtransport'] = $this->functions->get_transport_name('tbl_outwards');
        // End

        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['delivery_modes'] = $this->functions->get_all_active_row('tbl_master_delivery_mode');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['brokers'] = $this->functions->get_all_active_row('tbl_master_broker');


        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');

        $this->load->view('reports/outward_report', $this->data);
    }

}
