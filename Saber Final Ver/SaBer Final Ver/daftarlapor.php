<?php 
require "functions.php";
$lapor = query("SELECT * FROM lapor");

 ?>
 
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="UTF-8">
	<title>SaBer - Daftar Laporan</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="#">SaBer - Samarinda Bersih</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="userform.php">Home</a></li>
						<li><a href="tentang2.html">About Us</a></li>
						<li><a href="kontak2.html">Info</a></li>
						<li><a href="index.php" class="button special">Log Out</a></li>
					</ul>
				</nav>
			</header>
<body>
	<br>
	<center><h2>Daftar Laporan</h2></center>
	<h1>
	<br>
		<table border="1" cellpadding="10" cellspacing="0"> 
			<tr>
				<th>No</th>
				<th>Status</th>
				<th>Permasalahan</th>
				<th>Deskripsi</th>
				<th>Lokasi</th>
				<th>Aksi</th>
			</tr>
			<?php $i=1; ?>
			<?php foreach($lapor as $row): ?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<input type="checkbox" name="checkbox">
				</td>
				<td><?= $row["permasalahan"];  ?></td>
				<td><?= $row["deskripsi"];  ?></td>
				<td><?= $row["lokasi"];  ?></td>
				<td>
					<a href="hapus.php?id= <?= $row["id"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>

		</table>
	</h1>
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row double">
						<div class="6u">
							<div class="row collapse-at-2">
								<div class="6u">
									<h3>Seputar Samarinda</h3>
									<ul class="alt">
										<li><a href="peta.html">Peta Samarinda</a></li>
										<li><a href="lokasi.html">Lokasi TPA</a></li>
									</ul>
								</div>
								<div class="6u">
									<h3>Seputar Website SaBer</h3>
									<ul class="alt">
										<li><a href="peranan.html">Peranan SaBer</a></li>
										<li><a href="daftarlapor.html">Daftar Laporan</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="6u">
							<h2>Quote</h2>
							<ul class="alt">
										<li>"Kebersihan suatu kota berada di tangan masyarakat nya sendiri" - <i>A.T.T</i> </li>
							<ul class="icons">
								<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
							</ul>
						</div>
					</div>
					<ul class="copyright">
						<li>&copy; Saber 2018. All rights reserved.</li>
						<li>Team : <a href="tentang.html">PAGeneration</a></li>
					</ul>
				</div>
			</footer>
	</body>
</html>