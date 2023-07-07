<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracktrace_report extends CI_Controller {

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
        $this->load->vars('menu_nevigation', 'reports');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function index() {
        if (!$this->flexi_auth->is_privileged('Bill Booking Report')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
                    $this->data['grdata'] ="View";

        if (!empty($this->input->post('submit'))) {
 
            $filter = $this->input->post();

            if (!empty($filter['gr_no'])) {
                // Special
                $dispid='';
                $lhc11 = $this->functions->get_all_row_id_based('challan_dispatch', 'delivery_status', 'Delivered');
                foreach($lhc11 as $lhcrow){
                    $grs = $lhcrow->gr_no_fk .','. $lhcrow->gr_no_inc;
                    $grs = explode(',',$grs);
                    $grs = array_filter($grs);
                    if(in_array($filter['gr_no'], $grs)){
                        $dispid = $lhcrow->cdispatch_id;
                        break;
                    }
                }
                if(!empty($dispid)){
                    $this->data['deliverydetails'] =  $this->functions->get_all_row_id_based('tbl_delevery', 'lhc_number', $dispid);
                }
                $whq = array('reference_no'=>$filter['gr_no'],'billtype'=>'Gr');
                
                $this->data['voucherhistory'] =  $this->functions->get_all_row_multipe_where('payment_history',$whq);
                
                //$this->data['lhc'] = $lhcdetails =  $this->functions->get_row_id_based('challan_dispatch','gr_no_fk',$filter['gr_no']);

                $this->data['lhc'] =  $this->functions->find_gr_in_lhc($filter['gr_no']);
                $lhcdetails =  $this->functions->find_gr_in_lhc($filter['gr_no']);
                
                // Count Gr Included in LHC
                $gr1 = $lhcdetails->gr_no_fk.','.$lhcdetails->gr_no_inc;
                $gr2 = explode(',', $gr1);

                $gr2 = array_filter($gr2);
                $this->data['grnos'] = count($gr2);
                // Special Dated 28/01/20
                        $whqh = array('reference_no'=>$lhcdetails->cdispatch_id,'billtype'=>'Challan');
                        $this->data['voucherhistory_lhc'] =  $this->functions->get_all_row_multipe_where('payment_history',$whqh);
                       // $this->data['voucherhistory_lhc'] =  $whqh;
                // End
                $whquery = array('billtype'=>'Challan', 'reference_no'=>$lhcdetails->cdispatch_id, 'voucher_type' =>'Payment');
                $this->data['payamount'] = $this->functions->get_sum_of_pay_history('payment_history','amount',$whquery);
                
                $this->data['grdata'] =  $this->functions->get_row_id_based('booking_gr','bgr_id',$filter['gr_no']);
                $this->data['voucher'] =  $this->functions->get_all_row_id_based('tbl_vouchers','gr_no',$filter['gr_no']);
                   $this->data['display'] = TRUE; 
              }
         }
          $this->load->view('reports/tracktrace_report', $this->data);
    }
}
