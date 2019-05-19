<?php
	if ($_POST['login'] != "" && $_POST['passwd'] != "" && $_POST['submit'] == "OK") {
		if (file_exists("../private") == false) {
			mkdir ("../private");
		}
		if (file_exists('../private/passwd') == false)
			file_put_contents('../private/passwd', NULL);
		$data = unserialize(file_get_contents("../private/passwd"));
		if ($data)
			foreach ($data as $key => $value)
				if ($value["login"] == $_POST["login"])
					exit ("ERROR\n");
	}
	else
		exit ("ERROR\n");
	$user["login"] = $_POST["login"];
	$user["passwd"] = hash('sha256', $_POST["passwd"]);
	$data[] = $user;
	file_put_contents("../private/passwd", serialize($data));
	header('Location: /index.php');
	exit ("OK\n");
?>
