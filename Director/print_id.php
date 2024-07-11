<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select cus_id from customers where cus_runing='$cus_runing' ");
    $cus_id=mysqli_fetch_array($sql);

    if($cus_id <> 0){

        echo $cus_id[0]; 

    } else {
        echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
    }
?>