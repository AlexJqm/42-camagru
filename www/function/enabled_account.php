<?php
	require_once('function/connect.php');

	if (isset($_GET['confirm_email']) && isset($_GET['customer_email'])) {
		$db_con = db_con();
		$customer_token = $_GET['confirm_email'];
		$customer_email = $_GET['customer_email'];

		$email_run = $db_con->query("SELECT * FROM customers WHERE customer_email = '$customer_email'");
		$email_row = $email_run->fetch();
		if ($email_row['customer_token'] == $customer_token) {
			$email_run = $db_con->query("UPDATE customers SET customer_status = '1' WHERE customer_email = '$customer_email'");
			exit ("<script>window.open('index.php?login','_self')</script>");
		}
		exit ("<script>window.open('index.php?404','_self')</script>");
	}
?>
