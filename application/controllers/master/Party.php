<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Party extends CI_Controller {

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
        if (!$this->flexi_auth->is_privileged('Party Master')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_row('tbl_master_party');
        $this->load->view('master/party/view', $this->data);
    }

    function add_party() {
        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['bagents'] = $this->functions->get_all_active_row('tbl_master_branch_agent');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->load->view('master/party/add', $this->data);
    }

    function edit_party($party_id) {
        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['bagents'] = $this->functions->get_all_active_row('tbl_master_branch_agent');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['party'] = $this->functions->get_single_row('tbl_master_party', 'party_id', $party_id);
        $this->load->view('master/party/edit', $this->data);
    }

    function party_details($party_id) {
        $this->data['party'] = $this->functions->get_single_row('tbl_master_party', 'party_id', $party_id);
        $this->load->view('master/party/details', $this->data);
    }

    function delete() {
        $party_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('tbl_master_party', 'party_id', $party_id);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $party_id;
        $activites['activity_type'] = 'Party';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted party.';
        $activites['module'] = 'master/party';
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
        $response = $this->functions->insert_into_table('tbl_master_party', $data);

        //Added In Ledger Master
        $ledgerdata['ledger_type'] = 1; //Party
        $ledgerdata['reference_no'] = $response;
        $ledgerdata['ledger_name'] = $data['party_name'];
        $ledgerdata['ledger_tin'] = $data['tin_no'];
        $ledgerdata['gstin'] = $data['gst_no'];
        $ledgerdata['panno'] = $data['pan_card_no'];
        $ledgerdata['address'] = $data['address'];
        $ledgerdata['branch_agent_id_fk'] = $data['branch_agent_id_fk'];
        $ledgerdata['company_id_fk'] = $data['company_id_fk'];
        $ledgerdata['added_on'] = date("Y-m-d h:i:s");
        $ledgerdata['modified_by'] = $this->flexi_auth->get_user_id();

        $this->functions->insert_into_table('ac_ledger_master', $ledgerdata);

        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $response;
        $activites['activity_type'] = 'Party';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added party.';
        $activites['module'] = 'master/party';
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

    function update($party_id) {
        $data = $this->input->post('data');
        if (empty($data['is_oem_client']))
            $data['is_oem_client'] = '';
        if (empty($data['is_print_igst']))
            $data['is_print_igst'] = '';

        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $response = $this->functions->update_table_rows('tbl_master_party', 'party_id', $party_id, $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $party_id;
        $activites['activity_type'] = 'Party';
        $activites['action'] = 'updated';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated party.';
        $activites['module'] = 'master/party';
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

    function add_party_ajax($type) {
        $this->data['type'] = $type;
        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['bagents'] = $this->functions->get_all_active_row('tbl_master_branch_agent');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->load->view('master/party/add_ajax_1', $this->data);
    }

    function add_ajax() {
        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['status'] = 1;
        $data['added_on'] = date("Y-m-d h:i:s");
        $response = $this->functions->insert_into_table('tbl_master_party', $data);

        //Added In Ledger Master
        $ledgerdata['ledger_type'] = 1;//Party
        $ledgerdata['reference_no'] = $response;
        $ledgerdata['ledger_name'] = $data['party_name'];
        $ledgerdata['ledger_tin'] = $data['tin_no'];
        $ledgerdata['gstin'] = $data['gst_no'];
        $ledgerdata['panno'] = $data['pan_card_no'];
        $ledgerdata['address'] = '';
        $ledgerdata['branch_agent_id_fk'] = $data['branch_agent_id_fk'];
        $ledgerdata['company_id_fk'] = $data['company_id_fk'];
        $ledgerdata['added_on'] = date("Y-m-d h:i:s");
        $ledgerdata['modified_by'] = $this->flexi_auth->get_user_id();
        $this->functions->insert_into_table('ac_ledger_master', $ledgerdata);

        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $response;
        $activites['activity_type'] = 'Party';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added party.';
        $activites['module'] = 'master/party';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);

        if ($response) {
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = $response;
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
    }
}
