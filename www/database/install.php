<?php
	$db_host = "192.168.99.100:3306";
	$db_user = "root";
	$db_pw = "root";
	$db_name = "db_camagru";
	$db_link = mysqli_connect($db_host, $db_user, $db_pw);

	function query_table($link, $table_name, $query) {
		if (mysqli_query($link, $query))
			echo "Requete '$table_name' effecute.\n";
		else
			die("Erreur de requete avec '$table_name'\n" . mysqli_error($link));
	}

	if (!$db_link)
		die("Connexion impossible: " . mysqli_connect_error());

	echo "Connexion avec le serveur MySQL reussite"."\n";

	if (mysqli_select_db($db_link, $db_name))
		exit ("Cette database existe deja."."\n");

	$db_create = "CREATE DATABASE $db_name";

	if (mysqli_query($db_link, $db_create))
		echo "Database '$db_name' cree avec succes.\n";
	else
		throw_mysqli_error($db_link);

	mysqli_select_db($db_link, $db_name);

	$create_table_admins = "CREATE TABLE admins
		(admin_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		admin_user VARCHAR(255),
		admin_email TEXT,
		admin_password VARCHAR(255));";
	query_table($db_link, "admins", $create_table_admins);

	$create_table_customers = "CREATE TABLE customers
		(customer_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		customer_user VARCHAR(255),
		customer_email TEXT,
		customer_password VARCHAR(255));";
	query_table($db_link, "customers", $create_table_customers);
?>
