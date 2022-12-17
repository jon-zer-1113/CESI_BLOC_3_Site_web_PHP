<section class="back-office__edit-recipe-page">
	<h1 class="text-center">Modification de la recette</h1>

	<article>
		<h2 class="mt-3 mb-5 text-center">Change une recette existante</h2>
		<h3 class="text-center">Customise ta recette à volonté</h3>
		<p class="mt-4 mb-5 text-center">C'est ici que tu peux modifier la recette <span>que tu as sélectionné.</span></p>

		<div class="container">
			<div class="row">
				<form class="needs-validation col-8 col-sm-9 col-md-8 col-lg-6 col-xl-6 mx-auto" action="index.php?p=modifier-recette" method="POST" novalidate>
					<input type="hidden" name="recipeId" value="<?= htmlspecialchars($this->recipe['recipeId']) ?>">
					<div class="mb-5">
						<label for="recipe-update-title" class="form-label">Titre:</label>
						<input type="text" class="form-control" name="title" id="recipe-update-title" value="<?= htmlspecialchars($this->recipe['title']) ?>" required>
						<div class="invalid-feedback">
							Titre manquant.
						</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-preptime" class="form-label">Temps de préparation (minutes):</label>
						<input type="number" min="1" class="form-control" name="prepTime" id="recipe-update-preptime" value="<?= htmlspecialchars($this->recipe['prepTime']) ?>" required>
						<div class="invalid-feedback">
							Temps de préparation manquant.
						</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-baketime" class="form-label">Temps de cuisson (minutes):</label>
						<input type="number" min="1" name="bakeTime" class="form-control" id="recipe-update-baketime" value="<?= htmlspecialchars($this->recipe['bakeTime']) ?>" required>
						<div class="invalid-feedback">
							Temps de cuisson manquant.
						</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-totaltime" class="form-label">Temps total (minutes):</label>
						<input type="number" min="1" name="totalTime" class="form-control" id="recipe-update-totaltime" value="<?= htmlspecialchars($this->recipe['totalTime']) ?>" required>
						<div class="invalid-feedback">
							Temps total manquant.
						</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-difficulty" class="form-label">Difficulté:</label>
						<input type="text" class="form-control" name="difficulty" id="recipe-update-difficulty" value="<?= htmlspecialchars($this->recipe['difficulty']) ?>" required>
						<div class="invalid-feedback">
							Niveau de difficulté manquant.
						</div>
					</div>
					<div class="md-5 mb-5">
						<label for="recipe-update-cost" class="form-label">Coût:</label>
						<input type="text" class="form-control" name="cost" id="recipe-update-cost" value="<?= htmlspecialchars($this->recipe['cost']) ?>" required>
						<div class="invalid-feedback">
							Coût manquant.
						</div>
					</div>
					<div class="mb-5">
						<label for="recipe-update-description" class="form-label">Description:</label>
						<textarea name="description" class="form-control" id="recipe-update-description" rows="5" required><?= htmlspecialchars($this->recipe['description']) ?></textarea>
						<div class="invalid-feedback">
							Description manquante.
						</div>
					</div>
					<div class="mb-5">
						<label for="recipe-update-ingredients" class="form-label">Ingrédients:</label>
						<textarea name="ingredients" class="form-control" rows="10" id="recipe-update-ingredients" required><?= htmlspecialchars($this->recipe['ingredients']) ?></textarea>
						<div class="invalid-feedback">
							Ingrédients manquants.
						</div>
					</div>
					<div class="mb-5">
						<label for="recipe-update-steps" class="form-label">Etapes:</label>
						<textarea name="steps" class="form-control" rows="10" id="recipe-update-steps" required><?= htmlspecialchars($this->recipe['steps']) ?></textarea>
						<div class="invalid-feedback">
							Etapes manquantes.
						</div>
					</div>
					<button class="btn btn-warning text-uppercase mx-auto d-block" type="submit">Mise à jour</button>
				</form>
			</div>
		</div>
	</article>
</section>