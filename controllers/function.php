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
    
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($connection, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
     
    return $data;
}
?>