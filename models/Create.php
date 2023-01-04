<?php

namespace Models;

class Create extends DbConnection
{
    private $data;
    private $sql;
    private $query;
    private $timeZone;
    private $errDate;
    private $errLog;

    // USER CONTENT
    // USER REGISTRATION
    private function newUserAccount($username, $firstname, $lastname, $email, $password)
    {
        try {
        $this->data = [$username, $firstname, $lastname, $email, $password];
        $this->sql = "INSERT INTO user (username, firstname, lastname, email, password) VALUES (?, ?, ?, ?, ?)";
        $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch(\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/create/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function createNewUserAccount($username, $firstname, $lastname, $email, $password)
    {
        $this->newUserAccount($username, $firstname, $lastname, $email, $password);
    } 

    // ADDING A NEW COMMENT 
    private function addNewComment($commentTitle, $content, $rating, $title, $username)
    {
        try {
            $this->data = [$commentTitle, $content, $rating, $title, $username];
            $this->sql = "INSERT INTO comment (commentTitle, content, rating, title, username) VALUES (?, ?, ?, ?, ?)";
            $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/create/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function createComment($commentTitle, $content, $rating, $title, $username)
    {
        $this->addNewComment($commentTitle, $content, $rating, $title, $username);
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
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/create/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
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
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/create/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function addRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername)
    {
        $this->addNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername);
    }
}
