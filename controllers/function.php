<?php
// Memeriksa apakah file 'connection.php' ada di dalam folder config
if (file_exists('./config/connection.php')) {
    // Jika ada maka include connection.php
    include('./config/connection.php');
} elseif (file_exists('../config/connection.php')) {
    include('../config/connection.php');
} else {
    die('Connection file not found');
}

// Function fetchData untuk mengambil semua data dari table
function fetchData($tableName) {
    global $connection;
    
    // Membuat query SQL untuk memilih semua data dari table yg namanya diberikan melalui parameter $tableName
    $query = "SELECT * FROM $tableName";

    // Menjalankan query SQL 
    $result = mysqli_query($connection, $query);

    // Menyiapkan array kosong untuk menyimpan data hasil query
    $data = [];

    // Mengambil setiap baris data hasil query dan menambahkannya ke dalam array $data
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
     
    // Mengembalikan array $data yg berisi semua baris data dari table
    return $data;
}

// Function bukuCreate untuk menambahkan data buku baru ke database
function bukuCreate($data) {
}
?>