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
        } elseif ($result == 'fileBesar') {
            header("Location: ../index.php?page=bukuCreate&status=fileBesar");
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
    } 
}
?>