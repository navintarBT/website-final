<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_satus'] !== "ການເງິນ") {
    // User is not logged in or has incorrect user status, redirect back to login 	page
    header("Location: http://localhost/Loan-management-system/login");
    exit();
}?>
<?php

    $pm_itr=$_POST['pm_itr'];
    $pm_pcp=$_POST['pm_pcp'];

    $totel = $pm_itr + $pm_pcp;
    echo number_format($totel) . " ກີບ";

?>