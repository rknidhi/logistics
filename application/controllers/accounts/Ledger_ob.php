<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ledger_ob extends CI_Controller {

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
        $this->load->vars('menu_nevigation', 'pod');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function index() {
        if (!$this->flexi_auth->is_privileged('Ledger Opening Balan')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {

            $this->db->select('*');
            if (!empty($this->input->post('ledger_name'))) {
                $this->db->where('ledger_id', $this->input->post('ledger_name'));
            }
            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_agent_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('balance_type'))) {
                $this->db->where('balance_type', $this->input->post('balance_type'));
            }

            $this->data['myledgers'] = $this->db->from('ac_ledger_master')->get()->result();
            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');

        $this->data['ledgers'] = $this->functions->get_all_row('ac_ledger_master');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/ledger_ob/search', $this->data);
    }

    function edit_opening_balance($ledger_id) {
        $this->data['ledger'] = $this->functions->get_single_row('ac_ledger_master', 'ledger_id', $ledger_id);
        $this->load->view('account/ledger_ob/edit_details', $this->data);
    }

    function update($ledger_id) {
        $data = $this->input->post('data');
        $data['opening_date'] = !empty($data['opening_date']) ? system_date($data['opening_date']) : NULL;
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['last_modified'] = date("Y-m-d h:i:s");
        $response = $this->functions->update_table_rows('ac_ledger_master', 'ledger_id', $ledger_id, $data);
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

}
