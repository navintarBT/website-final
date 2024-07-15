<?php

    $pm_od_date=$_POST['pm_od_date'];
    $pm_pcp=$_POST['pm_pcp'];

    if($pm_od_date > 3 ){
        $multiply = ($pm_pcp * 5) / 100;
    }else{
        $multiply = "0";
    }

    echo number_format($multiply) . " ກີບ"; 

?>