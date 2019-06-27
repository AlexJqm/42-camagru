<?php
	require_once('function/connect.php');
	require_once('function/auth.php');

	$db_con = db_con();

	if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
		if (isset($_POST['new_password']) && isset($_GET['new_password']) && isset($_GET['customer_email'])) {
			$customer_password = $_POST['password'];
			$customer_token = $_GET['new_password'];
			$customer_email = $_GET['customer_email'];
			if ($customer_password != $_POST['password2'])
				exit ("<script>window.open('index.php?404','_self')</script>");
			$email_run = $db_con->query("SELECT * FROM customers WHERE customer_email = '$customer_email'");
			$email_row = $email_run->fetch();
			if ($email_row['customer_token'] == $customer_token) {
				$email_run = $db_con->query("UPDATE customers SET customer_password = '$customer_password', customer_status = '1'
											WHERE customer_email = '$customer_email'");
				exit ("<script>window.open('index.php?signin','_self')</script>");
			}
			exit ("<script>window.open('index.php?404','_self')</script>");
		}
	}
	else
		exit ("<script>window.open('index.php?signin','_self')</script>");
?>
