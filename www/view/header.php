<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 50px;">
	<a class="navbar-brand text-secondary" href="/"><i class="fas fa-camera-retro text-warning"></i> Camagru</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="/">Accueil</a>
			</li>
			<?php if ($_SESSION['customer_user'] == NULL) { ?>
			<li class="nav-item">
				<a class="nav-link" href="index.php?register">Inscription</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?login">Connexion</a>
			</li>
			<?php } else { ?>
			<li class="nav-item">
				<a class="nav-link" href="index.php?profile=<?php echo $_SESSION['customer_user'] ?>">Mon profil</a>
			</li>
			<?php } ?>
		</ul>
		<form class="form-inline my-2 my-lg-0" action="" method="GET">
			<input class="form-control mr-sm-2" type="search" placeholder="Recherche" name="search">
			<button class="btn btn-outline-warning my-2 my-sm-0 mr-4" type="submit">Rechercher</button>
		</form>
		<?php if ($_SESSION['customer_user'] != NULL) { ?>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php?account">Mon compte</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?logout">Deconnexion</a>
			</li>
		</ul>
		<?php } ?>
	</div>
</nav>
