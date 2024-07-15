<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

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
    <title>ແບບຟອມບັນທຶກຂໍ້ມູນການປ່ອຍສິນເສື່ອ</title>


    <!-- SWEETALERT2 AND JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="vendor/select2/css/select2.min.css">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- //FORM AND FONT -->
    <link href="css/Font.css" rel="stylesheet">
    <link href="css/customer_form.css" rel="stylesheet">

    <style>
        * {
            font-family: Noto Sans Lao;
        }
    </style>

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
            $(".submit").click(function() {

                var cus_runing = $(".cus_runing").val();
                var cus_fname = $(".cus_fname").val();
                var cus_id = $(".cus_id").val();

                var cr_id = $(".cr_id").val();
                var cr_lg_date = $(".cr_lg_date").val();
                var cr_set_month = $(".cr_set_month").val();
                var cr_ap_mounnt = $(".cr_ap_mounnt").val();
                var cr_ap_amount_text = $(".cr_ap_amount_text").val();
                var cr_interest = $(".cr_interest").val();

                var lg_id = $(".lg_id ").val();
                var lg_runing_id = $(".lg_runing_id").val();



                if (cr_id == "" || lg_runing_id == "" || cus_runing == "" || cus_fname == "" || cus_id == "" || cr_lg_date == "" || cr_set_month == "" || cr_ap_mounnt == "" || cr_interest == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເລກທີ່ສັຍານ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cr_ap_amount_text == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນ ຈຳນວນເງິນເປັນຕົວໜັງສື!',
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
            $(".lg_runing_id").keyup(function() {
                var a = $(".lg_runing_id").val();
                $.post("credit_release_get_cus_fname.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cus_fname").val(output);
                    });
                $.post("credit_release_get_cus_id.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cus_id").val(output);
                    });
                $.post("credit_release_get_cus_runing.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cus_runing").val(output);
                    });
                $.post("credit_release_get_lg_id.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".lg_id").val(output);
                    });
                $.post("credit_release_get_cr_lg_date.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cr_lg_date").val(output);
                    });
                $.post("credit_release_get_cr_set_month.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cr_set_month").val(output);
                    });
                $.post("credit_release_get_cr_lg_dates.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cr_set_months").val(output);
                    });
                $.post("credit_release_get_cr_ap_mounnt.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cr_ap_mounnt").val(output);
                    });
                $.post("credit_release_get_cr_ap_mounnts.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cr_ap_mounnt1").val(output);
                    });
                $.post("credit_release_get_cr_interest.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cr_interest").val(output);
                    });
                $.post("credit_release_get_cr_interests.php", {
                        lg_runing_id: a
                    },
                    function(output) {
                        $(".cr_interests").val(output);
                    });


            });
        });
    </script>

    <?php
    require_once "config/conect_nal.php";
    $query = "SELECT count(cr_id) FROM credit_release ORDER BY cr_id DESC LIMIT 1; ";
    $result = mysqli_query($conns, $query);
    $row = mysqli_fetch_array($result);
    $lastid = $row[0];
    if (empty($lastid)) {
        $number = "CR-00000001";
    } else {
        $idd = str_replace("CR-", "", $lastid);
        $id = str_pad($idd + 1, 8, 0, STR_PAD_LEFT);
        $number = 'CR-' . $id;
    }

    require_once "config/db_s_and_k_project.php";

    if (isset($_POST['submit'])) {

        $cr_id = $_POST['cr_id'];
        $cr_lg_date = $_POST['cr_lg_date'];
        $cr_set_month = $_POST['cr_set_month'];
        $cr_ap_mounnt = $_POST['cr_ap_mounnt'];
        $cr_ap_amount_text = $_POST['cr_ap_amount_text'];
        $cr_interest = $_POST['cr_interest'];
        $cr_status = 1;

        $lg_id = $_POST['lg_id'];
        $lg_runing_id = $_POST['lg_runing_id'];

        $cus_id  = $_POST['cus_id'];
        $cus_fname = $_POST['cus_fname'];
        $cus_runing = $_POST['cus_runing'];

        $date = date('d/m/Y H:i:s');

        $select_stmt = $conn->prepare('SELECT cus_runing FROM credit_release where cus_runing = :cus_runing');
        $select_stmt->bindParam(':cus_runing', $cus_runing);
        $select_stmt->execute();
        $cus_runings = $select_stmt->fetch(PDO::FETCH_ASSOC);

        $select_stmt = $conn->prepare('SELECT lg_runing_id FROM credit_release where lg_runing_id = :lg_runing_id');
        $select_stmt->bindParam(':lg_runing_id', $lg_runing_id);
        $select_stmt->execute();
        $lg_runing_ids = $select_stmt->fetch(PDO::FETCH_ASSOC);


        if ($cus_runings <> 0) {
            echo "<script>
            $(document).ready(function() {
                let timerInterval
                Swal.fire({
                  title: 'ກຳລັງບັນທຶກຂໍ້ມູນ!',
                  html: 'ບັນທຶກແລ້ວ <b></b> ຟາຍ.',
                  timer: 1500,
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
                        text: 'ລູກຄ້າຜູ້ນີ້ປ່ອຍສິນເຊື່ອແລ!',
                        icon: 'error',
                        showConfirmButton: true
                    });
                })
            })
            </script>";
        } else if ($lg_runing_ids <> 0) {
            echo "<script>
            $(document).ready(function() {
                let timerInterval
                Swal.fire({
                  title: 'ກຳລັງບັນທຶກຂໍ້ມູນ!',
                  html: 'ບັນທຶກແລ້ວ <b></b> ຟາຍ.',
                  timer: 1500,
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
                        text: 'ເລກສັນຍາເງິນກູ້ຊ້ຳກັນ ກາລຸນາກວດສອບສັນຍາເງິນກູ້ແລ້ວລອງອີກຄັ້ງ!',
                        icon: 'error',
                        showConfirmButton: true
                    });
                })
            })
            </script>";
        } else {
            $sql = $conn->prepare("INSERT INTO credit_release(cr_id,cr_lg_date,cr_set_month,cr_ap_mounnt,cr_ap_amount_text,cr_interest,cr_status,cr_date_in,cr_time_in,lg_id,lg_runing_id,cus_id,cus_fname,cus_runing) 
            VALUES(:cr_id,:cr_lg_date,:cr_set_month,:cr_ap_mounnt,:cr_ap_amount_text,:cr_interest,:cr_status,curdate(),curtime(),:lg_id,:lg_runing_id,:cus_id,:cus_fname,:cus_runing)");
            $sql->bindParam(":cr_id", $cr_id );
            $sql->bindParam(":cr_lg_date", $cr_lg_date);
            $sql->bindParam(":cr_set_month", $cr_set_month);
            $sql->bindParam(":cr_ap_mounnt", $cr_ap_mounnt);
            $sql->bindParam(":cr_ap_amount_text", $cr_ap_amount_text);
            $sql->bindParam(":cr_interest", $cr_interest);
            $sql->bindParam(":cr_status", $cr_status);

            $sql->bindParam(":lg_id", $lg_id);
            $sql->bindParam(":lg_runing_id", $lg_runing_id);

            $sql->bindParam(':cus_id', $cus_id);
            $sql->bindParam(':cus_fname', $cus_fname);
            $sql->bindParam(':cus_runing', $cus_runing);
            $sql->execute();

            if ($sql) {
                echo "<script>
                                    $(document).ready(function() {
                                        let timerInterval
                                        Swal.fire({
                                          title: 'ກຳລັງບັນທຶກຂໍ້ມູນ!',
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
                                                title: 'ບັນທຶກຂໍ້ມູນສຳເລັດ',
                                                text: 'ບັນທຶກຂໍ້ມູນເຂົ້າສູ້ລະບົບຮຽບຮ້ອຍແລ້ວ',
                                                icon: 'success',
                                                showConfirmButton: true,
                                                preConfirm: function() {
                                                    document.location.href = 'credit_release_select.php';
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
                                      title: 'ກຳລັງບັນທຶກຂໍ້ມູນ!',
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
                                            text: 'ບໍ່ສາມມາດບັນທຶກຂໍ້ມູນເຂົ້າສູ້ລະບົບ mysql ໄດ້',
                                            icon: 'success',
                                            showConfirmButton: true,
                                            preConfirm: function() {
                                                document.location.href = 'credit_release_insert.php';
                                            }
                                        });
                                    })
                                })
                                </script>";
            }
        }
    } //isset

    ?>

</head>

<body>
<?php

if(@$_SESSION['checked']<>1){
	echo "<script>
  alert('ລົງຊືີ່ເຂົ້າໃຊ້ກ່ອນ')
  location='index.php';
	</script>";
	}
else{  
?>
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
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img src="images/s&k_logo.png" width="64" height="64" alt="">
                <div class="brand-title">
                    <img style="margin-top: 1.2rem;" src="images/logo/logo_big3.png" width="120px" alt="">
                    <img style="margin-top: -3rem;" src="images/logo/logo_smal1.png" width="140px" alt="">
                </div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                ການປ່ອຍສິນເສື່ອ
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
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


        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="../user_images/<?php echo $_SESSION['user_image']; ?>" width="20" alt="">
                            <div class="header-info ms-3">
                                <span class="font-w600 "><b><?php echo $_SESSION['user_flname']; ?></b></span>
                                <small class="font-w400"><?php echo $_SESSION['user_satus']; ?></small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="ms-2">ໂປຣຟາຍ</span>
                            </a>
                            <a href="" class="dropdown-item ai-icon">
                                <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span class="ms-2">Inbox</span>
                            </a>
                            <a href="http://localhost/Loan-management-system/login/index.php" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">ອອກຈາກລະບົບ </span>
                            </a>
                        </div>
                    </li>
                    <li><a href="homepage.php" class="ai-icon" aria-expanded="false">
                            <i class="bi bi-house-door-fill"></i>
                            <span class="nav-text">ໜ້າຫຼັກ</span>
                        </a>
                    </li>
                    
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i style="font-size: 24px;" class="bi bi-map-fill"></i>
                            <span style="font-size: 16px;" class="nav-text">ຈັດການຂໍ້ມູນຫຼັກຊັບຄໍ້າປະກັນ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="collateral_insert_land.php">ບັນທຶກຂໍ້ມູນຫຼັກຊັບຄໍ້າປະກັນ</a></li>
                            <li><a style="font-size: 16px;" class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <span style="font-size: 16px;" class="nav-text">ລາຍງານຂໍ້ມູນຫຼັກຊັບຄໍ້າປະກັນ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="collateral_select_land.php">ລາຍງານທີ່ດິນ-ສິ່ງປູກສ້າງ</a></li>
                            <li><a style="font-size: 16px;" href="collateral_select_car.php">ລາຍງານລົດໃຫຍ່-ລົດຈັກ</a></li>
                            <li><a style="font-size: 16px;" href="collateral_select_other.php">ລາຍງານຫຼັກຊັບອື່ນໆ</a></li>
                        </ul>
                    </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-041-graph"></i>
                            <span style="font-size: 16px;" class="nav-text">ຈັດການຂໍ້ມູນການວິເຄາະສິນເຊື່ອ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="credit_analysis_insert.php">ບັນທຶກຂໍ້ມູນການວິເຄາະສິນເຊື່ອ</a></li>
                            <li><a style="font-size: 16px;" href="credit_analysis_select.php">ລາຍງານການວິເຄາະສິນເຊື່ອ</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i style="font-size: 28px;" class="bi bi-people-fill"></i>
                            <span style="font-size: 16px;"class="nav-text">ຈັດການຂໍ້ມູນຜູ້ຄ້ຳປະກັນ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="guarantor_insert.php">ບັນທຶກຂໍ້ມູນຜູ້ຄ້ຳປະກັນ</a></li>
                            <li><a style="font-size: 16px;" href="guarantor_select.php">ລາຍງານຂໍ້ມູນຜູ້ຄ້ຳປະກັນ</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i style="font-size: 28px;" class="bi bi-card-checklist"></i>
                            <span style="font-size: 16px;"class="nav-text">ຈັດການຂໍ້ມູນສັນຍາກູ້ຢຶມ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="loan_agreement_insert.php">ບັນທຶກຂໍ້ມູນສັນຍາກູ້ຢຶມ</a></li>
                            <li><a style="font-size: 16px;" href="loan_agreement_select.php">ລາຍງານຂໍ້ມຸນສັນຍາກູ້ຢຶມ</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i style="font-size: 30px;" class="bi bi-box-arrow-right"></i>
                            <span style="font-size: 16px;"class="nav-text">ຈັດການຂໍ້ມູນການປ່ອຍສິນເຊື່ອ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="credit_release_insert.php">ບັນທຶກຂໍ້ມູນການປ່ອຍສິນເຊື່ອ</a></li>
                            <li><a style="font-size: 16px;" href="credit_release_select.php">ລາຍງານຂໍ້ມູນການປ່ອຍສິນເຊື່ອ</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="copyright">
                <p><strong>ລະບົບບໍລິຫານສະຖາບັນເງິນກູ້</strong> © 2024 ປະລິນຢາຕີ</p>

                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">ການປ່ອຍສິນເສື່ອ</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">ບັນທຶກຂໍ້ມູນການປ່ອຍສິນເສື່ອ</a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ຟອມບັນທຶກຂໍ້ມູນການປ່ອຍສິນເສື່ອ</h4>
                            </div>
                            <div class="card-body">
                                <form action="" id="collateral_insert" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
                                    <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div style="margin-top: -3rem;" class="card-body">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="row">
                                                                <div class="col-xl-3">
                                                                    <label class="col-form-label" for="validationCustom06">ລະຫັດການປ່ອຍສິນເຊື່ອ
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                        <input style="background: #e8f0fe;" type="text" class="form-control cr_id" id="validationCustom01" value="<?php echo $number ?>" required="" name="cr_id" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-1 row">
                                                                <div class="col-xl-3">
                                                                    <label class="col-form-label" for="validationCustom06">ເລກທີ່ສັນຍາເງິນກູ້
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                        <input type="text" class="form-control lg_runing_id" id="validationCustom01" placeholder="ປ້ອນເລກທີ່ສັນຍາເງິນກູ້..." required="" name="lg_runing_id">
                                                                    </div>
                                                                    <input type="hidden" class="form-control lg_id" id="validationCustom01" placeholder="" required="" name="lg_id">
                                                                    <input type="hidden" class="form-control cus_id" id="validationCustom01" placeholder="" required="" name="cus_id">
                                                                    <input type="hidden" class="form-control cus_runing" id="validationCustom01" placeholder="" required="" name="cus_runing">

                                                                    <label class="col-form-label" for="validationCustom06">ຊື່ ແລະ ນາມສະກຸນ
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                        <input style="background: #e8f0fe;" type="text" class="form-control cus_fname" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="cus_fname" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <label class="col-form-label" for="validationCustom06">ສັນຍາເງິນກູ້ລົງວັນທີ
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                        <input type="date" class="form-control cr_lg_date" id="validationCustom01" placeholder="ປ້ອນລົງວັນທີ..." value="" required="" name="cr_lg_date" readonly>
                                                                    </div>
                                                                    <label class="col-form-label" for="validationCustom06">ເງິນກູ້ໄລຍະເວລາ
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                        <input type="hidden" class="form-control cr_set_month" id="validationCustom01" value="" placeholder="ເງິນກູ້ໄລຍະເວລາ.." required="" name="cr_set_month" readonly>
                                                                        <input type="text" class="form-control cr_set_months" id="validationCustom01" value="" placeholder="ເງິນກູ້ໄລຍະເວລາ.." required="" name="cr_set_months" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <label class="col-form-label" for="validationCustom06">ວົງເງິນອະນຸມັດ
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                        <input type="hidden" class="form-control cr_ap_mounnt" id="validationCustom01" value="" placeholder="ຈຳນວນເງິນ..." required="" name="cr_ap_mounnt" readonly>
                                                                        <input type="text" class="form-control cr_ap_mounnt1" id="validationCustom01" value="" placeholder="ຈຳນວນເງິນ..." required="" name="cr_ap_mounnt1" readonly>
                                                                    </div>
                                                                    <label class="col-form-label" for="validationCustom06">ຈຳນວນເງິນເປັນຕົວໜັງສື
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                        <input type="text" class="form-control cr_ap_amount_text" id="validationCustom01" value="" placeholder="ປ້ອນຈຳນວນນວນເງິນເປັນຕົວໜັງສື..." required="" name="cr_ap_amount_text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <label class="col-form-label" for="validationCustom06">ອັດຕາດອກເບ້ຍ / ເດືອນ
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                        <input type="hidden" class="form-control cr_interest" id="validationCustom01" value="" placeholder="ອັດຕາດອກເບ້ຍ / ເດືອນ..." required="" name="cr_interest" readonly>
                                                                        <input type="text" class="form-control cr_interests" id="validationCustom01" value="" placeholder="ອັດຕາດອກເບ້ຍ / ເດືອນ..." required="" name="cr_interests" readonly>
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

                                                <div class="card-footer d-flex flex-row-reverse bd-highlight">
                                                    <button type="submit" id="submit" name="submit" class="btn me-2 btn-primary submit">ບັນທຶກຂໍ້ມູນ</button>
                                                    <button type="reset" class="btn btn-light me-2">ລ້າງຂໍ້ມູນ</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">

        </div>
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
    <script src="vendor/select2/js/select2.full.min.js"></script>
    <script src="js/plugins-init/select2-init.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
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
<?php } ?>