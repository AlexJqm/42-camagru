<?php
	require_once('function/connect.php');
	$db_con = db_con();

	if (isset($_POST['photo'])) {
		$picture_name = $_POST['picture_name'];
		$picture_desc = $_POST['picture_desc'];
		$picture_filter = $_POST['filter_camera'];

		if ($_POST['photo'] == NULL)
			exit ("<script>window.open('../index.php?creation=error','_self')</script>");
		$picture_img = $_POST['photo'];
		$picture_img = str_replace('data:image/png;base64,', '', $picture_img);
		$picture_img = str_replace(' ', '+', $picture_img);
		$picture_data = base64_decode($picture_img);
		$picture_file = '../uploads/post_picture/php'. basename($_POST['photo']) .'.png';
		$picture_img = 'php' . basename($_POST['photo']) .'.png';
		file_put_contents($picture_file, $picture_data);
		$picture_run = $db_con->query("SET lc_time_names = 'fr_FR'; INSERT INTO pictures (picture_name, picture_source, picture_date, picture_like, picture_desc, picture_comment, picture_author, picture_filter)
										VALUES ('$picture_name','$picture_img', DATE_FORMAT(NOW(), '%d %M %Y'), '0', '$picture_desc', '0', '$_SESSION[customer_user]', '$picture_filter');");
			exit ("<script>window.open('../index.php?profile=$_SESSION[customer_user]','_self')</script>");
	}
?>
