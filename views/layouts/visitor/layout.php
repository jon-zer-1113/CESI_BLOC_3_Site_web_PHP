<?php
session_start();
$this->sessionCookie();
$_SESSION = array();
session_destroy();
?><!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.min.css?v=<?= htmlspecialchars(time()); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<title><?= htmlspecialchars($this->titleLayout) ?></title>
</head>

<body>
	<header>
		<nav class="navbar navbar-dark navbar-expand-md text-uppercase fixed-top px-4">
			<a class="navbar-brand" href="index.php?p=accueil"><img src="medias/img/common/8-bit_burger_logo.png" alt="8-Bit Burger logo"></a>
			<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbar">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item"><a href="index.php?p=accueil" class="nav-link first-link">Accueil</a></li>
					<li class="nav-item"><a href="index.php?p=equipe" class="nav-link px-md-3 px-lg-3 px-xl-3">Équipe</a></li>
					<li class="nav-item"><a href="index.php?p=contact" class="nav-link px-md-3 px-lg-3 px-xl-3">Contact</a></li>
					<li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#user-connexion"><i class="fa-solid fa-user"></i></a></li>
				</ul>
			</div>
		</nav>
	</header>

	<main id="visitor-top">
		<?php require_once $this->visitorView; ?>
		<div id="user-connexion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="user-login__modal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="user-login__modal"><i class="fa-solid fa-user pe-1"></i> Connexion</h4>
						<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<form action="index.php?p=connexion-utilisateur" class="needs-validation" method="POST" novalidate>
							<div class="mb-3">
								<label for="user-email-login" class="form-label">Email:</label>
								<input type="email" class="form-control" name="email" id="user-email-login" placeholder="Email" required>
								<div class="invalid-feedback">
									Email invalide.
								</div>
							</div>
							<div class="mb-5">
								<label for="user-password-login" class="form-label">Mot de passe:</label>
								<input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,}$" class="form-control" name="password" id="user-password-login" placeholder="Mot de passe" required>
								<div class="invalid-feedback">
									Mot de passe invalide.
								</div>
							</div>
							<div>
								<button class="btn btn-primary text-uppercase mx-auto d-block" type="submit">Connexion</button>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<a href="#" class="mx-auto" data-bs-toggle="modal" data-bs-target="#user-registration">Créer un compte</a>
					</div>
				</div>
			</div>
		</div>

		<div id="user-registration" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="visitor-registration__modal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="visitor-registration__modal"><i class="fa-solid fa-user-plus pe-1"></i> Inscription</h4>
						<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<form action="index.php?p=nouvel-utilisateur" class="needs-validation" method="POST" novalidate id="test">
							<div class="mb-3">
								<label for="user-username-registration" class="form-label">Nom d'utilisateur:</label>
								<input type="text" class="form-control" name="username" id="user-username-registration" placeholder="Nom d'utilisateur" required>
								<small class="form-text text-muted">Lettres, nombres, hyphens et underscores autorisés</small>
								<div class="invalid-feedback">
									Nom d'utilisateur invalide.
								</div>
							</div>
							<div class="mb-3">
								<label for="user-firstname-registration" class="form-label">Prénom:</label>
								<input type="text" class="form-control" name="firstname" id="user-firstname-registration" placeholder="Prénom" required>
								<div class="invalid-feedback">
									Prénom manquant.
								</div>
							</div>
							<div class="mb-3">
								<label for="user-lastname-registration" class="form-label">Nom:</label>
								<input type="text" class="form-control" name="lastname" id="user-lastname-registration" placeholder="Nom" required>
								<div class="invalid-feedback">
									Nom manquant.
								</div>
							</div>
							<div class="mb-3">
								<label for="user-email-registration" class="form-label">Email:</label>
								<input type="email" class="form-control" name="email" id="user-email-registration" placeholder="Email" required>
								<div class="invalid-feedback">
									Email invalide.
								</div>
							</div>
							<div class="mb-5">
								<label for="user-password-registration" class="form-label">Mot de passe:</label>
								<input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,}$" class="form-control" name="password" id="user-password-registration" placeholder="Mot de passe" required>
								<small class="form-text text-muted">Au moins 8 caractères, une lettre majuscule, minuscule, un chiffre et un caractère spécial</small>
								<div class="invalid-feedback">
									Mot de passe invalide.
								</div>
							</div>
							<input type="text" name="url" id="url">
							<button class="btn btn-primary text-uppercase mx-auto d-block" name="submit" type="submit">Inscription</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>

	<footer class="text-center text-uppercase text-light">
		<p><a href="#visitor-top"><i class="fa-solid fa-arrow-up pe-2"></i></a> © 8-Bit Burger - Tous droits réservés</p>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="js/app.min.js"></script>
</body>

</html>
