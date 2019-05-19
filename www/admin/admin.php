<?php
	session_start();
	include("../database/db.php");
	$auth_usr = "admin";
	$auth_pwd = "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918"; //password admin
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="Admin"');
		header('HTTP/1.0 401 Unauthorized');
		exit();
	} else {
		if ($_SERVER['PHP_AUTH_USER'] == $auth_usr && hash("sha256", $_SERVER['PHP_AUTH_PW']) == $auth_pwd) {
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Admin Panel</title>
	</head>
	<body>
		<a href="admin.php">Dashboard</a><br>
		<a href="admin.php?add_product">Ajouter un produit</a><br>
		<a href="admin.php?list_product">Liste des produits</a><br>
		<a href="admin.php?list_user">Liste des utilisateurs</a>
		<?php
			if (isset($_GET['add_product']))
				include("add_product.php");
			if (isset($_GET['remove_product']))
				include("remove_product.php");
			if (isset($_GET['edit_product']))
				include("edit_product.php");
			if (isset($_GET['list_product']))
				include("list_product.php");
			if (isset($_GET['list_user']))
				include("list_user.php");
		?>
		<div>
			<a href="admin_logout.php"><b>Déconnexion</b></a>
		</div>
	</body>
</html>

<?php
		} else {
			header('WWW-Authenticate: Basic realm="Admin"');
			header('HTTP/1.0 401 Unauthorized');
		}
	}
?>
