<?php

namespace Models;

class Create extends DbConnection
{
    private $sql;
    private $query;

    // USER CONTENT
    // USER REGISTRATION
    private function newUserAccount($username, $firstname, $lastname, $email, $password)
    {
        try {
        $this->sql = "INSERT INTO user (username, firstname, lastname, email, password) VALUES (?, ?, ?, ?, ?)";
        $this->query = $this->getDbConn()->prepare($this->sql);
        $this->query->bindValue(1, $username);
        $this->query->bindValue(2, $firstname);
        $this->query->bindValue(3, $lastname);
        $this->query->bindValue(4, $email);
        $this->query->bindValue(5, $password);
        $this->query->execute();
        } catch(\PDOException $err) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $err->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function createNewUserAccount($username, $firstname, $lastname, $email, $password)
    {
        $this->newUserAccount($username, $firstname, $lastname, $email, $password);
    } 

    // ADMIN CONTENT
    // ADMIN REGISTRATION
    private function newAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        try {
            $this->sql = "INSERT INTO admin (adminUsername, adminFirstname, adminLastname, adminEmail, adminPassword) VALUES (?, ?, ?, ?, ?)";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->bindValue(1, $adminUsername);
            $this->query->bindValue(2, $adminFirstname);
            $this->query->bindValue(3, $adminLastname);
            $this->query->bindValue(4, $adminEmail);
            $this->query->bindValue(5, $adminPassword);
            $this->query->execute();
        } catch(\PDOException $err) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $err->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function createNewAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        $this->newAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword);
    } 

    // ADDING A NEW RECIPE (CRUD)
    private function addNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps)
    {
        try {
            $this->sql = "INSERT INTO recipe (title, description, prepTime, bakeTime, totalTime, difficulty, cost, ingredients, steps) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->bindValue(1, $title);
            $this->query->bindValue(2, $description);
            $this->query->bindValue(3, $prepTime, \PDO::PARAM_INT);
            $this->query->bindValue(4, $bakeTime, \PDO::PARAM_INT);
            $this->query->bindValue(5, $totalTime, \PDO::PARAM_INT);
            $this->query->bindValue(6, $difficulty);
            $this->query->bindValue(7, $cost);
            $this->query->bindValue(8, $ingredients);
            $this->query->bindValue(9, $steps);
            $this->query->execute();
        } catch(\PDOException $err) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $err->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function addRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps)
    {
        $this->addNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps);
    } 
}
