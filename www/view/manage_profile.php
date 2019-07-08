<?php
	require_once('function/edit_profil.php');
	require_once('function/auth.php');

	$db_con = db_con();

	if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
		$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$_SESSION[user]'");
		$customer_row = $customer_run->fetch();
?>

<div class="container">
	<h4 class="mb-3">Image de profil</h4>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="file" class="form-control-file bg-dark text-white" name="userfile"><br>
					<button type="submit" name="customer_img" class="btn btn-sm btn-warning">Modifier</button>
				</div>
			</div>
			<div class="col-md-6">
				<img src="public/images/profile_picture/<?php echo $customer_row['customer_img'] ?>"
				class="rounded-circle float-right border border-warning" style="width: 120px; height: 120px; border-width:2px !important;" alt="Image de profil">
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
				<input type="text" class="form-control bg-dark text-white" name="customer_ln" value="<?php echo $customer_row['customer_ln'] ?>" required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="customer_fn">Prenom</label>
				<input type="text" class="form-control bg-dark text-white" name="customer_fn" value="<?php echo $customer_row['customer_fn'] ?>" required>
			</div>
		</div>

		<div class="mb-3">
			<label for="customer_user">Pseudonyme</label>
			<div class="input-group">
				<input type="text" class="form-control bg-dark text-white" name="customer_user" value="<?php echo $customer_row['customer_user'] ?>" required>
			</div>
		</div>

		<div class="mb-3">
			<label for="customer_email">Email</label>
			<input type="email" class="form-control bg-dark text-white" name="customer_email" value="<?php echo $customer_row['customer_email'] ?>" disabled>
		</div>

		<div class="mb-3">
			<label for="customer_bio">Biographie</label>
			<textarea type="text" class="form-control bg-dark text-white" name="customer_bio"><?php echo $customer_row['customer_bio'] ?></textarea>
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
				<input type="password" class="form-control bg-dark text-white" name="customer_oldpw" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="customer_newpw">Nouveau mot de passe</label>
				<input type="password" class="form-control bg-dark text-white" name="customer_newpw" required>
				<small class="form-text text-muted">
					Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
				</small>
			</div>
			<div class="col-md-6 mb-3">
				<label for="customer_newpw2">Confirmation nouveau mot de passe</label>
				<input type="password" class="form-control bg-dark text-white" name="customer_newpw2" required>
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
				<input type="email" class="form-control bg-dark text-white" name="customer_oldemail" placeholder="" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label>Nouvelle adresse email</label>
				<input type="text" class="form-control bg-dark text-white" name="customer_newemail" placeholder="" value="" required>
			</div>
			<div class="col-md-6 mb-3">
				<label>Confirmation nouvelle adresse email</label>
				<input type="text" class="form-control bg-dark text-white" name="customer_newemail2" placeholder="" value="" required>
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
	}
	else
		exit ("<script>window.open('index.php?signin','_self')</script>");
?>
