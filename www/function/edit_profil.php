<?php
	require_once('function/connect.php');
	require_once('function/auth.php');
	require_once('function/pop_up.php');

	$db_con = db_con();

	function check_password($password){
		if (strlen($password) < 8)
			return ("Mot de passe trop court!");
		if (!preg_match("#[0-9]+#", $password))
			return ("Le mot de passe doit contenir une valeur numérique!");
		if (!preg_match("#[a-zA-Z]+#", $password))
			return ("Le mot de passe doit contenir une valeur alphabétique!");
		return (0);
	}

	if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
		if ($_GET['manage_profile']) {
			if ($_GET['manage_profile'] == 'info_succed')
				pop_up("Vos informations ont bien été modifiés!");
			if ($_GET['manage_profile'] == 'info_error')
				pop_up("Erreur dans le choix de votre pseudonyme!");
			if ($_GET['manage_profile'] == 'password_error')
				pop_up("Erreur dans votre mot de passe!");
			if ($_GET['manage_profile'] == 'password_succed')
				pop_up("Mot de passe modifié!");
			if ($_GET['manage_profile'] == 'email_error')
				pop_up("Erreur dans la modification de votre adresse email!");
			if ($_GET['manage_profile'] == 'email_succed')
				pop_up("Adresse email modifiée avec succès!");
			if ($_GET['manage_profile'] == 'img_succed')
				pop_up("Image de profil modifiée avec succès!");
			if ($_GET['manage_profile'] == 'img_error')
				pop_up("Erreur dans l'envois de votre nouvelle image de profil!");
			}
		if (isset($_POST['customer_info'])) {
			$customer_ln = str_replace("\"", "", str_replace("'", "", strip_tags($_POST['customer_ln'])));
			$customer_fn = str_replace("\"", "", str_replace("'", "", strip_tags($_POST['customer_fn'])));
			$customer_user = str_replace("\"", "", str_replace("'", "", strip_tags($_POST['customer_user'])));
			$customer_bio = str_replace("\"", "", str_replace("'", "", strip_tags($_POST['customer_bio'])));
			if ($customer_user == NULL)
				exit ("<script>window.open('index.php?manage_profile=info_error','_self')</script>");
			$customer_user = strip_tags($customer_user);
			$customer_user = trim($customer_user);
			$customer_run = $db_con->query("UPDATE customers SET customer_ln = '$customer_ln',
				customer_fn = '$customer_fn', customer_user = '$customer_user', customer_bio = '$customer_bio'
				WHERE customer_user = '$_SESSION[user]'");
			$_SESSION['user'] = $customer_user;
			exit ("<script>window.open('index.php?manage_profile=info_succed','_self')</script>");
		}
		if (isset($_POST['customer_password'])) {
			$customer_password = md5($_POST['customer_oldpw']);
			$customer_newpw = $_POST['customer_newpw'];
			$customer_newpw2 = $_POST['customer_newpw2'];
			if (check_password($customer_newpw)) {
				echo check_password($customer_newpw);
				exit ;
			}
			if ($customer_newpw != $customer_newpw2)
				exit ("<script>window.open('index.php?manage_profile=password_error','_self')</script>");
			$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$_SESSION[user]'");
			$customer_row = $customer_run->fetch();
			if ($customer_password == $customer_row['customer_password']) {
				$customer_newpw = md5($customer_newpw);
				$customer_run = $db_con->query("UPDATE customers SET customer_password = '$customer_newpw' WHERE customer_user = '$_SESSION[user]'");
				exit ("<script>window.open('index.php?manage_profile=password_succed','_self')</script>");
			} else
				exit ("<script>window.open('index.php?manage_profile=password_error','_self')</script>");
		}
		if (isset($_POST['customer_email'])) {
			$customer_email = $_POST['customer_oldemail'];
			$customer_newemail = $_POST['customer_newemail'];
			$customer_newemail2 = $_POST['customer_newemail2'];
			if ($customer_newemail != $customer_newemail2)
				exit ("<script>window.open('index.php?manage_profile=email_error','_self')</script>");
			if (!(filter_var($customer_newemail, FILTER_VALIDATE_EMAIL)))
				exit ("<script>window.open('index.php?manage_profile=email_error','_self')</script>");
			$customer_newemail = strip_tags($customer_newemail);
			$customer_newemail = trim($customer_newemail);
			$customer_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$_SESSION[user]'");
			$customer_row = $customer_run->fetch();
			if ($customer_email == $customer_row['customer_email']) {
				$customer_run = $db_con->query("UPDATE customers SET customer_email = '$customer_newemail' WHERE customer_user = '$_SESSION[user]'");
				exit ("<script>window.open('index.php?manage_profile=email_succed','_self')</script>");
			} else
				exit ("<script>window.open('index.php?manage_profile=email_error','_self')</script>");
		}
		if (isset($_POST['customer_img'])) {
			if ($_FILES['userfile']['size'] == NULL)
				exit ("<script>window.open('../index.php?manage_profile=img_error','_self')</script>");
			$customer_img = basename($_FILES['userfile']['tmp_name']) . "." . basename($_FILES['userfile']['type']);
			if (file_exists("../uploads/profile_picture") == false)
				mkdir ("../uploads/profile_picture", 0777);
			$uploaddir = "../uploads/profile_picture";
			$uploadfile = $uploaddir . "/" . basename($_FILES['userfile']['tmp_name'] . "." . basename($_FILES['userfile']['type']));
			move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
			$customer_run = $db_con->query("UPDATE customers SET customer_img = '$customer_img' WHERE customer_user = '$_SESSION[user]'");
			exit ("<script>window.open('../index.php?manage_profile=img_succed','_self')</script>");
		}
	}
	else
		exit ("<script>window.open('index.php?signin','_self')</script>");
?>
