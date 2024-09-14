<?php
include('./config/connection.php');

// Ambil id_buku dari query string
$idBuku = isset($_GET['id_buku']) ? intval($_GET['id_buku']) : 0;

// Mendapatkan data buku dari database berdasarkan id_buku yg dikirim
$queryGetDetail = "SELECT * FROM buku WHERE id_buku = '$idBuku'";
$resultGetDetail = mysqli_query($connection, $queryGetDetail);

if ($resultGetDetail) {
    $bukuData = mysqli_fetch_assoc($resultGetDetail);
} else {
    die("Error: " . mysqli_error($connection));
}
?>

<!-- Body Wrapper Start -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Detail Buku</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="./">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Detail Buku</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="./assets/images/breadcrumb/ChatBc.png" alt="modernize-img" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <!-- Start Card Body -->
        <div class="card card-body">
            <div class="row">
                <h3>Detail Buku: </h3>
                <hr class="mb-4">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">ID Buku</p>
                            </td>
                            <td class="col-6 col md-9">
                                <p class="mb-0 text-dark"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Judul Buku</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Isbn</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Tahun Terbit</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Penulis</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Kategori</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Foto</p>
                            </td>
                            <td class="col-6 col-md-9">
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Card Body -->
        
    </div>
</div>
<!-- Body Wrapper End -->