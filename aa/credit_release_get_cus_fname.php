
<?php
    require_once "config/conect_nal.php";

    $lg_runing_id=$_POST['lg_runing_id'];
    $sql= mysqli_query($conns,"select cus_fname FROM loan_agreement where lg_runing_id='$lg_runing_id' ");
    $show_name=mysqli_fetch_array($sql);
    if($show_name){
        echo $show_name[0];
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>