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

// Function uploadFile
function uploadFile($file) {
    $namaFile = $file['foto']['name'];
    $ukuranFile = $file['foto']['size'];
    $error = $file['foto']['error'];
    $tmpName = $file['foto']['tmp_name'];

    // Cek apakah ada file yg diupload
    if ($error === 4) {
        return false;
    }

    // Cek apakah file yg diupload adalah gambar
    $ektensiFileValid = ['jpg', 'jpeg', 'png', 'svg'];
    $ektensiFile = explode('.', $namaFile);
    $ektensiFile = strtolower(end($ektensiFile));
    if (!in_array($ektensiFile, $ektensiFileValid)) {
        return 'fileTidakValid';
    }

    // Cek ukuran file jika terlalu besar (misal, lebih dari 2MB)
    if ($ukuranFile > 2000000) {
        return 'fileBesar';
    }

    // Generate nama file baru yg unik
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ektensiFile;

    // Pindahkan ke folder uploads/images/buku
    move_uploaded_file($tmpName, '../uploads/images/buku/' . $namaFileBaru);

    return $namaFileBaru;
}

// Function bukuCreate untuk menambahkan data buku baru ke database
function bukuCreate($data, $file) {
    global $connection;

    // Ambil data buku dari array $data ($_POST)
    $judulBuku = $data['judulBuku'];
    $isbn = $data['isbn'];
    $tahunTerbit = $data['tahunTerbit'];
    $penulis = $data['penulis'];
    $kategori = $data['kategori'];

    // Mengecek apakah kode isbn sudah ada
    $queryCekIsbn = "SELECT * FROM buku WHERE isbn = '$isbn'";
    $resultCekIsbn = mysqli_query($connection, $queryCekIsbn);
    if (mysqli_num_rows($resultCekIsbn) > 0) {
        // Jika kode isbn sudah ada, ambil kode isbn
        $existingIsbn = mysqli_fetch_assoc($resultCekIsbn);
        return 'duplicateIsbn:' .$existingIsbn['isbn'];
    } else {
        // Proses file upload dari $file ($_FILES)
        $foto = uploadFile($file);
        if (!$foto) {
            $foto = 'book-default.jpg';
        } elseif ($foto == 'fileTidakValid') {
            return 'fileTidakValid';
        } elseif ($foto == 'fileBesar') {
            return 'fileBesar';
        }

        // Jika tidak ada masalah, maka lanjut query untuk menambahkan data buku
        $queryBukuCreate = "INSERT INTO buku (judul_buku, isbn, tahun_terbit, penulis, kategori, foto) VALUES ('$judulBuku', '$isbn', '$tahunTerbit', '$penulis', '$kategori', '$foto')";
        $resultBukuCreate = mysqli_query($connection, $queryBukuCreate);
    
        // Kembalikan true/success jika berhasil
        if ($resultBukuCreate) {
            return 'success';
        } else {
            return false;
        }
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
}
?>