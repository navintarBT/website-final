<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select la_type from collateral_land where cus_runing='$cus_runing' ");
    $la_type=mysqli_fetch_array($sql);

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select car_type from collateral_car where cus_runing='$cus_runing' ");
    $car_type=mysqli_fetch_array($sql);

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select ot_name from collateral_other where cus_runing='$cus_runing' ");
    $ot_name=mysqli_fetch_array($sql);

    if($la_type <> 0){

        echo $la_type[0];

    }else if($car_type <> 0){

        echo $car_type[0];

    }else if($ot_name <> 0){

        echo $ot_name[0];
    }
?>