<?php

    $pm_pcp=$_POST['pm_pcp'];
    $dt_releasedss=$_POST['dt_releasedss'];

    if($pm_pcp >= $dt_releasedss){
        $totel = '0 ກີບ';
    }else{
        $totel = $dt_releasedss - $pm_pcp;
        echo $totel;
    }


?>