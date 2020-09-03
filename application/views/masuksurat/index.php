<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?>
        <?php if ($user['role_id'] == 1) { ?>
            <a href="" data-toggle="modal" data-target="#editmasuk">Edit</a>
        <?php } ?>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>

    <!-- Informasi Total-->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Surat Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $imsurat['total']['total'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        $belum = $imsurat['total']['total'] - $imsurat['done']['done'];
        $totalp = $imsurat['total']['total'];
        if ($totalp == 0) {
            $donep = 100;
            $belump = 0;
        } else {
            $donep = $imsurat['done']['done'] / $totalp * 100;
            $belump = $belum / $totalp * 100;
        }
        ?>
        <div class="col-md-6 mb-4">
            <div class="card border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Selesai</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format($donep); ?>%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $donep . '%' ?>" aria-valuenow="<?= $donep ?>" aria-valuemin="0" aria-valuemax="100"></div>
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
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Surat Belum Selesai</div>
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
        <?= $this->session->flashdata('message'); ?>
        <!-- Data tahun-->
        <?php foreach ($msurat as $m) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="<?= base_url('masuksurat/check/') . $m['id']; ?>">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                        <?= $m['name'] ?>
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        <div class="col-sm">
                                            <i class="fas fa-fw fa-envelope"></i>
                                            <?= $m['total']; ?>
                                        </div>
                                        <div class="col-sm">
                                            <i class="fas fa-fw fa-check"></i>
                                            <?= $m['done']; ?>
                                        </div>
                                        <div class="col-sm">
                                            <i class="fas fa-fw fa-minus"></i>
                                            <?php
                                            $min = $m['total'] - $m['done'];
                                            ?>
                                            <?= $min ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
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

<!-- EditdataMasuk -->
<?php
foreach ($msurat as $m) :
?>
    <div class="modal fade" id="editmasuk" tabindex="-1" role="dialog" aria-labelledby="editmasukLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmasukLabel">Edit Data Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/editmasuk/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">ID Terakhir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last" name="last" value="<?= $isurat['last'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>