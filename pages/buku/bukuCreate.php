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
                    <hr class="mb-4"></hr>
                    <form class="form-horizontal" action="" method="post">
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
                            <input type="date" name="tahunTerbit" id="tahunTerbit" class="form-control" required>
                        </div>
                    </form>
                </div>
                <!-- ENd Card body main content -->

            </div>
            <!-- End Main Content -->
    </div>
</div>
<!-- Body Wrapper End -->