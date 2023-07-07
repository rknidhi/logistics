<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_account extends CI_Controller {

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
      /*  if (!$this->flexi_auth->is_privileged('User')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }*/

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['users'] = $this->db->from('user_accounts')
                ->join('user_profiles', 'user_profiles.upro_uacc_fk = user_accounts.uacc_id', 'left')
                ->join('user_groups', 'user_groups.ugrp_id = user_accounts.uacc_group_fk', 'left')
                //->where('user_accounts.uacc_group_fk', '4')
                ->get()
                ->result();
        $this->load->view('master/user_account/view', $this->data);
    }

    function add_user() {
        $this->data['groups'] = $this->functions->get_all_row('user_groups');
        $this->load->view('master/user_account/add', $this->data);
    }

    function edit_user($uacc_id) {
        $this->data['groups'] = $this->functions->get_all_row('user_groups');
        $this->data['user_details'] = $this->db->from('user_accounts')
                ->join('user_profiles', 'user_profiles.upro_uacc_fk = user_accounts.uacc_id', 'left')
                ->join('user_groups', 'user_groups.ugrp_id = user_accounts.uacc_group_fk', 'left')
                ->where('user_accounts.uacc_id', $uacc_id)
                ->get()
                ->row();
        $this->load->view('master/user_account/edit', $this->data);
    }

    function user_details($uacc_id) {
        $this->data['groups'] = $this->functions->get_all_row('user_groups');
        $this->data['user_details'] = $this->db->from('user_accounts')
                ->join('user_profiles', 'user_profiles.upro_uacc_fk = user_accounts.uacc_id', 'left')
                ->join('user_groups', 'user_groups.ugrp_id = user_accounts.uacc_group_fk', 'left')
                ->where('user_accounts.uacc_id', $uacc_id)
                ->get()
                ->row();
        $this->load->view('master/user_account/details', $this->data);
    }

    function user_password($uacc_id) {

        $this->data['user_details'] = $this->db->from('user_accounts')
                ->join('user_profiles', 'user_profiles.upro_uacc_fk = user_accounts.uacc_id', 'left')
                ->join('user_groups', 'user_groups.ugrp_id = user_accounts.uacc_group_fk', 'left')
                ->where('user_accounts.uacc_id', $uacc_id)
                ->get()
                ->row();

        $this->load->view('master/user_account/password', $this->data);
    }

    function add() {
        $user_data = $this->input->post('data');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $group = $this->input->post('group');
        if (!empty(($_FILES['image_em']['name']))) {
            $this->load->library('image_lib');
            $source_path = $_FILES['image_em']['tmp_name'];
            $filename = $_FILES['image_em']['name'];
            $array = explode('.', $filename);
            $extention = array_pop($array);
            $image_name = url_title(str_replace(' ', '_', implode('.', $array)));
            $new_image_name = time() . '_' . $image_name . '.' . $extention;
            $new_thumb_name = time() . '_' . $image_name . '.' . $extention;
            $image_destination = "./uploaded_files/user_profile/" . $new_image_name;
            $thumb_destination = "./uploaded_files/user_profile/thumb/" . $new_thumb_name;
            $this->function_library->upload_image_with_thumb($source_path, $image_destination, $thumb_destination, $extention, 103, 103, 0);
            $user_data['user_profile_pic'] = $new_image_name;
        }
        $user_data['created_by_fk'] = $this->flexi_auth->get_user_id();
        $username = $this->function_library->username();

        $user_id = $this->flexi_auth->insert_user($email, $username, $password, $user_data, $group, '1');

        //Added In Ledger Master
        $ledgerdata['ledger_type'] = 6; //User
        $ledgerdata['reference_no'] = $user_id;
        $ledgerdata['ledger_name'] = $user_data['user_firstname'] . ' ' . $user_data['user_lastname'];
        $ledgerdata['ledger_tin'] = '';
        $ledgerdata['gstin'] = '';
        $ledgerdata['panno'] = '';
        $ledgerdata['address'] = '';
        $ledgerdata['branch_agent_id_fk'] = '';
        $ledgerdata['company_id_fk'] = '';
        $ledgerdata['added_on'] = date("Y-m-d h:i:s");
        $ledgerdata['modified_by'] = $this->flexi_auth->get_user_id();
        $this->functions->insert_into_table('ac_ledger_master', $ledgerdata);


        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $user_id;
        $activites['activity_type'] = 'User Account';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added user account.';
        $activites['module'] = 'master/user_account';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);
        if ($user_id) {
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

    function update($uacc_id_fk) {
        $user_data = $this->input->post('data');
        $email = $this->input->post('email');
        if (!empty($_FILES['image_em']['name'])) {
            $this->functions->remove_image('user_profiles', 'upro_uacc_fk', $uacc_id_fk, 'user_profile', 'user_profile_pic', 1);
            $this->load->library('image_lib');
            $source_path = $_FILES['image_em']['tmp_name'];
            $filename = $_FILES['image_em']['name'];
            $array = explode('.', $filename);
            $extention = array_pop($array);
            $image_name = url_title(str_replace(' ', '_', implode('.', $array)));
            $new_image_name = time() . '_' . $image_name . '.' . $extention;
            $new_thumb_name = time() . '_' . $image_name . '.' . $extention;
            $image_destination = "./uploaded_files/user_profile/" . $new_image_name;
            $thumb_destination = "./uploaded_files/user_profile/thumb/" . $new_thumb_name;
            $this->function_library->upload_image_with_thumb($source_path, $image_destination, $thumb_destination, $extention, 103, 103, 0);
            $user_data['user_profile_pic'] = $new_image_name;
        }


        $this->functions->update_table_rows('user_accounts', 'uacc_id', $uacc_id_fk, array('uacc_email' => $email));

        $this->flexi_auth->update_user($uacc_id_fk, $user_data);


        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $uacc_id_fk;
        $activites['activity_type'] = 'User Account';
        $activites['action'] = 'updated';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added user account.';
        $activites['module'] = 'master/user_account';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);
        $response =1;
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

    public function notify($user_id, $password) {
        $user = $this->client_model->get_client($user_id);
        $data['user_data'] = $user;
        $data['password'] = $password;
        $sms = 'Thank you for registering on Quivr. Your login ID is ' . $user->uacc_email . ' and your password is ' . $password;
        $email = $this->load->view('email_templates/central_users', $data, TRUE);
        sms_me($sms, $user->user_phone);
        send_whatsapp($sms, $user->user_phone);
        $this->function_model->send_mail('Quivr Sign Up', $user->uacc_email, 'no-reply@quivr.in', 'Quivr Sign Up', $email);
        return;
    }

    public function reset_password($user_id) {
        $this->load->model('Auth_model', 'auth_model');
        $response = $this->auth_model->reset_password();
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

    public function change_user_status() {
        $id = $this->input->post('id');
        if ($this->flexi_auth->get_user_id() == $id) {
            echo 1;
        }

        $status = $this->db->where('uacc_id', $id)
                ->get('user_accounts')
                ->row();

        if ($status->uacc_suspend == '0') {
            $response = '<button class="btn btn-danger btn-icon btn-xs" id="' . $id . '" onclick="change_status(' . $id . ')"><i class="fa fa-times"></i></button>';
            $data = array('uacc_suspend' => 1);
        } else {
            $response = '<button class="btn btn-success btn-icon btn-xs" id="' . $id . '" onclick="change_status(' . $id . ')"><i class="fa fa-check"></i></button>';
            $data = array('uacc_suspend' => 0);
        }
        $this->db->where('uacc_id', $id)
                ->update('user_accounts', $data);
        echo $response;
    }

    function delete() {
        $id = $this->input->post('id');
        $profile = $this->db->where('upro_uacc_fk', $id)
                ->get('user_profiles')
                ->row();

        $image_name = $profile->user_profile_pic;
        if ($image_name != 'no-image.png') {
            unlink('uploaded_files/user_profile/' . $image_name);
        }
        $this->db->where('upro_uacc_fk', $id)
                ->delete('user_profiles');
        $this->db->where('uacc_id', $id)
                ->delete('user_accounts');
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $id;
        $activites['activity_type'] = 'User Account';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted user account.';
        $activites['module'] = 'master/user_account';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);


        if ($image_name) {
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

    public function check_email() {
        $email = $this->input->post('email');
        $response = $this->function_model->get_num_rows('user_accounts', 'uacc_email', $email);
        if (!$response) {
            echo '1';
            die;
        } else {
            echo '0';
            die;
        }
    }

    public function check_mobile() {
        $mobile = $this->input->post('mobile');
        $response = $this->function_model->get_num_rows('user_profile', 'uacc_phone', $mobile);
        if (!$response) {
            echo '1';
            die;
        } else {
            echo '0';
            die;
        }
    }

}
