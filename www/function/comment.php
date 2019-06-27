<?php
	require_once('function/connect.php');

	function comment_count($picture_id) {
		$db_con = db_con();
		$comment_run = $db_con->query("SELECT COUNT(*) FROM comments WHERE (picture_id = '$picture_id')");
		$comment_count = $comment_run->fetchAll();
		$count = array_column($comment_count,'COUNT(*)');
		return ($count[0]);
	}

	if (isset($_POST['send_comment'])) {
		$db_con = db_con();
		$customer_user = $_SESSION['customer_user'];
		$comment_content = $_POST['comment_content'];
		$picture_id = $_GET['content'];
		$comment_run = $db_con->query("SET lc_time_names = 'fr_FR'; INSERT INTO comments (picture_id, customer_user, comment_content, comment_date)
										VALUES ('$picture_id', '$customer_user', '$comment_content', DATE_FORMAT(NOW(), '%d %M %Y'))");
		exit ("<script>window.open('index.php?content=$picture_id','_self')</script>");
	}
?>
