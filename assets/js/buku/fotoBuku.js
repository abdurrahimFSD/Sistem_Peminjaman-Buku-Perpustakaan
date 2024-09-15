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