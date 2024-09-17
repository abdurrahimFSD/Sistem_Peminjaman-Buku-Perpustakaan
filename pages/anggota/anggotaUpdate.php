<?php
?>

<!-- Body Wrapper Start -->
<div class="body-wrapper ">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Edit Data Anggota</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="./">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Edit Data Anggota</li>
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
            <h4 class="card-title">Masukkan Data Anggota</h4>
            <hr class="mb-4">
            <form action="./controllers/process.php" method="post">
                <input type="hidden" name="idAnggota">
                <div class="mb-3">
                    <label for="namaAnggota" class="form-label">Nama Anggota</label>
                    <input type="text" name="namaAnggota" id="namaAnggota" class="form-control" placeholder="Erling Haaland" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Norway" required>
                </div>
                <div class="mb-3">
                    <label for="noTelepon" class="form-label">No Telepon</label>
                    <input type="text" name="noTelepon" id="noTelepon" class="form-control" placeholder="081347200001" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="erlinghaaland@gmail.com" required>
                </div>
                <a href="?page=anggotaData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-secondary me-2">
                    <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5"></iconify-icon>Kembali
                </a>
                <input type="hidden" name="simpan" value="anggotaUpdate">
                <button type="button" id="simpanAnggotaUpdate" class="d-inline-flex justify-content-center align-items-center btn btn-primary">
                    <iconify-icon icon="fluent:save-24-regular" class="me-1 fs-5"></iconify-icon>Simpan
                </button>
            </form>
        </div>
        <!-- End Card Body -->
        
    </div>
</div>
<!-- Body Wrapper End -->