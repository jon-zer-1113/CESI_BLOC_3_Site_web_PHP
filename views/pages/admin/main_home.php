<?php ?>
<!-- MAIN HOME PAGE OF THE BACK-OFFICE -->
<section class="back-office__main-home-page text-center">
	<h1>Espace administrateur</h1>

	<article>
		<h2 class="mt-3 mb-5 mx-auto"><?= 'Bienvenue à toi ' . htmlspecialchars($_SESSION['adminUsername']) . ' ! 👾'; ?></h2>
		<h3>Découvre ton espace admin</h3>
		<div class="container">
			<div class="row d-flex align-items-center flex-column">
				<p class="mt-4 col-8 col-sm-8 col-md-8 col-lg-6 col-xl-5">Tu es nouveau ? Au sein de l'espace administrateur de 8-Bit Burger tu pourras créer les recettes de burgers de ton choix et ainsi devenir un vrai pro des recettes de burgers faits maison ! Tu pourras également les modifier à ta convenance et les supprimer.</p>
				<p class="mb-5 col-8 col-sm-8 col-md-8 col-lg-6 col-xl-5">Tu peux aussi consulter les comptes utilisateurs existants. La gestion des comptes utilisateurs est uniquement réservé au compte super administrateur.</p>
			</div>
		</div>
		<img src="medias/img/admin/burger_smile.png" alt="image de burger">
	</article>
</section>