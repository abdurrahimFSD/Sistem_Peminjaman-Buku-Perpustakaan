<?php
include('../../config/connection.php');

// Function signup untuk membuat akun baru
function signup($username, $email, $password) {
    global $connection;

    // Cek apakah username atau email sudah terdaftar
    $query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika username atau email sudah ada, return pesan yang sesuai
        $row = $result->fetch_assoc();
        if ($row['username'] === $username) {
            return "Username sudah terdaftar";
        } else if ($row['email'] === $email) {
            return "Email sudah terdaftar";
        }
    } else {
        // Menyiapkan query SQL untuk memasukkan data user ke dalam table users
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>