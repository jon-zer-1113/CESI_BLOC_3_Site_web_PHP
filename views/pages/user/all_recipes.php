<!-- ALL THE RECIPES ARE DISPLAYED INTO A TABLE -->
<section class="user__all-recipes-page">
    <h1 class="text-center">Recettes</h1>

    <article class="text-center">
        <h2 class="mt-3 mb-5">Consulte les recettes</h2>
        <h3>Lance-toi maintenant !</h3>
        <p class="mt-4 mb-5 mx-auto">Voici toutes les recettes à disposition afin <span>que tu puisses au mieux te régaler !</span></p>
    </article>

    <article class="mt-5 text-center">
        <h2>Liste des burgers <i class="fa-solid fa-burger"></i></h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-dark mt-3">
                        <tr>
                            <th>Titre</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                        <?php foreach ($this->recipes as $recipe) : ?>
                            <tr>
                                <td><?= htmlspecialchars($recipe['title']) ?></td>
                                <td><?= htmlspecialchars($recipe['creationDate']) ?></td>
                                <td class="d-flex flex-column align-items-center">
                                    <a href="index.php?p=consulter-recette&recipeId=<?= htmlspecialchars($recipe['recipeId']) ?>" class="btn btn-primary my-3">Voir <i class="fa-solid fa-circle-check"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </article>
</section>