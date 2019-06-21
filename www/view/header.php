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
			<li class="nav-item">
				<a class="nav-link" href="index.php?creation">Créer un montage</a>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php?notification">
					<button type="button" class="btn btn-light text-secondary">
						Notifications <span class="badge badge-danger"><?php require 'function/notification.php'; echo notification_alert($_SESSION['customer_user']); ?></span>
					</button>
				</a>
			</li>
		</ul>
		<?php } ?>
		<?php if ($_SESSION['customer_user'] != NULL) { ?>
		<ul class="navbar-nav">
			<li class="nav-item dropdown mr-2">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Mon compte
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?manage_profile">Mon profil</a>
					<a class="dropdown-item" href="index.php?followers">Mes followers</a>
					<a class="dropdown-item" href="index.php?manage_content">Mon contenu</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="index.php?logout">Deconnexion</a>
				</div>
			</li>
		</ul>
		<?php } ?>
		<form class="form-inline my-2 my-lg-0" action="" method="GET">
			<input class="form-control mr-sm-2" type="search" placeholder="Recherche" name="search">
			<button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Rechercher</button>
		</form>
	</div>
</nav>
