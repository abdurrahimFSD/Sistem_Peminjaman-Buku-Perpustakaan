<?php
include('./function.php');

// Mengecek apakah form telah disubmit atau disimpan
if (isset($_POST['simpan'])) {
    // Jika tombol simpan adalah bukuCreate
    if ($_POST['simpan'] == 'bukuCreate') {
        // Memanggil function bukuCreate
        $result = bukuCreate($_POST, $_FILES);

        // Jika result mengembalikan success
        if ($result == 'success') {
            header("Location: ../index.php?page=bukuCreate&status=successBukuCreate");
        } elseif (strpos($result, 'duplicateIsbn') !== false) {
            // Ambil isbn yg duplicate
            $isbnDuplicate = explode(':', $result)[1];
            header("Location: ../index.php?page=bukuCreate&status=duplicateIsbn&isbn=$isbnDuplicate");
        } elseif ($result == 'fileTidakValid') {
            header("Location: ../index.php?page=bukuCreate&status=fileTidakValid");
        } 
    } elseif ($_POST['simpan'] == 'bukuUpdate') {   // Jika tombol simpan adalah bukuUpdate
        // Memanggil function bukuUpdate
        $result = bukuUpdate($_POST, $_FILES);

        // Jika result mengembalikan success
        if ($result == 'success') {
            echo 'successBukuUpdate';
        } elseif (strpos($result, 'duplicateIsbn|') === 0) {
            echo $result;
        } elseif ($result == 'error') {
            echo 'errorBukuUpdate';
        }
    } elseif ($_POST['simpan'] == 'anggotaCreate') {
        // Memanggil function anggotaCreate
        $result = anggotaCreate($_POST);

        // Jika result mengembalikan success
        if ($result == 'success') {
            echo 'successAnggotaCreate';
        } else {
            echo 'errorAnggotaCreate';
        }
    } elseif ($_POST['simpan'] == 'anggotaUpdate') {
        // Memanggil function anggotaUpdate
        $result = anggotaUpdate($_POST);

        // Jika result mengembalikan success
        if ($result == 'success') {
            echo 'successAnggotaUpdate';
        } else {
            echo 'errorAnggotaUpdate';
        }
    } elseif ($_POST['simpan'] == 'peminjamanCreate') {
        // Memanggil function anggotaUpdate
        $result = peminjamanCreate($_POST);

        // Jika result mengembalikan success
        if ($result == 'success') {
            echo 'successPeminjamanCreate';
        } else {
            echo 'errorPeminjamanCreate';
        }
    } elseif ($_POST['simpan'] == 'peminjamanUpdate') {
        $result = peminjamanUpdate($_POST);

        if ($result == 'success') {
            echo 'successPeminjamanUpdate';
        } else {
            echo 'errorPeminjamanUpdate';
        }
    }
}

// Mengecek apakah parameter 'id_anggota' ada di URL untuk menghapus data anggota
if (isset($_GET['id_anggota'])) {
    // Memanggil function anggotaDelete
    $result = anggotaDelete($_GET['id_anggota']);

    // Jika result mengembalikan true
    if ($result) {
        echo "successAnggotaDelete";
    } else {
        echo "errorAnggotaDelete";
    }
} elseif (isset($_GET['id_pinjam'])) {
    $result = peminjamanaDelete($_GET['id_pinjam']);

    if ($result) {
        echo "successPeminjamanDelete";
    } else {
        echo "errorPeminjamanDelete";
    }
}
?>