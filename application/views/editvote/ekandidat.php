<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?> <?= $jenis == 'i' ? "Ikhwan" : "Akhwat" ?> <?= $kandidat['id']; ?></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('editvote'); ?>"><?= $titlemenu ?></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('editvote/kandidat'); ?>"><?= $title ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?> <?= $jenis ?> <?= $kandidat['id'] ?></li>
        </ol>
        <?= $this->session->flashdata('message'); ?>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('editvote/editk'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row ">
                    <label for="email" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $kandidat['name'] ?> ">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $kandidat['kelas'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Visi</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="visi" name="visi" rows="3"><?= $kandidat['visi']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Misi</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="misi" name="misi" rows="3"><?= $kandidat['misi']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="url" name="url" value="<?= $kandidat['url']; ?>">
                        <input type="hidden" name="id" value="<?= $kandidat['id']; ?>">
                        <input type="hidden" name="jenis" value="<?= $jenis; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Foto</label>
                    </div>
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->