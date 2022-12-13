<?php
// Error reporting (development stage)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the autoloader
require_once __DIR__ . '/vendor/autoloader.php';

// URL parameters
$page = $_GET['p'];
if (isset($page)) {
	switch ($page) {
		case 'accueil':
			$controller = new Controller\MainController();
			$controller->displayVisitorHome();
			break;
		case 'equipe':
			$controller = new Controller\MainController();
			$controller->displayTeam();
			break;
		case 'contact':
			$controller = new Controller\MainController();
			$controller->displayContact();
			break;
		case 'nouvel-utilisateur':
			$adminController  = new Controller\MainController();
			$adminController->createNewUser();
			break;
		case 'connexion-utilisateur':
			$adminController  = new Controller\MainController();
			$adminController->readUser();
			break;
		case 'accueil-utilisateur':
			$controller = new Controller\MainController();
			$controller->displayUserHome();
			break;
		case 'consultation-recettes':
			$controller = new Controller\MainController();
			$controller->displayUserAllRecipes();
			break;
		case 'consulter-recette':
			$controller = new Controller\MainController();
			$controller->displayUserRecipe();
			break;
		case 'accueil-admin':
			$controller = new Controller\MainController();
			$controller->displayAdminHome();
			break;
		case 'accueil-admin-connexion':
			$controller = new Controller\MainController();
			$controller->displayAdminMainHome();
			break;
		case 'nouvel-admin':
			$adminController  = new Controller\MainController();
			$adminController->createNewAdmin();
			break;
		case 'connexion-admin':
			$adminController  = new Controller\MainController();
			$adminController->readAdmin();
			break;
		case 'gestion-recettes':
			$controller = new Controller\MainController();
			$controller->displayAllRecipes();
			break;
		case 'recette':
			$controller = new Controller\MainController();
			$controller->displayRecipe();
			break;
		case 'nouvelle-recette':
			$controller = new Controller\MainController();
			$controller->createRecipe();
			break;
		case 'modifier-recette':
			$controller = new Controller\MainController();
			$controller->updateRecipe();
			break;
		case 'editer-recette':
			$controller = new Controller\MainController();
			$controller->editRecipe();
			break;
		case 'supprimer-recette':
			$controller = new Controller\MainController();
			$controller->deleteRecipe();
			break;
		case 'comptes-utilisateurs':
			$controller = new Controller\MainController();
			$controller->displayAllUsers();
			break;
		default:
			exit(header('Location: index.php?p=accueil'));
			break;
	}
} else {
	exit(header('Location: index.php?p=accueil'));
}