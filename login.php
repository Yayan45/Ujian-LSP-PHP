<?php
@ob_start();
session_start();
include 'config.php';
if(!isset($_SESSION['log'])) {
} else {
	header('location:index.php');
}
;

if(isset($_POST['login'])) {
	$user = mysqli_real_escape_string($conn, $_POST['username']);
	$pass = mysqli_real_escape_string($conn, $_POST['password']);
	$queryuser = mysqli_query($conn, "SELECT * FROM login WHERE username='$user'");
	$cariuser = mysqli_fetch_assoc($queryuser);

	if(password_verify($pass, $cariuser['password'])) {
		$_SESSION['userid'] = $cariuser['userid'];
		$_SESSION['username'] = $cariuser['username'];
		$_SESSION['log'] = "login";

		if($cariuser) {
			echo '<script>alert("Data yang anda masukan benar");window.location="index.php"</script>';
		} else {
			echo '<script>alert("Data yang anda masukan salah");history.go(-1);</script>';
		}
		echo '<script>alert("Anda Berhasil Login");window.location="index.php"</script>';
	} else {
		echo '<script>alert("Username atau password salah");history.go(-1);</script>';
	}
}
;
?>

<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Aplikasi Restoran</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />

	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Header -->
		<header id="header">

			<nav>
				<ul>
					<li><a href="#login">Login</a></li>
					<li><a href="#makan">Makanan</a></li>
					<li><a href="#minum">Minuman</a></li>
					<li><a href="#kontak">Kontak</a></li>
				</ul>
			</nav>
			<div>
				<center>
					<h1>Nyam Nyam restaurant</h1>
					<p>Jl. Ahmad Yani Wonocolo pemalang Selatan Jalan Nasional</p>
					<!-- <img src="assets/images/icon.png" style="border-radius:60%; width: 50px;"> -->
					<h3>Selamat Datang</h3>
					<img src="images/rs.jpg" width="700px" height="300px" style="border-radius:30px;">
				</center>
			</div>
		</header>



		<!-- Main -->
		<div id="main">

			<!-- Login -->
			<article id="login">
				<form class="form-signin" method="POST">
					<p>SILAKAN LOGIN</p>
					<div class="form-group mb-2">
						<label for="inputuser" class="sr-only">Username</label>
						<input type="text" id="inputuser" name="username" class="form-control" placeholder="Username"
							required autofocus>
					</div>
					<div class="form-group mb-2">
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" id="inputPassword" name="password" class="form-control"
							placeholder="Password" required>
					</div><br>
					<button class="btn btn-warning btn-block" name="login" style="font-weight:700;" type="submit">Sign
						in</button>

				</form>
			</article>

			<!-- makan -->
			<article id="makan">
				<h2 class="major">Daftar Makanan</h2>
				<p>Nasi Goreng</p>
				<span class="image main"><img src="images/nasigoreng.png" alt="" /></span>
				<p>Soto Ayam</p>
				<span class="image main"><img src="images/sotoayam.png" alt="" /></span>
				<p>Sate Ayam</p>
				<span class="image main"><img src="images/sateayam.png" alt="" /></span>


			</article>

			<!-- Minum -->
			<article id="minum">
				<h2 class="major">Minuman</h2>
				<p>Es Teh</p>
				<span class="image main"><img src="images/esteh.png" alt="" /></span>
				<p>Jus Jeruk</p>
				<span class="image main"><img src="images/esjeruk.png" alt="" /></span>

			</article>

			<!-- kontak -->
			<article id="kontak">
				<h2 class="major">kontak</h2>

				<ul class="icons">
					<p>Alamat : Jl. Ahmad Yani Wonocolo pemalang Selatan Jalan Nasional</p>
					<p>No Telp : 52363</p>
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
				</ul>
			</article>


		</div>

		<!-- Footer -->
		<footer style="color:grey;">&copy;Desaigner by YayanRPLsatu</footer>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>