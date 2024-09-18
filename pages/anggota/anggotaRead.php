<?php
include('./controllers/function.php');

$no = 1;
// Memanggil function fetchData dengan argumen anggota
$anggotaData = fetchData('anggota');
?>

<!-- Body Wrapper Start -->
<div class="body-wrapper ">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Data Anggota</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="./">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Data Anggota</li>
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
                <a href="?page=anggotaCreate" class="btn btn-primary d-flex align-items-center">
                    <iconify-icon icon="fluent:book-add-28-regular" class="me-1"></iconify-icon>Tambah Data
                </a>
            </div>

            <div class="table-responsive">
                <table id="dataTables" class="table align-middle text-nowrap">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Anggota</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach ($anggotaData as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama_anggota']); ?></td>
                            <td><?= htmlspecialchars($row['alamat']); ?></td>
                            <td><?= htmlspecialchars($row['no_telepon']); ?></td>
                            <td><?= htmlspecialchars($row['email']); ?></td>
                            <td>
                                <a href="?page=anggotaUpdate&id_anggota=<?= $row['id_anggota']; ?>" class="btn btn-outline-warning btn-sm d-inline-flex me-1" data-bs-toggle="tooltip" data-bs-title="Edit" aria-label="Edit">
                                    <iconify-icon icon="tabler:pencil" class="fs-5"></iconify-icon>
                                </a>
                                <a href="#" id="deleteButtonAnggota" class="btn btn-outline-danger btn-sm d-inline-flex" data-bs-toggle="tooltip" data-bs-title="Hapus" aria-label="Hapus" onclick="confirmDelete('<?= $row['id_anggota']; ?>')">
                                    <iconify-icon icon="tabler:trash" class="fs-5"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Card Body Content -->
        
    </div>
</div>
<!-- Body Wrapper End -->