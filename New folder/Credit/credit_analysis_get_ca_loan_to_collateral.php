<?php
    $ca_amount_released=$_POST['ca_amount_released'];
    $ca_employee=$_POST['ca_employee'];

    $totle = ($ca_amount_released * 100) / $ca_employee;

    echo number_format($totle);

?>