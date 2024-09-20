<?php
include('./config/connection.php');

// Ambil id_pinjam dari query string
$idPinjam = isset($_GET['id_pinjam']) ? intval($_GET['id_pinjam']) : 0;

// Mendapatkan data peminjaman dari database berdasarkan id_pinjam yg dikirim
$queryGetDetail = "SELECT peminjaman.*, buku.judul_buku, anggota.nama_anggota
                    FROM peminjaman
                    JOIN buku ON peminjaman.buku_id = buku.id_buku
                    JOIN anggota ON peminjaman.anggota_id = anggota.id_anggota
                    WHERE peminjaman.id_pinjam = $idPinjam";
$resultGetDetail = mysqli_query($connection, $queryGetDetail);

if ($resultGetDetail) {
    $peminjamanData = mysqli_fetch_assoc($resultGetDetail);
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
                        <h4 class="fw-semibold mb-8">Detail Peminjaman</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="./">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Detail Peminjaman</li>
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
                <h3>Detail Peminjaman: </h3>
                <hr class="mb-4">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">ID Pinjam</p>
                            </td>
                            <td class="col-6 col md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($peminjamanData['id_pinjam']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Tanggal Pinjam</p>
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