<?php
	require_once('function/connect.php');
	require_once('function/email.php');

	if (isset($_POST['reset_password'])) {
		$db_con = db_con();
		$customer_email = $_POST['email'];
		$customer_token = bin2hex(random_bytes(64));
		$email_run = $db_con->query("UPDATE customers SET customer_status = '0', customer_token = '$customer_token'
									WHERE customer_email = '$customer_email'");
		send_password($customer_email, $customer_token);
		exit ("<script>window.open('index.php?confirm_email','_self')</script>");
	}

?>
