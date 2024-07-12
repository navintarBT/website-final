<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_satus'] === "ແອັດມິນ") {
    // User is logged in and has the correct user_status, allow access to the page
    // echo $_SESSION['user_id'];
} else {
    // User is not logged in or has incorrect user_status, redirect back to login page
    header("Location: http://localhost/Loan-management-system/login");
    exit();
}

?>

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
    <title>ແບບຟອມບັນທຶກຂໍ້ມູນຜູ້ນຳໃຊ້</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/Font.css" rel="stylesheet">
    <link href="css/customer_form.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

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
            $(".update").click(function() {
                //ຂໍ້ມູນລູກຄ້າ
                var user_id = $(".user_id").val();
                var user_flname = $(".user_flname").val();
                var user_gender = $(".user_gender").val();
                var user_dob = $(".user_dob").val();
                var user_age = $(".user_age").val();
                var user_nationality = $(".user_nationality").val();
                var user_ethnicity = $(".user_ethnicity").val();
                var user_religion = $(".user_religion").val();
                var user_vill = $(".user_vill").val();
                var user_dis = $(".user_dis").val();
                var user_pro = $(".user_pro").val();
                var user_tel = $(".user_tel").val();
                var user_email = $(".user_email").val();
                var user_name = $(".user_name").val();
                var user_satus = $(".user_satus").val();
                var user_password = $(".user_password").val();
                var user_image = $(".user_image")[0].files[0];

                if (user_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດຜູ້ນຳໃຊ້ກ່ອນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_flname == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຊື່ແທ້ ແລະ ນາມສະກຸນຂອງຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_gender == "") {
                    Swal.fire(
                        'ກະລຸນາເລື້ອກເພດກ່ອນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_dob == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນວັນເດືອນປປີເກິດຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_age == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນອາຍຸຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_nationality == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນສັນຊາດຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_ethnicity == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຊົນເຜົ່າຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_religion == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນສາສະໜາຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_vill == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນບ້ານເກີດຂອງຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_dis == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເມືອງເກີດຂອງຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_pro == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນແຂວງເກີດຂອງຜູ້ນຳໃຊ້!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_tel == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເບີໂທຂອງຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_email == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນອີເມວຂອງຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_name == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຊື່ຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_satus == "") {
                    Swal.fire(
                        'ກະລຸນາເລື້ອກສະຖານະຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (user_password == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດຜ່ານຂອງຜູ້ນຳໃຊ້ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                }
            });
        });
    </script>

    <?php
    require_once "config/db_s_and_k_project.php";

    if (isset($_POST['update'])) {

        $id = $_POST['id'];
        echo $id;
        $select_stmt = $conn->prepare('SELECT * FROM users where user_id = :id ');
        $select_stmt->bindParam(":id", $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        $user_flname = $_POST['user_flname'];
        $user_gender = $_POST['user_gender'];
        $user_dob = $_POST['user_dob'];
        $user_age = $_POST['user_age'];
        $user_nationality = $_POST['user_nationality'];
        $user_ethnicity = $_POST['user_ethnicity'];
        $user_religion = $_POST['user_religion'];
        $user_vill = $_POST['user_vill'];
        $user_dis = $_POST['user_dis'];
        $user_pro = $_POST['user_pro'];
        $user_tel = $_POST['user_tel'];
        $user_email = $_POST['user_email'];
        $user_name = $_POST['user_name'];
        $user_satus = $_POST['user_satus'];
        $user_password = $_POST['user_password'];
        $user_date_in = $_POST['user_date_in'];
        $user_time_in = $_POST['user_time_in'];
        $user_image = $_FILES['user_image'];

        $user_image2 = $_POST['user_image2'];
        $upload_image = $_FILES['user_image']['name'];
        $user_path = "../user_images/";
        if ($upload_image != "") {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode(".", $user_image['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;
            $filePath = "../user_images/" . $fileNew;

            if (in_array($fileActExt, $allow)) {
                if ($user_image['size'] > 0 && $user_image['error'] == 0) {
                    $remove = move_uploaded_file($user_image['tmp_name'], $filePath);
                    if ($remove) {
                        unlink($user_path . $row['user_image']);
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
                                            title: 'ອັບໂຫຼດຮູບພາບເຂົ້າລະບົບບໍ່ໄດ້',
                                            text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                            icon: 'error',
                                            showConfirmButton: true
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
                                        title: 'ບໍ່ມີຮູບພາບ',
                                        text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                        icon: 'error',
                                        showConfirmButton: true
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
                                    title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ',
                                    text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                    icon: 'error',
                                    showConfirmButton: true
                                });
                            })
                        })
                    </script>";
            }
        } else {
            $fileNew = $user_image2;
        }

        $sql = $conn->prepare("UPDATE users SET 
            user_flname = :user_flname,
            user_gender = :user_gender,
            user_dob = :user_dob,
            user_age = :user_age,
            user_nationality = :user_nationality,
            user_ethnicity = :user_ethnicity,
            user_religion = :user_religion,
            user_vill = :user_vill,
            user_dis = :user_dis,
            user_pro = :user_pro,
            user_tel = :user_tel,
            user_email = :user_email,
            user_name = :user_name,
            user_satus = :user_satus,
            user_password = :user_password,
            user_image = :user_image,
            user_date_in = :user_date_in,
            user_time_in = :user_time_in WHERE user_id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":user_flname", $user_flname);
        $sql->bindParam(":user_gender", $user_gender);
        $sql->bindParam(":user_dob", $user_dob);
        $sql->bindParam(":user_age", $user_age);
        $sql->bindParam(":user_nationality", $user_nationality);
        $sql->bindParam(":user_ethnicity", $user_ethnicity);
        $sql->bindParam(":user_religion", $user_religion);
        $sql->bindParam(":user_vill", $user_vill);
        $sql->bindParam(":user_dis", $user_dis);
        $sql->bindParam(":user_pro", $user_pro);
        $sql->bindParam(":user_tel", $user_tel);
        $sql->bindParam(":user_email", $user_email);
        $sql->bindParam(":user_name", $user_name);
        $sql->bindParam(":user_satus", $user_satus);
        $sql->bindParam(":user_password", $user_password);
        $sql->bindParam(":user_image", $fileNew);
        $sql->bindParam(":user_date_in", $user_date_in);
        $sql->bindParam(":user_time_in", $user_time_in);
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
                                                document.location.href = 'customer_select_history.php';
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
    } else {
        echo "Not isset";
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
            Nav header start
        ***********************************-->
        <!--**********************************
            Nav header end
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
                                                <a href="user_select.php" class="btn btn-warning me-2">ຍົກເລີ້ກ</a>
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
                                                                    <h6 class="mb-0">Youtube, a video-sharing website,
                                                                        goes live <strong class="text-primary">$500</strong>.</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge info">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                                    <span>20 minutes ago</span>
                                                                    <h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
                                                                    <p class="mb-0">Quisque a consequat ante Sit amet
                                                                        magna at volutapt...</p>
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
                                                                    <h6 class="mb-0">StumbleUpon is acquired by eBay.
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge warning">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                                    <span>20 minutes ago</span>
                                                                    <h6 class="mb-0">Mashable, a news website and blog,
                                                                        goes live.</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge dark">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                                    <span>20 minutes ago</span>
                                                                    <h6 class="mb-0">Mashable, a news website and blog,
                                                                        goes live.</h6>
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
                                                                        <small class="d-block">29 July 2020 - 02:26
                                                                            PM</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-panel">
                                                                    <div class="media me-2 media-info">
                                                                        KG
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="mb-1">Resport created successfully
                                                                        </h6>
                                                                        <small class="d-block">29 July 2020 - 02:26
                                                                            PM</small>
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
                                                                        <small class="d-block">29 July 2020 - 02:26
                                                                            PM</small>
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
                                                                        <small class="d-block">29 July 2020 - 02:26
                                                                            PM</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-panel">
                                                                    <div class="media me-2 media-danger">
                                                                        KG
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="mb-1">Resport created successfully
                                                                        </h6>
                                                                        <small class="d-block">29 July 2020 - 02:26
                                                                            PM</small>
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
                                                                        <small class="d-block">29 July 2020 - 02:26
                                                                            PM</small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="all-notification" href="javascript:void(0);">See all
                                                        notifications <i class="ti-arrow-end"></i></a>
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
                                <li class="breadcrumb-item"><a href="customer_select_offer.php" class="text-danger">ກັບຄືນ</a></li>
                                <li class="breadcrumb-item active"><a href="">ຂໍ້ມູນລູກຄ້າ</a></li>
                                <li class="breadcrumb-item active"><a href="customer_select_offer.php">ລາຍງານຂໍ້ມູນສະເໜີຂໍກູ້ຢຶມເງິນ</a></li>
                                <li class="breadcrumb-item"><a href="">ແກ້ໄຂຂໍ້ມູນລູກຄ້າ</a></li>
                            </ol>

                        </div>
                        <!-- row -->

                        <?php
                        require_once "config/db_s_and_k_project.php";
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $stmt = $conn->query("SELECT * FROM users WHERE user_id = '$id' ");
                            $stmt->execute();
                            $data = $stmt->fetch();
                        }
                        ?>
                        <div class=" row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ຂໍ້ມູນເອກະສານຢືນຢັນຕົວຕົນ</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-validation">

                                            <div class="row">
                                                <div class="col-xl-3">

                                                    <div class="mb-1">
                                                        <label class="form-label" for="validationCustom01">ຮູບໂປຣຟາຍ</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="file-upload">
                                                            <div style="height: 340px; margin-top: 0px;" class="image-upload-wrap">
                                                                <input class="file-upload-input user_image" name="user_image" type='file' onchange="readURL(this);" accept="image/*" required="" />
                                                                <div class="drag-text">
                                                                    <h3><img style="margin-top: -2.8rem;" src="../user_images/<?php echo $data['user_image'] ?>" height="300" while="300" alt=""></h3>
                                                                </div>
                                                            </div>
                                                            <div class="file-upload-content">
                                                                <img class="file-upload-image" src="#" alt="your image" />
                                                                <div class="image-title-wrap">
                                                                    <button style="font-size: 12px;" type="button" onclick="removeUpload()" class="remove-image">ລົບ:<span class="image-title">Uploaded
                                                                            Image</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-xl-3">
                                                    <input type="hidden" class="form-control user_id" name="id" id="validationCustom06" value="<?php echo $data['user_id'] ?>" required="">
                                                    <input type="hidden" class="form-control user_image2" name="user_image2" id="validationCustom06" value="<?php echo $data['user_image']  ?>" required="">
                                                    <input type="hidden" class="form-control user_date_in" name="user_date_in" id="validationCustom06" value="<?php echo $data['user_date_in']  ?>" required="">
                                                    <input type="hidden" class="form-control user_time_in" name="user_time_in" id="validationCustom06" value="<?php echo $data['user_time_in']  ?>" required="">
                                                    <label class="col-form-label" for="validationCustom06">ຊື່ ແລະ
                                                        ນາມສະກຸນ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_flname" name="user_flname" value="<?php echo $data['user_flname'] ?>" id="validationCustom06" placeholder="ຊື່ ແລະ ນາມສະກຸນ..." required="">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ເພດ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                            </svg></span>
                                                        <select class="form-control form-select user_gender" aria-label="Default select example" id="user_gender" required="" name="user_gender">
                                                            <option value="">ເລື້ອກ</option>
                                                            <option value="ເພດຍິງ" <?php if ($data['user_gender'] == "ເພດຍິງ")
                                                                                        echo 'selected="selected"'; ?>>ເພດຍິງ</option>
                                                            <option value="ເພດຊາຍ" <?php if ($data['user_gender'] == "ເພດຊາຍ")
                                                                                        echo 'selected="selected"'; ?>>ເພດຊາຍ</option>
                                                        </select>

                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ວັນເດືອນປີເກິດ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="date" class="form-control user_dob" name="user_dob" id="validationCustom06" placeholder="ເພດ..." required="" value="<?php echo $data['user_dob'] ?>">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ອາຍຸ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_age" name="user_age" id="validationCustom06" placeholder="ອາຍຸ..." required="" value="<?php echo $data['user_age'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">

                                                    <label class="col-form-label" for="validationCustom06">ສັນຊາດ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_nationality" name="user_nationality" id="validationCustom06" placeholder="ສັນລາວ..." required="" value="<?php echo $data['user_nationality'] ?>">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ຊົນເຜົ່າ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_ethnicity" name="user_ethnicity" id="validationCustom06" placeholder="ຊົນເຜົ່າ..." required="" value="<?php echo $data['user_ethnicity'] ?>">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ສາສະໜາ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_religion" name="user_religion" id="validationCustom06" placeholder="ສາສະໜາ..." required="" value="<?php echo $data['user_religion'] ?>">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ບ້ານຢູ່ປັດຈຸບັນ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_vill" name="user_vill" id="validationCustom06" placeholder="ບ້ານຢູ່ປັດຈຸບັນ..." required="" value="<?php echo $data['user_vill'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <label class="col-form-label" for="validationCustom06">ເມືອງ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_dis" name="user_dis" id="validationCustom06" placeholder="ເມືອງ..." required="" value="<?php echo $data['user_dis'] ?>">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ແຂວງ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_pro" name="user_pro" id="validationCustom06" placeholder="ບ້ານ..." required="" value="<?php echo $data['user_pro'] ?>">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ເບີໂທ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_tel" name="user_tel" id="validationCustom06" placeholder="ເບີໂທ..." required="" value="<?php echo $data['user_tel'] ?>">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ອີເມວ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                        <input type="text" class="form-control user_email" name="user_email" id="validationCustom06" placeholder="ອີເມວ..." required="" value="<?php echo $data['user_email'] ?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-1 row">
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ຊື່ຜູ້ນຳໃຊ້
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control user_name" name="user_name" id="validationCustom06" placeholder="ຊື່ຜູ້ນຳໃຊ້..." required="" value="<?php echo $data['user_name'] ?>">
                                                        </div>

                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ສະຖານະ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                                </svg></span>
                                                            <select class="form-control form-select user_satus" aria-label="Default select example" id="cus_date_of_loan" name="user_satus" required>
                                                                <option value="">ເລື້ອກ</option>
                                                                <option value="ແອັດມິນ" <?php echo $data['user_satus'] == 'ແອັດມິນ' ? 'selected' : ''; ?>>ແອັດມິນ</option>
                                                                <option value="ອຳນວຍການ" <?php echo $data['user_satus'] == 'ອຳນວຍການ' ? 'selected' : ''; ?>>ອຳນວຍການ</option>
                                                                <option value="ສິນເຊື່ອ" <?php echo $data['user_satus'] == 'ສິນເຊື່ອ' ? 'selected' : ''; ?>>ສິນເຊື່ອ</option>
                                                                <option value="ການເງິນ" <?php echo $data['user_satus'] == 'ການເງິນ' ? 'selected' : ''; ?>>ການເງິນ</option>
                                                                <option value="ເຄົາເຕີ" <?php echo $data['user_satus'] == 'ເຄົາເຕີ' ? 'selected' : ''; ?>>ເຄົາເຕີ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດຜ່ານ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="number" class="form-control user_password" name="user_password" id="validationCustom06" placeholder="ລະຫັດຜ່ານ..." required="" value="<?php echo $data['user_password'] ?>">
                                                        </div>

                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ຢືນຢັນລະຫັດຜ່ານ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="number" class="form-control user_passwords" name="user_passwords" id="validationCustom06" placeholder="ຢືນຢັນລະຫັດຜ່ານ..." required="" value="<?php echo $data['user_password'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>

        </form>
    </div>

    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->

    <!--**********************************
            Sidebar end
        ***********************************-->
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
                        console.log(stopPropagation);
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
<?php
?>