<?php
	session_start();
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="Admin"');
		header('HTTP/1.0 401 Unauthorized');
		exit();
	} else {
		if ($_SERVER['PHP_AUTH_USER'] == "admin" && hash("sha256", $_SERVER['PHP_AUTH_PW']) == "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918") {
?>
<table>
	<tr>
		<td><h2>Liste des produits</h2></td>
	</tr>
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Categorie</th>
		<th>Description</th>
		<th>Prix</th>
		<th>Options</th>
	</tr>
	<?php
		include("includes/db.php");
		$get_pro = "select * from produits";
		$get_cat = "select * from categories";
		$run_pro = mysqli_query($con, $get_pro);
		$run_cat = mysqli_query($con, $get_cat);
		$i = 0;
		while ($row_pro = mysqli_fetch_array($run_pro)) {
			$pro_id = $row_pro['produit_id'];
			$pro_titre = $row_pro['produit_titre'];
			$pro_prix = $row_pro['produit_prix'];
			$pro_desc = $row_pro['produit_desc'];
			$pro_cat = $row_pro['produit_cat'];
			$i++;
	?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $pro_titre;?></td>
		<td><?php
			if ($pro_cat == "1")
				echo "Accessoires";
			else if ($pro_cat == "2")
				echo "Vetements";
			else if ($pro_cat == "3")
				echo "Equipements";
		;?></td>
		<td><?php echo $pro_desc;?></td>
		<td><?php echo $pro_prix;?>€</td>
		<td><a href="admin.php?edit_product=<?php echo $pro_id; ?>">Editer</a><br>
		<a href="admin.php?remove_product=<?php echo $pro_id;?>">Supprimer</a></td>
	</tr>
	<?php } ?>
</table>
<?php
		}
	}
?>
