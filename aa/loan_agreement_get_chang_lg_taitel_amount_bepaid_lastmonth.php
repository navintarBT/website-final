<?php
        $ca_set_month = $_POST['ca_set_month'];
        $ca_amount_releaseds = $_POST['ca_amount_releaseds'];
        $ca_interest = $_POST['ca_interest'];
        $lg_installments = $_POST['lg_installments'];

        // $total_capital_cost = ($ca_amount_releaseds / $ca_set_month);
        $total_percen = ($ca_interest / 100) * $ca_amount_releaseds;
        $total_capital_and_interest = $lg_installments + $total_percen;
        $Remaining = $ca_amount_releaseds - $lg_installments;
        $total_capital_costs = $ca_set_month * $lg_installments;
        $total_ca_interests = $ca_set_month * $total_percen;
        $Remaining_plus = $ca_set_month * $total_capital_and_interest;

        $set_month_1 = $ca_set_month - 1;
        $set_total_month_23 = $lg_installments * $set_month_1;
        $set_total_1443000 = $ca_amount_releaseds - $set_total_month_23;

        $set_month_24 = $lg_installments * $ca_set_month;
        $set_total_16000 = $set_month_24 - $ca_amount_releaseds;
        $set_total_2493000 = $total_capital_and_interest - $set_total_16000;

        echo number_format($set_total_2493000) . " LAK";


?>