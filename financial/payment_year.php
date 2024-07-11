
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_satus'] !== "ການເງິນ") {
    // User is not logged in or has incorrect user status, redirect back to login 	page
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
    <title>ລາຍງານຂໍ້ມູນການຊຳລະຄ່າງວດພາຍໃນປີນີ້</title>

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

    <?php
    require_once "config/db_s_and_k_project.php";

    if (isset($_REQUEST['delete'])) {
        $id = $_REQUEST['delete'];

        $select_stmt = $conn->prepare('SELECT * FROM collateral_land WHERE la_id = :id');
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        $delete_stmt = $conn->prepare('DELETE FROM collateral_land WHERE la_id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        unlink("collateral_docs/" . $row['la_doc_file']);

        unlink("collateral_map/" . $row['la_map0']);
        unlink("collateral_map/" . $row['la_map1']);

        unlink("collateral_images/" . $row['la_image0']);
        unlink("collateral_images/" . $row['la_image1']);
        unlink("collateral_images/" . $row['la_image2']);
        unlink("collateral_images/" . $row['la_image3']);
    }
    ?>

</head>

<body>
    <?php
    require_once "config/conect_nal.php";

    $sql_count_cus_date_in = mysqli_query($conns, "select count(pm_id) from payment where pm_date_in = curdate()");
    $show_count_cus_date_in = mysqli_fetch_array($sql_count_cus_date_in);

    $sql_count_cus_date_in_week = mysqli_query($conns, "select count(pm_id) from payment where week(pm_date_in)=week(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_cus_date_in_week = mysqli_fetch_array($sql_count_cus_date_in_week);

    $sql_count_cus_date_in_month = mysqli_query($conns, "select count(pm_id) from payment where month(pm_date_in)=month(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_cus_date_in_month = mysqli_fetch_array($sql_count_cus_date_in_month);

    $sql_count_cus_date_in_year = mysqli_query($conns, "select count(pm_id) from payment where year(pm_date_in)=year(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_cus_date_in_year = mysqli_fetch_array($sql_count_cus_date_in_year);


    $sql_sum_pm_pcp_itr = mysqli_query($conns, "select sum(pm_pcp_itr) from payment where pm_date_in = curdate()");
    $show_sum_pm_pcp_itr = mysqli_fetch_array($sql_sum_pm_pcp_itr);

    $sql_sum_pm_pcp_itr_week = mysqli_query($conns, "select sum(pm_pcp_itr) from payment where week(pm_date_in)=week(curdate()) and year(pm_date_in)=year(curdate())");
    $show_sum_pm_pcp_itr_week = mysqli_fetch_array($sql_sum_pm_pcp_itr_week);

    $sql_count_pm_pcp_itr_month = mysqli_query($conns, "select sum(pm_pcp_itr) from payment where month(pm_date_in)=month(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_pm_pcp_itr_month = mysqli_fetch_array($sql_count_pm_pcp_itr_month);

    $sql_count_pm_pcp_itr_year = mysqli_query($conns, "select sum(pm_pcp_itr) from payment where year(pm_date_in)=year(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_pm_pcp_itr_year = mysqli_fetch_array($sql_count_pm_pcp_itr_year);


    $sql_sum_pm_id = mysqli_query($conns, "select count(pm_id) from payment");
    $show_sum_pm_id = mysqli_fetch_array($sql_sum_pm_id);


    $sql_sum_pm_pcp_itrd = mysqli_query($conns, "select sum(pm_pcp_itr) from payment");
    $show_sum_pm_pcp_itrs = mysqli_fetch_array($sql_sum_pm_pcp_itrd);
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
                                    ລາຍງານຂໍ້ມູນການຊຳລະຄ່າງວດພາຍໃນປີນີ້
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
                   
                   
                    <li><a class="has-arrow ai-icon" class="ai-icon" aria-expanded="false">
                            <i style="font-size: 30px;" class="bi bi-cash-stack"></i>
                            <span style="font-size: 16px;"class="nav-text">ຈັດການຂໍ້ມູນໜີ້ສິນ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="debt_select.php">ບັນທຶກຂໍ້ມູນໜີ້ສິນ</a></li>
                            <li><a style="font-size: 16px;" href="debt_select.php">ລາຍງານຂໍ້ມູນໜີ້ສິນ</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i style="font-size: 30px;" class="bi bi-box-arrow-left"></i>
                            <span style="font-size: 16px;"class="nav-text">ຈັດການຂໍ້ມູນການຈ່າຍຄ່າງວດ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="payment_insert.php">ບັນທຶກຂໍ້ມູນການຈ່າຍຄ່າງວດ</a></li>
                            <li><a style="font-size: 16px;" href="payment_select.php">ລາຍງານຂໍ້ມູນການຈ່າຍຄ່າງວດ</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i style="font-size: 30px;" class="bi bi-credit-card-2-front-fill"></i>
                            <span style="font-size: 16px;"class="nav-text">ຈັດການຂໍ້ມູນການປິດສັນຍາ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="close_payment_insert.php">ບັນທຶກຂໍ້ມູນການປິດສັນຍາ</a></li>
                            <li><a style="font-size: 16px;" href="close_payment_select.php">ລາຍງານຂໍ້ມູນການປິດສັນຍາ</a></li>
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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)"></a>ລາຍງານຂໍ້ມູນການຊຳລະຄ່າງວດ</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">ລາຍງານຂໍ້ມູນການຊຳລະຄ່າງວດພາຍໃນປີນີ້</a></li>
                        </ol>
                    </div>
                    <!-- row -->

                    <!-- start box -->
                    <div class="row invoice-card-row">
                        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                            <a href="payment_date_in.php">
                                <div class="widget-stat card bg-primary">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="las la-user-plus"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1 fs-18">ຈຳນວນຊຳລະຄ່າງວດພາຍໃນມື້ນີ້</p>
                                                <h4 class="text-white"><?php echo $show_count_cus_date_in[0] ?> ລາຍການ</h4>
                                                <p class="mb-1 fs-18">ລວມເປັນເງິນ</p>
                                                <h4 class="text-white"><?php echo number_format($show_sum_pm_pcp_itr[0]) ?> ກິບ</h4>
                                                <small>
                                                    <p>ພາຍໃນໄລຍະເວລາ 24 ຊົວໂມງ</p>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                            <a href="payment_week.php">
                                <div class="widget-stat card bg-danger">
                                    <div class="card-body  p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-users"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1 fs-18">ຈຳນວນຊຳລະຄ່າງວດພາຍໃນອະທິດນີ້</p>
                                                <h4 class="text-white"><?php echo $show_count_cus_date_in_week[0] ?> ລາຍການ</h4>
                                                <p class="mb-1 fs-18">ລວມເປັນເງິນ</p>
                                                <h4 class="text-white"><?php echo number_format($show_sum_pm_pcp_itr_week[0]) ?> ກິບ</h4>
                                                <small>
                                                    <p>ພາຍໃນໄລຍະເວລາ 7 ມື້</p>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                            <a href="payment_month.php">
                                <div class="widget-stat card bg-warning">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-user"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1 fs-18">ຈຳນວນຊຳລະຄ່າງວດພາຍໃນເດືອນນີ້</p>
                                                <h4 class="text-white"><?php echo $show_count_cus_date_in_month[0] ?> ລາຍການ</h4>
                                                <p class="mb-1 fs-18">ລວມເປັນເງິນ</p>
                                                <h4 class="text-white"><?php echo number_format($show_count_pm_pcp_itr_month[0]) ?> ກິບ</h4>
                                                <small>
                                                    <p>ພາຍໃນໄລຍະເວລາ 30 ມື້</p>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                            <a href="payment_year.php">
                                <div class="widget-stat card bg-secondary">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-graduation-cap"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1 fs-18">ຈຳນວນຊຳລະຄ່າງວດພາຍໃນປີນີ້</p>
                                                <h4 class="text-white"><?php echo $show_count_cus_date_in_year[0] ?> ລາຍການ</h4>
                                                <p class="mb-1 fs-18">ລວມເປັນເງິນ</p>
                                                <h4 class="text-white"><?php echo number_format($show_count_pm_pcp_itr_year[0]) ?> ກິບ</h4>
                                                <small>
                                                    <p>ພາຍໃນໄລຍະເວລາ 365 ມື້</p>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-xxl-6 col-lg-6 col-sm-6">
                            <a href="payment_select.php">
                                <div style="height: 290px;" class="card-bx bg-dark-blue">
                                    <img class="pattern-img" src="images/pattern/pattern11.png" alt="">
                                    <div class="card-info text-white">
                                        <img src="images/pattern/circle.png" class="mb-4" alt="">

                                        <p class="fs-18">ຈຳນວນການຊຳລະທັງໝົດ</p>
                                        <h2 class="text-white card-balance"><?php echo $show_sum_pm_id[0] ?> ລາຍການ</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-xxl-6 col-lg-6 col-sm-6">
                            <div style="height: 290px;" class="card-bx bg-dark-blue">
                                <img class="pattern-img" src="images/pattern/pattern11.png" alt="">
                                <div class="card-info text-white">
                                    <img src="images/pattern/circle.png" class="mb-4" alt="">

                                    <p class="fs-18">ລວມເປັນເງິນທັງໝົດ</p>
                                    <h2 class="text-white card-balance"><?php echo number_format($show_sum_pm_pcp_itrs[0]) ?> ກີບ</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End box -->

                    <!-- start row -->
                    <div style="margin-top: 2rem;" class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ລາຍງານຂໍ້ມູນການຊຳລະຄ່າງວດພາຍໃນອາເດືອນ</h4>
                                    <a href="payment_insert.php" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" style="margin-top: -2px;" class="bi bi-plus-circle-dotted me-2" viewBox="0 0 16 16">
                                            <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                        </svg>ຊຳລະຄ່າງວດ
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check custom-checkbox ms-2">
                                                            <input style="cursor: pointer;" type="checkbox" class="form-check-input" id="checkAll" required="">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th>ງວດທີ່</th>
                                                    <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                                                    <th>ເງິນຕົ້ນ</th>
                                                    <th>ດອກເບ້ຍ</th>
                                                    <th>ເງິນຕົ້ນ+ດອກເບ້ຍ</th>
                                                    <th>ຍົກຍ້າຍເງິນຕົ້ນ</th>
                                                    <th>ຍົກຍ້າຍດອກເບ້ຍ</th>
                                                    <th>ປະເພດຊຳລະ</th>
                                                    <th>ວັນທີ່ຈ່າຍຕົວຈິງ</th>
                                                    <th>ສະຖານະ</th>
                                                    <th>ເມນູ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $stmt = $conn->query("select * from payment where year(pm_date_in)=year(curdate()) and year(pm_date_in)=year(curdate())");
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
                                                        <td><?php echo $row['pm_itm']; ?></td>
                                                        <td><?php echo $row['cus_fname']; ?></td>
                                                        <td><?php echo number_format($row['pm_pcp']); ?> ກີບ</td>
                                                        <td><?php echo number_format($row['pm_itr']); ?> ກີບ</td>
                                                        <td><?php echo number_format($row['pm_pcp_itr']); ?> ກີບ</td>
                                                        <td><?php echo number_format($row['pm_tf_pcp']); ?> ກີບ</td>
                                                        <td><?php echo number_format($row['pm_tf_itr']); ?> ກີບ</td>
                                                        <td>
                                                            <?php
                                                            if ($row['pm_status'] == 'ເງິນສົດ') {
                                                                echo '
    
                                                                    <span class="badge badge-lg  light badge-success">
                                                                    <svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip24)">
                                                                    <path d="M11.4238 16.2304C11.2206 15.8106 11.4001 15.3027 11.8199 15.0996C12.9878 14.5376 13.9764 13.6642 14.6805 12.5707C15.4016 11.4501 15.7842 10.1501 15.7842 8.80952C15.7842 4.96369 12.6561 1.83556 8.81022 1.83556C4.96439 1.83556 1.83626 4.96369 1.83626 8.80952C1.83626 10.1501 2.21881 11.4501 2.93652 12.5741C3.6373 13.6676 4.62923 14.541 5.7972 15.103C6.21699 15.3061 6.39642 15.8106 6.19329 16.2337C5.99017 16.6535 5.48574 16.833 5.06256 16.6298C3.61022 15.9324 2.38131 14.8491 1.51126 13.4882C0.617512 12.0934 0.143554 10.4751 0.143554 8.80952C0.143554 6.49389 1.04408 4.31707 2.68262 2.68192C4.31777 1.04337 6.4946 0.142853 8.81022 0.142854C11.1258 0.142854 13.3027 1.04337 14.9378 2.68192C16.5764 4.32046 17.4769 6.4939 17.4769 8.80952C17.4769 10.4751 17.0029 12.0934 16.1058 13.4882C15.2324 14.8457 14.0034 15.9324 12.5545 16.6298C12.1313 16.8296 11.6269 16.6535 11.4238 16.2304Z" fill="#2BC155"></path>
                                                                    <path d="M12.1045 9.2598C12.2704 9.42569 12.3516 9.64235 12.3516 9.85902C12.3516 10.0757 12.2704 10.2924 12.1045 10.4582L9.97506 12.5877C9.66361 12.8991 9.25059 13.0684 8.81387 13.0684C8.37715 13.0684 7.96074 12.8957 7.65267 12.5877L5.52324 10.4582C5.19147 10.1265 5.19147 9.59157 5.52324 9.2598C5.85501 8.92803 6.38991 8.92803 6.72168 9.2598L7.9709 10.509L7.9709 5.69834C7.9709 5.23116 8.35007 4.85199 8.81725 4.85199C9.28444 4.85199 9.66361 5.23116 9.66361 5.69834L9.66361 10.5124L10.9128 9.26319C11.2378 8.93142 11.7727 8.93142 12.1045 9.2598Z" fill="#2BC155"></path>
                                                                    </g>
                                                                    <defs>
                                                                    <clippath id="clip24">
                                                                    <rect width="17.3333" height="17.3333" fill="white" transform="matrix(-9.93477e-08 1 1 9.93477e-08 0.143555 0.142853)"></rect>
                                                                    </clippath>
                                                                    </defs>
                                                                    </svg>
                                                                        ເງິນສົດ
                                                                    </span>
                                                                ';
                                                            } else if ($row['pm_status'] == 'ເງິນໂອນ') {
                                                                echo '
                                                            <span class="badge badge-lg light badge-danger">
                                                            <svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip24)">
                                                            <path d="M11.4238 16.2304C11.2206 15.8106 11.4001 15.3027 11.8199 15.0996C12.9878 14.5376 13.9764 13.6642 14.6805 12.5707C15.4016 11.4501 15.7842 10.1501 15.7842 8.80952C15.7842 4.96369 12.6561 1.83556 8.81022 1.83556C4.96439 1.83556 1.83626 4.96369 1.83626 8.80952C1.83626 10.1501 2.21881 11.4501 2.93652 12.5741C3.6373 13.6676 4.62923 14.541 5.7972 15.103C6.21699 15.3061 6.39642 15.8106 6.19329 16.2337C5.99017 16.6535 5.48574 16.833 5.06256 16.6298C3.61022 15.9324 2.38131 14.8491 1.51126 13.4882C0.617512 12.0934 0.143554 10.4751 0.143554 8.80952C0.143554 6.49389 1.04408 4.31707 2.68262 2.68192C4.31777 1.04337 6.4946 0.142853 8.81022 0.142854C11.1258 0.142854 13.3027 1.04337 14.9378 2.68192C16.5764 4.32046 17.4769 6.4939 17.4769 8.80952C17.4769 10.4751 17.0029 12.0934 16.1058 13.4882C15.2324 14.8457 14.0034 15.9324 12.5545 16.6298C12.1313 16.8296 11.6269 16.6535 11.4238 16.2304Z" fill="#FF2E2E"></path>
                                                            <path d="M12.1045 9.2598C12.2704 9.42569 12.3516 9.64235 12.3516 9.85902C12.3516 10.0757 12.2704 10.2924 12.1045 10.4582L9.97506 12.5877C9.66361 12.8991 9.25059 13.0684 8.81387 13.0684C8.37715 13.0684 7.96074 12.8957 7.65267 12.5877L5.52324 10.4582C5.19147 10.1265 5.19147 9.59157 5.52324 9.2598C5.85501 8.92803 6.38991 8.92803 6.72168 9.2598L7.9709 10.509L7.9709 5.69834C7.9709 5.23116 8.35007 4.85199 8.81725 4.85199C9.28444 4.85199 9.66361 5.23116 9.66361 5.69834L9.66361 10.5124L10.9128 9.26319C11.2378 8.93142 11.7727 8.93142 12.1045 9.2598Z" fill="#FF2E2E"></path>
                                                            </g>
                                                            <defs>
                                                            <clippath id="clip24">
                                                            <rect width="17.3333" height="17.3333" fill="white" transform="matrix(-9.93477e-08 1 1 9.93477e-08 0.143555 0.142853)"></rect>
                                                            </clippath>
                                                            </defs>
                                                            </svg>
                                                                ເງິນໂອນ
                                                            </span>
                                                                ';
                                                            }
                                                            ?>

                                                        </td>
                                                        <td><?php echo $row['pm_date_in']; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row['pm_lg_status'] == 1) {
                                                                echo "
                                                                <span style='font-size: 16px;' class='badge light badge-warning'>
                                                                    <i class='fa fa-circle text-warning me-1'></i>
                                                                    ຜ່ອນຊຳລະ
                                                                </span>
                                                                ";
                                                            } else if ($row['pm_lg_status'] == 2) {
                                                                echo "
                                                                <span style='font-size: 16px;' class='badge light badge-danger'>
                                                                    <i class='fa fa-circle text-danger me-1'></i>
                                                                    ປິດສັນຍາແລ້ວ
                                                                </span>
                                                                ";
                                                            }
                                                            ?>

                                                        </td>
                                                        <td>
                                                            <div class="btn-group dropstart mb-1">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                                <div style="background: #FDFEFE;" class="dropdown-menu">
                                                                    <center>
                                                                        <p style="margin-top: 5px; margin-bottom: -5px; margin-right: 5px;">ເມນູ</p>
                                                                    </center>
                                                                    <hr>
                                                                    <a class="dropdown-item" href="#">ເບິ່ງຂໍ້ມູນເພີ້ມຕື່ມ</a>
                                                                    <hr>
                                                                    <a class="dropdown-item button_edit" href="collateral_update_land.php?id=<?php echo $row['pm_id']; ?>">ແກ້ໄຂຂໍ້ມູນ</a>
                                                                    <a data-pm_id="<?= $row['pm_id']; ?>" href="?delete=<?= $row['pm_id']; ?>" class="dropdown-item delete-btn">ລົບຂໍ່ມູນ</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
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

        <!-- Init file 6 -->
        <script src="js/plugins-init/widgets-script-init.js"></script>

        <script>
            $(".delete-btn").click(function(e) {
                var userId = $(this).data('la_id');
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
                                    url: 'collateral_select_land.php',
                                    type: 'GET',
                                    data: 'delete=' + userId,
                                })
                                .done(function() {
                                    Swal.fire({
                                        title: 'ລົບສຳເລັດ',
                                        text: 'ລົບຂໍ້ມູນສຳເລັດ ກົດ ຕົກລົງເພື່ອດຳເນີນການຕໍ່',
                                        icon: 'success',
                                    }).then(() => {
                                        document.location.href = 'collateral_select_land.php';
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
