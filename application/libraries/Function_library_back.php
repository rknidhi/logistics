<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Function_library {

    function __construct() {
        $this->obj = & get_instance();
    }

    #----Upload Image Function-----------------#

    function upload_image($source_path, $destination_path, $extension, $width, $height, $waterMark = 0) {
        $imgdata = exif_read_data($source_path, 'IFD0');
        if (($extension == 'png') || ($extension == 'PNG')) {
            $source = imagecreatefrompng($source_path);
        } elseif (($extension == 'gif') || ($extension == 'GIF')) {
            $source = imagecreatefromgif($source_path);
        } else {
            $source = imagecreatefromjpeg($source_path);
        }
        if (!empty($imgdata['Orientation'])) {
            switch ($imgdata['Orientation']) {
                case 8:
                    $degrees = 90;
                    break;
                case 3:
                    $degrees = 180;
                    break;
                case 6:
                    $degrees = -90;
                    break;
            }
            $imgRotated = imagerotate($source, $degrees, 0);
            imagejpeg($imgRotated, $destination_path, 100);
        } else {
            imagejpeg($source, $destination_path, 100);
        }
        $config['image_library'] = 'gd2';
        $config['source_image'] = $destination_path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;
        if ($this->obj->image_lib) {
            $this->obj->image_lib->initialize($config);
            $this->obj->image_lib->resize();
        }
        if ($waterMark != 0) {
            $this->water_mark($destination_path);
        }
    }

    #----End-----------------------------------#
    #----Watermark Image Function--------------#

    function water_mark($destination_path) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $destination_path;
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './uploads/watermark/';
        $config['wm_opacity'] = 50;
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'center';

        $this->obj->image_lib->initialize($config);
        $this->obj->image_lib->watermark();
    }

    #----End-----------------------------------#

    function upload_image_with_thumb($source_path, $destination_path, $thumb_path, $extension, $th_width, $th_height, $waterMark = 0) {
        if (($extension == 'png') || ($extension == 'PNG')) {
            $source = imagecreatefrompng($source_path);
        } elseif (($extension == 'gif') || ($extension == 'GIF')) {
            $source = imagecreatefromgif($source_path);
        } else {
            $source = imagecreatefromjpeg($source_path);
        }
        $degrees = 0;
        imagejpeg($source, $destination_path, 100);
        imagejpeg($source, $thumb_path, 100);


        //This function can generate both thumb and image #currently generating thumb only
        $config['image_library'] = 'gd2';
        $config['source_image'] = $thumb_path;
        $config['maintain_ratio'] = TRUE;
        $config['master_dim'] = 'auto';
        $config['width'] = $th_width;
        $config['height'] = $th_height;
        $this->obj->image_lib->initialize($config);
        $this->obj->image_lib->resize();
        if ($this->obj->image_lib) {
            $this->obj->image_lib->initialize($config);
            $this->obj->image_lib->resize();
            $this->obj->image_lib->clear();
        }

        if ($waterMark) {
            $this->water_mark($destination_path);
        }
    }

    #----Handel CSV Import---------------------#

    public function handel_csv($file_path, $head = NULL) {
        $file = fopen($file_path, 'r');
        $head_row = $head ? $head : fgetcsv($file);
        $data = array();
        $new = '';
        while ($row = fgetcsv($file)) {
            $data[] = array_combine($head_row, html_escape($row));
            $json_string = json_encode($data);
            $new = json_decode(str_replace(',"":""', '', $json_string), TRUE);
        }
        fclose($file);
        return $new;
    }

    #----End-----------------------------------#

    public function username() {
        $next_increment_id = $this->obj->functions->next_id('user_accounts');
        $code_prefix = $this->obj->config->item('username_code_prefix');
        $user_name = $code_prefix . str_pad($next_increment_id, '3', '0', STR_PAD_LEFT);
        return $user_name;
    }

    public function get_user_name($uacc_id_fk) {
        $user = $this->obj->functions->get_single_row('user_profiles', 'upro_uacc_fk', $uacc_id_fk);
        return $user->user_firstname . ' ' . $user->user_lastname;
    }

    public function get_user_details($uacc_id_fk) {
        return $this->obj->functions->get_single_row('user_profile', 'uacc_id_fk', $uacc_id_fk);
    }

    public function get_user_email($uacc_id_fk) {
        $user = $this->obj->functions->get_single_row('user_accounts', 'uacc_id', $uacc_id_fk);
        return $user->uacc_email;
    }

    public function get_uacc_username($uacc_id_fk) {
        $user = $this->obj->functions->get_single_row('user_accounts', 'uacc_id', $uacc_id_fk);
        return $user->uacc_username;
    }

    public function get_user_group($uacc_id_fk) {
        $user = $this->obj->functions->get_single_row('user_accounts', 'uacc_id', $uacc_id_fk);
        return $user->uacc_group_fk;
    }

    public function get_profile_picture($user_id) {
        return $this->obj->functions->get_single_row_colum('user_profile', 'user_profile', 'uacc_id_fk', $user_id);
    }

    public function get_user_token($token, $user_id) {
        $this->obj->load->model('flexi_auth_model');
        $user_session = $this->obj->flexi_auth_model->get_session_token($token, $user_id);
        if (!$user_session) {
            return FALSE;
        }
        return TRUE;
    }

    public function encode_id($id) {
        $this->obj->load->library('encryption');
        $this->obj->encryption->initialize(
                array(
                    'cipher' => 'aes-128',
                    'mode' => 'ctr',
                    'key' => $this->obj->config->item('encryption_key')
                )
        );

        $raw_id = $this->obj->encryption->encrypt($id);
        return rawurlencode($raw_id);
    }

    public function decode_id($id) {
        $this->obj->load->library('encryption');
        $this->obj->encryption->initialize(
                array(
                    'cipher' => 'aes-128',
                    'mode' => 'ctr',
                    'key' => $this->obj->config->item('encryption_key')
                )
        );
        $raw_id = rawurldecode($id);
        $safe_id = $this->obj->encryption->decrypt($raw_id);
        return $safe_id;
    }

    public function isGroupPermission($upriv_groups_ugrp_fk, $upriv_groups_upriv_fk) {

        $num_rows = $this->obj->db->where('upriv_groups_ugrp_fk', $upriv_groups_ugrp_fk)->where('upriv_groups_upriv_fk', $upriv_groups_upriv_fk)->get('user_privilege_groups')->num_rows();
        //echo $this->obj->db->last_query();
        if ($num_rows > 0)
            return 1;
        else
            return 0;
    }

    //MASTER
    public function FindState($state_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_states', 'state_name', 'state_id', $state_id);
    }

    public function FindBranchGroup($bgroup_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_branchgroup', 'branch_group', 'bgroup_id', $bgroup_id);
    }

    public function FindPackage($package_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_package', 'package', 'package_id', $package_id);
    }

    public function FindCompany($company_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_company', 'company_name', 'company_id', $company_id);
    }

    public function FindBrachAgent($branch_agent_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_branch_agent', 'branch_agent', 'branch_agent_id', $branch_agent_id);
    }

    public function FindStation($station_id) {
        return @$this->obj->functions->get_single_row_colum('tbl_master_station', 'station_name', 'station_id', $station_id);
    }

    public function FindVehicle($vehicle_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_vehicle', 'registration_no', 'vehicle_id', $vehicle_id);
    }

    public function FindParty($party_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_party', 'party_name', 'party_id', $party_id);
    }

    public function FindPartyDetails($party_id) {
        return $this->obj->functions->get_single_row('tbl_master_party', 'party_id', $party_id);
    }

    public function FindPartyBranch($party_id) {
        $branch_agent_id_fk = $this->obj->functions->get_single_row('tbl_master_party', 'branch_agent_id_fk', 'party_id', $party_id);
        return $branch_agent_id_fk;
        return $this->FindBrachAgent($branch_agent_id_fk);
    }

    public function FindItemDetails($item_id) {
        return $this->obj->functions->get_single_row('tbl_master_item', 'item_id', $item_id);
    }

    public function FindFreightMethod($fm_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_freight_method', 'freight_method', 'fm_id', $fm_id);
    }

    public function FindPackageMethod($package_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_package', 'package', 'package_id', $package_id);
    }

    public function FindLedgerName($ledger_id) {
        return $this->obj->functions->get_single_row_colum('ac_ledger_master', 'ledger_name', 'ledger_id', $ledger_id);
    }

    public function FindDriverDetails($driver_id) {
        return $this->obj->functions->get_single_row('tbl_master_driver', 'driver_id', $driver_id);
    }

    public function FindBrokerDetails($broker_id) {
        return $this->obj->functions->get_single_row('tbl_master_broker', 'broker_id', $broker_id);
    }

    public function FindBrokerName($broker_id) {
        if (!empty($broker_id)) {
            return @$this->obj->functions->get_single_row_colum('tbl_master_broker', 'broker', 'broker_id', $broker_id);
        } else
            return '-';
    }

    public function FindVehicleByReg($registration_no) {
        #return $registration_no;
        return $this->obj->functions->get_single_row('tbl_master_vehicle', 'registration_no', $registration_no);
    }

    public function FindVendor($vendor_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_vendors', 'vendor_name', 'vendor_id', $vendor_id);
    }

    public function FindItemName($item_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_item', 'item_name', 'item_id', $item_id);
    }

    public function FindAcGroupName($aag_id) {
        return $this->obj->functions->get_single_row_colum('ac_account_group', 'group_name', 'aag_id', $aag_id);
    }

    public function FindLedger($ledger_id) {
        return $this->obj->functions->get_single_row_colum('ac_ledger_master', 'ledger_name', 'ledger_id', $ledger_id);
    }

    public function FindEmployee($employee_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_employee', 'employee_name', 'employee_id', $employee_id);
    }

    public function GetInitialOpeningBalance($ledger_id, $till_date) {
        
        $main_opening_balance = $this->obj->functions->get_single_row_colum('ac_ledger_master', 'opening_balance', 'ledger_id', $ledger_id);
        $total_debit = 0;
        $total_credit = 0;
        // Modified Dated:24-09-19
            $balance_type = $this->obj->functions->get_single_row_colum('ac_ledger_master', 'balance_type', 'ledger_id', $ledger_id);        
        // End
        if($balance_type == 'Debit'){
            $main_opening_balance = -$main_opening_balance;
        }


        if (!empty($till_date)) {
            $total_credit = $this->obj->db->select_sum('amount')->where('ledger', $ledger_id)->where('voucher_date <', convertToMySQLDate($till_date))->where('transaction_type', 'Credit')->get('tbl_vouchers')->row()->amount;
            $total_debit = $this->obj->db->select_sum('amount')->where('ledger', $ledger_id)->where('voucher_date <', convertToMySQLDate($till_date))->where('transaction_type', 'Debit')->get('tbl_vouchers')->row()->amount;
        }
        $opening_balance = $main_opening_balance + $total_credit - $total_debit;
        return $opening_balance;
    }

    public function GetOpeningBalance($ledger_id) {
        return $this->obj->functions->get_single_row_colum('ac_ledger_master', 'opening_balance', 'ledger_id', $ledger_id);
    }

    public function GetClosingBalance($opening_balance, $type, $amount) {
        if ($type == 'Debit')
            $result = $opening_balance - $amount;
        else
            $result = $opening_balance + $amount;
        return $result;
    }

    public function calculateTB($aag_id, $filters, $type) {
        $this->obj->db->select_sum('amount')->where('transaction_type', $type)->where('ac_ledger_master.aag_id_fk', $aag_id);
        if (!empty($filters['company'])) {
            $this->obj->db->where('ac_ledger_master.company_id_fk', $filters['company']);
        }
        if (!empty($filters['branch_name'])) {
            $this->obj->db->where('tbl_vouchers.branch_id_fk', $filters['branch_name']);
        }
        if (!empty($filters['from_date'])) {
            $this->obj->db->where('voucher_date >=', system_date($filters['from_date']));
        }
        if (!empty($filters['to_date'])) {
            $this->obj->db->where('voucher_date <=', system_date($filters['to_date']));
        }
        if (!empty($filters['voucher_type'])) {
            $this->obj->db->where('voucher_type', $filters['voucher_type']);
        }
        $result = $this->obj->db->join('ac_ledger_master', "ac_ledger_master.ledger_id = tbl_vouchers.ledger")->get('tbl_vouchers')->row()->amount;
        return $result;
        //echo $this->obj->db->last_query();
    }

    public function FindDeliveryMode($fm_id) {
        if (!empty($fm_id) && $fm_id > 0) {
            return $this->obj->functions->get_single_row_colum('tbl_master_delivery_mode', 'freight_method', 'fm_id', $fm_id);
        } else
            return '-';
    }

    public function FindDriverName($driver_id) {
        if (!empty($driver_id) && $driver_id > 0) {
            return $this->obj->functions->get_single_row_colum('tbl_master_driver', 'name', 'driver_id', $driver_id);
        } else
            return '-';
    }

    public function GetGRLastLocation($bgr_id_fk) {
        if (!empty($bgr_id_fk)) {
            $res = $this->obj->db->where('bgr_id_fk', $bgr_id_fk)->order_by('track_date', 'DESC')->get('tracking')->num_rows();
            if ($res > 0) {
                $result = $this->obj->db->where('bgr_id_fk', $bgr_id_fk)->order_by('track_date', 'DESC')->get('tracking')->row();
                return !empty($result->evening_location) ? $result->evening_location : $result->morning_location;
            } else
                return '-';
        } else
            return '-';
    }

    public function WarehouseItemCount($stock_type, $io_number, $item_id) {
        $this->obj->db->select_sum('item_qty');
        $this->obj->db->where('stock_type', $stock_type)->where('io_number', $io_number);
        if (!empty($item_id))
            $this->obj->db->where('item_id_fk', $item_id);
        return $this->obj->db->get('tbl_warehouse')->row()->item_qty;
    }

    public function CalculateBookingBill($gr_nos) {
        $grnos = explode(',', $gr_nos);
        $this->obj->db->select_sum('bill_total');
        $this->obj->db->where_in('bgr_id', $grnos);
        $result = $this->obj->db->get('booking_gr')->row()->bill_total;
        //echo $this->obj->db->last_query();
        return $result;
    }

    public function CalculateBookingBillGST($gr_nos, $type) {
        $grnos = explode(',', $gr_nos);

        $cgst = $sgst = 0;
        $bills = $this->obj->db->where_in('bgr_id', $grnos)->get('booking_gr')->result();
        foreach ($bills as $bill) {

            if ($bill->bill_cgst > 0) {
                $tmpcgst = round(($bill->bill_sub_total * $bill->bill_cgst) / 100);
                $cgst += $tmpcgst;
            }

            if ($bill->bill_sgst > 0) {
                $tmpsgst = round(($bill->bill_sub_total * $bill->bill_sgst) / 100);
                $sgst += $tmpsgst;
            }
        }
        return json_encode(array('cgst' => $cgst, 'sgst' => $sgst));
        //echo $this->obj->db->last_query();
        // $result;
    }

    public function party_details($party_id) {
        $party = $this->obj->functions->get_single_row('tbl_master_party', 'party_id', $party_id);
        return json_encode($party);
    }

    public function calculateDr($group, $from_date, $to_date, $company, $branch, $type) {
        //return "$group, $from_date, $to_date, $company, $branch";

        $this->obj->db->select_sum('tbl_vouchers.amount');
        if ($type == 'Debit')
            $this->obj->db->where('tbl_vouchers.transaction_type', 'Debit');
        else
            $this->obj->db->where('tbl_vouchers.transaction_type', 'Credit');
        $this->obj->db->join('ac_ledger_master', "ac_ledger_master.ledger_id = tbl_vouchers.ledger", "INNER");

        if (!empty($group)) {
            $this->obj->db->where('ac_ledger_master.aag_id_fk', $group);
        }

        if (!empty($from_date)) {
            $this->obj->db->where('voucher_date >=', system_date($from_date));
        }
        if (!empty($to_date)) {
            $this->obj->db->where('voucher_date <=', system_date($to_date));
        }
        if (!empty($company)) {
            $this->obj->db->where('ac_ledger_master.company_id_fk', $company);
        }
        if (!empty($branch)) {
            $this->obj->db->where('branch_id_fk', $branch);
        }
        return $this->obj->db->from('tbl_vouchers')->get()->row()->amount;
    }

    public function FindStationaryName($st_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_stationary', 'name', 'st_id', $st_id);
    }


// Edited by Rakesh

    public function FindItemName_rk($item_id) {
        return $this->obj->functions->get_single_row_colum('tbl_warehouse_item', 'item_name', 'item_id', $item_id);
    }

    public function track_trace_detail_challan($item_id) {
        return $this->obj->functions->get_single_row_colum('tbl_warehouse_item', 'item_name', 'item_id', $item_id);
    }

    public function getBrokerName($item_id)
    {
        if (!empty($item_id)) {
            return @$this->obj->functions->get_single_row_colum('tbl_master_broker', 'broker', 'broker_id', $item_id);
        } else
            return '-';

    }

    public function getBillDate($item_id)
    {
        $bill_date = $this->obj->functions->get_row_id_based('book_billing', 'billing_id', $item_id);
        if (!empty($item_id)) {
            return @$this->obj->functions->get_single_row_colum('book_billing', 'invoice_date', 'billing_id', $item_id);
        } else
            return '-';
    }


    public function getVoucherName($item_id)
    {
        $voucher_name = $this->obj->functions->get_row_id_based('ac_ledger_master', 'ledger_id', $item_id);
            return $voucher_name->ledger_name;
        }



    public function getBillInvoiceNo($item_id)
    {
        if (!empty($item_id)) {
            return @$this->obj->functions->get_single_row_colum('book_billing', 'invoice_no', 'billing_id', $item_id);
        } else
            return '-';

    }

    public function getVenderName($vender_id)
    {
        $vender_name = $this->obj->functions->get_row_id_based('tbl_master_vendors', 'vendor_id', $vender_id);
            return $vender_name->vendor_name;
    }

    public function getInwardward($id)
    {
        $io_number = $this->obj->functions->get_row_id_based('tbl_inwards', 'inward_id', $id);
        return $io_number->inward_no;
    }

    public function getOutward($id)
    {
        $io_number = $this->obj->functions->get_row_id_based('tbl_outwards', 'outward_id', $id);
        return $io_number->outward_no;
    } 
    
    public function grItemCount($grNo)
    {
        return $this->obj->functions->get_num_rows('tbl_gr_items', 'bgr_id', $grNo);
    }

    public function getNextID(){
        $next_increment_id = $this->obj->functions->next_id('fresh_booking_gr');
        return $next_increment_id;
    }

    // Modified by Rakesh Dated:27-08-19
    public function CalculateBookingBill1($gr_nos) {
        $grnos = explode(',', $gr_nos);
        $this->obj->db->select_sum('bill_total');
        $this->obj->db->where_in('bgr_id', $grnos);
        $result = $this->obj->db->get('fresh_booking_gr')->row()->bill_total;
        return $result;
    }

    // Modified by Rakesh Dated:10-09-19
    public function select_balance_sheet_data(){
        $voucher = $this->obj->db->get('tbl_vouchers')->result();
        $ledger = array();
        foreach($voucher as $row_ledger){
            $ledger[]= $row_ledger->ledger;
        }
        $this->obj->db->where_in('ledger_id',array_unique($ledger));
        $ledger = $this->obj->db->get('ac_ledger_master')->result();
        return $ledger;
    }

    // Calculate Balance Sheet Total
    public function balance_sheet_total($filters, $type) {
        $this->obj->db->select_sum('amount')->where('transaction_type', $type);
        if (!empty($filters['company'])) {
            $this->obj->db->where('ac_ledger_master.company_id_fk', $filters['company']);
        }
        if (!empty($filters['branch_name'])) {
            $this->obj->db->where('tbl_vouchers.branch_id_fk', $filters['branch_name']);
        }
        if (!empty($filters['from_date'])) {
            $this->obj->db->where('voucher_date >=', system_date($filters['from_date']));
        }
        if (!empty($filters['to_date'])) {
            $this->obj->db->where('voucher_date <=', system_date($filters['to_date']));
        }
        if (!empty($filters['voucher_type'])) {
            $this->obj->db->where('voucher_type', $filters['voucher_type']);
        }
        $result = $this->obj->db->join('ac_ledger_master', "ac_ledger_master.ledger_id = tbl_vouchers.ledger")->get('tbl_vouchers')->row()->amount;
        return $result;
    } 
    
    // Added on Dated 10-10-19
    public function FindLedgerGroup($ledger_typeid) {
        return $this->obj->functions->get_single_row_colum('tbl_ledger_type', 'ledger_type', 'ltype_id', $ledger_typeid);
    }
 
    public function FindVehicleSize($vehicle_id) {
        return $this->obj->functions->get_single_row_colum('tbl_master_vehicle', 'vehicle_type', 'vehicle_id', $vehicle_id);
    }    

    // Added on Dated:15-11-2019
    public function getVechileList(){
        $grValues1 = array();
        $grValues = $this->obj->functions->get_all_row_id_based('challan_dispatch','gr_no_fk !=','');
        if(count($grValues)>0){
        foreach($grValues as $grv){
            $grValues1[] =  $grv->gr_no_fk;
            $grValues1[] =  $grv->gr_no_inc;
        }
    }
    else {
        $grValues1[] =  '';
        $grValues1[] =  '';

    }
    $resultset = $this->obj->functions->get_gr_where_not_in_back($grValues1);
    return   $resultset;                      
    }    
/*    public function getVechileList(){
        $grValues1 = array();
        $grValues = $this->obj->functions->get_all_row_id_based('challan_dispatch','gr_no_fk !=','');
        foreach($grValues as $grv){
            $grValues1[] =  $grv->gr_no_fk;
            $grValues1[] =  $grv->gr_no_inc;
        }
        $resultset = $this->obj->functions->get_gr_where_not_in_back($grValues1);
        return   $resultset;                      
    } */

    public function challanGRdetails($gr_list,$challanNo){
    $total_items = 0;
    $total_weight = 0;
    $grlist = '<tr>
    <th>Sr. No.</th>
    <th>GR. No.</th>
    <th>Consignor</th>
    <th>Consignee</th>
    <th>Invoice No.</th>
    <th>Item</th>
    <th>Truck Freight</th>
    <th>Weight</th>
</tr>';
    $resultset = $this->obj->db->select('*')
                 ->where_in('bgr_id',$gr_list)
                 ->get('booking_gr')->result();
                 $srno=1;
    foreach($resultset as $row){
        $count_items = $this->obj->functions->get_sum_of_column('tbl_gr_items','item_qty','bgr_id',$row->bgr_id);
        $item_weight = $this->obj->functions->get_sum_of_column('tbl_gr_items','item_weight','bgr_id',$row->bgr_id);
        $total_items += $count_items;
        $total_weight += $item_weight;

        $grlist .= '<tr><td>'.$srno.'<td>'.$row->bgr_id.'</td><td>'. $this->obj->function_library->FindPartyDetails($row->consignor_id_fk)->party_name.'</td><td>'.$this->obj->function_library->FindPartyDetails($row->consignee_id_fk)->party_name.'</td><td>'.$row->invoice_no.'</td><td>'.$count_items.'</td><td>'.$row->s_total_freight.'</td><td>'.$item_weight.'</td></tr>'."\n";
        $srno++;   
    }

        $data['grlist'] = $grlist;
        $data['items']  = $total_items;
        $data['weight'] = $total_weight;
    return $data;
}


public function grlisting($challan_no){
    $grValues = $this->functions->get_all_row_id_based('challan_dispatch','gr_no_fk !=','');
    foreach($grValues as $grv){
        $grValues1[] =  $grv->gr_no_fk;
        $grValues1[] =  $grv->gr_no_inc;
    }
    $grValues1 = array_values(array_diff($grValues1,array("null","")));
    $grlist = $this->functions->get_gr_where_not_in_back($grValues1, $challan_no);
    return $grlist;
}

public function getallgr(){
    $grlist =  $this->obj->functions->get_all_row('booking_gr');
    $opt = '';
    foreach($grlist as $grd){
        $opt .= '<option value="'.$grd->bgr_id.'">'.$grd->bgr_id.'</option>'."\n";
    } 
    return $opt;
}
    // End
}