<?php ?>
<section class="user__home-page text-center">
    <h1>Espace utilisateur</h1>

    <article>
        <h2 class="mt-3 mb-5 mx-auto"><?= 'Bienvenue à toi ' . htmlspecialchars($_SESSION['username']) . ' ! 👾'; ?></h2>
        <h3>L'espace utilisateur, késako ?</h3>
        <p class="mt-4 px-5">Tu es nouveau ? Au sein de l'espace utilisateur de 8-Bit Burger, <span>tu peux poster des commentaires sur les recettes de burgers de ton choix.</span></p>
        <p class="px-5 mb-5">Tu peux également rédiger une liste de courses à ta convenance <span>et te l'envoyer par email.</span></p>
        <p><img src="medias/img/user/burger.png" alt="image de burger"></p>
    </article>
</section>