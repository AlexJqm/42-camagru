<?php
	require_once('function/connect.php');
	$db_con = db_con();

	function notification_alert($customer_user) {
		$db_con = db_con();
		$like_run = $db_con->query("SELECT COUNT(*) FROM likes WHERE (likes.like_user = '$customer_user'
									AND likes.notif_bool = '1')");
		$follower_run = $db_con->query("SELECT COUNT(*) FROM followers WHERE (followers.follower_user = '$customer_user'
										AND followers.notif_bool = '1')");
		$comment_run = $db_con->query("SELECT COUNT(*) FROM comments, pictures WHERE (pictures.picture_author = '$customer_user'
										AND comments.notif_bool = '1')");
		$like_count = $like_run->fetchAll();
		$follower_count = $follower_run->fetchAll();
		$comment_count = $comment_run->fetchAll();
		$tab = array_merge($like_count, $follower_count);
		$tab = array_merge($tab, $comment_count);
		$count = array_sum(array_column($tab,'COUNT(*)'));
		if (isset($_GET['notification'])) {
			$like_run = $db_con->query("UPDATE likes SET notif_bool = '0' WHERE like_user = '$customer_user'");
			$follower_run = $db_con->query("UPDATE followers SET notif_bool = '0' WHERE follower_user = '$customer_user'");
			$comment_run = $db_con->query("UPDATE comments, pictures SET comments.notif_bool = '0' WHERE pictures.picture_author = '$customer_user'");
		}
		return ($count);
	}
?>
