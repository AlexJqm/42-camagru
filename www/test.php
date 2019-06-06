<?php echo get_current_user(); ?>
<form action="" method="post" enctype="multipart/form-data">
	<p>Images:
		<input type="file" name="userfile" />
		<input type="submit" value="Send" />
	</p>
</form>

<?php
	if (file_exists("../uploalds") == false)
		mkdir ("../uploalds", 0777);
	$uploaddir = "../uploalds";
	$uploadfile = $uploaddir . "/" . basename($_FILES['userfile']['tmp_name'] . "." . basename($_FILES['userfile']['type']));

	echo '<pre>';
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "Le fichier est valide, et a été téléchargé
			avec succès. Voici plus d'informations :\n";
	} else {
		echo "Attaque potentielle par téléchargement de fichiers.
			Voici plus d'informations :\n";
	}

	echo 'Voici quelques informations de débogage :';
	print_r($_FILES);

	echo '</pre>';

?>

<img src="<?php echo $uploadfile ?>" alt="">
