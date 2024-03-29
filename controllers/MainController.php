<?php

namespace Controllers;

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
    private $otherModel;
    private $otherCurrentModel;
    private $recipeModel;
    private $recipes;
    private $recipe;
    private $hashedPassword;
    private $userPage;
    private $adminPage;
    private $otherCurrentUserPage;
    private $otherCurrentAdminPage;
    private $otherUserPage;
    private $otherAdminPage;
    private $users;
    private $user;
    private $userModel;
    private $validation;
    private $newValidation;
    private $superAdminView;
    private $comment;
    private $commentModel;
    private $comments;

    /**
     * Display the visitor home page.
     */
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

    /**
     * Display the team page.
     */
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

    /**
     * Display the contact page.
     */
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

    /**
     * Set an improved session cookie.
     */
    private function sessionCookieImproved()
    {
        $params = session_get_cookie_params();
        setcookie(
            "PHPSESSID",
            session_id(),
            [
                'expires' => 0,
                'path' => $params["path"],
                'domain' => $params["domain"],
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Lax'
            ]
        );
    }

    public function sessionCookie()
    {
        return $this->sessionCookieImproved();
    }

    /**
     * Check if a user session exists; otherwise, redirect to the home page.
     */
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

    /**
     * Create a new user.
     */
    private function newUser()
    {
        $this->hashedPassword = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
        $this->model = new \Models\Create();
        $this->otherCurrentModel = new \Models\Read();
        $this->otherModel = new \Models\Read();
        $this->validation  = new \Validation\Validate();
        $this->otherCurrentUserPage = $this->otherCurrentModel->readUserAccountUsernameExistence(htmlspecialchars($_POST['username']));
        $this->otherUserPage = $this->otherModel->readUserAccountEmailExistence(htmlspecialchars($_POST['email']));
        $this->newValidation = $this->validation->validationNewUserAccount(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['firstname']), htmlspecialchars($_POST['lastname']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['url']));
        $this->userPage = $this->model->createNewUserAccount(htmlspecialchars($_POST['username']), htmlspecialchars(trim($_POST['firstname'])), htmlspecialchars(trim($_POST['lastname'])), htmlspecialchars(trim($_POST['email'])), $this->hashedPassword);
        exit(header('Location: index.php?p=accueil'));
    }

    public function createNewUser()
    {
        return $this->newUser();
    }

    /**
     * Reads the current user (login).
     */
    private function readCurrentUser()
    {
        $this->model = new \Models\Read();
        $this->validation  = new \Validation\Validate();
        $this->newValidation = $this->validation->validationUserAccount(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
        $this->userPage = $this->model->readCurrentUserAccount(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
        exit(header('Location: index.php?p=accueil-utilisateur'));
    }

    
    public function readUser()
    {
        return $this->readCurrentUser();
    }

    /**
     * Displays the user's home page.
     */
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

    private function displayUserAllCurrentRecipes()
    {
        $this->recipeModel = new \Models\Read();
        $this->recipes = $this->recipeModel->getRecipes();
        $this->userView = 'views/pages/user/all_recipes.php';
        $this->titleLayout = '8-Bit Burger | Recettes 👨‍🍳';
        require_once $this->userLayout;
    }

    /**
     * Displays all recipes for the user.
     */
    public function displayUserAllRecipes()
    {
        return $this->displayUserAllCurrentRecipes();
    }

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

    /**
     * Creates a new comment.
     */
    private function createCurrentComment()
    {
        $this->commentModel = new \Models\Create();
        $this->validation  = new \Validation\Validate();
        $this->newValidation = $this->validation->validationNewComment(htmlspecialchars($_POST['commentTitle'], ENT_COMPAT), htmlspecialchars($_POST['content'], ENT_COMPAT), htmlspecialchars($_POST['title'], ENT_COMPAT), htmlspecialchars($_POST['username']), htmlspecialchars($_POST['website']));
        $this->comment = $this->commentModel->createComment(htmlspecialchars($_POST['commentTitle'], ENT_COMPAT), htmlspecialchars($_POST['content'], ENT_COMPAT), htmlspecialchars($_POST['rating']), htmlspecialchars($_POST['title'], ENT_COMPAT), htmlspecialchars($_POST['username']));
        exit(header('Location: index.php?p=commentaires-utilisateurs'));
    }

    public function createNewComment()
    {
        return $this->createCurrentComment();
    }

    /**
     * Displays all the comments.
     */
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

    /**
     * Checks if the user has an active admin session.
     * If not, redirects the user to the admin home page.
     */
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

    /**
     * Checks if the user (admin) has a specific username.
     * If it is the case, the user can access the user management page.
     */
    private function sessionSuperAdmin()
    {
        if (($_SESSION['adminUsername'] !== "superAdmin")) {
            exit(header('Location: index.php?p=comptes-utilisateurs'));
        }
    }

    public function sessionOnlySuperAdmin()
    {
        return $this->sessionSuperAdmin();
    }

    /**
     * Creates a new admin account.
     * Performs various validations and creates the account using provided data.
     * Redirects the user to the admin home page.
     */
    private function newAdmin()
    {
        $this->hashedPassword = password_hash(htmlspecialchars($_POST['adminPassword']), PASSWORD_BCRYPT);
        $this->model = new \Models\Create();
        $this->otherCurrentModel = new \Models\Read();
        $this->otherModel = new \Models\Read();
        $this->validation  = new \Validation\Validate();
        $this->otherCurrentAdminPage = $this->otherCurrentModel->readAdminAccountUsernameExistence(htmlspecialchars($_POST['adminUsername']));
        $this->otherAdminPage = $this->otherModel->readAdminAccountEmailExistence(htmlspecialchars($_POST['adminEmail']));
        $this->newValidation = $this->validation->validationNewAdminAccount(htmlspecialchars($_POST['adminUsername']), htmlspecialchars($_POST['adminFirstname']), htmlspecialchars($_POST['adminLastname']), htmlspecialchars($_POST['adminEmail']), htmlspecialchars($_POST['adminPassword']));
        $this->adminPage = $this->model->createNewAdminAccount(htmlspecialchars($_POST['adminUsername']), htmlspecialchars(trim($_POST['adminFirstname'])), htmlspecialchars(trim($_POST['adminLastname'])), htmlspecialchars(trim($_POST['adminEmail'])), $this->hashedPassword);
        exit(header('Location: index.php?p=accueil-admin'));
    }

    public function createNewAdmin()
    {
        return $this->newAdmin();
    }

    /**
     * Reads the current admin account details.
     * Performs validations and retrieves the account information based on provided data.
     * Redirects the user to the admin login page.
     */
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

    /**
     * Displays the home page for the current admin.
     * Sets the necessary view and layout variables for rendering the page.
     */
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

    /**
     * Displays the home page for the current admin.
     * Sets the necessary view and layout variables for rendering the page.
     */
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

    /**
     * Displays all current recipes for the admin.
     * Retrieves the recipes and sets the necessary view and layout variables for rendering the page.
     */
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

    /**
     * Displays a recipe.
     *
     */
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

    /**
     * Recipe created by an user.
     *
     */
    private function createCurrentRecipe()
    {
        $this->recipeModel = new \Models\Create();
        $this->validation  = new \Validation\Validate();
        $this->newValidation = $this->validation->validationNewRecipe(htmlspecialchars($_POST['title'], ENT_COMPAT), htmlspecialchars($_POST['description'], ENT_COMPAT), htmlspecialchars($_POST['prepTime']), htmlspecialchars($_POST['bakeTime']), htmlspecialchars($_POST['totalTime']), htmlspecialchars($_POST['difficulty'], ENT_COMPAT), htmlspecialchars($_POST['cost'], ENT_COMPAT), htmlspecialchars($_POST['ingredients'], ENT_COMPAT), htmlspecialchars($_POST['steps'], ENT_COMPAT), htmlspecialchars($_POST['adminUsername']));
        $this->recipe = $this->recipeModel->addRecipe(htmlspecialchars($_POST['title'], ENT_COMPAT), htmlspecialchars($_POST['description'], ENT_COMPAT), htmlspecialchars($_POST['prepTime']), htmlspecialchars($_POST['bakeTime']), htmlspecialchars($_POST['totalTime']), htmlspecialchars($_POST['difficulty'], ENT_COMPAT), htmlspecialchars($_POST['cost'], ENT_COMPAT), htmlspecialchars($_POST['ingredients'], ENT_COMPAT), htmlspecialchars($_POST['steps'], ENT_COMPAT), htmlspecialchars($_POST['adminUsername']));
        exit(header('Location: index.php?p=gestion-recettes'));
    }

    public function createRecipe()
    {
        return $this->createCurrentRecipe();
    }

    /**
     * Recipe edited by an user.
     */
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

    /**
     * Recipe updated by an user.
     *
     */
    private function updateCurrentRecipe()
    {
        $this->recipeModel = new \Models\Update();
        $this->validation  = new \Validation\Validate();
        $this->newValidation = $this->validation->validationUpdateRecipe(htmlspecialchars($_POST['title'], ENT_COMPAT), htmlspecialchars($_POST['description'], ENT_COMPAT), htmlspecialchars($_POST['prepTime']), htmlspecialchars($_POST['bakeTime']), htmlspecialchars($_POST['totalTime']), htmlspecialchars($_POST['difficulty'], ENT_COMPAT), htmlspecialchars($_POST['cost'], ENT_COMPAT), htmlspecialchars($_POST['ingredients'], ENT_COMPAT), htmlspecialchars($_POST['steps'], ENT_COMPAT), htmlspecialchars($_POST['recipeId']));
        $this->recipe = $this->recipeModel->updateRecipe(htmlspecialchars($_POST['title'], ENT_COMPAT), htmlspecialchars($_POST['description'], ENT_COMPAT), htmlspecialchars($_POST['prepTime']), htmlspecialchars($_POST['bakeTime']), htmlspecialchars($_POST['totalTime']), htmlspecialchars($_POST['difficulty'], ENT_COMPAT), htmlspecialchars($_POST['cost'], ENT_COMPAT), htmlspecialchars($_POST['ingredients'], ENT_COMPAT), htmlspecialchars($_POST['steps'], ENT_COMPAT), htmlspecialchars($_POST['recipeId']));
        exit(header('Location: index.php?p=gestion-recettes'));
    }

    public function updateRecipe()
    {
        return $this->updateCurrentRecipe();
    }

    /**
     * Recipe deleted by an user.
     *
     */
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

    /**
     * Displays all current users.
     *
     */
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

    private function displayAllCurrentUsersSuperAdmin()
    {
        $this->userModel = new \Models\Read();
        $this->users = $this->userModel->getUsers();
        $this->superAdminView = 'views/pages/admin/all_users_superadmin.php';
        $this->titleLayout = '8-Bit Burger | Utilisateurs 👤';
        require_once $this->superAdminMainLayout;
    }

    /**
     * Displays all current users for superadmin.
     */
    public function displayAllUsersSuperAdmin()
    {
        return $this->displayAllCurrentUsersSuperAdmin();
    }

    /**
     * Deletes the current user based on the provided userId.
     *
     */
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
