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
    <title>ລາຍງານຂໍ້ມູນເພີ່ມເຕີມຂອງລູກ</title>

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

    <?php

    require_once "config/db_s_and_k_project.php";

    if (isset($_REQUEST['delete'])) {
        $id = $_REQUEST['delete'];

        $select_stmt = $conn->prepare('SELECT * FROM customers WHERE cus_id = :id');
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        unlink("photo_id/" . $row['cus_image']);
        unlink("docs/" . $row['cus_doc']);

        $delete_stmt = $conn->prepare('DELETE FROM customers WHERE cus_id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();
    }
    ?>

</head>

<body>
    <?php
    require_once "config/conect_nal.php";

    $sql_count_cus_id = mysqli_query($conns, "select count(cus_id) from customers");
    $show_count_cus_id = mysqli_fetch_array($sql_count_cus_id);

    $sql_count_cus_status0 = mysqli_query($conns, "select count(cus_id) from customers where cus_status = 0");
    $show_count_cus_status0 = mysqli_fetch_array($sql_count_cus_status0);

    $sql_count_cus_status1 = mysqli_query($conns, "select count(cus_id) from customers where cus_status = 1");
    $show_count_cus_status1 = mysqli_fetch_array($sql_count_cus_status1);

    $sql_count_cus_status2 = mysqli_query($conns, "select count(cus_id) from customers where cus_status = 2");
    $show_count_cus_status2 = mysqli_fetch_array($sql_count_cus_status2);

    $sql_count_cus_date_in = mysqli_query($conns, "select count(cus_id) from customers where cus_date_in = curdate()");
    $show_count_cus_date_in = mysqli_fetch_array($sql_count_cus_date_in);

    $sql_count_cus_date_in_week = mysqli_query($conns, "select count(cus_id) from customers where week(cus_date_in)=week(curdate()) and year(cus_date_in)=year(curdate())");
    $show_count_cus_date_in_week = mysqli_fetch_array($sql_count_cus_date_in_week);

    $sql_count_cus_date_in_month = mysqli_query($conns, "select count(cus_id) from customers where month(cus_date_in)=month(curdate()) and year(cus_date_in)=year(curdate())");
    $show_count_cus_date_in_month = mysqli_fetch_array($sql_count_cus_date_in_month);

    $sql_count_cus_date_in_year = mysqli_query($conns, "select count(cus_id) from customers where year(cus_date_in)=year(curdate()) and year(cus_date_in)=year(curdate())");
    $show_count_cus_date_in_year = mysqli_fetch_array($sql_count_cus_date_in_year);
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
                                ລາຍງານຂໍ້ມູນເພີ່ມເຕີມຂອງລູກ
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
        <div class="content-body ">
            <div class="container-fluid">

                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"></a>ຂໍ້ມູນລູກຄ້າ</li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">ລາຍງານຂໍ້ມູນສະເໜີຂໍກູ້ຢຶມເງິນ</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">ລາຍງານຂໍ້ມູນເພີ່ມເຕີມຂອງລູກ</a></li>
                    </ol>
                </div>
                <!-- row -->
                <form action="" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM customers WHERE cus_id = $id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                    }
                    ?>
                    <div class=" row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ຂໍ້ມູນເອກະສານຢືນຢັນຕົວຕົນ</h4>
                                    <div style="display: flex;" class="date">
                                        <h4 class="card-title">ວັນທີບັນທຶກຂໍ້ມູນ : </h4>
                                        <h4 class="card-title">&nbsp;&nbsp;&nbsp;<?= $data['cus_date_in']; ?></h4>
                                        <h4 class="card-title">&nbsp;&nbsp;&nbsp;<?= $data['cus_time_in']; ?></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-validation">

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-8">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ບັດປະຈຳຕົວ</label>
                                                            <span class="text-danger">*</span>
                                                            <div class="file-upload">
                                                                <div style="height: 340px; margin-top: 0px;" class="image-upload-wrap">
                                                                    <input class="file-upload-input cus_image" name="cus_image" type='file' onchange="readURL(this);" accept="image/*" />
                                                                    <div class="drag-text">
                                                                        <h3><img style="margin-top: -4rem; margin-left: -2rem;" src="photo_id/<?php echo $data['cus_image']; ?>" height="350" while="350" alt=""></h3>
                                                                    </div>
                                                                </div>
                                                                <div class="file-upload-content">
                                                                    <img class="file-upload-image" src="#" alt="your image" />
                                                                    <div class="image-title-wrap">
                                                                        <button style="font-size: 12px;" type="button" onclick="removeUpload()" class="remove-image">ລົບ:<span class="image-title">Uploaded Image</span></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="mb-1 row">
                                                    <div class="col-xl-6">
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດລູກຄ້າ :
                                                        </label>
                                                        <input type="hidden" value="<?= $data['cus_id']; ?>" required class="form-control cus_id" name="id">
                                                        <div class="input-group">
                                                            <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" class="form-control cus_runing" name="cus_runing" id="validationCustom06" placeholder="" value="<?= $data['cus_runing']; ?>" required="">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດບັດປະຈຳຕົວ :
                                                        </label>
                                                        <div class="input-group">
                                                            <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_national_id']; ?>" class="form-control cus_national_id" id="validationCustom02" placeholder="0" required value="" name="cus_national_id">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ວັດໝົດອາຍຸບັດປະຈຳຕົວ :

                                                        </label>
                                                        <div class="input-group">

                                                            <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_national_id_expiry_date']; ?>" class="form-control cus_national_id_expiry_date" id="validationCustom01" placeholder="0" required="" value="" name="cus_national_id_expiry_date">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດໜັງສືເດິນທາງ :
                                                        </label>
                                                        <div class="input-group">
                                                            <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_passprot_number']; ?>" class="form-control cus_passprot_number" id="validationCustom02" placeholder="..." value="" name="cus_passprot_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label class="col-form-label" for="validationCustom06">ວັດໝົດອາຍຸໜັງສືເດິນທາງ :

                                                        </label>
                                                        <div class="input-group">
                                                            <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_passprot_expiry_date']; ?>" class="form-control cus_passprot_expiry_date" id="validationCustom01" placeholder="..." value="" name="cus_passprot_expiry_date">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດປຶ້ມສຳມະໂນຄົວ :

                                                        </label>
                                                        <div class="input-group">
                                                            <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_familybook_id']; ?>" class="form-control cus_familybook_id" id="validationCustom02" placeholder="..." value="" name="cus_familybook_id">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດແຂວງອອກປື້ມສຳມະໂນຄົວ :

                                                        </label>
                                                        <div class="input-group">

                                                            <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_familybook_pv_code']; ?>" class="form-control cus_familybook_pv_code" id="validationCustom01" placeholder="..." value="" name="cus_familybook_pv_code">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ວັນທີອອກປຶ້ມສຳມະໂນຄົວ :

                                                        </label>
                                                        <div class="input-group">

                                                            <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_familybook_issue_date']; ?>" class="form-control cus_familybook_issue_date" id="validationCustom01" placeholder="" name="cus_familybook_issue_date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ຂໍ້ມູນບຸກຄົນ</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-1 row">
                                                <div class="col-xl-6">
                                                    <label class="col-form-label" for="validationCustom06">ຊື່ ແລະ ນາມສະກຸນ :

                                                    </label>
                                                    <div class="input-group">
                                                        <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_fname']; ?>" class="form-control cus_fname" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="cus_fname">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <label class="col-form-label" for="validationCustom06">ວັນເດືອນປີເກິດ :

                                                            </label>
                                                            <div class="input-group">
                                                                <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_dob']; ?>" class="form-control cus_dob" id="validationCustom01" placeholder="ປ້ອນຊື່ແທ້ ພາສາອັງກິດ..." required="" name="cus_dob">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="col-form-label" for="validationCustom06">ອາຍຸ :

                                                            </label>
                                                            <div class="input-group">
                                                                <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" class="form-control cus_age" value="<?= $data['cus_age'];  ?> ປິ " id="validationCustom01" placeholder="ປ້ອນອາຍຸ..." required="" name="cus_age">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ບ້ານຢູ່ປັດຈຸບັນ :

                                                    </label>
                                                    <div class="input-group">
                                                        <input style="border: none; margin-left: -1.3rem;font-size: 18px" type="text" value="<?= $data['cus_vill']; ?>" class="form-control cus_vill" id="validationCustom01" placeholder="ບ້ານ..." required="" name="cus_vill">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ເມືອງ :
                                                    </label>
                                                    <div class="input-group">
                                                        <input style="border: none; margin-left: -1.3rem;font-size: 18px" type="text" value="<?= $data['cus_dis']; ?>" class="form-control cus_dis" id="validationCustom01" placeholder="ເມືອງ..." required="" name="cus_dis">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label class="col-form-label" for="validationCustom06">ແຂວງ :

                                                    </label>
                                                    <div class="input-group">
                                                        <input style="border: none; margin-left: -1.3rem;font-size: 18px" type="text" value="<?= $data['cus_pro']; ?>" class="form-control cus_pro" id="validationCustom01" placeholder="ແຂວງ..." required="" name="cus_pro">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ເບີໂທ :

                                                    </label>
                                                    <div class="input-group">
                                                        <input style="border: none; margin-left: -1.3rem;font-size: 18px" type="text" value="<?= $data['cus_tel_phone']; ?>" class="form-control cus_tel_phone" id="validationCustom01" placeholder="ປ້ອນເບີໂທ..." required="" value="" name="cus_tel_phone">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ອີເມວ :
                                                    </label>
                                                    <div class="input-group">
                                                        <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_email']; ?>" class="form-control cus_email" id="validationCustom01" placeholder="...@gmail.com" name="cus_email">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="col-form-label" for="validationCustom06">ເຊື່ອຊາດ :

                                                            </label>
                                                            <div class="input-group">

                                                                <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" class="form-control cus_nationality" value="<?= $data['cus_nationality']; ?>" id="validationCustom01" placeholder="ປ້ອນເຊື່ອຊາດ..." name="cus_nationality">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="col-form-label" for="validationCustom06">ອາຊີບ :
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" class="form-control cus_job" value="<?= $data['cus_job']; ?>" id="validationCustom01" placeholder="ອາຊີບ..." name="cus_job">
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ຈຸດປະສົງໃນການກູ້ຢຶມເງິນ</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-1 row">
                                                <div class="col-xl-6">
                                                    <label class="col-form-label" for="validationCustom06">ຈຸດປະສົງໃນການກູ້ຢຶມເງິນເພື່ອ :

                                                    </label>
                                                    <div class="input-group">

                                                        <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_purpose_money']; ?>" class="form-control cus_purpose_money" id="validationCustom01" placeholder="ປ້ອນຈຸດປະສົງໃນການກູ້ຢຶມເງິນເພື່ອ..." name="cus_purpose_money" required>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ຈຳນວນເງິນສະເໜີຂໍ້ກູ້ຢຶມ :

                                                    </label>
                                                    <div class="input-group">

                                                        <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?php echo number_format($data['cus_qty_money']); ?> ກີບ" class="form-control cus_qty_money" id="cus_qty_money" placeholder="ປ້ອນຈຳນວນເງິນ..." name="cus_qty_money" aria-describedby="inputGroupPrepend" required>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ກຳນົດເວລາ

                                                    </label>
                                                    <div class="input-group">
                                                        <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?php echo number_format($data['cus_date_of_loan']); ?> ເດືອນ" class="form-control cus_qty_money" id="cus_qty_money" placeholder="ປ້ອນຈຳນວນເງິນ..." name="cus_qty_money" aria-describedby="inputGroupPrepend" required>

                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ຊັບສົມບັດຄ້ຳປະກັນ :
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?php echo $data['cus_collateral_assets']; ?>" class="form-control cus_qty_money" id="cus_qty_money" placeholder="ປ້ອນຈຳນວນເງິນ..." name="cus_qty_money" aria-describedby="inputGroupPrepend" required>

                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label class="col-form-label" for="validationCustom06">ແຫຼ່ງລາຍຮັບປະຈຳທີ່ຈະມາຊຳລະໜີ່ :

                                                    </label>
                                                    <div class="input-group">

                                                        <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_regular_money']; ?>" class="form-control cus_regular_money" id="validationCustom01" placeholder="ປ້ອນຈຸດປະສົງໃນການກູ້ຢຶມເງິນເພື່ອ..." name="cus_regular_money" required>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ຮູບແບບການຊຳລະ :

                                                    </label>
                                                    <div class="input-group">
                                                        <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_funding']; ?>" class="form-control cus_regular_money" id="validationCustom01" placeholder="ປ້ອນຈຸດປະສົງໃນການກູ້ຢຶມເງິນເພື່ອ..." name="cus_regular_money" required>

                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ປະຫວັດການກູ້ຢຶມທີ່ຜ່ານມາ ຫຼື ປະຫວັດທຸລະກິດ :

                                                    </label>
                                                    <div class="input-group">

                                                        <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?= $data['cus_laugh_data']; ?>" class="form-control cus_laugh_data" id="validationCustom01" placeholder="ປ້ອນປະຫວັດການກູ້ຢຶມທີ່ຜ່ານມາ, ຄວາມເປັນມາຕ່າງໆ ຫຼື ປະຫວັດທຸລະກິ..." name="cus_laugh_data">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ຂໍ້ມູນລາຍຮັບ - ລາຍຈ່າຍ</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-validation">

                                        <div class="row">
                                            <div style="margin-top: -2rem;" class="col-6">
                                                <center>
                                                    <h4 class="text-success">ລາຍຮັບ</h2>
                                                </center>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ເງິນເດືອນປະຈຳ (ຜົວ-ເມຍ) :</label>
                                                            <div class="input-group">

                                                                <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?php echo number_format($data['cus_income_salary']); ?> ກີບ" class="form-control income" id="income" placeholder="00.0" name="cus_income_salary" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຮັບຈາກສະມາຊິກຄອບຄົວ :</label>
                                                            <div class="input-group">
                                                                <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?php echo number_format($data['cus_income_famiry']); ?> ກີບ" class="form-control income" id="income" placeholder="00.0" name="cus_income_salary" aria-describedby="inputGroupPrepend">

                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຮັບຈາກການຄ້າຂາຍ :</label>
                                                            <div class="input-group">

                                                                <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?php echo number_format($data['cus_income_trading']); ?> ກີບ" class="form-control income" id="income" placeholder="00.0" name="cus_income_salary" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຮັບຈາກການໃຫ້ເຊົ່າ :</label>
                                                            <div class="input-group">
                                                                <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?php echo number_format($data['cus_income_rental']); ?> ກີບ" class="form-control income" id="income" placeholder="00.0" name="cus_income_salary" aria-describedby="inputGroupPrepend">

                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຮັບພິເສດອື່ນໆ :</label>
                                                            <div class="input-group">
                                                                <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?php echo number_format($data['cus_special_income']); ?> ກີບ" class="form-control income" id="income" placeholder="00.0" name="cus_income_salary" aria-describedby="inputGroupPrepend">

                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລວມລາຍຮັບ :</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px;" type="hidden" value="<?php echo $data['cus_total_income']; ?>" class="form-control text-success cus_total_income" id="cus_total_income" placeholder="00.0" name="cus_total_income" aria-describedby="inputGroupPrepend" required>
                                                            </div>
                                                            <input style="border: none; margin-left: -1.3rem; font-size: 18px" type="text" value="<?php echo number_format($data['cus_total_income']); ?> ກີບ" class="form-control text-success income" id="income" placeholder="00.0" name="cus_income_salary" aria-describedby="inputGroupPrepend">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div style="margin-top: -2rem;" class="col-6">
                                                <center>
                                                    <h4 class="text-danger">ລາຍຈ່າຍ</h2>
                                                </center>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍໃນການລົງທຶນຄ້າຂາຍ :</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px;  margin-left: -1.3rem;" type="text" value=" <?php echo number_format($data['cus_expenditure_invest']); ?> ກີບ" class="form-control cus_total_income0" id="cus_total_income0" placeholder="00.0" name="cus_total_income0" aria-describedby="inputGroupPrepend" required disabled>

                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍຄ່າເຊົ່າເຮືອນ :</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px; margin-left: -1.3rem;" type="text" value=" <?php echo number_format($data['cus_expenditure_house_rent']); ?> ກີບ" class="form-control cus_total_income0" id="cus_total_income0" placeholder="00.0" name="cus_total_income0" aria-describedby="inputGroupPrepend" required disabled>

                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍປົກກະຕິໃນຄົວເຮືອນ :</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px; margin-left: -1.3rem;" type="text" value=" <?php echo number_format($data['cus_expenditure_normal']); ?> ກີບ" class="form-control cus_total_income0" id="cus_total_income0" placeholder="00.0" name="cus_total_income0" aria-describedby="inputGroupPrepend" required disabled>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍໜີ່ສິນອື່ນໆ :</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px; margin-left: -1.3rem;" type="text" value=" <?php echo number_format($data['cus_expenditure_debt']); ?> ກີບ" class="form-control cus_total_income0" id="cus_total_income0" placeholder="00.0" name="cus_total_income0" aria-describedby="inputGroupPrepend" required disabled>

                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍອື່ນໆ :</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px; margin-left: -1.3rem;" type="text" value=" <?php echo number_format($data['cus_expenditure_other']); ?> ກີບ" class="form-control cus_total_income0" id="cus_total_income0" placeholder="00.0" name="cus_total_income0" aria-describedby="inputGroupPrepend" required disabled>

                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລວມລາຍຈ່າຍ</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px; " type="hidden" value="<?php echo $data['cus_total_expenses']; ?>" class="form-control text-danger cus_total_expenses" id="cus_total_expenses" placeholder="00.0" name="cus_total_expenses" aria-describedby="inputGroupPrepend" required>
                                                            </div>
                                                            <input style="border: none; font-size: 18px; margin-left: -1.3rem;" type="text" value="<?php echo number_format($data['cus_total_expenses']); ?> ກີບ" class="form-control text-danger cus_total_expenses0" id="cus_total_expenses0" placeholder="00.0" name="cus_total_expenses0" aria-describedby="inputGroupPrepend" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="mb-1">
                                                            <label class="form-label text-success" for="validationCustom01">ເປີເຊັນຂອງເງິນທີ່ຍັງເຫຼືອ:</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px; margin-left: -1.3rem;" type="text" value="<?php echo $data['percentage_income']; ?>" class="form-control text-success percentage_income" id="percentage_income" placeholder="0.00" name="percentage_income" aria-describedby="inputGroupPrepend" readonly required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-1">
                                                            <label class="form-label text-danger" for="validationCustom01">ເປີເຊັນຂອງລາຍຈ່າຍ:</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px; margin-left: -1.3rem;" type="text" value="<?php echo $data['percentage_expenses']; ?>" class="form-control text-danger percentage_expenses" id="percentage_expenses" placeholder="0.00" name="percentage_expenses" aria-describedby="inputGroupPrepend" readonly required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="mb-1">
                                                            <label class="form-label text-info" for="validationCustom01">ຜົນໄດ້ຮັບຕົວຈິງ:</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px;" type="hidden" value="<?php echo $data['cus_amount_income']; ?>" class="form-control text-info cus_amount_income" id="cus_amount_income" placeholder="0.00" name="cus_amount_income" aria-describedby="inputGroupPrepend" readonly required>

                                                                <input style="border: none; font-size: 18px; margin-left: -1.3rem;" type="text" value="<?php echo number_format($data['cus_amount_income']); ?> ກີບ" class="form-control text-info cus_amount_income0" id="cus_amount_income0" placeholder="0.00" name="cus_amount_income0" aria-describedby="inputGroupPrepend" readonly required>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ເອກະສານ</h4>
                                </div>
                                <div class="card-body">
                                    <label class="col-form-label" for="validationCustom06">ຊື່ເອກະສານ

                                    </label>
                                    <div class="input-group">

                                        <input style="border: none; font-size: 18px; margin-left: -1.3rem;" type="text" class="form-control" value="<?php echo $data['cus_doc_name']; ?>" name="doc_name" id="validationCustom01" placeholder="ປ້ອນຊື່ເອກະສານ...">
                                    </div>
                                    <label class="col-form-label" for="validationCustom06">ເອກະສານສະເໜີຂໍ້ກູ້ຢືມເງິນ
                                    </label>
                                    <a href="docs/<?php echo $data['cus_doc']; ?>">
                                        <p style="font-size: 18px;"><?php echo $data['cus_doc']; ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
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


    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="js/db_table.js"></script>

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
    <script src="js/image.js"></script>

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
    <script>
        $(".delete-btn").click(function(e) {
            var userId = $(this).data('cus_id');
            e.preventDefault();
            deleteConfirm(userId);
        })

        function deleteConfirm(userId) {
            Swal.fire({
                title: 'ທ່ານຕ້ອງການລົບຂໍ້ມູນມູນບໍ່?',
                icon: 'question',
                text: "ກາລຸນາກົດ ຕົກລົງ ເພື່ອລົບຂໍ້ມູນ",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ລົບຂໍ່ມູນ',
                cancelButtonText: 'ຍົກເລີກ',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: 'customer_select_history.php',
                                type: 'GET',
                                data: 'delete=' + userId,
                            })
                            .done(function() {
                                Swal.fire({
                                    title: 'ລົບສຳເລັດ',
                                    text: 'ລົບຂໍ້ມູນສຳເລັດ ກົດ ຕົກລົງເພື່ອດຳເນີນການຕໍ່',
                                    icon: 'success',
                                }).then(() => {
                                    document.location.href = 'customer_select_history.php';
                                })
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                                window.location.reload();
                            });
                    });
                },
            });
        }
    </script>
</body>

</html>