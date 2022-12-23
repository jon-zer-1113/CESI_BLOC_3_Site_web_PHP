<?php
session_start();
$this->sessionOnlyUser();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="8-Bit Burger - Le site de recettes de hamburgers pour les geeks">
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
			<a class="navbar-brand" href="index.php?p=accueil-utilisateur"><img src="medias/img/common/8-bit_burger_logo.png" alt="8-bit Burger logo"></a>
			<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbar">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item"><a href="index.php?p=accueil-utilisateur" class="nav-link first-link">Accueil</a></li>
					<li class="nav-item"><a href="index.php?p=consultation-recettes" class="nav-link px-md-3 px-lg-3 px-xl-3">Recettes</a></li>
					<li class="nav-item"><a href="#" class="nav-link px-md-3 px-lg-3 px-xl-3" data-bs-toggle="modal" data-bs-target="#shopping-list">Courses</a></li>
					<li class="nav-item"><a href="#" class="nav-link px-md-3 px-lg-3 px-xl-3" data-bs-toggle="modal" data-bs-target="#contact-information">Contact</a></li>
					<li class="nav-item"><a href="index.php?p=accueil" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a></li>
				</ul>
			</div>
		</nav>
	</header>

	<!-- The right view is displayed -->
	<main id="user-top">
		<?php require_once $this->userView; ?>
		<!-- MODAL: SHOPPING LIST -->
		<div id="shopping-list" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="shopping-list__modal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="shopping-list__modal">📄 Liste de courses</h4>
						<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<form action="#" method="POST">
							<div class="form-group mb-5">
								<label for="writing-shopping-list">Besoin de faire tes courses pou réaliser une recette ? Rédige ta liste ici ✏️</label>
								<textarea class="form-control" id="writing-shopping-list" rows="10"></textarea>
							</div>
							<div class="btn-group d-flex justify-content-center" role="group" aria-label="buttons together">
								<button type="button" class="btn btn-outline-danger text-uppercase" onclick="printTextarea()">Imprimer</button>
								<button type="button" id="download-btn-shopping-list" class="btn btn-outline-success text-uppercase">Télécharger</button>
								<button type="button" class="btn btn-outline-primary mx-auto text-uppercase" onclick="sendEmail()">Envoyer</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="contact-information" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contact-user__modal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="contact-user__modal">📞 Contact</h4>
						<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body text-center">
					<h5><b>Voici nos coordonnées:</b></h5>
						<address>56 Cité du Geek <span>33300 Bordeaux</span></address>
						<address>Tél: 05 56 28 19 45</address>
						<address>Mail: <a href="mailto:contact@8bit-burger.fr">contact@8bit-burger.fr</a></address>
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- Footer with an anchor and a copyright mention -->
	<footer class="text-center text-uppercase text-light">
		<p><a href="#user-top"><i class="fa-solid fa-arrow-up pe-2"></i></a> &copy 8-bit burger - Tous droits réservés</p>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="js/app.min.js"></script>

	<!-- PRINT, DOWNLOAD, SEND A RECIPE BY EMAIL A SHOPPING LIST / SEND A RECIPE BY EMAIL -->
	<script>
		function sendEmail() {
			let message = document.getElementById('writing-shopping-list').value;
			let link = "mailto:votre-adresse-email?body=" + encodeURIComponent(message);
			window.open(link, "_blank");
		}

		function otherSendEmail() {
			let content = document.querySelector('#sending').value;
			let link = "mailto:votre-adresse-email?body=" + encodeURIComponent(content);
			window.open(link, "_blank");
		}

		function printTextarea() {
			let textareaContent = document.getElementById("writing-shopping-list").value;
			let printContainer = document.createElement("div");
			printContainer.textContent = textareaContent;
			window.print();
			document.body.appendChild(printContainer);
			setTimeout(function() {
				document.body.removeChild(printContainer);
			}, 1000);
		}
	</script>
</body>

</html>