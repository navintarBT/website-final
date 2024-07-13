<?php
require_once "config/conect_nal.php";
session_start();
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];

$sql = mysqli_query($conns, "select user_id,user_satus,user_flname,user_image from users where user_name='$user_name' and user_password='$user_password' ");
$a = mysqli_num_rows($sql); // ກວດສອບຂໍ້ມູນວ່າມີຫຼືບໍ່
if ($a <> 0) { // ຖ້າມີຂໍ້ມູນ ໃຫ້ທຳງານຕາມເງື່ອນໄຂດັ່ງນີ້ :
    $rows = mysqli_fetch_array($sql);
    if ($rows['user_satus'] == "ອຳນວຍການ") { // ຖ້າຫາກສະຖານະຂອງຜຸ້ລ໋ອກອິນ ແມ່ນ ຜູ້ບໍລິຫານ
        $_SESSION['user_id'] = $rows['user_id']; // ວາງຕົວປ່ຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
        $_SESSION['user_flname'] = $rows['user_flname']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
        $_SESSION['user_satus'] = $rows['user_satus']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
        $_SESSION['user_image'] = $rows['user_image']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
        $_SESSION['checked'] = 1; // ວາງຕົວປ່ຽນ checked ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ 

        echo "
                    <script>
                        let timerInterval
                            Swal.fire({
                            title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
                            timer: 1500,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                const content = Swal.getContent()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                    b.textContent = Swal.getTimerLeft()
                                    }
                                }
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                            }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                            })
                            window.setTimeout(function(){ 
                                location='http://localhost/Loan-management-system/Director/homepage.php';
                            } ,1500);
                    </script>
                ";
    }elseif($rows['user_satus'] == "ການເງິນ") { // ຖ້າຫາກສະຖານະຂອງຜຸ້ລ໋ອກອິນ ແມ່ນ ຜູ້ບໍລິຫານ
    $_SESSION['user_id'] = $rows['user_id']; // ວາງຕົວປ່ຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
    $_SESSION['user_flname'] = $rows['user_flname']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['user_satus'] = $rows['user_satus']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['user_image'] = $rows['user_image']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['checked'] = 1; // ວາງຕົວປ່ຽນ checked ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ 

    echo "
                <script>
                    let timerInterval
                        Swal.fire({
                        title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                b.textContent = Swal.getTimerLeft()
                                }
                            }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                        })
                        window.setTimeout(function(){ 
                            location='http://localhost/Loan-management-system/financial/homepage.php';
                        } ,1500);
                </script>
            ";
}elseif($rows['user_satus'] == "ສິນເຊື່ອ") { // ຖ້າຫາກສະຖານະຂອງຜຸ້ລ໋ອກອິນ ແມ່ນ ຜູ້ບໍລິຫານ
    $_SESSION['user_id'] = $rows['user_id']; // ວາງຕົວປ່ຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
    $_SESSION['user_flname'] = $rows['user_flname']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['user_satus'] = $rows['user_satus']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['user_image'] = $rows['user_image']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['checked'] = 1; // ວາງຕົວປ່ຽນ checked ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ 
    echo "
                <script>
                    let timerInterval
                        Swal.fire({
                        title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                b.textContent = Swal.getTimerLeft()
                                }
                            }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                        })
                        window.setTimeout(function(){ 
                            location='http://localhost/Loan-management-system/Credit/homepage.php';
                        } ,1500);
                </script>
            ";
}elseif($rows['user_satus'] == "ເຄົາເຕີ") { // ຖ້າຫາກສະຖານະຂອງຜຸ້ລ໋ອກອິນ ແມ່ນ ຜູ້ບໍລິຫານ
    $_SESSION['user_id'] = $rows['user_id']; // ວາງຕົວປ່ຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
    $_SESSION['user_flname'] = $rows['user_flname']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['user_satus'] = $rows['user_satus']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['user_image'] = $rows['user_image']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['checked'] = 1; // ວາງຕົວປ່ຽນ checked ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ 

    echo "
                <script>
                    let timerInterval
                        Swal.fire({
                        title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                b.textContent = Swal.getTimerLeft()
                                }
                            }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                        })
                        window.setTimeout(function(){ 
                            location='http://localhost/Loan-management-system/Service/homepage.php';
                        } ,1500);
                </script>
            ";
    }else if($rows['user_satus'] == "ແອັດມິນ") { // ຖ້າຫາກສະຖານະຂອງຜຸ້ລ໋ອກອິນ ແມ່ນ ຜູ້ບໍລິຫານ
    $_SESSION['user_id'] = $rows['user_id']; // ວາງຕົວປ່ຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
    $_SESSION['user_flname'] = $rows['user_flname']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['user_satus'] = $rows['user_satus']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['user_image'] = $rows['user_image']; // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
    $_SESSION['checked'] = 1; // ວາງຕົວປ່ຽນ checked ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ 

    echo "
                <script>
                    let timerInterval
                        Swal.fire({
                        title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                b.textContent = Swal.getTimerLeft()
                                }
                            }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                        })
                        window.setTimeout(function(){ 
                            location='http://localhost/Loan-management-system/Admin/homepage.php';
                        } ,1500);
                </script>
            ";
    } else {
        // Unexpected user status, handle accordingly
        echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'ຖືກຜິດພາດ!',
                text: 'ຊື່ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ...!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect or perform any action after clicking OK
                    // Example: window.location.href = 'login.php';
                }
            });
            </script>";
    }
} else {
echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'ຖືກຜິດພາດ!',
        text: 'ຊື່ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ...!',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect or perform any action after clicking OK
            // Example: window.location.href = 'login.php';
        }
    });
    </script>";
}

