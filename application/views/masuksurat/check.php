<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?> <?= $bulan; ?>
        <?php if ($user['role_id'] == 1) { ?>
            <a href="" data-toggle="modal" data-target="#editdata">Edit</a>
        <?php } ?>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('masuksurat'); ?>"><?= $titlemenu; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $bulan; ?></li>
        </ol>
    </nav>

    <!--Main Content -->

    <div class="card shadow mb-4">
        <?= $this->session->flashdata('message'); ?>

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h5 class="m-0 font-weight-bold text-primary">Data Masuk Surat <?= $bulan; ?></h5>
                <?php if ($user['role_id'] == 1) { ?>
                    <a href="" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deletedata">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus file surat</span>
                    </a>
                    <a href="" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#resetdata">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Reset data table</span>
                    </a>
                <?php } ?>
                <a href="<?= base_url('masuksurat/printbulan/') . $msurat['id']; ?>" class="btn btn-success btn-icon-split ">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print Data Bulan</span>
                </a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datanya" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            <th>Asal</th>
                            <th>Tgl Surat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            <th>Asal</th>
                            <th>Tgl Surat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($bmsurat as $a) : ?>
                            <tr>
                                <td><?= $a['id'] ?></td>
                                <td><a href="" data-toggle="modal" data-target="#view<?= $a['id']; ?>">
                                        <?= $a['no']; ?>
                                    </a>
                                </td>
                                <td><?= $a['perihal']; ?></td>
                                <td><?= $a['asal']; ?></td>
                                <td><?= date('d-m-y', strtotime($a['tglsurat'])); ?></td>
                                <td><?= $a['status']; ?>
                                </td>
                                <td>
                                    <?php if ($user['role_id'] == 1) {
                                    ?> <?php if ($a['namafile'] != '') { ?>
                                            <a href="" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#deletef<?= $a['id']; ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus File</span>
                                            </a>
                                        <?php } ?>
                                        <a href="" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#delete<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a><?php } elseif ($user['role_id'] == 5 && $a['idstat'] == 1) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit1<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 1) {
                                            ?><a href="" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#edit2<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Disposisi</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 2) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit5<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 6 && $a['isiket'] == ' ') {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit5<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 7 && $a['isiket'] == ' ') {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit5<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 8 && $a['isiket'] == ' ') {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit5<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 14 && $a['isiket'] == ' ') {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit5<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 2) {
                                            ?><a href="" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#edit3<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Disposisi</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 3 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 4 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 5 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 6 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 7 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 8 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 9 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 10 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 11 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 12 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 13 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 3 && $a['idstat'] == 14 && $a['isipan'] == " ") {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit6<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 4 && $a['idstat'] == 3) {
                                            ?><a href="" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#edit4a<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Disposisi</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 4) {
                                            ?><a href="" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#edit4b<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Disposisi</span>
                                        </a><?php } elseif ($user['role_id'] == 4 && $a['idstat'] == 9 && $a['lastupro'] == 4) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7a<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 4 && $a['idstat'] == 10 && $a['lastupro'] == 4) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7a<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 4 && $a['idstat'] == 11 && $a['lastupro'] == 4) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7a<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 4 && $a['idstat'] == 12 && $a['lastupro'] == 4) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7a<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 4 && $a['idstat'] == 13 && $a['lastupro'] == 4) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7a<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 4 && $a['idstat'] == 14 && $a['lastupro'] == 4) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7a<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 6 && $a['lastupro'] == 2) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7b<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 7 && $a['lastupro'] == 2) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7b<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 8 && $a['lastupro'] == 2) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7b<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 2 && $a['idstat'] == 14 && $a['lastupro'] == 2) {
                                            ?><a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit7b<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><?php } elseif ($user['role_id'] == 6 && $a['idstat'] == 6) {
                                            ?><a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#edit8<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Konfirmasi</span>
                                        </a><?php } elseif ($user['role_id'] == 7 && $a['idstat'] == 7) {
                                            ?><a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#edit8<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Konfirmasi</span>
                                        </a><?php } elseif ($user['role_id'] == 8 && $a['idstat'] == 8) {
                                            ?><a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#edit8<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Konfirmasi</span>
                                        </a><?php } elseif ($user['role_id'] == 9 && $a['idstat'] == 9) {
                                            ?><a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#edit8<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Konfirmasi</span>
                                        </a><?php } elseif ($user['role_id'] == 10 && $a['idstat'] == 10) {
                                            ?><a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#edit8<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Konfirmasi</span>
                                        </a><?php } elseif ($user['role_id'] == 11 && $a['idstat'] == 11) {
                                            ?><a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#edit8<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Konfirmasi</span>
                                        </a><?php } elseif ($user['role_id'] == 12 && $a['idstat'] == 12) {
                                            ?><a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#edit8<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Konfirmasi</span>
                                        </a><?php } elseif ($user['role_id'] == 13 && $a['idstat'] == 13) {
                                            ?><a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#edit8<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Konfirmasi</span>
                                        </a><?php } elseif ($user['role_id'] == 14 && $a['idstat'] == 14) {
                                            ?><a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#edit8<?= $a['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Konfirmasi</span>
                                        </a><?php } ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Informasi Total-->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Surat Masuk <?= $msurat['name']; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $msurat['total'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        $belum = $msurat['total'] - $msurat['done'];
        $totalp = $msurat['total'];
        if ($totalp == 0) {
            $donep = 100;
            $belump = 0;
        } else {
            $donep = $msurat['done'] / $totalp * 100;
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- modal Edit 1-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit1<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit1Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit1Label">Edit Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>">
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">File Surat</label>
                            <div class="custom-file col-sm-10">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image"><?= $a['namafile'] == "" ? "Tidak Ada" : "Ada" ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $a['status']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="isisek" value="">
                        <input type="hidden" name="isiket" value="">
                        <input type="hidden" name="isipan" value="">
                        <input type="hidden" name="up" value="0">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal Edit 2-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit2<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit2Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit2Label">Edit Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="isisek" name="isisek" rows="3" placeholder="<?= $a['isisek']; ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <select name="status" class="form-control col-sm-10">
                                <option value="2">Disposisi Ketua</option>
                                <option value="6">Diserahkan kpd Kasubag Kepegawaian & Ortala</option>
                                <option value="7">Diserahkan kpd Kasubag PTIP</option>
                                <option value="8">Diserahkan kpd Kasubag Umum & Keuangan</option>
                                <option value="14">Diserahkan kpd Lain-lain</option>
                            </select>
                        </div>
                        <?php if ($a['namafile'] != '') { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">File Surat</label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text"><?= $a['namafile']; ?> </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="isiket" value=" ">
                        <input type="hidden" name="isipan" value=" ">
                        <input type="hidden" name="up" value="0">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- modal Edit 3-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit3<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit3Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit3Label">Edit Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isisek']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Ketua</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="isiket" name="isiket" rows="3" placeholder="<?= $a['isiket']; ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <select name="status" class="form-control col-sm-10">
                                <option value="3">Disposisi Panitera</option>
                                <option value="4">Disposisi Sekretaris</option>
                                <option value="5">Disposisi Panitera dan Sekretaris</option>
                                <option value="6">Diserahkan kpd Kasubag Kepegawaian & Ortala</option>
                                <option value="7">Diserahkan kpd Kasubag PTIP</option>
                                <option value="8">Diserahkan kpd Kasubag Umum & Keuangan</option>
                                <option value="9">Diserahkan kpd Panitera Muda Hukum</option>
                                <option value="10">Diserahkan kpd Panitera Muda Permohonan</option>
                                <option value="11">Diserahkan kpd Panitera Muda Gugatan</option>
                                <option value="12">Diserahkan kpd Meja 2</option>
                                <option value="13">Diserahkan kpd Meja 3</option>
                                <option value="14">Diserahkan kpd Lain-lain</option>
                            </select>
                        </div>
                        <?php if ($a['namafile'] != '') { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">File Surat</label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text"><?= $a['namafile']; ?> </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="isisek" value="<?= $a['isisek']; ?>">
                        <input type="hidden" name="isipan" value=" ">
                        <input type="hidden" name="kpd" value="">
                        <input type="hidden" name="up" value="0">
                        <input type="hidden" name="namafile" value="<?= $a['namafile']; ?>">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal Edit 4 A role 4-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit4a<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit4aLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit4aLabel">Edit Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isisek']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Ketua</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isiket']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Panitera / Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="isipan" name="isipan" rows="3" placeholder="<?= $a['isipan']; ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <select name="status" class="form-control col-sm-10">
                                <option value="9">Diserahkan kpd Panitera Muda Hukum</option>
                                <option value="10">Diserahkan kpd Panitera Muda Permohonan</option>
                                <option value="11">Diserahkan kpd Panitera Muda Gugatan</option>
                                <option value="12">Diserahkan kpd Meja 2</option>
                                <option value="13">Diserahkan kpd Meja 3</option>
                                <option value="14">Diserahkan kpd Lain-lain</option>
                            </select>
                        </div>
                        <?php if ($a['namafile'] != '') { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">File Surat</label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text"><?= $a['namafile']; ?> </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="isisek" value="<?= $a['isisek']; ?>">
                        <input type="hidden" name="isiket" value="<?= $a['isiket']; ?>">
                        <input type="hidden" name="up" value="0">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- modal Edit 4 B role 2-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit4b<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit4bLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit4bLabel">Edit Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isisek']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Ketua</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isiket']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Panitera / Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="isipan" name="isipan" rows="3" placeholder="<?= $a['isipan']; ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <select name="status" class="form-control col-sm-10">
                                <option value="6">Diserahkan kpd Kasubag Kepegawaian & Ortala</option>
                                <option value="7">Diserahkan kpd Kasubag PTIP</option>
                                <option value="8">Diserahkan kpd Kasubag Umum & Keuangan</option>
                                <option value="14">Diserahkan kpd Lain-lain</option>
                            </select>
                        </div>
                    </div>
                    <?php if ($a['namafile'] != '') { ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">File Surat</label>
                            <div class="col-sm-10">
                                <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-print"></i>
                                    </span>
                                    <span class="text"><?= $a['namafile']; ?> </span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="modal-footer">
                        <input type="hidden" name="isisek" value="<?= $a['isisek']; ?>">
                        <input type="hidden" name="isiket" value="<?= $a['isiket']; ?>">
                        <input type="hidden" name="up" value="0">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<!-- modal Edit 5 idstat 2/6/7/8/14 role 2 -->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit5<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit5Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit5Label">Edit Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="isisek" name="isisek" rows="3"><?= $a['isisek']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <select name="status" class="form-control col-sm-10">
                                <option value="2">Disposisi Ketua</option>
                                <option value="6">Diserahkan kpd Kasubag Kepegawaian & Ortala</option>
                                <option value="7">Diserahkan kpd Kasubag PTIP</option>
                                <option value="8">Diserahkan kpd Kasubag Umum & Keuangan</option>
                                <option value="14">Diserahkan kpd Lain-lain</option>
                            </select>
                        </div>
                        <?php if ($a['namafile'] != '') { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">File Surat</label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text"><?= $a['namafile']; ?> </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="isiket" value=" ">
                        <input type="hidden" name="isipan" value=" ">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- modal Edit 6 idstat 3/4/6/7/8/9/10/11/12/13/14 role 3-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit6<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit6Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit6Label">Edit Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isisek']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Ketua</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="isiket" name="isiket" rows="3"><?= $a['isiket']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <select name="status" class="form-control col-sm-10">
                                <option value="3">Disposisi Panitera</option>
                                <option value="4">Disposisi Sekretaris</option>
                                <option value="5">Disposisi Panitera dan Sekretaris</option>
                                <option value="6">Diserahkan kpd Kasubag Kepegawaian & Ortala</option>
                                <option value="7">Diserahkan kpd Kasubag PTIP</option>
                                <option value="8">Diserahkan kpd Kasubag Umum & Keuangan</option>
                                <option value="9">Diserahkan kpd Panitera Muda Hukum</option>
                                <option value="10">Diserahkan kpd Panitera Muda Permohonan</option>
                                <option value="11">Diserahkan kpd Panitera Muda Gugatan</option>
                                <option value="12">Diserahkan kpd Meja 2</option>
                                <option value="13">Diserahkan kpd Meja 3</option>
                                <option value="14">Diserahkan kpd Lain-lain</option>
                            </select>
                        </div>
                        <?php if ($a['namafile'] != '') { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">File Surat</label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text"><?= $a['namafile']; ?> </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="isisek" value="<?= $a['isisek']; ?>">
                        <input type="hidden" name="namafile" value="<?= $a['namafile']; ?>">
                        <input type="hidden" name="isipan" value=" ">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal Edit 7 A idstat 9/10/11/12/13/14 roleid 4-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit7a<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit7aLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit7aLabel">Edit Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isisek']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Ketua</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isiket']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Panitera / Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="isipan" name="isipan" rows="3"><?= $a['isipan']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <select name="status" class="form-control col-sm-10">
                                <option value="9">Diserahkan kpd Panitera Muda Hukum</option>
                                <option value="10">Diserahkan kpd Panitera Muda Permohonan</option>
                                <option value="11">Diserahkan kpd Panitera Muda Gugatan</option>
                                <option value="12">Diserahkan kpd Meja 2</option>
                                <option value="13">Diserahkan kpd Meja 3</option>
                                <option value="14">Diserahkan kpd Lain-lain</option>
                            </select>
                        </div>
                        <?php if ($a['namafile'] != '') { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">File Surat</label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text"><?= $a['namafile']; ?> </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="isisek" value="<?= $a['isisek']; ?>">
                        <input type="hidden" name="isiket" value="<?= $a['isiket']; ?>">
                        <input type="hidden" name="up" value="0">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal Edit 7 B idstat 6/7/8/14 roleid 2-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit7b<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit7bLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit7bLabel">Edit Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isisek']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Ketua</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isiket']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Panitera / Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="isipan" name="isipan" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <select name="status" class="form-control col-sm-10">
                                <option value="6">Diserahkan kpd Kasubag Kepegawaian & Ortala</option>
                                <option value="7">Diserahkan kpd Kasubag PTIP</option>
                                <option value="8">Diserahkan kpd Kasubag Umum & Keuangan</option>
                                <option value="14">Diserahkan kpd Lain-lain</option>
                            </select>
                        </div>
                        <?php if ($a['namafile'] != '') { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">File Surat</label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text"><?= $a['namafile']; ?> </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="isisek" value="<?= $a['isisek']; ?>">
                        <input type="hidden" name="isiket" value="<?= $a['isiket']; ?>">
                        <input type="hidden" name="up" value="0">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal edit 8 idstat 6-14 role 6-14-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="edit8<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit8Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit8Label">Konfirmasi Terima Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/update/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no" name="no" value="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= $a['tglsurat']; ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $a['tglmasuk']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isisek']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Ketua</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isiket']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Panitera / Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isipan']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kpd" name="kpd">
                            </div>
                        </div>
                    </div>
                    <?php if ($a['namafile'] != '') { ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">File Surat</label>
                            <div class="col-sm-10">
                                <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-print"></i>
                                    </span>
                                    <span class="text"><?= $a['namafile']; ?> </span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="modal-footer">
                        <input type="hidden" name="status" value="15">
                        <input type="hidden" name="up" value="1">
                        <input type="hidden" name="isisek" value="<?= $a['isisek']; ?>">
                        <input type="hidden" name="isiket" value="<?= $a['isiket']; ?>">
                        <input type="hidden" name="isipan" value="<?= $a['isipan']; ?>">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal view-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade" id="view<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="viewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewLabel">Data Masuk Surat <?= $a['no']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/printsatu/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="<?= $a['id']; ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Kode Surat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="<?= $a['kode']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="<?= $a['no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="<?= $a['perihal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="<?= $a['asal']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="<?= date('d-m-y', strtotime($a['tglsurat'])); ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="<?= date('d-m-y', strtotime($a['tglmasuk'])); ?>" readonly>
                            </div>
                            <label for="name" class="col-sm-2 col-form-label">Tgl Update</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="<?= date('d-m-y', strtotime($a['tglupdate'])); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="<?= $a['status']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Terakhir Update</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="<?= $a['role']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isisek']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Ketua</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isiket']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Disposisi Panitera / Sekretaris</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="3" placeholder="<?= $a['isipan']; ?>" readonly></textarea>
                            </div>
                        </div>
                        <?php if ($user['role_id'] == 1) { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">ID User</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="<?= $a['lastupid']; ?>" readonly>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($a['namafile'] != '') { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">File Surat</label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('/assets/files/masuk/' . $bulan . '/' . $a['namafile'] . '.pdf'); ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text"><?= $a['namafile']; ?> </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- modal delete file surat-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade " id="deletef<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deletefLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletefLabel">Hapus Data Masuk Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/deletefile/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Anda yakin hapus file surat ini? <?= $a['no']; ?></h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal delete-->
<?php
foreach ($bmsurat as $a) :
?>
    <div class="modal fade " id="delete<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLabel">Hapus File Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/delete/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Anda yakin hapus data ini? <?= $a['no']; ?></h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <input type="hidden" name="idbmsurat" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Editdatabulan -->
<?php
foreach ($msurat as $m) :
?>
    <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="editdataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editdataLabel">Edit Data Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/editdata/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Total</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="total" name="total" value="<?= $msurat['total'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Done</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="done" name="done" value="<?= $msurat['done'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- reset data bulan -->
<?php
foreach ($msurat as $a) :
?>
    <div class="modal fade " id="resetdata" tabindex="-1" role="dialog" aria-labelledby="resetdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetdataLabel">Reset Data Bulan <?= $msurat['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/resetdata/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Anda yakin reset data bulan <?= $msurat['name']; ?>?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- delete file data bulan -->
<?php
foreach ($msurat as $a) :
?>
    <div class="modal fade " id="deletedata" tabindex="-1" role="dialog" aria-labelledby="deletedataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletedataLabel">Hapus File Surat Bulan <?= $msurat['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/deletedata/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Anda yakin hapus semua file surat data bulan <?= $msurat['name']; ?>?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idmsurat" value="<?= $msurat['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>