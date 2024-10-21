 // Fungsi untuk memperbarui warna chart berdasarkan mode
 function updateChartTheme(mode, chartData) {
    var textColor = (mode === 'dark') ? '#ffffff' : '#000000'; // Putih untuk dark mode, hitam untuk light mode

    var options = {
        chart: {
            type: 'bar',
            height: 400
        },
        series: [{
            name: 'Jumlah Peminjaman',
            data: chartData // Data peminjaman dari database
        }],
        xaxis: {
            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            labels: {
                style: {
                    colors: textColor // Mengubah warna label sumbu X
                }
            }
        },
        title: {
            text: 'Grafik Peminjaman Buku Per Bulan',
            align: 'center',
            style: {
                color: textColor // Mengubah warna judul chart
            }
        },
        colors: ['#5d87ff'],
        plotOptions: {
            bar: {
                distributed: true,
                borderRadius: 5,
                horizontal: false
            }
        },
        yaxis: {
            title: {
                text: 'Jumlah Peminjaman',
                style: {
                    color: textColor // Mengubah warna label sumbu Y
                }
            },
            labels: {
                style: {
                    colors: textColor // Mengubah warna angka di sumbu Y
                }
            }
        },
        legend: {
            show: false // Menyembunyikan legenda (ikon kotak kecil di bawah chart)
        }
    };

    var chart = new ApexCharts(document.querySelector("#peminjamanChart"), options);
    chart.render();
}

// Fungsi untuk mengambil data dari database menggunakan AJAX
function fetchDataAndRenderChart(mode) {
    fetch('./controllers/process.php') // Panggil file PHP untuk mengambil data
        .then(response => response.json())
        .then(data => {
            // Ubah data JSON ke array
            var chartData = [
                data[1], data[2], data[3], data[4], data[5], data[6],
                data[7], data[8], data[9], data[10], data[11], data[12]
            ];
            
            // Render chart dengan data dari database
            updateChartTheme(mode, chartData);
        });
}

// Deteksi mode awal saat halaman dimuat
var currentMode = document.getElementById('htmlRoot').getAttribute('data-bs-theme');
fetchDataAndRenderChart(currentMode); // Render chart berdasarkan mode saat ini

// Event listener untuk mendeteksi perubahan tema
var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        if (mutation.attributeName === 'data-bs-theme') {
            var newMode = document.getElementById('htmlRoot').getAttribute('data-bs-theme');
            document.querySelector("#peminjamanChart").innerHTML = ''; // Hapus chart yang lama
            fetchDataAndRenderChart(newMode); // Render chart dengan mode yang baru
        }
    });
});

// Pantau perubahan atribut 'data-bs-theme' pada elemen html
observer.observe(document.getElementById('htmlRoot'), {
    attributes: true
});