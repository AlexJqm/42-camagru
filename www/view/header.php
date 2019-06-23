<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 50px;">
	<a class="navbar-brand text-secondary" href="/">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="30" height="30" viewBox="0 0 430.117 430.118" style="enable-background:new 0 0 430.117 430.118;" xml:space="preserve" class=""><g><g>
			<path id="Dailybooth" d="M215.059,430.118c51.371,0,98.536-18.024,135.514-48.08l75.476,27.284l-31.456-75.831l-0.009-0.009   c22.458-33.963,35.534-74.664,35.534-118.423C430.117,96.284,333.836,0,215.059,0C96.279,0,0,96.284,0,215.059   C0,333.836,96.279,430.118,215.059,430.118z M96.055,159.105l44.794-10.524c12.702-24.502,38.261-41.252,67.766-41.252   c16.86,0,32.439,5.481,45.068,14.748l43.39-10.197c10.244-2.399,20.727,4.994,23.434,16.531l29.29,124.705   c2.717,11.541-3.388,22.836-13.618,25.244l-201.011,47.222c-10.237,2.408-20.729-4.994-23.438-16.531L82.43,184.34   C79.721,172.812,85.823,161.514,96.055,159.105z M219.418,270.844c29.916,0,54.176-24.255,54.176-54.18   c0-29.916-24.26-54.171-54.176-54.171c-29.928,0-54.185,24.255-54.185,54.171C165.233,246.589,189.49,270.844,219.418,270.844z    M219.418,182.021c19.135,0,34.644,15.513,34.644,34.648c0,19.13-15.509,34.639-34.644,34.639   c-19.135,0-34.644-15.509-34.644-34.639C184.774,197.534,200.283,182.021,219.418,182.021z" data-original="#000000" class="active-path" style="fill:#FFC107" data-old_color="#ffc107"></path></g></g>
		</svg>
	</a>
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
						Notifications <span class="badge badge-danger"><?php require_once('function/notification.php'); echo notification_alert($_SESSION['customer_user']); ?></span>
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
