<?php
	require_once('function/connect.php');
	$db_con = db_con();

	function remove_content($customer_user, $picture_id) {
			$db_con = db_con();
			$rm_content_run = $db_con->query("DELETE FROM pictures WHERE picture_author = '$customer_user' AND picture_id = '$picture_id';
												DELETE FROM likes WHERE picture_id = '$picture_id';");
	}
?>
