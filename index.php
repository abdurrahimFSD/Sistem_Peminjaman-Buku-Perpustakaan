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

    default:
        include('./home.php');
}

include('./layouts/footer.php');
?>