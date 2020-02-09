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
						<div class="card-header text-right">
							<button type="button" class="btn btn-sm btn-dark btn-flat" data-toggle="modal" data-target="#tambah-admin">
								TAMBAH
							</button>
						</div>
						<div class="card-body text-sm">
							<div class="table-responsive">
								<table class="table table-striped table-hover dttables">
									<thead>
										<tr>
											<th style="text-align: center;">Email</th>
											<th style="text-align: center;">Username</th>
											<th style="text-align: center;">Role</th>
											<th style="text-align: center;">Status</th>
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($admin as $value): ?>
										<tr>
											<td><?= $value->email ?></td>
											<td><?= $value->username ?></td>
											<td><?= $value->role ?></td>
											<td><?= $value->aktif ?></td>
											<?php if ($this->session->userdata('id')!=$value->id_admin): ?>
												<td>
													<?= anchor( 'admin/hapus/'.$value->id_admin, '<span class="badge badge-danger">hapus</span><br/>',['onclick'=>'return confirm(\'Hapus admin ?\')']) ?>
												</td>
											<?php else: ?>
												<td></td>
											<?php endif ?>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
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
	<div class="modal fade" id="tambah-admin">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Admin</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?= form_open($tambah_admin); ?>
				<div class="modal-body">
					<div class="input-group mb-3">
						<input type="text" class="form-control form-control-sm form-min" placeholder="Email" name="email">
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control form-control-sm form-min" placeholder="Username" name="user">
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control form-control-sm form-min" placeholder="Password" name="pass">
					</div>
					<div class="form-group">
						<select class="form-control form-control-sm form-min" name="role">
							<option value="-" disabled selected>Pilih Role--</option>
							<option value="admin">Admin</option>
						</select>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-light btn-sm btn-flat" data-dismiss="modal">BATAL</button>
					<button type="submit" class="btn btn-primary btn-sm btn-flat">SIMPAN</button>
				</div>
				<?= form_close(); ?>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
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
		$(document).ready(function() {
			$('table.dttables').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": false,
				"autoWidth": false,
				"language" :{
					"url" : "<?= base_url('plugins/Indonesian.json') ?>",
					"sEmptyTable" : "Tidads"
				}
			});
		} );
	</script>
</body>
</html>