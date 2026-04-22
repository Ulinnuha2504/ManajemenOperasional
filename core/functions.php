<?php
function getStatus($d){
    if ($d['tanggal_acc']) return "Disetujui";
    elseif (date('Y-m-d') > $d['tanggal_kebutuhan']) return "Terlambat";
    else return "Pending";
}
?>