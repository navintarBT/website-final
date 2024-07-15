
<?php
    require_once "config/conect_nal.php";

    $lg_runing_id=$_POST['lg_runing_id'];
    $sql= mysqli_query($conns,"select cus_runing FROM loan_agreement where lg_runing_id='$lg_runing_id' ");
    $cus_runing=mysqli_fetch_array($sql);
    if($cus_runing){
        echo $cus_runing[0];
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>