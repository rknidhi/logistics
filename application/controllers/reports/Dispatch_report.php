<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dispatch_report extends CI_Controller {

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
        if (!$this->flexi_auth->is_privileged('LHC Report')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = TRUE;
        if (!empty($this->input->post('submit'))) {
            #echo '<pre>';
            #print_r($this->input->post());
            #die;
            $filter = $this->input->post();
            $this->db->select('challan_dispatch.*');
            $this->db->from('challan_dispatch');

        // Added on Dated: 24-09-19
            if (!empty($filter['balance_for'])) {
                $this->db->where('balance_for =', $filter['balance_for']);
            }
            // End
            if (!empty($filter['from_date'])) {
                $this->db->where('challan_dispatch.added_on >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('challan_dispatch.added_on <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['gr_fromstation'])) {
                $this->db->where('booking_gr.from_station_fk', $filter['gr_fromstation']);
            }
            if (!empty($filter['gr_tostation'])) {
                $this->db->where('booking_gr.to_station_fk', $filter['gr_tostation']);
            }
            if (!empty($filter['lhc_number_from'])) {
                $this->db->where('lhc_number >=', $filter['lhc_number_from']);
            }
            if (!empty($filter['lhc_number_to'])) {
                $this->db->where('lhc_number <=', $filter['lhc_number_to']);
            }
            if (!empty($filter['booking_party'])) {
                $this->db->where('booking_party', $filter['booking_party']);
            }
            if (!empty($filter['broker_id_fk'])) {
                $this->db->where('challan_dispatch.broker_id_fk', $filter['broker_id_fk']);
            }
           /* if (!empty($filter['driver_id_fk'])) {
                $this->db->where('driver_id_fk', $filter['driver_id_fk']);
            } */
            if (!empty($filter['gr_vehicle_no'])) {
                $this->db->where('gr_vehicle_no', $filter['gr_vehicle_no']);
            }
            if (!empty($filter['branch'])) {
                $this->db->where('booking_gr.branch_id_fk', $filter['branch']);
            }

            $this->db->join('booking_gr', "booking_gr.bgr_id = challan_dispatch.gr_no_fk");
            $this->data['records'] = $this->db->get()->result();
            #echo $this->db->last_query();
            #die;

            $this->data['display'] = TRUE;
        }
        else {
            $this->db->select('challan_dispatch.*');
            $this->db->from('challan_dispatch');
            $this->db->join('booking_gr', "booking_gr.bgr_id = challan_dispatch.gr_no_fk");
            $this->data['records'] = $this->db->get()->result();

        }
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->data['stations'] = $this->functions->get_all_active_row('tbl_master_station');
        $this->data['vehicles'] = $this->functions->get_all_active_row('tbl_master_vehicle');
        $this->data['freight_methods'] = $this->functions->get_all_active_row('tbl_master_freight_method');
        $this->data['items'] = $this->functions->get_all_active_row('tbl_master_item');
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver');
        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['delivery_modes'] = $this->functions->get_all_active_row('tbl_master_delivery_mode');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['brokers'] = $this->functions->get_all_active_row('tbl_master_broker');

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');

        $this->load->view('reports/dispatch_report', $this->data);
    }

}
