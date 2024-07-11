<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_satus'] !== "ການເງິນ") {
    // User is not logged in or has incorrect user status, redirect back to login 	page
    header("Location: http://localhost/Loan-management-system/login");
    exit();
}?>
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