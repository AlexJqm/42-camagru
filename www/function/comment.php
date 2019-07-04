<?php
	require_once('function/connect.php');
	require_once('function/email.php');

	function comment_count($picture_id) {
		$db_con = db_con();
		$comment_run = $db_con->query("SELECT COUNT(*) FROM comments WHERE (picture_id = '$picture_id')");
		$comment_count = $comment_run->fetchAll();
		$count = array_column($comment_count,'COUNT(*)');
		return ($count[0]);
	}

	if (isset($_POST['send_comment'])) {
		$db_con = db_con();
		$customer_user = $_SESSION['user'];
		$comment_content = $_POST['comment_content'];
		$picture_id = $_GET['content'];
		$picture_run = $db_con->query("SELECT picture_author FROM pictures WHERE picture_id = '$picture_id'");
		$picture_author = $picture_run->fetchAll();
		$picture_author = $picture_author[0][0];

		$customer_run = $db_con->query("SELECT customer_email FROM customers WHERE customer_user = '$picture_author'");
		$customer_email = $customer_run->fetchAll();
		$customer_email = $customer_email[0][0];
		$comment_run = $db_con->query("SET lc_time_names = 'fr_FR'; INSERT INTO comments (picture_id, comment_user, customer_user, comment_content, comment_date)
										VALUES ('$picture_id', '$picture_author', '$customer_user', '$comment_content', DATE_FORMAT(NOW(), '%d %M %Y'))");
		send_notif($customer_email, $picture_id);
		exit ("<script>window.open('index.php?content=$picture_id','_self')</script>");
	}
?>
