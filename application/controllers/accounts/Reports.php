<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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

        // Load 'standard' flexi auth ltrail_balanceibrary by default.
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
        if (!$this->flexi_auth->is_privileged('View Users')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view zone.</p>');
            redirect('auth');
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['account_groups'] = $this->functions->get_all_row('ac_account_group');
        $this->load->view('account/account_group/view', $this->data);
    }

    function ledger_summary() {
        if (!$this->flexi_auth->is_privileged('Ledger Summary')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {
            $this->db->select('*');
            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('voucher_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('voucher_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('ledger'))) {
                $this->db->where('ledger', $this->input->post('ledger'));
            }
            $this->data['vouchers'] = $vouchers = $this->db->from('tbl_vouchers')->get()->result();

            $this->data['post_data'] = $this->input->post();
            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }
        $this->data['ledgers'] = $this->functions->get_all_row('ac_ledger_master');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/reports/ledger_summary', $this->data);
    }

    function group_summary() {
        if (!$this->flexi_auth->is_privileged('Group Summary')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {

            $this->db->select('tbl_vouchers.*');
            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('group_name'))) {
                $this->db->where('ac_ledger_master.aag_id_fk', $this->input->post('group_name'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('voucher_date >=', system_date($this->input->post('from_date')));
            }
            if (!empty($this->input->post('to_date'))) {
                $this->db->where('voucher_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('ledger'))) {
                $this->db->where('ledger', $this->input->post('ledger'));
            }
            $this->data['vouchers'] = $vouchers = $this->db->from('tbl_vouchers')->join('ac_ledger_master', "ac_ledger_master.ledger_id = tbl_vouchers.ledger")->get()->result();

            $this->data['post_data'] = $this->input->post();
            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }
        $this->data['ledgers'] = $this->functions->get_all_row('ac_ledger_master');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['ac_groups'] = $this->functions->get_all_active_row('ac_account_group');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/reports/group_summary', $this->data);
    }

    function trail_balance() {
        if (!$this->flexi_auth->is_privileged('Trail Balance')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {

            $this->db->select('*');
            if (!empty($this->input->post('group_name'))) {
                $this->db->where('aag_id', $this->input->post('group_name'));
            }
            $this->data['groups'] = $groups = $this->db->get('ac_account_group')->result();
            $this->data['post_data'] = $this->input->post();

            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }
        $this->data['ledgers'] = $this->functions->get_all_row('ac_ledger_master');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['ac_groups'] = $this->functions->get_all_active_row('ac_account_group');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/reports/trail_balance', $this->data);
    }

    function balance_sheet() {
        if (!$this->flexi_auth->is_privileged('Balance Sheet')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;
        if ($this->input->post('search')) {
            $this->data['groups'] = $this->db->select('*')->get('ac_account_group')->result_array();
            $this->data['post_data'] = $this->input->post();
            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }
        $this->data['ledgers'] = $this->functions->get_all_row('ac_ledger_master');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['ac_groups'] = $this->functions->get_all_active_row('ac_account_group');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/reports/balance_sheet', $this->data);
    }

    function profit_loss() {
        if (!$this->flexi_auth->is_privileged('Profit & Loss')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['vouchers'] = array();
        $this->data['post_data'] = array();
        $this->data['gr_details'] = array();
        $this->data['display'] = FALSE;

        if ($this->input->post('search')) {

            $this->db->select('ac_ledger_master.aag_id_fk');

          // Dated 03-10-19 
          $in = array('13','15','16', '17', '21','24');
            $this->db->where_in('ac_ledger_master.aag_id_fk', $in); // Dated 11-09-19 
          // End            

          $this->db->distinct();
            $this->db->join('ac_ledger_master', "ac_ledger_master.ledger_id = tbl_vouchers.ledger");

            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('voucher_date >=', system_date($this->input->post('from_date')));
            }

            if (!empty($this->input->post('to_date'))) {
                $this->db->where('voucher_date <=', system_date($this->input->post('to_date')));
            }

            //$this->db->where_in('voucher_type', array('Sale', 'Journal'));    
            

            $this->data['debit_heads'] = $debit_heads = $this->db->from('tbl_vouchers')->get()->result();

            //Credit Heads
            $this->db->select('ac_ledger_master.aag_id_fk');
        
          // Dated 03-10-19 
           $in = array('14','19','20','22','25', '31');
           $this->db->where_in('ac_ledger_master.aag_id_fk' ,$in); // Dated 11-09-19 

          // End

            $this->db->distinct();

            $this->db->join('ac_ledger_master', "ac_ledger_master.ledger_id = tbl_vouchers.ledger");

            if (!empty($this->input->post('branch_name'))) {
                $this->db->where('branch_id_fk', $this->input->post('branch_name'));
            }
            if (!empty($this->input->post('from_date'))) {
                $this->db->where('voucher_date >=', system_date($this->input->post('from_date')));
            }

            if (!empty($this->input->post('to_date'))) {
                $this->db->where('voucher_date <=', system_date($this->input->post('to_date')));
            }
            if (!empty($this->input->post('company'))) {
                $this->db->where('ac_ledger_master.company_id_fk', $this->input->post('company'));
            }
            $this->data['credit_heads'] = $credit_heads = $this->db->from('tbl_vouchers')->get()->result();


            $this->data['total_count'] = count($debit_heads) > count($credit_heads) ? count($debit_heads) : count($credit_heads);
            $this->data['post_data'] = $this->input->post();

            $this->data['display'] = TRUE;
        } else {
            $this->data['display'] = FALSE;
        }
        $this->data['ledgers'] = $this->functions->get_all_row('ac_ledger_master');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->data['ac_groups'] = $this->functions->get_all_active_row('ac_account_group');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('account/reports/profit_loss', $this->data);
    }

}
