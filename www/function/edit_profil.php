<?php
	require_once('function/connect.php');
	$db_con = db_con();

	if (isset($_POST['customer_info'])) {
		$customer_ln = $_POST['customer_ln'];
		$customer_fn = $_POST['customer_fn'];
		$customer_user = $_POST['customer_user'];
		$customer_bio = $_POST['customer_bio'];
		$customer_run = $db_con->query("UPDATE customers SET customer_ln = '$customer_ln',
			customer_fn = '$customer_fn', customer_user = '$customer_user', customer_bio = '$customer_bio'
			WHERE customer_user = '$_SESSION[customer_user]'");
		$_SESSION['customer_user'] = $customer_user;
		exit ("<script>window.open('index.php?manage_profile','_self')</script>");
	}
	if (isset($_POST['customer_password'])) {
		$customer_password = $_POST['customer_oldpw'];
		$customer_newpw = $_POST['customer_newpw'];
		$customer_newpw2 = $_POST['customer_newpw2'];
		if ($customer_newpw != $customer_newpw2)
			exit ("<script>window.open('index.php?manage_profile=error_password','_self')</script>");
		$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$_SESSION[customer_user]'");
		$customer_row = $customer_run->fetch();
		if ($customer_password == $customer_row['customer_password']) {
			$customer_run = $db_con->query("UPDATE customers SET customer_password = '$customer_newpw' WHERE customer_user = '$_SESSION[customer_user]'");
			exit ("<script>window.open('index.php?manage_profile','_self')</script>");
		} else
			exit ("<script>window.open('index.php?manage_profile=error','_self')</script>");
	}
	if (isset($_POST['customer_email'])) {
		$customer_email = $_POST['customer_oldemail'];
		$customer_newemail = $_POST['customer_newemail'];
		$customer_newemail2 = $_POST['customer_newemail2'];
		if ($customer_newemail != $customer_newemail2)
			exit ("<script>window.open('index.php?manage_profile=error_email','_self')</script>");
		$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$_SESSION[customer_user]'");
		$customer_row = $customer_run->fetch();
		if ($customer_email == $customer_row['customer_email']) {
			$customer_run = $db_con->query("UPDATE customers SET customer_email = '$customer_newemail' WHERE customer_user = '$_SESSION[customer_user]'");
			exit ("<script>window.open('index.php?manage_profile','_self')</script>");
		} else
			exit ("<script>window.open('index.php?manage_profile=error','_self')</script>");
	}
	if (isset($_POST['customer_img'])) {
		if ($_FILES['userfile']['size'] == NULL)
			exit ("<script>window.open('../index.php?manage_profile=error','_self')</script>");
		$customer_img = basename($_FILES['userfile']['tmp_name']) . "." . basename($_FILES['userfile']['type']);
		if (file_exists("../uploads/profile_picture") == false)
			mkdir ("../uploads/profile_picture", 0777);
		$uploaddir = "../uploads/profile_picture";
		$uploadfile = $uploaddir . "/" . basename($_FILES['userfile']['tmp_name'] . "." . basename($_FILES['userfile']['type']));
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
		$customer_run = $db_con->query("UPDATE customers SET customer_img = '$customer_img' WHERE customer_user = '$_SESSION[customer_user]'");
		exit ("<script>window.open('../index.php?manage_profile','_self')</script>");
	}
?>
