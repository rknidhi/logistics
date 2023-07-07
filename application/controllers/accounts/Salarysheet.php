<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salarysheet extends CI_Controller {

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
        if (!$this->flexi_auth->is_privileged('Salary Sheet')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {

            $this->db->select('salary_sheet.*');
            $this->db->join('tbl_master_employee', "tbl_master_employee.employee_id=salary_sheet.employee_id_fk");

            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('tbl_master_employee.branch_agent_id_fk', $this->input->post('branch_name'));
            }

            if (!empty($this->input->post('employee_id_fk'))) {
                $this->db->where('employee_id_fk', $this->input->post('employee_id_fk'));
            }

            if (!empty($this->input->post('month_year'))) {
                $this->db->where('month_year', $this->input->post('month_year'));
            }

            if (!empty($this->input->post('designation'))) {
                $this->db->where('tbl_master_employee.designation', $this->input->post('designation'));
            }
            $this->data['display'] = TRUE;

            $this->data['salary_sheets'] = $vouchers = $this->db->from('salary_sheet')->get()->result();
            $this->data['post_data'] = $this->input->post();
        }
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['employees'] = $this->functions->get_all_row('tbl_master_employee');
        $this->load->view('account/salarysheet/view', $this->data);
    }

    function add_salarysheet() {
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['employees'] = $this->functions->get_all_row('tbl_master_employee');
        $this->load->view('account/salarysheet/add', $this->data);
    }

    function getempdetails() {
        $employee_id = $this->input->post('employee_id');
        $result = $this->functions->get_single_row('tbl_master_employee', 'employee_id', $employee_id);
        echo json_encode($result);
    }

    function salarybatchdetails() {
        $month_year = $this->input->post('mydate');
        $result = $this->functions->get_single_row('tbl_master_salary_batch', 'month_year', $month_year);
        echo json_encode($result);
    }

    function edit_salarysheet($ss_id) {
        $this->data['salary_sheet'] = $salary_sheet = $this->functions->get_single_row('salary_sheet', 'ss_id', $ss_id);
        $this->data['emp_details'] = $this->functions->get_single_row('tbl_master_employee', 'employee_id', $salary_sheet->employee_id_fk);
        $this->data['employees'] = $this->functions->get_all_row('tbl_master_employee');

        $this->load->view('account/salarysheet/edit', $this->data);
    }

    function delete() {
        $ss_id = $this->input->post('id');
        $result = $this->functions->get_single_row('salary_sheet', 'ss_id', $ss_id);
        $emp = $this->functions->get_single_row('tbl_master_employee', 'employee_id', $result->employee_id_fk);

        $empdata['emp_cl'] = $result->month_cl + $emp->emp_cl;
        $empdata['emp_pl'] = $result->month_pl + $emp->emp_pl;
        $empdata['emp_sl'] = $result->month_sl + $emp->emp_sl;

        $response = $this->functions->delete_single_row('salary_sheet', 'ss_id', $ss_id);
        if ($response) {
            $this->functions->update_table_rows('tbl_master_employee', 'employee_id', $result->employee_id_fk, $empdata);
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

//    function printsalarysheet($voucher_id) {
    function printsalarysheet($ss_id) {
        $this->data['salary_sheet'] = $salary_sheet = $this->functions->get_single_row('salary_sheet', 'ss_id', $ss_id);
        $this->data['emp_details'] = $this->functions->get_single_row('tbl_master_employee', 'employee_id', $salary_sheet->employee_id_fk);
       // $this->data['employees'] = $this->functions->get_all_row('tbl_master_employee');


//        $this->data['voucher'] = $voucher = $this->functions->get_single_row('tbl_vouchers', 'voucher_id', $voucher_id);
        $this->load->view('account/salarysheet/print', $this->data);
    }

    function get_salarysheet_details() {
        $id = $this->input->post('id');
        $result = $this->functions->get_single_row('booking_gr', 'bgr_id', $id);
        #$voucher_result = $this->functions->get_single_row('tbl_vouchers', 'bgr_id_fk', $id);
        if (!empty($result->bgr_id)) {
            $data['from_station'] = $this->function_library->FindStation($result->from_station_fk);
            $data['to_station'] = $this->function_library->FindStation($result->to_station_fk);
            $data['vehicle_no'] = $this->function_library->FindVehicle($result->vehicle_id_fk);
            $data['item_weight'] = $result->vehicle_id_fk;
            $data['item_booking_freight_rate'] = $result->item_booking_freight_rate;
            $data['s_crossing_charges'] = $result->s_crossing_charges;
            $data['booking_party'] = $this->function_library->FindPartyDetails($result->consignor_id_fk)->party_name;

            $data_arr["status"] = 'success';
            $data_arr["data"] = $data;
            echo json_encode($data_arr);
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "No Record Found.";
            echo json_encode($data_arr);
        }
    }

    function add() {
        $data = $this->input->post('data');
        //Check duplicate
        $checking['month_year'] = $data['month_year'];
        $checking['employee_id_fk'] = $data['employee_id_fk'];
        $num_rows = $this->functions->check_duplicate_value('salary_sheet', $checking);
        if ($num_rows > 0) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Already exists.";
            echo json_encode($data_arr);
            die;
        }

        $mydates = explode('-', $data['month_year']);
        $data['month'] = $mydates[0];
        $data['year'] = $mydates[1];
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['status'] = 1;
        $data['added_on'] = date("Y-m-d h:i:s");
        $response = $this->functions->insert_into_table('salary_sheet', $data);

        if ($response) {
            //Deduction CL|PL|SL
            $empdata['emp_cl'] = (int) $data['emp_cl'] - (int) $data['month_cl'];
            $empdata['emp_pl'] = (int) $data['emp_pl'] - (int) $data['month_pl'];
            $empdata['emp_sl'] = (int) $data['emp_sl'] - (int) $data['month_sl'];
            $this->functions->update_table_rows('tbl_master_employee', 'employee_id', $data['employee_id_fk'], $empdata);

            if ($this->input->post('button_type') == 'Submit') {
                $data_arr["button_val"] = 'new';
            } else {
                $data_arr["button_val"] = 'print';
            }

            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Added";
            $data_arr["ss_id"] = $response;
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
    }

    function edit($ss_id) {
        $data = $this->input->post('data');
        //Check duplicate
        $num_rows = $this->db->where('ss_id !=', $ss_id)->where('month_year', $data['month_year'])->where('employee_id_fk', $data['employee_id_fk'])->get('salary_sheet')->num_rows();
        if ($num_rows > 0) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Already exists.";
            echo json_encode($data_arr);
            die;
        }

        $mydates = explode('-', $data['month_year']);
        $data['month'] = $mydates[0];
        $data['year'] = $mydates[1];
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['status'] = 1;
        $this->functions->update_table_rows('salary_sheet', 'ss_id', $ss_id, $data);

        if (1) {
            //Deduction CL|PL|SL
            $empdata['emp_cl'] = (int) $data['emp_cl'] - (int) $data['month_cl'];
            $empdata['emp_pl'] = (int) $data['emp_pl'] - (int) $data['month_pl'];
            $empdata['emp_sl'] = (int) $data['emp_sl'] - (int) $data['month_sl'];
            $this->functions->update_table_rows('tbl_master_employee', 'employee_id', $data['employee_id_fk'], $empdata);

            if ($this->input->post('button_type') == 'Submit') {
                $data_arr["button_val"] = 'new';
            } else {
                $data_arr["button_val"] = 'print';
            }

            $data_arr["status"] = 'success';
            $data_arr["status_message"] = "Updated";
            $data_arr["ss_id"] = $ss_id;
            echo json_encode($data_arr);
            die;
        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
    }

}
