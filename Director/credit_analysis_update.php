
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_satus'] === "ອຳນວຍການ") {
} else {
    // User is not logged in or has incorrect user_status, redirect back to login page
    header("Location: http://localhost/Loan-management-system/login");
    exit();
}?>
<head>
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

    <!-- PAGE TITLE HERE -->
    <title>ແບບຟອມແກ້ໄຂຂໍ້ມູນການວິເຄາະສິນເຊື່ອ</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/Font.css" rel="stylesheet">
    <link href="css/customer_form.css" rel="stylesheet">

    <!-- SWEETALERT2 AND JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <style>
        .drop-container {
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 200px;
            padding: 20px;
            border-radius: 10px;
            border: 2px dashed #555;
            color: #444;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
            background: #eee;
            border-color: #111;
        }

        .drop-container:hover .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            transition: color .2s ease-in-out;
        }

        input[type=file] {
            width: 350px;
            max-width: 100%;
            color: #444;
            padding: 5px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #555;
        }

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }
    </style>

    <script>
        $(function() {
            $(".update").click(function() {

                var cus_runing = $(".cus_runing").val();
                var cus_fname = $(".cus_fname").val();
                var cus_id = $(".cus_id").val();

                var ca_runing_id = $(".ca_runing_id").val();
                var ca_age = $(".ca_age").val();
                var ca_nationality = $(".ca_nationality").val();
                var ca_job = $(".ca_job").val();
                var ca_vill = $(".ca_vill").val();
                var ca_dis = $(".ca_dis").val();
                var ca_pro = $(".ca_pro").val();
                var ca_id_card = $(".ca_id_card").val();
                var ca_tel = $(".ca_tel").val();
                var ca_amount_offered = $(".ca_amount_offered").val();
                var ca_amount_released = $(".ca_amount_released").val();
                var ca_set_month = $(".ca_set_month").val();
                var ca_interest = $(".ca_interest").val();
                var ca_loan_to_collateral = $(".ca_loan_to_collateral").val();
                var ca_goal = $(".ca_goal").val();
                var ca_payment = $(".ca_payment").val();
                var ca_collateral = $(".ca_collateral").val();
                var ca_employee = $(".ca_employee").val();
                var ca_history_business = $(".ca_history_business").val();
                var ca_regular = $(".ca_regular").val();

                if (cus_runing == "" || cus_fname == "" || cus_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດລູກຄ້າກ່ອນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_runing_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດການວິເຄາະ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_age == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນອາຍຸ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_nationality == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນສັນຊາດ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_job == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນອາຊີບ',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_vill == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນບ້ານ',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_dis == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເມືອງ',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_pro == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນແຂວງ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_id_card == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດບັດປະຊາຊົນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_tel == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເບີໂທ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_amount_offered == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນສະເໜີຂໍກູ້ຢຶມເງິນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_amount_released == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຈຳນວນເງິນປ່ອຍຕົວຈິງ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_set_month == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນກຳນົດເວລາ / ເດືອນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_interest == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນອັດຕາດອກເບຍ / ເດືອນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_loan_to_collateral == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນອັດຕາສ່ວນເງິນກູ້ຕໍ່ຊັບສົມບັດຄ້ຳປະກັນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_goal == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເປົ້າໃນການກູ້ຢືມເງິນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_payment == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຮູບແບບໃນການຊຳລະ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_collateral == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຫຼັກຊັບຄ້ຳປະກັນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_employee == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນມູນຄ້າຊັບສົມບັດຄ້ຳປະກັນຕາມການປະເມີນຂອງພະນັກງານ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_history_business == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນປະຫວັດການກູ້ຢຶມ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_regular == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນແຫຼ່ງທຶນ ຫຼື ແຫຼ່ງລາຍຮັບປະຈຳທີ່ຈະມາຊຳຫຼະໜີ່ສິນຄືນແກ້ສະຖາບັນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                }
            });
        });
    </script>

    <script>
        $(function() {
            //ຟັງຊັ້ນດຶງຊື່ມາສະແດງ
            $(".cus_runing").keyup(function() {
                var a = $(".cus_runing").val();
                $.post("credit_analysis_get_cus_fname.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".cus_fname").val(output);
                    });

                $.post("credit_analysis_get_cus_id.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".cus_id").val(output);
                    })
                $.post("credit_analysis_get_vill.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_vill").val(output);
                    })
                $.post("credit_analysis_get_dis.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_dis").val(output);
                    })
                $.post("credit_analysis_get_pro.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_pro").val(output);
                    })
                $.post("credit_analysis_get_card_id.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_id_card").val(output);
                    })
                $.post("credit_analysis_get_tel.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_tel").val(output);
                    })
                $.post("credit_analysis_get_qty_money.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_amount_offered").val(output);
                    })
                $.post("credit_analysis_get_pham.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_employee").val(output);
                    })
                $.post("credit_analysis_get_purpose.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_goal").val(output);
                    })
                $.post("credit_analysis_get_funding.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_payment").val(output);
                    })
                $.post("credit_analysis_get_collateral.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_collateral").val(output);
                    })
                $.post("credit_analysis_get_history.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_history_business").val(output);
                    })
                $.post("credit_analysis_get_regular.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_regular").val(output);
                    })
            });

            $(".ca_amount_released").keyup(function() {
                var ca_amount_released = parseInt($(".ca_amount_released").val());
                var ca_employee = parseInt($(".ca_employee").val());
                var totals = parseFloat((ca_amount_released * 100) / ca_employee) || 0;
                $(".ca_loan_to_collateral").val(totals);
            });
        });
    </script>

    <?php
    require_once "config/db_s_and_k_project.php";

    if (isset($_POST['update'])) {

        $id = $_POST['id'];
  
        $select_stmt = $conn->prepare('SELECT * FROM credit_analysis WHERE ca_id = :id');
        $select_stmt->bindParam(":id", $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
  
        $ca_runing_id = $_POST['ca_runing_id'];
        $ca_age = $_POST['ca_age'];
        $ca_nationality = $_POST['ca_nationality'];
        $ca_job = $_POST['ca_job'];
        $ca_vill = $_POST['ca_vill'];
        $ca_dis = $_POST['ca_dis'];
        $ca_pro    = $_POST['ca_pro'];
        $ca_id_card = $_POST['ca_id_card'];
        $ca_tel = $_POST['ca_tel'];
        $ca_amount_offered = $_POST['ca_amount_offered'];
        $ca_amount_released = $_POST['ca_amount_released'];
        $ca_set_month = $_POST['ca_set_month'];
        $ca_interest = $_POST['ca_interest'];
        $ca_loan_to_collateral = $_POST['ca_loan_to_collateral'];
        $ca_goal = $_POST['ca_goal'];
        $ca_payment = $_POST['ca_payment'];
        $ca_collateral = $_POST['ca_collateral'];
        $ca_employee = $_POST['ca_employee'];
        $ca_history_business = $_POST['ca_history_business'];
        $ca_regular = $_POST['ca_regular'];
  
        $cus_id = $_POST['cus_id'];
        $cus_fname = $_POST['cus_fname'];
        $cus_runing = $_POST['cus_runing'];
  
        $sql = $conn->prepare("UPDATE credit_analysis SET 
            ca_age = :ca_age,
            ca_nationality = :ca_nationality,  
            ca_job = :ca_job,
            ca_vill = :ca_vill,
            ca_dis = :ca_dis,
            ca_pro = :ca_pro,
            ca_id_card = :ca_id_card,
            ca_tel = :ca_tel,
            ca_amount_offered = :ca_amount_offered,
            ca_amount_released = :ca_amount_released,
            ca_set_month = :ca_set_month,
            ca_interest = :ca_interest,
            ca_loan_to_collateral = :ca_loan_to_collateral,
            ca_goal = :ca_goal,
            ca_payment = :ca_payment,
            ca_collateral = :ca_collateral,
            ca_employee = :ca_employee,
            ca_history_business = :ca_history_business,
            ca_regular = :ca_regular,
            cus_id = :cus_id,
            cus_fname = :cus_fname,
            cus_runing = :cus_runing WHERE ca_id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":ca_age", $ca_age);
        $sql->bindParam(":ca_nationality", $ca_nationality);
        $sql->bindParam(":ca_job", $ca_job);
        $sql->bindParam(":ca_vill", $ca_vill);
        $sql->bindParam(":ca_dis", $ca_dis);
        $sql->bindParam(":ca_pro", $ca_pro);
        $sql->bindParam(":ca_id_card", $ca_id_card);
        $sql->bindParam(":ca_tel", $ca_tel);
        $sql->bindParam(":ca_amount_offered", $ca_amount_offered);
        $sql->bindParam(":ca_amount_released", $ca_amount_released);
        $sql->bindParam(":ca_set_month", $ca_set_month);
        $sql->bindParam(":ca_interest", $ca_interest);
        $sql->bindParam(":ca_loan_to_collateral", $ca_loan_to_collateral);
        $sql->bindParam(":ca_goal", $ca_goal);
        $sql->bindParam(":ca_payment", $ca_payment);
        $sql->bindParam(":ca_collateral", $ca_collateral);
        $sql->bindParam(":ca_employee", $ca_employee);
        $sql->bindParam(":ca_history_business", $ca_history_business);
        $sql->bindParam(":ca_regular", $ca_regular);
  
        $sql->bindParam(":cus_id", $cus_id);
        $sql->bindParam(":cus_fname", $cus_fname);
        $sql->bindParam(":cus_runing", $cus_runing);
        $sql->execute();
  
        if ($sql) {
            $up = $conn->prepare("UPDATE customers SET 
                cus_age = :cus_age,
                cus_nationality = :cus_nationality,  
                cus_job = :cus_job WHERE cus_id = :cus_id");
            $up->bindParam(":cus_id", $cus_id);
            $up->bindParam(":cus_age", $ca_age);
            $up->bindParam(":cus_nationality", $ca_nationality);
            $up->bindParam(":cus_job", $ca_job);
            $up->execute();
  
            if ($up) {
                echo "<script>
                    $(document).ready(function() {
                        let timerInterval
                        Swal.fire({
                          title: 'ກຳລັງແກ້ໄຂຂໍ້ມູນ!',
                          html: 'ບັນທຶກແລ້ວ <b></b> ຟາຍ.',
                          timer: 2300,
                          timerProgressBar: true,
                          didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                              b.textContent = Swal.getTimerLeft()
                            }, 125)
                          },
                          willClose: () => {
                            clearInterval(timerInterval)
                          }
                        }).then((result) => {
                            Swal.fire({
                                title: 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
                                text: 'ບັນທຶກຂໍ້ມູນເຂົ້າສູ້ລະບົບຮຽບຮ້ອຍແລ້ວ',
                                icon: 'success',
                                showConfirmButton: true,
                                preConfirm: function() {
                                    document.location.href = 'credit_analysis_select.php';
                                }
                            });
                        })
                    })
                </script>";
            } else {
                echo "<script>
                    $(document).ready(function() {
                        let timerInterval
                        Swal.fire({
                          title: 'ກຳລັງແກ້ໄຂຂໍ້ມູນ!',
                          html: 'ບັນທຶກແລ້ວ <b></b> ຟາຍ.',
                          timer: 2300,
                          timerProgressBar: true,
                          didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                              b.textContent = Swal.getTimerLeft()
                            }, 125)
                          },
                          willClose: () => {
                            clearInterval(timerInterval)
                          }
                        }).then((result) => {
                            Swal.fire({
                                title: 'ຂໍ້ຜິດພາດ',
                                text: 'ບໍ່ສາມມາດບັນທຶກຂໍ້ມູນເຂົ້າສູ້ລະບົບ mysql.customers ໄດ້',
                                icon: 'success',
                                showConfirmButton: true,
                                preConfirm: function() {
                                    document.location.href = '';
                                }
                            });
                        })
                    })
                    </script>";
            }
        } else {
            echo "<script>
                $(document).ready(function() {
                           
                    let timerInterval
                    Swal.fire({
                      title: 'ກຳລັງແກ້ໄຂຂໍ້ມູນ!',
                      html: 'ແກ້ໄຂແລ້ວ <b></b> ຟາຍ.',
                      timer: 2100,
                      timerProgressBar: true,
                      didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft()
                        }, 125)
                      },
                      willClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                        Swal.fire({
                            title: 'ຜິດພາດ',
                            text: 'ແກ້ໄຂຂໍ້ມູນລົ້ມເລວ!',
                            icon: 'error',
                            timer: 5000,
                            showConfirmButton: true
                        });
                    })
            
            })
  
                </script>";
        }
    }
    ?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">ກໍ</span>
            <span style="--i:2">າ</span>
            <span style="--i:3">ລັ</span>
            <span style="--i:4">ງ</span>
            <span style="--i:5">ດ</span>
            <span style="--i:6">າ</span>
            <span style="--i:7">ວ</span>
            <span style="--i:8">ໂ</span>
            <span style="--i:9">ຫ</span>
            <span style="--i:10">ລ</span>
            <span style="--i:11">ດ</span>
            <span style="--i:12">.</span>
            <span style="--i:13">.</span>
            <span style="--i:14">.</span>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <!--**********************************
            Header start
        ***********************************-->
        <form action="" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
            <div class="row fixed-top">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <nav class="navbar navbar-expand">
                                    <div class="collapse navbar-collapse justify-content-between">
                                        <div class="header-left">

                                            <h1>ແກ້ໄຂຂໍ້ມູນລູກຄ້າ</h1>

                                        </div>
                                        <ul class="navbar-nav header-right">
                                            <div style="margin-left: 2rem;" class="d-flex flex-row-reverse bd-highlight header-right">
                                                <a href="credit_analysis_select.php" class="btn btn-warning me-2">ຍົກເລີ້ກ</a>
                                                <button type="reset" class="btn btn-light me-2">ລ້າງຂໍ້ມູນ</button>
                                                <button type="submit" name="update" id="update" class="btn me-2 btn-primary update">ແກ້ໄຂຂໍ້ມູນ</button>
                                            </div>
                                            <li class="nav-item dropdown notification_dropdown">
                                                <a class="nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.88552 6.2921C1.95571 6.54135 0.439911 8.19656 0.439911 10.1896V10.7253C0.439911 12.8874 2.21812 14.6725 4.38019 14.6725H12.7058V24.9768H7.01104C5.77451 24.9768 4.82009 24.0223 4.82009 22.7858V18.4039C4.84523 16.6262 2.16581 16.6262 2.19096 18.4039V22.7858C2.19096 25.4334 4.36345 27.6059 7.01104 27.6059H21.0331C23.6807 27.6059 25.8532 25.4334 25.8532 22.7858V13.9981C26.9064 13.286 27.6042 12.0802 27.6042 10.7253V10.1896C27.6042 8.17115 26.0501 6.50077 24.085 6.28526C24.0053 0.424609 17.6008 -1.28785 13.9827 2.48534C10.3936 -1.60185 3.7545 1.06979 3.88552 6.2921ZM12.7058 5.68103C12.7058 5.86287 12.7033 6.0541 12.7058 6.24246H6.50609C6.55988 2.31413 11.988 1.90765 12.7058 5.68103ZM21.4559 6.24246H15.3383C15.3405 6.05824 15.3538 5.87664 15.3383 5.69473C15.9325 2.04532 21.3535 2.18829 21.4559 6.24246ZM4.38019 8.87502H12.7058V12.0382H4.38019C3.62918 12.0382 3.06562 11.4764 3.06562 10.7253V10.1896C3.06562 9.43859 3.6292 8.87502 4.38019 8.87502ZM15.3383 8.87502H23.6656C24.4166 8.87502 24.9785 9.43859 24.9785 10.1896V10.7253C24.9785 11.4764 24.4167 12.0382 23.6656 12.0382H15.3383V8.87502ZM15.3383 14.6725H23.224V22.7858C23.224 24.0223 22.2696 24.9768 21.0331 24.9768H15.3383V14.6725Z" fill="#4f7086"></path>
                                                    </svg>
                                                    <span class="badge light text-white bg-primary rounded-circle">2</span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <div id="dlab_W_TimeLine02" class="widget-timeline dlab-scroll style-1 ps ps--active-y p-3 height370">
                                                        <ul class="timeline">
                                                            <li>
                                                                <div class="timeline-badge primary"></div>
                                                                <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                                    <span>10 minutes ago</span>
                                                                    <h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge info">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                                    <span>20 minutes ago</span>
                                                                    <h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
                                                                    <p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge danger">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                                    <span>30 minutes ago</span>
                                                                    <h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge success">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                                    <span>15 minutes ago</span>
                                                                    <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge warning">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                                    <span>20 minutes ago</span>
                                                                    <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge dark">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                                    <span>20 minutes ago</span>
                                                                    <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown notification_dropdown">
                                                <a class="nav-link  ai-icon" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                                    <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.638 4.9936V2.3C12.638 1.5824 13.2484 1 14.0006 1C14.7513 1 15.3631 1.5824 15.3631 2.3V4.9936C17.3879 5.2718 19.2805 6.1688 20.7438 7.565C22.5329 9.2719 23.5384 11.5872 23.5384 14V18.8932L24.6408 20.9966C25.1681 22.0041 25.1122 23.2001 24.4909 24.1582C23.8709 25.1163 22.774 25.7 21.5941 25.7H15.3631C15.3631 26.4176 14.7513 27 14.0006 27C13.2484 27 12.638 26.4176 12.638 25.7H6.40705C5.22571 25.7 4.12888 25.1163 3.50892 24.1582C2.88759 23.2001 2.83172 22.0041 3.36039 20.9966L4.46268 18.8932V14C4.46268 11.5872 5.46691 9.2719 7.25594 7.565C8.72068 6.1688 10.6119 5.2718 12.638 4.9936ZM14.0006 7.5C12.1924 7.5 10.4607 8.1851 9.18259 9.4045C7.90452 10.6226 7.18779 12.2762 7.18779 14V19.2C7.18779 19.4015 7.13739 19.6004 7.04337 19.7811C7.04337 19.7811 6.43703 20.9381 5.79662 22.1588C5.69171 22.3603 5.70261 22.6008 5.82661 22.7919C5.9506 22.983 6.16996 23.1 6.40705 23.1H21.5941C21.8298 23.1 22.0492 22.983 22.1732 22.7919C22.2972 22.6008 22.3081 22.3603 22.2031 22.1588C21.5627 20.9381 20.9564 19.7811 20.9564 19.7811C20.8624 19.6004 20.8133 19.4015 20.8133 19.2V14C20.8133 12.2762 20.0953 10.6226 18.8172 9.4045C17.5391 8.1851 15.8073 7.5 14.0006 7.5Z" fill="#4f7086"></path>
                                                    </svg>
                                                    <span class="badge light text-white bg-primary rounded-circle">12</span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <div id="dlab_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
                                                        <ul class="timeline">
                                                            <li>
                                                                <div class="timeline-panel">
                                                                    <div class="media me-2">
                                                                        <img alt="image" width="50" src="images/avatar/1.jpg">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-panel">
                                                                    <div class="media me-2 media-info">
                                                                        KG
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="mb-1">Resport created successfully</h6>
                                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-panel">
                                                                    <div class="media me-2 media-success">
                                                                        <i class="fa fa-home"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-panel">
                                                                    <div class="media me-2">
                                                                        <img alt="image" width="50" src="images/avatar/1.jpg">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-panel">
                                                                    <div class="media me-2 media-danger">
                                                                        KG
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="mb-1">Resport created successfully</h6>
                                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-panel">
                                                                    <div class="media me-2 media-primary">
                                                                        <i class="fa fa-home"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>

            <!--**********************************
            Header end ti-comment-alt
        ***********************************-->


            <!--**********************************
            Content body start
        ***********************************-->
            <div style="margin-top: 11rem;" class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="container-fluid">
                        <div class="row page-titles">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="credit_analysis_select.php" class="text-danger">ກັບຄືນ</a></li>
                                <li class="breadcrumb-item active"><a href="">ການວິເຄາະສິນເຊື່ອ</a></li>
                                <li class="breadcrumb-item active"><a href="credit_analysis_select.php">ລາຍງານຂໍ້ມູນການວິເຄາະສິນເຊື່ອ</a></li>
                                <li class="breadcrumb-item"><a href="">ແກ້ໄຂຂໍ້ມູນການວິເຄາະສິນເຊື່ອ</a></li>

                            </ol>

                        </div>
                        <!-- row -->

                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $stmt = $conn->query("SELECT * FROM credit_analysis WHERE ca_id = $id");
                            $stmt->execute();
                            $data = $stmt->fetch();
                        }
                        ?>
                        <div class=" row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-1 row">
                                                    <div class="col-xl-3">
                                                        <input type="text" value="<?= $data['ca_id']; ?>" required class="form-control cus_id" name="id">
                                                        <input type="text" class="form-control cus_runing" value="<?= $data['cus_id']; ?>" id="validationCustom01" placeholder="ປ້ອນລະຫັດລູກຄ້າ..." required="" name="cus_id">
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດລູກຄ້າ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control cus_runing" value="<?= $data['cus_runing']; ?>" id="validationCustom01" placeholder="ປ້ອນລະຫັດລູກຄ້າ..." required="" name="cus_runing">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດການວິເຄາະ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_runing_id" id="validationCustom01" value="<?= $data['ca_runing_id']; ?>" required="" name="ca_runing_id" readonly>
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ຊື່ ແລະ ນາມສະກຸນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control cus_fname" value="<?= $data['cus_fname']; ?>" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="cus_fname" readonly>
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ອາຍຸ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="number" class="form-control ca_age" value="<?= $data['ca_age']; ?>" id="validationCustom01" placeholder="ປ້ອນອາຍຸ..." required="" name="ca_age">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ສັນຊາດ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_nationality" value="<?= $data['ca_nationality']; ?>" id="validationCustom01" placeholder="ປ້ອນຊື່ສັນຊາດ..." required="" name="ca_nationality">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ອາຊີບ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_job" value="<?= $data['ca_job']; ?>" id="validationCustom01" placeholder="ປ້ອນອາຊີບ..." required="" name="ca_job">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ປັດຈຸບັນຢູ່ບ້ານ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_vill" value="<?= $data['ca_vill']; ?>" id="validationCustom01" placeholder="ປ້ອນບ້ານຢູ່ບັດຈຸບັນ..." required="" name="ca_vill">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ເມືອງ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_dis" value="<?= $data['ca_dis']; ?>" id="validationCustom01" placeholder="ປ້ອນເມືອງ..." required="" name="ca_dis">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ແຂວງ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_pro" value="<?= $data['ca_pro']; ?>" id="validationCustom01" placeholder="ປ້ອນແຂວງ..." required="" name="ca_pro">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ຖືບັດປະຈຳຕົວເລກທີ່
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_id_card" value="<?= $data['ca_id_card']; ?>" id="validationCustom01" placeholder="ປ້ອນຖືບັດປະຈຳຕົວເລກທີ່..." required="" name="ca_id_card">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ເບີໂທ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_tel" value="<?= $data['ca_tel']; ?>" id="validationCustom01" placeholder="ປ້ອນເບີໂທ..." required="" name="ca_tel">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ສະເໜີຂໍ້ກູ້ຢຶມເງິນຈຳນວນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_amount_offered" value="<?= $data['ca_amount_offered']; ?>" id="validationCustom01" placeholder="ປ້ອນສະເໜີຂໍ້ກູ້ຢຶມເງິນຈຳນວນ..." required="" name="ca_amount_offered">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ຈຳນວນປ່ອຍຕົວຈິງ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_amount_released" value="<?= $data['ca_amount_released']; ?>" id="validationCustom01" placeholder="ປ້ອນຈຳນວນປ່ອຍຕົວຈິງ..." required="" name="ca_amount_released">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ກຳນົດເວລາ / ເດືອນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_set_month" value="<?= $data['ca_set_month']; ?>" id="validationCustom01" placeholder="ກຳນົດເວລາ / ເດືອນ..." required="" name="ca_set_month">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ອັດຕາດອກເບ້ຍ% / ເດືອນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control ca_interest" value="<?= $data['ca_interest']; ?>" id="validationCustom01" placeholder="ປ້ອນອັດຕາດອກເບ້ຍ% / ເດືອນ..." required="" name="ca_interest">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ອັດຕາສ່ວນເງິນກູ້ຕໍ່ຊັບສົມບັດຄ້ຳປະກັນ %
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="number" class="form-control ca_loan_to_collateral" value="<?= $data['ca_loan_to_collateral']; ?>" id="validationCustom01" placeholder="ປ້ອນອັດຕາສ່ວນເງິນກູ້ຕໍ່ຊັບສົມບັດຄ້ຳປະກັນ %..." name="ca_loan_to_collateral" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ເປົ້າໝາຍໃນການກູ້ຢຶມເງິນເພື່ອ</h4>
                                    </div>
                                    <div class="card-body">
                                        <input style="height: 120px; font-size: 18px;" value="<?= $data['ca_goal']; ?>" type="text" class="form-control ca_goal" id="validationCustom01" name="ca_goal" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ຮູບແບບໃນການຊຳລະ</h4>
                                    </div>
                                    <div class="card-body">
                                        <input style="height: 120px; font-size: 18px;" type="text" class="form-control ca_payment" value="<?= $data['ca_payment']; ?>" id="validationCustom01" name="ca_payment" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ຫຼັກຊັບຄຳປະກັນ</h4>
                                    </div>
                                    <div class="card-body">
                                        <input style="height: 120px; font-size: 18px;" type="text" class="form-control ca_collateral" value="<?= $data['ca_collateral']; ?>" id="validationCustom01" name="ca_collateral" required="">
                                        <label class="col-form-label" for="validationCustom06">ມູນຄ້າຊັບສົມບັດຄ້ຳປະກັນຕາມການປະເມີນຂອງພະນັກງານ
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                            <input type="text" class="form-control ca_employee" value="<?= $data['ca_employee']; ?>" id="validationCustom01" placeholder="ປ້ອນມູນຄ້າຊັບສົມບັດຄ້ຳປະກັນຕາມການປະເມີນຂອງພະນັກງານ..." required="" name="ca_employee">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ປະຫວັດຍໍ່ ຫຼື ປະຫວັດທຸລະກິດລອງລູກຄ້າໃນໄລຍະທີ່ຜ່ານມາ ເຄີຍເຮັດຢູ່ໃສແດ່</h4>
                                    </div>
                                    <div class="card-body">
                                        <input style="height: 120px; font-size: 18px;" type="text" class="form-control ca_history_business" value="<?= $data['ca_history_business']; ?>" id="validationCustom01" name="ca_history_business" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ແຫຼ່ງທຶນ ຫຼື ແຫຼ່ງລາຍຮັບປະຈຳທີ່ຈະມາຊຳຫຼະໜີ່ສິນຄືນແກ້ສະຖາບັນ</h4>
                                    </div>
                                    <div class="card-body">
                                        <input style="height: 120px; font-size: 18px;" type="text" class="form-control ca_regular" value="<?= $data['ca_regular']; ?>" id="validationCustom01" name="ca_regular" required="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </form>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>

    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="js/image.js"></script>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>