
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
    <title>ແບບຟອມບັນທຶກຂໍ້ມູນການປິດສັນຍາ</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/Font.css" rel="stylesheet">
    <link href="css/customer_form.css" rel="stylesheet">

    <!-- SWEETALERT2 AND JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <style>
        * {
            font-family: Noto Sans Lao;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "<html><p>ບໍ່ຂໍ້ມູນໃນຕາຕະລາງ</p></html>",
                    "info": "<html><p>ສະແດງແຖວທີ່ _START_ ຫາ _END_ ຈາກທັງໝົດ _TOTAL_ ແຖວ</p></html>",
                    "infoEmpty": "<html><p>ສະແດງແຖວທີ່ 0 ຫາ 0 ຈາກທັງໝົດ 0 ແຖວ</p></html>",
                    "infoFiltered": "<html><p>(ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຕ້ອງການຫາ)</p></html>",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "<html><p>ສະແດງ _MENU_ ແຖວ</p></html>",
                    "loadingRecords": "ກຳລັງດາວໂຫລດ...",
                    "processing": "",
                    "search": "ຄົ້ນຫາ:",
                    "zeroRecords": "<html><p>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຕ້ອງການຫາ</p></html>",
                    "paginate": {
                        "first": "ຫນ້າທຳອິດ",
                        "last": "ໜ້າສຸດທ້າຍ",
                        "next": "ທັດໄປ",
                        "previous": "ກັບຄື້ນ"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            });

        });
    </script>

    <style>
        .card-body input {
            border: 1px solid #85929E;
            font-size: 16px;
        }

        .card-body textarea {
            border: 1px solid #85929E;
            font-size: 16px;
        }

        .card-body select {
            border: 1px solid #85929E;
            font-size: 16px;
        }

        .card-body label {
            font-size: 16px;
        }

        #image_location {
            display: none;
        }

        .drop-container {
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 58px;
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

        .drop-container_cod {
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

        .drop-container_cod:hover {
            background: #eee;
            border-color: #111;
        }
    </style>


    <script>
        $(function() {
            $(".submit").click(function() {

                var cus_runing = $(".cus_runing").val();
                var cus_fname = $(".cus_fname").val();
                var cus_id = $(".cus_id").val();

                if (cus_runing == "" || cus_fname == "" || cus_id == "") {
                    Swal.fire(
                        'ກະລຸນາເລື້ອກເລກທີ່ສັນຍາ !',
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
                // $.post("credit_release_get_money_circle.php", {
                //         cus_runing: a
                //     },
                //     function(output) {
                //         $(".cr_money_circle").val(output);
                //     })
                // $.post("credit_release_get_money_circle_format.php", {
                //         cus_runing: a
                //     },
                //     function(output) {
                //         $(".cr_money_circle_format").val(output);
                //     })
                // $.post("credit_release_get_interest.php", {
                //         cus_runing: a
                //     },
                //     function(output) {
                //         $(".cr_interest").val(output);
                //     })
                // $.post("credit_release_get_release_date.php", {
                //         cus_runing: a
                //     },
                //     function(output) {
                //         $(".cr_release_date").val(output);
                //     })
                // $.post("credit_release_get_loan_id.php", {
                //         cus_runing: a
                //     },
                //     function(output) {
                //         $(".cr_loan_id").val(output);
                //     })
                // $.post("credit_release_get_set_mouth.php", {
                //         cus_runing: a
                //     },
                //     function(output) {
                //         $(".cr_set_mouth").val(output);
                //     })

            });


            let image_location = document.getElementById('image_location');
            let preview_image_location = document.getElementById('preview_image_location');

            image_location.onchange = evt => {
                const [file] = image_location.files;
                if (file) {
                    preview_image_location.src = URL.createObjectURL(file);
                }
            }

        });
    </script>

    <?php
    date_default_timezone_set("Asia/Bangkok");
    $y = date('y');
    require_once "config/conect_nal.php";
    $query = "SELECT count(pm_id) FROM payment ORDER BY pm_id DESC LIMIT 1; ";
    $result = mysqli_query($conns, $query);
    $row = mysqli_fetch_array($result);
    $lastid = $row[0];
    if (empty($lastid)) {
        $numbers = "SK/00001/".$y;
    } else {
        $idd = str_replace("SK/", "", $lastid);
        $id = str_pad($idd + 1, 5, 0, STR_PAD_LEFT);
        $numbers = 'SK/'.$id.'/'.$y;
    }

    require_once "config/db_s_and_k_project.php";

    if (isset($_POST['submit'])) {

        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        $cr_doc = (isset($_POST['cr_doc']) ? $_POST['cr_doc'] : '');
        $upload = $_FILES['cr_doc']['name'];

        if ($upload != '') {

            $typefile = strrchr($_FILES['cr_doc']['name'], ".");

            if ($typefile == '.pdf') {

                $path = "credit_release/";

                $newname = 'doc_' . $numrand . $date1 . $typefile;
                $path_copy = $path . $newname;

                move_uploaded_file($_FILES['cr_doc']['tmp_name'], $path_copy);

                date_default_timezone_set("Asia/Bangkok");
                $cr_running_id = $_POST['cr_running_id'];
                $cr_money_circle = $_POST['cr_money_circle'];
                $cr_interest = $_POST['cr_interest'];
                $cr_release_date = $_POST['cr_release_date'];
                $cr_loan_id = $_POST['cr_loan_id'];
                $cr_set_mouth = $_POST['cr_set_mouth'];
                $cr_doc_name = $_POST['cr_doc_name'];

                $cus_id  = $_POST['cus_id'];
                $cus_fname = $_POST['cus_fname'];
                $cus_runing = $_POST['cus_runing'];

                $date = date('d/m/Y H:i:s');

                $select_stmt = $conn->prepare('SELECT cus_runing FROM credit_release where cus_runing = :cus_runing');
                $select_stmt->bindParam(':cus_runing', $cus_runing);
                $select_stmt->execute();
                $cus_runings = $select_stmt->fetch(PDO::FETCH_ASSOC);

                $select_stmt = $conn->prepare('SELECT cr_running_id FROM credit_release where cr_running_id = :cr_running_id');
                $select_stmt->bindParam(':cr_running_id', $cr_running_id);
                $select_stmt->execute();
                $cr_running_ids = $select_stmt->fetch(PDO::FETCH_ASSOC);


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
                                text: 'ລະຫັດລູກຄ້າຊ້ຳກັນ ກາລຸນາກວດສອບລະຫັດຂອງລູກຄ້າ ແລ້ວລອງໃຫມ່ອີກຄັ້ງ!',
                                icon: 'error',
                                showConfirmButton: true
                            });
                        })
                    })
                    </script>";
                } else if ($cr_running_ids <> 0) {
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
                                text: 'ລະຫັດການປ່ອນສິນເຊື່ອຊ້ຳກັນ ກາລຸນາກວດສອບລະຫັດການປ່ອຍສິນເຊື່ອໃຫມ່ ແລ້ວລອງອີກຄັ້ງ!',
                                icon: 'error',
                                showConfirmButton: true
                            });
                        })
                    })
                    </script>";
                } else {
                    $sql = $conn->prepare("INSERT INTO credit_release(cr_running_id,cr_money_circle,cr_interest,cr_release_date,cr_loan_id,cr_set_mouth,cr_doc_name,cr_doc,cr_date,cus_id,cus_fname,cus_runing) 
                    VALUES(:cr_running_id,:cr_money_circle,:cr_interest,:cr_release_date,:cr_loan_id,:cr_set_mouth,:cr_doc_name,'$newname',:cr_date,:cus_id,:cus_fname,:cus_runing)");
                    $sql->bindParam(":cr_running_id", $cr_running_id);
                    $sql->bindParam(":cr_money_circle", $cr_money_circle);
                    $sql->bindParam(":cr_interest", $cr_interest);
                    $sql->bindParam(":cr_release_date", $cr_release_date);
                    $sql->bindParam(":cr_loan_id", $cr_loan_id);
                    $sql->bindParam(":cr_set_mouth", $cr_set_mouth);
                    $sql->bindParam(":cr_doc_name", $cr_doc_name);
                    $sql->bindParam(':cr_date', $date, PDO::PARAM_STR);

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
                                                            document.location.href = 'credit_release_insert.php';
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
            } else { //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
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
            } //else ของเช็คนามสกุลไฟล์

        } // if($upload !='') {
    } //isset

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
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="customer_select_offer.php" class="brand-logo">
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
                                ການປິດສັນຍາ
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

        <!-- Modal -->
        <div style="margin-top: 0rem;" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">ຕາຕະລາງຂໍ້ມູນໜີ່ສິນລູກຄ້າ</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="myTable" class="table table-hover" style="min-width: 100%;">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check custom-checkbox ms-2">
                                            <input style="cursor: pointer;" type="checkbox" class="form-check-input" id="checkAll" required="">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th>ເລກທີ່ສັນຍາ</th>
                                    <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                                    <th>ເງິນຕົ້ນ/ເດືອນ</th>
                                    <th>ດອກເບ້ຍ/ເດືອນ</th>
                                    <th>ເງິນຕົ້ນ+ດອກເບ້ຍ/ເດືອນ</th>
                                    <th>ເງິນຕົ້ນທີ່ຍັງເຫຼືອ</th>
                                    <th>ດອກເບ້ຍທີ່ຍັງເຫຼືອ</th>
                                    <th>ລວມໜີ່ສິນທີ່ຍັງເຫຼືອ</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stmt = $conn->query("SELECT * FROM debt");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach ($users as $row) {
                                ?>
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="close_payment_insert_selecter.php?id=<?php echo $row['cus_id']; ?>">
                                                <?php echo $row['lg_runing_id']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="close_payment_insert_selecter.php?id=<?php echo $row['cus_id']; ?>">
                                                <?php echo $row['cus_fname']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="close_payment_insert_selecter.php?id=<?php echo $row['cus_id']; ?>">
                                                <?php echo number_format($row['dt_releaseds']); ?> LAK
                                            </a>
                                        </td>
                                        <td>
                                            <a href="close_payment_insert_selecter.php?id=<?php echo $row['cus_id']; ?>">
                                                <?php echo number_format($row['dt_totle_interest']); ?> LAK
                                            </a>
                                        </td>
                                        <td>
                                            <a href="close_payment_insert_selecter.php?id=<?php echo $row['cus_id']; ?>">
                                                <?php echo number_format($row['dt_amount_bepaid_month']); ?> LAK
                                            </a>
                                        </td>
                                        <td>
                                            <a href="close_payment_insert_selecter.php?id=<?php echo $row['cus_id']; ?>">
                                                <?php echo number_format($row['dt_amount_releaseds']); ?> LAK
                                            </a>
                                        </td>
                                        <td>
                                            <a href="close_payment_insert_selecter.php?id=<?php echo $row['cus_id']; ?>">
                                                <?php echo number_format($row['dt_total_interest']); ?> LAK
                                            </a>
                                        </td>
                                        <td>
                                            <a href="close_payment_insert_selecter.php?id=<?php echo $row['cus_id']; ?>">
                                                <?php echo number_format($row['dt_capital_plus_interest']); ?> LAK
                                            </a>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ຍົກເລີ້ກ</button>
                    </div>
                </div>
            </div>
        </div>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">ການປິດສັນຍາ</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">ບັນທຶກຂໍ້ມູນການປິດສັນຍາ</a></li>
                    </ol>
                </div>
                <div class="row"></div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ຟອມບັນທຶກຂໍ້ມູນການປິດສັນຍາ</h4>
                        </div>
                        <div class="card-body">
                            <form action="" id="close_payment_insert" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
                                <div class=" row">
                                    <div class="col-xl-2">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <label class="col-form-label" for="validationCustom06">ເລກທີ່ປິດສັນຍາ
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                    <input type="text" class="form-control cr_running_id" id="validationCustom01" value="<?php echo $numbers  ?>" required="" name="cr_running_id" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 1rem;" class="mb-1 row">
                                            <div class="col-xl-12">
                                                <label class="col-form-label" for="validationCustom06">ເລກທີ່ສັນຍາເງິນກູ້
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <span style="cursor: pointer;" class="input-group-text" data-bs-toggle="modal" data-bs-target="#exampleModal" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                        </svg></span>
                                                    <input type="text" class="form-control cus_runing" id="validationCustom01" value="" placeholder="ປ້ອນເລກທີ່ສັນຍາເງິນກູ້..." required="" name="cus_runing">
                                                </div>
                                                <input type="hidden" class="form-control cus_runing" id="validationCustom01" placeholder="ລະຫັດສັນຍາ" required="" name="cus_runing">
                                                <input type="hidden" class="form-control cus_runing" id="validationCustom01" placeholder="ໄອດີລູກຄ້າ" required="" name="cus_runing">
                                                <input type="hidden" class="form-control cus_fname" id="validationCustom01" placeholder="ລະຫັດລູ້ຄ້າruning" required="" name="cus_fname" readonly>
                                                <input type="hidden" class="form-control cus_id" id="validationCustom01" placeholder="ຊື່ ແລະ ນາມສະກຸນ" required="" name="cus_id">
                                                <input type="hidden" class="form-control gt_date_card" id="validationCustom01" placeholder="ລົງວັນທີ..." required="" name="gt_date_card">
                                                <input type="hidden" class="form-control cr_release_date" id="validationCustom01" value="" placeholder="ຈຳນວນເງິນຕົ້ນ..." required="" name="cr_release_date" readonly>
                                                <input type="hidden" class="form-control cr_release_date" id="validationCustom01" value="" placeholder="ຈຳນວນເງິນດອກເບ້ຍ..." required="" name="cr_release_date" readonly>
                                                <input type="hidden" class="form-control cr_release_date" id="validationCustom01" value="" placeholder="ຈຳນວນເງິນທັງໝົດ..." required="" name="cr_release_date" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-10">

                                        <div class="row align-items-center">
                                            <div class="col-xl-4 mb-3">
                                                <ps style="font-size: 16px;" class="mb-2">ລະຫັດລູກຄ້າ</p>
                                                    <h2 class="mb-0">...</h2>
                                            </div>      
                                            <div class="col-xl-4 mb-3">
                                                <ps style="font-size: 16px;" class="mb-2">ຊື່ ແລະ ນາມສະກຸນ</p>
                                                    <h2 class="mb-0">...</h2>
                                            </div>                                     
                                            <div class="col-xl-4 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="d-flex me-3 mb-3 ms-2 align-items-start">
                                                    <i class="fa fa-phone scale-2 me-4 mt-2"></i>
                                                    <div>
                                                        <p style="font-size: 16px;" class="mb-2">ເບີໂທ</p>
                                                        <h4 class="mb-0">...</h4>
                                                    </div>
                                                </div>
                                                <div class="d-flex me-3 mb-3 ms-2 align-items-start">
                                                    <i class="fa fa-envelope scale-2 me-4 mt-2"></i>
                                                    <div>
                                                        <p style="font-size: 16px;" class="mb-2">ອີເມວ</p>
                                                        <h4 class="mb-0">...</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pb-3 transaction-details d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="me-3 mb-3">
                                                <p style="font-size: 16px;" class="mb-2">ລົງວັນທີ</p>
                                                <h4 class="mb-0">...</h4>
                                            </div>
                                            <div class="me-3 mb-3">
                                                <p class="mb-2 fs-16">ວົງເງິນກູ້ຢຶມ</p>
                                                <h4 class="mb-0">...</h4>
                                            </div>
                                            <div class="me-3 mb-3">
                                                <p class="mb-2 fs-16">ອັດຕາດອກເບ້ຍ</p>
                                                <h4 class="mb-0">...</h4>
                                            </div>
                                            <div class="me-3 mb-3">
                                                <p class="mb-2 fs-16">ດອກເບ້ຍ</p>
                                                <h4 class="mb-0">...</h4>
                                            </div>
                                            <div class="amount-bx mb-3">
                                                <i class="fas fa-dollar-sign"></i>
                                                <div>
                                                    <p class="mb-1 fs-16">ລວມທັງໝົດ</p>
                                                    <h3 class="mb-0">....</h3>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header border-0 pb-0">
                                                <div>
                                                    <h4 class="card-title mb-2">ລາຍງານຂໍ້ມູນຫຍໍ່ການຊຳລະໜີ່ສິນທັງໝົດ</h4>
                                                    <!-- <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span> -->
                                                </div>
                                            </div>
                                            <div class="card-body pt-3">
                                                <p class="description">ທີ່ຜ່ານມາລູກຄ້າໄດ້ມີການຊຳລະໜີ່ສິນທັງໝົດດັ່ງລຸ່ມນີ້:</p>
                                                <ul class="specifics-list">
                                                    <li>
                                                        <span style="height: 50px;" class="bg-blue"></span>
                                                        <div>
                                                            <h4>... ກີບ</h4>
                                                            <span>ເງິນຕົ້ນ</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <span style="height: 50px;" class="bg-orange"></span>
                                                        <div>
                                                            <h4>... ກີບ</h4>
                                                            <span>ດອກເບ້ຍ</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <span style="height: 50px;" class="bg-danger"></span>
                                                        <div>
                                                            <h4>... ກີບ</h4>
                                                            <span>ລວມເງິນຕົ້ນ+ດອກເບ້ຍ</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <span style="height: 50px;" class="bg-primary"></span>
                                                        <div>
                                                            <h4>... ກີບ</h4>
                                                            <span>ຄ່າປັບໄໝ</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">

                                    <div class="card-footer d-flex flex-row-reverse bd-highlight">
                                        <button type="submit" id="submit" name="submit" class="btn me-2 btn-primary submit">ບັນທຶກຂໍ້ມູນ</button>
                                        <button type="reset" class="btn btn-light me-2">ລ້າງຂໍ້ມູນ</button>
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
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
    <!-- Apex Chart -->
    <script src="vendor/apexchart/apexchart.js"></script>

    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>

    <!-- Dashboard 1 -->
    <script src="js/dashboard/my-wallet.js"></script>

    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- <script src="js/db_table.js"></script> -->

    <!-- Chartist 2-->
    <script src="vendor/chartist/js/chartist.min.js"></script>
    <script src="vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <!-- Flot 3 -->
    <script src="vendor/flot/jquery.flot.js"></script>
    <script src="vendor/flot/jquery.flot.pie.js"></script>
    <script src="vendor/flot/jquery.flot.resize.js"></script>
    <script src="vendor/flot-spline/jquery.flot.spline.min.js"></script>

    <!-- Chart sparkline plugin files 4 -->
    <script src="vendor/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="js/plugins-init/sparkline-init.js"></script>

    <!-- Chart piety plugin files 5 -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
    <script src="js/plugins-init/piety-init.js"></script>

    <!-- Init file 6 -->
    <script src="js/plugins-init/widgets-script-init.js"></script>

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
<?php ?>