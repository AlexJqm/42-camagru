<?php
	include("database/db.php");
	include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Produits</title>
	</head>

	<body>
		<div id="produits_box">
			<?php
				$get_pro = "select * from produits";
				$run_pro = mysqli_query($con, $get_pro);

				while($row_pro=mysqli_fetch_array($run_pro)){
					$pro_id = $row_pro['produit_id'];
					$pro_cat = $row_pro['produit_cat'];
					$pro_title = $row_pro['produit_titre'];
					$pro_price = $row_pro['produit_prix'];
					$pro_image = $row_pro['produit_image'];

					echo "	<div>
								<h4>$pro_title</h4>
								<b> $ $pro_price </b><br>
								<a href='details.php?pro_id=$pro_id'>Details</a>
								<a href='cart.php?pro_id=$pro_id'><button>Add to Cart</button></a>
							</div>";
				}
			?>
		</div>
	</body>
</html>
