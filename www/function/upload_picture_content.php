<?php
	require_once('function/connect.php');
	$db_con = db_con();

	if (isset($_POST['post_upload_picture'])) {
		$picture_name = $_POST['picture_name'];
		$picture_desc = $_POST['picture_desc'];
		$picture_filter = $_POST['filter_image'];

		if ($_FILES['userfile']['size'] == NULL)
			exit ("<script>window.open('../index.php?creation=error','_self')</script>");
		$picture_img = basename($_FILES['userfile']['tmp_name']) . "." . basename($_FILES['userfile']['type']);
		if (file_exists("../uploads/post_picture") == false)
			mkdir ("../uploads/post_picture", 0777);
		$uploaddir = "../uploads/post_picture";
		$uploadfile = $uploaddir . "/" . basename($_FILES['userfile']['tmp_name'] . "." . basename($_FILES['userfile']['type']));
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
		$picture_run = $db_con->query("SET lc_time_names = 'fr_FR'; INSERT INTO pictures (picture_name, picture_source, picture_date, picture_like, picture_desc, picture_comment, picture_author, picture_filter)
										VALUES ('$picture_name','$picture_img', DATE_FORMAT(NOW(), '%d %M %Y'), '0', '$picture_desc', '0', '$_SESSION[customer_user]', '$picture_filter');");
			exit ("<script>window.open('../index.php?profile=$_SESSION[customer_user]','_self')</script>");
	}
?>
