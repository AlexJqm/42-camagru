<?php
	$customer_select = "SELECT * FROM customers";
	$customer_run = mysqli_query($con, $customer_select);
	while ($customer_row = mysqli_fetch_array($customer_run)) {
?>
<div class="container">
	<h4 class="mb-3">Image de profil</h4>
	<form action="" method="POST">
		<div class="mb-3">
			<div class="form-group">
				<input type="file" class="form-control-file" name="userfile">
			</div>
		</div>
		<div class="row">
			<div class="col-md-1 ml-md-auto mb-3">
				<button type="submit" name="customer_img" class="btn btn-sm btn-warning">Modifier</button>
			</div>
		</div>
	</form>
	<hr class="mb-4">
	<h4 class="mb-3">Informations</h4>
	<form class="needs-validation" action="" method="POST">
		<div class="row">
			<div class="col-md-6 mb-3">
				<label>Nom</label>
				<input type="text" class="form-control" name="customer_ln" value="<?php echo $customer_row['customer_ln'] ?>" required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="customer_fn">Prenom</label>
				<input type="text" class="form-control" name="customer_fn" value="<?php echo $customer_row['customer_fn'] ?>" required>
			</div>
		</div>

		<div class="mb-3">
			<label for="customer_user">Pseudonyme</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">@</span>
				</div>
				<input type="text" class="form-control" name="customer_user" value="<?php echo $customer_row['customer_user'] ?>" required>
			</div>
		</div>

		<div class="mb-3">
			<label for="customer_email">Email</label>
			<input type="email" class="form-control" name="customer_email" value="<?php echo $customer_row['customer_email'] ?>" disabled>
		</div>

		<div class="mb-3">
			<label for="customer_bio">Biographie</label>
			<textarea type="text" class="form-control" name="customer_bio"><?php echo $customer_row['customer_bio'] ?></textarea>
		</div>
		<div class="row">
			<div class="col-md-1 ml-md-auto mb-3">
				<button type="submit" name="customer_info" class="btn btn-sm btn-warning">Modifier</button>
			</div>
		</div>
<?php } ?>
	</form>
	<hr class="mb-4">
	<h4 class="mb-3">Modifier mot de passe</h4>
	<form class="needs-validation" action="" method="POST">
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="customer_oldpw">Ancien mot de passe</label>
				<input type="text" class="form-control" name="customer_oldpw" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="customer_newpw">Nouveau mot de passe</label>
				<input type="text" class="form-control" name="customer_newpw" required>
				<small class="form-text text-muted">
					Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
				</small>
			</div>
			<div class="col-md-6 mb-3">
				<label for="customer_newpw2">Confirmation nouveau mot de passe</label>
				<input type="text" class="form-control" name="customer_newpw2" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1 ml-md-auto mb-3">
				<button type="submit" name="customer_password" class="btn btn-sm btn-warning">Modifier</button>
			</div>
		</div>
	</form>
	<hr class="mb-4">
	<h4 class="mb-3">Modifier adresse email</h4>
	<form class="needs-validation" action="" method="POST">
		<div class="row">
			<div class="col-md-6 mb-3">
				<label>Ancienne adresse email</label>
				<input type="email" class="form-control" name="customer_oldemail" placeholder="" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label>Nouvelle adresse email</label>
				<input type="text" class="form-control" name="customer_newemail" placeholder="" value="" required>
			</div>
			<div class="col-md-6 mb-3">
				<label>Confirmation nouvelle adresse email</label>
				<input type="text" class="form-control" name="customer_newemail2" placeholder="" value="" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1 ml-md-auto mb-3">
				<button type="submit" name="customer_email" class="btn btn-sm btn-warning">Modifier</button>
			</div>
		</div>
	</form>
</div>

<?php
	if (isset($_POST['customer_info'])) {
		$customer_ln = $_POST['customer_ln'];
		$customer_fn = $_POST['customer_fn'];
		$customer_user = $_POST['customer_user'];
		$customer_bio = $_POST['customer_bio'];
		$customer_update= "UPDATE customers SET customer_ln = '$customer_ln',
			customer_fn = '$customer_fn', customer_user = '$customer_user', customer_bio = '$customer_bio'
			WHERE customer_user = '$_SESSION[customer_user]'";
		$_SESSION['customer_user'] = $customer_user;
		$customer_run = mysqli_query($con, $customer_update);
		exit ("<script>window.open('index.php?account','_self')</script>");
	}
	if (isset($_POST['customer_password'])) {
		$customer_password = $_POST['customer_oldpw'];
		$customer_newpw = $_POST['customer_newpw'];
		$customer_newpw2 = $_POST['customer_newpw2'];
		if ($customer_newpw != $customer_newpw2)
			exit ("<script>alert('Erreur avec le nouveau mot de passe.')</script>");
		$customer_select = "SELECT * FROM customers WHERE customer_user = '$_SESSION[customer_user]'";
		$customer_run = mysqli_query($con, $customer_select);
		while ($customer_row = mysqli_fetch_array($customer_run)) {
			if ($customer_password == $customer_row['customer_password']) {
				$customer_update = "UPDATE customers SET customer_password = '$customer_newpw' WHERE customer_user = '$_SESSION[customer_user]'";
				$customer_run = mysqli_query($con, $customer_update);
				exit ("<script>window.open('index.php?account','_self')</script>");
			} else
				exit ("<script>alert('Erreur de mot de passe.')</script>");
		}
	}
	if (isset($_POST['customer_email'])) {
		$customer_email = $_POST['customer_oldemail'];
		$customer_newemail = $_POST['customer_newemail'];
		$customer_newemail2 = $_POST['customer_newemail2'];
		if ($customer_newemail != $customer_newemail2)
			exit ("<script>alert('Erreur avec la nouvelle adresse email.')</script>");
		$customer_select = "SELECT * FROM customers WHERE customer_user = '$_SESSION[customer_user]'";
		$customer_run = mysqli_query($con, $customer_select);
		while ($customer_row = mysqli_fetch_array($customer_run)) {
			if ($customer_email == $customer_row['customer_email']) {
				$customer_update = "UPDATE customers SET customer_email = '$customer_newemail' WHERE customer_user = '$_SESSION[customer_user]'";
				$customer_run = mysqli_query($con, $customer_update);
				exit ("<script>window.open('index.php?account','_self')</script>");
			} else
				exit ("<script>alert('Erreur d'adresse email.')</script>");
		}
	}
	if (isset($_POST['customer_img'])) {
		$customer_img = $_POST['customer_pp'];
		$uploaddir = "../uploalds";
		$uploadfile = $uploaddir . "/" . basename($_FILES['userfile']['tmp_name'] . "." . basename($_FILES['userfile']['type']));
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
		$customer_update = "UPDATE customers SET customer_img = '$customer_img' WHERE customer_user = '$_SESSION[customer_user]'";
		$customer_run = mysqli_query($con, $customer_update);
		exit ("<script>window.open('index.php?account','_self')</script>");
	}
?>
