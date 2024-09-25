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

// Function bukuCreate
function bukuCreate($data, $file) {
    global $connection;

    // Mengambil data dari array $data
    $judulBuku = $data['judulBuku'];
    $isbn = $data['isbn'];
    $tahunTerbit = $data['tahunTerbit'];
    $penulis = $data['penulis'];
    $kategori = $data['kategori'];

    // Mengecek apakah kode isbn sudah ada
    $queryCekIsbn = "SELECT * FROM buku WHERE isbn = '$isbn'";
    $resultCekIsbn = mysqli_query($connection, $queryCekIsbn);
    if (mysqli_num_rows($resultCekIsbn) > 0) {
        
    }
}

// Function bukuUpdate untuk memperbarui data buku
function bukuUpdate($data, $file) {
    global $connection;

    // Mengambil data buku dari parameter $data yang dikirim melalui form
    $idBuku = $data['idBuku'];
    $judulBuku = $data['judulBuku'];
    $isbn = $data['isbn'];
    $tahunTerbit = $data['tahunTerbit'];
    $penulis = $data['penulis'];
    $kategori = $data['kategori'];
}

// Function anggotaCreate untuk menambahkan data anggota baru ke database
function anggotaCreate($data) {
    global $connection;

    // Mengambil data dari array $data
    $namaAnggota = $data['namaAnggota'];    // Nama Anggota yg akan disimpan
    $alamat = $data['alamat'];
    $noTelepon = $data['noTelepon'];
    $email = $data['email'];

    // Menyiapkan query SQL untuk memasukkan data anggota ke dalam table anggota
    $stmt = $connection->prepare("INSERT INTO anggota (nama_anggota, alamat, no_telepon, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $namaAnggota, $alamat, $noTelepon, $email);

    // Menjalankan query
    if ($stmt->execute()) {
        // Query berhasil dijalankan
        return 'success';
    } else {
        // Terjadi kesalahan saat menjalankan query
        return 'error';
    }

    // Menutup statement
    $stmt->close();
}

// Function anggotaUpdate untuk memperbarui data anggota
function anggotaUpdate($data) {
    global $connection;

    // Mengambil data dari array $data
    $idAnggota = $data['idAnggota'];
    $namaAnggota = $data['namaAnggota'];
    $alamat = $data['alamat'];
    $noTelepon = $data['noTelepon'];
    $email = $data['email'];

    // Menyiapkan query SQL untuk memperbarui data anggota
    $stmt = $connection->prepare("UPDATE anggota SET nama_anggota = ?, alamat = ?, no_telepon = ?, email = ? WHERE id_anggota = ?");
    $stmt->bind_param("ssssi", $namaAnggota, $alamat, $noTelepon, $email, $idAnggota);  // (s= string, i= integer)

    // Menjalankan query
    if ($stmt->execute()) {
        // Query berhasil dijalankan, kembalikan success
        return 'success';
    } else {
        return 'error';
    }

    // Menutup statement
    $stmt->close();
}

// Function anggotaDelete
function anggotaDelete($idAnggota) {
    global $connection;

    // Menyiapkah query SQL untuk menghapus data anggota
    $stmt = $connection->prepare("DELETE FROM anggota WHERE id_anggota = ?");
    $stmt->bind_param("i", $idAnggota);

    // Menjalankan query 
    if ($stmt->execute()) {
        // Query berhasil dijalankan
        return true;
    } else {
        return false;
    }

    // Menutup statement
    $stmt->close();
}

// Function peminjamanCreate
function peminjamanCreate($data) {
    global $connection;

    // Mengambil data dari array $data
    $tanggalPinjam = $data['tanggalPinjam'];
    $tanggalKembali = $data['tanggalKembali'];
    $judulBuku = $data['judulBuku'];
    $namaAnggota = $data['namaAnggota'];
    $namaPustakawan = $data['namaPustakawan'];
    $jumlahBukuDipinjam = $data['jumlahBukuDipinjam'];
    $status = $data['status'];

    // Menyiapkan query SQL untuk memasukkan data peminjaman ke dalam table peminjaman
    $stmt = $connection->prepare("INSERT INTO peminjaman (tanggal_pinjam, tanggal_kembali, buku_id, anggota_id, nama_pustakawan, jumlah_buku_dipinjam, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiisis", $tanggalPinjam, $tanggalKembali, $judulBuku, $namaAnggota, $namaPustakawan, $jumlahBukuDipinjam, $status);

    // Menjalankan query
    if ($stmt->execute()) {
        // Query berhasil dijalankan, kembalikan success
        return 'success';
    } else {
        return 'error';
    }

    // Menutup statement
    $stmt->close();
}

// Function peminjamanUpdate
function peminjamanUpdate($data) {
    global $connection;

    // Mengambil data dari array $data
    $idPinjam = $data['idPinjam'];
    $tanggalPinjam = $data['tanggalPinjam'];
    $tanggalKembali = $data['tanggalKembali'];
    $judulBuku = $data['judulBuku'];
    $namaAnggota = $data['namaAnggota'];
    $namaPustakawan = $data['namaPustakawan'];
    $jumlahBukuDipinjam = $data['jumlahBukuDipinjam'];
    $status = $data['status'];

    // Menyiapkan query SQL untuk memperbarui data peminjaman
    $stmt = $connection->prepare("UPDATE peminjaman SET tanggal_pinjam = ?, tanggal_kembali = ?, buku_id = ?, anggota_id = ?, nama_pustakawan = ?, jumlah_buku_dipinjam = ?, status = ? WHERE id_pinjam = ?");
    $stmt->bind_param("sssssisi", $tanggalPinjam, $tanggalKembali, $judulBuku, $namaAnggota, $namaPustakawan, $jumlahBukuDipinjam, $status, $idPinjam);

    // Menjalankan query
    if ($stmt->execute()) {
        // Query berhasil dijalankan, kembalikan success
        return 'success';
    } else {
        return 'error';
    }

    // Menutup statement
    $stmt->close();
}

// Function peminjamanDelete
function peminjamanaDelete($idPinjam) {
    global $connection;

    // Menyiapkah query SQL untuk menghapus data peminjaman
    $stmt = $connection->prepare("DELETE FROM peminjaman WHERE id_pinjam = ?");
    $stmt->bind_param("i", $idPinjam);

    // Menjalankan query 
    if ($stmt->execute()) {
        // Query berhasil dijalankan
        return true;
    } else {
        return false;
    }

    // Menutup statement
    $stmt->close();
}
?>