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
        }
    }
}
?>