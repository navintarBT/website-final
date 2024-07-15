<?php

    $pm_itr=$_POST['pm_itr'];
    $pm_pcp=$_POST['pm_pcp'];

    $totel = $pm_itr + $pm_pcp;
    echo number_format($totel) . " ກີບ";

?>