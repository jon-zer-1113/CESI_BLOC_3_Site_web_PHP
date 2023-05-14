<?php
session_start();
?><!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://8bit-burger.melanieroussy.fr/css/style.min.css?v=<?= htmlspecialchars(time()); ?>">
    <link rel=" apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <title>8-Bit Burger | Erreur 403</title>
</head>

<body>
    <main>
        <section class="error403__page text-center">
            <h1>Erreur 403</h1>

            <article>
                <h2 class="mt-3 mb-5">Accès interdit ! ⛔</h2>
                <p class="px-5">Ce contenu n'est pas accessible.</p>
                <img src="https://8bit-burger.melanieroussy.fr/medias/img/errors/nyan_cat.gif" alt="Nyan cat gif">
            </article>
        </section>
    </main>
</body>
</html>
