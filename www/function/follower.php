<?php
	require_once('function/connect.php');
	function follow($profile_user, $follower_user) {
		$db_con = db_con();
		$follow_run = $db_con->query("SELECT COUNT(*) FROM followers WHERE customer_user = '$profile_user'
									AND follower_user = '$follower_user'");
		if (!$follow_run->fetchColumn()) {
			$follow_run = $db_con->query("INSERT INTO followers (customer_user, follower_user, follower_bool)
										VALUES ('$profile_user', '$follower_user', '1')");
		} else {
			$db_con->query("UPDATE followers SET follower_bool = '1' WHERE customer_user = '$profile_user'
			AND follower_user = '$follower_user'");
		}
	}
	function unfollow($profile_user, $follower_user) {
		$db_con = db_con();
		$unfollow_run = $db_con->query("SELECT COUNT(*) FROM followers WHERE customer_user = '$profile_user'
									AND follower_user = '$follower_user'");
		if (!$unfollow_run->fetchColumn())
			exit ;
		$db_con->query("UPDATE followers SET follower_bool = '0' WHERE customer_user = '$profile_user'
						AND follower_user = '$follower_user'");
	}
	function print_follow($profile_user) {
		$db_con = db_con();
		$follow_run = $db_con->query("SELECT COUNT(*) FROM followers WHERE follower_user = '$profile_user' AND follower_bool = '1'");
		$customer_follower = $follow_run->fetchAll();
		return $customer_follower[0];
	}
?>
