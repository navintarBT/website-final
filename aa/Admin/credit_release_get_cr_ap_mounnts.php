
<?php
    require_once "config/conect_nal.php";

    $lg_runing_id=$_POST['lg_runing_id'];
    $sql= mysqli_query($conns,"select lg_amount_releaseds FROM loan_agreement where lg_runing_id='$lg_runing_id' ");
    $lg_amount_releaseds=mysqli_fetch_array($sql);
    if($lg_amount_releaseds){
        echo number_format($lg_amount_releaseds[0]) . ' LAK';
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>