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

// Function signin untuk login
function signin($username, $password) {
    global $connection;

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Menyimpan data user ke dalam session
            session_start();
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Function logout untuk menangani logout
function logout() {
    session_start();
    session_unset();
    session_destroy();
}
?>