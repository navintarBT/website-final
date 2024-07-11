<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select ca_payment from credit_analysis where cus_runing='$cus_runing' ");
    $ca_payment=mysqli_fetch_array($sql);

    if($ca_payment <> 0){

        echo $ca_payment[0]; 

    } else {
        echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
    }
?>