<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_satus'] === "ແອັດມິນ") {
} else {
    // User is not logged in or has incorrect user_status, redirect back to login page
    header("Location: http://localhost/Loan-management-system/login");
    exit();
}?>
<html>
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
        $sql = mysqli_query($conns, "select gt_runing_id from guarantor where cus_runing='$cus_runing' ");
        $gt_runing_id = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_flname from guarantor where cus_runing='$cus_runing' ");
        $gt_flname = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_age from guarantor where cus_runing='$cus_runing' ");
        $gt_age = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_nationality from guarantor where cus_runing='$cus_runing' ");
        $gt_nationality = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_job from guarantor where cus_runing='$cus_runing' ");
        $gt_job = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_vill from guarantor where cus_runing='$cus_runing' ");
        $gt_vill = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_dis from guarantor where cus_runing='$cus_runing' ");
        $gt_dis = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_pro from guarantor where cus_runing='$cus_runing' ");
        $gt_pro = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_card_id from guarantor where cus_runing='$cus_runing' ");
        $gt_card_id = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_date_card from guarantor where cus_runing='$cus_runing' ");
        $gt_date_card = mysqli_fetch_array($sql);

        $sql = mysqli_query($conns, "select gt_tel from guarantor where cus_runing='$cus_runing' ");
        $gt_tel = mysqli_fetch_array($sql);

        $x = 1;
        if ($gt_runing_id <> 0) {

            echo "<table class='display' border=1 style='Width:100%;'>";
                echo"<tr>";
                    echo"<th>ລ/ດ</th>";
                    echo"<th>ລະຫັດຜູ້ຄຳປະກັນ</th>";
                    echo"<th>ຊື່ ແລະ ນາມສະກຸນ</th>";
                    echo"<th>ອາຍຸ</th>";
                    echo"<th>ສັນຊາດ</th>";
                    echo"<th>ອາຊີບ</th>";
                    echo"<th>ບ້ານຢູ່ປັດຈຸບັນ</th>";
                    echo"<th>ເມືອງ</th>";
                    echo"<th>ແຂວງ</th>";
                    echo"<th>ເລກທີບັດປະຈຳຕົວ</th>";
                    echo"<th>ລົງວັນທີ</th>";
                    echo"<th>ເບີໂທ</th>";
                echo"</tr>";
                echo"<tr>";
                    echo"<td>". $x ."</td>";
                    echo"<td>". $gt_runing_id[0] ."</td>";
                    echo"<td>". $gt_flname[0] ."</td>";
                    echo"<td>". $gt_age[0] . " ປີ" . "</td>";
                    echo"<td>". $gt_nationality[0] ."</td>";
                    echo"<td>". $gt_job[0] ."</td>";
                    echo"<td>". $gt_vill[0] ."</td>";
                    echo"<td>". $gt_dis[0] ."</td>";
                    echo"<td>". $gt_pro[0] ."</td>";
                    echo"<td>". $gt_card_id[0] ."</td>";
                    echo"<td>". $gt_date_card[0] ."</td>";
                    echo"<td>". $gt_tel[0] ."</td>";
                echo"</tr>";
                $x ++;
            echo "</table>";
            echo "<br>";
            echo "<hr>";
        }else {
            echo "ຍັງບໍ່ມີຂໍ້ມູນພໍທີ່ຈະເຮັດສັນຍາ";
        }

        ?>
      
</body>

</html>