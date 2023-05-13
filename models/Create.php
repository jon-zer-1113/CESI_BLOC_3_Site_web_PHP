<?php

namespace Models;

class Create extends DbConnection
{
    private $data;
    private $sql;
    private $stmt;
    private $timeZone;
    private $errDate;
    private $errLog;

    private function newUserAccount($username, $firstname, $lastname, $email, $password)
    {
        try {
            $this->sql = "INSERT INTO user (username, firstname, lastname, email, password) VALUES (?, ?, ?, ?, ?)";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $username);
            $this->stmt->bindValue(2, $firstname);
            $this->stmt->bindValue(3, $lastname);
            $this->stmt->bindValue(4, $email);
            $this->stmt->bindValue(5, $password);
            $this->stmt->execute();
        } catch(\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/create/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function createNewUserAccount($username, $firstname, $lastname, $email, $password)
    {
        $this->newUserAccount($username, $firstname, $lastname, $email, $password);
    } 

    private function addNewComment($commentTitle, $content, $rating, $title, $username)
    {
        try {
            $this->sql = "INSERT INTO comment (commentTitle, content, rating, title, username) VALUES (?, ?, ?, ?, ?)";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $commentTitle);
            $this->stmt->bindValue(2, $content);
            $this->stmt->bindValue(3, $rating);
            $this->stmt->bindValue(4, $title);
            $this->stmt->bindValue(5, $username);
            $this->stmt->execute();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/create/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function createComment($commentTitle, $content, $rating, $title, $username)
    {
        $this->addNewComment($commentTitle, $content, $rating, $title, $username);
    } 

    private function newAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        try {
            $this->sql = "INSERT INTO admin (adminUsername, adminFirstname, adminLastname, adminEmail, adminPassword) VALUES (?, ?, ?, ?, ?)";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $adminUsername);
            $this->stmt->bindValue(2, $adminFirstname);
            $this->stmt->bindValue(3, $adminLastname);
            $this->stmt->bindValue(4, $adminEmail);
            $this->stmt->bindValue(5, $adminPassword);
            $this->stmt->execute();
        } catch(\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/create/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function createNewAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword)
    {
        $this->newAdminAccount($adminUsername, $adminFirstname, $adminLastname, $adminEmail, $adminPassword);
    } 

    private function addNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername)
    {
        try {
            $this->sql = "INSERT INTO recipe (title, description, prepTime, bakeTime, totalTime, difficulty, cost, ingredients, steps, adminUsername) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $title);
            $this->stmt->bindValue(2, $description);
            $this->stmt->bindValue(3, $prepTime, \PDO::PARAM_INT);
            $this->stmt->bindValue(4, $bakeTime, \PDO::PARAM_INT);
            $this->stmt->bindValue(5, $totalTime, \PDO::PARAM_INT);
            $this->stmt->bindValue(6, $difficulty);
            $this->stmt->bindValue(7, $cost);
            $this->stmt->bindValue(8, $ingredients);
            $this->stmt->bindValue(9, $steps);
            $this->stmt->bindValue(10, $adminUsername);
            $this->stmt->execute();
        } catch(\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/create/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function addRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername)
    {
        $this->addNewRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $adminUsername);
    }
}
