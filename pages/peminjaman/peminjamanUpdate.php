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

// Mendapatkan id_pinjam
if (isset($_GET['id_pinjam'])) {
    $idPinjam = $_GET['id_pinjam'];

    $query = "SELECT * FROM peminjaman WHERE id_pinjam = $idPinjam";
    $result = mysqli_query($connection, $query);
    $peminjamanData = mysqli_fetch_assoc($result);
}
?>

<!-- Body Wrapper Start -->
<div class="body-wrapper ">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Edit Data Peminjaman</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="./">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Edit Data Peminjaman</li>
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
            <form id="peminjamanUpdateForm">
                <div class="mb-3">
                    <label for="tanggalPinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tanggalPinjam" id="tanggalPinjam" class="form-control" onfocus="this.showPicker()" value="<?= $peminjamanData['tanggal_pinjam']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tanggalKembali" id="tanggalKembali" class="form-control" onfocus="this.showPicker()" value="<?= $peminjamanData['tanggal_kembali']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="judulBuku" class="form-label">Judul Buku</label>
                    <select name="judulBuku" id="judulBuku" class="form-select" required>
                        <option value="" selected disabled>Pilih Judul Buku</option>
                        <?php while ($bukuData = mysqli_fetch_assoc($resultBuku)) { ?>
                            <option value="<?= $bukuData['id_buku']; ?>" <?= ($bukuData['id_buku'] == $peminjamanData['buku_id']) ? 'selected' : ''; ?> >
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
                            <option value="<?= $anggotaData['id_anggota']; ?>" <?= ($anggotaData['id_anggota'] == $peminjamanData['anggota_id']) ? 'selected' : ''; ?> >
                                <?= $anggotaData['nama_anggota']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="namaPustakawan" class="form-label">Nama Pustakawan</label>
                    <input type="text" name="namaPustakawan" id="namaPustakawan" class="form-control" placeholder="Ronaldo" value="<?= $peminjamanData['nama_pustakawan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="jumlahBukuDipinjam" class="form-label">Jumlah Buku Dipinjam</label>
                    <input type="number" name="jumlahBukuDipinjam" id="jumlahBukuDipinjam" class="form-control" placeholder="2" value="<?= $peminjamanData['jumlah_buku_dipinjam']; ?>" required>
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
            </form>
        </div>
    </div>
</div>
<!-- Body Wrapper End -->