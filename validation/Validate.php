<?php

namespace Validation;

/**
 * Class Validate
 * Handles validation for user registration, user login, comment creation, admin registration,
 * admin login, recipe creation, and recipe update.
 */

class Validate {
    /**
     * Regular expression for username validation.
     *
     * @var string
     */
    private $regExpUsername = "/^[A-Za-z0-9_-]*$/";

    /**
     * Regular expression for password validation.
     *
     * @var string
     */
    private $regExpPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,}$/";

    /**
     * Processes user registration data from a form submission.
     *
     * @param string $username The username entered by the user.
     * @param string $firstname The first name entered by the user.
     * @param string $lastname The last name entered by the user.
     * @param string $email The email address entered by the user.
     * @param string $password The password entered by the user.
     * @param string $url The URL entered by the user.
     */
    private function postUserRegistration($username, $firstname, $lastname, $email, $password, $url)
    {
        $username = $_POST["username"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $url = $_POST["url"];
    }
	
    /**
     * Validates user registration data submitted through a form.
     * @return bool True if the user registration data is valid.
     */
    private function validationUserRegistration($username, $firstname, $lastname, $email, $password, $url)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($username) || empty($firstname) ||empty($lastname) || empty($email) || empty($password)) {
                exit("Un ou plusieurs champs vide(s) ⚠️");
            }
            if (!empty($url)) {
                exit("Tentative de spam ⚠️");
            }
            if (!preg_match($this->regExpUsername, $username) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($this->regExpPassword, $password)) {
                exit("Email et/ou mot de passe invalide(s) ⚠️");
            } else {
                return true;
            }
        }
    }

    /**
     * Validates and processes new user account registration.
     */
    public function validationNewUserAccount($username, $firstname, $lastname, $email, $password, $url)
    {
        $this->postUserRegistration($username, $firstname, $lastname, $email, $password, $url);
        $this->validationUserRegistration($username, $firstname, $lastname, $email, $password, $url);
    } 

    /**
     * Processes user login data from a form submission.
     *
     * @param string $email The email address entered by the user.
     * @param string $password The password entered by the user.
     */
    private function postUserLogin($email, $password) {
		$email = $_POST["email"]; 	
		$password = $_POST["password"];
	}
	
    /**
    * Validates user login data submitted through a form.
    * @return bool True if the user login data is valid; otherwise, exits with an error message.
    */
    private function validationCurrentUserAccount($email, $password) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {	
            if (empty($email) || empty($password)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($this->regExpPassword, $password)) {
                exit("Email et/ou mot de passe invalide(s) ⚠️");
            } else {
				return true;                                                                                                                                                                                                                           
            }
        }
    }
	
     /**
     * Validates and processes user account login.
     */
    public function validationUserAccount($username, $password)
    {
        $this->postUserLogin($username, $password);
        $this->validationCurrentUserAccount($username, $password);
    }

    /**
     * Processes new comment data from a form submission.
     *
     * @param string $commentTitle The title of the comment entered by the user.
     * @param string $content The content of the comment entered by the user.
     * @param string $title The title of the related post.
     * @param string $username The username of the commenter.
     * @param string $website The website URL of the commenter.
     */
    private function postNewComment($commentTitle, $content, $title, $username, $website)
    {
        $commentTitle = $_POST["commentTitle"];
        $content = $_POST["content"];
        $title = $_POST["title"];
        $username = $_POST["username"];
        $website = $_POST["website"];
    }

    /**
     * Processes new comment data from a form submission.
     */
    private function validationCurrentComment($commentTitle, $content, $title, $username, $website)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($commentTitle) || empty($content) || empty($title) || empty($username)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            }
            if (!empty($website)) {
                exit("Tentative de spam ⚠️");
            } else {
                return true;
            }
        }
    }
	
    /**
     * Validates new comment data submitted through a form.
     * @return bool True if the new comment data is valid; otherwise, exits with an error message.
     */
    public function validationNewComment($commentTitle, $content, $title, $username, $website)
    {
        $this->postNewComment($commentTitle, $content, $title, $username, $website);
        $this->validationCurrentComment($commentTitle, $content, $title, $username, $website);
    }

    /**
    * Processes new admin registration data from a form submission.
    *
    * @param string $adminUsername The username entered by the admin.
    * @param string $adminFirstname The first name entered by the admin.
    * @param string $adminLastname The last name entered by the admin.
    * @param string $adminEmail The email entered by the admin.
    * @param string $adminPassword The password entered by the admin.
    */
    private function postAdminRegistration($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        $username = $_POST["adminUsername"];
        $firstname = $_POST["adminFirstname"];
        $lastname = $_POST["adminLastname"];
        $email = $_POST["adminEmail"];
        $password = $_POST["adminPassword"];
    }

    /**
     * Validates new admin registration data submitted through a form.
     * @return bool True if the new admin registration data is valid.
     */
    private function validationAdminRegistration($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($adminUsername) || empty($adminFirstname) || empty($adminLastname) || empty($adminEmail) || empty($adminPassword)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            }
            if (!preg_match($this->regExpUsername, $adminUsername) || !filter_var($adminEmail, FILTER_VALIDATE_EMAIL) || !preg_match($this->regExpPassword, $adminPassword)) {
                exit("Email et/ou mot de passe invalide(s) ⚠️");
            } else {
                return true;
            }
        }
    }

    /**
     * Validates and processes a new admin account registration.
     */
    public function validationNewAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        $this->postAdminRegistration($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword);
        $this->validationAdminRegistration($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword);
    } 

    /**
     * Handles the submission of admin login credentials.
     *
     * @param string $email The email entered by the admin.
     * @param string $password The password entered by the admin.
     */
    private function postAdminLogin($email, $password)
    {
        $email = $_POST["adminEmail"];
        $password = $_POST["adminPassword"];
    }

    /**
     * Validates current admin account data submitted through a form.
     * @return bool True if the current admin account data is valid; otherwise, exits with an error message.
     */
    private function validationCurrentAdminAccount($email, $password)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($email) || empty($password)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($this->regExpPassword, $password)) {
                exit("Email et/ou mot de passe invalide(s) ⚠️");
            } else {
                return true;
            }
        }
    }
	
    /**
     * Validates and processes an admin account login.
     */
     public function validationAdminAccount($username,$password)
     {
	$this->postAdminLogin($username,$password);
	$this->validationCurrentAdminAccount($username,$password);
     } 
    
    /**
     * Processes recipe data from a form submission.
     *
     * @param string $title The title of the recipe.
     * @param string $description The description of the recipe.
     * @param string $prepTime The preparation time of the recipe.
     * @param string $bakeTime The baking time of the recipe.
     * @param string $totalTime The total time required for the recipe.
     * @param string $difficulty The difficulty level of the recipe.
     * @param string $cost The cost of the recipe.
     * @param array $ingredients An array of ingredients for the recipe.
     * @param array $steps An array of steps for preparing the recipe.
     * @param string $adminUsername The username of the admin who posted the recipe.
     */
    private function postRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername) {
	$title = $_POST["title"];
	$description = $_POST["description"]; 	 	
	$prepTime = $_POST["prepTime"]; 	
	$bakeTime = $_POST["bakeTime"];
	$totalTime = $_POST["totalTime"]; 	 	
	$difficulty = $_POST["difficulty"]; 	
	$cost = $_POST["cost"];
        $ingredients = $_POST["ingredients"];
        $steps = $_POST["steps"];
        $adminUsername = $_POST["adminUsername"];
        $blog = $_POST["blog"];	
	}
	
       /**
       * Validates recipe data submitted through a form.
       * @return bool True if the recipe data is valid.
       */
	private function validationRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {	
            if (empty($title) || empty($description) || empty($prepTime) || empty($bakeTime) || empty($totalTime) || empty($difficulty) || empty($cost) || empty($ingredients) || empty($steps) || empty($adminUsername)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            } else {
				return true;
            }
        }
    }

    /**
     * Validates and processes a new recipe.
     *
     */
    public function validationNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername) {
        $this->postRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername);
        $this->validationRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername);
    }
	
    /**
     * Processes updated recipe data from a form submission.
     *
     * @param string $title The updated title of the recipe.
     * @param string $description The updated description of the recipe.
     * @param string $prepTime The updated preparation time of the recipe.
     * @param string $bakeTime The updated baking time of the recipe.
     * @param string $totalTime The updated total time required for the recipe.
     * @param string $difficulty The updated difficulty level of the recipe.
     * @param string $cost The updated cost of the recipe.
     * @param array $ingredients The updated array of ingredients for the recipe.
     * @param array $steps The updated array of steps for preparing the recipe.
     * @param int $recipeId The ID of the recipe being updated.
     */
    private function postUpdateRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $prepTime = $_POST["prepTime"];
        $bakeTime = $_POST["bakeTime"];
        $totalTime = $_POST["totalTime"];
        $difficulty = $_POST["difficulty"];
        $cost = $_POST["cost"];
        $ingredients = $_POST["ingredients"];
        $steps = $_POST["steps"];
        $recipeId = $_POST["recipeId"];
    }
	
    /**
     * Validates updated recipe data submitted through a form.
     * @return bool True if the updated recipe data is valid.
     */
    private function validationUpdateCurrentRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($title) || empty($description) || empty($prepTime) || empty($bakeTime) || empty($totalTime) || empty($difficulty) || empty($cost) || empty($ingredients) || empty($steps)|| empty($recipeId)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            } else {
                return true;
            }
        }
    }
	
    /**
     * Validates and processes an updated recipe.
     */
    public function validationUpdateRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        $this->postUpdateRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps , $recipeId);
        $this->validationUpdateCurrentRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId);
    }
}
