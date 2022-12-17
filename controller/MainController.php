<?php

namespace Controller;

class MainController
{
	private $visitorView;
	private $userView;
	private $adminView;
	private $titleLayout;
	private $visitorLayout = 'views/layouts/visitor/layout.php';
	private $userLayout = 'views/layouts/user/layout.php';
	private $adminLayout = 'views/layouts/admin/layout.php';
	private $adminMainLayout = 'views/layouts/admin/main_layout.php';
	private $superAdminMainLayout = 'views/layouts/admin/super_admin_layout.php';
	private $model;
	private $recipeModel;
	private $recipes;
	private $recipe;
	private $hashedPassword;
	private $adminPage;
	private $users;
	private $userModel;
	private $validation;
	private $newValidation;
	private $superAdminView;
	private $comment;
	private $commentModel;
	private $comments;

	// VISITOR CONTENT
	// HOME PAGE
	private function displayCurrentVisitorHome()
	{
		$this->visitorView = 'views/pages/visitor/home.php';
		$this->titleLayout = '8-Bit Burger | Accueil 🏠';
		require_once $this->visitorLayout;
	}

	public function displayVisitorHome()
	{
		return $this->displayCurrentVisitorHome();
	}

	// TEAM PRESENTATION PAGE
	private function displayCurrentTeam()
	{
		$this->visitorView = 'views/pages/visitor/team.php';
		$this->titleLayout = '8-Bit Burger | Equipe 💪';
		require_once $this->visitorLayout;
	}

	public function displayTeam()
	{
		return $this->displayCurrentTeam();
	}

	// CONTACT PAGE
	private function displayCurrentContact()
	{
		$this->visitorView = 'views/pages/visitor/contact.php';
		$this->titleLayout = '8-Bit Burger | Contact 📧';
		require_once $this->visitorLayout;
	}

	public function displayContact()
	{
		return $this->displayCurrentContact();
	}

	// USER CONTENT
	// ONLY ACCESS FOR USERS
	private function sessionUser()
	{
		if (!isset($_SESSION['userId'])) {
			exit(header('Location: index.php?p=accueil'));
		}
	}

	public function sessionOnlyUser()
	{
		return $this->sessionUser();
	}

	// REGISTRATION
	private function newUser()
	{
		$this->hashedPassword = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
		$this->model = new \Models\Create();
		$this->validation  = new \Validation\Validate();
		$this->newValidation = $this->validation->validationNewUserAccount(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['firstname']), htmlspecialchars($_POST['lastname']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
		$this->adminPage = $this->model->createNewUserAccount(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['firstname']), htmlspecialchars($_POST['lastname']), htmlspecialchars($_POST['email']), $this->hashedPassword);
		exit(header('Location: index.php?p=accueil'));
	}

	public function createNewUser()
	{
		return $this->newUser();
	}

	// LOGIN IN
	private function readCurrentUser()
	{
		$this->model = new \Models\Read();
		$this->validation  = new \Validation\Validate();
		$this->newValidation = $this->validation->validationUserAccount(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
		$this->adminPage = $this->model->readCurrentUserAccount(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
		exit(header('Location: index.php?p=accueil-utilisateur'));
	}

	public function readUser()
	{
		return $this->readCurrentUser();
	}

	// HOME PAGE
	private function displayCurrentUserHome()
	{
		$this->userView = 'views/pages/user/home.php';
		$this->titleLayout = '8-Bit Burger | Accueil 🏠';
		require_once $this->userLayout;
	}

	public function displayUserHome()
	{
		return $this->displayCurrentUserHome();
	}

	// DISPLAY ALL THE RECIPES
	private function displayUserAllCurrentRecipes()
	{
		$this->recipeModel = new \Models\Read();
		$this->recipes = $this->recipeModel->getRecipes();
		$this->userView = 'views/pages/user/all_recipes.php';
		$this->titleLayout = '8-Bit Burger | Recettes 👨‍🍳';
		require_once $this->userLayout;
	}

	public function displayUserAllRecipes()
	{
		return $this->displayUserAllCurrentRecipes();
	}

	// DISPLAY A SPECIFIC RECIPE 
	private function displayUserCurrentRecipe()
	{
		$this->recipeModel = new \Models\Read();
		$this->recipe = $this->recipeModel->getRecipe($_GET['recipeId']);
		$this->userView = 'views/pages/user/recipe.php';
		$this->titleLayout = '8-Bit Burger | Recette 👨‍🍳';
		require_once $this->userLayout;
	}

	public function displayUserRecipe()
	{
		return $this->displayUserCurrentRecipe();
	}

	// CREATE A COMMENT
	private function createCurrentComment()
	{
		$this->commentModel = new \Models\Create();
		$this->validation  = new \Validation\Validate();
		$this->newValidation = $this->validation->validationNewComment(htmlspecialchars($_POST['commentTitle']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['title']), htmlspecialchars($_POST['username']), htmlspecialchars($_POST['userId']), htmlspecialchars($_POST['recipeId']));
		$this->comment = $this->commentModel->createComment(htmlspecialchars(ucfirst($_POST['commentTitle'])), htmlspecialchars(ucfirst($_POST['content'])), htmlspecialchars($_POST['rating']), htmlspecialchars($_POST['title']), htmlspecialchars($_POST['username']), htmlspecialchars($_POST['userId']), htmlspecialchars($_POST['recipeId']));
		exit(header('Location: index.php?p=commentaires-utilisateurs'));
	}

	public function createNewComment()
	{
		return $this->createCurrentComment();
	}

	private function displayUserComments()
	{
		$this->commentModel = new \Models\Read();
		$this->comments = $this->commentModel->getComments();
		$this->userView = 'views/pages/user/all_comments.php';
		$this->titleLayout = '8-Bit Burger | Commentaires 💬';
		require_once $this->userLayout;
	}

	public function displayAllUserComments()
	{
		return $this->displayUserComments();
	}

	// ADMIN CONTENT (BACK-OFFICE)
	// BACK-OFFICE ACCESS ONLY FOR ADMINS
	private function sessionAdmin()
	{
		if (!isset($_SESSION['adminId'])) {
			exit(header('Location: index.php?p=accueil-admin'));
		}
	}

	public function sessionOnlyAdmin()
	{
		return $this->sessionAdmin();
	}

	// BACK-OFFICE ACCESS ONLY FOR THE SUPER ADMIN ACCOUNT
	private function sessionSuperAdmin()
	{
		if (($_SESSION['adminId'] !== 1)) {
			exit(header('Location: index.php?p=comptes-utilisateurs'));
		}
	}

	public function sessionOnlySuperAdmin()
	{
		return $this->sessionSuperAdmin();
	}

	// REGISTRATION
	private function newAdmin()
	{
		$this->hashedPassword = password_hash(htmlspecialchars($_POST['adminPassword']), PASSWORD_BCRYPT);
		$this->model = new \Models\Create();
		$this->validation  = new \Validation\Validate();
		$this->newValidation = $this->validation->validationNewAdminAccount(htmlspecialchars($_POST['adminUsername']), htmlspecialchars($_POST['adminFirstname']), htmlspecialchars($_POST['adminLastname']), htmlspecialchars($_POST['adminEmail']), htmlspecialchars($_POST['adminPassword']));
		$this->adminPage = $this->model->createNewAdminAccount(htmlspecialchars($_POST['adminUsername']), htmlspecialchars($_POST['adminFirstname']), htmlspecialchars($_POST['adminLastname']), htmlspecialchars($_POST['adminEmail']), $this->hashedPassword);
		exit(header('Location: index.php?p=accueil-admin'));
	}

	public function createNewAdmin()
	{
		return $this->newAdmin();
	}

	// LOGIN IN
	private function readCurrentAdmin()
	{
		$this->model = new \Models\Read();
		$this->validation  = new \Validation\Validate();
		$this->newValidation = $this->validation->validationAdminAccount(htmlspecialchars($_POST['adminEmail']), htmlspecialchars($_POST['adminPassword']));
		$this->adminPage = $this->model->readCurrentAdminAccount(htmlspecialchars($_POST['adminEmail']), htmlspecialchars($_POST['adminPassword']));
		exit(header('Location: index.php?p=accueil-admin-connexion'));
	}

	public function readAdmin()
	{
		return $this->readCurrentAdmin();
	}

	// HOME PAGE BEFORE ACCESSING TO THE BACK-OFFICE
	private function displayCurrentAdminHome()
	{
		$this->adminView = 'views/pages/admin/home.php';
		$this->titleLayout = '8-Bit Burger | Accueil 🏠';
		require_once $this->adminLayout;
	}

	public function displayAdminHome()
	{
		return $this->displayCurrentAdminHome();
	}

	// MAIN HOME PAGE
	private function displayCurrentAdminMainHome()
	{
		$this->adminView = 'views/pages/admin/main_home.php';
		$this->titleLayout = '8-Bit Burger | Accueil admin 🏠';
		require_once $this->adminMainLayout;
	}

	public function displayAdminMainHome()
	{
		return $this->displayCurrentAdminMainHome();
	}

	// DISPLAY ALL THE RECIPES (CRUD)
	private function displayAllCurrentRecipes()
	{
		$this->recipeModel = new \Models\Read();
		$this->recipes = $this->recipeModel->getRecipes();
		$this->adminView = 'views/pages/admin/all_recipes.php';
		$this->titleLayout = '8-Bit Burger | Recettes 👨‍🍳';	
		require_once $this->adminMainLayout;
	}

	public function displayAllRecipes()
	{
		return $this->displayAllCurrentRecipes();
	}

	// DISPLAY A SPECIFIC RECIPE (CRUD)
	private function displayCurrentRecipe()
	{
		$this->recipeModel = new \Models\Read();
		$this->recipe = $this->recipeModel->getRecipe($_GET['recipeId']);
		$this->adminView = 'views/pages/admin/recipe.php';
		$this->titleLayout = '8-Bit Burger | Recette 👨‍🍳';	
		require_once $this->adminMainLayout;
	}

	public function displayRecipe()
	{
		return $this->displayCurrentRecipe();
	}

	// CREATE A RECIPE (CRUD)
	private function createCurrentRecipe()
	{
		$this->recipeModel = new \Models\Create();
		$this->validation  = new \Validation\Validate();
		$this->newValidation = $this->validation->validationNewRecipe(htmlspecialchars($_POST['title']), htmlspecialchars ($_POST['description']), htmlspecialchars($_POST['prepTime']),htmlspecialchars($_POST['bakeTime']), htmlspecialchars($_POST['totalTime']),htmlspecialchars($_POST['difficulty']), htmlspecialchars($_POST['cost']), htmlspecialchars($_POST['ingredients']), htmlspecialchars($_POST['steps']), htmlspecialchars($_POST['adminUsername']));
		$this->recipe = $this->recipeModel->addRecipe(htmlspecialchars(ucfirst($_POST['title'])), htmlspecialchars(ucfirst($_POST['description'])), htmlspecialchars($_POST['prepTime']),htmlspecialchars($_POST['bakeTime']), htmlspecialchars($_POST['totalTime']),htmlspecialchars(ucfirst($_POST['difficulty'])), htmlspecialchars(ucfirst($_POST['cost'])), htmlspecialchars(ucfirst($_POST['ingredients'])), htmlspecialchars(ucfirst($_POST['steps'])), htmlspecialchars($_POST['adminUsername']));
		exit(header('Location: index.php?p=gestion-recettes'));
	}

	public function createRecipe()
	{
		return $this->createCurrentRecipe();
	}

	// EDIT A SPECIFIC RECIPE (CRUD)
	private function editCurrentRecipe()
	{
		$this->recipeModel = new \Models\Read();
		$this->recipe = $this->recipeModel->getRecipe($_GET['recipeId']);
		$this->adminView = 'views/pages/admin/edit_recipe.php';
		$this->titleLayout = '8-Bit Burger | Modification recette 👨‍🍳';
		require_once $this->adminMainLayout;
	}

	public function editRecipe()
	{
		return $this->editCurrentRecipe();
	}
	
	// UPDATE A SPECIFIC RECIPE (CRUD)
	private function updateCurrentRecipe()
	{
		$this->recipeModel = new \Models\Update();
		$this->validation  = new \Validation\Validate();
		$this->newValidation = $this->validation->validationUpdateRecipe(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['prepTime']), htmlspecialchars($_POST['bakeTime']), htmlspecialchars($_POST['totalTime']), htmlspecialchars($_POST['difficulty']), htmlspecialchars($_POST['cost']), htmlspecialchars($_POST['ingredients']), htmlspecialchars($_POST['steps']), htmlspecialchars($_POST['recipeId']));
		$this->recipe = $this->recipeModel->updateRecipe(htmlspecialchars(ucfirst($_POST['title'])), htmlspecialchars(ucfirst($_POST['description'])), htmlspecialchars($_POST['prepTime']),htmlspecialchars($_POST['bakeTime']), htmlspecialchars($_POST['totalTime']), htmlspecialchars(ucfirst($_POST['difficulty'])), htmlspecialchars(ucfirst($_POST['cost'])),htmlspecialchars(ucfirst($_POST['ingredients'])), htmlspecialchars(ucfirst($_POST['steps'])), htmlspecialchars($_POST['recipeId']));
		exit(header('Location: index.php?p=gestion-recettes'));
	}

	public function updateRecipe()
	{
		return $this->updateCurrentRecipe();
	}
	
	// DELETE A SPECIFIC RECIPE (CRUD)
	private function deleteCurrentRecipe()
	{
		$this->recipeModel = new \Models\Delete();
		$this->recipe = $this->recipeModel->deleteRecipe($_GET['recipeId']);	
		exit(header('Location: index.php?p=gestion-recettes'));
	}

	public function deleteRecipe()
	{
		return $this->deleteCurrentRecipe();
	}

	// DISPLAY ALL THE USERS
	private function displayAllCurrentUsers()
	{
		$this->userModel = new \Models\Read();
		$this->users = $this->userModel->getUsers();
		$this->adminView = 'views/pages/admin/all_users.php';
		$this->titleLayout = '8-Bit Burger | Utilisateurs 👤';
		require_once $this->adminMainLayout;
	}

	public function displayAllUsers()
	{
		return $this->displayAllCurrentUsers();
	}

	// DISPLAY ALL THE USERS (SUPER ADMIN ACCOUNT)
	private function displayAllCurrentUsersSuperAdmin()
	{
		$this->userModel = new \Models\Read();
		$this->users = $this->userModel->getUsers();
		$this->superAdminView = 'views/pages/admin/all_users_superadmin.php';
		$this->titleLayout = '8-Bit Burger | Utilisateurs 👤';
		require_once $this->superAdminMainLayout;
	}

	public function displayAllUsersSuperAdmin()
	{
		return $this->displayAllCurrentUsersSuperAdmin();
	}

	// DELETE A SPECIFIC USER (ONLY SUPER ADMIN) 
	private function deleteCurrentUser()
	{
		$this->userModel = new \Models\Delete();
		$this->user = $this->userModel->deleteUser($_GET['userId']);
		exit(header('Location: index.php?p=gestion-utilisateurs'));
	}

	public function deleteUser()
	{
		return $this->deleteCurrentUser();
	}
}