
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
    <title>ແບບຟອມບັນທຶກຂໍ້ມູນການເຮັກສັນຍາ</title>


    <!-- SWEETALERT2 AND JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="vendor/select2/css/select2.min.css">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- //FORM AND FONT -->
    <!-- <link href="css/Font.css" rel="stylesheet"> -->
    <link href="css/customer_form.css" rel="stylesheet">

    <link rel="stylesheet" href="css/loan_agreement_insert.css" media="print">


    <style>
        * {
            font-family: Noto Sans Lao;
        }

        #image_location {
            display: none;
        }

        #image_location1 {
            display: none;
        }

        #image {
            display: none;
        }

        #image1 {
            display: none;
        }

        #image2 {
            display: none;
        }

        #image3 {
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

                var ca_set_month = $(".ca_set_month").val();
                var print = $(".print").val();


                var lg_doc_name0 = $(".lg_doc_name0").val();
                var lg_doc_name1 = $(".lg_doc_name1").val();
                var lg_doc0 = $(".lg_doc0").val();
                var lg_doc1 = $(".lg_doc1").val();

                if (cus_runing == "" || cus_fname == "" || cus_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດລູກຄ້າກ່ອນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (ca_set_month == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນກຳນົດໄລຍະເວລາ / ເດືອນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (print == "") {
                    Swal.fire(
                        'ກະລຸນາປິ້ນ ຫຼື ບັນທຶກຂໍ້ມູນຕາຕະລາງຊຳລະໜີ້ສິນກ່ອນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (lg_doc_name0 == "" || lg_doc0 == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເອກກະກະສານອ້າງອິງໃຫ້ຄົບຖ່ວນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (lg_doc_name1 == "" || lg_doc1 == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເອກກະກະສານຄິດໄລ່ຄ່າງວດໃຫ້ຄົບຖ່ວນ !',
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
                $.post("loan_agreement_get_data_customer.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_employee").val(output);
                    })
                $.post("loan_agreement_get_ca_runing_id.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_runing_id").val(output);
                    })
                $.post("loan_agreement_get_ca_type.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_type").val(output);
                    })
                $.post("loan_agreement_get_pham.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".pham").val(output);
                    })
                $.post("loan_agreement_get_phams.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".phams").val(output);
                    })

                $.post("loan_agreement_get_amount_released.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_amount_released").val(output);
                    })
                $.post("loan_agreement_get_amount_releaseds.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_amount_releaseds").val(output);
                    })
                $.post("loan_agreement_get_interest.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_interest").val(output);
                    })
                $.post("loan_agreement_get_gt_runing_id.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".gt_id").val(output);
                    })
                $.post("loan_agreement_get_collateral_id.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".collateral_id").val(output);
                    })

                $.post("loan_agreement_get_ca_id.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_id").val(output);
                    })
                $.post("loan_agreement_get_playmentr.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".ca_playment").val(output);
                    })

                $.post("loan_agreement_get_totel_pham.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".totel_pham").html(output);
                    })

                $.post("loan_agreement_get_totel_percens.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".totel_percens").html(output);
                    })

                $.post("loan_agreement_get_totle_mouth.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".totle_mouth").html(output);
                    })
                $.post("loan_agreement_get_totel_fname.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".totel_fname").html(output);
                    })
                $.post("loan_agreement_get_totel_cus_runing_id.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".totel_cus_runing_id").html(output);
                    })
                $.post("loan_agreement_get_totle_tel.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".totle_tel").html(output);
                    })

                $.post("loan_agreement_get_table_cllateral.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".table_cllateral").html(output);
                    })
                $.post("loan_agreement_get_tables_guarantor.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".table_guarantor").html(output);
                    })
            });

            $(".ca_set_month").keyup(function() {
                var a = $(".ca_set_month").val();
                var b = $(".ca_amount_releaseds").val();
                var c = $(".ca_interest").val();
                var d = $(".cus_id").val();

                $.post("loan_agreement_get_tables.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(output) {
                        $(".show_data").html(output);
                    })

            })
            $(".ca_set_month").keyup(function() {
                var a = $(".ca_set_month").val();
                var b = $(".ca_amount_releaseds").val();
                var c = $(".ca_interest").val();
                var d = $(".cus_id").val();
                $.post("loan_agreement_get_tables_data_print.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $("#show_data_print").html(outputa);
                    })
            })

            $(".ca_set_month").keyup(function() {
                var a = $(".ca_set_month").val();
                var b = $(".ca_amount_releaseds").val();
                var c = $(".ca_interest").val();
                var d = $(".cus_id").val();
                $.post("loan_agreement_get_lg_total_interest.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $(".lg_total_interest").val(outputa);
                    })
                $.post("loan_agreement_get_lg_capital_plus_interest.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $(".lg_capital_plus_interest").val(outputa);
                    })
                $.post("loan_agreement_get_lg_installments.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $(".lg_installments").val(outputa);
                    })
                $.post("loan_agreement_get_lg_totle_interest.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $(".lg_totle_interest").val(outputa);
                    })
                $.post("loan_agreement_get_amount_bepaid_month.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $(".amount_bepaid_month").val(outputa);
                    })
                $.post("loan_agreement_get_lg_taitel_amount_interest.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $(".lg_taitel_amount_interest").html(outputa);
                    })
                $.post("loan_agreement_get_lg_taitel_capital_plus_interest.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $(".lg_taitel_capital_plus_interest").html(outputa);
                    })
                $.post("loan_agreement_get_lg_taitel_amount_bepaid_month.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $(".lg_taitel_amount_bepaid_month").html(outputa);
                    })
                $.post("loan_agreement_get_lg_taitel_amount_bepaid_lastmonth.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(outputa) {
                        $(".lg_taitel_amount_bepaid_lastmonth").html(outputa);
                    })
                $.post("loan_agreement_get_lg_total_amount_interest.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c
                    },
                    function(output) {
                        $(".lg_total_amount_interest").val(output);
                    })

            })

            $(".lg_installments").keyup(function() {
                var a = $(".ca_set_month").val();
                var b = $(".ca_amount_releaseds").val();
                var c = $(".ca_interest").val();
                var d = $(".lg_installments").val();
                $.post("loan_agreement_get_chang_total_interest.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c,
                        lg_installments: d
                    },
                    function(outputa) {
                        $(".show_data").html(outputa);
                    })
            })

            $(".lg_installments").keyup(function() {
                var a = $(".ca_set_month").val();
                var b = $(".ca_amount_releaseds").val();
                var c = $(".ca_interest").val();
                var d = $(".lg_installments").val();
                $.post("loan_agreement_get_chang_total_interest_font11.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c,
                        lg_installments: d
                    },
                    function(outputa) {
                        $("#show_data_print").html(outputa);
                    })
            })

            $(".lg_installments").keyup(function() {
                var a = $(".ca_set_month").val();
                var b = $(".ca_amount_releaseds").val();
                var c = $(".ca_interest").val();
                var d = $(".lg_installments").val();
                $.post("loan_agreement_get_chang_total_amount_bepaid_month.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c,
                        lg_installments: d
                    },
                    function(outputa) {
                        $(".amount_bepaid_month").val(outputa);
                    })
                $.post("loan_agreement_get_chang_lg_taitel_amount_bepaid_month.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c,
                        lg_installments: d
                    },
                    function(outputa) {
                        $(".lg_taitel_amount_bepaid_month").html(outputa);
                    })
                $.post("loan_agreement_get_chang_lg_taitel_amount_bepaid_lastmonth.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c,
                        lg_installments: d
                    },
                    function(outputa) {
                        $(".lg_taitel_amount_bepaid_lastmonth").html(outputa);
                    })
                $.post("loan_agreement_get_chang_lg_taitel_lg_total_amount_interest.php", {
                        ca_set_month: a,
                        ca_amount_releaseds: b,
                        ca_interest: c,
                        lg_installments: d
                    },
                    function(outputa) {
                        $(".lg_total_amount_interest").html(outputa);
                    })

            })

            $('#print').click(function() {
                var a = $(".cus_runing").val();
                $.post("print_id.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".print").val(output);
                    });
            })

            let image_location = document.getElementById('image_location');
            let preview_image_location = document.getElementById('preview_image_location');

            image_location.onchange = evt => {
                const [file] = image_location.files;
                if (file) {
                    preview_image_location.src = URL.createObjectURL(file);
                }
            }
            // $(".ca_set_month").click(function() {
            //     var a = $(".ca_set_month").val();
            //     var b = $(".ca_amount_releaseds").val();
            //     var c = $(".ca_interest").val();
            //     var d = $(".cus_id").val();
            //     if(d == ""){
            //         Swal.fire(
            //             'ກະລຸນາປ້ອນລະຫັດລູກຄ້າກ່ອນ !',
            //             'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
            //             'warning'
            //         )
            //     }else{
            //     $.post("loan_agreement_get_tables.php", {
            //             ca_set_month: a,
            //             ca_amount_releaseds: b,
            //             ca_interest: c
            //         },
            //         function(output) {
            //             $(".show_data").html(output);
            //         })
            //     }    
            // })
        });
    </script>

    <?php
    require_once "config/db_s_and_k_project.php";
    require_once "config/conect_nal.php";

    //ຄຳນວນເລກທີ່ສັນຍາ
    $y = date('y');
    $query = "SELECT count(lg_id) FROM loan_agreement ORDER BY lg_id DESC LIMIT 1; ";
    $result = mysqli_query($conns, $query);
    $row = mysqli_fetch_array($result);
    if ($row == "") {
        $number = "LN/01/" . $y;
    } else {
        $lastid = $row[0];
        $idd = str_replace("LN/", "", $lastid);
        $id = str_pad($idd + 1, 5, 0, STR_PAD_LEFT);
        $number = 'LN/' . $id . '/' . $y;
    }

    $sqls = mysqli_query($conns, "select *from loan_agreement");
    $sql_count_idct = mysqli_query($conns, "SELECT lg_id FROM loan_agreement ORDER BY lg_id DESC LIMIT 1");
    $show_lg_id = mysqli_fetch_array($sql_count_idct);

    date_default_timezone_set("Asia/Bangkok");
    $date_cltr = date('y');
    $date_time = date('his');
    $date_date = date('d');

    $datenow = date('d/m/Y');

    if (isset($_POST['submit'])) {

        $date1 = date("Ymd_His");
        $numrand = (mt_rand());

        $lg_doc0 = (isset($_POST['lg_doc0']) ? $_POST['lg_doc0'] : '');
        $upload_lg_doc0 = $_FILES['lg_doc0']['name'];

        if ($upload_lg_doc0 != '') {

            $typefile = strrchr($_FILES['lg_doc0']['name'], ".");

            if ($typefile == '.pdf') {

                $path = "loan_agreement_doc/";

                $newname = 'doc_' . $numrand . $date1 . $typefile;
                $path_copy = $path . $newname;

                move_uploaded_file($_FILES['lg_doc0']['tmp_name'], $path_copy);

                date_default_timezone_set("Asia/Bangkok");
                $lg_runing_id = $_POST['lg_runing_id'];
                $lg_type = $_POST['lg_type'];
                $ca_playment = $_POST['ca_playment'];
                $ca_set_month = $_POST['ca_set_month'];
                $lg_installments = $_POST['lg_installments'];
                $collateral_id = $_POST['collateral_id'];
                $ca_id = $_POST['ca_id'];
                $gt_id = $_POST['gt_id'];
                $lg_total_interest = $_POST['lg_total_interest'];
                $lg_capital_plus_interest = $_POST['lg_capital_plus_interest'];
                $lg_totle_interest = $_POST['lg_totle_interest'];
                $amount_bepaid_month = $_POST['amount_bepaid_month'];
                $pham = $_POST['pham'];
                $ca_amount_releaseds = $_POST['ca_amount_releaseds'];
                $ca_interest = $_POST['ca_interest'];

                $cus_status = 1;

                $lg_doc_name0 = $_POST['lg_doc_name0'];

                $cus_id  = $_POST['cus_id'];
                $cus_fname = $_POST['cus_fname'];
                $cus_runing = $_POST['cus_runing'];

                $date = date('d/m/Y H:i:s');
                $date1 = date('d/m/Y');

                $la_map0 = $_FILES['la_map0'];
                if (!empty($la_map0)) {
                    $allow0 = array('jpg', 'jpeg', 'png');
                    $extension0 = explode(".", $la_map0['name']);
                    $fileActExt0 = strtolower(end($extension0));
                    $fileNew0 = rand() . "." . $fileActExt0;
                    $filePath0 = "loan_agreement_images/" . $fileNew0;
                    if (in_array($fileActExt0, $allow0)) {
                        if ($la_map0['size'] > 0 && $la_map0['error'] == 0) {
                            move_uploaded_file($la_map0['tmp_name'], $filePath0);
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
                                        title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ la_map0',
                                        text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                        icon: 'error',
                                        showConfirmButton: true
                                    });
                                })
                            })
                        </script>";
                    }
                }

                $sql = $conn->prepare("INSERT INTO loan_agreement(lg_runing_id,lg_type,lg_playment,lg_set_month,lg_interest,lg_installments,lg_releaseds,lg_amount_releaseds,lg_totle_interest,lg_total_interest,lg_amount_bepaid_month,lg_capital_plus_interest,lg_status,lg_doc_name0,lg_doc0,lg_image,lg_date_in,lg_time_in,cus_id,collateral_id,ca_id,gt_id,cus_fname,cus_runing,user_id)
                VALUES(:lg_runing_id,:lg_type,:lg_playment,:lg_set_month,:lg_interest,:lg_installments,:lg_releaseds,:lg_amount_releaseds,:lg_totle_interest,:lg_total_interest,:lg_amount_bepaid_month,:lg_capital_plus_interest,:lg_status,:lg_doc_name0,'$newname','$fileNew0',curdate(),curtime(),:cus_id,:collateral_id,:ca_id,:gt_id,:cus_fname,:cus_runing,:user_id)");
                $sql->bindParam(":lg_runing_id", $lg_runing_id);
                $sql->bindParam(":lg_type", $lg_type);
                $sql->bindParam(":lg_playment", $ca_playment);
                $sql->bindParam(":lg_set_month", $ca_set_month);
                $sql->bindParam(":lg_interest", $ca_interest);
                $sql->bindParam(":lg_installments", $pham);
                $sql->bindParam(":lg_releaseds", $lg_installments);
                $sql->bindParam(":lg_amount_releaseds", $ca_amount_releaseds);
                $sql->bindParam(":lg_totle_interest", $lg_totle_interest);
                $sql->bindParam(":lg_total_interest", $lg_total_interest);
                $sql->bindParam(":lg_amount_bepaid_month", $amount_bepaid_month);
                $sql->bindParam(":lg_capital_plus_interest", $lg_capital_plus_interest);
                $sql->bindParam(":lg_status", $cus_status);
                $sql->bindParam(":lg_doc_name0", $lg_doc_name0);
                $sql->bindParam(":cus_id", $cus_id);
                $sql->bindParam(":collateral_id", $collateral_id);
                $sql->bindParam(":ca_id", $ca_id);
                $sql->bindParam(":gt_id", $gt_id);
                $sql->bindParam(":cus_fname", $cus_fname);
                $sql->bindParam(":cus_runing", $cus_runing);
                $sql->bindParam(":user_id", $_SESSION['user_id']);
                $sql->execute();

                if ($sql) {
                    $update0 = $conn->prepare("UPDATE customers SET cus_status = :cus_status WHERE cus_id = :cus_id");
                    $update0->bindParam(":cus_id", $cus_id);
                    $update0->bindParam(":cus_status", $cus_status);
                    $update0->execute();

                    $sql = mysqli_query($conns, "select la_id from collateral_land where cus_runing='$cus_runing' ");
                    $la_id = mysqli_fetch_array($sql);

                    $sqls = mysqli_query($conns, "select car_id from collateral_car where cus_runing='$cus_runing' ");
                    $car_id = mysqli_fetch_array($sqls);

                    $sqlss = mysqli_query($conns, "select ot_id from collateral_other where cus_runing='$cus_runing' ");
                    $ot_id = mysqli_fetch_array($sqlss);

                    if ($la_id <> 0) {

                        $update0 = $conn->prepare("UPDATE collateral_land SET la_status = :la_status WHERE cus_id = :cus_id");
                        $update0->bindParam(":cus_id", $cus_id);
                        $update0->bindParam(":la_status", $cus_status);
                        $update0->execute();
                    } else if ($car_id <> 0) {

                        $update0 = $conn->prepare("UPDATE collateral_car SET car_status = :car_status WHERE cus_id = :cus_id");
                        $update0->bindParam(":cus_id", $cus_id);
                        $update0->bindParam(":car_status", $cus_status);
                        $update0->execute();
                    } else if ($ot_pham <> 0) {

                        $update0 = $conn->prepare("UPDATE collateral_other SET ot_status = :ot_status WHERE cus_id = :cus_id");
                        $update0->bindParam(":cus_id", $cus_id);
                        $update0->bindParam(":ot_status", $cus_status);
                        $update0->execute();
                    }

                    $update0 = $conn->prepare("UPDATE credit_analysis SET ca_status = :ca_status WHERE cus_id = :cus_id");
                    $update0->bindParam(":cus_id", $cus_id);
                    $update0->bindParam(":ca_status", $cus_status);
                    $update0->execute();

                    $update0 = $conn->prepare("UPDATE guarantor SET gt_satatus = :gt_satatus WHERE cus_id = :cus_id");
                    $update0->bindParam(":cus_id", $cus_id);
                    $update0->bindParam(":gt_satatus", $cus_status);
                    $update0->execute();

                    $insert_debt = $conn->prepare("INSERT INTO debt(dt_type,dt_playment,dt_set_month,dt_interest,dt_installments,dt_releaseds,dt_amount_releaseds,dt_totle_interest,dt_total_interest,dt_amount_bepaid_month,dt_capital_plus_interest,dt_status,dt_date_in,dt_time_in,lg_runing_id,cus_id,cus_fname,cus_runing,user_id)
                    VALUES(:dt_type,:dt_playment,:dt_set_month,:dt_interest,:dt_installments,:dt_releaseds,:dt_amount_releaseds,:dt_totle_interest,:dt_total_interest,:dt_amount_bepaid_month,:dt_capital_plus_interest,:dt_status,curdate(),curtime(),:lg_runing_id,:cus_id,:cus_fname,:cus_runing,:user_id)");
                    $insert_debt->bindParam(":dt_type", $lg_type);
                    $insert_debt->bindParam(":dt_playment", $ca_playment);
                    $insert_debt->bindParam(":dt_set_month", $ca_set_month);
                    $insert_debt->bindParam(":dt_interest", $ca_interest);
                    $insert_debt->bindParam(":dt_installments", $pham);
                    $insert_debt->bindParam(":dt_releaseds", $lg_installments);
                    $insert_debt->bindParam(":dt_amount_releaseds", $ca_amount_releaseds);
                    $insert_debt->bindParam(":dt_totle_interest", $lg_totle_interest);
                    $insert_debt->bindParam(":dt_total_interest", $lg_total_interest);
                    $insert_debt->bindParam(":dt_amount_bepaid_month", $amount_bepaid_month);
                    $insert_debt->bindParam(":dt_capital_plus_interest", $lg_capital_plus_interest);
                    $insert_debt->bindParam(":dt_status", $cus_status);

                    $insert_debt->bindParam(":lg_runing_id", $lg_runing_id);

                    $insert_debt->bindParam(":cus_id", $cus_id);
                    $insert_debt->bindParam(":cus_fname", $cus_fname);
                    $insert_debt->bindParam(":cus_runing", $cus_runing);
                    $insert_debt->bindParam(":user_id", $_SESSION['user_id']);
                    $insert_debt->execute();

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
                                                            document.location.href = 'loan_agreement_select.php';
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
                            con: 'success',
                            showConfirmButton: true,
                            preConfirm: function() {
                            document.location.href = 'loan_agreement_insert.php';
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
                            title: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ',
                            text: 'ອັບໂຫຼດຟາຍເອກະສານໄດ້ສະເພາະຟາຍ PDF ເທົ່ານັ້ນ!!!',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    })
                })
                       </script>";
            }
        }
    }

    ?>

</head>

<body>
<?php
if(@$_SESSION['checked']<>1){
	echo "<script>
  alert('ລົງຊືີ່ເຂົ້າໃຊ້ກ່ອນ')
  location='index.php';
	</script>";
	}
else{  
?>
    <!--*******************
        Preloader start
    ********************-->
    <div style=" font-family: Noto Sans Lao;" id="preloader">
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
        <div style=" font-family: Noto Sans Lao;" class="nav-header">
            <a href="index.html" class="brand-logo">
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
        <div style=" font-family: Noto Sans Lao;" class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                ສັນຍາກູ້ຢຶມເງິນ
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
                <div style=" font-family: Noto Sans Lao;" class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">ສັນຍາກູ້ຢຶມເງິນ</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">ບັນທຶກຂໍ້ມູນການເຮັດສັນຍາກູ້ຢຶມເງິນ</a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div style="height: 3000px;" class="card">
                            <div class="card-header">
                                <h4 style=" font-family: Noto Sans Lao;" class="card-title">ຟອມບັນທຶກຂໍ້ມູນການເຮັດສັນຍາກູ້ຢຶມເງິນ</h4>
                            </div>
                            <div class="card-body">
                                <form action="" id="collateral_insert" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">

                                    <!-- Nav tabs -->
                                    <div class="custom-tab-1">
                                        <ul style=" font-family: Noto Sans Lao;" class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a style="font-size: 16px;" class="nav-link active" data-bs-toggle="tab" href="#home1"> ຄິດໄລຄ່າງວດ</a>
                                            </li>
                                            <li style="font-size: 16px;" class="nav-item">
                                                <a style="font-size: 16px;" class="nav-link" data-bs-toggle="tab" href="#profile1"> ຂໍ້ມູນຫຼັກຊັບຄ້ຳປະກັນ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a style="font-size: 16px;" class="nav-link" data-bs-toggle="tab" href="#contact1">ຂໍ້ມູນຜູ້ຄ້ຳປະກັນ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a style="font-size: 16px;" class="nav-link" data-bs-toggle="tab" href="#message1"> ເອກກະສານອ້າງອິງ</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                                <div class="pt-4">
                                                    <div style="margin-top: -3rem;" class="card-body">
                                                        <div class="row from_row">
                                                            <div style=" font-family: Noto Sans Lao;" class="col-xl-12">
                                                                <div class="mb-1 row">
                                                                    <div class="col-xl-3">
                                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດລູກຄ້າ
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                            <input type="text" class="form-control cus_runing" id="validationCustom01" placeholder="ປ້ອນລະຫັດລູກຄ້າ..." required="" name="cus_runing">
                                                                        </div>
                                                                        <input type="hidden" class="form-control cus_fname" id="validationCustom01" placeholder="" required="" name="cus_fname" readonly>
                                                                        <input type="hidden" class="form-control cus_id" id="validationCustom01" placeholder="" required="" name="cus_id">
                                                                        <input type="hidden" class="form-control collateral_id" id="validationCustom01" placeholder="" required="" name="collateral_id">
                                                                        <input type="hidden" class="form-control ca_id" id="validationCustom01" placeholder="" required="" name="ca_id">
                                                                        <input type="hidden" class="form-control gt_id" id="validationCustom01" placeholder="" required="" name="gt_id">
                                                                        <input type="hidden" class="form-control print" id="validationCustom01" placeholder="" required="" name="print">
                                                                        <input type="hidden" class="form-control lg_runing_id" id="validationCustom01" value="<?php echo $number ?>" required="" name="lg_runing_id">

                                                                        <input type="hidden" class="form-control lg_total_interest" id="validationCustom01" placeholder="" required="" name="lg_total_interest">
                                                                        <input type="hidden" class="form-control lg_capital_plus_interest" id="validationCustom01" placeholder="" required="" name="lg_capital_plus_interest">
                                                                        <input type="hidden" class="form-control lg_totle_interest" id="validationCustom01" placeholder="0.00" required="" name="lg_totle_interest">
                                                                        <input type="hidden" class="form-control amount_bepaid_month" id="validationCustom01" placeholder="0.00" required="" name="amount_bepaid_month">
                                                                        <input type="hidden" class="form-control pham" id="validationCustom01" placeholder="ປ້ອນວົງເງິນກູ້ຢຶມ..." required="" name="pham">

                                                                        <input type="hidden" class="form-control ca_amount_releaseds" id="validationCustom01" placeholder="ປ້ອນຈຳນວນເງິນປ່ອຍຕົວຈິງ..." required="" name="ca_amount_releaseds">
                                                                        <input type="hidden" class="form-control ca_interest" id="validationCustom01" placeholder="ປ້ອນອັດຕາດອກເບຍຕໍ່ເດືອນ..." required="" name="ca_interest">
                                                                    </div>
                                                                    <div class="col-xl-3">
                                                                        <label class="col-form-label" for="validationCustom06">ປະເພດສັດຍາ
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                            <input type="text" class="form-control lg_type" value="ລາຍເດືອນ" id="validationCustom01" placeholder="ປ້ອນປະເພດຫຼັກຊັບຄຳປະກັນ..." required="" name="lg_type">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-3">
                                                                        <label class="col-form-label" for="validationCustom06">ຮູບແບບການຊຳລະ
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                            <input type="text" class="form-control ca_playment" id="validationCustom01" placeholder="ປ້ອນຮູບແບບໃນການຊຳລະ..." required="" name="ca_playment">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-3">

                                                                        <label class="col-form-label" for="validationCustom06">ເງິນກູ້ໄລຍະເວລາ / ເດືອນ
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                            <input type="text" class="form-control ca_set_month" id="validationCustom01" placeholder="ປ້ອນເງິນກູ້ໄລຍະເວລາ / ເດືອນ..." required="" name="ca_set_month">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label class="col-form-label" for="validationCustom06">ປັດເສດເງິນຕົ້ນທຶນ
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                    <input style="background: #e8f0fe;"type="text" class="form-control lg_installments" id="validationCustom01" placeholder="0.00" required="" name="lg_installments">
                                                                </div>
                                                            </div>
                                                        </div><br>
                                                        <hr><br>
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
                                                                        <h4 style="color: red;" class="totel_pham">...</h4>
                                                                        <h4 style="color: red;" class="totel_percens">...</h4>
                                                                        <h4 style="color: red;" class="totle_mouth">...</h4>
                                                                        <h4 style="color: red;"><?php echo $datenow ?></h4>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <h4>ຊື່ ແລະ ນາມສະກຸນ</h4>
                                                                        <h4>ລະຫັດລູກຄ້າ</h4>
                                                                        <h4>ສັນຍາເງິນກູ້ເລກທີ່</h4>
                                                                        <h4>ລົງວັນທີ</h4>
                                                                        <h4>ເບີໂທ</h4>
                                                                    </div>
                                                                    <div class="col-lg-3 text-end">
                                                                        <h4 class="totel_fname">...</h4>
                                                                        <h4 class="totel_cus_runing_id">...</h4>
                                                                        <h4><?php echo $number ?></h4>
                                                                        <h4><?php echo $datenow ?></h4>
                                                                        <h4 class="totle_tel">...</h4>
                                                                    </div>
                                                                    <h4 style="margin-top: -1.8rem;">ຊື່ບັນຊີ : S&K NON-DEPOSIT TAKING MICRO FINANCE INSTITUTLON</h4>
                                                                    <h4>ເລກບັນຊີ: 013120001019926002</h4>
                                                                </div><br>
                                                                <div style=" font-family: Phetsarath OT;" class="show_data">
                                                                    <table class="table-bordered" style="Width:100%; height: 16px; color: black; font-size: 16px;">
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
                                                                        <tr>

                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <br>
                                                                <hr>
                                                                <div style=" font-family: Noto Sans Lao;" class="row">

                                                                    <center>
                                                                        <h2><u>ສະຫຼຸບຫຍໍ່</u></h2><br>
                                                                    </center>
                                                                    <div class="row">
                                                                        <div class="col-lg-7"></div>
                                                                        <div class="col-lg-2 ">
                                                                            <h4>ເງິນຕົ້ນ :</h4>
                                                                            <h4>ດອກເບ້ຍ :</h4>
                                                                            <h4>ເງິນຕົ້ນ+ດອກເບ້ຍ :</h4>
                                                                            <h4>ເງິນທີ່ຕ້ອງຈ່າຍໃນແຕ່ລະເດືອນ :</h4>
                                                                            <h4>ເງິນທີ່ຕ້ອງຈ່າຍໃນງວດສຸດທ້າຍ :</h4>
                                                                        </div>
                                                                        <div class="col-lg-3 text-end">
                                                                            <h4 style="color: blue;" class="totel_pham">...</h4>
                                                                            <h4 style="color: blue;" class="lg_taitel_amount_interest">...</h4>
                                                                            <h4 style="color: blue;" class="lg_taitel_capital_plus_interest">...</h4>
                                                                            <h4 style="color: blue;" class="lg_taitel_amount_bepaid_month">...</h4>
                                                                            <h4 style="color: blue;" class="lg_taitel_amount_bepaid_lastmonth">...</h4>
                                                                        </div>
                                                                    </div>

                                                                </div>
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
                                            <div style=" font-family: Noto Sans Lao;" class="tab-pane fade" id="profile1">
                                                <div class="pt-4">
                                                    <h4>ຂໍ້ມູນຫຼັກຊັບຄ້ຳປະກັນ</h4>
                                                    <div class="table_cllateral">

                                                    </div>
                                                </div>
                                            </div>
                                            <div style=" font-family: Noto Sans Lao;" class="tab-pane fade" id="contact1">
                                                <div class="pt-4">
                                                    <h4>ຂໍ້ມູນຜູ້ຄ້ຳປະກັນ</h4>
                                                    <div class="table_guarantor">

                                                    </div>
                                                </div>
                                            </div>

                                            <div style=" font-family: Noto Sans Lao;" class="tab-pane fade" id="message1">
                                                <div class="pt-4">
                                                    <div class="row">

                                                        <div class="col-lg-8">
                                                            <h4 class="card-title">ເອກກະສານອ້າງອິງ</h4>

                                                            <div class="card-body">
                                                                <label class="col-form-label" for="validationCustom06">ຊື່ເອກະສານ
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                    <input type="text" class="form-control lg_doc_name0" name="lg_doc_name0" id="validationCustom01" placeholder="ປ້ອນຊື່ເອກະສານ..." required="">
                                                                </div>
                                                                <label class="col-form-label" for="validationCustom06">ອັບໂຫຼດເອກະສານ
                                                                    <span class="text-danger">ອັບໂຫລດສະເພາະຟາຍ PDF ເທົ່ານັ້ນ*</span>
                                                                </label>

                                                                <label for="lg_doc0" class="drop-container_cod">
                                                                    <span class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດເອກກະສານ</span>
                                                                    <br>
                                                                    <input type="file" id="lg_doc0" class="lg_doc0" name="lg_doc0" accept="application/pdf" required="">
                                                                </label>

                                                            </div>
                                                            <hr>
                                                            <h4 class="card-title">ອັບໂຫຼດຮູບພາບເອກະສານຕາຕະລາງຄິດໄລ່ຄ່າງວດ</h4>

                                                            <div class="card-body">

                                                                <label style="margin-top: rem;" for="image_location" class="drop-container">
                                                                    <span style="margin-top: 2rem;" class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດຮູບພາບ</span>
                                                                    <br>
                                                                    <input type="file" id="image_location" class="la_map0" name="la_map0" accept="image/*" required="">
                                                                </label>
                                                                <img width="100%" id="preview_image_location" alt="">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4"></div>
                                                    </div>

                                                    <div class="card-footer">
                                                        <div class="card-footer d-flex flex-row-reverse bd-highlight">
                                                            <button type="submit" id="submit" name="submit" class="btn me-2 btn-primary submit">ບັນທຶກຂໍ້ມູນ</button>
                                                            <button type="reset" class="btn btn-light me-2">ລ້າງຂໍ້ມູນ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script src="vendor/select2/js/select2.full.min.js"></script>
    <script src="js/plugins-init/select2-init.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <!-- <script src="js/styleSwitcher.js"></script> -->
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

<div style="margin-top: 5rem; width: 790px; margin-left: 2rem; font-family: Phetsarath OT;" class="row">
    <div class="col-xl-12">

        <div style="display: flex;" class="head">
            <div class="logo">
                <img src="images/logo/s&k_logo.jpg" width="90px" height="90px" alt="logo">
            </div>
            <div style="margin-top: 1rem; margin-left: 1rem;" class="taitel">
                <h4>ສກຈບບອອຄ</h4>
                <h4>S & K NDTMFI</h4>
            </div>
            <h4 style="margin-left: 5rem; margin-top: 1.3rem; font-family: Phetsarath OT;"><u>ຕາຕະລາງຊຳລະໜີ້ສິນ</u></h4><br>
        </div>


        <div style="display: flex;" class="row_1">
            <div class="taitel0">
                <h4 style="font-size: 11px; margin-top: 5px;">ວົງເງິນກູ້ຢຶມ</h4>
                <h4 style="font-size: 11px; margin-top: -5px;">ອັດຕາດອກເບຍຕໍ່ເດືອນ</h4>
                <h4 style="font-size: 11px; margin-top: -5px;">ກຳນົດເວລາ</h4>
                <h4 style="font-size: 11px; margin-top: -5px;">ວັນທີ່ປ່ອຍກູ້</h4>
            </div>
            <div style="margin-left: 7rem; color: red;" class="totel0">
                <h4 style="font-size: 11px; color: red; margin-top: -5px;" class="totel_pham">...</h4>
                <h4 style="font-size: 11px; color: red; margin-top: -5px;" class="totel_percens">...</h4>
                <h4 style="font-size: 11px; color: red; margin-top: -5px;" class="totle_mouth">...</h4>
                <h4 style="font-size: 11px; color: red; margin-top: -5px;"><?php echo $datenow ?></h4>
            </div>
            <div style="margin-left: 12rem;" class="taitel1">
                <h4 style="font-size: 11px; margin-top: 0px;">ຊື່ ແລະ ນາມສະກຸນ</h4>
                <h4 style="font-size: 11px; margin-top: -5px;">ລະຫັດລູກຄ້າ</h4>
                <h4 style="font-size: 11px; margin-top: -5px;">ສັນຍາເງິນກູ້ເລກທີ່</h4>
                <h4 style="font-size: 11px; margin-top: -5px;">ລົງວັນທີ</h4>
                <h4 style="font-size: 11px; margin-top: -5px;">ເບີໂທ</h4>
            </div>
            <div style="margin-left: 7rem;" class="totel1">
                <h4 style="font-size: 11px;" class="totel_fname">...</h4>
                <h4 style="font-size: 11px; margin-top: -5px;" class="totel_cus_runing_id">...</h4>
                <h4 style="font-size: 11px; margin-top: -5px;"><?php echo $number ?></h4>
                <h4 style="font-size: 11px; margin-top: -5px;"><?php echo $datenow ?></h4>
                <h4 style="font-size: 11px; margin-top: -5px;" class="totle_tel">...</h4>
            </div>
        </div>
        <div style="margin-top: -1rem;" class="row_2">
            <h4 style="font-size: 11px;">ຊື່ບັນຊີ : S&K NON-DEPOSIT TAKING MICRO FINANCE INSTITUTLON</h4>
            <h4 style="font-size: 11px; margin-top: -5px;">ເລກບັນຊີ: 013120001019926002, ຕິດຕໍ່ໂທ: 201 855 058 ແລະ 201 855 059</h4>
        </div>
        <div id="show_data_print">
            <table class="table-bordered" style="Width:100%; height: 11px;">
                <tr>
                    <th style="font-size: 11px;">ຈຳນວນງວດ</th>
                    <th style="font-size: 11px;">ວັນທີ</th>
                    <th style="font-size: 11px;">ຕົນທຶນ</th>
                    <th style="font-size: 11px;">ດອກເບ້ຍ</th>
                    <th style="font-size: 11px;">ຕົ້ນທຶນ + ດອກເບຍ</th>
                    <th style="font-size: 11px;">ຍອດເຫຼືອໜີ່</th>
                    <th style="font-size: 11px;">ວັນທີຊຳລະ</th>
                    <th style="font-size: 11px;">ເຊັນຜູ້ມອບເງິນ</th>
                    <th style="font-size: 11px;">ເຊັນຜູ້ຮັບເງິນ</th>
                </tr>
                <tr>

                </tr>
            </table>
        </div><br><br>
        <h4 style="font-size: 11px; margin-left: 32rem;">ນະຄອນຫຼວງວຽງຈັນ, ວັນທີ : <?php echo $datenow ?> </h4>
        <div style="display: flex;" class="taitel_linecen">
            <h4 style="font-size: 11px; margin-left: 3rem;">ເຊັນຜູ້ຮັບ - ປະຕິບັດຕາມ </h4>
            <h4 style="font-size: 11px;  margin-left: 28rem;"><b><u>ຜູ້ຄິດໄລ່</u></b></h4>
        </div>
    </div>
</div>
<br>
<br>
<br>
<?php 
}
?>