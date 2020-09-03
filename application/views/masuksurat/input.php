<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('masuksurat'); ?>"><?= $titlemenu ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <?= $this->session->flashdata('message'); ?>

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('masuksurat/input'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">ID Surat</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="id" name="id" value="<?= set_value('id'); ?>">
                        <?= form_error('id', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <label class="col-sm-4">ID Terakhir yang digunakan <?= $isurat['last']; ?></label>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Kode Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= set_value('kode'); ?>">
                        <?= form_error('kode', '<a class="text-danger pl-2">', '</a>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no" name="no" value="<?= set_value('no'); ?>">
                        <?= form_error('no', '<a class="text-danger pl-2">', '</a>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="perihal" name="perihal" value="<?= set_value('perihal'); ?>">
                        <?= form_error('perihal', '<a class="text-danger pl-2">', '</a>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Asal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="asal" name="asal" value="<?= set_value('asal'); ?>">
                        <?= form_error('asal', '<a class="text-danger pl-2">', '</a>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Tgl Surat</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="tglsurat" name="tglsurat" value="<?= set_value('tglsurat'); ?>">
                        <?= form_error('tglsurat', '<a class="text-danger pl-2">', '</a>') ?>
                    </div>
                    <label for="name" class="col-sm-2 col-form-label">Tgl Masuk</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= set_value('tglmasuk'); ?>">
                        <?= form_error('tglmasuk', '<a class="text-danger pl-2">', '</a>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">File Surat</label>
                    </div>
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Input
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->