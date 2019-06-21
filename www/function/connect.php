<?php
	function db_con() {
		$db_dns = "mysql:host=db;dbname=db_camagru;charset=utf8mb4";
		$opt = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
		try {
			$db_con = new PDO($db_dns, "root", "root", $opt);
		} catch (PDOException $e) {
			echo $e->getMessage()."<br>";
			die();
		}
		return $db_con;
	}
?>
