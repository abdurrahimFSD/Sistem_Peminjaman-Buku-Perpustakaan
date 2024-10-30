<?php
include('../../controllers/authController.php');

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $signUpResult = signup($username, $email, $password);

    if ($signUpResult === true) {
        echo json_encode(["success" => true]);
        exit();
    } elseif ($signUpResult === 'Username sudah terdaftar') {
        $error = "Username sudah terdaftar";
        echo json_encode(["success" => false, "message" => $error]);
        exit();
    } elseif ($signUpResult === 'Email sudah terdaftar') {
        $error = "Email sudah terdaftar";
        echo json_encode(["success" => false, "message" => $error]);
        exit();
    } else {
        $error = "Gagal mendaftar, coba lagi!";
        echo json_encode(["success" => false, "message" => $error]);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignUp</title>

    <!-- Core Css -->
    <link rel="stylesheet" href="../../assets/css/custom.css">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="../../assets/libs/sweetalert/sweetalert2.min.css">
    <script src="../../assets/libs/sweetalert/sweetalert2.all.min.js"></script>
</head>
<body>
    <!-- Start Main Wrapper -->
    <div id="main-wrapper" class="auth-customizer-none">
        
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                        <div class="card mb-0 rounded-3">
                            
                            <!-- Start Card Body -->
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                                    <span class="fw-bolder fs-7">SignUp</span>
                                </a>
                                <form id="signupForm" method="POST">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required aria-describedby="textHelp" placeholder="admin1">
                                        <div id="usernameError" class="text-danger mt-1 fw-bold"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp" placeholder="example@gmail.com">
                                        <div id="emailError" class="text-danger mt-1 fw-bold"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required placeholder="**********">
                                        <div class="text-danger mt-1 fw-bold">
                                            <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
                                        </div>
                                    </div>
                                    <button type="submit" id="signupButton" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                                        <span id="signupIcon" class="spinner-border spinner-border-sm" style="display: none;" role="status" aria-hidden="true"></span>
                                        <span id="signupText">Sign Up</span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                                        <a class="text-primary fw-medium ms-2" href="./signin.php">Sign In</a>
                                    </div>
                                </form>
                            </div>
                            <!-- End Card Body -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Main Wrapper -->
    

    <script>
    document.getElementById('signupForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form dari submit default
        const signupButton = document.getElementById('signupButton');
        const signupText = document.getElementById('signupText');
        const signupIcon = document.getElementById('signupIcon');

        // Membersihkan pesan kesalahan sebelumnya
        document.getElementById('usernameError').innerHTML = '';
        document.getElementById('emailError').innerHTML = '';
        document.querySelector('.text-danger').innerHTML = '';

        // Menampilkan ikon loading dan mengganti teks tombol
        signupText.textContent = 'Signing Up';
        signupIcon.style.display = 'inline-block';

        // Mengirim data form via AJAX
        const formData = new FormData(this);

        fetch('', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            setTimeout(() => {
                if (data.success) {
                    // Jika pendaftaran berhasil
                    signupIcon.classList.remove('spinner-border', 'spinner-border-sm');
                    signupIcon.classList.add('bi', 'bi-check-lg'); // Menggunakan ikon Bootstrap
                    signupText.textContent = 'Success';

                    // Tampilkan SweetAlert dengan pesan sukses
                    Swal.fire({
                        title: 'Pendaftaran Berhasil!',
                        text: 'Daftar akun berhasil, silahkan login.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect ke halaman sign in setelah klik OK
                            window.location.href = "signin.php";
                        }
                    });
                } else {
                    // Jika pendaftaran gagal
                    signupIcon.classList.remove('spinner-border', 'spinner-border-sm');
                    signupIcon.classList.add('bi', 'bi-x-lg'); // Menggunakan ikon gagal
                    signupText.textContent = 'Failed';

                    // Tampilkan pesan error
                    if (data.message.includes("Username sudah ada")) {
                        document.getElementById('usernameError').innerHTML = data.message; // Pesan error di bawah input username
                    } else if (data.message.includes("Email sudah digunakan")) {
                        document.getElementById('emailError').innerHTML = data.message; // Pesan error di bawah input email
                    } else {
                        document.querySelector('.text-danger').innerHTML = `<p>${data.message}</p>`; // Pesan error umum
                    }

                    // Mengembalikan tombol ke keadaan awal setelah 2 detik
                    setTimeout(function() {
                        signupIcon.style.display = 'none';
                        signupIcon.classList.remove('bi-x-lg'); // Menghapus ikon gagal
                        signupIcon.classList.add('spinner-border', 'spinner-border-sm'); // Mengembalikan spinner
                        signupText.textContent = 'Sign Up';
                    }, 2000);
                }
            }, 1000);
        })
        .catch(error => {
            console.error('Error:', error);
            signupIcon.classList.remove('spinner-border', 'spinner-border-sm');
            signupIcon.classList.add('bi', 'bi-x-lg'); // Menggunakan ikon gagal
            signupText.textContent = 'Error';

            // Tampilkan pesan error umum
            document.querySelector('.text-danger').innerHTML = `<p>Terjadi kesalahan pada koneksi. Silakan coba lagi.</p>`;

            // Mengembalikan tombol ke keadaan awal setelah 2 detik
            setTimeout(function() {
                signupIcon.style.display = 'none';
                signupIcon.classList.remove('bi-x-lg'); // Menghapus ikon gagal
                signupIcon.classList.add('spinner-border', 'spinner-border-sm'); // Mengembalikan spinner
                signupText.textContent = 'Sign Up';
            }, 2000);
        });
    });
    </script>
</body>
</html>