<?php
        $ca_set_month = $_POST['ca_set_month'];
        $ca_amount_releaseds = $_POST['ca_amount_releaseds'];
        $ca_interest = $_POST['ca_interest'];
        $lg_installments = $_POST['lg_installments'];

        $total_percen = ($ca_interest / 100) * $ca_amount_releaseds;
        $total_capital_and_interest = $lg_installments + $total_percen;

        echo $total_capital_and_interest;
?>