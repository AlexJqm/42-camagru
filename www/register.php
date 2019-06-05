<style>
	.form-signin {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: auto;
	}
	.form-signin .checkbox {
		font-weight: 400;
	}
	.form-signin .form-control {
		position: relative;
		box-sizing: border-box;
		height: auto;
		padding: 10px;
		font-size: 16px;
	}
	.form-signin .form-control:focus {
		z-index: 2;
	}
	.form-signin input[type="email"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}
	.form-signin input[type="password"] {
		margin-bottom: 10px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
</style>
<div class="container">
	<form class="form-signin" action="" method="POST">
		<h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
		<label class="sr-only">Pseudonyme</label>
		<input type="text" name="username" class="form-control" placeholder="Pseudonyme" required autofocus>
		<label class="sr-only">Adresse email</label>
		<input type="email" name="email" class="form-control" placeholder="Adresse email" required>
		<label class="sr-only">Password</label>
		<input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
		<label class="sr-only">Password</label>
		<input type="password" name="password2" class="form-control" placeholder="Confirmation mot de passe" required>
		<button class="btn btn-lg btn-primary btn-block" name="register" type="submit">S'inscrire</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
	</form>
</div>

<?php
	if (isset($_POST['register'])) {
		mkdir
		$customer_user = $_POST['username'];
		$customer_email = $_POST['email'];
		$customer_password = $_POST['password'];
		$customer_get = "SELECT * FROM customers";
		$customer_run = mysqli_query($con, $customer_get);
		// Check double username or email in database
		while ($customer_row = mysqli_fetch_array($customer_run)) {
			if ($customer_row['customer_user'] == $customer_user)
				exit ("<script>window.open('index.php?register=error','_self')</script>");
			if ($customer_row['customer_email'] == $customer_email)
				exit ("<script>window.open('index.php?register=error','_self')</script>");
		}
		// Check password confirm
		if ($customer_password != $_POST['password2'])
			exit ("<script>alert('Erreur dans le mot de passe.')</script>");
		$customer_insert = "INSERT INTO customers (customer_user, customer_email, customer_password)
							VALUES ('$customer_user', '$customer_email', '$customer_password')";
		$customer_run = mysqli_query($con, $customer_insert);
		exit ("<script>window.open('index.php?login','_self')</script>");
	}
?>
