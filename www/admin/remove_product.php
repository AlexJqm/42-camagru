<?php
	session_start();
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="Admin"');
		header('HTTP/1.0 401 Unauthorized');
		exit();
	} else {
		if ($_SERVER['PHP_AUTH_USER'] == "admin" && hash("sha256", $_SERVER['PHP_AUTH_PW']) == "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918") {
			include("includes/db.php");
			if (isset($_GET['remove_product'])){
				$delete_id = $_GET['remove_product'];
				$delete_pro = "delete from produits where produit_id='$delete_id'";
				$run_delete = mysqli_query($con, $delete_pro);
				if($run_delete)
					echo "<script>window.open('admin.php?list_product','_self')</script>";
			}
		}
	}
?>
