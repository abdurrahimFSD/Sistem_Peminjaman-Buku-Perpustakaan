<!-- Body Wrapper Start -->
<div class="body-wrapper ">
    <div class="container-fluid">
        
            <!-- Start Breadcrumb -->
            <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Data Buku</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="./">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Data Buku</li>
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

                <!-- Start card body content -->
                <div class="card card-body">
                    <div class="d-flex justify-content-end mb-9">
                        <a href="?page=bukuCreate" class="btn btn-primary d-flex align-items-center">
                            <iconify-icon icon="fluent:book-add-28-regular" class="me-1"></iconify-icon>Tambah Data
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table search-table align-middle text-nowrap">
                            <thead class="header-item">
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>ISBN</th>
                                <th>Kategori</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <!-- start row -->
                                <tr class="search-items">
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="./assets/images/book/JavaScript The Good Parts.jpg" alt="Book" class="rounded" width="50" />
                                            <div class="ms-3">
                                                <div>
                                                    <h6 class="mb-0">JavaScript Programming</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        978-10-0001
                                    </td>
                                    <td>
                                        Teknologi
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btn">
                                            <a href="javascript:void(0)" class="btn btn-outline-info btn-sm d-inline-flex" data-bs-toggle="tooltip" data-bs-title="Detail">
                                                <iconify-icon icon="tabler:info-square" class="fs-5"></iconify-icon>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-outline-warning btn-sm d-inline-flex mx-1" data-bs-toggle="tooltip" data-bs-title="Edit">
                                                <iconify-icon icon="tabler:pencil" class="fs-5"></iconify-icon>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm d-inline-flex delete">
                                                <iconify-icon icon="tabler:trash" class="fs-5"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- end row -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Card Body Content -->

            </div>
            <!-- End Main Content -->

    </div>
</div>
<!-- Body Wrapper End -->