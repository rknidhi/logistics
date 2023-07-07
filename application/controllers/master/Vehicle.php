<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

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
        if (!$this->flexi_auth->is_privileged('Vehicle Master')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['vehicles'] = $this->functions->get_all_row('tbl_master_vehicle');
        $this->load->view('master/vehicle/view', $this->data);
    }

    function add_vehicle() {
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver');
        $this->data['vendors'] = $this->functions->get_all_active_row('tbl_master_vendors');
        $this->load->view('master/vehicle/add', $this->data);
    }

    function edit_vehicle($vehicle_id) {
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver');
        $this->data['vendors'] = $this->functions->get_all_active_row('tbl_master_vendors');
        $this->data['vehicle'] = $this->functions->get_single_row('tbl_master_vehicle', 'vehicle_id', $vehicle_id);
        $this->load->view('master/vehicle/edit', $this->data);
    }

    function vehicle_details($vehicle_id) {
        #$this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        #$this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver');
        #$this->data['vendors'] = $this->functions->get_all_active_row('tbl_master_vendors');
        $this->data['vehicle'] = $this->functions->get_single_row('tbl_master_vehicle', 'vehicle_id', $vehicle_id);
        $this->load->view('master/vehicle/details', $this->data);
    }

    function delete() {
        $vehicle_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('tbl_master_vehicle', 'vehicle_id', $vehicle_id);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $vehicle_id;
        $activites['activity_type'] = 'Vehicle';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted vehicle.';
        $activites['module'] = 'master/vehicle';
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
        $response = $this->functions->insert_into_table('tbl_master_vehicle', $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $response;
        $activites['activity_type'] = 'Vehicle';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added vehicle.';
        $activites['module'] = 'master/vehicle';
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

    function update($vehicle_id) {
        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $response = $this->functions->update_table_rows('tbl_master_vehicle', 'vehicle_id', $vehicle_id, $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $vehicle_id;
        $activites['activity_type'] = 'Vehicle';
        $activites['action'] = 'updated';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated vehicle.';
        $activites['module'] = 'master/vehicle';
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

    function add_vehicle_ajax() {
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['drivers'] = $this->functions->get_all_active_row('tbl_master_driver');
        $this->data['vendors'] = $this->functions->get_all_active_row('tbl_master_vendors');
        $this->load->view('master/vehicle/add_ajax', $this->data);
    }

    function add_ajax() {
        $data = $this->input->post('data');
        $data = array_filter($data);
        $data['fleet_id_desc'] =genrateId('tbl_master_vehicle');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['status'] = 1;
        $data['added_on'] = date("Y-m-d h:i:s");
        $response = $this->functions->insert_into_table('tbl_master_vehicle', $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $response;
        $activites['activity_type'] = 'Vehicle';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added vehicle.';
        $activites['module'] = 'master/vehicle';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);

        if ($response) {
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "$response";
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
    }

}
