<?php
	session_start();
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="Admin"');
		header('HTTP/1.0 401 Unauthorized');
		exit();
	} else {
		if ($_SERVER['PHP_AUTH_USER'] == "admin" && hash("sha256", $_SERVER['PHP_AUTH_PW']) == "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918") {
			include("includes/db.php");
?>
<html>
	<head>
		<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>

	<body>
		<form action="add_product.php" method="post" enctype="multipart/form-data">
			<table >
				<tr>
					<td><h2>Ajouter un nouveau produit</h2></td>
				</tr>
				<tr>
					<td><b>Nom du produit:</b></td>
					<td><input type="text" name="produit_titre" size="60" required/></td>
				</tr>
				<tr>
					<td><b>Categorie du produit:</b></td>
					<td>
					<select name="produit_cat">
						<option>Selectionner une categorie</option>
							<?php
								$get_cats = "select * from categories";
								$run_cats = mysqli_query($con, $get_cats);
								while ($row_cats=mysqli_fetch_array($run_cats)){
									$cat_id = $row_cats['cat_id'];
									$cat_titre = $row_cats['cat_titre'];
									echo "<option value='$cat_id'>$cat_titre</option>";
								}
							?>
					</select>
					</td>
				</tr>
				<tr>
					<td><b>Prix du produit:</b></td>
					<td><input type="text" name="produit_prix" required/></td>
				</tr>
				<tr>
					<td><b>Description du produit:</b></td>
					<td><textarea name="produit_desc" cols="20" rows="10"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="insert_post" value="Envoyer"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
			if (isset($_POST['insert_post'])){
				$produit_titre = $_POST['produit_titre'];
				$produit_cat= $_POST['produit_cat'];
				$produit_prix = $_POST['produit_prix'];
				$produit_desc = $_POST['produit_desc'];
				$insert_produit = "insert into produits (produit_cat,produit_titre,produit_prix,produit_desc) values ('$produit_cat','$produit_titre','$produit_prix','$produit_desc');";
				$insert_pro = mysqli_query($con, $insert_produit);
				if ($insert_pro)
					echo "<script>window.open('admin.php?list_product','_self')</script>";
			}
		}
	}
?>
