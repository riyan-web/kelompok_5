<!DOCTYPE html>
<html>

<head>
    <title><?php= $title; ?></title>
    <!-- Load file plugin Chart.js -->
    <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.js"></script>
</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Grafik Kartu Keluarga Per Bulan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Grafik KK</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <br>
        <canvas id="myChart"></canvas>
        <?php
        //Inisialisasi nilai variabel awal
        $no_bulan = "";
        $total = null;
        foreach ($hasil_kk as $item_kk) {
            $kode_kk = $item_kk->tahun_bulan_kk;
            $no_bulan .= "'$kode_kk'" . ", ";
            $jumlah_kk = $item_kk->jumlah_bulanan_kk;
            $total .= "$jumlah_kk" . ", ";
        }
        ?>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',
                // The data for our dataset
                data: {
                    labels: [<?php echo $no_bulan; ?>],
                    datasets: [{
                        label: 'Data KK Warga ',
                        backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                        borderColor: ['rgb(255, 99, 132)'],
                        data: [<?php echo $total; ?>]
                    }],
                },

                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </div>
</body>

</html>