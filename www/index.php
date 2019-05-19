<?php
	session_start();
	include("functions/functions.php");
	$db_link = mysqli_connect("192.168.99.100:3306", "root", "root");
	if ($db_link)
		if (!mysqli_select_db($db_link, "db_rush"))
			require 'database/install.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Index</title>
	</head>
	<body>
		<div>
			<a href="products.php"><b>Produits</b></a>
			<?php if ($_SESSION['loggued_on_user'] == null) {?>
			<a href="register.php"><b>S'inscrire</b></a>
			<a href="signin.php"><b>Se connecter</b></a>
			<a href="admin/admin.php"><b>Admin Panel</b></a>
			<?php
			} else {?>
			<a href="cart.php"><b>Mon panier</b></a>
			<a href="account.php"><b>Mes preferences</b></a>
			<a href="logout.php"><b>Déconnexion</b></a>
			<?php
			}
			?>
			<?php panier(); ?>
		</div>
	</body>
</html>
