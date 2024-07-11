
<!DOCTYPE html>
<html>
<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_satus'] === "ແອັດມິນ") {
    // User is logged in and has the correct user_status, allow access to the page
    echo "Welcome, " . $_SESSION['user_id'] . "! You can access this page.";
} else {
    // User is not logged in or has incorrect user_status, redirect back to login page
    header("Location: http://localhost/Loan-management-system/login");
    exit();
}?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="admin, dashboard">
<meta name="author" content="DexignZone">
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Dompet : Payment Admin Template">
<meta property="og:title" content="Dompet : Payment Admin Template">
<meta property="og:description" content="Dompet : Payment Admin Template">
<meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
<meta name="format-detection" content="telephone=no">



<head>
    <style>
        table,
        tr,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 16px;
            text-align: center;
            color: black;
            height: 35px;
        }
    </style>
</head>

<body>

        <?php

        require_once "config/conect_nal.php";

        $cus_runing = $_POST['cus_runing'];
        // ຂໍ້ມູນປະເພດທີ່ດິນ
        $sql = mysqli_query($conns, "select la_runing_id from collateral_land where cus_runing='$cus_runing' ");
        $la_runing_id = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select la_type from collateral_land where cus_runing='$cus_runing' ");
        $la_type = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select la_land_title from collateral_land where cus_runing='$cus_runing' ");
        $la_land_title = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select la_date from collateral_land where cus_runing='$cus_runing' ");
        $la_date = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select la_name from collateral_land where cus_runing='$cus_runing' ");
        $la_name = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select la_original_price from collateral_land where cus_runing='$cus_runing' ");
        $la_original_price = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select la_market_price from collateral_land where cus_runing='$cus_runing' ");
        $la_market_price = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select la_pham from collateral_land where cus_runing='$cus_runing' ");
        $la_pham = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select la_map0 from collateral_land where cus_runing='$cus_runing' ");
        $la_map0 = mysqli_fetch_array($sql);

        // ສຸກຂໍ້ມູນທີດີນ
        // ຂໍ້ມູນລົດ
        $sqls = mysqli_query($conns, "select car_running_id from collateral_car where cus_runing='$cus_runing' ");
        $car_running_id = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_type from collateral_car where cus_runing='$cus_runing' ");
        $car_type = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_number from collateral_car where cus_runing='$cus_runing' ");
        $car_number = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_eg_number from collateral_car where cus_runing='$cus_runing' ");
        $car_eg_number = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_t_number from collateral_car where cus_runing='$cus_runing' ");
        $car_t_number = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_brand from collateral_car where cus_runing='$cus_runing' ");
        $car_brand = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_color from collateral_car where cus_runing='$cus_runing' ");
        $car_color = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_name from collateral_car where cus_runing='$cus_runing' ");
        $car_name = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_u_year from collateral_car where cus_runing='$cus_runing' ");
        $car_u_year = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_original_price from collateral_car where cus_runing='$cus_runing' ");
        $car_original_price = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_market_price from collateral_car where cus_runing='$cus_runing' ");
        $car_market_price = mysqli_fetch_array($sqls);

        $sqls = mysqli_query($conns, "select car_pham from collateral_car where cus_runing='$cus_runing' ");
        $car_pham = mysqli_fetch_array($sqls);

        // ສຸດຂໍ້ມູນລົດ
        // ຂໍ້ມູນອື່ນ
        $sqlss = mysqli_query($conns, "select ot_runing_id from collateral_other where cus_runing='$cus_runing' ");
        $ot_runing_id = mysqli_fetch_array($sqlss);

        $sqlss = mysqli_query($conns, "select ot_other from collateral_other where cus_runing='$cus_runing' ");
        $ot_other = mysqli_fetch_array($sqlss);

        $sqlss = mysqli_query($conns, "select ot_name from collateral_other where cus_runing='$cus_runing' ");
        $ot_name = mysqli_fetch_array($sqlss);

        $sqlss = mysqli_query($conns, "select ot_date from collateral_other where cus_runing='$cus_runing' ");
        $ot_date = mysqli_fetch_array($sqlss);

        $sqlss = mysqli_query($conns, "select ot_time from collateral_other where cus_runing='$cus_runing' ");
        $ot_time = mysqli_fetch_array($sqlss);

        $sqlss = mysqli_query($conns, "select ot_original_price from collateral_other where cus_runing='$cus_runing' ");
        $ot_original_price = mysqli_fetch_array($sqlss);

        $sqlss = mysqli_query($conns, "select ot_market_price from collateral_other where cus_runing='$cus_runing' ");
        $ot_market_price = mysqli_fetch_array($sqlss);

        $sqlss = mysqli_query($conns, "select ot_pham from collateral_other where cus_runing='$cus_runing' ");
        $ot_pham = mysqli_fetch_array($sqlss);

        $x = 1;
        if ($la_runing_id <> 0) {

            echo "<table class='display' border=1 style='Width:100%;'>";
                echo"<tr>";
                    echo"<th>ລ/ດ</th>";
                    echo"<th>ລະຫັດຫຼັກຊັບຄ້ຳປະກັນ</th>";
                    echo"<th>ປະເພດທີ່ດິນ</th>";
                    echo"<th>ເລກທີ່ໃບຕາດິນ</th>";
                    echo"<th>ລົງວັນທີ</th>";
                    echo"<th>ອອກຊື່</th>";
                    echo"<th>ມູນຄ່າເດິມຂອງຊັບສົມບັດ</th>";
                    echo"<th>ມູນຄ່າຕາມລາຄາຕະຫຼາດ</th>";
                    echo"<th>ມູນຄ່າປະເມິນຂອງພະນັກງານ</th>";
                echo"</tr>";
                echo"<tr>";
                    echo"<td>". $x ."</td>";
                    echo"<td>". $la_runing_id[0] ."</td>";
                    echo"<td>". $la_type[0] ."</td>";
                    echo"<td>". $la_land_title[0] ."</td>";
                    echo"<td>". $la_date[0] ."</td>";
                    echo"<td>". $la_name[0] ."</td>";
                    echo"<td>". number_format($la_original_price[0]) . " LAK" . "</td>";
                    echo"<td>". number_format($la_market_price[0]) . " LAK" . "</td>";
                    echo"<td>". number_format($la_pham[0]) . " LAK" . "</td>";
                echo"</tr>";
                $x ++;
            echo "</table>";
            echo "<br>";
            echo "<hr>";
        } else if ($car_running_id <> 0) {

            echo "<table class='display' border=1 style='Width:100%;'>";
                echo"<tr>";
                    echo"<th>ລ/ດ</th>";
                    echo"<th>ລະຫັດຫຼັກຊັບຄ້ຳປະກັນ</th>";
                    echo"<th>ປະເພດລົດ</th>";
                    echo"<th>ທະບຽນລົດ</th>";
                    echo"<th>ເລກຈັກ</th>";
                    echo"<th>ເລກຖັງ</th>";
                    echo"<th>ຍີຫໍ່</th>";
                    echo"<th>ສີ</th>";
                    echo"<th>ອອກຊື່</th>";
                    echo"<th>ປີນຳໃຊ້</th>";
                    echo"<th>ມູນຄ່າເດິມຂອງຊັບສົມບັດ</th>";
                    echo"<th>ມູນຄ່າຕາມລາຄາຕະຫຼາດ</th>";
                    echo"<th>ມູນຄ່າປະເມິນຂອງພະນັກງານ</th>";
                echo"</tr>";
                echo"<tr>";
                    echo"<td>". $x ."</td>";
                    echo"<td>". $car_running_id[0] ."</td>";
                    echo"<td>". $car_type[0] ."</td>";
                    echo"<td>". $car_number[0] ."</td>";
                    echo"<td>". $car_eg_number[0] ."</td>";
                    echo"<td>". $car_t_number[0] ."</td>";
                    echo"<td>". $car_brand[0] ."</td>";
                    echo"<td>". $car_color[0] ."</td>";
                    echo"<td>". $car_name[0] ."</td>";
                    echo"<td>". $car_u_year[0] ."</td>";
                    echo"<td>". number_format($car_original_price[0]) ."</td>";
                    echo"<td>". number_format($car_market_price[0]) ."</td>";
                    echo"<td>". number_format($car_pham[0]) ."</td>";
                echo"</tr>";
                $x ++;
            echo "</table>";
            echo "<br>";
            echo "<hr>";

        } else if ($ot_runing_id <> 0) {

            echo "<table class='display' border=1 style='Width:100%;'>";
            echo"<tr>";
                echo"<th>ລ/ດ</th>";
                echo"<th>ລະຫັດຫຼັກຊັບຄ້ຳປະກັນ</th>";
                echo"<th>ຊັບສິນຄຳປະກັນ</th>";
                echo"<th>ຜູ້ລົງກວດສອບ</th>";
                echo"<th>ວັນທີ</th>";
                echo"<th>ເວລາ</th>";
                echo"<th>ມູນຄ່າເດິມຂອງຊັບສົມບັດ</th>";
                echo"<th>ມູນຄ່າຕາມລາຄາຕະຫຼາດ</th>";
                echo"<th>ມູນຄ່າປະເມິນຂອງພະນັກງານ</th>";
            echo"</tr>";
            echo"<tr>";
                echo"<td>". $x ."</td>";
                echo"<td>". $ot_runing_id[0] ."</td>";
                echo"<td>". $ot_other[0] ."</td>";
                echo"<td>". $ot_name[0] ."</td>";
                echo"<td>". $ot_date[0] ."</td>";
                echo"<td>". $ot_time[0] ."</td>";
                echo"<td>". number_format($ot_original_price[0]) ."</td>";
                echo"<td>". number_format($ot_market_price[0]) ."</td>";
                echo"<td>". number_format($ot_pham[0]) ."</td>";

            echo"</tr>";
            $x ++;
        echo "</table>";
        echo "<br>";
        echo "<hr>";
            
        } else {
            echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
        }

        ?>
      
</body>

</html>