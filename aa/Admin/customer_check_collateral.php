
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_satus'] === "ແອັດມິນ") {
    // User is logged in and has the correct user_status, allow access to the page
    echo "Welcome, " . $_SESSION['user_id'] . "! You can access this page.";
} else {
    // User is not logged in or has incorrect user_status, redirect back to login page
    header("Location: http://localhost/Loan-management-system/login");
    exit();
}?>
<?php
    require_once "config/conect_nal.php";

    $lg_runing_id=$_POST['lg_runing_id'];
    $sql= mysqli_query($conns,"select lg_amount_releaseds FROM loan_agreement where lg_runing_id='$lg_runing_id' ");
    $lg_amount_releaseds=mysqli_fetch_array($sql);
    if($lg_amount_releaseds){
        echo number_format($lg_amount_releaseds[0]) . ' LAK';
    }else{
        echo"ບໍ່ມີລູ້ກຄ້າ";
    }
?>
<?php
   require_once "config/db_s_and_k_project.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->query("SELECT * FROM customers WHERE cus_id = $id");
    $stmt->execute();
    $data = $stmt->fetch();
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

    <!-- PAGE TITLE HERE -->
    <title> <?= $data['cus_fname']; ?> ແບບຟອມໃບລາຍງານການລົງກວດການຊັບສົມບັດຄ້ຳປະກັນ</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/customer_form.css" rel="stylesheet">

    <link rel="stylesheet" href="css/Print.css" media="print">

    <!-- SWEETALERT2 AND JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

	<style>
		* {
			font-family: Noto Sans Lao;
		}
	</style>

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
                <div style="font-family: Phetsarath OT;width: 790px; height: 1000px; " class="doc">

                    <!-- PDF CONTENT START -->


                    <div style="display: flex; margin-top: 2rem; margin-left: 4rem;" class="head">
                        <div class="logo">
                            <img src="images/logo/s&k_logo.jpg" width="90px" height="90px" alt="logo">
                        </div>
                        <div style="margin-top: 1rem; margin-left: 2rem;" class="text-head">
                            <h1 style="font-size: 20px;"><b>ສະຖາບັນການເງິນຈຸລາພາກ ທີ່ບໍ່ຮັບເງິນຟາກ ເອັສ ແອນ ເຄ ຈຳກັດ</b></h1>
                            <h1 style="margin-top: rem; font-size: 14px;"><b>S&K NON-DEPOSIT TAKING MICRO FINANCE INSTITUTLON CO.LTD</b></h1>
                        </div>
                    </div>
                    <img style="margin-left: 4rem; margin-top: -1.5rem;" src="images/logo/hr.png" width="650px" alt="">
                    <div style="margin-top: 0rem;  text-align: center;" class="text-head">
                        <h3><u><b>ໃບລາຍງານການລົງກວດກາ</b></u></h3>
                        <h3><u><b>ຊັບສົມບັດຄ້ຳປະກັນ</b></u></h3>
                    </div>
                    <div style="margin-top: 2rem; margin-left: 4.2rem;" class="text-body-1">
                        <h5 style="font-size: 16px;"><b> <?= $data['cus_fname']; ?>, ສັນຍາເງິນກູ້ ເລກທີ່..........................ລົງວັນທີ........../........./.................</b></h5>
                        <h5 style="font-size: 16px;"><b> ID : <?= $data['cus_runing']; ?></b></h5>
                    </div>
                    <div style="margin-top: 2rem; margin-left: 4.2rem;" class="text-body-2">
                        <h5 style="font-size: 16px;"><b> 1. ຜູ້ລົງກວດກາຕົວຈິງ:</b> ທ້າວ/ນາງ..........................................ໃນວັນທີ..........................ເວລາ.......................</h5>
                    </div>
                    <div class="text-body-3">
                        <h5 style="font-size: 16px; margin-left: 4.2rem;"><b> 2. ປະເພດຊັບສົມບັດຄ້ຳປະກັນ:</b></h5>
                    </div>
                    <div style="margin-top: 0px" class="text-body-4">
                        <div style="display: flex;" class="form-check custom-checkbox">
                            <input style="border: 1px solid black; margin-top: -3px; margin-left: 4rem;" type="checkbox" class="form-check-input" id="customCheckBox1" required="">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 8px;">ທີ່ດິນ ຫຼື ທີ່ດິນ ແລະ ສິ່ງປຸກສ່າງ: ຕາມໃບຕາດິນເລກທີ......................, ລົງວັນທີ......................, ເຊິ່ງມີທີ່ຕັ້ງຢູ່</h1>
                        </div>
                        <h1 style="font-size: 16px; margin-left: 7rem;  margin-top: 0px;">ບ້ານ......................., ເມືອງ....................., ແຂວງ......................, ອອກຊື່ໃຜ.................................,</h1>
                        <h1 style="font-size: 16px; margin-left: 7rem;  margin-top: 0px;">..........................................................................................................................................,</h1>
                        <div style="display: flex; margin-top: 0px;" class="form-check custom-checkbox">
                            <input style="border: 1px solid black; margin-top: -3px; margin-left: 4rem;" type="checkbox" class="form-check-input" id="customCheckBox1" required="">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 8px;">ລົດໃຫຍ່</h1>
                            <input style="border: 1px solid black; margin-top: -3px; margin-left: 8px;" type="checkbox" class="form-check-input" id="customCheckBox1" required="">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 8px;">ລົດຈັກ : ທະບຽນລົດ...................., ເລກຈັກ....................., ເລຖັງ...............................,</h1>
                        </div>
                        <h1 style="font-size: 16px; margin-left: 7rem;  margin-top: 0px;">ຍີຫໍ່..........................., ສີ......................, ອອກຊື່..................................., ປີນຳໃຊ້.......................,</h1>
                        <div style="display: flex; margin-top: 0px;" class="form-check custom-checkbox">
                            <input style="border: 1px solid black; margin-top: -3px; margin-left: 4rem;" type="checkbox" class="form-check-input" id="customCheckBox1" required="">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 8px;">ຊັບສິນອື່ນໆ (ລະບຸ) ................................................................................................................,</h1>
                        </div>
                        <h1 style="font-size: 16px; margin-left: 7rem;  margin-top: 0px;">..........................................................................................................................................,</h1>
                    </div>
                    <div style="display: flex; margin-top: -0px" class="text-body-5">
                        <h5 style="font-size: 16px; margin-left: 4.2rem;  margin-top: -0px"><b> 3. ແຜນທີ ທີ່ຕັ້ງຊັບສົມບັດ:</b></h5>
                        <div style="display: flex; margin-top: 0px;" class="form-check custom-checkbox">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 4.2rem;">ມີ</h1>
                            <input style="border: 1px solid black; margin-left: 4rem; margin-left: 8px; margin-top: -3px;" type="checkbox" class="form-check-input" id="customCheckBox1" required="">
                        </div>
                        <div style="display: flex; margin-top: 0px;" class="form-check custom-checkbox">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 4.2rem;">ບໍ່ມີ</h1>
                            <input style="border: 1px solid black; margin-left: 4rem; margin-left: 8px; margin-top: -3px;" type="checkbox" class="form-check-input" id="customCheckBox1" required="">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 8px;">.....................................................,</h1>
                        </div>
                    </div>
                    <div style="display: flex; margin-top: 0px" class="text-body-6">
                        <h5 style="font-size: 16px; margin-left: 4.2rem;  margin-top: 0px"><b> 4. ຮູບພາບປະກອບ:</b></h5>
                        <div style="display: flex; margin-top: 0px;" class="form-check custom-checkbox">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 6.5rem;">ມີ</h1>
                            <input style="border: 1px solid black; margin-left: 8rem; margin-left: 8px; margin-top: -3px;" type="checkbox" class="form-check-input" id="customCheckBox1" required="">
                        </div>
                        <div style="display: flex; margin-top: 0px;" class="form-check custom-checkbox">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 4.2rem;">ບໍ່ມີ</h1>
                            <input style="border: 1px solid black; margin-left: 8rem; margin-left: 8px; margin-top: -3px;" type="checkbox" class="form-check-input" id="customCheckBox1" required="">
                            <h1 style="font-size: 16px; margin-top: 0px; margin-left: 8px;">.....................................................,</h1>
                        </div>
                    </div>
                    <div style="margin-top: -px" class="text-body-7">
                        <h5 style="font-size: 16px; margin-left: 4.2rem; margin-top: -0px"><b> 5. ອະທິບາຍໂດຍຫຍໍ່ກ່ຽວກັບຊັບສົມບັດ:</b>..................................................................................................</h5>
                        <h5 style="font-size: 16px; margin-left: 5.4rem; margin-top: -0px">................................................................................................................................................</h5>
                        <h5 style="font-size: 16px; margin-left: 5.4rem; margin-top: -0px">................................................................................................................................................</h5>
                        <h5 style="font-size: 16px; margin-left: 5.4rem; margin-top: -0px">................................................................................................................................................</h5>
                        <h5 style="font-size: 16px; margin-left: 5.4rem; margin-top: -0px">................................................................................................................................................</h5>
                    </div>
                    <div style="display: flex; margin-top: 0px" class="text-body-8">
                        <h5 style="font-size: 16px; margin-left: 4.2rem;"><b> 6. ມູນຄ້າເດິມຂອງຊັບສົມບັດ:</b></h5>
                        <h5 style="font-size: 16px; margin-left: 10rem; margin-top: 0px;">ຈຳນວນ ..................................................ກີບ.</h5>
                    </div>
                    <div style="display: flex; margin-top: 0px" class="text-body-9">
                        <h5 style="font-size: 16px; margin-left: 4.2rem; "><b>7. ມູນຄ້າຊັບສົມບັດ ຕາມລາຄາຕະຫຼາດ:</b></h5>
                        <h5 style="font-size: 16px; margin-left: 6.6rem; margin-top: 0px;">ຈຳນວນ ..................................................ກີບ.</h5>
                    </div>
                    <div style="display: flex; margin-top: 0px" class="text-body-8">
                        <h5 style="font-size: 16px; margin-left: 4.2rem;"><b> 8. ມູນຄ້າປະເມີນຂອງພະນັກງານ:</b></h5>
                        <h5 style="font-size: 16px; margin-left: 9rem; margin-top: 0px;">ຈຳນວນ ..................................................ກີບ.</h5>
                    </div>
                    <div style="display: flex; margin-top: 2rem" class="text-body-9">
                        <h5 style="font-size: 16px; margin-left: 5.4rem; margin-top: 0px;">ນະຄອນຫຼວງວຽງຈັນ, ວັນທີ .........................</h5>
                    </div>
                    <div style="display: flex; margin-top: 0px" class="text-body-10">
                        <h5 style="font-size: 16px; margin-left: 8.2rem;"><u><b>ຜຸ້ປະເມີນ/ລົງກວດກາຕົວຈິງ</b></u></h5>
                        <h5 style="font-size: 16px; margin-left: 12rem;"><u><b>ຫົວໜ້າພະແນກບໍລິການ-ສິນເຊື່ອ</b></u></h5>
                    </div>
                    <!-- PDF CONTENT END -->

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