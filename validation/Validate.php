<?php

namespace Validation;

class Validate {
    private $regExpUsername = "/^[A-Za-z0-9_-]*$/"; // only letters, numbers, hyphens and underscores allowed
	private $regExpPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,}$/"; // minimum eight characters (one uppercase letter, one lowercase letter, on digit and one special character)

    // USER CONTENT
    // Registration validation form
    private function postUserRegistration($username, $firstname, $lastname, $email, $password)
    {
        $username = $_POST["username"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    }

    private function validationUserRegistration($username, $firstname, $lastname, $email, $password)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($username) || empty($firstname) ||empty($lastname) || empty($email) || empty($password)) {
                exit("Un ou plusieurs champs vide(s) ⚠️");
            }
            if (!preg_match($this->regExpUsername, $username) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($this->regExpPassword, $password)) {
                exit("Email et/ou mot de passe invalide(s) ⚠️");
            } else {
                return true;
            }
        }
    }

    public function validationNewUserAccount($username, $firstname, $lastname, $email, $password)
    {
        $this->postUserRegistration($username, $firstname, $lastname, $email, $password);
        $this->validationUserRegistration($username, $firstname, $lastname, $email, $password);
    } 

    // login validation form
    private function postUserLogin($email, $password) {
		$email = $_POST["email"]; 	
		$password = $_POST["password"];
	}

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

    public function validationUserAccount($username, $password)
    {
        $this->postUserLogin($username, $password);
        $this->validationCurrentUserAccount($username, $password);
    }

    // New comment validation form
    private function postNewComment($commentTitle, $content, $title, $username)
    {
        $commentTitle = $_POST["commentTitle"];
        $content = $_POST["content"];
        $title = $_POST["title"];
        $username = $_POST["username"];
    }

    private function validationCurrentComment($commentTitle, $content, $title, $username)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($commentTitle) || empty($content) || empty($title) || empty($username)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            } else {
                return true;
            }
        }
    }

    public function validationNewComment($commentTitle, $content, $title, $username)
    {
        $this->postNewComment($commentTitle, $content, $title, $username);
        $this->validationCurrentComment($commentTitle, $content, $title, $username);
    }

    // ADMIN CONTENT
    // Registration validation form
    private function postAdminRegistration($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        $username = $_POST["adminUsername"];
        $firstname = $_POST["adminFirstname"];
        $lastname = $_POST["adminLastname"];
        $email = $_POST["adminEmail"];
        $password = $_POST["adminPassword"];
    }

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

    public function validationNewAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        $this->postAdminRegistration($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword);
        $this->validationAdminRegistration($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword);
    } 

    // Login validation form
    private function postAdminLogin($email, $password)
    {
        $email = $_POST["adminEmail"];
        $password = $_POST["adminPassword"];
    }

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

	public function validationAdminAccount($username,$password)
	{
		$this->postAdminLogin($username,$password);
		$this->validationCurrentAdminAccount($username,$password);
	} 
    
    // Update recipe validation
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
	}

	private function validationRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {	
            if (empty($title) || empty($description) || empty($prepTime) || empty($bakeTime) || empty($totalTime) || empty($difficulty) || empty($cost) || empty($ingredients) || empty($steps) || empty($adminUsername)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            } else {
				return true;
            }
        }
    }

    public function validationNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername) {
        $this->postRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername);
        $this->validationRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername);
    }

    // Update recipe validation
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

    // Login validation
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

    public function validationUpdateRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        $this->postUpdateRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps , $recipeId);
        $this->validationUpdateCurrentRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId);
    }
}
