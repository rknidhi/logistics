<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {

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
        $this->load->vars('menu_nevigation', 'tracking');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function index() {
        if (!$this->flexi_auth->is_privileged('View Tracking')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
        $this->data['gr_no'] = '';
        if ($this->input->post('search') && $this->input->post('gr_no')) {
            $this->data['gr_no'] = $this->input->post('gr_no');
            $bgr_id = $this->input->post('gr_no');
            $this->data['gr_details'] = $gr_details = $this->functions->get_single_row('booking_gr', 'bgr_id', $bgr_id);
            $this->data['tracking_details'] = $this->functions->get_all_row_id_based('tracking', 'bgr_id_fk', $bgr_id);

            if (!empty($gr_details->broker_id_fk)) {
                $this->data['broker_details'] = $this->functions->get_single_row('tbl_master_broker', 'broker_id', $gr_details->broker_id_fk);
            } else {
                $this->data['broker_details'] = array();
            }
            if (!empty($gr_details->bgr_id)) {
                $this->data['display'] = TRUE;
            }
        } else {
            $this->data['display'] = FALSE;
        }


        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_row('tbl_master_party');
        $this->data['stations'] = $this->functions->get_all_row('tbl_master_station');
        $this->data['vehicles'] = $this->functions->get_all_row('tbl_master_vehicle');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['brokers'] = $this->functions->get_all_row('tbl_master_broker');
        $this->load->view('tracking/tracking', $this->data);
    }

    function add_tracking($bgr_id_fk) {
        $this->data['bgr_id_fk'] = $bgr_id_fk;
        $this->load->view('tracking/add_tracking', $this->data);
    }

    function add_new() {
        if (!$this->flexi_auth->is_privileged('Add Tracking')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges";
            echo json_encode($data_arr);
            die;
        }
        $data = $this->input->post('data');
        $data['track_date'] = !empty($data['track_date']) ? system_date($data['track_date']) : NULL;
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['status'] = 1;
        $data['added_on'] = date("Y-m-d h:i:s");
        $response = $this->functions->insert_into_table('tracking', $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $response;
        $activites['activity_type'] = 'Tracking';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added tracking.';
        $activites['module'] = 'tracking';
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

    function delete() {
        if (!$this->flexi_auth->is_privileged('Delete Tracking')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges";
            echo json_encode($data_arr);
            die;
        }
        $tracking_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('tracking', 'tracking_id', $tracking_id);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $tracking_id;
        $activites['activity_type'] = 'Tracking';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted tracking.';
        $activites['module'] = 'tracking';
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

    function edit_tracking($tracking_id) {
        $this->data['tracking'] = $this->functions->get_single_row('tracking', 'tracking_id', $tracking_id);
        $this->load->view('tracking/edit_tracking', $this->data);
    }

    function update($tracking_id) {
        if (!$this->flexi_auth->is_privileged('Edit Tracking')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges";
            echo json_encode($data_arr);
            die;
        }
        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['track_date'] = !empty($data['track_date']) ? system_date($data['track_date']) : NULL;
        $response = $this->functions->update_table_rows('tracking', 'tracking_id', $tracking_id, $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $tracking_id;
        $activites['activity_type'] = 'Tracking';
        $activites['action'] = 'updated';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated tracking.';
        $activites['module'] = 'tracking';
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





    // Edited by Rakesh Dated : 24/07/2019

     function deliverdgr()
     {
       $d_date = $this->input->post('delivery_received_date');

       $data['delivery_received_date'] = !empty($d_date) ? system_date($d_date) : NULL;
       $data['delivery_status'] = $this->input->post('delivery_status');
       $bgr_id = $this->input->post('gr_no');
       $response = $this->functions->update_table_rows('booking_gr', 'bgr_id', $bgr_id, $data);       

        if ($response) {
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Updated";
            echo json_encode($data_arr);
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
     }

    // End

}
