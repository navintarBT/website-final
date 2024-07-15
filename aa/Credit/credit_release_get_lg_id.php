
<?php
    require_once "config/conect_nal.php";

    $lg_runing_id=$_POST['lg_runing_id'];
    $sql= mysqli_query($conns,"select lg_id FROM loan_agreement where lg_runing_id='$lg_runing_id' ");
    $lg_id =mysqli_fetch_array($sql);
    if($lg_id ){
        echo $lg_id [0];
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>