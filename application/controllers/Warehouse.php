<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller {

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
        $this->load->vars('menu_nevigation', 'warehouse');
        $this->load->vars('base_url', base_url());
        $this->load->vars('includes_dir', base_url());
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $user_account_id = $this->flexi_auth->get_user_id();
        $this->data['user_profile'] = $this->functions->get_single_row('user_profiles', 'upro_uacc_fk', $user_account_id);
    }

    function inward() {
        if (!$this->flexi_auth->is_privileged('View Inward')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');
            $items = $this->input->post('item');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['status'] = 1;
            $data['inward_no'] = 'IW' . sprintf('%04d', $this->functions->next_id('tbl_inwards'));
            $data['document_date'] = !empty($data['document_date']) ? system_date($data['document_date']) : NULL;
            $data['inward_date'] = $stock_date = !empty($data['inward_date']) ? system_date($data['inward_date']) : NULL;
            $inward_id = $this->functions->insert_into_table('tbl_inwards', $data);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $inward_id;
            $activites['activity_type'] = 'Inward';
            $activites['action'] = 'added';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added inward.';
            $activites['module'] = 'warehouse/inward';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($inward_id) {
                $tmp = array();
                foreach ($this->input->post('item')['item_id_fk'] as $key => $value) {
                    $tmpArr = array();

                    $tmpArr['branch_id_fk'] = $data['branch_id_fk'];
                    $tmpArr['item_id_fk'] = $items['item_id_fk'][$key];
                    $tmpArr['item_qty'] = $items['item_qty'][$key];
                    $tmpArr['package_id'] = $items['package_id'][$key];
                    $tmpArr['stock_type'] = 'I';
                    $tmpArr['io_number'] = $inward_id;
                    $tmpArr['stock_date'] = $stock_date;

                    $this->functions->insert_into_table('tbl_warehouse', $tmpArr);
                }
                $this->session->set_flashdata('success', 'Inward Created Successfully.');
                if ($this->input->post('submit') == 'Print') {
                    redirect('warehouse/edit_inward/' . $inward_id . '/TRUE');
                } else {
                    redirect('warehouse/edit_inward/' . $inward_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('challan/dispatch_challan');
            }
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['vendors'] = $this->functions->get_all_row('tbl_master_vendors');
        $this->data['items'] = $this->functions->get_all_row('tbl_warehouse_item'); // Edited by Rakesh Dated: 18/07/2019 ('tbl_master_item') to ('tbl_warehouse_item')
        $this->data['packages'] = $this->functions->get_all_row('tbl_master_package');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('warehouse/inward', $this->data);  // Edited by Rakesh Dated :18/07/2019
    }

    function searchinward() {
        if (!$this->flexi_auth->is_privileged('View Inward')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if (!empty($this->input->post('inward_no'))) {
            $inward_no = $this->input->post('inward_no');
            $inward = $this->functions->get_single_row('tbl_inwards', 'inward_no', $inward_no);
            if (!empty($inward->inward_id)) {
                redirect('warehouse/edit_inward/' . $inward->inward_id . '/FALSE'); // Edited by Rakesh Dated: 19/07/2019 i.e View file modified. 
            } else {
                $this->session->set_flashdata('message', 'No Record Found.');
                redirect('warehouse/inward/'); // Edited by Rakesh Dated: 19/07/2019 i.e View file modified.
            }
        }
    }

    function delete_item() {
        $warehouse_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('tbl_warehouse', 'warehouse_id', $warehouse_id);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $warehouse_id;
        $activites['activity_type'] = 'Warehouse';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted inward.';
        $activites['module'] = 'warehouse';
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

    function edit_warehosue_item($warehouse_id) {
        $this->data['items'] = $this->functions->get_all_row('tbl_warehouse_item'); // Modified by Rakesh Dated : 19/07/2019 Change table name tbl_master_item with tbl_warehouse_item 
        $this->data['packages'] = $this->functions->get_all_row('tbl_master_package');
        $this->data['warehouse'] = $this->functions->get_single_row('tbl_warehouse', 'warehouse_id', $warehouse_id);
        $this->load->view('warehouse/edit_warehouse_item', $this->data);
    }

    function update_warehouse($warehouse_id) {
        if (!$this->flexi_auth->is_privileged('Edit Inward')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges.";
            echo json_encode($data_arr);
            die;
        }
        $data = $this->input->post('data');
        $response = $this->functions->update_table_rows('tbl_warehouse', 'warehouse_id', $warehouse_id, $data);
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $warehouse_id;
        $activites['activity_type'] = 'Inward';
        $activites['action'] = 'updated';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated inward.';
        $activites['module'] = 'warehouse';
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

    function edit_inward($inward_id, $doprint = FALSE) {
        if (!$this->flexi_auth->is_privileged('Edit Inward')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['doprint'] = $doprint;
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');
            $items = $this->input->post('item');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['document_date'] = !empty($data['document_date']) ? system_date($data['document_date']) : NULL;
            $data['inward_date'] = $stock_date = !empty($data['inward_date']) ? system_date($data['inward_date']) : NULL;
            $this->functions->update_table_rows('tbl_inwards', 'inward_id', $inward_id, $data);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $inward_id;
            $activites['activity_type'] = 'Inward';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated inward.';
            $activites['module'] = 'warehouse/inward';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            $wdata['stock_date'] = $stock_date;
            $wdata['branch_id_fk'] = $data['branch_id_fk'];
            $this->db->where('io_number', $inward_id)->where('stock_type', 'I')->update('tbl_warehouse', $wdata);
            if (!empty($this->input->post('item')['item_id_fk'])) {
                $tmp = array();
                foreach ($this->input->post('item')['item_id_fk'] as $key => $value) {
                    $tmpArr = array();
                    $tmpArr['branch_id_fk'] = $data['branch_id_fk'];
                    $tmpArr['item_id_fk'] = $items['item_id_fk'][$key];
                    $tmpArr['item_qty'] = $items['item_qty'][$key];
                    $tmpArr['package_id'] = $items['package_id'][$key];
                    $tmpArr['stock_type'] = 'I';
                    $tmpArr['io_number'] = $inward_id;
                    $tmpArr['stock_date'] = $stock_date;

                    $this->functions->insert_into_table('tbl_warehouse', $tmpArr);
                }
            }
            $this->session->set_flashdata('success', 'Inward updated Successfully.');
            if ($this->input->post('submit') == 'Print') {
                redirect('warehouse/edit_inward/' . $inward_id . '/TRUE');
            } else {
                redirect('warehouse/edit_inward/' . $inward_id . '/FALSE');
            }
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['vendors'] = $this->functions->get_all_row('tbl_master_vendors');
        $this->data['items'] = $this->functions->get_all_row('tbl_warehouse_item'); // Modified by Rakesh Dated:19/07/2019 Change Table name tbl_master_item with tbl_warehouse_item
        $this->data['packages'] = $this->functions->get_all_row('tbl_master_package');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');

        $this->data['inward'] = $this->functions->get_single_row('tbl_inwards', 'inward_id', $inward_id);
        $where_array = array('stock_type' => 'I', 'io_number' => $inward_id);
        $this->data['warehouses'] = $this->functions->get_all_row_multipe_where('tbl_warehouse', $where_array);
        $this->load->view('warehouse/edit_inward', $this->data);
    }

    function printinward($inward_id) {
        $this->data['inward'] = $this->functions->get_single_row('tbl_inwards', 'inward_id', $inward_id);
        $where_array = array('stock_type' => 'I', 'io_number' => $inward_id);
        $this->data['warehouses'] = $this->functions->get_all_row_multipe_where('tbl_warehouse', $where_array);
        $this->load->view('warehouse/printinward', $this->data);
    }

    function delete_inward() {
        if (!$this->flexi_auth->is_privileged('Delete Inward')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges.";
            echo json_encode($data_arr);
            die;
        }
        $inward_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('tbl_inwards', 'inward_id', $inward_id);
        $this->db->where('io_number', $inward_id)->where('stock_type', 'I')->delete('tbl_warehouse');
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $inward_id;
        $activites['activity_type'] = 'Inward';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted inward.';
        $activites['module'] = 'warehouse/inward';
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

    //OUTWARD
    function outward() {
        if (!$this->flexi_auth->is_privileged('View Outward')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');
            $items = $this->input->post('item');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['status'] = 1;
            $data['outward_no'] = 'OW' . sprintf('%04d', $this->functions->next_id('tbl_outwards'));
            $data['document_date'] = !empty($data['document_date']) ? system_date($data['document_date']) : NULL;
            $data['outward_date'] = $stock_date = !empty($data['outward_date']) ? system_date($data['outward_date']) : NULL;
            $outward_id = $this->functions->insert_into_table('tbl_outwards', $data);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $outward_id;
            $activites['activity_type'] = 'Outward';
            $activites['action'] = 'added';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added outward.';
            $activites['module'] = 'warehouse/outward';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            if ($outward_id) {
                $tmp = array();
                foreach ($this->input->post('item')['item_id_fk'] as $key => $value) {
                    $tmpArr = array();
                    $tmpArr['branch_id_fk'] = $data['branch_id_fk'];
                    $tmpArr['item_id_fk'] = $items['item_id_fk'][$key];
                    $tmpArr['item_qty'] = $items['item_qty'][$key];
                    $tmpArr['package_id'] = $items['package_id'][$key];
                    $tmpArr['stock_type'] = 'O';
                    $tmpArr['io_number'] = $outward_id;
                    $tmpArr['stock_date'] = $stock_date;

                    $this->functions->insert_into_table('tbl_warehouse', $tmpArr);
                }
                $this->session->set_flashdata('success', 'Outward Created Successfully.');
                if ($this->input->post('submit') == 'Print') {
                    redirect('warehouse/edit_outward/' . $outward_id . '/TRUE');
                } else {
                    redirect('warehouse/edit_outward/' . $outward_id . '/FALSE');
                }
            } else {
                $this->session->set_flashdata('message', 'Please try again later.');
                redirect('challan/dispatch_challan');
            }
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['vendors'] = $this->functions->get_all_row('tbl_master_vendors');
        $this->data['items'] = $this->functions->get_all_row('tbl_warehouse_item'); // Edited by Rakesh Dated: 18/07/2019 ('tbl_master_item') to ('tbl_warehouse_item')
        $this->data['packages'] = $this->functions->get_all_row('tbl_master_package');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('warehouse/outward', $this->data); // Edited by Rakesh Dated :18/07/2019
    }

    function searchoutward() {
        if (!$this->flexi_auth->is_privileged('View Outward')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        if (!empty($this->input->post('outward_no'))) {
            $outward_no = $this->input->post('outward_no');
            $outward = $this->functions->get_single_row('tbl_outwards', 'outward_no', $outward_no);
            if (!empty($outward->outward_id)) {
                redirect('warehouse/edit_outward/' . $outward->outward_id . '/FALSE');
            } else {
                $this->session->set_flashdata('message', 'No Record Found.');
                redirect('warehouse/outward/');
            }
        }
    }

    function edit_outward($outward_id, $doprint = FALSE) {
        if (!$this->flexi_auth->is_privileged('Edit Outward')) {
            $this->session->set_flashdata('error', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['doprint'] = $doprint;
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post('data');
            $items = $this->input->post('item');
            $data['modified_by'] = $this->flexi_auth->get_user_id();
            $data['document_date'] = !empty($data['document_date']) ? system_date($data['document_date']) : NULL;
            $data['outward_date'] = $stock_date = !empty($data['outward_date']) ? system_date($data['outward_date']) : NULL;
            $this->functions->update_table_rows('tbl_outwards', 'outward_id', $outward_id, $data);
            //FOR ACTIVIES LOG
            $activites['user_id'] = $this->flexi_auth->get_user_id();
            $activites['activity_id'] = $outward_id;
            $activites['activity_type'] = 'Outward';
            $activites['action'] = 'updated';
            $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' updated outward.';
            $activites['module'] = 'warehouse/outward';
            $activites['created_at'] = date("Y-m-d h:i:s");
            $this->functions->insert_into_table('activities', $activites);
            $wdata['stock_date'] = $stock_date;
            $wdata['branch_id_fk'] = $data['branch_id_fk'];
            $this->db->where('io_number', $outward_id)->where('stock_type', 'O')->update('tbl_warehouse', $wdata);
            if (!empty($this->input->post('item')['item_id_fk'])) {
                $tmp = array();
                foreach ($this->input->post('item')['item_id_fk'] as $key => $value) {
                    $tmpArr = array();
                    $tmpArr['branch_id_fk'] = $data['branch_id_fk'];
                    $tmpArr['item_id_fk'] = $items['item_id_fk'][$key];
                    $tmpArr['item_qty'] = $items['item_qty'][$key];
                    $tmpArr['package_id'] = $items['package_id'][$key];
                    $tmpArr['stock_type'] = 'O';
                    $tmpArr['io_number'] = $outward_id;
                    $tmpArr['stock_date'] = $stock_date;

                    $this->functions->insert_into_table('tbl_warehouse', $tmpArr);
                }
            }
            $this->session->set_flashdata('success', 'Outward updated Successfully.');
            if ($this->input->post('submit') == 'Print') {
                redirect('warehouse/edit_outward/' . $outward_id . '/TRUE');
            } else {
                redirect('warehouse/edit_outward/' . $outward_id . '/FALSE');
            }
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['vendors'] = $this->functions->get_all_row('tbl_master_vendors');
        $this->data['items'] = $this->functions->get_all_row('tbl_warehouse_item'); // Edited by Rakesh Dated: 19/07/2019 ('tbl_master_item') to ('tbl_warehouse_item')
        $this->data['packages'] = $this->functions->get_all_row('tbl_master_package');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');

        $this->data['outward'] = $this->functions->get_single_row('tbl_outwards', 'outward_id', $outward_id);
        $where_array = array('stock_type' => 'O', 'io_number' => $outward_id);
        $this->data['warehouses'] = $this->functions->get_all_row_multipe_where('tbl_warehouse', $where_array);
        $this->load->view('warehouse/edit_outward', $this->data);
    }

    function printoutward($outward_id) {
        $this->data['outward'] = $this->functions->get_single_row('tbl_outwards', 'outward_id', $outward_id);
        $where_array = array('stock_type' => 'O', 'io_number' => $outward_id);
        $this->data['warehouses'] = $this->functions->get_all_row_multipe_where('tbl_warehouse', $where_array);
        $this->load->view('warehouse/printoutward', $this->data);
    }

    function delete_outward() {
        if (!$this->flexi_auth->is_privileged('Delete Outward')) {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "You do not have privileges.";
            echo json_encode($data_arr);
            die;
        }
        $outward_id = $this->input->post('id');
        $response = $this->functions->delete_single_row('tbl_outwards', 'outward_id', $outward_id);
        $this->db->where('io_number', $outward_id)->where('stock_type', 'O')->delete('tbl_warehouse');
        //FOR ACTIVIES LOG
        $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $outward_id;
        $activites['activity_type'] = 'Outward';
        $activites['action'] = 'deleted';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' deleted outward.';
        $activites['module'] = 'warehouse/outward';
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

    function stock() {
        if (!$this->flexi_auth->is_privileged('Warehouse Stock')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
        if (!empty($this->input->post('search'))) {
            $this->data['items'] = $this->functions->get_all_row('tbl_warehouse_item');
            $this->data['display'] = TRUE;
        }

        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->load->view('warehouse/stock', $this->data);
    }

    function reports() {
        if (!$this->flexi_auth->is_privileged('Warehouse Report')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges.</p>');
            redirect('auth');
        }
        $this->data['display'] = FALSE;
        if (!empty($this->input->post('search'))) {

            $this->data['display'] = TRUE;
//            if ($this->input->post('result_type') == 'D') {
                $from_date = system_date($this->input->post('from_date'));
                $to_date = system_date($this->input->post('to_date'));
  /*          } else {
                $from_date = system_date('01-' . $this->input->post('mfrom_date'));
                $to_date = date("Y-m-t", strtotime('01-' . $this->input->post('mto_date')));
            }*/

            $branch_id_fk = $this->input->post('branch_id_fk');
            $report_type = $this->input->post('report_type');

            if ($report_type == 'I') {
                $this->data['inwards'] = $this->db->where('inward_date >=', $from_date)
                                ->where('inward_date <=', $to_date)
                                ->where('branch_id_fk', $branch_id_fk)// Modified by Rakesh Dated 07-08-19
                                ->get('tbl_inwards')->result();
                $this->data['report_title'] = "Inward";
            }

            if ($report_type == 'O') {
                $this->data['outwards'] = $this->db->where('outward_date >=', $from_date)
                                ->where('outward_date <=', $to_date)
                                ->where('branch_id_fk', $branch_id_fk)// Modified by Rakesh Dated 07-08-19
                                ->get('tbl_outwards')->result();
                $this->data['report_title'] = "Outward";
            }


            if ($report_type == 'A') {
                $this->data['report_title'] = "All";
            }

            $this->data['start_date'] = $from_date;
            $this->data['end_date'] = $to_date;
            $this->data['branch_id_fk'] = $branch_id_fk;
            $this->data['report_type'] = $report_type;
            #echo '<pre>';
            #print_r($this->data['inwards']);
            #die;
        }
        if (empty($this->data['report_title'])) {
            $this->data['report_title'] = "";
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['branches'] = $this->functions->get_all_row_id_based('tbl_master_branch_agent', 'ba_type', 'B');
        $this->data['items'] = $this->functions->get_all_active_row_rk('tbl_warehouse_item');
        $this->load->view('warehouse/reports', $this->data);
    }

    function get_items() {
        $items = $this->functions->get_all_active_row('tbl_master_item');
        $str = '';
        foreach ($items as $item):
            $str .= '<option value="' . $item->item_id . '">' . $item->item_name . '</option>';
        endforeach;
        echo $str;
    }



    function get_items_rk() {
        $items = $this->functions->get_all_active_row_rk('tbl_warehouse_item'); // Modified by Rakesh Dated 19/07/2019 Change Table name tbl_master_item with tbl_warehouse_item and function name  get_all_active_row to get_all_active_row_rk
        $str = '';
        foreach ($items as $item):
            $str .= '<option value="' . $item->item_id . '">' . $item->item_name . '</option>';
        endforeach;
        echo $str;
    }


    /* Modified by Rakesh Dated: 18/07/2019 @ 02:00 PM */
    
    // Add and Item to tbl_werehouse_item table

    function add_item()
    {
        $this->data['packages'] = $this->functions->get_all_active_row('tbl_master_package');
        $this->data['freight_methods'] = $this->functions->get_all_active_row('tbl_master_freight_method');
        $this->data['bagents'] = $this->functions->get_all_active_row('tbl_master_branch_agent');
        $this->data['companies'] = $this->functions->get_all_active_row('tbl_master_company');
        $this->load->view('warehouse/add_item_ajax', $this->data);
    }

    function add_ajax() {
        $data = $this->input->post('data');
        $data['modified_by'] = $this->flexi_auth->get_user_id();
        $data['added_on'] = date("Y-m-d h:i:s");
        $response = $this->functions->insert_into_table('tbl_warehouse_item', $data);

        //FOR ACTIVIES LOG
      $activites['user_id'] = $this->flexi_auth->get_user_id();
        $activites['activity_id'] = $response;
        $activites['activity_type'] = 'Item';
        $activites['action'] = 'added';
        $activites['name'] = $this->function_library->get_user_name($this->flexi_auth->get_user_id()) . ' added item.';
        $activites['module'] = 'warehouse/item';
        $activites['created_at'] = date("Y-m-d h:i:s");
        $this->functions->insert_into_table('activities', $activites);

        if ($response) {
            $data_arr["status"] = 'success';
            $data_arr["status_message"] = $response;
            echo json_encode($data_arr);

        } else {
            $data_arr["status"] = 'fail';
            $data_arr["status_message"] = "Try Again";
            echo json_encode($data_arr);
        }
    }

    /* End*/
}
