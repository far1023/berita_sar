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
					<div class="row">
						<div class="col-sm-9">
							<div class="card">
								<div class="card-header text-right">
									<a href="<?= site_url('berita/tambah') ?>" class="btn btn-sm btn-flat btn-dark">TAMBAH</a>
								</div>
								<div class="card-body text-sm">
									<div class="table-responsive">
										<table class="table table-striped table-hover dttables">
											<thead>
												<tr>
													<th style="text-align: center;">Judul</th>
													<th style="text-align: center;">Isi Berita</th>
													<th style="text-align: center;">User</th>
													<th style="text-align: center;">Tag</th>
													<th style="text-align: center;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($berita as $value): ?>
													<tr>
														<td><?= $value->judul ?></td>
														<td><?= htmlspecialchars_decode(htmlspecialchars_decode($value->isi_berita)) ?></td>
														<td>
															<?php $user = explode("_&_", $value->user); ?>
															<?php $u=count($user); ?>
															<?php for ($v = 0; $v < $u; $v++) :?>
																<?= $this->magic->user($user[$v]) ?>
																<?php if (($v+1)%2==0 && ($v+1)!=0): ?>
																<br>
															<?php endif ?>
														<?php endfor ?>
													</td>
													<td>
														<?php $tag = explode("_&_", $value->tagar); ?>
														<?php $j=count($tag); ?>
														<?php for ($i = 0; $i < $j; $i++) :?>
															<span class="badge badge-dark"><?= $this->magic->id_tag($tag[$i]) ?></span>
															<?php if (($i+1)%2==0 && ($i+1)!=0): ?>
															<br>
														<?php endif ?>
													<?php endfor ?>
												</td>
												<td><a href="<?= site_url('berita/edit/'.$value->id_berita) ?>" class="btn btn-sm btn-warning edit-opd">EDIT</a> <a href="<?= site_url('berita/hapus/'.$value->id_berita) ?>" class="btn btn-sm btn-danger edit-opd">HAPUS</a></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="card">
						<div class="card-header">List Tag<a href="javascript:void(0)" class="btn btn-sm btn-dark btn-flat float-right" id="tambah"><i class="fa fa-fw fa-plus"></i></a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-hover" id="dtTag">
									<thead>
										<tr>
											<th style="text-align: center;" class="exclude">Nama Tag</th>
											<th style="text-align: center;"></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modal-tag" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalTitle"></h5>
						</div>
						<form id="formTag" name="formTag" class="form-horizontal">
							<div class="modal-body">
								<input type="hidden" name="id_tag" id="id_tag">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" class="form-control form-control-sm form-min" id="nama_tag" name="nama_tag" placeholder="Nama Tag" value="" title="Nama Tag">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-dark btn-sm btn-flat float-right" id="btn-save" value="create">SIMPAN</button>
							</div>
						</form>
					</div>
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
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	
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

	<script>
		var SITEURL = '<?= site_url(); ?>';
		$(document).ready(function () {
			$('#dtTag').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": false,
				"autoWidth": false,
				"language" :{
					"url" : "<?= base_url('plugins/Indonesian.json') ?>",
					"sEmptyTable" : "Tidads"
				},
				"processing": true,
				"ajax": SITEURL + "tag/readTag",
				"columns": [
				null,
				{ className: "text-center" },
				]
			});

			$('#tambah').click(function () {
				$('#btn-save').val("simpan");
				$('#id_tag').val('');
				$('#formTag').trigger("reset");
				$('#modalTitle').html("Tambah Tag");
				$('#modal-tag').modal('show');
			});

			$('body').on('click', '.edit-tag', function () {
				var id_tag = $(this).data("id");
				console.log(id_tag);
				$.ajax({
					type: "POST",
					url: SITEURL + "tag/getTag",
					data: {
						id: id_tag
					},
					dataType: "json",
					success: function (kis) {
						if (kis.success == true) {
							$('#modalTitle').html("Edit Tag");
							$('#btn-save').val("ubah");
							$('#modal-tag').modal('show');
							$('#id_tag').val(kis.data.id_tag);
							$('#nama_tag').val(kis.data.nama_tag);
						}
					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
			});

			$('body').on('click', '.hapus-tag', function () {
				var id_tag = $(this).data("id");
				if (confirm("Hapus Tag?")) {
					$.ajax({
						type: "Post",
						url: SITEURL + "tag/delTag",
						data: {
							id_tag: id_tag
						},
						dataType: "json",
						success: function (data) {
							$("#id_tag_" + id_tag).remove();
							$("#dtTag").DataTable().ajax.reload();
						},
						error: function (data) {
							console.log('Error:', data);
						}
					});
				}
			});
		});

		if ($("#formTag").length > 0) {
			$("#formTag").validate({

				submitHandler: function (form) {
					var actionType = $('#btn-save').val();
					$('#btn-save').html('<i class="fas fa-spinner fa-pulse"></i>');
					$.ajax({
						data: $('#formTag').serialize(),
						url: SITEURL + "tag/add",
						type: "POST",
						dataType: 'json',
						beforeSend:function(){
							$('#btn-save').attr('disabled', 'disabled');
						},
						success: function (kis) {
								$('#formTag').trigger("reset");
								$('#modal-tag').modal('hide');
								$('#btn-save').attr('disabled', false).html('SIMPAN');
								$("#dtTag").DataTable().ajax.reload();
						},
						error: function (data) {
							console.log('Error:', data);
							$('#btn-save').attr('disabled', false).html('SIMPAN');
						}
					});
				}
			})
		}
	</script>
</body>
</html>