<?php
// Memeriksa apakah file 'connection.php' ada di dalam folder config
if (file_exists('./config/connection.php')) {
    // Jika ada maka include connection.php
    include('./config/connection.php');
} elseif (file_exists('../config/connection.php')) {
    include('../config/connection.php');
}
?>