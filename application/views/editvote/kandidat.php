<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('editvote'); ?>"><?= $titlemenu ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <style>
        .containera {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 100%;
            padding-top: 56.25%;
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
    <div class="row">
        <?php $a = 0; ?>
        <?php foreach ($ikhwan as $i) : ?>
            <?php $a = $a + 1; ?>
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kandidat Ikhwan <?= $a ?> </h6>
                        <a href="ekandidat/i/<?= $i['id'] ?>" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-user-edit"></i>
                            </span>
                            <span class="text">Edit Kandidat</span>
                        </a>
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
                                    <textarea type="text" class="form-control text-justify" id="misi" name="misi" rows="16" readonly><?= $i['misi']; ?></textarea>
                                </div>
                            </div>
                            <div class="containera">
                                <iframe class="responsive-iframe" src="<?= $i['url'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <?php $a = 0; ?>
        <?php foreach ($akhwat as $i) : ?>
            <?php $a = $a + 1; ?>
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kandidat Akhwat <?= $a ?> </h6>
                        <a href="ekandidat/a/<?= $i['id'] ?>" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-user-edit"></i>
                            </span>
                            <span class="text">Edit Kandidat</span>
                        </a>
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
                            <div class="containera">
                                <iframe class="responsive-iframe" src="<?= $i['url'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
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