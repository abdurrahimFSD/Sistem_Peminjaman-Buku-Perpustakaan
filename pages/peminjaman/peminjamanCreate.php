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
            <form id="peminjamanCreateForm">
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
                    <label for="namaAnggota" class="form-label">Nama Anggota</label>
                    <select name="namaAnggota" id="namaAnggota" class="form-select" required>
                        <option value="" selected disabled>Pilih Nama Anggota</option>
                        <?php while ($anggotaData = mysqli_fetch_assoc($resultAnggota)) { ?>
                            <option value="<?= $anggotaData['id_anggota']; ?>">
                                <?= $anggotaData['nama_anggota']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="namaPustakawan" class="form-label">Nama Pustakawan</label>
                    <input type="text" name="namaPustakawan" id="namaPustakawan" class="form-control" placeholder="Ronaldo" required>
                </div>
                <div class="mb-3">
                    <label for="jumlahBukuDipinjam" class="form-label">Jumlah Buku Dipinjam</label>
                    <input type="number" name="jumlahBukuDipinjam" id="jumlahBukuDipinjam" class="form-control" placeholder="3" required>
                </div>
                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="" selected disabled>Pilih Status</option>
                        <?php foreach ($status as $statusData) { ?>
                            <option value="<?= $statusData; ?>">
                                <?= $statusData; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <a href="?page=peminjamanData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-secondary me-2">
                    <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5"></iconify-icon>Kembali
                </a>
                <input type="hidden" name="simpan" value="peminjamanCreate">
                <button type="submit" class="d-inline-flex justify-content-center align-items-center btn btn-primary">
                    <iconify-icon icon="fluent:save-24-regular" class="me-1 fs-5"></iconify-icon>Simpan
                </button>
            </form>
        </div>
        <!-- End Card Body -->
        
    </div>
</div>
<!-- Body Wrapper End -->