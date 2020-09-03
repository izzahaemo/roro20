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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <h2><?php echo $t["tgl"]; ?></h2>
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