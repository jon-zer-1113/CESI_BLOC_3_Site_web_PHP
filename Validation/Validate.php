<?php

namespace Validation;

class Validate {
    private $regExpUsername = "/^[A-Za-z0-9_-]*$/";
	private $regExpPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,}$/";
    private $regExpNameTitle = "/^[a-zA-Z\s]*$/";
	private $regExpPrice = "/^[+]?\d+([.]\d+)?$/";
	private $regExpImage = "/[^\\s]+(.*?)\\.(jpg|jpeg)$/";
	private $regExpPositiveNumbers = "/^[1-9]\d*$/";

    // USER CONTENT
    // Registration validation
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

    private function postUserLogin($email, $password) {
		$email = $_POST["email"]; 	
		$password = $_POST["password"];
	}

    // Login validation
	private function validationCurrentUserAccount($email, $password) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {	
            if (empty($email) || empty($password)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($this->regExpPassword,$password)) {
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

    // ADMIN CONTENT
    // Registration validation
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

    // Login validation
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
    private function postRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps) {
		$title = $_POST["title"];
		$description = $_POST["description"]; 	 	
		$prepTime = $_POST["prepTime"]; 	
		$bakeTime = $_POST["bakeTime"];
		$totalTime = $_POST["totalTime"]; 	 	
		$difficulty = $_POST["difficulty"]; 	
		$cost = $_POST["cost"];
        $ingredients = $_POST["ingredients"];
        $steps= $_POST["steps"]; 	
	}

	private function validationRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {	
            if (empty($title) || empty($description) || empty($prepTime) || empty($bakeTime) || empty($totalTime) || empty($difficulty) || empty($cost) || empty($ingredients) || empty($steps)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            } else {
				return true;
            }
        }
    }

    public function validationNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps) {
        $this->postRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps);
        $this->validationRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps);
    }

    // Update recipe validation
    private function postUpdateRecipe($recipeId, $title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps)
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
    private function validationUpdateCurrentRecipe($recipeId, $title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($recipeId) || empty($title) || empty($description) || empty($prepTime) || empty($bakeTime) || empty($totalTime) || empty($difficulty) || empty($cost) || empty($ingredients) || empty($steps)) {
                exit("Un ou plusieurs champ(s) vide(s) ⚠️");
            } else {
                return true;
            }
        }
    }

    public function validationUpdateRecipe($recipeId, $title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps)
    {
        $this->postUpdateRecipe($recipeId, $title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps);
        $this->validationUpdateCurrentRecipe($recipeId, $title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps);
    }
}
