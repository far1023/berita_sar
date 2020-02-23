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
	<!-- dataTables -->
	<link rel="stylesheet" href="<?=base_url();?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?= base_url();?>assets/template/plugins/toastr/toastr.min.css">
	<!-- sweetalert -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.css">
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
					<div class="card">
						<div class="card-header"><h5>Selamat Datang!</h5></div>
						<div class="card-body">
							Anda telah login sebagai Admin.</br>
							Waktu Server: <i class="fa fa-calendar-alt fa-fw"></i> <?= longdate_indo(date('Y-m-d')) ?> | 
							<i class="fa fa-clock fa-fw"></i><?= date('H:i:s') ?> WIB
						</div>
					</div>
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
	<!-- dataTables -->
	<script src="<?= base_url();?>assets/template/plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?= base_url();?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- Toastr -->
	<script src="<?= base_url();?>assets/template/plugins/toastr/toastr.min.js"></script>

	<script>
		$('.ndfHFb-c4YZDc-Woal0c-jcJzye-ZMv3u').remove();
	</script>
</body>
</html>