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
		<h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
		<label class="sr-only">Pseudonyme</label>
		<input type="text" name="username" class="form-control" placeholder="Pseudonyme" required autofocus>
		<label class="sr-only">Mot de passe</label>
		<input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
		<button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Se connection</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
	</form>
</div>

<?php
	if (isset($_POST['login'])) {
		$customer_user = $_POST['username'];
		$customer_password = $_POST['password'];

		$customer_select = "SELECT * FROM customers WHERE customer_password = '$customer_password'
							AND customer_user = '$customer_user'";
		$customer_run = mysqli_query($con, $customer_select);
		$customer_check = mysqli_num_rows($customer_run);
		if ($customer_check == 0)
			exit ("<script>alert('Mot de passe ou email incorrecte, merci de re-essayer.')</script>");
		else if ($customer_check > 0) {
			$_SESSION['customer_user'] = $customer_user;
			exit ("<script>window.open('index.php','_self')</script>");
		} else {
			exit ("<script>alert('Erreur.')</script>");
		}
	}
?>
