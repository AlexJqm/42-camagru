<?php
	require_once('function/connect.php');

	function like($profile_user, $like_user, $picture_id) {
		$db_con = db_con();
		$like_run = $db_con->query("SELECT COUNT(*) FROM likes WHERE customer_user = '$profile_user'
									AND like_user = '$like_user' AND picture_id = '$picture_id'");
		if (!$like_run->fetchColumn()) {
			$like_run = $db_con->query("INSERT INTO likes (picture_id, customer_user, like_user, like_bool)
										VALUES ('$picture_id', '$profile_user', '$like_user', '1');
										UPDATE pictures SET picture_like = (SELECT COUNT(*) FROM likes
										WHERE like_user = '$like_user' AND like_bool = '1' AND picture_id = '$picture_id') WHERE picture_id = '$picture_id';");
		} else {
			$db_con->query("UPDATE likes SET like_bool = '1' WHERE customer_user = '$profile_user'
							AND like_user = '$like_user' AND picture_id = '$picture_id';
							UPDATE pictures SET picture_like = (SELECT COUNT(*) FROM likes
							WHERE like_user = '$like_user' AND like_bool = '1' AND picture_id = '$picture_id') WHERE picture_id = '$picture_id'");
		}
	}
	function unlike($profile_user, $like_user, $picture_id) {
		$db_con = db_con();
		$unlike_run = $db_con->query("SELECT COUNT(*) FROM likes WHERE customer_user = '$profile_user'
									AND like_user = '$like_user' AND picture_id = '$picture_id';");
		if (!$unlike_run->fetchColumn())
			exit ;
		$db_con->query("UPDATE likes SET like_bool = '0' WHERE customer_user = '$profile_user'
						AND like_user = '$like_user' AND picture_id = '$picture_id';
						UPDATE pictures SET picture_like = (SELECT COUNT(*) FROM likes
						WHERE like_user = '$like_user' AND like_bool = '1' AND picture_id = '$picture_id') WHERE picture_id = '$picture_id'");
	}
	function print_like($profile_user, $picture_id) {
		$db_con = db_con();
		$like_run = $db_con->query("SELECT COUNT(*) FROM likes WHERE like_user = '$profile_user'
									AND like_bool = '1' AND picture_id = '$picture_id'");
		$customer_like = $like_run->fetchAll();
		return $customer_like[0];
	}
?>
