// Mengecek apakah URL mengandung parameter status dan isbn
const urlParams = new URLSearchParams(window.location.search);
const status = urlParams.get('status');
const kodeIsbn = urlParams.get('isbn');

// Kode alert untuk operasi create atau tambah
if (status === 'successBukuCreate') {
    Swal.fire({
        title: 'Berhasil',
        text: 'Data buku berhasil ditambahkan',
        icon: 'success'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = './index.php?page=bukuData';
        }
    });
} else if (status === 'duplicateIsbn' && kodeIsbn) {
    Swal.fire({
        title: 'Gagal',
        text: `ISBN ${kodeIsbn} sudah ada, tidak boleh sama`,
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            history.back();
        }
    });
} else if (status === 'fileTidakValid') {
    Swal.fire({
        title: 'Gagal',
        text: 'File yang diupload harus berupa gambar (jpg, jpeg, png, svg)',
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            history.back();
        }
    });
} else if (status === 'fileBesar') {
    Swal.fire({
        title: 'Gagal',
        text: 'Ukuran file terlalu besar! Maksimal 2MB',
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            history.back();
        }
    });
} else if (status === 'successAnggotaCreate') {
    Swal.fire({
        title: 'Berhasil',
        text: 'Data anggota berhasil ditambahkan',
        icon: 'success'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = './index.php?page=anggotaData';
        }
    })
}

// Kode alert untuk operasi update atau edit
if (document.getElementById('simpanAnggotaUpdate')) {
    document.getElementById('simpanAnggotaUpdate').addEventListener('click', function() {
        Swal.fire({
            
        })
    })
}