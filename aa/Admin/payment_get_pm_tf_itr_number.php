<?php

$pm_itr=$_POST['pm_itr'];
$dt_totle_interestss=$_POST['dt_totle_interestss'];

if($pm_itr >= $dt_totle_interestss){
    $totel = '0 ກີບ';
}else{
    $totel = $dt_totle_interestss - $pm_itr;
    echo number_format($totel). " ກີບ";
}


?>