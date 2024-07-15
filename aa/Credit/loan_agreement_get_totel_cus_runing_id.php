<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select cus_runing from credit_analysis where cus_runing='$cus_runing' ");
    $cus_runing=mysqli_fetch_array($sql);

    if($cus_runing <> 0){

        echo $cus_runing[0]; 

    } else {
        echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
    }
?>