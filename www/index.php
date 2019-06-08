<?php
	session_start();
	$db_state = 0;
	include 'database/install.php';
	$db_dns = "mysql:host=db;dbname=db_camagru;charset=utf8mb4";
	$opt = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
	try {
		$db_con = new PDO($db_dns, "root", "root", $opt);
	} catch (PDOException $e) {
		echo $e->getMessage()."<br>";
		die();
	}
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
	<body class="text-secondary pb-5">
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 50px;">
			<a class="navbar-brand text-secondary" href="index.php"><i class="fas fa-camera-retro text-warning"></i> Camagru</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Accueil</a>
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
						<a class="nav-link" href="index.php?profil=<?php echo $_SESSION['customer_user'] ?>">Mon profil</a>
					</li>
					<?php } ?>
				</ul>
				<form class="form-inline my-2 my-lg-0" action="" method="GET">
					<input class="form-control mr-sm-2" type="search" placeholder="Recherche" name="search">
					<button class="btn btn-outline-warning my-2 my-sm-0 mr-4" type="submit">Rechercher</button>
				</form>
				<?php if ($_SESSION['customer_user'] != NULL) { ?>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.php?account">Mon compte</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?logout">Deconnexion</a>
					</li>
				</ul>
				<?php } ?>
			</div>
		</nav>

		<?php
			if (isset($_GET['login']))
				require ("login.php");
			if (isset($_GET['register']))
				require ("register.php");
			if (isset($_GET['profil']))
				require ("profil.php");
			if (isset($_GET['account']))
				require ("account.php");
			if (isset($_GET['logout']))
				require ("logout.php");
			if (isset($_GET['search']))
				require	("search.php");
			if (isset($_GET['404']))
				require	("404.php");
		?>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
