<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_satus'] === "ສິນເຊື່ອ") {
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
    <title>ແບບຟອມແກ້ໄຂຂໍ້ມູນຜູ້ຄ້ຳປະກັນ</title>

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
            $(".submit").click(function() {

                var cus_runing = $(".cus_runing").val();
                var cus_fname = $(".cus_fname").val();
                var cus_id = $(".cus_id").val();

                var gt_runing_id = $(".gt_runing_id").val();
                var gt_flname = $(".gt_flname").val();
                var gt_age = $(".gt_age").val();
                var gt_nationality = $(".gt_nationality").val();
                var gt_job = $(".gt_job").val();
                var gt_vill = $(".gt_vill").val();
                var gt_dis = $(".gt_dis").val();
                var gt_pro = $(".gt_pro").val();
                var gt_card_id = $(".gt_card_id").val();
                var gt_date_card = $(".gt_date_card").val();
                var gt_tel = $(".gt_tel").val();
                var gt_doc_name = $(".gt_doc_name").val();
                var gt_doc_file = $(".gt_doc_file").val();

                if (cus_runing == "" || cus_fname == "" || cus_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດລູກຄ້າກ່ອນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_runing_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດຜູ້ຄຳປະກັນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_flname == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນຜູ້ຄຳປະກັນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_age == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນອາຍຸຜູ້ຄຳປະກັນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_nationality == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນສັນຊາດຜູ້ຄ້ຳປະກັນ',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_job == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນອາຊີບຜູ້ຄຳປະກັນ',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_vill == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນບ້ານຢູ່ປັດຈຸບັນ',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_dis == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເມືອງ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_pro == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນແຂວງ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_card_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເລກທີ່ບັດປະຊາຊົນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_date_card == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລົງວັນທີ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_tel == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເບີໂທ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (gt_doc_file == "" || gt_doc_file == "") {
                    Swal.fire(
                        'ກະລຸນາອັບໂຫຼດເອກກະສານສັນຍາຄ້ຳປະກັນໃຊ້ແທນໜີ້ສິນ!',
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
            });
        });
    </script>

    <?php
    require_once "config/db_s_and_k_project.php";

    if (isset($_POST['update'])) {

        $id = $_POST['id'];
  
        $select_stmt = $conn->prepare('SELECT * FROM customers WHERE cus_id = :id');
        $select_stmt->bindParam(":id", $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
  
        $gt_runing_id = $_POST['gt_runing_id'];
        $gt_flname = $_POST['gt_flname'];
        $gt_age = $_POST['gt_age'];
        $gt_nationality = $_POST['gt_nationality'];
        $gt_job = $_POST['gt_job'];
        $gt_vill = $_POST['gt_vill'];
        $gt_dis = $_POST['gt_dis'];
        $gt_pro = $_POST['gt_pro'];
        $gt_card_id = $_POST['gt_card_id'];
        $gt_date_card = $_POST['gt_date_card'];
        $gt_tel = $_POST['gt_tel'];
        $gt_doc_name = $_POST['gt_doc_name'];
        $gt_satatus = 0;
  
  
        $cus_id  = $_POST['cus_id'];
        $cus_fname = $_POST['cus_fname'];
        $cus_runing = $_POST['cus_runing'];
  
        $gt_doc_fileold = $_POST['gt_doc_fileold'];
        $upload_file = $_FILES['gt_doc_file']['name'];
        $old_doc = "docs/";
  
        if ($upload_file != '') {
  
            $date1 = date("Ymd_His");
  
            $numrand = (mt_rand());
            $gt_doc_file = (isset($_POST['gt_doc_file']) ? $_POST['gt_doc_file'] : '');
  
            $typefile = strrchr($_FILES['gt_doc_file']['name'], ".");
  
  
            if ($typefile == '.pdf') {
  
                $newname = 'doc_' . $numrand . $date1 . $typefile;
                $path_copy = $old_doc . $newname;
  
                $remove_file = move_uploaded_file($_FILES['gt_doc_file']['tmp_name'], $path_copy);
                if ($remove_file) {
                    unlink($old_doc . $row['gt_doc_file']);
                }
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
                                    title: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ',
                                    text: 'ອັບໂຫຼດຟາຍເອກະສານໄດ້ສະເພາະຟາຍ PDF ເທົ່ານັ້ນ!!!',
                                    icon: 'error',
                                    showConfirmButton: true
                                });
                            })
                        })
                               </script>";
            }
        } else {
            $newname = $gt_doc_fileold;
        }
  
        $sql = $conn->prepare("UPDATE guarantor SET 
            gt_runing_id = :gt_runing_id,
            gt_flname = :gt_flname,  
            gt_age = :gt_age,
            gt_nationality = :gt_nationality,
            gt_job = :gt_job,
            gt_vill = :gt_vill,
            gt_dis = :gt_dis,
            gt_pro = :gt_pro,
            gt_card_id = :gt_card_id,
            gt_date_card = :gt_date_card,
            gt_tel = :gt_tel,
            gt_doc_name = :gt_doc_name,
            gt_doc_file = :gt_doc_file,
            gt_satatus = :gt_satatus,
            cus_id = :cus_id,
            cus_runing = :cus_runing,
            cus_fname = :cus_fname WHERE gt_id  = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":gt_runing_id", $gt_runing_id);
        $sql->bindParam(":gt_flname", $gt_flname);
        $sql->bindParam(":gt_age", $gt_age);
        $sql->bindParam(":gt_nationality", $gt_nationality);
        $sql->bindParam(":gt_job", $gt_job);
        $sql->bindParam(":gt_vill", $gt_vill);
        $sql->bindParam(":gt_dis", $gt_dis);
        $sql->bindParam(":gt_pro", $gt_pro);
        $sql->bindParam(":gt_card_id", $gt_card_id);
        $sql->bindParam(":gt_date_card", $gt_date_card);
        $sql->bindParam(":gt_tel", $gt_tel);
        $sql->bindParam(":gt_doc_name", $gt_doc_name);
        $sql->bindParam(":gt_doc_file", $newname);
        $sql->bindParam(':gt_satatus', $gt_satatus);
  
        $sql->bindParam(':cus_id', $cus_id);
        $sql->bindParam(':cus_fname', $cus_fname);
        $sql->bindParam(':cus_runing', $cus_runing);
        $sql->execute();
  
        if ($sql) {
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
                                        title: 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
                                        text: 'ແກ້ໄຂໍ່ມູນສຳເລັດແລ້ວ ກະລຸນາກວດສອບຂໍ້ມູນ',
                                        icon: 'success',
                                        showConfirmButton: true,
                                        preConfirm: function() {
                                            document.location.href = 'guarantor_select.php';
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
                                            <h1>ແກ້ໄຂຂໍ້ມູນຜູ້ຄຳປະກັນ</h1>
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
                                <li class="breadcrumb-item active"><a href="">ຜູ້ຄ້ຳປະກັນ</a></li>
                                <li class="breadcrumb-item active"><a href="credit_analysis_select.php">ລາຍງານຂໍ້ມູນຜູ້ຄ້ຳປະກັນ</a></li>
                                <li class="breadcrumb-item"><a href="">ແກ້ໄຂຂໍ້ມູນຜູ້ຄ້ຳປະກັນ</a></li>

                            </ol>

                        </div>
                        <!-- row -->

                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $stmt = $conn->query("SELECT * FROM guarantor WHERE gt_id = $id");
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
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດລູກຄ້າ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control cus_runing" value="<?php echo $data['cus_runing'] ?>" id="validationCustom01" placeholder="ປ້ອນລະຫັດລູກຄ້າ..." required="" name="cus_runing">
                                                            <input type="hidden" class="form-control gt_id" value="<?php echo $data['gt_id'] ?>" id="validationCustom01" placeholder="ປ້ອນລະຫັດລູກຄ້າ..." required="" name="id">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ຊື່ ແລະ ນາມສະກຸນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?php echo $data['cus_fname'] ?>" class="form-control cus_fname" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="cus_fname" readonly>
                                                            <input type="hidden" value="<?php echo $data['cus_id'] ?>" class="form-control cus_id" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="cus_id">
                                                            <input type="hidden" value="<?php echo $data['gt_doc_file'] ?>" class="form-control gt_doc_fileold" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="gt_doc_fileold">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດຜູ້ຄ້ຳປະກັນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control gt_runing_id" id="validationCustom01" value="<?php echo $data['gt_runing_id'] ?>" required="" name="gt_runing_id" readonly>
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ຊື່ ແລະ ນາມສະກຸນ ຜູ້ຄ້ຳປະກັນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?php echo $data['gt_flname'] ?>" class="form-control gt_flname" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ  ຜູ້ຄ້ຳປະກັນ..." required="" name="gt_flname">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ອາຍຸ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input value="<?php echo $data['gt_age'] ?>" type="text" class="form-control gt_age" id="validationCustom01" placeholder="ປ້ອນອາຍຸ..." required="" name="gt_age">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ສັນຊາດ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input value="<?php echo $data['gt_nationality'] ?>" type="text" class="form-control gt_nationality" id="validationCustom01" placeholder="ປ້ອນສັນຊາດ..." required="" name="gt_nationality">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ອາຊີບ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?php echo $data['gt_job'] ?>" class="form-control gt_job" id="validationCustom01" placeholder="ປ້ອນອາຊີບ..." required="" name="gt_job">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ບ້ານຢູ່ປັດຈຸບັນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?php echo $data['gt_vill'] ?>" class="form-control gt_vill" id="validationCustom01" placeholder="ປ້ອນບ້ານຢູ່ປັດຈຸບັນ..." required="" name="gt_vill">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ເມືອງ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?php echo $data['gt_dis'] ?>" class="form-control gt_dis" id="validationCustom01" placeholder="ປ້ອນເມືອງ..." required="" name="gt_dis">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ແຂວງ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?php echo $data['gt_pro'] ?>" class="form-control gt_pro" id="validationCustom01" placeholder="ປ້ອນແຂວງ..." required="" name="gt_pro">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ຖືບັດປະຈຳຕົວເລກທີ່
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?php echo $data['gt_card_id'] ?>" class="form-control gt_card_id" id="validationCustom01" placeholder="ປ້ອນຖືບັດປະຈຳຕົວເລກທີ່..." required="" name="gt_card_id">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລົງວັນທີ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="date" value="<?php echo $data['gt_date_card'] ?>" class="form-control gt_date_card" id="validationCustom01" placeholder="ລົງວັນທີ..." required="" name="gt_date_card">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ເບີໂທ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?php echo $data['gt_tel'] ?>" class="form-control gt_tel" id="validationCustom01" placeholder="ປ້ອນເບີໂທ..." required="" name="gt_tel">
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
                                        <h4 class="card-title">ເອກະສານສັນຍາຄຳປະກັນໃຊ້ແທນໜີ້ສິນ</h4>
                                    </div>
                                    <div class="card-body">
                                        <label class="col-form-label" for="validationCustom06">ຊື່ເອກະສານ
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                            <input type="text" value="<?php echo $data['gt_doc_name'] ?>" class="form-control gt_doc_name" name="gt_doc_name" id="validationCustom01" required="" placeholder="ປ້ອນຊື່ເອກະສານ...">
                                        </div>
                                        <label class="col-form-label" for="validationCustom06">ອັບໂຫຼດເອກະສານ
                                            <span class="text-danger">ອັບໂຫລດສະເພາະຟາຍ PDF ເທົ່ານັ້ນ*</span>
                                        </label>

                                        <label for="images" class="drop-container">
                                            <span class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດເອກກະສານ</span>
                                            <p><?php echo $data['gt_doc_file'] ?></p>
                                            <input type="file" class="gt_doc_file" id="images" name="gt_doc_file" accept="application/pdf">
                                        </label>

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