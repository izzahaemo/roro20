<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!--
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="<?= base_url('assets/img/logofront.jpg'); ?>" alt="" class="img-fluid">
                            </div>
                            -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat datang di <b>RORO20</b></h1>
                                        <h6>Reorganisasi Rohis SMAN 3 Sukoharjo 2020</h6>
                                    </div>
                                    <?= $this->session->flashdata('message') ?>
                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="btn btn-info btn-user btn-block" href="<?= base_url('auth/registration'); ?>">Buat akun baru!</a>
                                    </div>
                                </div>
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
            <div id="my-roadmap"></div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            var events = [{
                    date: '<?= date('d-m-Y', strtotime($timeline[0]['tgl'])); ?>',
                    content: '<?= $timeline[0]['name']; ?>'
                },
                {
                    date: '<?= date('d-m-Y', strtotime($timeline[1]['tgl'])); ?>',
                    content: '<?= $timeline[1]['name']; ?>'
                }, {
                    date: '<?= date('d-m-Y', strtotime($timeline[2]['tgl'])); ?>',
                    content: '<?= $timeline[2]['name']; ?>'
                }, {
                    date: '<?= date('d-m-Y', strtotime($timeline[3]['tgl'])); ?>',
                    content: '<?= $timeline[3]['name']; ?>'
                }
            ];

            $('#my-roadmap').roadmap(events, {
                eventsPerSlide: 4,
                slide: 1,
                onBuild: function() {
                    console.log('onBuild event')
                }
            });
        });
    </script>