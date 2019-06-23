<?php
	require_once('function/connect.php');
	$db_con = db_con();

	if (isset($_POST['login'])) {
		$customer_user = $_POST['username'];
		$customer_password = $_POST['password'];

		$customer_run = $db_con->prepare("SELECT * FROM customers WHERE customer_user = ? AND customer_password = ?");
		$customer_run->execute(array($customer_user, $customer_password));
		$customer_check = $customer_run->rowcount();
		$customer_info = $customer_run->fetch();
		if ($customer_check == 0)
			exit ("<script>window.open('index.php?login=error','_self')</script>");
		else if ($customer_check == 1) {
			$_SESSION['customer_user'] = $customer_user;
			exit ("<script>window.open('index.php','_self')</script>");
		} else {
			exit ("<script>window.open('index.php?login=error','_self')</script>");
		}
	}
?>
