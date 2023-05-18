<section class="user__all-recipes-page">
    <h1 class="text-center">Recettes</h1>

    <article class="user__all-recipe-list-presentation text-center">
        <h2 class="mt-3 mb-5 col-8 mx-auto">Ici réside les fruits de nos inspirations !</h2>
        <h3 class="col-8 mx-auto">Consulte nos recettes et régale toi !</h3>
        <p class="mt-4 mb-5 mx-auto">Tu peux voir toutes les recettes avec des infos utiles: <span>la date de publication, le temps de préparation, la difficulté, etc.</span></p>
    </article>

    <article class="mt-5 text-center">
        <h2>Liste des burgers <i class="fa-solid fa-burger"></i></h2>
        <?php foreach ($this->recipes as $recipe) : ?>
            <img src="medias/img/common/hamburger.png" class="mt-5" alt="image de hamburger">
            <h3 class="col-8 mx-auto"><?= htmlspecialchars($recipe['title'], ENT_COMPAT) ?></h3>
            <p class="d-flex flex-column align-items-center"><a href="index.php?p=consulter-recette&recipeId=<?= htmlspecialchars($recipe['recipeId']) ?>" class="btn btn-success text-uppercase my-3">Voir</a></p>
        <?php endforeach; ?>
    </article>
</section>
