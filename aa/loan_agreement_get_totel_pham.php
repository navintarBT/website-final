<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select ca_amount_released from credit_analysis where cus_runing='$cus_runing' ");
    $ca_amount_released=mysqli_fetch_array($sql);

    if($ca_amount_released <> 0){

        echo number_format($ca_amount_released[0]) . " LAK"; 

    } else {
        echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
    }
?>