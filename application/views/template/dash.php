<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?php echo $judul; ?> - Admin Portal Wisata Kab. Pelalawan</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="<?= base_url('assets/js/ie/html5shiv.js'); ?>"></script><![endif]-->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />
		<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />
		<!--[if lte IE 9]><link rel="stylesheet" href="<?= base_url('assets/css/ie9.css') ?>" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="<?= base_url('assets/css/ie8.css') ?>" /><![endif]-->
  <script src="<?= base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
         <strong class="logo"><?php echo $judul; ?></strong>
								</header>

							<!-- Content -->
								<section>
         <?php if(isset($parent)) {  ?>
         <ul class="actions">
          <li><a href="<?= $parent_link ?>" class="button small"><span class="fa fa-arrow-left"></span> Kembali ke <?= $parent ?></a></li>
         </ul>
         <?php } 
         if($this->session->flashdata('message')){?>
         <div class="alert alert-<?= $this->session->flashdata('class') ?>">
         <strong><?= $this->session->flashdata('alert') ?></strong>
         <?= $this->session->flashdata('message') ?> </div>
         <?php 
         }
									echo $contents; ?>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Portal Wisata Kabupaten Pelalawan</h2>
									</header>
									<ul>
										<li><a href="<?= base_url('internal/'); ?>"><span class="fa fa-home" style="display:inline-block !important;font-size:1.5em;padding-right:2px"></span>&nbsp;&nbsp; Dashboard</a></li>
										<li>
											<span class="opener"><span class="fa fa-newspaper-o" style="display:inline-block !important;font-size:1.5em;padding-right:2px"></span>&nbsp;&nbsp;Informasi Publik</span>
											<ul>
												<li><a href="<?= base_url('artikel/') ?>">Kelola Artikel</a></li>
												<li><a href="<?= base_url('kategori/') ?>">Kelola Kategori</a></li>
											</ul>
										</li>
          <li><a href="<?= base_url('wisata/') ?>"><span class="fa fa-map-marker" style="display:inline-block !important;font-size:1.5em;padding-right:2px"></span>&nbsp;&nbsp;Objek Wisata</a></li>
          <li><a href="<?= base_url('pegawai/') ?>"><span class="fa fa-user" style="display:inline-block !important;font-size:1.5em;padding-right:2px"></span>&nbsp;&nbsp;Kelola Pegawai</a></li>
										<li><a href="<?= base_url('internal/logout') ?>"><span class="fa fa-sign-out" style="display:inline-block !important;font-size:1.5em;padding-right:2px"></span> Logout</a></li>
									</ul>
								</nav>
        
							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Disbudpar Kabupaten Pelalawan. Desain Oleh <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			
			<script src="<?= base_url('assets/js/skel.min.js'); ?>"></script>
			<script src="<?= base_url('assets/js/util.js'); ?>"></script>
			<!--[if lte IE 8]><script src="<?= base_url('assets/js/ie/respond.min.js'); ?>"></script><![endif]-->
			<script src="<?= base_url('assets/js/main.js'); ?>"></script>

	</body>
</html>