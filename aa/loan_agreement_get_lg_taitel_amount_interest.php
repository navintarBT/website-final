<?php
        $ca_set_month = $_POST['ca_set_month'];
        $ca_amount_releaseds = $_POST['ca_amount_releaseds'];
        $ca_interest = $_POST['ca_interest'];
        
        $total_percen = ($ca_interest / 100) * $ca_amount_releaseds;

        $total_ca_interests = $ca_set_month * $total_percen;

        echo number_format($total_ca_interests) . " LAK";


?>