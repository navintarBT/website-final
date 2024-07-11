
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
    <title>ແກ້ໄຂຂໍ້ມູນຫຼັກຊັບຄ້ຳປະກັນລົດຈັກ-ລົດໃຫຍ່</title>

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

            let image_location1 = document.getElementById('image_location1');
            let preview_image_location1 = document.getElementById('preview_image_location1');

            image_location1.onchange = evt => {
                const [file] = image_location1.files;
                if (file) {
                    preview_image_location1.src = URL.createObjectURL(file);
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

            $(".car_market_price").keyup(function() {
                var a = $(".car_market_price").val();
                $.post("collateral_get_car_pham.php", {
                        car_market_price: a
                    },
                    function(output) {
                        $(".car_pham").val(output);
                    })
            })
        });
    </script>
    <?php
    require_once "config/db_s_and_k_project.php";

    if (isset($_POST['update'])) {

        $id = $_POST['id'];

        $select_stmt = $conn->prepare('SELECT * FROM collateral_car WHERE car_id = :id');
        $select_stmt->bindParam(":id", $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        date_default_timezone_set("Asia/Bangkok");

        $car_running_id = $_POST['car_running_id'];
        $car_check_name = $_POST['car_check_name'];
        $car_date_check = $_POST['car_date_check'];
        $car_time_check = $_POST['car_time_check'];
        $car_type = $_POST['car_type'];
        $car_number = $_POST['car_number'];
        $car_eg_number = $_POST['car_eg_number'];
        $car_t_number = $_POST['car_t_number'];
        $car_brand = $_POST['car_brand'];
        $car_color = $_POST['car_color'];
        $car_name = $_POST['car_name'];
        $car_u_year = $_POST['car_u_year'];
        $car_original_price = $_POST['car_original_price'];
        $car_market_price = $_POST['car_market_price'];
        $car_pham = $_POST['car_pham'];
        $car_explain = $_POST['car_explain'];

        $car_image0 = $_FILES['car_image0'];
        $car_image1 = $_FILES['car_image1'];
        $car_image2 = $_FILES['car_image2'];
        $car_image3 = $_FILES['car_image3'];

        $car_doc_name = $_POST['car_doc_name'];

        $cus_id = $_POST['cus_id'];
        $cus_fname = $_POST['cus_fname'];
        $cus_runing = $_POST['cus_runing'];

        $date = date('d/m/Y H:i:s');

        $car_doc_file2 = $_POST['car_doc_file2'];
        $upload_file = $_FILES['car_doc_file']['name'];
        $old_doc = "collateral_docs_car/";

        if ($upload_file != '') {

            $date1 = date("Ymd_His");

            $numrand = (mt_rand());
            $car_doc_file = (isset($_POST['car_doc_file']) ? $_POST['car_doc_file'] : '');

            $typefile = strrchr($_FILES['car_doc_file']['name'], ".");


            if ($typefile == '.pdf') {

                $path = "collateral_docs_car/";

                $newname = 'collateral_docs_car' . $numrand . $date1 . $typefile;
                $path_copy = $path . $newname;

                $remove = move_uploaded_file($_FILES['car_doc_file']['tmp_name'], $path_copy);;
                if ($remove) {
                    unlink($old_doc . $row['car_doc_file']);
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
        } else {
            $newname = $car_doc_file2;
        }

        $car_image0_0 = $_POST['car_image0_0'];
        $upload_car_image0 = $_FILES['car_image0']['name'];
        $old_folder_car_image0 = "collateral_car_images/";
        if ($upload_car_image0 != '') {
            $allow0 = array('jpg', 'jpeg', 'png');
            $extension0 = explode(".", $car_image0['name']);
            $fileActExt0 = strtolower(end($extension0));
            $fileNew0 = rand() . "." . $fileActExt0;
            $filePath0 = "collateral_car_images/" . $fileNew0;
            if (in_array($fileActExt0, $allow0)) {
                if ($car_image0['size'] > 0 && $car_image0['error'] == 0) {
                    $remove0 = move_uploaded_file($car_image0['tmp_name'], $filePath0);
                    if ($remove0) {
                        unlink($old_folder_car_image0 . $row['car_image0']);
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
                                        title: 'ຜິດພາດ',
                                        text: 'ບໍ່ສາມາດລົບຮູບຈາກໂຟເດີໄດ້ car_image0!',
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
                                    title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ la_map0',
                                    text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                    icon: 'error',
                                    showConfirmButton: true
                                });
                            })
                        })
                    </script>";
            }
        } else {
            $fileNew0 = $car_image0_0;
        }

        $car_image1_1 = $_POST['car_image1_1'];
        $upload_car_image1 = $_FILES['car_image1']['name'];
        $old_folder_car_image1 = "collateral_car_images/";
        if ($upload_car_image1 != '') {
            $allow1 = array('jpg', 'jpeg', 'png');
            $extension1 = explode(".", $car_image1['name']);
            $fileActExt1 = strtolower(end($extension1));
            $fileNew1 = rand() . "." . $fileActExt1;
            $filePath1 = "collateral_car_images/" . $fileNew1;
            if (in_array($fileActExt1, $allow1)) {
                if ($car_image1['size'] > 0 && $car_image1['error'] == 0) {
                    $remove1 = move_uploaded_file($car_image1['tmp_name'], $filePath1);
                    if ($remove1) {
                        unlink($old_folder_car_image1 . $row['car_image1']);
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
                                        title: 'ຜິດພາດ',
                                        text: 'ບໍ່ສາມາດລົບຮູບຈາກໂຟເດີໄດ້ car_image1!',
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
                                    title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ la_map1',
                                    text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                    icon: 'error',
                                    showConfirmButton: true
                                });
                            })
                        })
                    </script>";
            }
        } else {
            $fileNew1 = $car_image1_1;
        }

        $car_image2_2 = $_POST['car_image2_2'];
        $upload_car_image2 = $_FILES['car_image2']['name'];
        $old_folder_car_image2 = "collateral_car_images/";
        if ($upload_car_image2 != '') {
            $allow2 = array('jpg', 'jpeg', 'png');
            $extension2 = explode(".", $car_image2['name']);
            $fileActExt2 = strtolower(end($extension2));
            $fileNew2 = rand() . "." . $fileActExt2;
            $filePath2 = "collateral_car_images/" . $fileNew2;
            if (in_array($fileActExt2, $allow2)) {
                if ($car_image2['size'] > 0 && $car_image2['error'] == 0) {
                    $remove2 = move_uploaded_file($car_image2['tmp_name'], $filePath2);
                    if ($remove2) {
                        unlink($old_folder_car_image2 . $row['car_image2']);
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
                                        title: 'ຜິດພາດ',
                                        text: 'ບໍ່ສາມາດລົບຮູບຈາກໂຟເດີໄດ້ car_image2!',
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
                                title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ imageg0'
                                text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                icon: 'error',
                                showConfirmButton: true
                            });
                        })
                    })
                </script>";
            }
        } else {
            $fileNew2 = $car_image2_2;
        }

        $car_image3_3 = $_POST['car_image3_3'];
        $upload_car_image3 = $_FILES['car_image3']['name'];
        $old_folder_car_image3 = "collateral_car_images/";
        if ($upload_car_image3 != '') {
            $allow3 = array('jpg', 'jpeg', 'png');
            $extension3 = explode(".", $car_image3['name']);
            $fileActExt3 = strtolower(end($extension3));
            $fileNew3 = rand() . "." . $fileActExt3;
            $filePath3 = "collateral_car_images/" . $fileNew3;
            if (in_array($fileActExt3, $allow3)) {
                if ($car_image3['size'] > 0 && $car_image3['error'] == 0) {
                    $remove3 = move_uploaded_file($car_image3['tmp_name'], $filePath3);
                    if ($remove3) {
                        unlink($old_folder_car_image3 . $row['car_image3']);
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
                                        title: 'ຜິດພາດ',
                                        text: 'ບໍ່ສາມາດລົບຮູບຈາກໂຟເດີໄດ້ car_image3!',
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
                                title: 'ອັບໂຫຼດໄດ້ສະເພາະ JPG, PNG, JPEG ເທົ່ານັ້ນ imageg1',
                                text: 'ບັນທຶກຂໍ້ມູນລົ້ມເລວ!',
                                icon: 'error',
                                showConfirmButton: true
                            });
                        })
                    })
                </script>";
            }
        } else {
            $fileNew3 = $car_image3_3;
        }

        $sql = $conn->prepare("UPDATE collateral_car SET 
                car_check_name = :car_check_name,
                car_date_check = :car_date_check,
                car_time_check = :car_time_check,
                car_type = :car_type,  
                car_number = :car_number,
                car_eg_number = :car_eg_number,
                car_t_number = :car_t_number,
                car_brand = :car_brand,
                car_color = :car_color,
                car_name = :car_name,
                car_u_year = :car_u_year,
                car_original_price = :car_original_price,
                car_market_price = :car_market_price,
                car_pham = :car_pham,
                car_explain = :car_explain,
                car_image0 = :car_image0,
                car_image1 = :car_image1,
                car_image2 = :car_image2,
                car_image3 = :car_image3,
                car_doc_name = :car_doc_name,
                car_doc_file = :car_doc_file,              
                cus_id  = :cus_id,
                cus_fname = :cus_fname,
                cus_runing = :cus_runing WHERE car_id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":car_check_name", $car_check_name);
        $sql->bindParam(":car_date_check", $car_date_check);
        $sql->bindParam(":car_time_check", $car_time_check);
        $sql->bindParam(":car_type", $car_type);
        $sql->bindParam(":car_number", $car_number);
        $sql->bindParam(":car_eg_number", $car_eg_number);
        $sql->bindParam(":car_t_number", $car_t_number);
        $sql->bindParam(":car_brand", $car_brand);
        $sql->bindParam(":car_color", $car_color);
        $sql->bindParam(":car_name", $car_name);
        $sql->bindParam(":car_u_year", $car_u_year);
        $sql->bindParam(":car_original_price", $car_original_price);
        $sql->bindParam(":car_market_price", $car_market_price);
        $sql->bindParam(":car_pham", $car_pham);
        $sql->bindParam(":car_explain", $car_explain);
        $sql->bindParam(":car_image0", $fileNew0);
        $sql->bindParam(":car_image1", $fileNew1);
        $sql->bindParam(":car_image2", $fileNew2);
        $sql->bindParam(":car_image3", $fileNew3);
        $sql->bindParam(":car_doc_name", $car_doc_name);
        $sql->bindParam(":car_doc_file", $newname);
        $sql->bindParam(":cus_id", $cus_id);
        $sql->bindParam(":cus_fname", $cus_fname);
        $sql->bindParam(":cus_runing", $cus_runing);
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
                                                document.location.href = 'collateral_select_car.php';
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

                                            <h1>ແກ້ໄຂຂໍ້ມູນຫຼັກຊັບຄ້ຳປະກັນລົດຈັກ-ລົດໃຫຍ່</h1>

                                        </div>
                                        <ul class="navbar-nav header-right">
                                            <div style="margin-left: 2rem;" class="d-flex flex-row-reverse bd-highlight header-right">
                                                <a href="collateral_select_car.php" class="btn btn-warning me-2">ຍົກເລີ້ກ</a>
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
                                <li class="breadcrumb-item"><a href="collateral_select_car.php" class="text-danger">ກັບຄືນ</a></li>
                                <li class="breadcrumb-item active"><a href="">ຂໍ້ມູນຫຼັກຊັບຄ້ຳປະກັນ</a></li>
                                <li class="breadcrumb-item active"><a href="collateral_select_car.php">ລາຍງານຂໍ້ມູນຫຼັກຊັບຄ້ຳປະກັນລົດຈັກ-ລົດໃຫຍ່</a></li>
                                <li class="breadcrumb-item"><a href="">ແກ້ໄຂຂໍ້ມູນຫຼັກຊັບຄ້ຳປະກັນລົດຈັກ-ລົດໃຫຍ່</a></li>

                            </ol>

                        </div>
                        <!-- row -->

                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $stmt = $conn->query("SELECT * FROM collateral_car WHERE car_id = $id");
                            $stmt->execute();
                            $data = $stmt->fetch();
                        }
                        ?>
                        <div class=" row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div style="margin-top: -3rem;" class="row">
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດຫຼັກຊັບຄ້ຳປະກັນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" class="form-control car_running_id" id="validationCustom01" value="<?= $data['car_running_id']; ?>" required="" name="car_running_id" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <div class="col-xl-3">
                                                        <input type="hidden" value="<?= $data['car_id']; ?>" class="form-control la_id" name="id">
                                                        <input type="hidden" class="form-control cus_id" value="<?= $data['cus_id']; ?>" name="cus_id">
                                                        <input type="hidden" value="<?= $data['car_image0']; ?>" class="form-control la_id" name="car_image0_0">
                                                        <input type="hidden" value="<?= $data['car_image1']; ?>" class="form-control la_id" name="car_image1_1">
                                                        <input type="hidden" value="<?= $data['car_image2']; ?>" class="form-control la_id" name="car_image2_2">
                                                        <input type="hidden" value="<?= $data['car_image3']; ?>" class="form-control la_id" name="car_image3_3">
                                                        <input type="hidden" value="<?= $data['car_doc_file']; ?>" class="form-control la_id" name="car_doc_file2">
                                                        <label class="col-form-label" for="validationCustom06">ລະຫັດລູກຄ້າ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?= $data['cus_runing']; ?>" class="form-control cus_runing" id="validationCustom01" placeholder="ປ້ອນລະຫັດລູກຄ້າ..." required="" name="cus_runing">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ຊື່ ແລະ ນາມສະກຸນ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?= $data['cus_fname']; ?>" class="form-control cus_fname" id="validationCustom01" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ..." required="" name="cus_fname" readonly>
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ຊື່ຜູ້ລົງກວດການຕົວຈິງ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?= $data['car_check_name']; ?>" class="form-control car_check_name" id="validationCustom01" placeholder="ປ້ອນຊື່ຜູ້ລົງກວດການຕົວຈິງ..." required="" name="car_check_name">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ວັນທີລົງກວດສອບ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="date" class="form-control car_date_check" value="<?= $data['car_date_check']; ?>" id="validationCustom01" placeholder="ປ້ອນຊື່ຜູ້ລົງກວດການຕົວຈິງ..." required="" name="car_date_check">
                                                        </div>

                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ເວລາລົງກວດສອບ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="time" class="form-control car_time_check" value="<?= $data['car_time_check']; ?>" id="validationCustom01" placeholder="ປ້ອນເລກລະບຽນລົດ..." required="" name="car_time_check">
                                                        </div>

                                                        <label class="col-form-label" for="validationCustom06">ປະເພດລົດ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <select class="form-control form-select car_type" aria-label="Default select example" id="cus_date_of_loan" required="" name="car_type">
                                                                <option value="<?= $data['car_type']; ?>"><?= $data['car_type']; ?></option>
                                                                <option value="">ເລື້ອກ</option>
                                                                <option value="ລົດຈັກ">ລົດຈັກ</option>
                                                                <option value="ລົດໃຫຍ່">ລົດໃຫຍ່</option>
                                                            </select>
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ລະບຽນລົດ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?= $data['car_number']; ?>" class="form-control car_number" id="validationCustom01" placeholder="ປ້ອນເລກລະບຽນລົດ..." required="" name="car_number">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ເລກຈັກ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?= $data['car_eg_number']; ?>" class="form-control car_eg_number" id="validationCustom01" placeholder="ປ້ອນເລກຈັກ..." required="" value="" name="car_eg_number">
                                                        </div>

                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ເລກຖັງ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?= $data['car_t_number']; ?>" class="form-control car_t_number" id="validationCustom01" placeholder="ປ້ອນເລກຖັງ..." required="" name="car_t_number">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ຍີ່ຫໍ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?= $data['car_brand']; ?>" class="form-control car_brand" id="validationCustom01" placeholder="ປ້ອນຍີ່ຫໍ..." required="" name="car_brand">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ສີລົດ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?= $data['car_color']; ?>" class="form-control car_color" id="validationCustom01" placeholder="ປ້ອນສີລົດ..." required="" value="" name="car_color">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ອອກຊື່
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="text" value="<?= $data['car_name']; ?>" class="form-control car_name" id="validationCustom01" placeholder="ປ້ອນອອກຊື່..." required="" name="car_name">
                                                        </div>

                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label class="col-form-label" for="validationCustom06">ປີນຳໃຊ້
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="date" value="<?= $data['car_u_year']; ?>" class="form-control car_u_year" id="validationCustom01" placeholder="ປ້ອນປີນຳໃຊ້..." required="" name="car_u_year">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ມູນຄ່າເດີມຂອງຊັບສົມບັດ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="number" value="<?= $data['car_original_price']; ?>" class="form-control car_original_price" id="validationCustom01" placeholder="0.00" required="" name="car_original_price">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ມູນຄ້າຊັບສົມບັດ ຕາມລາຄາຕະຫຼາດ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="number" value="<?= $data['car_market_price']; ?>" class="form-control car_market_price" id="validationCustom01" placeholder="0.00" required="" name="car_market_price">
                                                        </div>
                                                        <label class="col-form-label" for="validationCustom06">ມູນຄ້າປະເມີນຂອງພະນັກງານ
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                            <input type="number" value="<?= $data['car_pham']; ?>" class="form-control car_pham" id="validationCustom01" placeholder="0.00" required="" name="car_pham">
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
                                        <input style="height: 200px; font-size: 18px;" value="<?= $data['car_explain']; ?>" type="text" class="form-control" id="validationCustom01" name="car_explain">
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
                                                    <input type="file" id="image" class="car_image0" name="car_image0" accept="image/*">
                                                </label>
                                                <img width="100%" id="previewImg" src="collateral_car_images/<?php echo $data['car_image0']; ?>" alt="">
                                            </div>
                                            <div class="col-xl-3">
                                                <label style="margin-top: 2.2rem;" for="image1" class="drop-container">
                                                    <span style="margin-top: 2rem;" class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດຮູບພາບ 2</span>
                                                    <br>
                                                    <input type="file" id="image1" class="car_image1" name="car_image1" accept="image/*">
                                                </label>
                                                <img width="100%" id="previewImg1" src="collateral_car_images/<?php echo $data['car_image1']; ?>" alt="">
                                            </div>
                                            <div class="col-xl-3">
                                                <label style="margin-top: 2.2rem;" for="image2" class="drop-container">
                                                    <span style="margin-top: 2rem;" class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດຮູບພາບ 3</span>
                                                    <br>
                                                    <input type="file" id="image2" class="car_image2" name="car_image2" accept="image/*">
                                                </label>
                                                <img width="100%" id="previewImg2" src="collateral_car_images/<?php echo $data['car_image2']; ?>" alt="">
                                            </div>
                                            <div class="col-xl-3">
                                                <label style="margin-top: 2.2rem;" for="image3" class="drop-container">
                                                    <span style="margin-top: 2rem;" class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດຮູບພາບ 4</span>
                                                    <br>
                                                    <input type="file" id="image3" class="car_image3" name="car_image3" accept="image/*">
                                                </label>
                                                <img width="100%" id="previewImg3" src="collateral_car_images/<?php echo $data['car_image3']; ?>" alt="">
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
                                            <span class="input-group-text" id="inputGroupPrepend">#</span>
                                            <input type="text" value="<?= $data['car_doc_name']; ?>" class="form-control car_doc_name" name="car_doc_name" id="validationCustom01" placeholder="ປ້ອນຊື່ເອກະສານ..." required="">
                                        </div>
                                        <label class="col-form-label" for="validationCustom06">ອັບໂຫຼດເອກະສານ
                                            <span class="text-danger">ອັບໂຫລດສະເພາະຟາຍ PDF ເທົ່ານັ້ນ*</span>
                                        </label>

                                        <label for="car_doc_file" class="drop-container_cod">
                                            <span class="drop-title"><i class="bi bi-cloud-upload-fill me-2"></i>ອັບໂຫຼດເອກກະສານ</span>
                                            <a href="collateral_docs_car/<?php echo $data['car_doc_file']; ?>">ຟາຍເອກກະສານ : <?= $data['car_doc_file']; ?></a>
                                            <input type="file" id="car_doc_file" class="car_doc_file" name="car_doc_file" accept="application/pdf">
                                        </label>
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
<?php } ?>