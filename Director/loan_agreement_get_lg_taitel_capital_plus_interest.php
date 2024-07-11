<?php
        $ca_set_month = $_POST['ca_set_month'];
        $ca_amount_releaseds = $_POST['ca_amount_releaseds'];
        $ca_interest = $_POST['ca_interest'];


        $total_capital_cost = ($ca_amount_releaseds / $ca_set_month);
        $total_percen = ($ca_interest / 100) * $ca_amount_releaseds;
        $total_capital_and_interest = $total_capital_cost + $total_percen;
        $Remaining_plus = $ca_set_month * $total_capital_and_interest;


        echo number_format($Remaining_plus) . " LAK";


?>