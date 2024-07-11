
<?php
    $percet = 60;
    $la_market_price=$_POST['la_market_price'];

    $division = $la_market_price / 100;
    $kun = $division * $percet;

    echo $kun;

?>