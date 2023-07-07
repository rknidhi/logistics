<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ledger_master extends CI_Controller {

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
        if (!$this->flexi_auth->is_privileged('Ledger Master')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['ledgers'] = $this->functions->get_all_row('ac_ledger_master');
        $this->load->view('account/ledger_master/view', $this->data);
    }

    function add_lm() {
        $this->data['bagents'] = $this->functions->get_all_active_row('tbl_master_branch_agent');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');

        $this->load->view('account/ledger_master/add', $this->data);
    }

    function edit_lm($ledger_id) {
        $this->data['bagents'] = $this->functions->get_all_active_row('tbl_master_branch_agent');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['ledger'] = $this->functions->get_single_row('ac_ledger_master', 'ledger_id', $ledger_id);
        $this->load->view('account/ledger_master/edit', $this->data);
    }

    

    function delete() {
        $ledger_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('ac_ledger_master', 'ledger_id', $ledger_id);

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

    function add() {
        $data = $this->input->post('data');
        
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['status'] = 1;
        $data['added_on'] = date("Y-m-d h:i:s");
        $response = $this->functions->insert_into_table('ac_ledger_master', $data);

        if ($response) {
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

    function update($ledger_id) {
        $data = $this->input->post('data');
        if (empty($data['is_primary']))
            $data['is_primary'] = '';

        $data['modified_by'] = $this->flexi_auth->get_user_id();
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

    function get_subgroup() {
        $aag_id_fk = $this->input->post('id');
        $where_array = array('aag_id_fk' => $aag_id_fk, 'status' => 1);
        $get_subgroups = $this->functions->get_all_row_multipe_where('ac_account_subgroup', $where_array);
        $res = '<option value="">Selec Sub Group</option>';
        foreach ($get_subgroups as $get_subgroup):
            $res .= '<option value="' . $get_subgroup->aasg_id . '">' . $get_subgroup->subgroup_name . '</option>';
        endforeach;
        echo $res;
    }

}
