<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta");
class Jobenquiry extends CI_Controller {

    public function __construct() {
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
        $this->load->vars('menu_nevigation', 'jobenquiry');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    public function enquiry() {

        if($this->input->post('submit') == 'Submit'){
            $data = $this->input->post();
            foreach($data['data']['vechile_type'] as $key => $value){
                $vechile_details[$key]['vechile_type']  = $value;
                $vechile_details[$key]['weight']        = $data['data']['weight'][$key];
                $vechile_details[$key]['length']        = $data['data']['length'][$key];
                $vechile_details[$key]['width']         = $data['data']['width'][$key];
                $vechile_details[$key]['height']        = $data['data']['height'][$key];
                $vechile_details[$key]['no_of_vechile'] = $data['data']['no_of_vechile'][$key];
                $vechile_details[$key]['meterial']      = $data['data']['meterial'][$key];
                $vechile_details[$key]['created_at']    = date('Y-m-d H:i:s');
                $vechile_details[$key]['modified_at']   = date('Y-m-d H:i:s');
             }
            unset($data['submit']);
            unset($data['data']);
            $data['created_at']  = date('Y-m-d H:i:s');
            $data['modified_at'] = date('Y-m-d H:i:s');
            $ins = $this->db->insert('tbl_enquiry', $data);
            $enqid = $this->db->insert_id();
            foreach ($vechile_details as $key => $value) {
                $value['enqid_fk'] = $enqid;
                $this->db->insert('tbl_enquiry_vechile_details', $value);
            }

            $uid = next_id_unique('E');
            $uiddata = array(
                'serial_no' => $uid,
                'prefix'    => 'E',
                'dated'     => date('Y-m-d'),
                'created_at'=> date('Y-m-d H:i:s'),
                'modified_at'=> date('Y-m-d H:i:s')
            );
            
            if($uid == 1){
                $this->db->insert('tbl_serial_no', $uiddata);
            } else {
                    $uiddata_update = array(
                            'serial_no' => $uid
                    );
                $this->db->where('dated',date('Y-m-d'))->where('prefix','E')->update('tbl_serial_no', $uiddata_update);
            }
            if($ins){
                redirect('jobenquiry/view_enquiry');
            }
        }

         $this->load->view('jobenquiry/enquiry');
    }

    public function view_enquiry() {

        $data['enquiry'] = $this->db->get('tbl_enquiry_vechile_details')->result();
        $this->load->view('jobenquiry/view_enquiry', $data);

    }

    public function quote() {

        if($this->input->post('submit') == 'Submit'){
           $data = $this->input->post();

           // Quote insert
            $quoreIns['remark']        = $data['remark'];
            $quoreIns['quote_ref_no']  = $data['quote_ref_no'];
            $quoreIns['enqid_fk']      = $data['enqid_fk'];
            $quoreIns['created_at']    = date('Y-m-d H:i:s');
            $quoreIns['modified_at']   = date('Y-m-d H:i:s');


            $rs = $this->db->insert('tbl_quote', $quoreIns);
            $qoteid = $this->db->insert_id();
           // End.
           $fit = 1;
           foreach ($data['data'] as $key => $value) {
            foreach($data['data'][$key]['vendor_name'] as $key1 => $value1){
                $vechile_rate['vendor_name'] = $value1;
                $vechile_rate['rate']        = $data['data'][$key]['rate'][$key1];
                $vechile_rate['rate_rto']    = $data['data'][$key]['rate_rto'][$key1];

                $vechile_rate['created_at']  = date('Y-m-d H:i:s');
                $vechile_rate['modified_at'] = date('Y-m-d H:i:s');

                $vechile_rate['quoteid_fk']  = $qoteid;
                $vechile_rate['enqid_fk']    = $data['enqid_fk']; 
                if('data'.$fit == $key){
                    $vechile_rate['vid_fk']      = $data['enqid_vechle_fk'.$fit];
                }
               $this->db->insert('tbl_vechile_rate', $vechile_rate);                                
              }
              $fit++;
            }

            $uid = next_id_unique('Q');
            $uiddata = array(
                'serial_no' => $uid,
                'prefix'    => 'Q',
                'dated'     => date('Y-m-d'),
                'created_at'=> date('Y-m-d H:i:s'),
                'modified_at'=> date('Y-m-d H:i:s')
            );
            
            if($uid == 1){
                $this->db->insert('tbl_serial_no', $uiddata);
            } else {
                $uiddata_update = array(
                            'serial_no' => $uid
                    );
                $this->db->where('dated',date('Y-m-d'))->where('prefix','Q')->update('tbl_serial_no', $uiddata_update);
            }

            if($rs){
                redirect('jobenquiry/view_quote');
            } else{
                redirect('jobenquiry/quote');
            }
        }        
        $this->load->view('jobenquiry/quote');
    }

    public function view_quote() {

       $data['quote'] = $this->db->get('tbl_quote')->result(); 
       $this->load->view('jobenquiry/view_quote', $data);
    }

    public function job() {

        if($this->input->post('submit') == 'Submit'){
           $data = $data1 = $this->input->post();
           unset($data1['submit']);
           unset($data1['vdate']);

           $data1['created_at'] = date('Y-m-d H:i:s');
           $data1['modified_at'] = date('Y-m-d H:i:s');

           $qins = $this->db->insert('tbl_job', $data1);
           $iddd = $this->db->insert_id();
           
          if($qins){
            foreach ($data['vdate'] as $key => $value) {
                $value = array_filter($value);
               // if(!empty($value)){
                    $value['jobid_fk'] = $iddd;
                    $value['created_at'] = date('Y-m-d H:i:s');
                    $value['modified_at'] = date('Y-m-d H:i:s');
                    $jobv = $this->db->insert('tbl_job_vechile_details', $value);
               // }
            }

            $uid = next_id_unique('J');
            $uiddata = array(
                'serial_no' => $uid,
                'prefix'    => 'J',
                'dated'     => date('Y-m-d'),
                'created_at'=> date('Y-m-d H:i:s'),
                'modified_at'=> date('Y-m-d H:i:s')
            );
            
            if($uid == 1){
                $this->db->insert('tbl_serial_no', $uiddata);
            } else {
                $uiddata_update = array(
                            'serial_no' => $uid
                    );
                $this->db->where('dated',date('Y-m-d'))->where('prefix','J')->update('tbl_serial_no', $uiddata_update);
            }            
            redirect('auth_admin/dashboard');
          } else {
            redirect('jobenquiry/job');
          }
       }

        $this->load->view('jobenquiry/job');
    }    

    public function view_job() {
        $data['job'] = $this->db->get('tbl_job')->result();
        $this->load->view('jobenquiry/view_job', $data);
    }


    public function get_enquiry_ajax(){
        $rs = array();
        $rs1 = array();
        $rv = array();
        $enq_ref_no = $this->input->post('enq_ref_no');

        $rs = $this->db->where('enq_ref_no', $enq_ref_no)->get('tbl_enquiry');
        if($rs->num_rows()>0){
            $rs1 = $rs->row();
            $rv = $this->db->where('enqid_fk', $rs1->enqid)->get('tbl_enquiry_vechile_details')->result();
            $rs = array('enquiry' => $rs->row(), 'enq_vechile' => $rv, 'sucess' => 'ok');
        } else {
            $rs = array(
                'sucess' => 'fail'
            );
        }

        echo json_encode($rs);
    }


 public function get_quote_ajax(){

    $rs    = array();
    $rs1   = array();
    $rv    = array();
    $enqd  = array();

    $totnovechile = 0;
    $quote_ref_no = $this->input->post('quore_ref_no');
    $rs           = $this->db->where('quote_ref_no', $quote_ref_no)->get('tbl_quote');

    if( $rs->num_rows() > 0 ){
        $rs1 = $rs->row();
        $rv  = $this->db->where('enqid_fk', $rs1->enqid_fk)->get('tbl_enquiry_vechile_details')->result();

        foreach ($rv as $row) {
           $totnovechile += $row->no_of_vechile;
        }

       $enqd = $this->db->where('enqid', $rs1->enqid_fk)->get('tbl_enquiry')->row(); 
       $rs  = array('enqdetails'=>$enqd,'quote'=>$rs1,'enq_vechile_no' => $totnovechile, 'sucess' => 'ok');

    } else {

        $rs = array(
            'sucess' => 'fail'
        );

    }
    echo json_encode($rs);
  }


// Deleting the  Enquiry, Quote and Jobs
    public function del_enquiry(){

        $enqid = $this->input->post('id');

        $no_of_vechile = $this->db->where('enqid_fk', $enqid)->get('tbl_enquiry_vechile_details');

        if( $no_of_vechile->num_rows() > 0 ){
            $enq_del = $this->db->where('enqid', $enqid)->delete('tbl_enquiry');
            $enq_vechile_del = $this->db->where('enqid_fk', $enqid)->delete('tbl_enquiry_vechile_details');

            if($enq_del && $enq_vechile_del) {
                $ajax_result = array(
                    'status' => 'ok',
                    'nor'    => $no_of_vechile->num_rows()       
                );
            } else {
                $ajax_result = array(
                    'status' => 'fail'
                );                
            }

           print_r(json_encode($ajax_result));

        }
    }    


    public function del_quote(){

        $quoteid = $this->input->post('id');
        $quote_rs = $this->db->where('quoteid', $quoteid)->get('tbl_quote');
        if( $quote_rs->num_rows() > 0 ){
            $quote_rs =  $quote_rs->row();
            $quote_del = $this->db->where('quoteid', $quoteid)->delete('tbl_quote');
            $wq = array(
                'quoteid_fk' => $quote_rs->quoteid,
                'enqid_fk'   => $quote_rs->enqid_fk
            );
            $vechile_rata_rs = $this->db->where($wq)->get('tbl_vechile_rate');
            $vechile_rate_del = $this->db->where($wq)->delete('tbl_vechile_rate');

            if($quote_del && $vechile_rate_del) {
                $ajax_result = array(
                    'status' => 'ok',
                    'nor'    => $vechile_rata_rs->num_rows()       
                );
            } else {
                $ajax_result = array(
                    'status' => 'fail'
                );                
            }

           print_r(json_encode($ajax_result));

        }
    }


    public function del_job(){

        $jobid = $this->input->post('id');
        $job_rs = $this->db->where('jobid', $jobid)->get('tbl_job');
        if( $job_rs->num_rows() > 0 ){
            $job_del = $this->db->where('jobid', $jobid)->delete('tbl_job');
            $job_vechile_rs = $this->db->where('jobid_fk', $jobid)->get('tbl_job_vechile_details');
            $job_vechile_del = $this->db->where('jobid_fk', $jobid)->delete('tbl_job_vechile_details');
            if($job_del && $job_vechile_del) {
                $ajax_result = array(
                    'status' => 'ok',
                    'nor'    => $job_vechile_rs->num_rows()
                );
            } else {
                $ajax_result = array(
                    'status' => 'fail'
                );                
            }

           print_r(json_encode($ajax_result));

        }
    }

// End


// Modifying the Enquiry, Quote and Jobs

    public function edit_enquiry($enq_id) {

        if($this->input->post('submit') == 'Submit'){
            $data = $this->input->post();
            foreach($data['data']['vechile_type'] as $key => $value){
                $vechile_details[$key]['vechile_type']  = $value;
                $vechile_details[$key]['weight']        = $data['data']['weight'][$key];
                $vechile_details[$key]['length']        = $data['data']['length'][$key];
                $vechile_details[$key]['width']         = $data['data']['width'][$key];
                $vechile_details[$key]['height']        = $data['data']['height'][$key];
                $vechile_details[$key]['no_of_vechile'] = $data['data']['no_of_vechile'][$key];
                $vechile_details[$key]['meterial']      = $data['data']['meterial'][$key];
                $vechile_details[$key]['created_at']    = date('Y-m-d H:i:s');
                $vechile_details[$key]['modified_at']   = date('Y-m-d H:i:s');
             }
            $enqid =  $data['enqid'];
            unset($data['submit']);
            unset($data['data']);
            unset($data['enq_ref_no']);
            unset($data['enqid']);
            
            $data['created_at']  = date('Y-m-d H:i:s');
            $data['modified_at'] = date('Y-m-d H:i:s');

            $this->db->where('enqid', $enqid)->update('tbl_enquiry', $data);

            foreach ($vechile_details as $key => $value) {
                $wh = array(
                    'vid' => $key,
                    'enqid_fk' => $enqid
                );
                $this->db->where($wh)->update('tbl_enquiry_vechile_details', $value);
            }
                redirect('jobenquiry/edit_enquiry/'.$enq_id);
        }

         $data['enquiry_details'] = $this->db->where('enqid', $enq_id)->get('tbl_enquiry')->row();
         $data['enquiry_vechile_details'] = $this->db->where('enqid_fk', $enq_id)->get('tbl_enquiry_vechile_details')->result();

         $this->load->view('jobenquiry/edit_enquiry', $data);
    }

    public function edit_quote($quote_id) {

        if($this->input->post('submit') == 'Submit'){
           $data = $this->input->post();
           // Quote insert
            $quoreIns['remark']        = $data['remark'];
            $quoreIns['modified_at']   = date('Y-m-d H:i:s');
            $wh_q_modi = array(
                'quoteid' => $data['quoteid'],
                'enqid_fk'=> $data['enqid_fk'] 
           );

         $this->db->where($wh_q_modi)->update('tbl_quote', $quoreIns);
           // End.
           foreach ($data['data'] as $key => $value) {
            foreach($data['data'][$key]['vendor_name'] as $key1 => $value1){
                $vechile_rate['vendor_name'] = $value1;
                $vechile_rate['rate']        = $data['data'][$key]['rate'][$key1];
                $vechile_rate['rate_rto']    = $data['data'][$key]['rate_rto'][$key1];
                $vechile_rate['modified_at'] = date('Y-m-d H:i:s');
                 $vech_wh = array(
                        'rateid' => $data['data'][$key]['vechile_id'][$key1]
                 );   
               $this->db->where($vech_wh)->update('tbl_vechile_rate', $vechile_rate); 
              }
            }
                redirect('jobenquiry/edit_quote/'.$quote_id);
        } 
        $data['quote'] = $qdata = $this->db->where('quoteid',$quote_id)->get('tbl_quote')->row();
        $data['enquiry'] = $this->db->where('enqid',$qdata->enqid_fk)->get('tbl_enquiry')->row();
        $data['enq_vechile_details'] = $this->db->where('enqid_fk', $qdata->enqid_fk)->get('tbl_enquiry_vechile_details')->result();

        $this->load->view('jobenquiry/edit_quote', $data);
    }


    public function edit_job($job_id) {

        if($this->input->post('submit') == 'Submit'){
           $data = $data1 = $this->input->post();
           unset($data1['submit']);
           unset($data1['vdate']);
           $data1['modified_at'] = date('Y-m-d H:i:s');

           $wh_job = array(
                'jobid' => $data1['jobid']
           );
           unset($data1['jobid']);
           unset($data1['job_ref_no']);
           unset($data1['jfrom']);
           unset($data1['jto']);
           $this->db->where($wh_job)->update('tbl_job', $data1);
           
            foreach ($data['vdate'] as $key => $value) {
                $value = array_filter($value);
                if(!empty($value)){
                    $wh_v_details = array(
                        'jbovid' => $value['jobvid'] 
                    );
                    unset($value['jobvid']);
                    $value['modified_at'] = date('Y-m-d H:i:s');
                    $this->db->where($wh_v_details)->update('tbl_job_vechile_details', $value);
                }
            }
            redirect('jobenquiry/edit_job/'.$wh_job['jobid']);
       }
        $data['jobs'] = $jb = $this->db->where('jobid', $job_id)->get('tbl_job')->row();
        $data['jobs_vechile_rate'] = $this->db->where('jobid_fk', $jb->jobid)->get('tbl_job_vechile_details')->result();
        $this->load->view('jobenquiry/edit_job', $data);
    }

}
