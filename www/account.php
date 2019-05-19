<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Mes preferences</title>
	</head>
	<body>
		<form action="edit.php" method="POST">
			<div class="container">
				<label for="login"><b>Identifiant: </b></label>
				<input type="text" placeholder="Entrer Identifiant" name="login" required>
				<label for="passwd"><b>Ancien Mot de Passe: </b></label>
				<input type="password" placeholder="Entrer Mot de Passe" name="oldpw" required>
				<label for="passwd"><b>Nouveau Mot de Passe: </b></label>
				<input type="password" placeholder="Entrer Mot de Passe" name="newpw" required>
				<input type="submit" name="submit" value="OK">
			</div>
		</form>
		<a href="index.php" id="create"><b>Retour</b></a>
	</body>
</html>
