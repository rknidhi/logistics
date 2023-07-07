<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pod extends CI_Controller {

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

        $this->load->helper(array('form','url'));
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
        if (!$this->flexi_auth->is_privileged('Manage POD')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {
            $this->db->select('*');
            if (!empty($this->input->post('pod_branch'))) {
                $this->db->where('pod_branch', $this->input->post('pod_branch'));
            }
            if (!empty($this->input->post('pod_status'))) {
                $this->db->where('pod_status', $this->input->post('pod_status'));
            }
            if (!empty($this->input->post('party'))) {
                $this->db->where('consignor_id_fk', $this->input->post('party'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('gr_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('gr_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('gr_no'))) {
                $this->db->where('bgr_id', $this->input->post('gr_no'));
            }
            $this->data['gr_details'] = $this->db->from('booking_gr')->get()->result();
            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = TRUE;
            $this->data['gr_details'] = $this->db->from('booking_gr')->get()->result();
            
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['parties'] = $this->functions->get_all_row('tbl_master_party');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['brokers'] = $this->functions->get_all_row('tbl_master_broker');
        $this->load->view('pod/pod', $this->data);
    }

    function edit_pod($bgr_id) {
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['gr_detail'] = $this->functions->get_single_row('booking_gr', 'bgr_id', $bgr_id);
       // $this->load->view('pod/edit_pod', $this->data);
       $this->load->view('pod/upload_pod', $this->data);
    }

    function update($bgr_id) {
        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['pod_received_date'] = !empty($data['pod_received_date']) ? system_date($data['pod_received_date']) : NULL;

        $response = $this->functions->update_table_rows('booking_gr', 'bgr_id', $bgr_id, $data);

        //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $bgr_id;
            $activites['activity_type'] = 'Pod';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated pod.';
            $activites['module'] = 'Pod';
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
    function update1($bgr_id) {
//ALTER TABLE `booking_gr` ADD `pod_file_name` VARCHAR(400) NOT NULL AFTER `delivery_status`;
        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
 /*       if($data['pod_status']='Pending'){
            $data['pod_received_date'] = NULL;
            $data['pod_branch'] = '';
        }
        else{ */
            $data['pod_received_date'] = !empty($data['pod_received_date']) ? system_date($data['pod_received_date']) : NULL;
       // }
        $get_pod_file = $this->functions->get_single_row('booking_gr', 'bgr_id', $bgr_id);

        $result = FALSE;
        //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $bgr_id;
            $activites['activity_type'] = 'Pod';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated pod.';
            $activites['module'] = 'Pod';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);        

            $config['upload_path']="./uploaded_files/pod_file/";
            $config['allowed_types']='gif|jpg|jpeg|png|pdf';
            $config['encrypt_name'] = TRUE;
             
            $this->load->library('upload', $config);
            if($this->upload->do_upload("image_em")){
                $data1 = array('upload_data' => $this->upload->data());
                $data['pod_file_name'] = $data1['upload_data']['file_name'];
                $result = $this->functions->update_table_rows('booking_gr', 'bgr_id', $bgr_id, $data);
                $result =TRUE;
            }
            if($result) { 
                @unlink("./uploaded_files/pod_file/$get_pod_file->pod_file_name");
                redirect('pod');
                    //$data_arr["status"] = 'success';
                    //$data_arr["status_message"] = "Updated";
                    //echo json_encode($data_arr);
                    // die;
            }
            else{
                redirect('pod');
                //$data_arr["status"] = 'fail';
                //$data_arr["status_message"] = "Try Again";
                echo json_encode($data_arr);
            }
            // End
    }   


    // Dated 04-10-19

    function uploadpod($bgr_id){
        $this->data['gr_detail'] = $this->functions->get_single_row('booking_gr', 'bgr_id', $bgr_id);
        $this->load->view('pod/upload_file', $this->data);
    }

    function download_pod($fileName){
        $this->load->helper('download');
        if ($fileName) {
             $data = file_get_contents ($base_url.'uploaded_files/pod_file/'. $fileName);
             force_download ( $fileName, $data );
            }
    }

    function uploadpod1($bgr_id){
        if(isset($_FILES["imageem"]["name"])){
            $get_pod_file = $this->functions->get_single_row('booking_gr', 'bgr_id', $bgr_id);
            $config['upload_path']   = "./uploaded_files/pod_file";
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
            $config['encrypt_name']  = TRUE;
            $data_arr = array(); 
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('imageem')){ 
                $data_arr['status'] = "success";
                $data_arr['status_message'] = "Fail";
                echo json_encode( $data_arr );
                }
            else {
                @unlink("./uploaded_files/pod_file/$get_pod_file->pod_file_name");
                $data1 = array('upload_data' => $this->upload->data());
                $data['pod_file_name'] = $data1['upload_data']['file_name'];
                $result = $this->functions->update_table_rows('booking_gr', 'bgr_id', $bgr_id, $data);
                $data_arr['status'] = "success";
                $data_arr['status_message'] = "Updated";
                echo base64_encode(json_encode( $data_arr ));
            }
        }
    }
    // End 
}