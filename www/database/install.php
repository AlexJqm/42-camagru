<?php
	$db_host = "192.168.99.100:3306";
	$db_user = "root";
	$db_pw = "root";
	$db_name = "db_rush";
	$db_link = mysqli_connect($db_host, $db_user, $db_pw);
	function query_table($link, $table_name, $query){
		if (mysqli_query($link, $query))
			echo "Requete a la table '$table_name' reussite.\n";
		else
			die("Erreur de requete a la table '$table_name'\n.	" . mysqli_error($link));
	}
	if (!$db_link)
		die("Connexion impossible: " . mysqli_connect_error());
	echo "Connexion au serveur MySQL reussie."."\n";
	if (mysqli_select_db($db_link, $db_name)) {
		echo "db_minishop already exisits"."\n";
		exit();
	}
	$db_create = "CREATE DATABASE $db_name";
	if (mysqli_query($db_link, $db_create))
		echo "La base de donnee '$db_name' a ete creer avec succes.\n";
	else
		throw_mysqli_error($db_link);
	mysqli_select_db($db_link, $db_name);

	$create_table_produits = "CREATE TABLE produits
		(produit_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		produit_cat INT, produit_titre VARCHAR(40) DEFAULT 'item' NOT NULL,
		produit_prix INT NOT NULL, produit_desc TEXT NOT NULL);";
	query_table($db_link, "produits", $create_table_produits);

	$create_table_categories = "CREATE TABLE categories
		(cat_id INT PRIMARY KEY NOT NULL,
		cat_titre TEXT NOT NULL);";
	query_table($db_link, "categories", $create_table_categories);

	$insert_produits = "INSERT INTO produits (produit_cat,
		produit_titre, produit_prix, produit_desc) VALUES
		(1, 'Supreme Water Bottle', 50, '<p>A red water bottle with Supreme logo.</p>'),
		(1, 'Supreme Teddy Bear', 75, '<p>A stuffed bear with Supreme logo.</p>'),
		(1, 'Supreme Soup Bowl', 50, '<p>A bowl and spoon with Supreme logo.</p>'),
		(1, 'Supreme RC', 150, '<p>An RC car with Supreme logo.</p>'),
		(1, 'Supreme Skateboard', 150, '<p>A skateboard with Supreme logo.</p>'),
		(2, 'Logo Hooded Sweatshirt', 275, '<p>A warm sweatshirt with a signature logo.</p>'),
		(2, 'Empre State T-shirt', 100, '<p>A plain T-shirt with a photo of an Emprire State building</p>'),
		(2, 'Color-Blocked Hoodie', 275, '<p>A bright color-blocked zip hoodie</p>'),
		(2, 'Fuck Love T-Shirt', 100, '<p>A white fuck love T-shirt</p>'),
		(2, 'Supreme Kiss Tee', 100, '<p>A pink T-shirt with kissing couples</p>'),
		(3, 'Adidas Yeezy 350 V2', 280, '<p>Purple Adidas sneakers</p>'),
		(3, 'Vans SK-8-HI', 480, '<p>Blood and semen Vans</p>'),
		(3, 'The 10 Nike X OFF', 450, '<p>Tulip pink Nikes</p>'),
		(3, 'Yeezy 350', 400, '<p>Frozen red sneakers</p>'),
		(3, 'Jordan Retro 11', 350, '<p>Retro black-and-white Jordans</p>');";
	query_table($db_link, "produits", $insert_produits);

	$insert_categories = "INSERT INTO categories (cat_id, cat_titre) VALUES
		(1, 'accessoires'), (2, 'vetements'), (3, 'equipements');";
	query_table($db_link, "categories", $insert_categories);

	$create_table_panier = "CREATE TABLE panier
		(p_id INT(10) PRIMARY KEY NOT NULL,
		ip_add VARCHAR(255) NOT NULL,
		qty INT DEFAULT 0 NOT NULL);";
	query_table($db_link, "panier", $create_table_panier);

	$create_table_commande = "CREATE TABLE `commandes`
		(`commande_id` int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
		`p_id` int(100) NOT NULL,
		`c_id` int(100) NOT NULL,
		`qty` int(100) NOT NULL,
		`commande_date` date NOT NULL);";
	query_table($db_link, "commandes", $create_table_commande);
