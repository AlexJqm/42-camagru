<?php
	if ($_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "" && $_POST['submit'] == "OK") {
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach ($data as $key => $value)
		if ($value['login'] == $_POST['login'] && $value['passwd'] == hash("sha256", $_POST['oldpw'])) {
			$data[$key]['passwd'] = hash('sha256', $_POST['newpw']);
			file_put_contents("../private/passwd", serialize($data));
			header('Location: /index.php');
			exit ();
		}
	}
	header("Location: /account.php?request=error");
	exit ();
?>
