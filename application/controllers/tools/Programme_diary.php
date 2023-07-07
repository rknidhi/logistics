<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programme_diary extends CI_Controller {

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
        $this->load->vars('menu_nevigation', 'tools');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function index() {
        if (!$this->flexi_auth->is_privileged('Program Diary')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
        if (!empty($this->input->post('submit'))) {
            #echo '<pre>';
            #print_r($this->input->post());
            #die;
            $filter = $this->input->post();

            $this->db->select('tbl_programme_dir.*');
            $this->db->from('tbl_programme_dir');
            $this->db->join('tbl_master_party', 'tbl_programme_dir.consignor_id_fk = tbl_master_party.party_id');

            if (!empty($filter['from_date'])) {
                $this->db->where('date(prg_date) >=', convertToMySQLDate($filter['from_date']));
            }
            if (!empty($filter['to_date'])) {
                $this->db->where('date(prg_date) <=', convertToMySQLDate($filter['to_date']));
            }
            if (!empty($filter['branch_id'])) {
                $this->db->where('tbl_master_party.branch_agent_id_fk', $filter['branch_id']);
            }
            $this->data['records'] = $this->db->get()->result();
            #echo $this->db->last_query();
            #die;
            $this->data['display'] = TRUE;
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_active_row('tbl_master_party');
        $this->data['stations'] = $this->functions->get_all_active_row('tbl_master_station');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');

        $this->load->view('tools/programme_diary/add', $this->data);
    }

    function delete() {
        $prgd_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('tbl_programme_dir', 'prgd_id', $prgd_id);

        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $prgd_id;
        $activites['activity_type'] = 'Program Diary';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted phone directory.';
        $activites['module'] = 'tools/programme_diary';
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
        $data['prg_date'] = date("Y-m-d h:i:s", strtotime($data['prg_date']));
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['status'] = 1;
        $data['added_on'] = date("Y-m-d h:i:s");
        $response = $this->functions->insert_into_table('tbl_programme_dir', $data);

        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $response;
        $activites['activity_type'] = 'Programme Diary';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added phone directory.';
        $activites['module'] = 'tools/programme_diary';
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

    function update($phd_id) {
        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $response = $this->functions->update_table_rows('tbl_phone_directory', 'phd_id', $phd_id, $data);

        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $phd_id;
        $activites['activity_type'] = 'Programme Diary';
        $activites['action'] = 'updated';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated phone directory.';
        $activites['module'] = 'tools/phonedirectory';
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
