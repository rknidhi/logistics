<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['branch_agent'] = array('B' => 'Branch', 'A' => 'Agent');

$config['party_type'] = array(1 => 'Paid', 2 => 'TBB', 3 => 'FOC', 4 => 'To Pay');

$config['gst_type'] = array('R' => 'Regular', 'U' => 'Unregistered');

$config['taxes_paid_by'] = array('TR' => 'Transporter', 'CR' => 'Consigner', 'CE' => 'Consignee', 'EX' => 'Exempted');
$config['delivery_type'] = array('GD' => 'Godown Delivery', 'PD' => 'Party Delivery', 'DD' => 'Door Delivery');

$config['vehicle_ownership'] = array('O' => 'Owned', 'R' => 'Rented');

$config['vehicle_type_new'] = array('Pickup', '407', '14 FT', '17 FT', '17 FT', '19 FT', '9 MT', '15 MT', '22 MT', '25 MT', '35 MT', 'TRAILER 40 FT', 'SEMI TRAILER', 'HIGH BED TRAILER', 'ODC MOVEMENT', '32 FT', ' SINGLE AXLE', '32 FT. MULTY AXLE', '20 FT. CONTAINER', '40 FT. CONTAINER');

$config['emp_designation'] = array('EX' => ' EXECUTIVE', 'SE' => ' SALES EXECUTIVE', 'AD' => 'LOGISTICS EXECUTIVE', 'DIRECTOR' => 'DIRECTOR', 'MD' => ' MANAGING DIRECTOR', 'BM' => ' BRANCH MANAGER', 'MM' => ' MARKETING MANAGER'
    , 'GM' => 'GENERAL MANAGER', 'RM' => ' REGIONAL MANAGER', 'AM' => 'AREA MANAGER', 'AH' => 'ACCOUNT HEAD', 'AM' => 'ACCOUNT MANAGER', 'CSH' => 'CASHIER', 'TM' => 'TRAFFIC MANAGER', 'TC' => 'TRAFFIC IN CHARGE', 'S' => 'SUPERVISOR', 'CEO' => 'CEO');
/*
$config['voucher_types'] = array('Contra', 'Credit Note', 'Debit Note', 'Delivery Note', ' Job Work In Order', 'Journal', ' Material In', ' Material Out',
    'Memorandum', 'Payment', 'Physical Stock', 'Purchase', 'Purchase Order', 'Receipt', 'Receipt Note', 'Rejections In', 'Rejections Out', 'Reversing Journal',
    'Sale', 'Sales Order', 'Stock Journal');*/

$config['voucher_types'] = array('Contra', 'Journal', 'Payment', 'Receipt', 'Sale');
$config['achm_under'] = array('HR' => 'HR', 'Manager' => 'Manager', 'Accounts' => 'Accounts');

$config['currency'] = array('INR' => 'INR', 'Dollar' => 'Dollar');

$config['trans_type'] = array('Debit' => 'Dr.', 'Credit' => 'Cr.');

$config['programme_type'] = array('Good Liting', 'Type 2', 'Type 3');

$config['stationary_type'] = array('Type1', 'Type 2', 'Type 3');


// Added by Rakesh Dated 11-10-19
$config['vtype']['Contra'] = array('debit'=>array('Company'),'credit'=>array('Company'));
//$config['vtype']['Sale'] =  array('debit'=>array('Party','Vendor','Broker','Driver'),'credit'=>array('Other'));
$config['vtype']['Sale'] =  array('credit'=>array('Party','Vendor','Broker','Driver'),'debit'=>array('Other'));


$config['vtype']['Purchase'] = array('debit'=>array('Other'),'credit'=>array('Party','Vendor','Broker','Driver'));
$config['vtype']['Payment'] = array('credit'=>array('Company'),'debit'=>array('Party','Vendor','Broker','User','Agent','Other','Driver'));
//$config['vtype']['Payment'] = array('credit'=>array('Company'),'debit'=>array('Party','Vendor','Broker','Driver'));

$config['vtype']['Receipt'] = array('debit'=>array('Party','Vendor','Broker','Agent','Driver'),'credit'=>array('Company'));


$config['vtype1']['Sale'] = array('bill'=>'Bill');
$config['vtype1']['Receipt'] = array('bill'=>'Bill');
$config['vtype1']['Journal'] = array('lhc'=>'LHC');
$config['vtype1']['Payment'] = array('lhc'=>'LHC');


/*$config['vtype1']['Sale'] = array('bill'=>'Bill');
$config['vtype1']['Receipt'] = array('bill'=>'Bill');
$config['vtype1']['Journal'] = array('gr'=>'GR');
$config['vtype1']['Payment'] = array('gr'=>'GR');*/
// End