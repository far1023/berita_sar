<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title><?= $title ?></title>
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
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
			<div class="container">
				<a href="<?= site_url();?>" class="navbar-brand" title="Berita-SAR">
					<span class="brand-text font-weight-light text-dark"> &nbsp<b>Berita-SAR</b></span>
				</a>
			</div>
		</nav>
		<div class="content-wrapper" style="padding-bottom: 150px">
			<section class="content-header">
				<div class="container-fluid"></div>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<div class="card">
							<div class="card-header text-lg">
								<?= $berita->judul ?>
								<p class="text-sm">
									User: 
									<?php $user = explode("_&_", $berita->user); ?>
									<?php $u=count($user); ?>
									<?php for ($v = 0; $v < $u; $v++) :?>
										<?= $this->magic->user($user[$v]) ?>
									<?php endfor ?>
								</p>
							</div>
							<div class="card-body">
								<p><?= $berita->isi_berita ?></p>
							</div>
							<div class="card-footer">
								Tags: 
								<?php $tag = explode("_&_", $berita->tagar); ?>
								<?php $j=count($tag); ?>
								<?php for ($i = 0; $i < $j; $i++) :?>
									<span class="badge badge-dark"><?= $this->magic->id_tag($tag[$i]) ?></span>
								<?php endfor ?>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<a class="btn btn-primary btn-sm btn-flat popup" href="http://twitter.com/share?source=sharethiscom&text=<?= $berita->judul; ?>&url=<?= $link; ?>" title="Bagikan ke Twitter"><i class="fab fa-twitter">&nbsp</i> Tweet</a>
					</div>
				</div>
			</section>
		</div>
		<footer class="main-footer text-sm text-center">
			Copyright &copy; <?php echo date('Y'); ?> Berita-SAR
		</footer>
	</div>
	<!-- jQuery -->
	<script src="<?= base_url();?>assets/template/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url();?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= base_url();?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url();?>assets/template/dist/js/adminlte.min.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$('.popup').click(function(event) {
				var width  = 575,
				height = 400,
				left   = ($(window).width()  - width)  / 2,
				top    = ($(window).height() - height) / 2,
				url    = this.href,
				opts   = 'status=1' +
				',width='  + width  +
				',height=' + height +
				',top='    + top    +
				',left='   + left;

				window.open(url, 'twitter', opts);

				return false;
			});
		});
	</script>
</body>
</html>
