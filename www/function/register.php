<?php
	require_once('function/connect.php');
	require_once('function/email.php');

	$db_con = db_con();

	if (isset($_POST['register'])) {
		$customer_user = $_POST['username'];
		$customer_email = $_POST['email'];
		$customer_password = $_POST['password'];
		$customer_token = bin2hex(random_bytes(64));
		$email_run = $db_con->query("SELECT * FROM customers WHERE customer_email = '$customer_email'");
		$email_count = $email_run->rowcount();
		if ($email_count != 0)
			exit ("<script>window.open('index.php?register=error_email','_self')</script>");
		$user_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$customer_user'");
		$user_count = $user_run->rowcount();
		if ($user_count != 0)
			exit ("<script>window.open('index.php?register=error_user','_self')</script>");
		if ($customer_password != $_POST['password2'])
			exit ("<script>window.open('index.php?register=error_password','_self')</script>");
		$db_con->query("INSERT INTO customers (customer_user, customer_email, customer_password, customer_img, customer_token, customer_status)
						VALUES ('$customer_user', '$customer_email', '$customer_password', 'default.png', '$customer_token', '0')");
		send_mail($customer_email, $customer_token);
		exit ("<script>window.open('index.php?confirm_email','_self')</script>");
	}
?>
