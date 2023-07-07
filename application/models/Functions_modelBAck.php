<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Functions_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    #-----get next id--------------------------#

    public function next_id($table) {
        return $this->db->select('AUTO_INCREMENT')
                        ->where('table_name', $table)
                        ->where('table_schema', $this->db->database)
                        ->get('information_schema.tables')
                        ->row()
                ->AUTO_INCREMENT;
    }

    #-----end----------------------------------#
    #-----get single row data from a table-----#

    public function get_single_row($table, $attribute, $key) {
        return $this->db->where($attribute, $key)
                        ->get($table)
                        ->row();
    }

    public function get_single_row_multipe_where($table, $attribute) {
        return $this->db->where($attribute)
                        ->get($table)
                        ->row();
    }

    #-----end----------------------------------#
    #-----get single row-cell data from a table#

    public function get_single_row_colum($table, $colum_name, $attribute, $key) {
        $num_rows = $this->db->select($colum_name)
                ->where($attribute, $key)
                ->get($table)
                ->num_rows();
        if ($num_rows > 0) {
            return $this->db->select($colum_name)
                            ->where($attribute, $key)
                            ->get($table)
                            ->row()->$colum_name;
        } else {
            return '-';
        }
    }

    #-----end----------------------------------#
    #-----get all row data from a table--------#

    public function get_all_row($table) {
        return $this->db->get($table)
                        ->result();
    }

    public function get_all_row_multipe_where($table, $attribute) {
        return $this->db->where($attribute)
                        ->get($table)
                        ->result();
    }

    #-----end----------------------------------#
    #-----get all row based on a id------------#

    public function get_all_row_id_based($table, $attribute, $key) {
        return $this->db->where($attribute, $key)
                        ->get($table)
                        ->result();
    }

    #-----end----------------------------------#
    #-----get all activ row from a table-------#

    public function get_all_active_row($table) {
        return $this->db->where('status', 1)
                        ->get($table)
                        ->result();
    }

    #-----end----------------------------------#
    #-----get single row data from a table-----#

    public function delete_single_row($table, $attribute, $key) {
        return $this->db->where($attribute, $key)
                        ->delete($table);
    }

    #-----end----------------------------------#
    #-----delete image and thumb---------------#

    public function remove_image($table, $attribute, $key, $folder, $image_att, $thumb = NULL) {
        $image = $this->get_single_row_colum($table, $image_att, $attribute, $key);
        if ($image && $image !== 'no-image.png') {
            if (unlink('uploaded_files/' . $folder . '/' . $image)) {
                if ($thumb) {
                    if (unlink('uploaded_files/' . $folder . '/thumb/' . $image)) {
                        return TRUE;
                    }
                }
                return TRUE;
            }
        }
        return FALSE;
    }

    #-----end----------------------------------#
    #-----check duplicate value----------------#

    public function check_duplicate_value($table, $attribute) {
        return $this->db->where($attribute)
                        ->get($table)
                        ->num_rows();
    }

    #-----end----------------------------------#
    #-----get number of rows-------------------#

    public function get_num_rows($table, $attribute, $key) {
        return $this->db->where($attribute, $key)
                        ->get($table)
                        ->num_rows();
    }

    #-----end----------------------------------#
    #-----insert into table--------------------#

    public function insert_into_table($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    #-----end----------------------------------#
    #-----update a table-----------------------#

    public function update_table_rows($table, $attribute, $key, $data) {
        $this->db->where($attribute, $key)
                ->update($table, $data);
        return TRUE;
    }

    #-----end----------------------------------#
    #-----change status value------------------#

    public function status($table, $attribute, $key) {
        $status = $this->db->where($attribute, $key)
                ->get($table)
                ->row();
        if ($status->status == 1) {
            $data = array('status' => 0);
            $response = '<button class="btn btn-danger btn-icon btn-xs" id="' . $key . '" onclick="change_status(' . $key . ')"><i class="fa fa-times"></i></button>';
        } else {
            $data = array('status' => 1);
            $response = '<button class="btn btn-success btn-icon btn-xs" id="' . $key . '" onclick="change_status(' . $key . ')"><i class="fa fa-check"></i></button>';
        }
        $this->db->where($attribute, $key)
                ->update($table, $data);
        return $response;
    }

    #-----end----------------------------------#
    #-----get option for dropdown--------------#

    public function get_drop_down($table, $attribute, $key, $option_name, $option_id, $pre_id = NULL) {
        $raw_data = $this->db->where($attribute, $key, $option_name)
                ->get($table)
                ->result();
        $option = "";
        foreach ($raw_data as $value) {
            $option .= '<option value="' . $value->$option_id . '"' . ($value->$option_id == $pre_id ? 'selected' : '') . '>' . ucwords($value->$option_name) . '</option>';
        }
        return $option;
    }

    #-----end----------------------------------#
    #-----send email---------------------------#

    public function send_mail($title, $to, $from, $subject, $message) {
        $this->load->library('email');
        $this->email->clear();
        $this->email->initialize(array('mailtype' => $this->auth->email_settings['email_type']));
        $this->email->set_newline("\r\n");
        $this->email->from($from, $title);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }

    #-----end----------------------------------#
    #-----process api url----------------------#

    public function processURL($url) {
        $ch = curl_init();
        curl_setopt_array($ch, array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => 2));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, TRUE);
    }

    public function getCombinedCity($city_ids) {

        return $this->db->select('GROUP_CONCAT(city_name SEPARATOR ",") as cities', false)
                        ->from('tbl_city')
                        ->where_in('city_id', $city_ids)
                        ->get()->row()->cities;
    }

    public function getCityName($city_id) {
        return $this->db->where('city_id', $city_id)
                        ->get('tbl_city')
                        ->row()->city_name;
    }

    public function get_formdata_images($fd_id) {
        return $this->db->where('fd_id_fk', $fd_id)
                        ->get('form_data_images')
                        ->result();
    }

    public function get_mapped_promoters($activity_id, $store_id) {
        $query = $this->db->from('tbl_mapping')
                ->join('user_profile', 'tbl_mapping.uacc_id_fk = user_profile.uacc_id_fk', 'left')
                ->where('activity_id_fk', $activity_id)
                ->where('store_id_fk', $store_id)
                ->get()
                ->result();
        $data = array();
        foreach ($query as $promoter) {
            $data[] = $promoter->user_firstname . ' ' . $promoter->user_lastname;
        }
        return $data;
    }

    #-----end----------------------------------#




//Edite by Rakesh kumar Dated 19/07/2019 

  #-----get all activ row from a table-------#

    public function get_all_active_row_rk($table) {
        return $this->db->get($table)
                        ->result();
    }

// End    
}
