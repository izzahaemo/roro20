<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
        <?= $this->session->flashdata('message'); ?>
    </nav>
    <style>
        .containeraa {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 0%;
            padding-top: 56.25%;
        }

        .containerss {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 100%;
            padding-top: 5%;
        }

        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    <?php
    $d = 0;
    if (date('d-m-Y', strtotime($timeline[0]['tgl'])) <= date('d-m-Y') && date('d-m-Y', strtotime($timeline[1]['tgl'])) > date('d-m-Y')) {
        $d = 1;
    } elseif (date('d-m-Y', strtotime($timeline[1]['tgl'])) <= date('d-m-Y') && date('d-m-Y', strtotime($timeline[2]['tgl'])) > date('d-m-Y')) {
        $d = 2;
    } elseif (date('d-m-Y', strtotime($timeline[2]['tgl'])) <= date('d-m-Y') && date('d-m-Y', strtotime($timeline[3]['tgl'])) > date('d-m-Y')) {
        $d = 3;
    } elseif (date('d-m-Y', strtotime($timeline[3]['tgl'])) <= date('d-m-Y')) {
        $d = 4;
    }
    ?>

    <!-- Informasi Total-->
    <div class="row">
        <?php if ($d == 1) { ?>
            <div class="col-md-6 mb-4">
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
            <div class="col-md-6 mb-4">
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

        <?php if ($d == 2) { ?>
            <?php if ($user['is_vote'] == 0) { ?>
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
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vote Dibuka Hingga </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= date('d-m-Y', strtotime($timeline[2]['tgl'])) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
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
                <div class="col-md-6 mb-4">
                    <div class="card border-bottom-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengumuman Vote Tanggal</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= date('d-m-Y', strtotime($timeline[3]['tgl'])) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

        <?php if ($d == 3) { ?>
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
            <div class="col-md-6 mb-4">
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
        <?php if ($d == 4) { ?>
            <div class="col-md-12 mb-4">
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
        <?php $a = 0; ?>
        <?php foreach ($kandidat as $i) : ?>
            <?php $a = $a + 1; ?>
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kandidat Ikhwan <?= $a ?> </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url(('assets/img/kandidat/') . $i['image']) ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $i['name']; ?></h5>
                                    <p class="card-text"><?= $i['kelas']; ?></p>
                                    <p class="card-text">VISI</p>
                                    <p class="card-text text-justify"><?= $i['visi']; ?></p>
                                    <p class="card-text">MISI</p>
                                    <textarea type="text" class="form-control text-justify" id="misi" name="misi" rows="15" readonly><?= $i['misi']; ?></textarea>
                                </div>
                            </div>
                            <div class="containeraa">
                                <iframe class="responsive-iframe" src="<?= $i['url'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <?php if ($d == 2) { ?>
                                <?php if ($user['votei'] == 0) { ?>
                                    <div class="containerss">
                                        <a href="" class="btn btn-info btn-user btn-block" data-toggle="modal" data-target="#vote<?= $i['id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-vote-yea"></i>
                                            </span>
                                            <span class="text">Vote !</span>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
foreach ($kandidat as $i) :
?>
    <div class="modal fade " id="vote<?= $i['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="voteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="voteLabel">Memilih <?= $i['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('vote/vote') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Anda Yakin Memilih <?= $i['name']; ?>?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?= $i['id']; ?>">
                        <input type="hidden" name="iduser" value="<?= $user['id']; ?>">
                        <input type="hidden" name="jenis" value="i">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>