<?php
	require_once('function/connect.php');
	$db_con = db_con();

	if (isset($_POST['register'])) {
		$customer_user = $_POST['username'];
		$customer_email = $_POST['email'];
		$customer_password = $_POST['password'];
		$email_run = $db_con->prepare("SELECT * FROM customers WHERE customer_email = ?");
		$email_run->execute(array($customer_email));
		$email_count = $email_run->rowcount();
		if ($email_count != 0)
			exit ("<script>window.open('index.php?register=error_email','_self')</script>");
		$user_run = $db_con->prepare("SELECT * FROM customers WHERE customer_user = ?");
		$user_run->execute(array($customer_user));
		$user_count = $user_run->rowcount();
		if ($user_count != 0)
			exit ("<script>window.open('index.php?register=error_user','_self')</script>");
		if ($customer_password != $_POST['password2'])
			exit ("<script>window.open('index.php?register=error_password','_self')</script>");
		$db_con->query("INSERT INTO customers (customer_user, customer_email, customer_password, customer_img)
						VALUES ('$customer_user', '$customer_email', '$customer_password', 'default.png')");
		exit ("<script>window.open('index.php?login','_self')</script>");
	}
?>
