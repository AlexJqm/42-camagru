<?php
	$db_dns = "mysql:host=db;dbname=db_camagru;charset=utf8mb4";
	$opt = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
	try {
		$db_con = new PDO($db_dns, "root", "root", $opt);
	} catch (PDOException $e) {
		echo $e->getMessage()."<br>";
		die();
	}
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
	if (isset($_POST['post_upload_picture'])) {
		$picture_name = $_POST['picture_name'];
		$picture_desc = $_POST['picture_desc'];

		if ($_FILES['userfile']['size'] == NULL)
			exit ("<script>window.open('../index.php?creation=error','_self')</script>");
		$picture_img = basename($_FILES['userfile']['tmp_name']) . "." . basename($_FILES['userfile']['type']);
		if (file_exists("../uploads/post_picture") == false)
			mkdir ("../uploads/post_picture", 0777);
		$uploaddir = "../uploads/post_picture";
		$uploadfile = $uploaddir . "/" . basename($_FILES['userfile']['tmp_name'] . "." . basename($_FILES['userfile']['type']));
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
		$picture_run = $db_con->query("SET lc_time_names = 'fr_FR'; INSERT INTO pictures (picture_name, picture_source, picture_date, picture_like, picture_desc, picture_comment, picture_author)
										VALUES ('$picture_name','$picture_img', DATE_FORMAT(NOW(), '%d %M %Y'), '0', '$picture_desc', '0', '$_SESSION[customer_user]');");
			exit ("<script>window.open('../index.php?profile=$_SESSION[customer_user]','_self')</script>");
	}
	if (isset($_POST['photo'])) {
		$picture_name = $_POST['picture_name'];
		$picture_desc = $_POST['picture_desc'];
		if ($_POST['photo'] == NULL)
			exit ("<script>window.open('../index.php?creation=error','_self')</script>");
		$picture_img = $_POST['photo'];
		$picture_img = str_replace('data:image/png;base64,', '', $picture_img);
		$picture_img = str_replace(' ', '+', $picture_img);
		$picture_data = base64_decode($picture_img);
		$picture_file = '../uploads/post_picture/php'. basename($_POST['photo']) .'.png';
		$picture_img = 'php' . basename($_POST['photo']) .'.png';
		file_put_contents($picture_file, $picture_data);
		$picture_run = $db_con->query("SET lc_time_names = 'fr_FR'; INSERT INTO pictures (picture_name, picture_source, picture_date, picture_like, picture_desc, picture_comment, picture_author)
										VALUES ('$picture_name','$picture_img', DATE_FORMAT(NOW(), '%d %M %Y'), '0', '$picture_desc', '0', '$_SESSION[customer_user]');");
			exit ("<script>window.open('../index.php?profile=$_SESSION[customer_user]','_self')</script>");
	}
?>
