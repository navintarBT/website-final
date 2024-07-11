<?php
    require_once "config/conect_nal.php";

    $lg_runing_id=$_POST['lg_runing_id'];
    $sql= mysqli_query($conns,"select lg_set_month FROM loan_agreement where lg_runing_id='$lg_runing_id' ");
    $lg_set_month=mysqli_fetch_array($sql);
    if($lg_set_month){
        echo $lg_set_month[0] . ' ເດືອນ';
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>