<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_satus'] !== "ການເງິນ") {
    // User is not logged in or has incorrect user status, redirect back to login 	page
    header("Location: http://localhost/Loan-management-system/login");
    exit();
}?>
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