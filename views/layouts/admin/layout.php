<?php
session_start();
$this->sessionCookie();
$_SESSION = array();
session_destroy();
?><!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.min.css?v=<?= htmlspecialchars(time()); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<title><?= htmlspecialchars($this->titleLayout) ?></title>
</head>

<body>
	<header>
		<nav class="navbar navbar-dark navbar-expand-md text-uppercase fixed-top px-4">
			<a class="navbar-brand" href="index.php?p=accueil-admin"><img src="medias/img/common/8-bit_burger_logo.png" alt="8-Bit Burger logo"></a>
			<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbar">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item"><a href="#" class="nav-link first-link">Accueil</a></li>
					<li class="nav-item"><a href="#" class="nav-link px-md-3 px-lg-3 px-xl-3" data-bs-toggle="modal" data-bs-target="#admin-login">Connexion</a></li>
					<li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#admin-registration" title="Inscription"><i class="fa-solid fa-user-plus"></i></a></li>
				</ul>
			</div>
		</nav>
	</header>

	<main id="admin-main-top">
		<?php require_once $this->adminView; ?>
	</main>

	<footer class="text-center text-uppercase text-light">
		<p><a href="#admin-main-top"><i class="fa-solid fa-arrow-up pe-2"></i></a> © 8-Bit Burger - Tous droits réservés</p>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="js/app.min.js"></script>
</body>

</html>
