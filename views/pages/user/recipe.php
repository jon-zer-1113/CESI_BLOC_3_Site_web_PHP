<!-- DISPLAY A SPECIFIC RECIPE -->
<section class="user__recipe-page text-center">
    <h1 class="text-center">Recette</h1>

    <article class="current-recipe" id="content">
        <h2 class="mt-3 mb-5">Recette ajoutée</h2>
        <p class="px-5">Consulte la recette en détails, imprime-là, <span>télécharge-là ou envoie-là aux personnes de ton choix !</span></p>
        <p class="px-5 mb-5">Tu peux également laisser <span>un commentaire en bas de chaque recette.</span></p>
        <h3><?= htmlspecialchars($this->recipe['title'], ENT_COMPAT) ?></h3>
        <p class="col-7 col-sm-6 col-md-7 col-lg-5 col-xl-4 mx-auto"><?= htmlspecialchars($this->recipe['description'], ENT_COMPAT) ?></p>
        <p><img src="medias/img/common/hamburger.png" alt="image de hamburger"></p>
        <p>Publié par <?= htmlspecialchars($this->recipe['adminUsername']) ?></p>
        <p id="print-gap"><?= htmlspecialchars($this->recipe['creationDate']) ?></p>

        <article class="recipe-general-information mx-auto mb-5">
            <h4 class="mt-5 mb-3">Général</h4>
            <div class="container-fluid">
                <div class="container d-flex justify-content-center pt-5 pb-3">
                    <p><i class="fa-solid fa-hourglass"></i> <?= htmlspecialchars($this->recipe['totalTime']) ?> min</p>
                    <p class="mx-3"><i class="fa-solid fa-plus-minus"></i> <?= htmlspecialchars($this->recipe['difficulty'], ENT_COMPAT) ?></p>
                    <p><i class="fa-solid fa-euro-sign"></i> <?= htmlspecialchars($this->recipe['cost'], ENT_COMPAT) ?></p>
                </div>
                <div class="container pt-3 pb-5">
                    <p class="pb-2"><i class="fa-regular fa-timer"></i> <b>Préparation:</b> <?= htmlspecialchars($this->recipe['prepTime']) ?> min</p>
                    <p><i class="fa-regular fa-timer"></i> <b>Cuisson:</b> <?= htmlspecialchars($this->recipe['bakeTime']) ?> min</p>
                </div>
            </div>
        </article>

        <article class="recipe-ingredients mb-5">
            <h4 class="mb-3">Ingrédients</h4>
            <p class="p-4"><?= htmlspecialchars($this->recipe['ingredients'], ENT_COMPAT) ?></p>
        </article>

        <article class="recipe-steps mb-5">
            <h4 class="mb-3">Etapes</h4>
            <p class="p-4"><?= htmlspecialchars($this->recipe['steps'], ENT_COMPAT) ?></p>
        </article>

        <article class="mb-5">
            <h4>Imprimer ou <span>télécharger la recette</span></h4>
            <button type="button" class="btn btn-danger text-uppercase mt-2" onclick="printTextarea()">Clique-ici</button>
        </article>

        <article class="mb-5">
            <h4>Envoyer la recette</h4>
            <button type="button" class="btn btn-success text-uppercase mt-2" data-bs-toggle="modal" data-bs-target="#sending-recipe">Clique-ici</button>
        </article>
    </article>

    <article class="form-comment">
        <h4 class="mb-3">Commente la recette</h4>
        <form action="index.php?p=nouveau-commentaire" class="needs-validation mt-2 py-5 mx-auto" method="POST" novalidate>
            <div class="mb-3 mx-auto">
                <label for="comment-title" class="form-label">Titre:</label>
                <input type="text" class="form-control mx-auto" name="commentTitle" maxlength="50" id="comment-title" required>
                <div class="invalid-feedback">Titre manquant.</div>
            </div>
            <div class="mb-3 mx-auto">
                <label for="comment-rating" class="form-label">Note (1 à 5 cœurs):</label>
                <select class="form-control mx-auto" id="comment-rating" name="rating">
                    <option value="❤️">❤️</option>
                    <option value="❤️❤️">❤️❤️</option>
                    <option value="❤️❤️❤️">❤️❤️❤️</option>
                    <option value="❤️❤️❤️❤️">❤️❤️❤️❤️</option>
                    <option value="❤️❤️❤️❤️❤️">❤️❤️❤️❤️❤️</option>
                </select>
            </div>
            <div class="mb-3 mx-auto">
                <label for="comment-content" class="form-label">Commentaire:</label>
                <textarea name="content" class="form-control mx-auto" rows="10" maxlength="250" id="comment-content" required></textarea>
                <div class="invalid-feedback">Commentaire manquant.</div>
            </div>
            <input type="hidden" class="form-control" name="title" id="title" value="<?= htmlspecialchars($this->recipe['title'], ENT_COMPAT) ?>" required>
            <input type="hidden" class="form-control" name="username" id="username" value="<?= htmlspecialchars($_SESSION['username']); ?>" required>
            <input type="text" name="website" id="website">
            <button class="btn btn-primary text-uppercase mx-auto d-block" type="submit">Ajouter</button>
        </form>
        <aside>
            <a class="btn btn-success text-uppercase mt-5" href="index.php?p=commentaires-utilisateurs">Voir les commentaires</a>
        </aside>
    </article>

    <!-- NAVIGATION TO THE PREVIOUS PAGE -->
    <aside>
        <nav aria-label="Page navigation">
            <a class="page-link mx-auto mt-3" href="index.php?p=consultation-recettes" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </nav>
    </aside>
</section>

<!-- MODAL : SENDING AN EMAIL (RECIPE) -->
<div id="sending-recipe" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sending-recipe__modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="sending-recipe__modal">📧 Envoyer la recette</h4>
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <form action="#" method="POST">
                    <div class="form-group mb-5">
                        <label for="writing-shopping-list">Écris ton mail, clique sur envoyer et mets dans ton email la recette que tu as téléchargé en PDF.</label>
                        <textarea class="form-control mt-1" id="sending" rows="10"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary mx-auto text-uppercase" onclick="otherSendEmail()">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>