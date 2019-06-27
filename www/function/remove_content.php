<?php
	require_once('function/connect.php');
	require_once('function/auth.php');

	$db_con = db_con();

	if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
		function remove_content($customer_user, $picture_id) {
				$db_con = db_con();
				$rm_content_run = $db_con->query("DELETE FROM pictures WHERE picture_author = '$customer_user' AND picture_id = '$picture_id';
													DELETE FROM likes WHERE picture_id = '$picture_id';");
		}
	}
	else
		exit ("<script>window.open('index.php?signin','_self')</script>");
?>
