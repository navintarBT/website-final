<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select cus_fname from credit_analysis where cus_runing='$cus_runing' ");
    $cus_fname=mysqli_fetch_array($sql);

    if($cus_fname <> 0){

        echo $cus_fname[0]; 

    } else {
        echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
    }
?>