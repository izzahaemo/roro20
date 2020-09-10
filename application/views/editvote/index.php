<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Live Vote Count Tanggal <?= date('d-m-y') ?> | Jam <?= date('H-i-s') ?></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="editvote"><?= $titlemenu ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <?php
    $b = 0;
    if (date('d-m-Y', strtotime($timeline[0]['tgl'])) <= date('d-m-Y') && date('d-m-Y', strtotime($timeline[1]['tgl'])) > date('d-m-Y')) {
        $b = 1;
    } elseif (date('d-m-Y', strtotime($timeline[1]['tgl'])) <= date('d-m-Y') && date('d-m-Y', strtotime($timeline[2]['tgl'])) > date('d-m-Y')) {
        $b = 2;
    } elseif (date('d-m-Y', strtotime($timeline[2]['tgl'])) <= date('d-m-Y') && date('d-m-Y', strtotime($timeline[3]['tgl'])) > date('d-m-Y')) {
        $b = 3;
    } elseif (date('d-m-Y', strtotime($timeline[3]['tgl'])) <= date('d-m-Y')) {
        $b = 4;
    }
    ?>
    <!-- Informasi Total-->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Akun Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all['aktif']['aktif'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        $belum = $all['aktif']['aktif'] - $all['done']['done'];
        $done = $all['done']['done'];
        $totalp = $all['aktif']['aktif'];
        if ($totalp == 0) {
            $aktifp = 100;
            $belump = 0;
        } else {
            $aktifp = $all['done']['done'] / $totalp * 100;
            $belump = $belum / $totalp * 100;
        }
        ?>
        <div class="col-md-3 mb-4">
            <div class="card border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Akun Sudah Vote</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format($aktifp); ?>%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $aktifp . '%' ?>" aria-valuenow="<?= $aktifp ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas  fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-bottom-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Akun Sudah Vote</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all['done']['done'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-bottom-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Akun Belum Vote</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $belum ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php $a = 0; ?>
        <?php foreach ($ikhwan as $i) : ?>
            <?php $a = $a + 1;
            if ($a == 1) {
                $in1 = $i['name'];
                $iv1 = $i['vote'];
                $ig1 = $i['image'];
            } else {
                $in2 = $i['name'];
                $iv2 = $i['vote'];
                $ig2 = $i['image'];
            }
            ?>
            <div class="col-md-3 mb-4">
                <div class="card border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?= $i['name'] ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $i['vote'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php $b = 0; ?>
        <?php foreach ($akhwat as $i) : ?>
            <?php $b = $b + 1;
            if ($b == 1) {
                $an1 = $i['name'];
                $av1 = $i['vote'];
                $ag1 = $i['image'];
            } else {
                $an2 = $i['name'];
                $av2 = $i['vote'];
                $ag2 = $i['image'];
            }
            ?>
            <div class="col-md-3 mb-4">
                <div class="card border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?= $i['name'] ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $i['vote'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($iv1 > $iv2) {
        $ivw = $iv1;
        $inw = $in1;
        $igw = $ig1;
    } else {
        $ivw = $iv2;
        $inw = $in2;
        $igw = $ig2;
    }
    if ($av1 > $av2) {
        $avw = $av1;
        $anw = $an1;
        $agw = $ag1;
    } else {
        $avw = $av2;
        $anw = $an2;
        $agw = $ag2;
    }
    ?>
    <?php if ($b != 1) { ?>
        <div class="row">
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pemenang Vote Ikhwan Saat ini</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url(('assets/img/kandidat/') . $igw) ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $inw; ?></h5>
                                    <p class="card-text">Dengan Hasil Vote <?= $ivw; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pemenang Vote Akhwat Saat ini</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url(('assets/img/kandidat/') . $agw) ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $anw; ?></h5>
                                    <p class="card-text">Dengan Hasil Vote <?= $avw; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- pie chart -->
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Vote Ikhwan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="chartikhwan"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Total Vote</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="charttotal"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Vote Akhwat</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="chartakhwat"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
<?php $coba = 'cobadulu';
$isia = 20;
?>
</div>
<!-- End of Main Content -->
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    var ctx = document.getElementById("chartikhwan");
    var chartikhwan = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["<?= $in1 ?>", "<?= $in2 ?>"],
            datasets: [{
                data: [<?= $iv1 ?>, <?= $iv2 ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true
            },
            cutoutPercentage: 80,
        },
    });

    var ctx = document.getElementById("chartakhwat");
    var chartakhwat = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["<?= $an1 ?>", "<?= $an2 ?>"],
            datasets: [{
                data: [<?= $av1 ?>, <?= $av2 ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true
            },
            cutoutPercentage: 80,
        },
    });

    var ctx = document.getElementById("charttotal");
    var charttotal = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Sudah", "Belum"],
            datasets: [{
                data: [<?= $done ?>, <?= $belum ?>],
                backgroundColor: ['#1cc88a', '#ea5455'],
                hoverBackgroundColor: ['#ea5455', '#1cc88a'],
                hoverBorderColor: "rgba(234, 236, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true
            },
            cutoutPercentage: 80,
        },
    });
</script>