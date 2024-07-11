<?php
    require_once "config/conect_nal.php";

    $cus_runing=$_POST['cus_runing'];
    $sql= mysqli_query($conns,"select cus_dis from customers where cus_runing='$cus_runing' ");
    $show_name=mysqli_fetch_array($sql);
    if($show_name){
        echo $show_name[0];
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>