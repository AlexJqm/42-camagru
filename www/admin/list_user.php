<?php
	session_start();
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="Admin"');
		header('HTTP/1.0 401 Unauthorized');
		exit();
	} else {
		if ($_SERVER['PHP_AUTH_USER'] == "admin" && hash("sha256", $_SERVER['PHP_AUTH_PW']) == "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918") {
?>
<table>
	<tr>
		<td><h2>Liste des utilisateurs</h2></td>
	</tr>
	<tr>
		<th>Nom d'utilisateur</th>
	</tr>
<?php
	$data = unserialize(file_get_contents("../../private/passwd"));
		if ($data)
			foreach ($data as $key => $value) {
?>
	<tr>
		<td><?php echo $value["login"];?></td>
	</tr>
<?php } ?>

</table>
<?php
		}
	}
?>
