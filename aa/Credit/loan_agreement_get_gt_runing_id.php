<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select gt_id from guarantor where cus_runing='$cus_runing' ");
    $gt_id=mysqli_fetch_array($sql);

    if($gt_id <> 0){

        echo $gt_id[0]; 

    } else {
        echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
    }
?>