<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="admin"><?= $titlemenu ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <?= $this->session->flashdata('message'); ?>

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kirim Notifikasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="kirim" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Belum</th>
                            <th>Terakhir Dikirim</th>
                            <th>Oleh</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Belum</th>
                            <th>Terakhir Dikirim</th>
                            <th>Oleh</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($role as $a) : ?>
                            <?php if ($a['id'] == '1') : ?>
                            <?php elseif ($a['id'] == '5') : ?>
                            <?php elseif ($a['id'] == '14') : ?>
                            <?php elseif ($a['id'] == '15') : ?>
                            <?php else : ?>
                                <?php $s = $a['id'] - 1; ?>
                                <tr>
                                    <td><?= $i; ?> </td>
                                    <td><?= $a['role']; ?> </td>
                                    <td><?= $jumlah[$s]['jumlah']['jumlah']["COUNT(`idstat`)"]; ?> </td>
                                    <td><?php if (date('d-m-y') != date('d-m-y', strtotime($a['terakhir']))) : ?>
                                            <?= date('d-m-y', strtotime($a['terakhir'])) ?>
                                        <?php else : ?>
                                            <?= date('H:i:s', strtotime($a['terakhir'])) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $a['oleh']; ?> </td?>
                                    <td>
                                        <?php if ($jumlah[$s]['jumlah']['jumlah']["COUNT(`idstat`)"] != 0) : ?>
                                            <a href="" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#kirim<?= $a['id']; ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-paper-plane"></i>
                                                </span>
                                                <span class="text">Kirim</span>
                                            <?php endif; ?>
                                    </td>
                                    <?php $i++; ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Kirim -->
<?php
foreach ($role as $a) :
?>
    <div class="modal fade" id="kirim<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="kirimLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kirimLabel">Konfirmasi Kirim Notifikasi Ke <?= $a['role'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('masuksurat/kirimemail/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Anda Yakin Kirim Notifikasi ke <?= $a['role']; ?>?</h5>
                            <?php $s = $a['id'] - 1;
                            if ($a['id'] < 5) : ?>
                                <h6>Terdapat <b><?= $jumlah[$s]['jumlah']['jumlah']["COUNT(`idstat`)"]; ?></b> Belum di Disposisi</h6>
                            <?php else : ?>
                                <h6>Terdapat <b><?= $jumlah[$s]['jumlah']['jumlah']["COUNT(`idstat`)"]; ?></b> Belum di Konfirmasi</h6>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="jumlah" value="<?= $jumlah[$s]['jumlah']['jumlah']["COUNT(`idstat`)"]; ?>">
                        <input type="hidden" name="id" value="<?= $a['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>