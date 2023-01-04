<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Including the autoloader
require_once __DIR__ . '/vendor/autoloader.php';

// URL 
$page = $_GET['p'];
if (array_key_exists('p', $_GET)) {
	switch ($page) {
		case 'accueil':
			$controller = new Controllers\MainController();
			$controller->displayVisitorHome();
			break;
		case 'equipe':
			$controller = new Controllers\MainController();
			$controller->displayTeam();
			break;
		case 'contact':
			$controller = new Controllers\MainController();
			$controller->displayContact();
			break;
		case 'nouvel-utilisateur':
			$adminController  = new Controllers\MainController();
			$adminController->createNewUser();
			break;
		case 'connexion-utilisateur':
			$adminController  = new Controllers\MainController();
			$adminController->readUser();
			break;
		case 'accueil-utilisateur':
			$controller = new Controllers\MainController();
			$controller->displayUserHome();
			break;
		case 'consultation-recettes':
			$controller = new Controllers\MainController();
			$controller->displayUserAllRecipes();
			break;
		case 'consulter-recette':
			$controller = new Controllers\MainController();
			$controller->displayUserRecipe();
			break;
		case 'nouveau-commentaire':
			$controller = new Controllers\MainController();
			$controller->createNewComment();
			break;
		case 'commentaires-utilisateurs':
			$controller = new Controllers\MainController();
			$controller->displayAllUserComments();
			break;
		case 'accueil-admin':
			$controller = new Controllers\MainController();
			$controller->displayAdminHome();
			break;
		case 'accueil-admin-connexion':
			$controller = new Controllers\MainController();
			$controller->displayAdminMainHome();
			break;
		case 'nouvel-admin':
			$adminController  = new Controllers\MainController();
			$adminController->createNewAdmin();
			break;
		case 'connexion-admin':
			$adminController  = new Controllers\MainController();
			$adminController->readAdmin();
			break;
		case 'gestion-recettes':
			$controller = new Controllers\MainController();
			$controller->displayAllRecipes();
			break;
		case 'recette':
			$controller = new Controllers\MainController();
			$controller->displayRecipe();
			break;
		case 'nouvelle-recette':
			$controller = new Controllers\MainController();
			$controller->createRecipe();
			break;
		case 'modifier-recette':
			$controller = new Controllers\MainController();
			$controller->updateRecipe();
			break;
		case 'editer-recette':
			$controller = new Controllers\MainController();
			$controller->editRecipe();
			break;
		case 'supprimer-recette':
			$controller = new Controllers\MainController();
			$controller->deleteRecipe();
			break;
		case 'comptes-utilisateurs':
			$controller = new Controllers\MainController();
			$controller->displayAllUsers();
			break;
		case 'gestion-utilisateurs':
			$controller = new Controllers\MainController();
			$controller->displayAllUsersSuperAdmin();
			break;
		case 'supprimer-utilisateur':
			$controller = new Controllers\MainController();
			$controller->deleteUser();
			break;
		default:
			exit(header('Location: index.php?p=accueil'));
			break;
	}
} else {
	exit(header('Location: index.php?p=accueil'));
}