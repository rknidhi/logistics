<?php

//NEW FUNCTION

function convertToMySQLDate($date) {
    if(empty($date)){
        $date = date('Y-m-d');
    }
    return date("Y-m-d", strtotime($date));
}

function convertToMySQLDateTime($date) {
    return date("Y-m-d h:m:s", strtotime($date));
}

function convertToHumanDate($date) {
    if ($date != '01-01-1970' && $date != '0000-00-00' && $date != '' && $date != null) {
        return date("d-m-Y", strtotime($date));
    } else {
        return '';
    }
}

function convertToHumanDateTime($date) {
    if ($date != '01-01-1970' && $date != '0000-00-00' && $date != '' && $date != null) {
        return date("d-m-Y h:m:s", strtotime($date));
    } else {
        return '';
    }
}

function sms_me($message, $number) {
    return TRUE;
    $text = $message;
    $text = preg_replace('/[^A-Za-z0-9@. -\/]/', '', $text);
    $text = preg_replace('/  */', ' ', $text);
    $text = preg_replace('/\\s+/', ' ', $text);
    $text = str_replace(' ', '%20', $text);
    $url = 'http://www.sms.algocrats.com/api/sendhttp.php?authkey=118853AbxKxnJZfTs58490a5f&mobiles=' . $number . '&message=' . $text . '&sender=CANDID&route=4';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 50);
    curl_exec($ch);
    curl_close($ch);
    return TRUE;
}

function send_whatsapp($message, $number, $filename = NULL) {
    if ($filename == NULL) {
        $data = [
            'phone' => '91' . $number, // Receivers phone
            'body' => $message, // Message
        ];
    } else {
        $data = [
            'phone' => '91' . $number, // Receivers phone
            'body' => $message, // Message
            'filename' => "cover.jpg"
        ];
    }
    $json = json_encode($data); // Encode data to JSON
    // URL for request POST /message

    $url = 'https://eu3.chat-api.com/instance10948/message?token=ijw7a089d4l0kmbk';
    // Make a POST request
    $options = stream_context_create(['http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/json',
            'content' => $json
        ]
    ]);
    // Send a request
    $result = file_get_contents($url, false, $options);
}

function date_full_format($date) {
    $date = strtotime($date);
    return date('jS F Y', $date);
}

function date_only_format($date) {
    $date = strtotime($date);
    return date('d-M-Y', $date);
}

function time_only_format($time) {
    $time = strtotime($time);
    return date('h:i A', $time);
}

function system_date($date) {
    return date('Y-m-d', strtotime($date));
}

function date_time_full($date) {
    $date = strtotime($date);
    return date('d-M-y h:i A', $date);
}

function get_days($date_1, $date_2) {
    $date1 = date_create(date('Y-m-d', strtotime($date_1)));
    $date2 = date_create(date('Y-m-d', strtotime($date_2)));
    $diff = date_diff($date1, $date2);
    return $diff->format("%R%a days");
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function last_six_digit($number) {
    $str_arr = str_split($number);
    $num = '';
    for ($i = 4; $i < 10; $i++) {
        $num .= $str_arr[$i];
    }
    return $num;
}

function array_to_csv($array, $delim = ",", $newline = "\n", $enclosure = '"') {
    $out = '';
    foreach ($array as $key => $value) {
        foreach ($value as $head => $item) {
            $out .= $enclosure . str_replace($enclosure, $enclosure . $enclosure, $head) . $enclosure . $delim;
        }
        break;
    }
    $out = rtrim($out);
    $out .= $newline;
    foreach ($array as $key => $value) {
        foreach ($value as $item) {
            $out .= $enclosure . str_replace($enclosure, $enclosure . $enclosure, $item) . $enclosure . $delim;
        }
        $out = rtrim($out);
        $out .= $newline;
    }
    return $out;
}

function map_api_string($string) {
    $refine_string = str_replace(' ', '+', $string);
    return $refine_string;
}

function calculate_distance($target, $source, $type = 'km') {
    $radius = 6371;
    $LAT = deg2rad($source['lat'] - $target['lat']);
    $LNG = deg2rad($source['lng'] - $target['lng']);
    $range = (sin($LAT / 2) * sin($LAT / 2)) +
            cos(deg2rad($target['lat'])) * cos(deg2rad($source['lat'])) *
            (sin($LNG / 2) * sin($LNG / 2));
    $curvature = 2 * atan2(sqrt($range), sqrt(1 - $range));
    $distance = $radius * $curvature;
    if ($type == 'km') {
        return round($distance);
    }
    if ($type == 'mt') {
        return round($distance * 1000);
    }
}

function FileSizeConvert($bytes) {
    if ($bytes > 0) {
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                $result = strval(round($result, 2)) . " " . $arItem["UNIT"];
                break;
            }
        }
        return $result;
    } else {
        return '0 KB';
    }
}

if (!function_exists('force_download_new')) {

    function force_download_new($filename = '', $file = '') {
        if ($filename == '' OR $file == '') {
            return FALSE;
        }

        // Try to determine if the filename includes a file extension.
        // We need it in order to set the MIME type
        if (FALSE === strpos($filename, '.')) {
            return FALSE;
        }

        // Grab the file extension
        $x = explode('.', $filename);
        $extension = end($x);

        // Load the mime types
        @include(APPPATH . 'config/mimes' . EXT);

        // Set a default mime if we can't find it
        if (!isset($mimes[$extension])) {
            $mime = 'application/octet-stream';
        } else {
            $mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
        }

        // Generate the server headers
        if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE) {
            header('Content-Type: "' . $mime . '"');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header("Content-Transfer-Encoding: binary");
            header('Pragma: public');
            header("Content-Length: " . filesize($file));
        } else {
            header('Content-Type: "' . $mime . '"');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header("Content-Transfer-Encoding: binary");
            header('Expires: 0');
            header('Pragma: no-cache');
            header("Content-Length: " . filesize($file));
        }

        readfile_chunked($file);
        die;
    }

}

/**
 * readfile_chunked
 *
 * Reads file in chunks so big downloads are possible without changing PHP.INI
 *
 * @access    public
 * @param    string    file
 * @param    boolean    return bytes of file
 * @return    void
 */
if (!function_exists('readfile_chunked')) {

    function readfile_chunked($file, $retbytes = TRUE) {
        $chunksize = 1 * (1024 * 1024);
        $buffer = '';
        $cnt = 0;

        $handle = fopen($file, 'r');
        if ($handle === FALSE) {
            return FALSE;
        }

        while (!feof($handle)) {
            $buffer = fread($handle, $chunksize);
            echo $buffer;
            ob_flush();
            flush();

            if ($retbytes) {
                $cnt += strlen($buffer);
            }
        }

        $status = fclose($handle);

        if ($retbytes AND $status) {
            return $cnt;
        }

        return $status;
    }

}

function is_preview_available($file_ext) {
    if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg' || $file_ext == 'psd' || $file_ext == 'ai' || $file_ext == 'cdr' || $file_ext == 'pdf')
        return TRUE;
    else
        return FALSE;
}

function is_preview($file_ext) {
    if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg')
        return TRUE;
    else
        return FALSE;
}

function print_priority($priority) {
    if ($priority == 'L') {
        return '<button class="btn btn-mint btn-xs">L</button>';
    } else if ($priority == 'M') {
        return '<button class="btn btn-warning btn-xs">M</button>';
    } else if ($priority == 'H') {
        return '<button class="btn btn-danger btn-xs">H</button>';
    }
}

function calculate_campaign_status($project_start_date, $project_end_date) {
    //$current_date = date("Y-m-d h:i:s");
    $date1 = new DateTime($project_start_date);
    $date2 = new DateTime($project_end_date);
    $date3 = new DateTime();
    if ($date3 >= $date1 && $date3 <= $date2) {
        $result = 1;
    } else if ($date3 > $date2) {
        $result = 2;
    } else {
        $result = 0;
    }


    return $result;
}

function calculate_regionaluser_status($active_end_date) {
    //$current_date = date("Y-m-d h:i:s");
    $date1 = new DateTime($active_end_date);
    $date2 = new DateTime();
    if ($date2 > $date1) {
        $result = 0;
    } else if ($date2 <= $date1) {
        $result = 1;
    }
    return $result;
}

function comparefunctionarray($a, $b) {
    return $b["st_id"] - $a["st_id"];
}

function comparefunctionarrayaddedon($a, $b) {
    return $b["added_on"] - $a["added_on"];
}

function no_to_words($no) {
    $words = array('0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten', '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fouteen', '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty', '30' => 'thirty', '40' => 'fourty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy', '80' => 'eighty', '90' => 'ninty', '100' => 'hundred ', '1000' => 'thousand', '100000' => 'lakh', '10000000' => 'crore');
    if ($no == 0)
        return ' ';
    else {
        $novalue = '';
        $highno = $no;
        $remainno = 0;
        $value = 100;
        $value1 = 1000;
        while ($no >= 100) {
            if (($value <= $no) && ($no < $value1)) {
                $novalue = $words["$value"];
                $highno = (int) ($no / $value);
                $remainno = $no % $value;
                break;
            }
            $value = $value1;
            $value1 = $value * 100;
        }
        if (array_key_exists("$highno", $words))
            return $words["$highno"] . " " . $novalue . " " . no_to_words($remainno);
        else {
            $unit = $highno % 10;
            $ten = (int) ($highno / 10) * 10;
            return $words["$ten"] . " " . $words["$unit"] . " " . $novalue . " " . no_to_words($remainno);
        }
    }
}

function getfinancial_year() {
    if (date('m') <= 3) {
        $financial_year = (date('Y') - 1) . '-' . date('y');
    } else {//After March 2015-2016
        $financial_year = date('Y') . '-' . (date('y') + 1);
    }
    return $financial_year;
}


// Modified by Rakesh Dated 06-09-19

/*     function create_head_group($parent_id = 0, $indent='', $return ='')
    {
        $CI = & get_instance();        
        $result = $CI->db->select('*')
                        ->where('aag_pid', $parent_id)
                        ->order_by('group_name', 'asc')
                        ->get('ac_account_group')
                        ->result();
        if(count($result)>0){
             foreach($result as $row)
             {
                $return .=  '<option value="'.$row->aag_id.'">'.$indent.$row->group_name.'</option>';
                create_head_group($row->aag_id, $indent.'----',$return);
             }
        }
        return $return;
    } */

    
    if(!function_exists('fetchgroup'))
    {	
      function fetchgroup($items = array(), $parent_id = 0, $indent=''){
       $tree='';
        for($i=0, $ni=count($items); $i < $ni; $i++){
            if($items[$i]['aag_pid'] == $parent_id){
                $tree .= '<option value="'.$items[$i]['aag_id'].'">'.$indent.$items[$i]['group_name'].'</option>';
                $tree .= fetchgroup($items, $items[$i]['aag_id'], $indent.'-');
            }
        }
        return $tree;
      }
    }


    if(!function_exists('fetchgroup_select'))
    {	
      function fetchgroup_select($items = array(), $parent_id = 0, $indent='', $setID=''){
          $tree='';
        for($i=0, $ni=count($items); $i < $ni; $i++){
            if($items[$i]['aag_pid'] == $parent_id){
                $tree .= '<option value="'.$items[$i]['aag_id'].'" '.($setID==$items[$i]['aag_id']?'selected':'') .'>'.$indent.$items[$i]['group_name'].'</option>';
                $tree .= fetchgroup_select($items, $items[$i]['aag_id'], $indent.'-',$setID);
            }
        }
        return $tree;
      }
    }

    if(!function_exists('print_balance_sheet'))
    {	
        function print_balance_sheet($items = array(), $post_data, $parent_id = 0,$indent=''){
        $CI =& get_instance();
        $CI->load->library('function_library'); 
        $tree='';
        for($i=0, $ni=count($items); $i < $ni; $i++){
            if($items[$i]['aag_pid'] == $parent_id && ($CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Debit')>0 || $CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Credit')>0)){
                $tree .= '<tr><td style="align:left;">'.$indent.$items[$i]['group_name'].'</td><td>'.$CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Debit').'</td><td>'.$indent.$items[$i]['group_name'].'</td><td>'.$CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Credit').'</td></tr>';
                $tree .= print_balance_sheet($items, $post_data, $items[$i]['aag_id'],$indent."&nbsp;&nbsp;");
            }
        }
        return $tree;
    }
}

    if(!function_exists('balance_sheet_total')){
        function balance_sheet_total($items = array(), $post_data, $parent_id = 0){
            $CI =& get_instance();
            $CI->load->library('function_library'); 
            $return_dr_cr='';
            for($i=0, $ni=count($items); $i < $ni; $i++){
                if($items[$i]['aag_pid'] == $parent_id){
                    $cr_total = $dr_total = $dr_cr=0; 
                    $dr_total = $CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Debit');
                    $cr_total = $CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Credit');
                    if($dr_total != 0 || $cr_total!=0){
                        $dr_cr = $dr_total.','.$cr_total;
                        $dr_total=0;
                        $cr_total=0;
                    }
                  $return_dr_cr .= $dr_cr.'|'. balance_sheet_total($items, $post_data, $items[$i]['aag_id']);
                }
            }
              return $return_dr_cr;
           }
    }


    // Dated 12-09-19

    if(!function_exists('balance_sheet_dr'))
    {	
        function balance_sheet_dr($items = array(), $post_data, $parent_id = 0,$indent=''){
        $CI =& get_instance();
        $CI->load->library('function_library'); 
        $tree='';
        for($i=0, $ni=count($items); $i < $ni; $i++){
            if($items[$i]['aag_pid'] == $parent_id && $CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Debit')> 0 ){
                $tree .= '<tr><td style="align:left;">'.$indent.$items[$i]['group_name'].'</td><td>'.$CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Debit').'</td></tr>';
                $tree .= balance_sheet_dr($items, $post_data, $items[$i]['aag_id'],$indent."&nbsp;&nbsp;");
            }
        }
        return $tree;
    }
    }

    if(!function_exists('balance_sheet_cr'))
    {	
        function balance_sheet_cr($items = array(), $post_data, $parent_id = 0,$indent=''){
        $CI =& get_instance();
        $CI->load->library('function_library'); 
        $tree='';
        for($i=0, $ni=count($items); $i < $ni; $i++){
            if($items[$i]['aag_pid'] == $parent_id && $CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Credit')> 0 ){
                $tree .= '<tr><td>'.$indent.$items[$i]['group_name'].'</td><td>'.$CI->function_library->calculateTB($items[$i]['aag_id'], $post_data, 'Credit').'</td></tr>';
                $tree .= balance_sheet_cr($items, $post_data, $items[$i]['aag_id'],$indent."&nbsp;&nbsp;");
            }
        }
        return $tree;
    } 
  
  function genrateId($table='',$value='', $pre='') {
   if(!empty($table)){
      $id = next_id($table);
    } else {
      $id = $value;
    }
      $idlen = strlen($id);
        for($len=$idlen; $len <= 4; $len++){
            $pre .="0";
        }
    return $pre.$id;
  }

  function genrate_unique_id($table='',$pre='') {
    $id = next_id($table);
    $pre1='';
    if($id<=10){
        return $pre.'-'.date('dmy').'-0'.$id;
    } else{
        return $pre.'-'.date('dmy').'-'.$pre1.$id;
    }
  }


  function next_id($table) {
    $CI =& get_instance();
      return $CI->db->select('AUTO_INCREMENT')
                      ->where('table_name', $table)
                      ->where('table_schema', $CI->db->database)
                      ->get('information_schema.tables')
                      ->row()
              ->AUTO_INCREMENT;
  }




  function genrate_unique_id1($pre='') {
    $id = next_id_unique($pre);
    $pre1='';
    if($id<=10){
        return $pre.'-'.date('dmy').'-0'.$id;
    } else{
        return $pre.'-'.date('dmy').'-'.$pre1.$id;
    }
  }
  
  function next_id_unique($prefix) {
    $CI =& get_instance();
    $wh = array(
        'dated' => date('Y-m-d'),
        'prefix' => $prefix
    );
    $r = $CI->db->where($wh)->get('tbl_serial_no');
    if($r->num_rows()>0){
        $rs = $r->row();
       return  $rs->serial_no+1;   
    } else {
        return 1;
    }
  }

} 