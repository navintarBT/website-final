<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select cus_qty_money from customers where cus_runing='$cus_runing' ");
    $show_name=mysqli_fetch_array($sql);

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select la_pham from collateral_land where cus_runing='$cus_runing' ");
    $la_pham=mysqli_fetch_array($sql);

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select car_pham from collateral_car where cus_runing='$cus_runing' ");
    $car_pham=mysqli_fetch_array($sql);

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select ot_pham from collateral_other where cus_runing='$cus_runing' ");
    $ot_pham=mysqli_fetch_array($sql);

    if($la_pham <> 0){
        if($show_name[0]<=$la_pham[0]){
            echo $show_name[0];
        }else{
            echo $la_pham[0];
        } 
    }else if($car_pham <> 0){
        echo $car_pham[0];
    }else if($ot_pham <> 0){
        echo $ot_pham[0];
    }
?>