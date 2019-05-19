<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Connexion</title>
	</head>
	<body>
		<form action="login.php" method="POST">
			<div class="container">
				<label for="login"><b>Identifiant: </b></label>
				<input type="text" placeholder="Entrer Identifiant" name="login" required>
				<label for="passwd"><b>Mot de Passe: </b></label>
				<input type="password" placeholder="Entrer Mot de Passe" name="passwd" required>
				<input type="submit" name="submit" value="OK">
			</div>
		</form>
		<a href="register.php" id="create"><b>S'inscire</b></a>
		<a href="index.php" id="index"><b>Retour</b></a>
	</body>
</html>
