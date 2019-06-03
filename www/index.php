<?php
	session_start();
	$db_link = mysqli_connect("192.168.99.100:3306", "root", "root");
	if ($db_link)
		if (!mysqli_select_db($db_link, "db_camagru"))
			require 'database/install.php';
	include("database/db.php");
	$con = mysqli_connect("192.168.99.100:3306","root","root","db_camagru");
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">

		<title>Camagru</title>
		<style>
			.container {
				animation: launch 1s;
				opacity: 1;
			}
			@keyframes launch {
				0% {opacity: 0;}
				100% {opacity: 1;}
			}
		</style>
	</head>
	<body class="text-secondary">
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 50px;">
			<a class="navbar-brand text-secondary" href="#"><i class="fas fa-camera-retro"></i> Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<?php if ($_SESSION['customer_user'] == NULL) { ?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?register">Inscription</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?login">Connexion</a>
					</li>
					<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?profil">Mon profil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?logout">Deconnexion</a>
					</li>
					<?php } ?>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>

		<?php
			if (isset($_GET['login']))
				include("login.php");
			if (isset($_GET['register']))
				include("register.php");
			if (isset($_GET['logout']))
				include("logout.php");
		?>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
