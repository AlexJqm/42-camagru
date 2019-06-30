<?php
	require_once('function/connect.php');

	function generate_auth($customer_user) {
		$db_con = db_con();
		$auth_token = bin2hex(random_bytes(64));
		$customer_run = $db_con->query("UPDATE customers SET customer_token = '$auth_token' WHERE customer_user = '$customer_user'");
		return ($auth_token);
	}

	function check_auth($customer_user, $auth_token) {
		$db_con = db_con();
		$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$customer_user'");
		if ($customer_row = $customer_run->fetch())
			if ($customer_row['customer_token'] == $auth_token)
				return (1);
		return (0);
	}
?>
