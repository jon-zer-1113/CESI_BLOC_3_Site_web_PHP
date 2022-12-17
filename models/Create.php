<?php

namespace Models;

class Create extends DbConnection
{
    private $data;
    private $sql;
    private $query;

    // USER CONTENT
    // USER REGISTRATION
    private function newUserAccount($username, $firstname, $lastname, $email, $password)
    {
        try {
        $this->data = [$username, $firstname, $lastname, $email, $password];
        $this->sql = "INSERT INTO user (username, firstname, lastname, email, password) VALUES (?, ?, ?, ?, ?)";
        $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch(\PDOException $e) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function createNewUserAccount($username, $firstname, $lastname, $email, $password)
    {
        $this->newUserAccount($username, $firstname, $lastname, $email, $password);
    } 

    // ADDING A NEW COMMENT 
    private function addNewComment($commentTitle, $content, $rating, $title, $username, $userId, $recipeId)
    {
        try {
            $this->data = [$commentTitle, $content, $rating, $title, $username, $userId, $recipeId];
            $this->sql = "INSERT INTO comment (commentTitle, content, rating, title, username, userId, recipeId) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch (\PDOException $e) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function createComment($commentTitle, $content, $rating, $title, $username, $userId, $recipeId)
    {
        $this->addNewComment($commentTitle, $content, $rating, $title, $username, $userId, $recipeId);
    } 

    // ADMIN CONTENT
    // ADMIN REGISTRATION
    private function newAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        try {
            $this->data = [$adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword];
            $this->sql = "INSERT INTO admin (adminUsername, adminFirstname, adminLastname, adminEmail, adminPassword) VALUES (?, ?, ?, ?, ?)";
            $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch(\PDOException $e) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function createNewAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        $this->newAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword);
    } 

    // ADDING A NEW RECIPE (CRUD)
    private function addNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername)
    {
        try {
            $this->data = [$title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername];
            $this->sql = "INSERT INTO recipe (title, description, prepTime, bakeTime, totalTime, difficulty, cost, ingredients, steps, adminUsername) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch(\PDOException $e) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function addRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername)
    {
        $this->addNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername);
    }
}
