
<!DOCTYPE html>
<html>
<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_satus'] === "ອຳນວຍການ") {
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
            height: 11px;
        }
    </style>
</head>

<body>

    <table class="display"border=1 style="Width:100%;">
        <tr>
            <th>ຈຳນວນງວດ</th>
            <th>ວັນທີ</th>
            <th>ຕົນທຶນ</th>
            <th>ດອກເບ້ຍ</th>
            <th>ຕົ້ນທຶນ + ດອກເບຍ</th>
            <th>ຍອດເຫຼືອໜີ່</th>
            <th>ວັນທີຊຳລະ</th>
            <th>ເຊັນຜູ້ມອບເງິນ</th>
            <th>ເຊັນຜູ້ຮັບເງິນ</th>
        </tr>
        <?php
        $ca_set_month = $_POST['ca_set_month'];
        $ca_amount_releaseds = $_POST['ca_amount_releaseds'];
        $ca_interest = $_POST['ca_interest'];
 
        echo "<tr>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td>" . number_format($ca_amount_releaseds) . "</td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "</tr>";
        ?>
        <?php
        $ca_set_month = $_POST['ca_set_month'];
        $ca_amount_releaseds = $_POST['ca_amount_releaseds'];
        $ca_interest = $_POST['ca_interest'];

        $total_capital_cost = ($ca_amount_releaseds / $ca_set_month);

        $total_percen = ($ca_interest / 100) * $ca_amount_releaseds;

        $total_capital_and_interest = $total_capital_cost + $total_percen;

        $Remaining = $ca_amount_releaseds - $total_capital_cost;

        $total_capital_costs = $ca_set_month * $total_capital_cost;

        $total_ca_interests = $ca_set_month * $total_percen;
        
        $Remaining_plus = $ca_set_month * $total_capital_and_interest;

        // Set timezone

        date_default_timezone_set("Asia/Bangkok");

        // Start date
        $date = date('d-m-Y', strtotime("+1 month"));
        // End date
        $end_date = date('d-m-Y', strtotime(+$ca_set_month - 1 . "month"));
        $end_dates = date('d-m-Y', strtotime(+$ca_set_month  . "month"));

        $x = 1;
        while (strtotime($date) <= strtotime($end_date)) {
            echo "<tr>";
                echo "<td>ງວດທີ່ $x </td>";
                echo "<td>" . date("d-m-Y", strtotime($date)) . "</td>";
                echo "<td>". number_format($total_capital_cost) ."</td>";
                echo "<td>". number_format($total_percen) ."</td>";
                echo "<td>". number_format($total_capital_and_interest) ."</td>";
                echo "<td>". number_format($Remaining) ."</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
            echo "</tr>";
            $x++;
            $date = date("d-m-Y", strtotime("+1 month", strtotime($date)));
            $Remaining -= $total_capital_cost;
        }
        ?>
        <?php
        echo "<tr>";
        echo "<td>ງວດທີ່ $ca_set_month</td>";
        echo "<td>$end_dates</td>";
        echo "<td>". number_format($total_capital_cost) ."</td>";
        echo "<td>". number_format($total_percen) ."</td>";
        echo "<td>". number_format($total_capital_and_interest) ."</td>";
        echo "<td>0</td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "</tr>";
        ?>
        <?php
        echo "<tr>";
        echo "<td></td>";
        echo "<td><b>Total</b></td>";
        echo "<td>". number_format($total_capital_costs) ."</td>";
        echo "<td>". number_format($total_ca_interests) ."</td>";
        echo "<td>". number_format($Remaining_plus) ."</td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "</tr>";
        ?>
    </table>
</body>

</html>