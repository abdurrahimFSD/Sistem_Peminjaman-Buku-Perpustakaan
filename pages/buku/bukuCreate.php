<?php
// Array kategori Buku
$kategori = ['Teknologi', 'Ilmu Pengetahuan', 'Pendidikan', 'Agama', 'Kesehatan', 'Geografi'];
?>

<!-- Body Wrapper Start -->
<div class="body-wrapper ">
    <div class="container-fluid">

            <!-- Start Breadcrumb -->
            <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Tambah Data Buku</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="./">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Tambah Data Buku</li>
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

            <!-- Start Main Content -->
            <div class="widget-content searchable-container list">

                <!-- Start Card body main content -->
                <div class="card card-body">
                    <h4 class="card-title">Masukkan Data Buku</h4>
                    <hr class="mb-4">
                    <form id="bukuCreateForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judulBuku" class="form-label">Judul Buku</label>
                            <input type="text" name="judulBuku" id="judulBuku" class="form-control" placeholder="Data Structure & Algorithms" required>
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" placeholder="978-11-0001" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                            <input type="text" name="tahunTerbit" id="tahunTerbit" class="form-control" onfocus="this.showPicker()" placeholder="2020" required>
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Ahmad" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select" required>
                                <option selected disabled>Pilih Kategori</option>
                                <?php foreach ($kategori as $kategoriData) { ?>
                                    <option value="<?= $kategoriData; ?>">
                                        <?= $kategoriData; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" onchange="previewImage(event)">
                            <img id="imgPreview" src="" alt="Pratinjau Foto" class="mt-3" style="max-width: 100px; display: none;">
                            <div id="fileError" class="text-danger mt-2" style="display: none;"></div>
                            <button type="button" class="btn btn-sm btn-outline-danger mt-2" id="hapusFoto" style="display: none;">Hapus File</button>
                        </div>
                        <a href="?page=bukuData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-secondary me-2">
                            <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5"></iconify-icon>Kembali
                        </a>
                        <button type="submit" name="simpan" value="bukuCreate" class="d-inline-flex justify-content-center align-items-center btn btn-primary">
                            <iconify-icon icon="fluent:save-24-regular" class="me-1 fs-5"></iconify-icon>Simpan
                        </button>
                    </form>
                </div>
                <!-- ENd Card body main content -->

            </div>
            <!-- End Main Content -->
    </div>
</div>
<!-- Body Wrapper End -->