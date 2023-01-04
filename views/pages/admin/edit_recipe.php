<section class="back-office__edit-recipe-page">
	<h1 class="text-center px-5">Modification de la recette</h1>

	<article>
		<h2 class="mt-3 mb-5 px-3 text-center">Change une recette existante</h2>
		<h3 class="text-center px-4">Customise ta recette à volonté</h3>
		<p class="mt-4 mb-5 text-center">C'est ici que tu peux modifier la recette <span>que tu as sélectionné.</span></p>

		<div class="container">
			<div class="row">
				<form class="needs-validation col-9 col-sm-9 col-md-8 col-lg-6 col-xl-6 mx-auto" action="index.php?p=modifier-recette" method="POST" novalidate>
					<input type="hidden" name="recipeId" value="<?= htmlspecialchars($this->recipe['recipeId']) ?>">
					<div class="mb-5">
						<label for="recipe-update-title" class="form-label">Titre:</label>
						<input type="text" class="form-control" name="title" maxlength="50" id="recipe-update-title" value="<?= htmlspecialchars($this->recipe['title'], ENT_COMPAT) ?>" required>
						<div class="invalid-feedback">Titre manquant.</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-preptime" class="form-label">Temps de préparation (min):</label>
						<input type="number" min="1" class="form-control" name="prepTime" id="recipe-update-preptime" value="<?= htmlspecialchars($this->recipe['prepTime']) ?>" required>
						<div class="invalid-feedback">Temps de préparation manquant.</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-baketime" class="form-label">Temps de cuisson (min):</label>
						<input type="number" min="1" name="bakeTime" class="form-control" id="recipe-update-baketime" value="<?= htmlspecialchars($this->recipe['bakeTime']) ?>" required>
						<div class="invalid-feedback">Temps de cuisson manquant.</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-totaltime" class="form-label">Temps total (min):</label>
						<input type="number" min="1" name="totalTime" class="form-control" id="recipe-update-totaltime" value="<?= htmlspecialchars($this->recipe['totalTime']) ?>" required>
						<div class="invalid-feedback">Temps total manquant.</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-difficulty" class="form-label">Difficulté:</label>
						<input type="text" class="form-control" name="difficulty" maxlength="50" id="recipe-update-difficulty" value="<?= htmlspecialchars($this->recipe['difficulty'], ENT_COMPAT) ?>" required>
						<div class="invalid-feedback">Niveau de difficulté manquant.</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-cost" class="form-label">Coût:</label>
						<input type="text" class="form-control" name="cost" maxlength="50" id="recipe-update-cost" value="<?= htmlspecialchars($this->recipe['cost'], ENT_COMPAT) ?>" required>
						<div class="invalid-feedback">Coût manquant.</div>
					</div>
					<div class="mb-5">
						<label for="recipe-update-description" class="form-label">Description:</label>
						<textarea name="description" class="form-control" maxlength="100" id="recipe-update-description" rows="5" required><?= htmlspecialchars($this->recipe['description'], ENT_COMPAT) ?></textarea>
						<div class="invalid-feedback">Description manquante.</div>
					</div>
					<div class="mb-5">
						<label for="recipe-update-ingredients" class="form-label">Ingrédients:</label>
						<textarea name="ingredients" class="form-control" rows="10" maxlength="300" id="recipe-update-ingredients" required><?= htmlspecialchars($this->recipe['ingredients'], ENT_COMPAT) ?></textarea>
						<div class="invalid-feedback">Ingrédients manquants.</div>
					</div>
					<div class="mb-5">
						<label for="recipe-update-steps" class="form-label">Etapes:</label>
						<textarea name="steps" class="form-control" rows="10" maxlength="650" id="recipe-update-steps" required><?= htmlspecialchars($this->recipe['steps'], ENT_COMPAT) ?></textarea>
						<div class="invalid-feedback">Etapes manquantes.</div>
					</div>
					<button class="btn btn-danger text-uppercase mx-auto d-block" type="submit">Mise à jour</button>
				</form>
			</div>
		</div>
	</article>

	<!-- NAVIGATION TO THE PREVIOUS PAGE -->
	<aside class="text-center mt-5">
		<nav>
			<a class="btn btn-success" href="index.php?p=gestion-recettes" role="button">Retour</a>
		</nav>
	</aside>
</section>