<?php
	require_once('database.php');
	$db_con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTION);
	if (!$db_con)
		die();
	$db_state = $db_con->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'db_camagru'");
	echo "<script>console.info('SERVER: Vérification si la base de donnée existe.')</script>";
	if (!$db_state->fetchColumn()) {
		echo "<script>console.log('SERVER: La base de donnée n\'existe, création en cours...')</script>";
		$sql_query = file_get_contents('database/db_camagru.sql');
		try {
			$db_con->exec($sql_query);
			echo "<script>console.log('SERVER: Base de données crée.')</script>";
		}
		catch (PDOException $e) {
			echo "<script>console.warn('SERVER: $e->getMessage()\n')</script>";
			die();
		}
	} else
		echo "<script>console.log('SERVER: La base de données existe déjà.')</script>";
?>
