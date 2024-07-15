<?php
    require_once "config/conect_nal.php";

    $lg_runing_id=$_POST['lg_runing_id'];
    $sql= mysqli_query($conns,"select lg_date_in FROM loan_agreement where lg_runing_id='$lg_runing_id' ");
    $lg_date_in=mysqli_fetch_array($sql);
    if($lg_date_in){
        echo $lg_date_in[0];
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>