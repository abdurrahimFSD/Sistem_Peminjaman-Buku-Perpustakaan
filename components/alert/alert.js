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
} else if (document.getElementById('bukuCreateForm')) {
    document.getElementById('bukuCreateForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const form = document.getElementById('bukuCreateForm');
        const formData = new FormData(form);

        fetch('./controllers/process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(response => {
            if (response.startsWith('duplicateIsbn:')) {
                const existingIsbn = response.split(':')[1]; // Mengambil ISBN yang sudah ada
                Swal.fire({
                    title: 'Gagal',
                    text: `Kode Isbn ${existingIsbn} sudah ada, tidak boleh sama`,
                    icon: 'warning'
                });
            } else if (response === 'successBukuCreate') {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data buku berhasil ditambahkan',
                    icon: 'success'
                }).then(() => {
                    window.location.href = './index.php?page=bukuData';
                });
            } else if (response === 'fileBukanGambar') {
                Swal.fire({
                    title: 'Gagal',
                    text: 'File yang anda upload bukan gambar',
                    icon: 'error'
                });
            } else if (response === 'fileBesar') {
                Swal.fire({
                    title: 'Gagal',
                    text: 'File yang anda upload melebihi 2MB',
                    icon: 'error'
                });
            }
        })
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
} else if (document.getElementById('bukuUpdateForm')) {
    document.getElementById('bukuUpdateForm').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Apakah anda ingin menyimpan perubahan ini',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('bukuUpdateForm');
                const formData = new FormData(form);

                fetch('./controllers/process.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(response => {
                    if (response === 'successBukuUpdate') {
                        Swal.fire('Tersimpan', '', 'success').then(() => {
                            window.location.href = './index.php?page=bukuData';
                        });
                    } else if (response === 'fileBukanGambar') {
                        Swal.fire('Gagal', 'File yang anda upload bukan gambar', 'error');
                    } else if (response === 'fileBesar') {
                        Swal.fire('Gagal', 'File yang anda upload melebihi 2MB', 'error');
                    } else if (response.startsWith('duplicateIsbn:')) {
                        const existingIsbn = response.split(':')[1];
                        Swal.fire({
                            title: 'Gagal',
                            text: `Kode Isbn ${existingIsbn} sudah ada, tidak boleh sama`,
                            icon: 'warning'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', 'Terjadi Kesalahan', 'error');
                })
            } else if (result.isDismissed) {
                
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
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus",
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`./controllers/process.php?id_pinjam=${id}`)
                .then(response => response.text())
                .then(response => {
                    if (response === 'successPeminjamanDelete') {
                        Swal.fire('Dihapus', 'Data peminjaman berhasil dihapus', 'success').then(() => {
                            window.location.reload();
                        })
                    } else if (response === 'errorPeminjamanDelete') {
                        Swal.fire('Gagal', 'Data peminjaman gagal dihapus', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', 'Terjadi kesalahan', 'error');
                });
            }
        })
    }
}