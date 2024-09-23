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
}

if (document.getElementById('peminjamanCreateForm')) {
    document.getElementById('peminjamanCreateForm').addEventListener('submit', function(event) {
        // Mencegah form submit secara default (refresh halaman) atau Mencegah form dari submit secara langsung
        event.preventDefault();

        const form = document.getElementById('peminjamanCreateForm');
        const formData = new FormData(form);

        // Mengirim form melalui AJAX
        fetch('./controllers/process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(response => {
            if (response === 'successPeminjamanCreate') {
                // Jika sukses, tampilkan alert success
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data peminjaman berhasil ditambahkan',
                    icon: 'success'
                }).then(() => {
                    window.location.href = './index.php?page=peminjamanData';
                });
            } else if (response === 'errorPeminjamanCreate') {
                // Jika gagal, tampilkan alert error
                Swal.fire({
                    title: 'Error',
                    text: 'Gagal menambahkan data peminjaman',
                    icon: 'error'
                });
            }
        })
        .catch(error => {
            // Penanganan error jika terjadi kesalahan di server atau jaringan
            Swal.fire({
                title: 'Error',
                text: 'Terjadi kesalahan saat memproses permintaan',
                icon: 'error'
            });
        });
    });
} else if (document.getElementById('anggotaCreateForm')) {
    document.getElementById('anggotaCreateForm').addEventListener('submit', function(event) {
        // Mencegah form submit secara default (refresh halaman) atau Mencegah form dari submit secara langsung
        event.preventDefault();

        const form = document.getElementById('anggotaCreateForm');
        const formData = new FormData(form);

        // Mengirim form melalui AJAX
        fetch('./controllers/process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(response => {
            if (response === 'successAnggotaCreate') {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data Anggota berhasil ditambahkan',
                    icon: 'success'
                }).then(() => {
                    window.location.href = './index.php?page=anggotaData';
                });
            } else if (response === 'errorAnggotaCreate') {
                Swal.fire({
                    title: 'Error',
                    text: 'Gagal menambahkan data anggota',
                    icon: 'error'
                });
            }
        })
        .catch(error => {
            // Penanganan error jika terjadi kesalahan di server atau jaringan
            Swal.fire({
                title: 'Error',
                text: 'Terjadi kesalahan saat memproses permintaan',
                icon: 'error'
            });
        });
    })
}

// Kode alert untuk operasi update atau edit
if (document.getElementById('anggotaUpdateForm')) {
    document.getElementById('anggotaUpdateForm').addEventListener('submit', function(event) {
        // Mencegah form submit secara default (refresh halaman) atau Mencegah form dari submit secara langsung
        event.preventDefault();
        
        Swal.fire({
            title: 'Apakah anda ingin menyimpan perubahan ini',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            // Jika user mengkonfirmasi 'Simpan', kirim form melalui AJAX
            if (result.isConfirmed) {
                const form = document.getElementById('anggotaUpdateForm');
                const formData = new FormData(form);

                fetch('./controllers/process.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(response => {
                    if (response === 'successAnggotaUpdate') {
                        Swal.fire('Tersimpan', '', 'success').then(() => {
                            window.location.href = './index.php?page=anggotaData';
                        });
                    } else if (response === 'errorAnggotaUpdate') {
                        Swal.fire('Gagal', '', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', 'Terjadi Kesalahan', 'error');
                })
            } else if (result.isDismissed) {
                Swal.fire('Perubahan dibatalkan', '', 'info');
            }
        })
    })
} else if (document.getElementById('peminjamanUpdateForm')) {
    document.getElementById('peminjamanUpdateForm').addEventListener('submit', function(event) {
        // Mencegah form submit secara default (refresh halaman) atau Mencegah form dari submit secara langsung
        event.preventDefault();

        Swal.fire({
            title: 'Apakah anda ingin menyimpan perubahan ini',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('peminjamanUpdateForm');
                const formData = new FormData(form);

                fetch('./controllers/process.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(response => {
                    if (response === 'successPeminjamanUpdate') {
                        Swal.fire('Tersimpan', '', 'success').then(() => {
                            window.location.href = './index.php?page=peminjamanData';
                        });
                    } else if (response === 'errorPeminjamanUpdate') {
                        Swal.fire('Gagal', '', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', 'Terjadi Kesalahan', 'error');
                })
            } else if (result.isDismissed) {
                Swal.fire('Perubahan dibatalkan', '', 'info');
            }
        })
    })
}

// Kode alert untuk operasi delete atau hapus
if (document.getElementById('deleteButtonAnggota')) {
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus',
            text: 'Apakah anda yakin menghapus data ini',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus",
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`./controllers/process.php?id_anggota=${id}`)
                .then(response => response.text())
                .then(response => {
                    if (response === 'successAnggotaDelete') {
                        Swal.fire('Dihapus', 'Data anggota berhasil dihapus', 'success').then(() => {
                            window.location.reload();   // Refresh halaman untuk memperbarui tampilan
                        })
                    } else if (response === 'errorAnggotaDelete') {
                        Swal.fire('Gagal', 'Data anggota gagal dihapus', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', 'Terjadi kesalahan', 'error');
                }); 
            }
        })
    }
} else if (document.getElementById('deleteButtonPeminjaman')) {
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus',
            text: 'Apakah anda yakin menghapus data ini',
        })
    }
}