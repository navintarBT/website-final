
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
    <title>ແບບຟອມບັນທຶກຂໍ້ມູນຫຼັກຊັບຄ້ຳປະກັນທີ່ດິນ-ທີດິນພ້ອມສິ່ງປູກສ້າງ</title>


    <!-- SWEETALERT2 AND JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="vendor/select2/css/select2.min.css">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- //FORM AND FONT -->
    <link href="css/Font.css" rel="stylesheet">
    <link href="css/customer_form.css" rel="stylesheet">

    <style>
        * {
            font-family: Noto Sans Lao;
        }
    </style>

    <style>
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
                //ຂໍ້ມູນລູກຄ້າ
                var cus_runing = $(".cus_runing").val();
                var cus_fname = $(".cus_fname").val();
                var cus_id = $(".cus_id").val();

                var la_runing_id = $(".la_runing_id").val();
                var la_fname = $(".la_fname").val();
                var la_date_check = $(".la_date_check").val();
                var la_time_check = $(".la_time_check").val();
                var la_type = $(".la_type").val();
                var la_land_title = $(".la_land_title").val();
                var la_date = $(".la_date").val();
                var la_vill = $(".la_vill").val();
                var la_dis = $(".la_dis").val();
                var la_pro = $(".la_pro").val();
                var la_name = $(".la_name").val();

                var la_original_price = $(".la_original_price").val();
                var la_market_price = $(".la_market_price").val();
                var la_pham = $(".la_pham").val();

                var la_map0 = $(".la_map0").val();

                var la_image0 = $(".la_image0").val();
                var la_image1 = $(".la_image1").val();
                var la_image2 = $(".la_image2").val();
                var la_image3 = $(".la_image3").val();
                var la_datetime = $(".la_datetime").val();

                var la_doc_file = $(".la_doc_file").val();
                var la_doc_name = $(".la_doc_name").val();

                if (cus_runing == "" || cus_fname == "" || cus_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດລູກຄ້າກ່ອນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_runing_id == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລະຫັດຊັບສົບບັດຄ້ຳປະກັນ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_fname == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນຊື່ຜູ້ລົງກວດກາຕົວຈິງ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_date_check == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນວັນທີລົງກວດສອບ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_time_check == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເວລາລົງກວດສອບ !',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_type == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນປະເພດທີ່ດິນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_land_title == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນເລກທີ່ໃບຕາດິນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_date == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນລົງວັນທີ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_vill == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນທີ່ຢູ່ບ້ານຂອງຊັບສົມບັດຄ້ຳປະກັນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_dis == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນທີ່ຢູ່ເມືອງຂອງຊັບສົມບັດຄ້ຳປະກັນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_pro == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນທີ່ຢູ່ແຂວງຂອງຊັບສົມບັດຄ້ຳປະກັນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_name == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນອອກຊື່ໃຜ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_original_price == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນມູນຄ້າເດີມຂອງຊັບສົມບັດ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_market_price == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນມູນຄ້າຊັບສົມບັດ ຕາມລາຄາຕະຫຼາດ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_pham == "") {
                    Swal.fire(
                        'ກະລຸນາປ້ອນມູນຄ້າປະເມີນຂອງພະນັກງານ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_map0 == "") {
                    Swal.fire(
                        'ກະລຸນາອັບໂຫຼດຮູບພາບແຜນທີ ທີ່ຕັ່ງຂອງຊັບສົມບັດໃຫ້ຄົບຖ່ວນ!',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_image0 == "" || la_image1 == "" || la_image2 == "" || la_image3 == "") {
                    la_doc_file
                    Swal.fire(
                        'ກະລຸນາອັບໂຫຼດຮູບພາບປະກອບໃຫ້ຄົບຖ່ວນ',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_doc_file == "") {
                    Swal.fire(
                        'ກະລຸນາອັບໂຫຼດ ໃບລາຍງານການລົງກວດສອບຊັບສົມບັດຄ້ຳປະກັນ',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                } else if (la_doc_name == "") {
                    Swal.fire(
                        'ກະລຸນາອັບໂຫຼດ ໃບລາຍງານແລ້ວ ຢ່າລືມໃສ່ຊື່ເອກກະສານປ້ອມ',
                        'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                        'warning'
                    )
                }
            });
        });
    </script>

    <script>
        $(function() {

            let image_location = document.getElementById('image_location');
            let preview_image_location = document.getElementById('preview_image_location');

            image_location.onchange = evt => {
                const [file] = image_location.files;
                if (file) {
                    preview_image_location.src = URL.createObjectURL(file);
                }
            }

            let image = document.getElementById('image');
            let previewImg = document.getElementById('previewImg');

            image.onchange = evt => {
                const [file] = image.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file);
                }
            }

            let image1 = document.getElementById('image1');
            let previewImg1 = document.getElementById('previewImg1');

            image1.onchange = evt => {
                const [file] = image1.files;
                if (file) {
                    previewImg1.src = URL.createObjectURL(file);
                }
            }

            let image2 = document.getElementById('image2');
            let previewImg2 = document.getElementById('previewImg2');

            image2.onchange = evt => {
                const [file] = image2.files;
                if (file) {
                    previewImg2.src = URL.createObjectURL(file);
                }
            }

            let image3 = document.getElementById('image3');
            let previewImg3 = document.getElementById('previewImg3');

            image3.onchange = evt => {
                const [file] = image3.files;
                if (file) {
                    previewImg3.src = URL.createObjectURL(file);
                }
            }

            //ຟັງຊັ້ນດຶງຊື່ມາສະແດງ

            $(".cus_runing").keyup(function() {
                var a = $(".cus_runing").val();
                $.post("collateral_get_cus_fname.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".cus_fname").val(output);
                    });

                $.post("collateral_get_cus_id.php", {
                        cus_runing: a
                    },
                    function(output) {
                        $(".cus_id").val(output);
                    })
            });

            $(".la_market_price").keyup(function() {
                var a = $(".la_market_price").val();
                $.post("collateral_get_la_pham.php", {
                        la_market_price: a
                    },
                    function(output) {
                        $(".la_pham").val(output);
                    })
            })

        });
    </script>

    <?php
    require_once "config/conect_nal.php";
    $query = "SELECT count(la_id) FROM collateral_land ORDER BY la_id DESC LIMIT 1; ";
    $result = mysqli_query($conns, $query);
    $row = mysqli_fetch_array($result);

    $lastid = $row[0];
    if (empty($lastid)) {
        $number = "L-00000001";
    } else {
        $idd = str_replace("L-", "", $lastid);
        $id = str_pad($idd + 1, 8, 0, STR_PAD_LEFT);
        $number = 'L-' . $id;
    }


    require_once "config/db_s_and_k_project.php";

    if (isset($_POST['submit'])) {
        date_default_timezone_set("Asia/Bangkok");

        $la_runing_id = $_POST['la_runing_id'];
        $la_fname = $_POST['la_fname'];
        $la_date_check = $_POST['la_date_check'];
        $la_time_check = $_POST['la_time_check'];
        $la_type = $_POST['la_type'];
        $la_land_title = $_POST['la_land_title'];
        $la_date = $_POST['la_date'];
        $la_vill = $_POST['la_vill'];
        $la_dis = $_POST['la_dis'];
        $la_pro = $_POST['la_pro'];
        $la_name = $_POST['la_name'];
        $la_explain = $_POST['la_explain'];
        $la_original_price = $_POST['la_original_price'];
        $la_market_price = $_POST['la_market_price'];
        $la_pham = $_POST['la_pham'];

        $la_doc_name = $_POST['la_doc_name'];
        $la_status = 0;

        $cus_id = $_POST['cus_id'];
        $cus_fname = $_POST['cus_fname'];
        $cus_runing = $_POST['cus_runing'];

        $date = date('d/m/Y H:i:s');

        $date1 = date("Ymd_His");

        $numrand = (mt_rand());
        $la_doc_file = (isset($_POST['la_doc_file']) ? $_POST['la_doc_file'] : '');
        $upload = $_FILES['la_doc_file']['name'];

        if ($upload != '') {

            $typefile = strrchr($_FILES['la_doc_file']['name'], ".");

            if ($typefile == '.pdf') {

                $path = "collateral_docs/";

                $newname = 'collateral_docs_' . $numrand . $date1 . $typefile;
                $path_copy = $path . $newname;

                move_uploaded_file($_FILES['la_doc_file']['tmp_name'], $path_copy);

                //sql insert
                $select_stmt = $conn->prepare('SELECT la_runing_id FROM collateral_land where la_runing_id = :la_runing_id');
                $select_stmt->bindParam(':la_runing_id', $la_runing_id);
                $select_stmt->execute();
                $la_runing_ids = $select_stmt->fetch(PDO::FETCH_ASSOC);

                $select_stmt = $conn->prepare('SELECT la_land_title FROM collateral_land where la_land_title = :la_land_title');
                $select_stmt->bindParam(':la_land_title', $la_land_title);
                $select_stmt->execute();
                $la_land_titles = $select_stmt->fetch(PDO::FETCH_ASSOC);

                if ($la_runing_ids <> 0) {
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
                                        text: 'ລະຫັດຫຼັກຊັບຄ້ຳປະກັນຊ້ຳກັນ!',
                                        icon: 'error',
                                        showConfirmButton: true
                                    });
                                })
                            })
                            </script>";
                } else if ($la_land_titles) {
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
                                        text: 'ເລກທີ່ໃບຕາດິນຊ້ຳກັນ!, ກົດຕົກລົງແລ້ວປ້ອນຂໍ້ມູນໃຫມ່',
                                        icon: 'error', 
                                        showConfirmButton: true
                                    });
                                })
                            })
                            </script>";
                } else {
                    $la_map0 = $_FILES['la_map0'];
                    if (!empty($la_map0)) {
                        $allow0 = array('jpg', 'jpeg', 'png');
                        $extension0 = explode(".", $la_map0['name']);
                        $fileActExt0 = strtolower(end($extension0));
                        $fileNew0 = rand() . "." . $fileActExt0;
                        $filePath0 = "collateral_map/" . $fileNew0;
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

                    $la_image0 = $_FILES['la_image0'];
                    if (!empty($la_image0)) {
                        $allow2 = array('jpg', 'jpeg', 'png');
                        $extension2 = explode(".", $la_image0['name']);
                        $fileActExt2 = strtolower(end($extension2));
                        $fileNew2 = rand() . "." . $fileActExt2;
                        $filePath2 = "collateral_images/" . $fileNew2;
                        if (in_array($fileActExt2, $allow2)) {
                            if ($la_image0['size'] > 0 && $la_image0['error'] == 0) {
                                move_uploaded_file($la_image0['tmp_name'], $filePath2);
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
                                            title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ imageg0'
                                            text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                            icon: 'error',
                                            showConfirmButton: true
                                        });
                                    })
                                })
                            </script>";
                        }
                    }

                    $la_image1 = $_FILES['la_image1'];
                    if (!empty($la_image1)) {
                        $allow3 = array('jpg', 'jpeg', 'png');
                        $extension3 = explode(".", $la_image1['name']);
                        $fileActExt3 = strtolower(end($extension3));
                        $fileNew3 = rand() . "." . $fileActExt3;
                        $filePath3 = "collateral_images/" . $fileNew3;
                        if (in_array($fileActExt3, $allow3)) {
                            if ($la_image1['size'] > 0 && $la_image1['error'] == 0) {
                                move_uploaded_file($la_image1['tmp_name'], $filePath3);
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
                                            title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ imageg1',
                                            text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                            icon: 'error',
                                            showConfirmButton: true
                                        });
                                    })
                                })
                            </script>";
                        }
                    }

                    $la_image2 = $_FILES['la_image2'];
                    if (!empty($la_image2)) {
                        $allow4 = array('jpg', 'jpeg', 'png');
                        $extension4 = explode(".", $la_image2['name']);
                        $fileActExt4 = strtolower(end($extension4));
                        $fileNew4 = rand() . "." . $fileActExt4;
                        $filePath4 = "collateral_images/" . $fileNew4;
                        if (in_array($fileActExt4, $allow4)) {
                            if ($la_image2['size'] > 0 && $la_image2['error'] == 0) {
                                move_uploaded_file($la_image2['tmp_name'], $filePath4);
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
                                            title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ imageg2',
                                            text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                            icon: 'error',
                                            showConfirmButton: true
                                        });
                                    })
                                })
                            </script>";
                        }
                    }

                    $la_image3 = $_FILES['la_image3'];
                    if (!empty($la_image3)) {
                        $allow5 = array('jpg', 'jpeg', 'png');
                        $extension5 = explode(".", $la_image3['name']);
                        $fileActExt5 = strtolower(end($extension5));
                        $fileNew5 = rand() . "." . $fileActExt5;
                        $filePath5 = "collateral_images/" . $fileNew5;
                        if (in_array($fileActExt5, $allow5)) {
                            if ($la_image3['size'] > 0 && $la_image3['error'] == 0) {
                                move_uploaded_file($la_image3['tmp_name'], $filePath5);
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
                                            title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ imageg3',
                                            text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                            icon: 'error',
                                            showConfirmButton: true
                                        });
                                    })
                                })
                            </script>";
                        }
                    }

                    $sql = $conn->prepare("INSERT INTO collateral_land(la_runing_id,la_fname,la_date_check,la_time_check,la_type,la_land_title,la_date,la_vill,la_dis,la_pro,la_name,la_explain,la_original_price,la_market_price,la_pham,la_map0,la_image0,la_image1,la_image2,la_image3,la_doc_name,la_doc_file,la_date_in,la_time_in,la_status,cus_id,cus_fname,cus_runing,user_id) 
                    VALUES(:la_runing_id,:la_fname,:la_date_check,:la_time_check,:la_type,:la_land_title,:la_date,:la_vill,:la_dis,:la_pro,:la_name,:la_explain,:la_original_price,:la_market_price,:la_pham,:la_map0,:la_image0,:la_image1,:la_image2,:la_image3,:la_doc_name,'$newname',curdate(),curtime(),:la_status,:cus_id,:cus_fname,:cus_runing,:user_id)");
                    $sql->bindParam(":la_runing_id", $la_runing_id);
                    $sql->bindParam(":la_fname", $la_fname);
                    $sql->bindParam(":la_date_check", $la_date_check);
                    $sql->bindParam(":la_time_check", $la_time_check);
                    $sql->bindParam(":la_type", $la_type);
                    $sql->bindParam(":la_land_title", $la_land_title);
                    $sql->bindParam(":la_date", $la_date);
                    $sql->bindParam(":la_vill", $la_vill);
                    $sql->bindParam(":la_dis", $la_dis);
                    $sql->bindParam(":la_pro", $la_pro);
                    $sql->bindParam(":la_name", $la_name);
                    $sql->bindParam(":la_explain", $la_explain);
                    $sql->bindParam(":la_original_price", $la_original_price);
                    $sql->bindParam(":la_market_price", $la_market_price);
                    $sql->bindParam(":la_pham", $la_pham);
                    $sql->bindParam(":la_map0", $fileNew0);
                    $sql->bindParam(":la_image0", $fileNew2);
                    $sql->bindParam(":la_image1", $fileNew3);
                    $sql->bindParam(":la_image2", $fileNew4);
                    $sql->bindParam(":la_image3", $fileNew5);
                    $sql->bindParam(":la_doc_name", $la_doc_name);
                    $sql->bindParam(":la_status", $la_status);

                    // $sql->bindParam(':la_datetime', $date, PDO::PARAM_STR);
                    $sql->bindParam(":cus_id", $cus_id);
                    $sql->bindParam(":cus_fname", $cus_fname);
                    $sql->bindParam(":cus_runing", $cus_runing);
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
                                                document.location.href = 'collateral_select_land.php';
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
                                            document.location.href = 'customer_select_offer.php';
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
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                ບັນທຶກຫຼັກຊັບຄ້ຳປະກັນ ທີ່ດິນ ຫຼື ທີ່ດິນພ້ອມສິ່ງປູກສ້າງ
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
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">ຫຼັກຊັບຄ້ຳປະກັນ</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">ບັນທຶກຂໍ້ມູນຫຼັກຊັບຄ້ຳປະກັນທີ່ດິນ - ທີ່ດິນພ້ອມສິ່ງປູກສ້າງ</a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ຟອມບັນທຶກຫຼັກຊັບຄ້ຳປະກັນ</h4>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a style="font-size: 16px;" class="nav-link active" href="collateral_insert_land.php">ທີ່ດິນ ຫຼື ທີ່ດິນ ແລະ ສິ່ງປຸກສ່າງ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 16px;" class="nav-link" href="collateral_insert_car.php">ລົດໃຫຍ່ ຫຼື ລົດຈັກ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 16px;" class="nav-link" href="collateral_insert_other.php"> ຊັບສິນອື່ນໆ...</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                            <div class="pt-4">
                                                <form action="" id="collateral_insert" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
                                                    <div class=" row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div style="margin-top: -2rem;" class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-xl-12">
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                <label class="col-form-label" for="validationCustom06">ລະຫັດຫຼັກຊັບຄ້ຳປະກັນ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                                                                                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                                                                <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                                                                                            </svg></span>
                                                                                        <input style="background: #e8f0fe;" type="text" class="form-control la_runing_id" id="validationCustom01" value="<?php echo $number ?>" required="" name="la_runing_id" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-1 row">
                                                                                <div class="col-xl-3">
                                                                                    <label class="col-form-label" for="validationCustom06">ລະຫັດລູກຄ້າ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                                                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                                                                                            </svg></span>
                                                                                        <input type="text" class="form-control cus_runing" id="validationCustom01" placeholder="ປ້ອນລະຫັດລູກຄ້າ..." required="" name="cus_runing">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ຊື່ ແລະ ນາມສະກຸນ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                                                                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                                                                            </svg></span>
                                                                                        <input style="background: #e8f0fe;" type="text" class="form-control cus_fname" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="cus_fname" readonly>
                                                                                        <input type="hidden" class="form-control cus_id" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="cus_id">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ຊື່ຜູ້ລົງກວດການຕົວຈິງ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-postcard-fill" viewBox="0 0 16 16">
                                                                                                <path d="M11 8h2V6h-2v2Z" />
                                                                                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm8.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 0 .5.5H6a.5.5 0 0 0 0-1H2.5a.5.5 0 0 0-.5.5ZM2.5 7a.5.5 0 0 0 0 1H6a.5.5 0 0 0 0-1H2.5ZM2 9.5a.5.5 0 0 0 .5.5H6a.5.5 0 0 0 0-1H2.5a.5.5 0 0 0-.5.5Zm8-4v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5Z" />
                                                                                            </svg></span>
                                                                                        <input type="text" class="form-control la_fname" id="validationCustom01" placeholder="ປ້ອນຊື່ຜູ້ລົງກວດການຕົວຈິງ..." required="" name="la_fname">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ວັນທີລົງກວດສອບ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-month" viewBox="0 0 16 16">
                                                                                                <path d="M2.56 11.332 3.1 9.73h1.984l.54 1.602h.718L4.444 6h-.696L1.85 11.332h.71zm1.544-4.527L4.9 9.18H3.284l.8-2.375h.02zm5.746.422h-.676V9.77c0 .652-.414 1.023-1.004 1.023-.539 0-.98-.246-.98-1.012V7.227h-.676v2.746c0 .941.606 1.425 1.453 1.425.656 0 1.043-.28 1.188-.605h.027v.539h.668V7.227zm2.258 5.046c-.563 0-.91-.304-.985-.636h-.687c.094.683.625 1.199 1.668 1.199.93 0 1.746-.527 1.746-1.578V7.227h-.649v.578h-.019c-.191-.348-.637-.64-1.195-.64-.965 0-1.64.679-1.64 1.886v.34c0 1.23.683 1.902 1.64 1.902.558 0 1.008-.293 1.172-.648h.02v.605c0 .645-.423 1.023-1.071 1.023zm.008-4.53c.648 0 1.062.527 1.062 1.359v.253c0 .848-.39 1.364-1.062 1.364-.692 0-1.098-.512-1.098-1.364v-.253c0-.868.406-1.36 1.098-1.36z" />
                                                                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                                                            </svg></span>
                                                                                        <input type="date" class="form-control la_date_check" id="validationCustom01" placeholder="ປ້ອນຊື່ຜູ້ລົງກວດການຕົວຈິງ..." required="" name="la_date_check">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-3">
                                                                                    <label class="col-form-label" for="validationCustom06">ເວລາລົງກວດສອບ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                                                                                <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                                                                                                <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                                                                                            </svg></span>
                                                                                        <input type="time" class="form-control la_time_check" id="validationCustom01" placeholder="ປ້ອນເລກລະບຽນລົດ..." required="" name="la_time_check">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ເລກທີ່ໃບຕາດິນ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16">
                                                                                                <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z" />
                                                                                            </svg></span>
                                                                                        <input type="text" class="form-control la_land_title" id="validationCustom01" placeholder="ປ້ອນເລກທີ່ໃບຕາດິນ..." required="" name="la_land_title">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ລົງວັນທີ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-month" viewBox="0 0 16 16">
                                                                                                <path d="M2.56 11.332 3.1 9.73h1.984l.54 1.602h.718L4.444 6h-.696L1.85 11.332h.71zm1.544-4.527L4.9 9.18H3.284l.8-2.375h.02zm5.746.422h-.676V9.77c0 .652-.414 1.023-1.004 1.023-.539 0-.98-.246-.98-1.012V7.227h-.676v2.746c0 .941.606 1.425 1.453 1.425.656 0 1.043-.28 1.188-.605h.027v.539h.668V7.227zm2.258 5.046c-.563 0-.91-.304-.985-.636h-.687c.094.683.625 1.199 1.668 1.199.93 0 1.746-.527 1.746-1.578V7.227h-.649v.578h-.019c-.191-.348-.637-.64-1.195-.64-.965 0-1.64.679-1.64 1.886v.34c0 1.23.683 1.902 1.64 1.902.558 0 1.008-.293 1.172-.648h.02v.605c0 .645-.423 1.023-1.071 1.023zm.008-4.53c.648 0 1.062.527 1.062 1.359v.253c0 .848-.39 1.364-1.062 1.364-.692 0-1.098-.512-1.098-1.364v-.253c0-.868.406-1.36 1.098-1.36z" />
                                                                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                                                            </svg></span>
                                                                                        <input type="date" class="form-control la_date" id="validationCustom01" placeholder="ປ້ອນເບີໂທ..." required="" value="" name="la_date">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ປະເພດທີ່ດິນ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                                                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                                                            </svg></span>
                                                                                        <select class="form-control form-select la_type" aria-label="Default select example" id="cus_date_of_loan" required="" name="la_type">
                                                                                            <option value="">ເລື້ອກ</option>
                                                                                            <option value="ທີ່ດິນປຸກຝັງ">ທີ່ດິນປູກຝັງ</option>
                                                                                            <option value="ທີ່ດິນພ້ອມສິ່່ງປຸກສ້າງ">ທີ່ດິນພ້ອມສິ່່ງປຸກສ້າງ</option>
                                                                                            <option value="ທີ່ດິນວ່າງເປົ່າ">ທີ່ດິນວ່າງເປົ່າ</option>
                                                                                        </select>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-xl-3">

                                                                                    <label class="col-form-label" for="validationCustom06">ຊິ່ງມີທີ່ຕັ້ງຢູ່ບ້ານ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                                                                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                                                                            </svg></span>
                                                                                        <input type="text" class="form-control la_vill" id="validationCustom01" placeholder="ປ້ອນບ້ານ..." required="" name="la_vill">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ເມືອງ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                                                                                <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                                                                                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z" />
                                                                                            </svg></span>
                                                                                        <input type="text" class="form-control la_dis" id="validationCustom01" placeholder="ປ້ອນເມືອງ..." required="" name="la_dis">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ແຂວງ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                                                                                <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V.5ZM2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-1 2v1H2v-1h1Zm1 0h1v1H4v-1Zm9-10v1h-1V3h1ZM8 5h1v1H8V5Zm1 2v1H8V7h1ZM8 9h1v1H8V9Zm2 0h1v1h-1V9Zm-1 2v1H8v-1h1Zm1 0h1v1h-1v-1Zm3-2v1h-1V9h1Zm-1 2h1v1h-1v-1Zm-2-4h1v1h-1V7Zm3 0v1h-1V7h1Zm-2-2v1h-1V5h1Zm1 0h1v1h-1V5Z" />
                                                                                            </svg></span>
                                                                                        <input type="text" class="form-control la_pro" id="validationCustom01" placeholder="ປ້ອນແຂວງ..." required="" value="" name="la_pro">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ອອກຊື່ໃຜ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                                                                                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                                                                <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                                                                                            </svg></span>
                                                                                        <input type="text" class="form-control la_name" id="validationCustom01" placeholder="ປ້ອນຊື່ຜູ້ອອກໃບຕາດີນ..." required="" name="la_name">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-3">

                                                                                    <label class="col-form-label" for="validationCustom06">ມູນຄ່າເດີມຂອງຊັບສົມບັດ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                                        <input type="number" class="form-control la_original_price" id="validationCustom01" placeholder="0.00" required="" name="la_original_price">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ມູນຄ້າຊັບສົມບັດ ຕາມລາຄາຕະຫຼາດ
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                                        <input type="number" class="form-control la_market_price" id="validationCustom01" placeholder="0.00" required="" name="la_market_price">
                                                                                    </div>
                                                                                    <label class="col-form-label" for="validationCustom06">ມູນຄ້າປະເມີນ
                                                                                        <span class="text-danger">* - 40% ຂອງມູນຄ້າຊັບສົມບັດຕາມລາຄາຕະຫຼາດ</span>
                                                                                    </label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-text" id="inputGroupPrepend">LAK</span>
                                                                                        <input style="background: #e8f0fe;" type="number" class="form-control la_pham" id="validationCustom01" placeholder="0.00" required="" name="la_pham">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">ອະທິບາຍໂດຍຫຍໍ່ກ່ຽວກັບຊັບສົມບັດ</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <textarea style="height: 200px; font-size: 18px;" type="text" class="form-control" id="validationCustom01" name="la_explain"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">ຮູບພາບແຜນທີ່ ທີ່ຕັ້ງຊັບສົມບັດ</h4> <span class="text-danger">*</span>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">

                                                                            <label style="margin-top: 2.2rem;" for="image_location" class="drop-container">
                                                                                <span style="margin-top: 2rem;" class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດຮູບພາບແຜນທີ</span>
                                                                                <br>
                                                                                <input type="file" id="image_location" class="la_map0" name="la_map0" accept="image/*" required="">
                                                                            </label>
                                                                            <img width="100%" id="preview_image_location" alt="">
                                                                        </div>

                                                                        <div class="col-lg-6">


                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">ຮູບພາບປະກອບ</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-xl-3">
                                                                            <label style="margin-top: 2.2rem;" for="image" class="drop-container">
                                                                                <span style="margin-top: 2rem;" class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດຮູບພາບ 1</span>
                                                                                <br>
                                                                                <input type="file" id="image" class="la_image0" name="la_image0" accept="image/*" required="">
                                                                            </label>
                                                                            <img width="100%" id="previewImg" alt="">
                                                                        </div>
                                                                        <div class="col-xl-3">
                                                                            <label style="margin-top: 2.2rem;" for="image1" class="drop-container">
                                                                                <span style="margin-top: 2rem;" class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດຮູບພາບ 2</span>
                                                                                <br>
                                                                                <input type="file" id="image1" class="la_image1" name="la_image1" accept="image/*" required="">
                                                                            </label>
                                                                            <img width="100%" id="previewImg1" alt="">
                                                                        </div>
                                                                        <div class="col-xl-3">
                                                                            <label style="margin-top: 2.2rem;" for="image2" class="drop-container">
                                                                                <span style="margin-top: 2rem;" class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດຮູບພາບ 3</span>
                                                                                <br>
                                                                                <input type="file" id="image2" class="la_image2" name="la_image2" accept="image/*" required="">
                                                                            </label>
                                                                            <img width="100%" id="previewImg2" alt="">
                                                                        </div>
                                                                        <div class="col-xl-3">
                                                                            <label style="margin-top: 2.2rem;" for="image3" class="drop-container">
                                                                                <span style="margin-top: 2rem;" class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດຮູບພາບ 4</span>
                                                                                <br>
                                                                                <input type="file" id="image3" class="la_image3" name="la_image3" accept="image/*" required="">
                                                                            </label>
                                                                            <img width="100%" id="previewImg3" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
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
                                                                        <input type="text" class="form-control la_doc_name" name="la_doc_name" id="validationCustom01" placeholder="ປ້ອນຊື່ເອກະສານ..." required="">
                                                                    </div>
                                                                    <label class="col-form-label" for="validationCustom06">ອັບໂຫຼດເອກະສານ
                                                                        <span class="text-danger">ອັບໂຫລດສະເພາະຟາຍ PDF ເທົ່ານັ້ນ*</span>
                                                                    </label>

                                                                    <label for="la_doc_file" class="drop-container_cod">
                                                                        <span class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດເອກກະສານ</span>
                                                                        <br>
                                                                        <input type="file" id="la_doc_file" class="la_doc_file" name="la_doc_file" accept="application/pdf" required="">
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
                                    </div>
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
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendor/select2/js/select2.full.min.js"></script>
    <script src="js/plugins-init/select2-init.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
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