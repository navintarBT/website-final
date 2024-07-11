<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select la_pham from collateral_land where cus_runing='$cus_runing' ");
    $la_pham=mysqli_fetch_array($sql);

    $sqls= mysqli_query($conns,"select car_pham from collateral_car where cus_runing='$cus_runing' ");
    $car_pham=mysqli_fetch_array($sqls);

    $sqlss= mysqli_query($conns,"select ot_pham from collateral_other where cus_runing='$cus_runing' ");
    $ot_pham=mysqli_fetch_array($sqlss);

    if($la_pham <> 0){

        echo $la_pham[0];

    }else if($car_pham <> 0){

        echo $car_pham[0];

    }else if($ot_pham <> 0){

        echo $ot_pham[0];
    } else {
        echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
    }
?>