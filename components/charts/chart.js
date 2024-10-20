var options = {
    chart: {
        type: 'bar', // Tipe grafik
        height: 400 // Tinggi chart
    },
    series: [{
        name: 'Jumlah Peminjaman',
        data: [12, 19, 3, 5, 2, 3] // Data peminjaman per bulan
    }],
    xaxis: {
        categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'] // Label bulan
    },
    title: {
        text: 'Grafik Peminjaman Buku Per Bulan', // Judul grafik
        align: 'center'
    },
    colors: ['#36A2EB'], // Warna batang
    plotOptions: {
        bar: {
            distributed: true, // Membuat setiap batang memiliki warna yang berbeda (jika lebih dari satu warna)
            borderRadius: 5, // Sudut melengkung pada batang
            horizontal: false // Mengatur orientasi grafik batang (false untuk vertikal)
        }
    },
    yaxis: {
        title: {
            text: 'Jumlah Peminjaman' // Label untuk sumbu Y
        }
    }
};

var chart = new ApexCharts(document.querySelector("#peminjamanChart"), options);

chart.render();