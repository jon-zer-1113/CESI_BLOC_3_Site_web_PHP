<?php ?>
<!-- HOME PAGE BEFORE BEFORE ACCESSING TO THE BACK-OFFICE -->
<section class="back-office__home-page text-center">
	<h1>Back-office</h1>

	<article>
		<h2 class="mt-3 mb-5 col-8 mx-auto">Accès à l'espace administrateur</h2>
		<h3>Rejoins le côté obscur</h3>
		<p class="mt-4 mb-5 mx-auto px-5">Un espace dédié pour créer tes recettes de burgers <span>et consulter la liste des utilisateurs !</span></p>
		<p><a class="btn btn-success text-uppercase mx-auto mb-4" href="#" role="button" data-bs-toggle="modal" data-bs-target="#admin-registration">Inscription <i class="fa-solid fa-arrow-right ps-2"></i></a></p>
		<p><a class="btn btn-danger text-uppercase mx-auto" href="#" role="button" data-bs-toggle="modal" data-bs-target="#admin-login">Connexion <i class="fa-solid fa-arrow-right ps-2"></i></a></p>
	</article>
</section>

<!-- MODAL: ADMIN LOGIN -->
<div id="admin-login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="admin-login__modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="admin-login__modal"><i class="fa-solid fa-user pe-1"></i> Connexion</h4>
				<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form action="index.php?p=connexion-admin" class="needs-validation" method="POST" novalidate>
					<div class="mb-3">
						<label for="admin-email-login" class="form-label">Email:</label>
						<input type="email" class="form-control" name="adminEmail" id="admin-email-login" placeholder="Email" required>
						<div class="invalid-feedback">
							Email invalide.
						</div>
					</div>
					<div class="mb-5">
						<label for="admin-password-login" class="form-label">Mot de passe:</label>
						<input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,}$" class="form-control" name="adminPassword" id="admin-password-login" placeholder="Mot de passe" required>
						<div class="invalid-feedback">
							Mot de passe invalide.
						</div>
					</div>
					<button class="btn btn-primary text-uppercase mx-auto d-block" type="submit">Connexion</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- MODAL: ADMIN REGISTRATION -->
<div id="admin-registration" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="admin-registration__modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="admin-registration__modal"><i class="fa-solid fa-user-plus pe-1"></i> Inscription</h4>
				<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form action="index.php?p=nouvel-admin" class="needs-validation" method="POST" novalidate>
					<div class="mb-3">
						<label for="admin-username-registration" class="form-label">Nom d'utilisateur:</label>
						<input type="text" pattern="^[A-Za-z0-9_-]*$" class="form-control" name="adminUsername" id="admin-username-registration" placeholder="Nom d'utilisateur" required>
						<small class="form-text text-muted">Lettres, nombres, hyphens et underscores autorisés</small>
						<div class="invalid-feedback">
							Nom d'utilisateur invalide.
						</div>
					</div>
					<div class="mb-3">
						<label for="admin-firstname-registration" class="form-label">Prénom:</label>
						<input type="text" class="form-control" name="adminFirstname" id="admin-firstname-registration" placeholder="Prénom" required>
						<div class="invalid-feedback">
							Prénom manquant.
						</div>
					</div>
					<div class="mb-3">
						<label for="admin-lastname-registration" class="form-label">Nom:</label>
						<input type="text" class="form-control" name="adminLastname" id="admin-lastname-registration" placeholder="Nom" required>
						<div class="invalid-feedback">
							Nom manquant.
						</div>
					</div>
					<div class="mb-3">
						<label for="admin-email-registration" class="form-label">Email:</label>
						<input type="email" class="form-control" name="adminEmail" id="admin-email-registration" placeholder="Email" required>
						<div class="invalid-feedback">
							Email invalide.
						</div>
					</div>
					<div class="mb-5">
						<label for="admin-password-registration" class="form-label">Mot de passe:</label>
						<input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,}$" class="form-control" name="adminPassword" id="admin-password-registration" placeholder="Mot de passe" required>
						<small class="form-text text-muted">Au moins 8 charactères, une lettre majuscule, minuscule, un chiffre et un charactère spécial</small>
						<div class="invalid-feedback">
							Mot de passe invalide.
						</div>
					</div>
					<button class="btn btn-primary text-uppercase mx-auto d-block" type="submit">Inscription</button>
				</form>
			</div>
		</div>
	</div>
</div>