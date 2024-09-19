<?php
include('./config/connection.php');

// Ambil data dari table buku
$queryBuku = "SELECT id_buku, judul_buku FROM buku";
$resultBuku = mysqli_query($connection, $queryBuku);

// Ambil data dari table anggota
$queryAnggota = "SELECT id_anggota, nama_anggota FROM anggota";
$resultAnggota = mysqli_query($connection, $queryAnggota);

// Array status
$status = ['Dipinjam', 'Dikembalikan', 'Terlambat'];
?>

<!-- Body Wrapper Start -->
<div class="body-wrapper ">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Tambah Data Peminjaman</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="./">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Tambah Data Peminjaman</li>
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
            <h4 class="card-title">Masukkan Data Peminjaman</h4>
            <hr class="mb-4">
            <form id="peminjamanCreateForm" action="./controllers/process.php" method="post">
                <div class="mb-3">
                    <label for="tanggalPinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tanggalPinjam" id="tanggalPinjam" class="form-control" onfocus="this.showPicker()" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tanggalKembali" id="tanggalKembali" class="form-control" onfocus="this.showPicker()" required>
                </div>
                <div class="mb-3">
                    <label for="judulBuku" class="form-label">Judul Buku</label>
                    <select name="judulBuku" id="judulBuku" class="form-select" required>
                        <option value="" selected disabled>Pilih Judul Buku</option>
                        <?php while ($bukuData = mysqli_fetch_assoc($resultBuku)) { ?>
                            <option value="<?= $bukuData['id_buku']; ?>">
                                <?= $bukuData['judul_buku']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    
                </div>
            </form>
        </div>
        <!-- End Card Body -->
        
    </div>
</div>
<!-- Body Wrapper End -->