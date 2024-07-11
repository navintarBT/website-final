
<!DOCTYPE html>
<html lang="en" class="h-100">
<?php
session_start();
session_destroy();
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
    <title>ໜ້າລ໋ອກອິນ/ລະບົບບໍລິຫານເງິນກູ້ S&K</title>

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
   <script>
    $(function () {
        // Function to handle form submission
        function submitForm() {
            var user_name = $(".user_name").val();
            var user_password = $(".user_password").val();
            if (user_name == "") {
                Swal.fire(
                    'ກະລຸນາປ່ອນຊື່ຜູ້ນຳໃຊ້ !',
                    'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                    'warning'
                )
            } else if (user_password == "") {
                Swal.fire(
                    'ກະລຸນາປ່ອນລະຫັດຜ່ານ !',
                    'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
                    'warning'
                )
            } else {
                $.post("check_users.php", {
                    user_name: user_name,
                    user_password: user_password
                },
                    function (output) {
                        $(".show").html(output);
                    });
            }
        }

        // Click event on submit button
        $(".submit").click(function () {
            submitForm();
        });

        // Keydown event on input fields
        $(".user_name, .user_password").keydown(function (event) {
            // Check if the pressed key is Enter (key code 13)
            if (event.keyCode == 13) {
                // Trigger the click event on the submit button
                $(".submit").click();
            }
        });
    });
</script>

</head>

<body>
    <div class="containar-fluid box">
        <div class="row">
            <div class="col-md-4"></div>
            <div style="margin-top: 250px;" class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <div class="logo">
                                <img src="images/s&k_logo.png" width="120" height="120" alt="">
                            </div>
                        </div>
                        <h4 class="text-center mb-4">ລ໋ອກອິນເຂົ້າສູ້ລະບົບ</h4>
                        <form action="" class="needs-validation" novalidate="" method="post">
                            <div class="mb-3">
                                <label class="mb-1"><strong> ຊື່ຜູ້ນຳໃຊ້</strong></label>
                                <input type="text" class="form-control user_name" placeholder="ປ້ອນຊື້ຜູ້ນຳໃຊ້" value="" required="" name="user_name">
                                <div class="invalid-feedback">
                                    ກາລຸນາປ້ອນຊື່ຜູ້ນຳໃຊ້.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1"><strong>ລະຫັດຜ່ານ</strong></label>
                                <input type="password" class="form-control user_password" value="" placeholder="ປ້ອນລະຫັດຜ່ານ..." required="" name="user_password">
                                <div class="invalid-feedback">
                                    ກາລຸນາປ້ອນລະຫັດຜ່ານ.
                                </div>
                            </div>
                            <div class="text-center">

                                <button type="button" name="submit" class="btn btn-primary btn-block submit">ລ໋ອກອິນ</button>

                            </div>
                        </form>
                    </div>
                    <div class="card-footer show"></div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

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