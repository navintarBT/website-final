<?php
    require_once "config/conect_nal.php";

    $lg_runing_id=$_POST['lg_runing_id'];
    $sql= mysqli_query($conns,"select lg_interest FROM loan_agreement where lg_runing_id='$lg_runing_id' ");
    $ca_interest=mysqli_fetch_array($sql);
    if($ca_interest){
        echo $ca_interest[0] . ' %';
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>