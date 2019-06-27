<?php
	require_once('function/connect.php');
	require_once('function/auth.php');

	$db_con = db_con();

	if (isset($_POST['login'])) {
		$customer_user = $_POST['username'];
		$customer_password = $_POST['password'];

		$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$customer_user' AND customer_password = '$customer_password'");
		$customer_check = $customer_run->rowcount();
		$customer_row = $customer_run->fetch();
		if ($customer_check == 0)
			exit ("<script>window.open('index.php?signin=error','_self')</script>");
		if ($customer_row['customer_status'] == 0)
			exit ("<script>window.open('index.php?signin=account_disabled','_self')</script>");
		else if ($customer_check == 1 && $customer_row['customer_status'] == 1) {
			$_SESSION['auth'] = generate_auth($customer_user);
			$_SESSION['user'] = $customer_user;
			exit ("<script>window.open('index.php','_self')</script>");
		} else {
			exit ("<script>window.open('index.php?signin=error','_self')</script>");
		}
	}
?>
