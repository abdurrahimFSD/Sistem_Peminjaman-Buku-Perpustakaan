<?php
include('./config/connection.php');

// Array Kategori Buku
$kategori = ['Teknologi', 'Ilmu Pengetahuan', 'Pendidikan', 'Agama', 'Kesehatan', 'Geografi'];

// Mendapatkan id_buku
if (isset($_GET['id_buku'])) {
    $idBuku = $_GET['id_buku'];

    $query = "SELECT * FROM buku WHERE id_buku = '$idBuku'";
    $result = mysqli_query($connection, $query);
    $bukuData = mysqli_fetch_assoc($result);
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
                            <h4 class="fw-semibold mb-8">Edit Data Buku</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="./">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Edit Data Buku</li>
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

            <!-- Start card body -->
            <div class="card card-body">
                <div class="card-title">Masukkan Data Buku</div>
                <hr class="mb-4">
                <form action="./controllers/process.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idBuku" value="<?= $bukuData['id_buku']; ?>">
                    <div class="mb-3">
                        <label for="judulBuku" class="form-label">Judul Buku</label>
                        <input type="text" name="judulBuku" id="judulBuku" class="form-control" placeholder="Data Structure & Algorithms" value="<?= $bukuData['judul_buku']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" name="isbn" id="isbn" class="form-control" placeholder="978-11-0001" value="<?= $bukuData['isbn']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                        <input type="text" name="tahunTerbit" id="tahunTerbit" class="form-control" onfocus="this.showPicker()" value="<?= $bukuData['tahun_terbit']; ?>" placeholder="2020" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Ahmad" value="<?= $bukuData['penulis']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option selected disabled>Pilih Kategori</option>
                            <?php foreach ($kategori as $kategoriData) { ?>
                                <option value="<?= $kategoriData; ?>" <?= ($bukuData['kategori'] == $kategoriData) ? 'selected' : ''; ?> >
                                    <?= $kategoriData; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" onchange="previewImage(event)">

                        <?php
                        if (!empty($bukuData['foto']) && $bukuData['foto'] !== 'book-default.jpg') {
                            $fotoPath = './uploads/images/buku/' . htmlspecialchars($bukuData['foto']);
                        } else {
                            // Tampilkan foto default jika data foto adalah 'book-default.jpg'
                            $fotoPath = './assets/images/book/book-default.jpg';
                        }
                        ?>
                        <img id="imgPreview" src="<?= $fotoPath; ?>" alt="Pratinjau Foto" class="mt-3 d-block" style="max-width: 100px;">
                        <button type="button" class="btn btn-sm btn-outline-danger mt-2" id="hapusFoto" <?= ($bukuData['foto'] === 'book-default.jpg') ? 'style="display: none;"' : ''; ?> >Hapus File</button>

                        <div id="fileError" class="text-danger mt-2" style="display: none;"></div>
                        <button type="button" class="btn btn-sm btn-outline-danger mt-2" id="hapusFoto" style="display: none;">Hapus File</button>
                    </div>
                    <a href="?page=bukuData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-secondary me-2">
                        <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5"></iconify-icon>Kembali
                    </a>
                    <input type="hidden" name="simpan" value="bukuUpdate">
                    <button type="button" id="simpanBukuUpdate" class="d-inline-flex justify-content-center align-items-center btn btn-primary">
                        <iconify-icon icon="fluent:save-24-regular" class="me-1 fs-5"></iconify-icon>Simpan
                    </button>
                </form>
            </div>
            <!-- End card body -->
    
    </div>
</div>
<!-- Body Wrapper End -->