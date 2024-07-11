
<?php
    $percet = 60;
    $ot_market_price=$_POST['ot_market_price'];

    $division = $ot_market_price / 100;
    $kun = $division * $percet;

    echo $kun;

?>