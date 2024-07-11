<?php
   require_once "config/db_s_and_k_project.php";
   $date_now = date('d/m/Y');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->query("SELECT * FROM credit_analysis WHERE ca_id = $id");
        $stmt->execute();
        $data = $stmt->fetch();
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_satus'] === "ແອັດມິນ") {
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
    <title>ໃບລາຍງານການວິເຄາະສິນເຊື່ອ</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/customer_form.css" rel="stylesheet">

    <link rel="stylesheet" href="css/Print.css" media="print">

    <!-- SWEETALERT2 AND JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<!-- 
	<style>
		* {
			font-family: Noto Sans Lao;
		}
	</style> -->

</head>

<body style="background: #FDFEFE;">

    <!--*******************
        Preloader start
    ********************-->
    <div style="font-family: Noto Sans Lao;" id="preloader">
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


        <div class="row">
            <div class="col-lg-5">
                <div  style="font-family: Phetsarath OT;width: 790px; height: 1000px; " class="doc">
                <h5 style="position: absolute; font-size: 14px;margin-top: 18.8rem; margin-left: 11rem;"><?= $data['cus_fname']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 18.8rem; margin-left: 26rem;"><?= $data['ca_age']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 18.8rem; margin-left: 36rem;"> <?= $data['ca_nationality']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 20.2rem; margin-left: 7.5rem;"> <?= $data['ca_job']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 20.2rem; margin-left: 20rem;"> <?= $data['ca_vill']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 20.2rem; margin-left: 30rem;"> <?= $data['ca_dis']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 20.2rem; margin-left: 40rem;"> <?= $data['ca_pro']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 21.6rem; margin-left: 14rem;"> <?= $data['ca_id_card']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 21.6rem; margin-left: 30rem;"> <?= $data['ca_tel']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 23rem; margin-left: 16rem;"> <?= number_format($data['ca_amount_offered']); ?> </h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 23rem; margin-left: 35rem;"> <?= number_format($data['ca_amount_released']); ?>  </h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 24.5rem; margin-left: 11.5rem;"> <?= $data['ca_set_month']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 24.5rem; margin-left: 25rem;"> <?= $data['ca_interest']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 25.8rem; margin-left: 10rem;"> <?= $data['ca_loan_to_collateral']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 27.2rem; margin-left: 17rem;"> <?= $data['ca_goal']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 30rem; margin-left: 16rem;"> <?= $data['ca_payment']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 32.9rem; margin-left: 13rem;"> <?= $data['ca_collateral']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 34.3rem; margin-left: 30rem;"> <?= number_format( $data['ca_employee']); ?> </h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 37.1rem; margin-left: 5.5rem;"> <?= $data['ca_history_business']; ?></h5>
                <h5 style="position: absolute; font-size: 14px;margin-top: 47rem; margin-left: 5.5rem;"> <?= $data['ca_regular']; ?></h5>

                <img src="pro_doc_image/ບົດວິເຄາະສິນເຊື່ອ.jpg" width="790px" height="1000px"  alt="" >
                    <!-- PDF CONTENT START -->
                </div>
            </div>
            <div class="col-lg-5">
            
                
            </div>
            <div class="col-lg-2">
                <!--**********************************
                     Header start
                ***********************************-->
                <div style="font-family: Noto Sans Lao; margin-top: 1rem;" class="fixed-top box-1">
                    <div style="height: 1000px;">
                        <div class="container-fluid">
                            <div style="margin-left: 2rem;" class="d-flex flex-row-reverse bd-highlight header-right">
                                <a href="customer_select_offer.php" class="btn btn-warning me-2">ຍົກເລີ້ກ</a>
                                <button type="button" name="button" id="print" onclick="window.print()" class="btn me-2 btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-printer-fill me-2" viewBox="0 0 16 16">
                                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    </svg>ປິ້ນ</button>
                            </div>
                        </div>
                    </div>


                </div>
                <!--**********************************
                    Header end ti-comment-alt
                ***********************************-->
            </div>
        </div>
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