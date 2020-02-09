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
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url();?>assets/template/plugins/summernote/summernote-bs4.css">
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
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-7">
							<div class="card">
								<div class="card-header">
									<a href="<?= site_url('berita') ?>" style="text-decoration: none; color: #000"><i class="fa fa-fw fa-angle-left"></i> <?= $header ?></a>
								</div>
								<?= form_open_multipart($action); ?>
								<div class="card-body text-sm">
									<label>&nbspJudul</label>
									<div class="input-group">
										<input type="text" class="form-control form-control-sm form-min" placeholder="Judul Berita" name="judul" value="<?php if($dtberita && !set_value('judul')){echo $dtberita->judul;}else{echo set_value('judul');} ?>">
									</div>
									<small class="text-red"><?= form_error('judul'); ?></small>
									<label class="mt-3">&nbspTag</label>
									<div class="input-group">
										<?php $i=0; ?> <!-- for tags input array index -->
										<?php $cek=0; ?> <!-- for data array index -->
										<?php $tag = explode("_&_", $dtberita->tagar); ?>
										<?php $jml = count($tag) ?>
										<div class="row">
											<?php foreach ($tags as $vtag): ?>
												<div class="col-sm-3 col-6">
													<div class="icheck-red">
														<input type="checkbox" id="tags<?= $i ?>" name="tags[]" value="<?= $vtag->id_tag ?>"<?php if($tag[$cek]==$vtag->id_tag){echo"checked";if($jml!=$cek+1){$cek++;}}?> >
														<label for="tags<?= $i ?>" style="font-weight: normal !important;">
															<?= $vtag->tag ?>
														</label>
													</div>
												</div>
												<?php $i++; ?>
											<?php endforeach ?>
										</div>
									</div>
									<label class="mt-3">&nbspUser</label>
									<div class="form-group">
										<?php $x=0; ?> <!-- for tags input array index -->
										<?php $centang=0; ?> <!-- for data array index -->
										<?php $user = explode("_&_", $dtberita->user); ?>
										<?php $jum = count($user) ?>
										<div class="row">
											<div class="col-sm-3 col-6"><div class="icheck-red">
												<input type="checkbox" id="user2" name="user[]" value="1" <?php if($user[$centang]=='1'){echo "checked";if($jum!=($centang+1)){$centang++;}} ?>>
												<label for="user2" style="font-weight: normal !important;">
													Dosen
												</label>
											</div></div>
											<div class="col-sm-3 col-6"><div class="icheck-red">
												<input type="checkbox" id="user3" name="user[]" value="2" <?php if($user[$centang]=='2'){echo "checked";if($jum!=($centang+1)){$centang++;}} ?>>
												<label for="user3" style="font-weight: normal !important;">
													Mahasiswa
												</label>
											</div></div>
											<div class="col-sm-3 col-6"><div class="icheck-red">
												<input type="checkbox" id="user4" name="user[]" value="3" <?php if($user[$centang]=='3'){echo "checked";if($jum!=($centang+1)){$centang++;}} ?>>
												<label for="user4" style="font-weight: normal !important;">
													Civitas Akademik
												</label>
											</div></div>
										</div>
									</div>
									<label class="mt-3">&nbspIsi berita</label>
									<div class="input-group">
										<textarea name="isi" id="isi" class="textarea"><?php if($dtberita && !set_value('isi')){echo htmlspecialchars_decode($dtberita->isi_berita);}else{echo set_value('isi');} ?></textarea>
									</div>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="gambar" name="gambar">
											<label class="custom-file-label" for="customFile">Gambar berita</label>
										</div>
									</div>
									<?php if ($dtberita): ?>
									&nbsp <small class="text-red"><i>Kosongkan bila tidak ingin mengganti gambar</i></small>
									<?php endif ?>
								</div>
								<div class="card-footer mt-4">
									<?= $this->session->flashdata('error'); ?>
									<input type="submit" class="btn btn-sm btn-light float-right" value="SIMPAN">
								</div>
								<?= form_close() ?>
							</div>
						</div>
					</div>

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
	<!-- Summernote -->
	<script src="<?= base_url();?>assets/template/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- bs-custom-file-input -->
	<script src="<?= base_url();?>assets/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			bsCustomFileInput.init();
		});
	</script>
	<script>
		$(function () {
		// Summernote
		$('.textarea').summernote()
		})
	</script>
	<script>
		function resetFile() {
			document.getElementById("lampiran").value = "";
			bsCustomFileInput.init();
		}
	</script>
</body>
</html>