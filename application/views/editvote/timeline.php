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
        <?= $this->session->flashdata('message'); ?>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Timeline</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataakun" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Ket</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Ket/th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($timeline as $a) : ?>
                            <tr>
                                <td><?= $a['id'] ?></td>
                                <td><?= $a['name']; ?></td>
                                <td><?= $a['ket']; ?></td>
                                <td><?= date('d-m-y', strtotime($a['tgl'])); ?></td>
                                <td>
                                    <a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#edit<?= $a['id']; ?>">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Timeline</h6>
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

<!-- modal Edit 1-->
<?php
foreach ($timeline as $a) :
?>
    <div class="modal fade" id="edit<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit1Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit1Label">Edit Timeline <?= $a['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?= base_url('editvote/edittime/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id" id="id" value="<?= $a['id']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $a['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Ket</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="ket" name="ket" rows="3"><?= $a['ket']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl" name="tgl" value="<?= $a['tgl']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?= $a['id'] ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>