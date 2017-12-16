<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Login Ke Sistem - Portal Pariwisata Pelalawan, Riau</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="<?= base_url('assets/js/ie/html5shiv.js'); ?>"></script><![endif]-->
		<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />
		<!--[if lte IE 9]><link rel="stylesheet" href="<?= base_url('assets/css/ie9.css') ?>" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="<?= base_url('assets/css/ie8.css') ?>" /><![endif]-->
  <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
         <strong class="logo">Form Login</strong>
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
         <?php } ?>
         <form name="login_pegawai" method="post" action="<?= base_url('internal/autentikasi') ?>">
          <div class="row uniform">
           <div class="6u$ 12u$(small)">
            <label for="username_pegawai">Username</label>
            <input type="text" name="username_pegawai" id="username_pegawai" maxlength="15"/>
           </div>
           <div class="6u$ 12u$(small)">
            <label for="password_pegawai">Password</label>
            <input type="password" name="password_pegawai" id="password_pegawai" maxlength="20"/>
           </div>
           <ul class="actions">
            <li><button type="submit" name="login"class="button special"><span class="fa fa-power-off"></span> Login Ke Sistem</a></li>
           </ul>
          </div>
         </form>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
        <header class="major">
										<h2>Portal Wisata Kabupaten Pelalawan</h2>
									</header>
							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Disbudpar Kabupaten Pelalawan. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
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