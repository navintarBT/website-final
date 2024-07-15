<?php

    $pm_od_date=$_POST['pm_od_date'];
    $pm_pcp=$_POST['pm_pcp'];
    $pm_itr=$_POST['pm_itr'];

    if($pm_od_date > 3 ){
        $plus = $pm_pcp + $pm_itr;
        $multiply = ($plus * 5) / 100;
    }else{
        $multiply = "0";
    }

    echo number_format($multiply) . ' ກີບ';

?>