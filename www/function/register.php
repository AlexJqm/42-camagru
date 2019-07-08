<?php
	require_once('function/connect.php');
	require_once('function/email.php');

	$db_con = db_con();

	function check_password($password){
		if (strlen($password) < 8)
			return ("Mot de passe trop court!");
		if (!preg_match("#[0-9]+#", $password))
			return ("Le mot de passe doit contenir une valeur numérique!");
		if (!preg_match("#[a-zA-Z]+#", $password))
			return ("Le mot de passe doit contenir une valeur alphabétique!");
		return (0);
	}

	if (isset($_POST['register'])) {
		$customer_user = $_POST['username'];
		$customer_email = $_POST['email'];
		$customer_password = $_POST['password'];
		$customer_token = bin2hex(random_bytes(64));
		$email_run = $db_con->query("SELECT * FROM customers WHERE customer_email = '$customer_email'");
		$email_count = $email_run->rowcount();
		if ($email_count != 0)
			exit ("<script>window.open('index.php?register=error_email','_self')</script>");
		if (!(filter_var($customer_email, FILTER_VALIDATE_EMAIL)))
			exit ("<script>window.open('index.php?register=error_email','_self')</script>");
		$user_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$customer_user'");
		$user_count = $user_run->rowcount();
		if ($user_count != 0)
			exit ("<script>window.open('index.php?register=error_user','_self')</script>");
		//Supprime les balises HTML et PHP d'une chaîne
		$customer_email = strip_tags($customer_email);
		$customer_user = strip_tags($customer_user);
		//Supprime les espacesen début et fin de chaîne
		$customer_email = trim($customer_email);
		$customer_user = trim($customer_user);
		if (check_password($customer_password)) {
			echo check_password($customer_password);
			exit ;
		}
		if ($customer_password != $_POST['password2'])
			exit ("<script>window.open('index.php?register=error_password','_self')</script>");
		$customer_password = md5($customer_password);
		$db_con->query("INSERT INTO customers (customer_user, customer_email, customer_password, customer_img, customer_token, customer_status)
						VALUES ('$customer_user', '$customer_email', '$customer_password', 'default.png', '$customer_token', '0')");
		send_mail($customer_email, $customer_token);
		exit ("<script>window.open('index.php?confirm_email','_self')</script>");
	}
?>
