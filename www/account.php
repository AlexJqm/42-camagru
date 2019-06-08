<?php
	$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$_SESSION[customer_user]'");
	$customer_row = $customer_run->fetch();
?>
<div class="container">
	<h4 class="mb-3">Image de profil</h4>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="file" class="form-control-file" name="userfile"><br>
					<button type="submit" name="customer_img" class="btn btn-sm btn-warning">Modifier</button>
				</div>
			</div>
			<div class="col-md-6">
				<img src="uploads/<?php echo $customer_row['customer_img'] ?>" class="rounded-circle float-right" style="width: 120px; height: 120px;" alt="Image de profil">
			</div>
		</div>
		<div class="row">
			<div class="col-md-1 ml-md-auto mb-3">
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
		$customer_run = $db_con->query("UPDATE customers SET customer_ln = '$customer_ln',
			customer_fn = '$customer_fn', customer_user = '$customer_user', customer_bio = '$customer_bio'
			WHERE customer_user = '$_SESSION[customer_user]'");
		$_SESSION['customer_user'] = $customer_user;
		exit ("<script>window.open('index.php?account','_self')</script>");
	}
	if (isset($_POST['customer_password'])) {
		$customer_password = $_POST['customer_oldpw'];
		$customer_newpw = $_POST['customer_newpw'];
		$customer_newpw2 = $_POST['customer_newpw2'];
		if ($customer_newpw != $customer_newpw2)
			exit ("<script>window.open('index.php?404','_self')</script>");
		$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$_SESSION[customer_user]'");
		if ($customer_password == $customer_row['customer_password']) {
			$customer_run = $db_con->query("UPDATE customers SET customer_password = '$customer_newpw' WHERE customer_user = '$_SESSION[customer_user]'");
			exit ("<script>window.open('index.php?account','_self')</script>");
		} else
			exit ("<script>window.open('index.php?404','_self')</script>");
	}
	if (isset($_POST['customer_email'])) {
		$customer_email = $_POST['customer_oldemail'];
		$customer_newemail = $_POST['customer_newemail'];
		$customer_newemail2 = $_POST['customer_newemail2'];
		if ($customer_newemail != $customer_newemail2)
			exit ("<script>alert('Erreur avec la nouvelle adresse email.')</script>");
		$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$_SESSION[customer_user]'");
		if ($customer_email == $customer_row['customer_email']) {
			$customer_run = $db_con->query("UPDATE customers SET customer_email = '$customer_newemail' WHERE customer_user = '$_SESSION[customer_user]'");
			exit ("<script>window.open('index.php?account','_self')</script>");
		} else
			exit ("<script>window.open('index.php?404','_self')</script>");
	}
	if (isset($_POST['customer_img'])) {
		if ($_FILES['userfile']['size'] == NULL)
			exit ;
		$customer_img = basename($_FILES['userfile']['tmp_name']) . "." . basename($_FILES['userfile']['type']);
		if (file_exists("../uploads") == false)
			mkdir ("../uploads", 0777);
		$uploaddir = "../uploads";
		$uploadfile = $uploaddir . "/" . basename($_FILES['userfile']['tmp_name'] . "." . basename($_FILES['userfile']['type']));
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
		$customer_run = $db_con->query("UPDATE customers SET customer_img = '$customer_img' WHERE customer_user = '$_SESSION[customer_user]'");
		exit ("<script>window.open('index.php?account','_self')</script>");
	}
?>
