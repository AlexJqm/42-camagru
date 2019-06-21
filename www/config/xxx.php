<?php
	$db_host = "db";
	$db_user = "root";
	$db_pw = "root";
	$db_name = "db_camagru";
	$charset = "utf8mb4";
	$db_dns = "mysql:host=$db_host";
	$opt = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
	$db_con = new PDO($db_dns, $db_user, $db_pw, $opt);
	// Verifie si la base de donnee existe deja, sinon la cree
	$db_state = $db_con->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'db_camagru'");
	if (!$db_state->fetchColumn()) {
		try {
			$db_run = "CREATE DATABASE IF NOT EXISTS $db_name;";
			$db_con->exec($db_run);
		} catch (PDOException $e) {
			echo $e->getMessage()."<br>";
			die();
		}
		$con = "mysql:host=$db_host;dbname=$db_name;charset=$charset";
		try {
			$db_con = new PDO($con, $db_user, $db_pw, $opt);
			$create_table_admins = "CREATE TABLE admins
				(admin_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
				admin_user VARCHAR(255),
				admin_email TEXT,
				admin_password VARCHAR(255));";
			$db_con->exec($create_table_admins);

			$create_table_customers = "CREATE TABLE customers
				(customer_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
				customer_user VARCHAR(32),
				customer_email TEXT,
				customer_password VARCHAR(64),
				customer_ln VARCHAR(32),
				customer_fn VARCHAR(32),
				customer_bio TEXT,
				customer_img TEXT);";
			$db_con->exec($create_table_customers);

			$insert_table_customers = "INSERT INTO customers
				(customer_img) VALUES ('default.png');";
			$db_con->exec($insert_table_customers);

		} catch (PDOException $e) {
			echo $e->getMessage()."<br />";
			die();
		}
	}
?>
