<?php
include('./controllers/function.php');

$no = 1;
// Memanggil function fetchData dengan argumen buku
$bukuData = fetchData('buku');
?>

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
                        <table id="dataTables" class="table search-table align-middle text-nowrap">
                            <thead class="header-item">
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>ISBN</th>
                                <th>Kategori</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($bukuData as $row) { ?>
                                <!-- start row -->
                                <tr class="search-items">
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <?php 
                                            // Cek apakah foto buku adalah foto default atau bukan
                                            if ($row['foto'] === 'book-default.jpg') {
                                                // Jika foto default, tampilkan dari folder default
                                                $fotoPath = './assets/images/book/' . $row['foto'];
                                            } else {
                                                // Jika bukan foto default, tampilkan dari folder buku
                                                $fotoPath = './uploads/images/buku/' . $row['foto'];
                                            }
                                            ?>
                                            <img src="<?= $fotoPath ?>" alt="Book" class="rounded" width="50" />
                                            <div class="ms-3">
                                                <div>
                                                    <h6 class="mb-0">
                                                        <?= $row['judul_buku']; ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $row['isbn']; ?>
                                    </td>
                                    <td>
                                        <?= $row['kategori']; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btn">
                                            <a href="?page=bukuDetail&id_buku=<?= $row['id_buku']; ?>" class="btn btn-outline-info btn-sm d-inline-flex" data-bs-toggle="tooltip" data-bs-title="Detail" aria-label="Detail">
                                                <iconify-icon icon="tabler:info-square" class="fs-5"></iconify-icon>
                                            </a>
                                            <a href="?page=bukuUpdate&id_buku=<?= $row['id_buku']; ?>" class="btn btn-outline-warning btn-sm d-inline-flex mx-1" data-bs-toggle="tooltip" data-bs-title="Edit" aria-label="Edit">
                                                <iconify-icon icon="tabler:pencil" class="fs-5"></iconify-icon>
                                            </a>
                                            <a href="#" id="deleteButtonBuku" class="btn btn-outline-danger btn-sm d-inline-flex delete" data-bs-toggle="tooltip" data-bs-title="Hapus" aria-label="Hapus" onclick="confirmDelete('<?= $row['id_buku']; ?>')">
                                                <iconify-icon icon="tabler:trash" class="fs-5"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- end row -->
                                <?php } ?>
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