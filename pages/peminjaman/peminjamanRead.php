<!-- Body Wrapper Start -->
<div class="body-wrapper ">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Data Peminjaman</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="./">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Data Peminjaman</li>
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
    
        <!-- Start card body content -->
        <div class="card card-body">
            <div class="d-flex justify-content-end mb-9">
                <a href="?page=peminjamanCreate" class="btn btn-primary d-flex align-items-center">
                    <iconify-icon icon="fluent:book-add-28-regular" class="me-1"></iconify-icon>Tambah Data
                </a>
            </div>

            <div class="table-responsive">
                <table id="dataTables" class="table align-middle text-nowrap">
                    <thead>
                        <th width="5%">No</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                    </thead>
                </table>
            </div>
        </div>
        <!-- End Card Body Content -->

    </div>
</div>
<!-- Body Wrapper End -->