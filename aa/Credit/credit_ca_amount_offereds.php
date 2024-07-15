<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select cus_qty_money from customers where cus_runing='$cus_runing' ");
    $show_name=mysqli_fetch_array($sql);
    if($show_name){
        echo number_format($show_name[0]) . " ກີບ";
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>