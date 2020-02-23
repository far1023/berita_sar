<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
						<div class="card-header">
							<a href="<?= site_url('dosen/tambah') ?>" class="btn btn-sm btn-dark btn-flat float-right" id="tambah">TAMBAH</a>
						</div>
						<div class="card-body text-sm">
							<div class="table-responsive">
								<table class="table table-striped table-hover dttables" id="dtDosen">
									<thead>
										<tr>
											<th style="text-align: center;">NIP</th>
											<th style="text-align: center;">Nama Lengkap</th>
											<th style="text-align: center;">Email</th>
											<th style="text-align: center;">Username</th>
											<th style="text-align: center;">Jenis Kelamin</th>
											<th style="text-align: center;">Nomor Hp</th>
											<th style="text-align: center;">Alamat</th>
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-default popSuccess d-none" id="done">Success</button>
					<button type="button" class="btn btn-default popDeleted d-none" id="deleted">Eror</button>
				</div>
			</section>
		</div>
		<?php include 'include/footer.php' ?>
	</div>
</body>
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</html>
<script>
	$('.popSuccess').click(function() {
		toastr.success('Data berhasil disimpan.')
	});
	$('.popDeleted').click(function() {
		toastr.warning('Data berhasil dihapus.')
	});
</script>
<script>
	var SITEURL = '<?= site_url(); ?>';
	$(document).ready(function () {
		$('#dtDosen').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": false,
			"autoWidth": false,
			"language" :{
				"url" : "<?= base_url('plugins/Indonesian.json') ?>"
			},
			"processing": true,
			"ajax": SITEURL + "dosen/read"
		});

		$('body').on('click', '.hapus-dosen', function () {
			var id_pegawai = $(this).data("id");
			if (confirm("Hapus data Dosen?")) {
				$.ajax({
					type: "Post",
					url: SITEURL + "dosen/hapus",
					data: {
						id_dosen: id_dosen
					},
					dataType: "json",
					success: function (data) {
						$("#id_opd_" + id_pegawai).remove();
						$("#dtDosen").DataTable().ajax.reload();
						$('#deleted').click();
					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
			}
		});
	});
</script>