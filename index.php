<?php
include('./layouts/mainWrapper.php');
include('./layouts/sidebar.php');
include('./layouts/pageWrapper.php');

switch($_GET['page']) {
    case 'home':
        include('./home.php');
        break;

    case 'bukuData':
        include('./pages/buku/bukuRead.php');
        break;
    case 'bukuCreate':
        include('./pages/buku/bukuCreate.php');
        break;
    case 'bukuUpdate':
        include('./pages/buku/bukuUpdate.php');
        break;

    case 'anggotaData':
        include('./pages/anggota/anggotaRead.php');
        break;
    case 'anggotaCreate':
        include('./pages/anggota/anggotaCreate.php');
        break;
    case 'anggotaUpdate':
        include('./pages/anggota/anggotaUpdate.php');
        break;

    case 'peminjamanData':
        include('./pages/peminjaman/peminjamanRead.php');
        break;
    case 'peminjamanCreate':
        include('./pages/peminjaman/peminjamanCreate.php');
        break;

    default:
        include('./home.php');
}

include('./layouts/footer.php');
?>