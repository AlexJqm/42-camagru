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
	function remove_content($customer_user, $picture_id) {
			$db_con = db_con();
			$rm_content_run = $db_con->query("DELETE FROM pictures WHERE picture_author = '$customer_user' AND picture_id = '$picture_id'");
			exit ("<script>window.open('index.php?manage','_self')</script>");
	}
?>
