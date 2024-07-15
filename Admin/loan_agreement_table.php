<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_satus'] === "ແອັດມິນ") {
} else {
    // User is not logged in or has incorrect user_status, redirect back to login page
    header("Location: http://localhost/Loan-management-system/login");
    exit();
} ?>

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

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 11px;
            text-align: center;
            color: black;
            height: 11px;
            font-family: Phetsarath OT;
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

                if (cus_id == "") {
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

        $cus_runing = $_POST['cus_runing'];
        $cus_national_id = $_POST['cus_national_id'];
        $cus_national_id_expiry_date = $_POST['cus_national_id_expiry_date'];
        $cus_passprot_number = $_POST['cus_passprot_number'];
        $cus_passprot_expiry_date = $_POST['cus_passprot_expiry_date'];
        $cus_familybook_id = $_POST['cus_familybook_id'];
        $cus_familybook_pv_code = $_POST['cus_familybook_pv_code'];
        $cus_familybook_issue_date = $_POST['cus_familybook_issue_date'];
        $cus_fname = $_POST['cus_fname'];
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
        $cus_status = $_POST['cus_status'];
        $cus_image = $_FILES['cus_image'];
        $doc_name = $_POST['doc_name'];

        $cus_doc2 = $_POST['cus_doc2'];
        $upload_file = $_FILES['doc_file']['name'];
        $old_doc = "docs/";

        //มีการอัพโหลดไฟล์
        if ($upload_file != '') {

            $date1 = date("Ymd_His");

            $numrand = (mt_rand());
            $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');

            $typefile = strrchr($_FILES['doc_file']['name'], ".");


            if ($typefile == '.pdf') {

                $newname = 'doc_' . $numrand . $date1 . $typefile;
                $path_copy = $old_doc . $newname;

                $remove_file = move_uploaded_file($_FILES['doc_file']['tmp_name'], $path_copy);
                if ($remove_file) {
                    unlink($old_doc . $row['cus_doc']);
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
            $newname = $cus_doc2;
        }

        $img2 = $_POST['img2'];
        $upload_img = $_FILES['cus_image']['name'];
        $directory = "photo_id/";

        if ($upload_img != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode(".", $cus_image['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;
            $filePath = "photo_id/" . $fileNew;

            if (in_array($fileActExt, $allow)) {
                if ($cus_image['size'] > 0 && $cus_image['error'] == 0) {
                    $remove =  move_uploaded_file($cus_image['tmp_name'], $filePath);
                    if ($remove) {
                        unlink($directory . $row['cus_image']);
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
            $fileNew = $img2;
        }

        $sql = $conn->prepare("UPDATE customers SET 
            cus_national_id = :cus_national_id,
            cus_national_id_expiry_date = :cus_national_id_expiry_date,  
            cus_passprot_number = :cus_passprot_number,
            cus_passprot_expiry_date = :cus_passprot_expiry_date,
            cus_familybook_id = :cus_familybook_id,
            cus_familybook_pv_code = :cus_familybook_pv_code,
            cus_familybook_issue_date = :cus_familybook_issue_date,
            cus_fname = :cus_fname,
            cus_dob = :cus_dob,
            cus_vill = :cus_vill,
            cus_dis = :cus_dis,
            cus_pro = :cus_pro,
            cus_status = :cus_status,
            cus_tel_phone = :cus_tel_phone,
            cus_email = :cus_email,
            cus_purpose_money = :cus_purpose_money,
            cus_qty_money = :cus_qty_money,
            cus_date_of_loan = :cus_date_of_loan,
            cus_collateral_assets = :cus_collateral_assets,
            cus_regular_money = :cus_regular_money,
            cus_funding = :cus_funding,
            cus_laugh_data = :cus_laugh_data,
            cus_income_salary = :cus_income_salary,
            cus_income_famiry = :cus_income_famiry,
            cus_income_trading = :cus_income_trading,
            cus_income_rental = :cus_income_rental,
            cus_special_income = :cus_special_income,
            cus_total_income = :cus_total_income,
            cus_expenditure_invest = :cus_expenditure_invest,
            cus_expenditure_house_rent = :cus_expenditure_house_rent,
            cus_expenditure_normal = :cus_expenditure_normal,
            cus_expenditure_debt = :cus_expenditure_debt,
            cus_expenditure_other = :cus_expenditure_other,
            cus_total_expenses = :cus_total_expenses,
            percentage_income = :percentage_income,
            percentage_expenses = :percentage_expenses,
            cus_amount_income = :cus_amount_income,
            cus_image = :cus_image,
            cus_doc_name = :cus_doc_name,
            cus_doc = :cus_doc WHERE cus_id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":cus_national_id", $cus_national_id);
        $sql->bindParam(":cus_national_id_expiry_date", $cus_national_id_expiry_date);
        $sql->bindParam(":cus_passprot_number", $cus_passprot_number);
        $sql->bindParam(":cus_passprot_expiry_date", $cus_passprot_expiry_date);
        $sql->bindParam(":cus_familybook_id", $cus_familybook_id);
        $sql->bindParam(":cus_familybook_pv_code", $cus_familybook_pv_code);
        $sql->bindParam(":cus_familybook_issue_date", $cus_familybook_issue_date);
        $sql->bindParam(":cus_fname", $cus_fname);
        $sql->bindParam(":cus_dob", $cus_dob);
        $sql->bindParam(":cus_vill", $cus_vill);
        $sql->bindParam(":cus_dis", $cus_dis);
        $sql->bindParam(":cus_pro", $cus_pro);
        $sql->bindParam(":cus_status", $cus_status);
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
        $sql->bindParam(":cus_doc", $newname);
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

                                            <h1>ຕາຕະລາງຈ່າຍຄ່າງວດ</h1>

                                        </div>
                                        <ul class="navbar-nav header-right">
                                            <div style="margin-left: 2rem;" class="d-flex flex-row-reverse bd-highlight header-right">
                                                <a href="loan_agreement_select.php" class="btn btn-warning me-2">ຍົກເລີ້ກ</a>
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
                                <li class="breadcrumb-item"><a href="loan_agreement_select.php" class="text-danger">ກັບຄືນ</a></li>
                                <li class="breadcrumb-item active"><a href="">ລາຍງານຂໍ້ມຸນສັນຍາກູ້ຢຶມ</a></li>
                                <li class="breadcrumb-item active"><a href="loan_agreement_select.php">ລາຍງານຕາຕະລາງຈ່າຍຄ່າງວດ</a></li>
                            </ol>
                        </div>
                        <!-- row -->

                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $stmt = $conn->query("SELECT *
                            FROM customers c
                            JOIN loan_agreement l ON c.cus_id = l.cus_id
                            JOIN credit_release cr ON c.cus_id = cr.cus_id where c.cus_id='$id'");
                            $stmt->execute();
                            $data = $stmt->fetch();
                        }
                        ?>
                        <div class=" row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-validation">
                                            <div class="row">
                                                <div class="col-xl-12 doc_0">
                                                    <center>
                                                        <h3 style=" font-family: Phetsarath OT;"><u>ຕາຕະລາງຊຳລະໜີ້ສິນ</u></h3><br>
                                                    </center>
                                                    <div style="font-family: Phetsarath OT;" class="row">
                                                        <div class="col-lg-3">
                                                            <h4>ວົງເງິນກູ້ຢຶມ</h4>
                                                            <h4>ອັດຕາດອກເບຍຕໍ່ເດືອນ</h4>
                                                            <h4>ກຳນົດເວລາ</h4>
                                                            <h4>ວັນທີ່ປ່ອຍກູ້</h4>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <h4 class="totel_pham"><?php echo number_format($data['lg_installments'])?> ກີບ</h4>
                                                            <h4 class="totel_percens"><?php echo $data['lg_interest'] ?> %</h4>
                                                            <h4 class="totle_mouth"><?php echo $data['lg_set_month'] ?> ເດືອນ</h4>
                                                            <h4><?php echo $data['cr_date_in'] ?></h4>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <h4>ຊື່ ແລະ ນາມສະກຸນ</h4>
                                                            <h4>ລະຫັດລູກຄ້າ</h4>
                                                            <h4>ສັນຍາເງິນກູ້ເລກທີ່</h4>
                                                            <h4>ລົງວັນທີ</h4>
                                                            <h4>ເບີໂທ</h4>
                                                        </div>
                                                        <div class="col-lg-3 text-end">
                                                            <h4 class="totel_fname"><?php echo $data['cus_fname'] ?></h4>
                                                            <h4 class="totel_cus_runing_id"><?php echo $data['cus_runing'] ?></h4>
                                                            <h4><?php echo $data['lg_runing_id'] ?></h4>
                                                            <h4><?php echo $data['lg_date_in'] ?></h4>
                                                            <h4 class="totle_tel"><?php echo $data['cus_tel_phone'] ?></h4>
                                                        </div>
                                                        <h4 style="margin-top: -1.8rem;">ຊື່ບັນຊີ : S&K NON-DEPOSIT TAKING MICRO FINANCE INSTITUTLON</h4>
                                                        <h4>ເລກບັນຊີ: 013120001019926002</h4>
                                                    </div><br>
                                                    <div style=" font-family: Phetsarath OT;" class="show_data">
                                                    <table class="display" border=1 style="Width:100%;">
                                                        <tr>
                                                            <th>ຈຳນວນງວດ</th>
                                                            <th>ວັນທີ</th>
                                                            <th>ຕົນທຶນ</th>
                                                            <th>ດອກເບ້ຍ</th>
                                                            <th>ຕົ້ນທຶນ + ດອກເບຍ</th>
                                                            <th>ຍອດເຫຼືອໜີ່</th>
                                                            <th>ວັນທີຊຳລະ</th>
                                                            <th>ເຊັນຜູ້ມອບເງິນ</th>
                                                            <th>ເຊັນຜູ້ຮັບເງິນ</th>
                                                        </tr>
                                                        <?php
                                                        $ca_set_month = $data['lg_set_month'];
                                                        $ca_amount_releaseds = $data['cr_ap_mounnt'];
                                                        $ca_interest = $data['cr_interest'];

                                                        echo "<tr>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td>" . number_format($ca_amount_releaseds) . "</td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "</tr>";
                                                        ?>
                                                        <?php

                                                        $ca_set_month = $data['lg_set_month'];
                                                        $ca_amount_releaseds = $data['cr_ap_mounnt'];
                                                        $ca_interest = $data['cr_interest'];

                                                        $total_capital_cost = ($ca_amount_releaseds / $ca_set_month);

                                                        $total_percen = ($ca_interest / 100) * $ca_amount_releaseds;
                                                        $total_capital_and_interest = $total_capital_cost + $total_percen;
                                                        $Remaining = $ca_amount_releaseds - $total_capital_cost;
                                                        $total_capital_costs = $ca_set_month * $total_capital_cost;
                                                        $total_ca_interests = $ca_set_month * $total_percen;
                                                        $Remaining_plus = $ca_set_month * $total_capital_and_interest;
                                                        // Set timezone

                                                        date_default_timezone_set("Asia/Bangkok");

                                                        // Start date
                                                        $date = date('d-m-Y', strtotime("+1 month"));
                                                        // End date
                                                        $end_date = date('d-m-Y', strtotime(+$ca_set_month . "month"));


                                                        $x = 1;
                                                        while (strtotime($date) <= strtotime($end_date)) {
                                                            echo "<tr>";
                                                            echo "<td>ງວດທີ່ $x </td>";
                                                            echo "<td>" . date("d-m-Y", strtotime($date)) . "</td>";
                                                            echo "<td>" . number_format($total_capital_cost) . "</td>";
                                                            echo "<td>" . number_format($total_percen) . "</td>";
                                                            echo "<td>" . number_format($total_capital_and_interest) . "</td>";
                                                            echo "<td>" . number_format($Remaining) . "</td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "</tr>";
                                                            $x++;
                                                            $date = date("d-m-Y", strtotime("+1 month", strtotime($date)));
                                                            $Remaining -= $total_capital_cost;
                                                        }
                                                        ?>
                                                        <?php
                                                        echo "<tr>";
                                                        echo "<td></td>";
                                                        echo "<td><b>Total</b></td>";
                                                        echo "<td>" . number_format($total_capital_costs) . "</td>";
                                                        echo "<td>" . number_format($total_ca_interests) . "</td>";
                                                        echo "<td>" . number_format($Remaining_plus) . "</td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "</tr>";
                                                        ?>
                                                    </table>
                                                    </div>
                                                    <br>
                                                    <hr>
                                                    <br>
                                                    <hr>
                                                    <br>
                                                    <button style=" font-family: Noto Sans Lao;" type="button" name="button" id="print" onclick="window.print()" class="btn me-2 btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-printer-fill me-2" viewBox="0 0 16 16">
                                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                        </svg>ປິ້ນ</button>
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