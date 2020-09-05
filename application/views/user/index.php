<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    $a = date("H");
    if (($a >= 6) && ($a <= 11)) {
        $b = "Selamat Pagi";
    } else if (($a >= 11) && ($a <= 15)) {
        $b = "Selamat Siang";
    } elseif (($a > 15) && ($a <= 18)) {
        $b = "Selamat Sore";
    } else {
        $b = "Selamat Malam";
    }
    ?>
    <h1 class="h3 mb-4 text-gray-800"><?= $b ?></h1>

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

    <div class="row">
        <div class="col-lg-12">
            <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url(('assets/img/profile/') . $user['image']) ?>" class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user['name']; ?></h5>
                                <p class="card-text"><?= $user['email']; ?></p>
                                <p class="card-text"><?= $user['role']; ?></p>
                                <p class="card-text">Last Active <?= date('d-m-y H:i:s', strtotime($user['last_login'])) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($b == 1) { ?>
            <div class="col-md-3 mb-4">
                <div class="card border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 font-weight-bold text-info  mb-1">Vote Belum Di Buka</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vote Dibuka Tanggal</div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?= date('d-m-Y', strtotime($timeline[1]['tgl'])) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ($b == 2) { ?>
            <?php if ($user['is_vote'] == 0) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h3 font-weight-bold text-danger mb-1">Anda Belum Menyelesaikan Vote</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-minus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 mb-4">
                    <div class="card border-bottom-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 font-weight-bold text-success  mb-1">Anda Sudah Menyelesaikan Vote</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

        <?php if ($b == 3) { ?>
            <div class="col-md-3 mb-4">
                <div class="card border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 font-weight-bold text-info  mb-1">Vote Sudah Di Tutup</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($user['is_vote'] == 0) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 font-weight-bold text-danger mb-1">Anda Tidak Menyelesaikan Vote</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-minus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-3 mb-4">
                    <div class="card border-bottom-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h3 font-weight-bold text-success  mb-1">Anda Sudah Menyelesaikan Vote</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <?php if ($b == 4) { ?>
            <div class="col-md-6 mb-4">
                <div class="card border-bottom-info shadow h-100 py-2">
                    <a href="<?= base_url('vote/pengumuman') ?>" class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 font-weight-bold text-info  mb-1">Pengumuman Vote Telah Dibuka</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <?php if ($b == 2) { ?>
            <?php if ($user['votei'] == 0) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2">
                        <a href="<?= base_url('vote/ikhwan') ?>" class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h8 font-weight-bold text-danger mb-1">Anda Belum Vote Ikhwan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-minus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-3 mb-4">
                    <div class="card border-bottom-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h8 font-weight-bold text-success  mb-1">Anda Sudah Vote Ikhwan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($user['votea'] == 0) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2">
                        <a href="<?= base_url('vote/akhwat') ?>" class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h8 font-weight-bold text-danger mb-1">Anda Belum Vote Akhwat</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-minus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-3 mb-4">
                    <div class="card border-bottom-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h8 font-weight-bold text-success  mb-1">Anda Sudah Vote Akhwat</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vote Dibuka Hingga</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= date('d-m-Y', strtotime($timeline[2]['tgl'])) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($b == 3) { ?>
            <div class="col-md-12 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengumuman Vote Tanggal</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= date('d-m-Y', strtotime($timeline[3]['tgl'])) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Timeline REOR</h6>
        </div>
        <div class="card-body">
            <div class="timeline">
                <div class="timeline__wrap">
                    <div class="timeline__items">
                        <?php
                        foreach ($timeline as $t) {
                        ?>
                            <div class="timeline__item">
                                <div class="timeline__content">
                                    <h2><?php echo date('d-m-Y', strtotime($t['tgl'])); ?></h2>
                                    <p><?php echo $t["name"]; ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->