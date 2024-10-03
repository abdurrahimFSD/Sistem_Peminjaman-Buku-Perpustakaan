function previewImage(event) {
    const file = event.target.files[0];
    const fileError = document.getElementById('fileError'); // Mengambil elemen error
    const hapusFotoButton = document.getElementById('hapusFoto'); // Tombol hapus foto
    fileError.style.display = 'none'; // Menyembunyikan pesan error saat file baru dipilih

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgPreview = document.getElementById('imgPreview');
            imgPreview.src = e.target.result;
            imgPreview.style.display = 'block'; // Menampilkan elemen img setelah file diunggah
            hapusFotoButton.style.display = 'inline-block'; // Menampilkan tombol hapus foto
        }
        reader.readAsDataURL(file); // Membaca file sebagai URL data

        // Cek apakah file valid
        const validExtensions = ['jpg', 'jpeg', 'png', 'svg'];
        const fileExtension = file.name.split('.').pop().toLowerCase();

        if (!validExtensions.includes(fileExtension)) {
            fileError.textContent = 'File yang diupload harus berupa gambar (jpg, jpeg, png, svg)';
            fileError.style.display = 'block'; // Menampilkan pesan error
            document.getElementById('imgPreview').style.display = 'none'; // Menyembunyikan preview
            hapusFotoButton.style.display = 'none'; // Menyembunyikan tombol hapus foto
            return;
        }

        // Cek ukuran file
        if (file.size > 2000000) { // maksimal 2MB
            fileError.textContent = 'Ukuran file terlalu besar! Maksimal 2MB';
            fileError.style.display = 'block'; // Menampilkan pesan error
            document.getElementById('imgPreview').style.display = 'none'; // Menyembunyikan preview
            hapusFotoButton.style.display = 'none'; // Menyembunyikan tombol hapus foto
            return;
        }
    }
}

function hapusFoto() {
    const fotoInput = document.getElementById('foto');
    const imgPreview = document.getElementById('imgPreview');
    const hapusFotoButton = document.getElementById('hapusFoto');
    const fileError = document.getElementById('fileError');

    // Reset input file dan sembunyikan pratinjau serta tombol hapus
    fotoInput.value = ''; // Mengosongkan input file
    fileError.style.display = 'none'; // Sembunyikan pesan error

    const urlParams = new URLSearchParams(window.location.search);
    const getParam = urlParams.get('page');

    if (getParam === 'bukuCreate') {
        imgPreview.style.display = 'none';
        imgPreview.src = '';
    }

    imgPreview.src = './assets/images/book/book-default.jpg'; // Mengganti dengan foto default
    imgPreview.style.display = 'block'; // Tampilkan foto default
    hapusFotoButton.style.display = 'none'; // Menyembunyikan tombol hapus
}

document.getElementById('hapusFoto').addEventListener('click', hapusFoto);