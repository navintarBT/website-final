<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select la_runing_id from collateral_land where cus_runing='$cus_runing' ");
    $la_runing_id=mysqli_fetch_array($sql);

    $sqls= mysqli_query($conns,"select car_running_id from collateral_car where cus_runing='$cus_runing' ");
    $car_running_id=mysqli_fetch_array($sqls);

    $sqlss= mysqli_query($conns,"select ot_runing_id from collateral_other where cus_runing='$cus_runing' ");
    $ot_runing_id=mysqli_fetch_array($sqlss);

    if($la_runing_id <> 0){

        echo $la_runing_id[0];

    }else if($car_running_id <> 0){

        echo $car_running_id[0];

    }else if($ot_runing_id <> 0){

        echo $ot_runing_id[0];
    } else {
        echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
    }
?>