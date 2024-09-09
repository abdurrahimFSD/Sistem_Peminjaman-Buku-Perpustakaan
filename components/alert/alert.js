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
} 