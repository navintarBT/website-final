
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
    <title>ແບບຟອມບັນທຶກຂໍ້ມູນລູກຄ້າ</title>

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
                //ຂໍ້ມູນລູກຄ້າ
                var cus_image = $(".cus_image").val();
                var cus_id = $(".cus_id").val();
                var cus_national_id = $(".cus_national_id").val();
                var cus_national_id_expiry_date = $(".cus_national_id_expiry_date").val();
                var cus_passprot_number = $(".cus_passprot_number").val();
                var cus_passprot_expiry_date = $(".cus_passprot_expiry_date").val();
                var cus_familybook_id = $(".cus_familybook_id").val();
                var cus_familybook_pv_code = $(".cus_familybook_pv_code").val();
                var cus_familybook_issue_date = $(".cus_familybook_issue_date").val();
                var cus_fname = $(".cus_fname").val();
                var cus_vill = $(".cus_vill").val();
                var cus_dis = $(".cus_dis").val();
                var cus_pro = $(".cus_pro").val();
                var cus_tel_phone = $(".cus_tel_phone").val();
                var cus_email = $(".cus_email").val();
                //ຂໍ້ມູນຈຸດປະສົງໃນການກູ້ຢຶມ
                var cus_purpose_money = $(".cus_purpose_money").val();
                var cus_qty_money = $(".cus_qty_money").val();
                var cus_date_of_loan = $(".cus_date_of_loan").val();
                var cus_collateral_assets = $(".cus_collateral_assets").val();
                var cus_regular_money = $(".cus_regular_money").val();
                var cus_funding = $(".cus_funding").val();
                var cus_laugh_data = $(".cus_laugh_data").val();
                //ຂໍ້ມູນລາຍຮັບ
                var cus_income_salary = $(".cus_income_salary").val();
                var cus_income_famiry = $(".cus_income_famiry").val();
                var cus_income_trading = $(".cus_income_trading").val();
                var cus_income_rental = $(".cus_income_rental").val();
                var cus_special_income = $(".cus_special_income").val();
                var cus_total_income = $(".cus_total_income").val();
                //ລາຍຈ່າຍ
                var cus_expenditure_invest = $(".cus_expenditure_invest").val();
                var cus_expenditure_house_rent = $(".cus_expenditure_house_rent").val();
                var cus_expenditure_normal = $(".cus_expenditure_normal").val();
                var cus_expenditure_debt = $(".cus_expenditure_debt").val();
                var cus_expenditure_other = $(".cus_expenditure_other").val();
                var cus_total_expenses = $(".cus_total_expenses").val();

                if (cus_image == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຮູ້ບພາບບັດປະຈຳຕົວຂອງລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_national_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດບັດປະຈຳຕົວ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_national_id_expiry_date == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນວັນໝົດອາຍຸຂອງບັດປະຈຳຕົວ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_fname == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_vill == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນບ້ານຢູ່ບັດຈຸບັນຂອງລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_dis == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເມືອງຢູ່ບັດຈຸບັນຂອງລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_pro == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນແຂວງຢູ່ບັດຈຸບັນຂອງລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_tel_phone == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເບີໂທຂອງລູກຄ້າກ່ອນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_purpose_money == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຈຸດປະສົງການກູ້ຢຶມຂອງລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_qty_money == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຈຳນວນເງິນສະເໜີຂໍ້ກູ້ຢຶມຂອງລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_date_of_loan == "") {
                    Swal.fire(
                        'ກະລຸນາເລື້ອກໄລຍະເວລາທີ່ຕ້ອງການກູ້ຂອງລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_collateral_assets == "") {
                    Swal.fire(
                        'ກະລຸນາເລື້ອກຂໍ້ມູນຊັບສົມບັດຄຳປະກັນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_regular_money == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນແຫຼ່ງລາຍຮັບປະຈຳທີ່ຈະມາຊຳລະໜີ່ຂອງລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_funding == "") {
                    Swal.fire(
                        'ກະລຸນາເລື້ອກຮູບແບບການຊຳລະຂອງລູກຄ້າ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_total_income == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລາຍຮັບຂອງລູກຄ້າໃຫ້ຄົບຖ່ວນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_total_expenses == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລາຍຈ່າຍຂອງລູກຄ້າໃຫ້ຄົບຖ່ວນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (cus_qty_money == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລາຍຮັບ ແລະ ລາຍຈ່າຍຂອງລູກຄ້າໃຫ້ຄົບຖ່ວນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                }
            });
        });
    </script>

    <script>
        $(function() {

            // ຄິດໄລລາຜົນລວມລາຍຮັບ
            var totel_income = function() {

                var sum = 0;

                $('.income').each(function() {
                    var num = $(this).val().replace(',', '');
                    if (num != 0) {
                        sum += parseFloat(num);
                        sums = new Intl.NumberFormat("en-LA", {
                            style: 'currency',
                            currency: 'LAK'
                        }).format(sum);
                    }
                });

                $('#cus_total_income').val(sum);
                $('#cus_total_income0').val(sums);
            }

            $('.income').keyup(function() {
                totel_income();
            });
            // ສິດສຸດຄິດໄລລາຜົນລວມລາຍຮັບ

            // ຄິດໄລລາຜົນລວມລາຍຈ່າຍ
            var totel_expenditure = function() {

                var sum = 0;

                $('.expenditure').each(function() {
                    var num = $(this).val().replace(',', '');
                    if (num != 0) {
                        sum += parseFloat(num);
                        sums = new Intl.NumberFormat("en-LA", {
                            style: 'currency',
                            currency: 'LAK'
                        }).format(sum);
                    }
                });

                $('#cus_total_expenses').val(sum);
                $('#cus_total_expenses0').val(sums)
            }

            $('.expenditure').keyup(function() {
                totel_expenditure();
            });
            // ສິນສຸດຄິດໄລລາຜົນລວມລາຍຈ່າຍ

            //ຄິດໄລຜົນລົບລະຫ່າງ ລາຍຮັບ - ລາຍຈ່າຍ
            $(".expenditure").keyup(function() {
                var cus_total_income = parseInt($(".cus_total_income").val());
                var cus_total_expenses = parseInt($(".cus_total_expenses").val());
                var totals = parseFloat(cus_total_income - cus_total_expenses) || 0;

                amount = new Intl.NumberFormat("en-LA", {
                    style: 'currency',
                    currency: 'LAK'
                }).format(totals);
                $("#cus_amount_income").val(totals);
                $("#cus_amount_income0").val(amount);
            });
            //ສິດສຸດຄິດໄລຜົນລົບລະຫ່າງ ລາຍຮັບ - ລາຍຈ່າຍ

            //ຄິດໄລຜົນລົບລະຫ່າງ ລາຍຮັບ - ລາຍຈ່າຍ
            $(".income").keyup(function() {
                var cus_total_income = parseInt($(".cus_total_income").val());
                var cus_total_expenses = parseInt($(".cus_total_expenses").val());
                var totals = parseFloat(cus_total_income - cus_total_expenses) || 0;

                amount = new Intl.NumberFormat("en-LA", {
                    style: 'currency',
                    currency: 'LAK'
                }).format(totals);
                $("#cus_amount_income").val(totals);
                $("#cus_amount_income0").val(amount);
            });
            //ສິດສຸດຄິດໄລຜົນລົບລະຫ່າງ ລາຍຮັບ - ລາຍຈ່າຍ

            // ຄິດໄລເປີເຊັນຂອງລາຍຈ່າຍ
            $(".income").keyup(function() {
                var cus_total_income = parseInt($(".cus_total_income").val());
                var cus_total_expenses = parseInt($(".cus_total_expenses").val());
                var totals = parseFloat((cus_total_expenses * 100) / cus_total_income) || 0;

                percen = new Intl.NumberFormat().format(totals);
                $("#percentage_expenses").val(percen);
            });
            // ສິນສູດຄິດໄລເປີເຊັນຂອງລາຍຈ່າຍ

            // ຄິດໄລເປີເຊັນຂອງລາຍຮັບ
            $(".income").keyup(function() {
                var cus_amount_income = parseInt($(".cus_amount_income").val());
                var cus_total_income = parseInt($(".cus_total_income").val());
                var totals = parseFloat((cus_amount_income * 100) / cus_total_income) || 0;

                percen = new Intl.NumberFormat().format(totals);
                $("#percentage_income").val(percen);
            });
            // ສິນສຸດຄິດໄລເປີເຊັນຂອງລາຍຮັບ

            // ຄິດໄລເປີເຊັນຂອງລາຍຈ່າຍ
            $(".expenditure").keyup(function() {
                var cus_total_income = parseInt($(".cus_total_income").val());
                var cus_total_expenses = parseInt($(".cus_total_expenses").val());
                var totals = parseFloat((cus_total_expenses * 100) / cus_total_income) || 0;

                percen = new Intl.NumberFormat().format(totals);
                $("#percentage_expenses").val(percen);
            });
            // ສິນສູດຄິດໄລເປີເຊັນຂອງລາຍຈ່າຍ

            // ຄິດໄລເປີເຊັນຂອງລາຍຮັບ
            $(".expenditure").keyup(function() {
                var cus_amount_income = parseInt($(".cus_amount_income").val());
                var cus_total_income = parseInt($(".cus_total_income").val());
                var totals = parseFloat((cus_amount_income * 100) / cus_total_income) || 0;

                percen = new Intl.NumberFormat().format(totals);
                $("#percentage_income").val(percen);
            });
            // ສິນສຸດຄິດໄລເປີເຊັນຂອງລາຍຮັບ

        })
    </script>

    <?php
    require_once "config/conect_nal.php";
    $query = "SELECT count(cus_id) FROM customers ORDER BY cus_id DESC LIMIT 1; ";
    $result = mysqli_query($conns, $query);
    $row = mysqli_fetch_array($result);

    $lastid = $row[0];
    if (empty($lastid)) {
        $number = "CTM-00000001";
    } else {
        $idd = str_replace("CTM-", "", $lastid);
        $id = str_pad($idd + 1, 8, 0, STR_PAD_LEFT);
        $number = 'CTM-' . $id;
    }

    require_once "config/db_s_and_k_project.php";

    if (isset($_POST['submit'])) {

        $date1 = date("Ymd_His");

        $numrand = (mt_rand());
        $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
        $upload = $_FILES['doc_file']['name'];

        if ($upload != '') {

            $typefile = strrchr($_FILES['doc_file']['name'], ".");

            if ($typefile == '.pdf') {

                $path = "docs/";

                $newname = 'doc_' . $numrand . $date1 . $typefile;
                $path_copy = $path . $newname;

                $cus_runing = $_POST['cus_runing'];
                $cus_national_id = $_POST['cus_national_id'];
                $cus_national_id_expiry_date = $_POST['cus_national_id_expiry_date'];
                $cus_passprot_number = $_POST['cus_passprot_number'];
                $cus_passprot_expiry_date = $_POST['cus_passprot_expiry_date'];
                $cus_familybook_id = $_POST['cus_familybook_id'];
                $cus_familybook_pv_code = $_POST['cus_familybook_pv_code'];
                $cus_familybook_issue_date = $_POST['cus_familybook_issue_date'];

                $cus_fname = $_POST['cus_fname'];
                $cus_age = $_POST['cus_age'];
                $cus_nationality = $_POST['cus_nationality'];

                $cus_job = $_POST['cus_job'];
                $cus_dob = $_POST['cus_dob'];
                $cus_vill = $_POST['cus_vill'];
                $cus_dis = $_POST['cus_dis'];
                $cus_pro = $_POST['cus_pro'];
                $cus_tel_phone = $_POST['cus_tel_phone'];
                $cus_email = $_POST['cus_email'];
                $cus_purpose_money = $_POST['cus_purpose_money'];
                $cus_qty_money = $_POST['cus_qty_money'];
                $cus_date_of_loan = $_POST['cus_date_of_loan'];
                $cus_collateral_assets = $_POST['cus_collateral_assets'];
                $cus_regular_money = $_POST['cus_regular_money'];
                $cus_funding = $_POST['cus_funding'];
                $cus_laugh_data = $_POST['cus_laugh_data'];
                $cus_income_salary = $_POST['cus_income_salary'];
                $cus_income_famiry = $_POST['cus_income_famiry'];
                $cus_income_trading = $_POST['cus_income_trading'];
                $cus_income_rental = $_POST['cus_income_rental'];
                $cus_special_income = $_POST['cus_special_income'];
                $cus_total_income = $_POST['cus_total_income'];
                $cus_expenditure_invest = $_POST['cus_expenditure_invest'];
                $cus_expenditure_house_rent = $_POST['cus_expenditure_house_rent'];
                $cus_expenditure_normal = $_POST['cus_expenditure_normal'];
                $cus_expenditure_debt = $_POST['cus_expenditure_debt'];
                $cus_expenditure_other = $_POST['cus_expenditure_other'];
                $cus_total_expenses = $_POST['cus_total_expenses'];
                $percentage_income = $_POST['percentage_income'];
                $percentage_expenses = $_POST['percentage_expenses'];
                $cus_amount_income = $_POST['cus_amount_income'];
                $cus_status = 0;
                $date = date('d/m/Y H:i:s');
                $doc_name = $_POST['doc_name'];

                //sql insert
                $select_stmt = $conn->prepare('SELECT cus_runing FROM customers where cus_runing = :cus_runing');
                $select_stmt->bindParam(':cus_runing', $cus_runing);
                $select_stmt->execute();
                $cus_runings = $select_stmt->fetch(PDO::FETCH_ASSOC);

                $select_stmt = $conn->prepare('SELECT cus_national_id FROM customers where cus_national_id = :cus_national_id');
                $select_stmt->bindParam(':cus_national_id', $cus_national_id);
                $select_stmt->execute();
                $cus_national_ids = $select_stmt->fetch(PDO::FETCH_ASSOC);

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
                                    text: 'ລະຫັດລູກຄ້າຊ້ຳກັນ ກາລຸນາກວດສອບລະຫັດລູກຄ້າຂອງລູກຄ້າ ແລ້ວລອງໃຫມ່ອີກຄັ້ງ!',
                                    icon: 'error',
                                    showConfirmButton: true
                                });
                            })
                        })
                        </script>";
                } else if ($cus_national_ids <> 0) {
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
                                    text: 'ລະຫັດບັດປະຈຳຕົວຊ້ຳກັນ ກາລຸນາກວດສອບລະຫັດບັດປະຈຳຕົວຂອງລູ້ຄ້າ ແລ້ວລອງໃຫມ່ອີກຄັ້ງ!',
                                    icon: 'error',
                                    showConfirmButton: true
                                });
                            })
                        })
                        </script>";
                } else {
                    $cus_image = $_FILES['cus_image'];
                    $allow = array('jpg', 'jpeg', 'png');
                    $extension = explode(".", $cus_image['name']);
                    $fileActExt = strtolower(end($extension));
                    $fileNew = rand() . "." . $fileActExt;
                    $filePath = "photo_id/" . $fileNew;

                    if (in_array($fileActExt, $allow)) {
                        if ($cus_image['size'] > 0 && $cus_image['error'] == 0) {
                            $remove =  move_uploaded_file($cus_image['tmp_name'], $filePath);
                            move_uploaded_file($_FILES['doc_file']['tmp_name'], $path_copy);
                            if ($remove) {
                                $sql = $conn->prepare("INSERT INTO customers(cus_runing, cus_national_id, cus_national_id_expiry_date, cus_passprot_number, cus_passprot_expiry_date, cus_familybook_id,cus_familybook_pv_code,cus_familybook_issue_date,cus_fname,cus_age,cus_nationality,cus_job,cus_dob,cus_vill,cus_dis,cus_pro,cus_status,cus_tel_phone,cus_email,cus_purpose_money,cus_qty_money,cus_date_of_loan,cus_collateral_assets,cus_regular_money,cus_funding,cus_laugh_data,cus_income_salary,cus_income_famiry,cus_income_trading,cus_income_rental,cus_special_income,cus_total_income,cus_expenditure_invest,cus_expenditure_house_rent,cus_expenditure_normal,cus_expenditure_debt,cus_expenditure_other,cus_total_expenses,percentage_income,percentage_expenses,cus_amount_income,cus_image,cus_date_in,cus_time_in,cus_doc_name,cus_doc,user_id) 
                                VALUES(:cus_runing, :cus_national_id, :cus_national_id_expiry_date, :cus_passprot_number, :cus_passprot_expiry_date, :cus_familybook_id, :cus_familybook_pv_code, :cus_familybook_issue_date, :cus_fname, :cus_age, :cus_nationality, :cus_job, :cus_dob, :cus_vill, :cus_dis,:cus_pro,'$cus_status',:cus_tel_phone,:cus_email,:cus_purpose_money,:cus_qty_money,:cus_date_of_loan,:cus_collateral_assets,:cus_regular_money,:cus_funding,:cus_laugh_data,:cus_income_salary,:cus_income_famiry,:cus_income_trading,:cus_income_rental,:cus_special_income,:cus_total_income,:cus_expenditure_invest,:cus_expenditure_house_rent,:cus_expenditure_normal,:cus_expenditure_debt,:cus_expenditure_other,:cus_total_expenses,:percentage_income,:percentage_expenses,:cus_amount_income,:cus_image, curdate(), curtime(), :cus_doc_name, '$newname',:user_id)");
                                $sql->bindParam(":cus_runing", $cus_runing);
                                $sql->bindParam(":cus_national_id", $cus_national_id);
                                $sql->bindParam(":cus_national_id_expiry_date", $cus_national_id_expiry_date);
                                $sql->bindParam(":cus_passprot_number", $cus_passprot_number);
                                $sql->bindParam(":cus_passprot_expiry_date", $cus_passprot_expiry_date);
                                $sql->bindParam(":cus_familybook_id", $cus_familybook_id);
                                $sql->bindParam(":cus_familybook_pv_code", $cus_familybook_pv_code);
                                $sql->bindParam(":cus_familybook_issue_date", $cus_familybook_issue_date);
                                $sql->bindParam(":cus_fname", $cus_fname);
                                $sql->bindParam(":cus_age", $cus_age);
                                $sql->bindParam(":cus_nationality", $cus_nationality);
                                $sql->bindParam(":cus_job", $cus_job);
                                $sql->bindParam(":cus_dob", $cus_dob);
                                $sql->bindParam(":cus_vill", $cus_vill);
                                $sql->bindParam(":cus_dis", $cus_dis);
                                $sql->bindParam(":cus_pro", $cus_pro);
                                $sql->bindParam(":cus_tel_phone", $cus_tel_phone);
                                $sql->bindParam(":cus_email", $cus_email);
                                $sql->bindParam(":cus_purpose_money", $cus_purpose_money);
                                $sql->bindParam(":cus_qty_money", $cus_qty_money);
                                $sql->bindParam(":cus_date_of_loan", $cus_date_of_loan);
                                $sql->bindParam(":cus_collateral_assets", $cus_collateral_assets);
                                $sql->bindParam(":cus_regular_money", $cus_regular_money);
                                $sql->bindParam(":cus_funding", $cus_funding);
                                $sql->bindParam(":cus_laugh_data", $cus_laugh_data);
                                $sql->bindParam(":cus_income_salary", $cus_income_salary);
                                $sql->bindParam(":cus_income_famiry", $cus_income_famiry);
                                $sql->bindParam(":cus_income_trading", $cus_income_trading);
                                $sql->bindParam(":cus_income_rental", $cus_income_rental);
                                $sql->bindParam(":cus_special_income", $cus_special_income);
                                $sql->bindParam(":cus_total_income", $cus_total_income);
                                $sql->bindParam(":cus_expenditure_invest", $cus_expenditure_invest);
                                $sql->bindParam(":cus_expenditure_house_rent", $cus_expenditure_house_rent);
                                $sql->bindParam(":cus_expenditure_normal", $cus_expenditure_normal);
                                $sql->bindParam(":cus_expenditure_debt", $cus_expenditure_debt);
                                $sql->bindParam(":cus_expenditure_other", $cus_expenditure_other);
                                $sql->bindParam(":cus_total_expenses", $cus_total_expenses);
                                $sql->bindParam(":percentage_income", $percentage_income);
                                $sql->bindParam(":percentage_expenses", $percentage_expenses);
                                $sql->bindParam(":cus_amount_income", $cus_amount_income);
                                $sql->bindParam(":cus_image", $fileNew);
                                $sql->bindParam(":cus_doc_name", $doc_name);
                                $sql->bindParam(":user_id", $_SESSION['user_id']);
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
                                                    document.location.href = 'customer_select_history.php';
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
    <?php
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
            <a href="customer_insert.php" class="brand-logo">
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
                                ບັນທຶກຂໍ້ມູນລູກຄ້າ
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
                            <span style="font-size: 16px;"class="nav-text">ໜ້າຫຼັກ</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i style="font-size: 28px;" class="bi bi-person-fill"></i>
                            <span style="font-size: 16px;"class="nav-text">ລາຍຂໍ້ມູນລູກຄ້າ</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a style="font-size: 16px;" href="customer_select_history.php">ລາຍງານຂໍ້ມູນບຸກຄົນ</a></li>
                            <li><a style="font-size: 16px;" href="customer_select_offer.php">ລາຍງານຂໍ້ມູນສະເໜີຂໍກູູ້ຢືມ</a></li>
                            <li><a style="font-size: 16px;" href="customer_select_Identification_card.php">ລາຍງານຂໍ້ມູນບັດປະຈຳຕົວ</a></li>
                            <li><a style="font-size: 16px;" href="customer_selelct_passport.php">ລາຍງານຂໍ້ມູນໜັງສືເດີນທາງ</a>
                            <li><a style="font-size: 16px;" href="customer_select_famirybook.php">ລາຍງານຂໍ້ມູນສຳມະໂນຄົວ</a>
                            <li><a style="font-size: 16px;" href="customer_select_contact.php">ລາຍງານຂໍ້ມູນການຕິດຕໍ່ພົວພັນ</a>
                            <li><a style="font-size: 16px;" href="customer_select_Income-expenditure.php">ລາຍງານຂໍ້ມູນ ລາຍຮັບ - ລາຈ່າຍ</a>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i style="font-size: 24px;" class="bi bi-map-fill"></i>
                            <span style="font-size: 16px;" class="nav-text">ລາຍງານຂໍ້ມູນຫຼັກຊັບຄໍ້າປະກັນ</span>

                        </a>
                        <ul aria-expanded="false">
                         <li><a style="font-size: 16px;" href="collateral_select_land.php">ລາຍງານທີ່ດິນ-ສິ່ງປູກສ້າງ</a></li>
                            <li><a style="font-size: 16px;" href="collateral_select_car.php">ລາຍງານລົດໃຫຍ່-ລົດຈັກ</a></li>
                            <li><a style="font-size: 16px;" href="collateral_select_other.php">ລາຍງານຫຼັກຊັບອື່ນໆ</a></li>
                        </ul>
                    </li>
                    <li><a  href="credit_analysis_select.php"aria-expanded="false">
                            <i class="flaticon-041-graph"></i>
                            <span style="font-size: 16px;" class="nav-text">ລາຍງານການວິເຄາະສິນເຊື່ອ</span>
                        </a>
                    </li>
                    <li><a href="guarantor_select.php" aria-expanded="false">
                            <i style="font-size: 28px;" class="bi bi-people-fill"></i>
                            <span style="font-size: 16px;" class="nav-text">ລາຍງານຂໍ້ມູນຜູ້ຄ້ຳປະກັນ</span>
                        </a>
                    </li>
                    <li><a href="loan_agreement_select.php" aria-expanded="false">
                            <i style="font-size: 28px;" class="bi bi-card-checklist"></i>
                            <span style="font-size: 16px;" class="nav-text">ລາຍງານຂໍ້ມຸນສັນຍາກູ້ຢຶມ</span>
                        </a>
                    </li>
                    <li><a href="credit_release_select.php" aria-expanded="false">
                            <i style="font-size: 30px;" class="bi bi-box-arrow-right"></i>
                            <span style="font-size: 16px;" class="nav-text">ລາຍງານຂໍ້ມູນປ່ອຍສິນເຊື່ອ</span>
                            </a>
                    </li>
                    <li><a  class="ai-icon" aria-expanded="false"href="debt_select.php">
                            <i style="font-size: 30px;" class="bi bi-cash-stack"></i>
                            <span style="font-size: 16px;"class="nav-text">ລາຍງານຂໍ້ມູນໜີ້ສິນ</span>
                        </a>
                    </li>
                    <li><a href="payment_select.php" aria-expanded="false">
                            <i style="font-size: 30px;" class="bi bi-box-arrow-left"></i>
                            <span style="font-size: 16px;"class="nav-text">ລາຍງານຂໍ້ມູນການຈ່າຍຄ່າງວດ</span>

                        </a>
                    </li>
                    <li><a href="close_payment_select.php" aria-expanded="false">
                            <i style="font-size: 30px;" class="bi bi-credit-card-2-front-fill"></i>
                            <span style="font-size: 16px;"class="nav-text">ລາຍງານຂໍ້ມູນການປິດສັນຍາ</span>

                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i style="font-size: 30px;" class="bi bi-person-lines-fill"></i>
                            <span style="font-size: 16px;"class="nav-text">ລາຍງານຂໍ້ມູນພະນັກງານ</span>
                        </a>
                        <ul aria-expanded="false">
                        <li><a style="font-size: 16px;" href="user_select_counter.php">ລາຍງານຂໍ້ມູນພະນັກງານເຄົາເຕີ້</a></li>
                        <li><a style="font-size: 16px;" href="user_select_finance.php">ລາຍງານຂໍ້ມູນພະນັກງານການເງິນ</a></li>
                        <li><a style="font-size: 16px;" href="user_select_credit.php">ລາຍງານຂໍ້ມູນພະນັກງານສິນເຊື່ອ</a></li>
                        </ul>
                    </li>


                  
                    
                    <li><a aria-expanded="false" href="user_select.php">
                            <i style="font-size: 30px;" class="bi bi-person-bounding-box"></i>
                            <span style="font-size: 16px;"class="nav-text">ລາຍງານຂໍ້ມູນຜູ້ນຳໃຊ້</span>
                        </a>
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">ຂໍ້ມູນລູກຄ້າ</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">ບັນທຶກຂໍ້ມູນລູກຄ້າ</a></li>
                    </ol>
                </div>
                <!-- row -->
                <form action="" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ຂໍ້ມູນເອກະສານຢືນຢັນຕົວຕົນ</h4>
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
                                                                    <input class="file-upload-input cus_image" name="cus_image" type='file' onchange="readURL(this);" accept="image/*" required="" />
                                                                    <div class="drag-text">
                                                                        <h3 style="margin-top: 5.3rem"><i class="bi bi-cloud-arrow-up-fill me-1"></i><b>ອັບໂຫຼດຮູ້ບບັດປະຈຳຕົວ</b></h3>
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
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດລູກຄ້າ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                                                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                                                                </svg></span>
                                                            <input type="text" class="form-control cus_runing" name="cus_runing" id="validationCustom06" placeholder="$21.60" value="<?php echo $number; ?>" required="">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດບັດປະຈຳຕົວ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                                                </svg></span>
                                                            <input type="text" class="form-control cus_national_id" name="cus_national_id" id="validationCustom06" placeholder="00-0000000" required="">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ວັດໝົດອາຍຸບັດປະຈຳຕົວ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
                                                                    <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z" />
                                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z" />
                                                                </svg></span>
                                                            <input type="date" class="form-control cus_national_id_expiry_date" name="cus_national_id_expiry_date" id="validationCustom06" placeholder="$21.60" required="">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດໜັງສືເດິນທາງ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pass-fill" viewBox="0 0 16 16">
                                                                    <path d="M10 0a2 2 0 1 1-4 0H3.5A1.5 1.5 0 0 0 2 1.5v13A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 12.5 0H10ZM4.5 5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1Zm0 2h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1Z" />
                                                                </svg></span>
                                                            <input type="text" class="form-control cus_passprot_number" name="cus_passprot_number" id="validationCustom06" placeholder="P 0000000">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label class="col-form-label" for="validationCustom06">ວັດໝົດອາຍຸໜັງສືເດິນທາງ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
                                                                    <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z" />
                                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z" />
                                                                </svg></span>
                                                            <input type="date" class="form-control cus_passprot_expiry_date" name="cus_passprot_expiry_date" id="validationCustom06" placeholder="$21.60">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດປຶ້ມສຳມະໂນຄົວ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-postcard-fill" viewBox="0 0 16 16">
                                                                    <path d="M11 8h2V6h-2v2Z" />
                                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm8.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 0 .5.5H6a.5.5 0 0 0 0-1H2.5a.5.5 0 0 0-.5.5ZM2.5 7a.5.5 0 0 0 0 1H6a.5.5 0 0 0 0-1H2.5ZM2 9.5a.5.5 0 0 0 .5.5H6a.5.5 0 0 0 0-1H2.5a.5.5 0 0 0-.5.5Zm8-4v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5Z" />
                                                                </svg></span>
                                                            <input type="text" class="form-control cus_familybook_id" name="cus_familybook_id" id="validationCustom06" placeholder="ປ້ອນລະຫັດປຶ້ມສຳມະໂນຄົວ...">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດແຂວງອອກປື້ມສຳມະໂນຄົວ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                                                </svg></span>
                                                            <input type="text" class="form-control cus_familybook_pv_code" name="cus_familybook_pv_code" id="validationCustom06" placeholder="LA-...">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ວັນທີອອກປຶ້ມສຳມະໂນຄົວ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
                                                                    <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z" />
                                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z" />
                                                                </svg></span>
                                                            <input type="date" class="form-control cus_familybook_issue_date" name="cus_familybook_issue_date" id="validationCustom06" placeholder="$21.60">
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
                                                    <label class="col-form-label" for="validationCustom06">ຊື່ ແລະ ນາມສະກຸນ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                                <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                                            </svg></span>
                                                        <input type="text" class="form-control cus_fname" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="cus_fname">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <label class="col-form-label" for="validationCustom06">ວັນເດືອນປີເກິດ
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
                                                                        <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z" />
                                                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z" />
                                                                    </svg></span>
                                                                <input type="date" class="form-control cus_dob" id="validationCustom01" placeholder="" required="" name="cus_dob">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="col-form-label" for="validationCustom06">ອາຍຸ
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control cus_age" id="validationCustom01" placeholder="ປ້ອນອາຍຸ..." required="" name="cus_age">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ບ້ານຢູ່ປັດຈຸບັນ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                                            </svg></span>
                                                        <input type="text" class="form-control cus_vill" id="validationCustom01" placeholder="ບ້ານ..." required="" name="cus_vill">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ເມືອງ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                                                <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                                                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z" />
                                                            </svg></span>
                                                        <input type="text" class="form-control cus_dis" id="validationCustom01" placeholder="ເມືອງ..." required="" name="cus_dis">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label class="col-form-label" for="validationCustom06">ແຂວງ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                                                <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V.5ZM2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-1 2v1H2v-1h1Zm1 0h1v1H4v-1Zm9-10v1h-1V3h1ZM8 5h1v1H8V5Zm1 2v1H8V7h1ZM8 9h1v1H8V9Zm2 0h1v1h-1V9Zm-1 2v1H8v-1h1Zm1 0h1v1h-1v-1Zm3-2v1h-1V9h1Zm-1 2h1v1h-1v-1Zm-2-4h1v1h-1V7Zm3 0v1h-1V7h1Zm-2-2v1h-1V5h1Zm1 0h1v1h-1V5Z" />
                                                            </svg></span>
                                                        <input type="text" class="form-control cus_pro" id="validationCustom01" placeholder="ແຂວງ..." required="" name="cus_pro">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ເບີໂທ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                            </svg></span>
                                                        <input type="number" class="form-control cus_tel_phone" id="validationCustom01" placeholder="ປ້ອນເບີໂທ..." required="" value="" name="cus_tel_phone">
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ອີເມວ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                                                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                                                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                                            </svg></span>
                                                        <input type="text" class="form-control cus_email" id="validationCustom01" placeholder="...@gmail.com" name="cus_email">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="col-form-label" for="validationCustom06">ເຊື່ອຊາດ
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                                                        <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                                                        <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                                                    </svg></span>
                                                                <input type="text" class="form-control cus_nationality" id="validationCustom01" placeholder="ປ້ອນເຊື່ອຊາດ..." name="cus_nationality">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="col-form-label" for="validationCustom06">ອາຊີບ
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                                                        <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                                                        <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                                                    </svg></span>
                                                                <input type="text" class="form-control cus_job" id="validationCustom01" placeholder="ອາຊີບ..." name="cus_job">
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
                                                    <label class="col-form-label" for="validationCustom06">ຈຸດປະສົງໃນການກູ້ຢຶມເງິນເພື່ອ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-bar-contract" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M3.646 14.854a.5.5 0 0 0 .708 0L8 11.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708zm0-13.708a.5.5 0 0 1 .708 0L8 4.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zM1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8z" />
                                                            </svg></span>
                                                        <input type="text" class="form-control cus_purpose_money" id="validationCustom01" placeholder="ປ້ອນຈຸດປະສົງໃນການກູ້ຢຶມເງິນເພື່ອ..." name="cus_purpose_money" required>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ຈຳນວນເງິນສະເໜີຂໍ້ກູ້ຢຶມ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                        <input type="number" class="form-control cus_qty_money" id="cus_qty_money" placeholder="ປ້ອນຈຳນວນເງິນ..." name="cus_qty_money" aria-describedby="inputGroupPrepend" required>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ກຳນົດເວລາ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
                                                                <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z" />
                                                            </svg></span>
                                                        <select class="form-control form-select cus_date_of_loan" aria-label="Default select example" id="cus_date_of_loan" required="" name="cus_date_of_loan">
                                                            <option value="">ເລື້ອກ</option>
                                                            <option value="3">3 ເດືອນ</option>
                                                            <option value="6">6 ເດືອນ</option>
                                                            <option value="12">12 ເດືອນ</option>
                                                            <option value="24">24 ເດືອນ</option>
                                                            <option value="36">36 ເດືອນ</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ຊັບສົມບັດຄ້ຳປະກັນ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                            </svg></span>
                                                        <select class="form-control cus_collateral_assets" id="validationCustom01" required="" name="cus_collateral_assets">
                                                            <option value="">ເລື້ອກ</option>
                                                            <option value="ບໍ່ມີຊັບສົມບັດຄ້ຳປະກັນ">ບໍ່ມີຊັບສົມບັດຄ້ຳປະກັນ</option>
                                                            <option value="ມີຊັບສົມບັດຄ້ຳປະກັນ">ມີຊັບສົມບັດຄ້ຳປະກັນ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label class="col-form-label" for="validationCustom06">ແຫຼ່ງລາຍຮັບປະຈຳທີ່ຈະມາຊຳລະໜີ່
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                                            </svg></span>
                                                        <input type="text" class="form-control cus_regular_money" id="validationCustom01" placeholder="ປ້ອນຈຸດປະສົງໃນການກູ້ຢຶມເງິນເພື່ອ..." name="cus_regular_money" required>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ຮູບແບບການຊຳລະ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                            </svg></span></span>
                                                        <select class="form-control cus_funding" id="validationCustom01" required="" name="cus_funding">
                                                            <option value="">ເລື້ອກ</option>
                                                            <option value="ຊຳລະຕົ້ນທຶນຈ່າຍຄັ້ງດຽວເມື່ອຄົບກຳນົດສັນຍາ, ແຕ່ດອກເບ້ຍຈ່າຍເປັນແຕ່ລະເດືອນ">ຊຳລະຕົ້ນທຶນຈ່າຍຄັ້ງດຽວເມື່ອຄົບກຳນົດສັນຍາ, ແຕ່ດອກເບ້ຍຈ່າຍເປັນແຕ່ລະເດືອນ</option>
                                                            <option value="ຊຳລະຕົ້ນທຶນ ແລະ ດອກເບ້ຍເປັນແຕ່ລະເດືອນ">ຊຳລະຕົ້ນທຶນ ແລະ ດອກເບ້ຍເປັນແຕ່ລະເດືອນ</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-form-label" for="validationCustom06">ປະຫວັດການກູ້ຢຶມທີ່ຜ່ານມາ ຫຼື ປະຫວັດທຸລະກິດ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                                                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                                <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                                                            </svg></span>
                                                        <textarea style="height: 145px;" type="text" class="form-control cus_laugh_data" id="validationCustom01" placeholder="" name="cus_laugh_data"></textarea>
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
                                                            <label class="form-label" for="validationCustom01">ເງິນເດືອນປະຈຳ (ຜົວ-ເມຍ)</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control income" id="income" placeholder="00.0" name="cus_income_salary" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຮັບຈາກສະມາຊິກຄອບຄົວ</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control income" id="income" placeholder="00.0" name="cus_income_famiry" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຮັບຈາກການຄ້າຂາຍ</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control income" id="income" placeholder="00.0" name="cus_income_trading" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຮັບຈາກການໃຫ້ເຊົ່າ</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control income" id="income" placeholder="00.0" name="cus_income_rental" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຮັບພິເສດອື່ນໆ</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control income" id="income" placeholder="00.0" name="cus_special_income" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລວມລາຍຮັບ</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px;" type="hidden" class="form-control text-success cus_total_income" id="cus_total_income" placeholder="00.0" name="cus_total_income" aria-describedby="inputGroupPrepend" required>
                                                            </div>
                                                            <input style="border: none; font-size: 18px;" type="text" class="form-control text-success cus_total_income0" id="cus_total_income0" placeholder="00.0" name="cus_total_income0" aria-describedby="inputGroupPrepend" required>
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
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍໃນການລົງທຶນຄ້າຂາຍ</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control expenditure" id="expenditure" placeholder="00.0" name="cus_expenditure_invest" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍຄ່າເຊົ່າເຮືອນ</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control expenditure" id="expenditure" placeholder="00.0" name="cus_expenditure_house_rent" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍປົກກະຕິໃນຄົວເຮືອນ</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control expenditure" id="expenditure" placeholder="00.0" name="cus_expenditure_normal" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍໜີ່ສິນອື່ນໆ</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control expenditure" id="expenditure" placeholder="00.0" name="cus_expenditure_debt" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລາຍຈ່າຍອື່ນໆ</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input type="text" class="form-control expenditure" id="expenditure" placeholder="00.0" name="cus_expenditure_other" aria-describedby="inputGroupPrepend">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="validationCustom01">ລວມລາຍຈ່າຍ</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px;" type="hidden" class="form-control text-danger cus_total_expenses" id="cus_total_expenses" placeholder="00.0" name="cus_total_expenses" aria-describedby="inputGroupPrepend" required>
                                                            </div>
                                                            <input style="border: none; font-size: 18px;" type="text" class="form-control text-danger cus_total_expenses0" id="cus_total_expenses0" placeholder="00.0" name="cus_total_expenses0" aria-describedby="inputGroupPrepend" required>
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
                                                                <input style="border: none; font-size: 18px;" type="text" class="form-control text-success percentage_income" id="percentage_income" placeholder="0.00" name="percentage_income" aria-describedby="inputGroupPrepend" readonly required>
                                                                <span style="font-size: 18px; border: none;" class="input-group-text" id="inputGroupPrepend">%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-1">
                                                            <label class="form-label text-danger" for="validationCustom01">ເປີເຊັນຂອງລາຍຈ່າຍ:</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px;" type="text" class="form-control text-danger percentage_expenses" id="percentage_expenses" placeholder="0.00" name="percentage_expenses" aria-describedby="inputGroupPrepend" readonly required>
                                                                <span style="font-size: 18px; border: none;" class="input-group-text" id="inputGroupPrepend">%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="mb-1">
                                                            <label class="form-label text-info" for="validationCustom01">ຜົນໄດ້ຮັບຕົວຈິງ:</label>
                                                            <div class="input-group">
                                                                <input style="border: none; font-size: 18px;" type="hidden" class="form-control text-info cus_amount_income" id="cus_amount_income" placeholder="0.00" name="cus_amount_income" aria-describedby="inputGroupPrepend" readonly required>
                                                                <span style="font-size: 18px; border: none;" class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                <input style="border: none; font-size: 18px;" type="text" class="form-control text-info cus_amount_income0" id="cus_amount_income0" placeholder="0.00" name="cus_amount_income0" aria-describedby="inputGroupPrepend" required>
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
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                                            </svg></span>
                                        <input type="text" class="form-control" name="doc_name" id="validationCustom01" placeholder="ປ້ອນຊື່ເອກະສານ...">
                                    </div>
                                    <label class="col-form-label" for="validationCustom06">ອັບໂຫຼດເອກະສານ
                                        <span class="text-danger">ອັບໂຫລດສະເພາະຟາຍ PDF ເທົ່ານັ້ນ*</span>
                                    </label>

                                    <label for="images" class="drop-container">
                                        <span class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດເອກກະສານ</span>
                                        <br>
                                        <input type="file" id="images" name="doc_file" accept="application/pdf">
                                    </label>

                                </div>

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