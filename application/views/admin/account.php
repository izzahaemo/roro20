<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><?= $titlemenu ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>

    <!--Main Content -->


    <!-- Informasi Total-->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <a href="<?= base_url('admin/akunsemua') ?>" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Akun.</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all['total']['total'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <?php
        $belum = $all['total']['total'] - $all['aktif']['aktif'];
        $totalp = $all['total']['total'];
        if ($totalp == 0) {
            $aktifp = 100;
            $belump = 0;
        } else {
            $aktifp = $all['aktif']['aktif'] / $totalp * 100;
            $belump = $belum / $totalp * 100;
        }
        ?>
        <div class="col-md-3 mb-4">
            <div class="card border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Akun Aktif</div>
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
            <div class="card border-bottom-danger shadow h-100 py-2">
                <a href="<?= base_url('admin/belum_aktif') ?>" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Akun Belum Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $belum ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
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
    </div>

    <div class="row">
        <?= $this->session->flashdata('message'); ?>
        <!-- Data tahun-->
        <?php foreach ($kelas as $m) : ?>
            <?php if ($m['id'] == 31) { ?>
                <div class="col-xl-6 col-md-6 mb-4">
                <?php } else { ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                    <?php } ?>
                    <?php if ($m['done'] == $m['aktif']) {
                        $tanda = 'primary';
                        $simbol = 'check';
                    } else {
                        $tanda = 'danger';
                        $simbol = 'minus';
                    } ?>
                    <div class="card border-left-<?= $tanda ?> shadow h-100 py-2">
                        <a href="<?= base_url('admin/') . $m['url']; ?>">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                            <?= $m['name']; ?>
                                        </div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                                            <div class="col-sm">
                                                <i class="fas fa-fw fa-users"></i>
                                                <?= $m['total']; ?>
                                            </div>
                                            <div class="col-sm">
                                                <i class="fas fa-fw fa-check"></i>
                                                <?= $m['aktif']; ?>
                                            </div>
                                            <div class="col-sm">
                                                <i class="fas fa-fw fa-user-check"></i>
                                                <?= $m['done'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-<?= $simbol ?> fa-4x text-gray-300"></i>
                                        <i class="text-lg"><?= $m['id']; ?></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    </div>
                <?php endforeach; ?>
                </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->