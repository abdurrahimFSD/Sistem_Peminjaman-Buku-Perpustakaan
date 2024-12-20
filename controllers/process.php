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
            echo 'successBukuCreate';
        } elseif ($result == 'fileTidakValid') {
            echo 'fileBukanGambar';
        } elseif ($result == 'fileBesar') {
            echo 'fileBesar';
        } elseif ($result == 'error') {
            echo 'errorBukuCreate';
        } elseif (is_string($result)) { // Cek apakah hasilnya adalah string (ISBN yang ada)
            echo 'duplicateIsbn:' . $result; // Mengembalikan ISBN yang sudah ada
        }
    } elseif ($_POST['simpan'] == 'bukuUpdate') {   // Jika tombol simpan adalah bukuUpdate
        // Memanggil function bukuUpdate
        $result = bukuUpdate($_POST, $_FILES);

        // Jika result mengembalikan success
        if ($result == 'success') {
            echo 'successBukuUpdate';
        } elseif ($result == 'fileTidakValid') {
            echo 'fileBukanGambar';
        } elseif ($result == 'fileBesar') {
            echo 'fileBesar';
        } elseif ($result == 'error')  {
            echo 'errorBukuUpdate';
        } elseif (is_string($result)) { // Cek apakah hasilnya adalah string (ISBN yang ada)
            echo 'duplicateIsbn:' . $result; // Mengembalikan ISBN yang sudah ada
        }
    } elseif ($_POST['simpan'] == 'anggotaCreate') {
        // Memanggil function anggotaCreate
        $result = anggotaCreate($_POST);

        // Jika result mengembalikan success
        if ($result == 'success') {
            echo 'successAnggotaCreate';
        } elseif ($result == 'error') {
            echo 'errorAnggotaCreate';
        }
    } elseif ($_POST['simpan'] == 'anggotaUpdate') {
        // Memanggil function anggotaUpdate
        $result = anggotaUpdate($_POST);

        // Jika result mengembalikan success
        if ($result == 'success') {
            echo 'successAnggotaUpdate';
        } elseif ($result == 'error') {
            echo 'errorAnggotaUpdate';
        }
    } elseif ($_POST['simpan'] == 'peminjamanCreate') {
        // Memanggil function anggotaUpdate
        $result = peminjamanCreate($_POST);

        // Jika result mengembalikan success
        if ($result == 'success') {
            echo 'successPeminjamanCreate';
        } elseif ($result == 'error') {
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
} elseif (isset($_GET['id_buku'])) {
    $result = bukuDelete($_GET['id_buku']);

    if ($result) {
        echo "successBukuDelete";
    } else {
        echo "errorBukuDelete";
    }
}
?>