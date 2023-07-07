<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pending_delivery_report extends CI_Controller {

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
        if (!$this->flexi_auth->is_privileged('Pending Delivery Rep')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = TRUE;
        if (!empty($this->input->post('submit'))) {
            $filter = $this->input->post();
            $this->db->select('*');
            $this->db->from('challan_dispatch');
            $this->db->where('delivery_status', 'Pending');

            if (!empty($filter['lhc_from'])) {
                $this->db->where('lhc_number >=', $filter['lhc_from']);
            }
            if (!empty($filter['lhc_to'])) {
                $this->db->where('lhc_number <=', $filter['lhc_to']);
            }

            if (!empty($filter['vehicle_id'])) {
                $this->db->where('vehicle_id_fk', $filter['vehicle_id']);
            }
            if (!empty($filter['from_date'])) {
                $this->db->where('added_on >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('added_on <=', convertToMySQLDate($filter['to_date']));
            }

            $this->data['records'] = $this->db->get()->result();
            $this->data['display'] = TRUE;
        }
        else {
            $this->db->select('*');
            $this->db->from('challan_dispatch');
            $this->db->where('delivery_status', 'Pending');
            $this->data['records'] = $this->db->get()->result();
        }
        $this->data['vehicles'] = $this->functions->get_all_active_row('tbl_master_vehicle');
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->view('reports/pending_delivery_report', $this->data);
    }

}
