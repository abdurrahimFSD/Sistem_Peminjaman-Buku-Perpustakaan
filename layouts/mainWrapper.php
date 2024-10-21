<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-layout="vertical" id="htmlRoot">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php
    $pageTitle = 'Dashboard';

    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'home':
                $pageTitle = 'Dashboard';
                break;
            case 'anggotaData':
                $pageTitle = 'Data Anggota';
                break;
            case 'anggotaCreate':
                $pageTitle = 'Tambah Data Anggota';
                break;
            case 'anggotaUpdate':
                $pageTitle = 'Edit Data Anggota';
                break;
            case 'bukuData':
                $pageTitle = 'Data Buku';
                break;
            case 'bukuCreate':
                $pageTitle = 'Tambah Data Buku';
                break;
            case 'bukuUpdate':
                $pageTitle = 'Edit Data Buku';
                break;
            case 'bukuDetail':
                $pageTitle = 'Detail Data Buku';
                break;
            case 'peminjamanData':
                $pageTitle = 'Data Peminjaman';
                break;
            case 'peminjamanCreate':
                $pageTitle = 'Tambah Data Peminjaman';
                break;
            case 'peminjamanUpdate':
                $pageTitle = 'Edit Data Peminjaman';
                break;
            case 'peminjamanDetail':
                $pageTitle = 'Detail Data Peminjaman';
                break;
        }
    }
    ?>
    
    <title><?php echo $pageTitle; ?></title>

    <!-- Core Css -->
    <link rel="stylesheet" href="./assets/css/custom.css">

    <!-- Datatable -->
    <link rel="stylesheet" href="./assets/libs/datatable/datatables.min.css">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="./assets/libs/sweetalert/sweetalert2.min.css">
    <script src="./assets/libs/sweetalert/sweetalert2.all.min.js"></script>
    
    <style>
        html {
            display: none; 
        }
    </style>
    <script>
        (function() {
            const savedTheme = localStorage.getItem('selectedTheme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
            document.documentElement.style.display = 'block'; 
        })();
    </script>
</head>
<body class="link-sidebar">

    <!-- Main Wrapper Start -->
    <div id="main-wrapper">