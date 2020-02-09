<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?= site_url();?>assets/img/logo/sikait.png"/>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url();?>assets/template/plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url();?>assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url();?>assets/template/dist/css/adminlte.min.css">
	<!-- Scrollbar style -->
	<link rel="stylesheet" href="<?= base_url();?>assets/css/scrollbar.css">
	<!-- Custom style -->
	<link rel="stylesheet" href="<?= base_url();?>assets/css/mystyle.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?= base_url();?>assets/template/plugins/toastr/toastr.min.css">
	<!-- sweetalert -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?= base_url();?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php include 'include/navbar.php' ?>
		<?php include 'include/sidebar.php' ?>   
		<div class="content-wrapper" style="background-color: white; margin-bottom: 150px">
			<section class="content-header">
				<div class="container-fluid"></div>
			</section>

			<section class="content">
				<div class="container-fluid">
					<?= form_open($action); ?>
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-8">
							<div class="card">
								<div class="card-header">
									<a href="<?= site_url('dosen') ?>" style="text-decoration: none; color: #000"><i class="fa fa-fw fa-angle-left"></i> <?= $header ?></a>
								</div>
								<div class="card-body text-sm">
									<div class="row">
										<div class="col-sm-6">
											<label>Data Pegawai</label>
											<hr style="margin-top: 0px">
											<div class="input-group">
												<input type="text" class="form-control form-control-sm form-min" placeholder="NIP" name="nip" value="<?php if($dtdosen && !set_value('nip')){echo $dtdosen->nip;}else{echo set_value('nip');} ?>" <?php if($dtdosen){echo "readonly title='NIP tidak dapat diubah'";}else{echo "title='Masukkan NIP'";}?>>
											</div>
											<small class="text-red"><?= form_error('nip'); ?></small>
											<div class="input-group mt-4">
												<input type="text" class="form-control form-control-sm form-min" placeholder="Nama Lengkap" name="nama" value="<?php if($dtdosen && !set_value('nama')){echo $dtdosen->nama_lengkap;}else{echo set_value('nama');} ?>" title="Masukkan Nama Lengkap">
											</div>
											<small class="text-red"><?= form_error('nama'); ?></small>
											<div class="input-group mt-4">
												<div class="row">
													<div class="col-sm-6">
														<div class="icheck-danger d-inline">
															<input type="radio" name="jekel" value="L" id="jekellk" <?php if($dtdosen->jekel=="L"){echo "checked";}elseif(!$dtdosen){echo "checked";} ?>>
															<label for="jekellk" style="font-weight: normal !important;">Laki-laki
															</label>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="icheck-danger d-inline">
															<input type="radio" name="jekel" value="P" id="jekelpr" <?php if($dtdosen->jekel=="P"){echo "checked";}?>>
															<label for="jekelpr" style="font-weight: normal !important;">Perempuan
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="input-group mt-4">
												<input type="text" class="form-control form-control-sm form-min" placeholder="Email" name="email" value="<?php if($dtdosen && !set_value('email')){echo $dtdosen->email;}else{echo set_value('email');} ?>" title="Masukkan Email">
											</div>
											<small class="text-red"><?= form_error('email'); ?></small>
											<div class="input-group mt-4">
												<input type="text" class="form-control form-control-sm form-min" placeholder="Nomor Hp" name="no_hp" value="<?php if($dtdosen && !set_value('no_hp')){echo $dtdosen->no_hp;}else{echo set_value('no_hp');} ?>" title="Masukkan Nomor Hp">
											</div>
											<small class="text-red"><?= form_error('no_hp'); ?></small>
											<div class="input-group mt-4">
												<textarea name="alamat" class="form-control form-control-sm form-min" placeholder="Alamat" title="Masukkan Alamat"><?php if($dtdosen && !set_value('alamat')){echo htmlspecialchars_decode($dtdosen->alamat);}else{echo set_value('alamat');} ?></textarea>
											</div>
											<small class="text-red"><?= form_error('alamat'); ?></small>
										</div>
										<div class="col-sm-6">
											<label>Data User</label>
											<hr style="margin-top: 0px">
											<div class="input-group">
												<input type="text" class="form-control form-control-sm form-min" placeholder="Username" name="user" value="<?php if($dtdosen && !set_value('user')){echo $dtdosen->username;}else{echo set_value('user');} ?>" <?php if($dtdosen){ echo "readonly title='Username tidak dapat diubah'";}?> >
											</div>
											<small class="text-red"><?= form_error('user'); ?></small>
											<div class="input-group mt-4">
												<input type="password" class="form-control form-control-sm form-min" placeholder="Password" name="password" title="Masukkan Password">
											</div>
											<small class="text-red"><?= form_error('password'); ?></small>
											<div class="input-group mt-4">
												<input type="password" class="form-control form-control-sm form-min" placeholder="Ulangi Password" name="repass" title="Ulangi Password">
											</div>
											<small class="text-red"><?= form_error('repass'); ?></small>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<?= $this->session->flashdata('error'); ?>
									<input type="submit" class="btn btn-sm btn-light float-right" value="SIMPAN">
								</div>
							</div>
						</div>
					</div>
					<?= form_close() ?>

					<button type="button" class="btn btn-default popSuccess d-none <?php if($this->session->flashdata('done')){echo "testBtn";} ?>">Success</button>
					<button type="button" class="btn btn-default popDanger d-none <?php if($this->session->flashdata('error')){echo "testBtn";} ?>">Eror</button>
				</div>
			</section>
		</div>
		<?php include 'include/footer.php' ?>
		<aside class="control-sidebar control-sidebar-dark">
		</aside>
	</div>
	<!-- jQuery -->
	<script src="<?= base_url();?>assets/template/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url();?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= base_url();?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url();?>assets/template/dist/js/adminlte.min.js"></script>
	<!-- Toastr -->
	<script src="<?= base_url();?>assets/template/plugins/toastr/toastr.min.js"></script>
</body>
</html>