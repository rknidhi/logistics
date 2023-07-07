<?php
$data['consigner'] = $this->function_library->FindPartyDetails($booking_gr->consignor_id_fk);
$data['consignee'] = $this->function_library->FindPartyDetails($booking_gr->consignee_id_fk);
$this->load->view('booking/print_gr', $data);
$corpy_for= array("Driver", "Customer", "TEsting");

foreach ($corpy_for as $key => $value) {
    $data['copy_for'] = $value;
    $this->load->view('booking/print_gr', $data);
        for($i=0;$i<15;$i++){
            echo "<br>";
        }
}
?>
