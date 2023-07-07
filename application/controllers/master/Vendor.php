<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

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
        if (!$this->flexi_auth->is_privileged('Vendor Master')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['vendors'] = $this->functions->get_all_row('tbl_master_vendors');
        $this->load->view('master/vendor/view', $this->data);
    }

    function add_vendor() {
        if (!$this->flexi_auth->is_privileged('Vendor Master')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['states'] = $this->functions->get_all_active_row('tbl_master_states');
        $this->load->view('master/vendor/add', $this->data);
    }

    function edit_vendor($vendor_id) {
        if (!$this->flexi_auth->is_privileged('Vendor Master')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['states'] = $this->functions->get_all_active_row('tbl_master_states');
        $this->data['vendor'] = $this->functions->get_single_row('tbl_master_vendors', 'vendor_id', $vendor_id);
        $this->load->view('master/vendor/edit', $this->data);
    }

    function vendor_details($vendor_id) {
        if (!$this->flexi_auth->is_privileged('Vendor Master')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vendor'] = $this->functions->get_single_row('tbl_master_vendors', 'vendor_id', $vendor_id);
        $this->load->view('master/vendor/details', $this->data);
    }

    function delete() {
        if (!$this->flexi_auth->is_privileged('Vendor Master')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges";
            echo json_encode($data_arr);
        }
        $vendor_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('tbl_master_vendors', 'vendor_id', $vendor_id);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $vendor_id;
        $activites['activity_type'] = 'Vendor';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted vendor.';
        $activites['module'] = 'master/vendor';
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

    function add() {
        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['status'] = 1;
        $data['added_on'] = date("Y-m-d h:i:s");
        $response = $this->functions->insert_into_table('tbl_master_vendors', $data);
        //Added In Ledger Master
        $ledgerdata['ledger_type'] = 2; //Vendor
        $ledgerdata['reference_no'] = $response;
        $ledgerdata['ledger_name'] = $data['vendor_name'];
        $ledgerdata['ledger_tin'] = '';
        $ledgerdata['gstin'] = $data['vendor_gstin'];
        $ledgerdata['panno'] = '';
        $ledgerdata['address'] = $data['vendor_address'];
        $ledgerdata['branch_agent_id_fk'] = '';
        $ledgerdata['company_id_fk'] = '';
        $ledgerdata['added_on'] = date("Y-m-d h:i:s");
        $ledgerdata['modified_by'] = $this->flexi_auth->get_user_id();
        $this->functions->insert_into_table('ac_ledger_master', $ledgerdata);

        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $response;
        $activites['activity_type'] = 'Vendor';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added vendor.';
        $activites['module'] = 'master/vendor';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);

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

    function update($vendor_id) {

        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $response = $this->functions->update_table_rows('tbl_master_vendors', 'vendor_id', $vendor_id, $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $vendor_id;
        $activites['activity_type'] = 'Vendor';
        $activites['action'] = 'updated';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated vendor.';
        $activites['module'] = 'master/vendor';
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

}
