<?php
    $percet = 60;
    $car_market_price=$_POST['car_market_price'];

    $division = $car_market_price / 100;
    $kun = $division * $percet;

    echo $kun;

?>