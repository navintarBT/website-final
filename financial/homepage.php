
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
	<title>ໜ້າຫຼັກ/ລະບົບບໍລິຫານເງິນກູ້ S&K</title>

	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<!-- Custom Stylesheet -->

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/s&k_logo.png">

	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
	<!-- Style css -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/Font.css" rel="stylesheet">

	<!-- SWEETALERT2 AND JQUERY -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

	<style>
		* {
			font-family: Noto Sans Lao;
		}
	</style>
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



	$sql_sum_pm_pcp_itr = mysqli_query($conns, "select sum(cr_ap_mounnt) from credit_release where cr_date_in = curdate()");
	$show_sum_pm_pcp_itr = mysqli_fetch_array($sql_sum_pm_pcp_itr);

	$sql_sum_pm_pcp_itr_week = mysqli_query($conns, "select sum(cr_ap_mounnt) from credit_release where week(cr_date_in)=week(curdate()) and year(cr_date_in)=year(curdate())");
	$show_sum_pm_pcp_itr_week = mysqli_fetch_array($sql_sum_pm_pcp_itr_week);

	$sql_count_pm_pcp_itr_month = mysqli_query($conns, "select sum(cr_ap_mounnt) from credit_release where month(cr_date_in)=month(curdate()) and year(cr_date_in)=year(curdate())");
	$show_count_pm_pcp_itr_month = mysqli_fetch_array($sql_count_pm_pcp_itr_month);

	$sql_count_pm_pcp_itr_year = mysqli_query($conns, "select sum(cr_ap_mounnt) from credit_release where year(cr_date_in)=year(curdate()) and year(cr_date_in)=year(curdate())");
	$show_count_pm_pcp_itr_year = mysqli_fetch_array($sql_count_pm_pcp_itr_year);



	$sql_sum_pm_pcp_itr1 = mysqli_query($conns, "select sum(pm_pcp_itr) from payment where pm_date_in = curdate()");
    $show_sum_pm_pcp_itr1 = mysqli_fetch_array($sql_sum_pm_pcp_itr1);

    $sql_sum_pm_pcp_itr_week1 = mysqli_query($conns, "select sum(pm_pcp_itr) from payment where week(pm_date_in)=week(curdate()) and year(pm_date_in)=year(curdate())");
    $show_sum_pm_pcp_itr_week1 = mysqli_fetch_array($sql_sum_pm_pcp_itr_week1);

    $sql_count_pm_pcp_itr_month1 = mysqli_query($conns, "select sum(pm_pcp_itr) from payment where month(pm_date_in)=month(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_pm_pcp_itr_month1 = mysqli_fetch_array($sql_count_pm_pcp_itr_month1);

    $sql_count_pm_pcp_itr_year1 = mysqli_query($conns, "select sum(pm_pcp_itr) from payment where year(pm_date_in)=year(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_pm_pcp_itr_year1 = mysqli_fetch_array($sql_count_pm_pcp_itr_year1);


    $sql_sum_pm_id = mysqli_query($conns, "select count(pm_id) from payment");
    $show_sum_pm_id = mysqli_fetch_array($sql_sum_pm_id);


    $sql_sum_pm_pcp_itrd = mysqli_query($conns, "select sum(pm_pcp_itr) from payment");
    $show_sum_pm_pcp_itrs = mysqli_fetch_array($sql_sum_pm_pcp_itrd);


    $sql_count_cus_date_in1 = mysqli_query($conns, "select count(cr_id) from credit_release where cr_date_in = curdate()");
    $show_count_cus_date_in1 = mysqli_fetch_array($sql_count_cus_date_in1);

    $sql_count_cus_date_in_week1 = mysqli_query($conns, "select count(cr_id) from credit_release where week(cr_date_in)=week(curdate()) and year(cr_date_in)=year(curdate())");
    $show_count_cus_date_in_week1 = mysqli_fetch_array($sql_count_cus_date_in_week1);

    $sql_count_cus_date_in_month1 = mysqli_query($conns, "select count(cr_id) from credit_release where month(cr_date_in)=month(curdate()) and year(cr_date_in)=year(curdate())");
    $show_count_cus_date_in_month1 = mysqli_fetch_array($sql_count_cus_date_in_month1);

    $sql_count_cus_date_in_year1 = mysqli_query($conns, "select count(cr_id) from credit_release where year(cr_date_in)=year(curdate()) and year(cr_date_in)=year(curdate())");
    $show_count_cus_date_in_year1 = mysqli_fetch_array($sql_count_cus_date_in_year1);


	$sql_count_cus_date_in2 = mysqli_query($conns, "select count(pm_id) from payment where pm_date_in = curdate()");
    $show_count_cus_date_in2 = mysqli_fetch_array($sql_count_cus_date_in2);

    $sql_count_cus_date_in_week2 = mysqli_query($conns, "select count(pm_id) from payment where week(pm_date_in)=week(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_cus_date_in_week2 = mysqli_fetch_array($sql_count_cus_date_in_week2);

    $sql_count_cus_date_in_month2 = mysqli_query($conns, "select count(pm_id) from payment where month(pm_date_in)=month(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_cus_date_in_month2 = mysqli_fetch_array($sql_count_cus_date_in_month2);

    $sql_count_cus_date_in_year2 = mysqli_query($conns, "select count(pm_id) from payment where year(pm_date_in)=year(curdate()) and year(pm_date_in)=year(curdate())");
    $show_count_cus_date_in_year2 = mysqli_fetch_array($sql_count_cus_date_in_year2);

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
				<a href="homepage.php" class="brand-logo">
					<img src="images/s&k_logo.png" width="64" height="64" alt="">
					<div class="brand-title">
						<img style="margin-top: 1.2rem;" src="images/logo/logo_big3.png" width="120px" alt="">
						<img style="margin-top: -3rem;" src="images/logo/logo_smal1.png" width="140px" alt="">
					</div>
					<!-- <img class="brand-title" src="images/logo_test01.png" alt=""> -->
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
									ໜ້າຫຼັກ
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
                            <li><a style="font-size: 16px;" href="payment_insert_debt.php">ບັນທຶກຂໍ້ມູນໜີ້ສິນ</a></li>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">ລາຍງານຂໍ້ມູນການຊຳລະຄ່າງວດພາຍໃນມື້ນີ້</a></li>
                        </ol>
                    </div>
					<div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo rounded"></div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
										<img src="user_images/<?php echo $_SESSION['user_image']; ?>" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0"><?php echo $_SESSION['user_flname']; ?></h4>
                        
											<p>ພະນັກງານການເງິນ</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0"><?php echo $_SESSION['user_satus']; ?></h4>
											<p>ສະຖານະ</p>
										</div>
										<div class="dropdown ms-auto">
											<a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-end">
												<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
												<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
												<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
												<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
											</ul>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
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
			<!--**********************************
            Content body end
        ***********************************-->



			<!--**********************************
            Footer start
        ***********************************-->
			<!--**********************************
            Footer end
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
		<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

		<!-- Apex Chart -->
		<script src="vendor/apexchart/apexchart.js"></script>
		<script src="vendor/nouislider/nouislider.min.js"></script>
		<script src="vendor/wnumb/wNumb.js"></script>

		<!-- Dashboard 1 -->
		<script src="js/dashboard/dashboard-1.js"></script>

		<script src="js/custom.min.js"></script>
		<script src="js/dlabnav-init.js"></script>
		<script src="js/demo.js"></script>
		<script src="js/styleSwitcher.js"></script>

		<!-- Datatable -->
		<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="js/db_table.js"></script>

</body>

</html>
<?php
?>