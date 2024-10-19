<?php
include('./controllers/function.php');
?>

<!-- Body Wrapper Start -->
<div class="body-wrapper ">
    <div class="container-fluid">
        
        <div class="row">
            
            <!-- Card Start Total Buku -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:book-2" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">
                                    <?= getTotalBuku(); ?>
                                </h4>
                                <p class="card-subtitle">Total Buku</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card End Total Buku -->

            <!-- Card Start Total Anggota -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:users" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">
                                    <?= getTotalAnggota(); ?>
                                </h4>
                                <p class="card-subtitle">Total Anggota</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card End Total Anggota -->

            <!-- Card Start Total Buku Dipinjam -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:book" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">
                                    <?= getTotalBukuDipinjam(); ?>
                                </h4>
                                <p class="card-subtitle">Total Buku Dipinjam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card End Total Buku Dipinjam -->
            
        </div>

    </div>
</div>
<!-- Body Wrapper End -->
