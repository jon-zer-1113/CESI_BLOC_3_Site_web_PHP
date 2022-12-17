<!-- ALL THE RECIPES ARE DISPLAYED INTO A TABLE -->
<section class="user__all-recipes-page">
    <h1 class="text-center">Commentaires</h1>

    <article class="text-center">
        <h2 class="mt-3 mb-5">Commentaires</h2>
        <h3>Commentaires !</h3>
        <p class="mt-4 mb-5 mx-auto">Voici toutes les recettes à disposition afin que tu puisses au mieux te régaler !</p>
    </article>

    <article class="mt-5">
        <h2>Liste des burgers <i class="fa-solid fa-burger"></i></h2>
        <?php foreach ($this->comments as $comment) : ?>
            <p><?= htmlspecialchars($comment['title']) ?></p>
            <p><?= htmlspecialchars($comment['username']) ?></p>
            <p><?= htmlspecialchars($comment['rating']) ?></p>
            <p><?= htmlspecialchars($comment['commentTitle']) ?></p>
            <p><?= htmlspecialchars($comment['content']) ?></p>
            <p><?= htmlspecialchars($comment['creationDate']) ?></p>
        <?php endforeach; ?>
    </article>

    <!-- NAVIGATION TO THE PREVIOUS PAGE -->
    <aside>
        <nav aria-label="Page navigation">
            <a href="index.php?p=consultation-recettes" aria-label="Previous">
                revenir aux recettes.
            </a>
        </nav>
    </aside>
</section>