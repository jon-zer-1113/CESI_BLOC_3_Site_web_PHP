<!-- DISPLAY A SPECIFIC RECIPE -->
<section class="back-office__recipe-page text-center">
	<h1 class="text-center">Recette</h1>

	<article>
		<h2 class="mt-3 mb-5">Recette ajoutée</h2>
		<h3><?= htmlspecialchars($this->recipe['title']) ?></h3>
		<p class="col-7 col-sm-6 col-md-7 col-lg-5 col-xl-4 mx-auto"><?= htmlspecialchars($this->recipe['description']) ?></p>
		<p><img src="medias/img/common/burger.png" class="my-5" alt="image de hamburger"></p>
		<p>Publié par <?= htmlspecialchars($this->recipe['adminUsername']) ?></p>
		<p>Le <?= htmlspecialchars($this->recipe['creationDate']) ?></p>

		<article class="my-5">
			<h4 class="mb-3">Général</h4>
			<div class="container-fluid">
				<div class="container d-flex justify-content-center pt-5 pb-3">
					<p><i class="fa-solid fa-hourglass"></i> <?= htmlspecialchars($this->recipe['totalTime']) ?> min</p>
					<p class="mx-5"><i class="fa-solid fa-plus-minus"></i> <?= htmlspecialchars($this->recipe['difficulty']) ?></p>
					<p><i class="fa-solid fa-euro-sign"></i> <?= htmlspecialchars($this->recipe['cost']) ?></p>
				</div>
				<div class="container pt-3 pb-5">
					<p class="pb-2"><i class="fa-regular fa-timer"></i> <b>Préparation:</b> <?= htmlspecialchars($this->recipe['prepTime']) ?> min</p>
					<p><i class="fa-regular fa-timer"></i> <b>Cuisson:</b> <?= htmlspecialchars($this->recipe['bakeTime']) ?> min</p>
				</div>
			</div>
		</article>

		<article class="recipe-ingredients mb-5">
			<h4 class="mb-3">Ingrédients</h4>
			<p class="p-5"><?= htmlspecialchars($this->recipe['ingredients']) ?></p>
		</article>

		<article class="recipe-steps">
			<h4 class="mb-3">Etapes</h4>
			<p class="p-5"><?= htmlspecialchars($this->recipe['steps']) ?></p>
		</article>
	</article>

	<!-- NAVIGATION TO THE PREVIOUS PAGE -->
	<aside>
		<nav aria-label="Page navigation">
			<a class="page-link mx-auto mt-5" href="index.php?p=gestion-recettes" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</nav>
	</aside>
</section>