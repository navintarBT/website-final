<?php
        $ca_set_month = $_POST['ca_set_month'];
        $ca_amount_releaseds = $_POST['ca_amount_releaseds'];
        $ca_interest = $_POST['ca_interest'];
        
        $total_capital_cost = ($ca_amount_releaseds / $ca_set_month);
        echo $total_capital_cost;


?>