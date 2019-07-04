<?php
	require_once('function/connect.php');
	$db_con = db_con();

	function notification_alert($customer_user) {
		$db_con = db_con();
		$like_run = $db_con->query("SELECT COUNT(*) FROM likes WHERE (like_user = '$customer_user'
									AND notif_bool = '1')");
		$follower_run = $db_con->query("SELECT COUNT(*) FROM followers WHERE (follower_user = '$customer_user'
										AND notif_bool = '1')");
		$comment_run = $db_con->query("SELECT COUNT(*) FROM comments WHERE (comment_user = '$customer_user'
										AND notif_bool = '1')");
		$like_count = $like_run->fetchAll();
		$follower_count = $follower_run->fetchAll();
		$comment_count = $comment_run->fetchAll();
		$count = array_column($comment_count,'notif_bool');
		$tab = array_merge($like_count, $follower_count);
		$tab = array_merge($tab, $comment_count);
		$count = array_sum(array_column($tab,'COUNT(*)'));
		if (isset($_GET['notification'])) {
			$like_run = $db_con->query("UPDATE likes SET notif_bool = '0' WHERE like_user = '$customer_user'");
			$follower_run = $db_con->query("UPDATE followers SET notif_bool = '0' WHERE follower_user = '$customer_user'");
			$comment_run = $db_con->query("UPDATE comments SET notif_bool = '0' WHERE comment_user = '$customer_user'");
		}
		return ($count);
	}
?>
