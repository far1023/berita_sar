<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/mystyle.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page text-sm bg-white">
    
    <div class="login-box mb-auto" style="padding-top: 50px">
        <div class="card">
            <div class="card-body login-card-body">
                <?php if ($this->session->userdata('error')): ?>
                    <div class="alert alert-danger alert-opacity alert-dismissble fade show text-sm">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif ?>
                <?= form_open($action) ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm form-min" placeholder="Username / Email" name="user">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-sm form-min" placeholder="Password" name="pass">
                </div>
                <div class="row mb-3">
                    <div class="col-6"><?php echo $cap ?></div>
                    <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Captcha" name="captcha" value=""></div>
                </div>
                <div class="row mb-3">
                    <div class="col-8"><?= $this->session->userdata('nama'); ?></div>
                    <div class="col-4"><button class="btn btn-block btn-flat btn-dark">Masuk</button></div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?= base_url()?>assets/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/template/dist/js/adminlte.min.js"></script>
</body>
</html>