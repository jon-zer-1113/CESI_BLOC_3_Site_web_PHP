<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.min.css?v=<?= htmlspecialchars(time()); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="medias/icon/favicon.ico">
	<title><?= htmlspecialchars($this->titleLayout) ?></title>
</head>

<body>
	<!-- Header with a responsive navbar (hamburger menu) -->
	<header>
		<nav class="navbar navbar-dark navbar-expand-md text-uppercase fixed-top px-4">
			<a class="navbar-brand" href="index.php?p=accueil-admin"><img src="medias/img/common/8-bit_burger_logo.png" alt="8-bit Burger logo"></a>
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

	<!-- The right view is displayed -->
	<main id="admin-main-top">
		<?php require_once $this->adminView; ?>
	</main>

	<!-- Footer with an anchor and a copyright mention -->
	<footer class="text-center text-uppercase text-light">
		<p><a href="#admin-main-top"><i class="fa-solid fa-arrow-up pe-2"></i></a> &copy 8-bit burger - Tous droits réservés</p>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="js/app.min.js"></script>
</body>

</html>