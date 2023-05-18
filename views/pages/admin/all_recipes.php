<section class="back-office__all-recipes-page">
    <h1 class="text-center">Gestion des recettes</h1>

    <article class="text-center">
        <h2 class="mt-3 mb-5">Créé de superbes recettes</h2>
        <h3>Lance-toi maintenant !</h3>
        <p class="mt-4 mb-5 mx-auto">Voici ton espace de gestion afin que tu puisses créer <span>de magnifiques recettes de burgers à volonté !</span></p>
    </article>

    <article class="mt-5 text-center">
        <h2>Liste des burgers <i class="fa-solid fa-burger"></i></h2>
        <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#add-recipe__modal">Ajouter une recette <i class="fa-solid fa-circle-plus"></i></button>
        <div class="container">
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-dark mt-3">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date de création</th>
                                <th>Créateur</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->recipes as $recipe) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($recipe['title'], ENT_COMPAT) ?></td>
                                    <td><?= htmlspecialchars($recipe['creationDate']) ?></td>
                                    <td><?= htmlspecialchars($recipe['adminUsername']) ?></td>
                                    <td class="d-flex flex-column align-items-center">
                                        <a href="index.php?p=recette&recipeId=<?= htmlspecialchars($recipe['recipeId']) ?>" class="btn btn-primary my-3" title="Voir"><i class="fa-solid fa-circle-check"></i></a>
                                        <a href="index.php?p=editer-recette&recipeId=<?= htmlspecialchars($recipe['recipeId']) ?>" class="btn btn-success mb-3" title="Editer"><i class="fa-sharp fa-solid fa-pen text-light"></i></a>
                                        <a href="index.php?p=supprimer-recette&recipeId=<?= htmlspecialchars($recipe['recipeId']) ?>" class="btn btn-danger mb-3" onclick="return confirm('Es-tu sûr de vouloir supprimer cette recette ? 🍔')" title="Supprimer"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>

    <div id="add-recipe__modal" class="modal fade" tabindex="-1" aria-labelledby="creating-recipe__modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="creating-recipe__modal"><i class="fa-solid fa-circle-plus"></i> Ajoute une recette</h4>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?p=nouvelle-recette" class="needs-validation" method="POST" novalidate>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="adminUsername" value="<?= htmlspecialchars($_SESSION['adminUsername']); ?>" required>
                            <label for="recipe-add-title" class="form-label">Titre :</label>
                            <input type="text" class="form-control" name="title" maxlength="50" id="recipe-add-title" required>
                            <div class="invalid-feedback">Titre manquant.</div>
                        </div>
                        <div class="mb-3">
                            <label for="recipe-add-description" class="form-label">Description:</label>
                            <textarea type="text" class="form-control" name="description" maxlength="100" id="recipe-add-description" rows="5" required></textarea>
                            <div class="invalid-feedback">Description manquante.</div>
                        </div>
                        <div class="mb-3">
                            <label for="recipe-add-ingredients" class="form-label">Ingrédients:</label>
                            <textarea class="form-control" name="ingredients" rows="10" maxlength="300" id="recipe-add-ingredients" required></textarea>
                            <div class="invalid-feedback">Ingrédients manquants.</div>
                        </div>
                        <div class="mb-3">
                            <label for="recipe-add-steps">Etapes:</label>
                            <textarea class="form-control" name="steps" rows="10" maxlength="650" id="recipe-add-steps" required></textarea>
                            <div class="invalid-feedback">Etapes manquantes.</div>
                        </div>
                        <div class="mb-3">
                            <label for="recipe-add-preptime" class="form-label">Temps de préparation (min):</label>
                            <input type="number" min="1" class="form-control" name="prepTime" id="recipe-add-preptime" required>
                            <div class="invalid-feedback">Temps de préparation manquant.</div>
                        </div>
                        <div class="mb-3">
                            <label for="recipe-add-baketime" class="form-label">Temps de cuisson (min):</label>
                            <input type="number" min="1" class="form-control" name="bakeTime" id="recipe-add-baketime" required>
                            <div class="invalid-feedback">Temps de cuisson manquant.</div>
                        </div>
                        <div class="mb-3">
                            <label for="recipe-add-totaltime" class="form-label">Temps total (min):</label>
                            <input type="number" min="1" class="form-control" name="totalTime" id="recipe-add-totaltime" required>
                            <div class="invalid-feedback">Temps total manquant.</div>
                        </div>
                        <div class="mb-3">
                            <label for="recipe-add-difficulty" class="form-label">Difficulté:</label>
                            <input type="text" class="form-control" maxlength="50" name="difficulty" id="recipe-add-difficulty" required>
                            <div class="invalid-feedback">Niveau de difficulté manquant.</div>
                        </div>
                        <div class="mb-5">
                            <label for="recipe-add-cost" class="form-label">Coût:</label>
                            <input type="text" class="form-control" maxlength="50" name="cost" id="recipe-add-cost" required>
                            <div class="invalid-feedback">Coût manquant.</div>
                        </div>
                        <button class="btn btn-primary text-uppercase mx-auto d-block" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
