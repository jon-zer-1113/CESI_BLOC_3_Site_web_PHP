<!-- ALL THE RECIPES ARE DISPLAYED INTO A TABLE -->
<section class="user__all-comments-page text-center">
    <h1 class="text-center">Commentaires</h1>

    <article>
        <h2 class="mt-3 mb-5">Commentaires utilisateurs</h2>
        <h3 class="col-8 mx-auto">Les commentaires des gourmands !</h3>
        <p class="mt-4 mb-5 col-8 mx-auto">Voici l'ensemble des commentaires qui ont été laissés par les utilisateurs de notre communauté.</p>
    </article>

    <article>
        <h2 class="col-8 mx-auto">Liste des commentaires <i class="fa-regular fa-comment"></i></h2>
        <div class="container mb-5 px-4 py-2 mx-auto">
            <?php foreach ($this->comments as $comment) : ?>
                <p class="recipe-title col-8 mx-auto pt-5"><?= htmlspecialchars($comment['title'], ENT_COMPAT) ?></p>
                <div class="d-flex justify-content-center">
                    <p class="username-comment pe-2"><?= htmlspecialchars($comment['username']) ?></p>
                    <p><?= htmlspecialchars($comment['rating']) ?></p>
                </div>
                <p><?= htmlspecialchars($comment['commentTitle'], ENT_COMPAT) ?></p>
                <p><?= htmlspecialchars($comment['content'], ENT_COMPAT) ?></p>
                <p class="date-comment"><?= htmlspecialchars($comment['creationDate']) ?></p>
            <?php endforeach; ?>
        </div>
    </article>

    <!-- NAVIGATION TO THE PREVIOUS PAGE -->
    <aside>
        <nav aria-label="Page navigation">
            <a href="index.php?p=consultation-recettes" class="btn btn-success text-uppercase" aria-label="Previous">revenir aux recettes</a>
        </nav>
    </aside>
</section>
