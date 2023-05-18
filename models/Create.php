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
    
     /**
     * Creates a new user account in the database.
     *
     * @param string $username The username of the new user.
     * @param string $firstname The first name of the new user.
     * @param string $lastname The last name of the new user.
     * @param string $email The email address of the new user.
     * @param string $password The password of the new user.
     *
     * @throws \PDOException if a database error occurs during the insertion.
     */
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
    
     /**
     * Adds a new comment to the database.
     *
     * @param string $commentTitle The title of the comment.
     * @param string $content The content of the comment.
     * @param int $rating The rating associated with the comment.
     * @param string $title The title associated with the comment.
     * @param string $username The username of the commenter.
     *
     * @throws \PDOException if a database error occurs during the insertion.
     */
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
    
    /**
    * Creates a new admin account by inserting the admin details into the database.
    *
    * @param string $adminUsername The username of the admin.
    * @param string $adminFirstname The first name of the admin.
    * @param string $adminLastname The last name of the admin.
    * @param string $adminEmail The email of the admin.
    * @param string $adminPassword The password of the admin.
    *
    * @throws \PDOException if a database error occurs during the insertion.
    */
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
    
    /**
    * Adds a new recipe by inserting the recipe details into the database.
    *
    * @param string $title The title of the recipe.
    * @param string $description The description of the recipe.
    * @param int $prepTime The preparation time of the recipe (in minutes).
    * @param int $bakeTime The baking time of the recipe (in minutes).
    * @param int $totalTime The total time required for the recipe (in minutes).
    * @param string $difficulty The difficulty level of the recipe.
    * @param string $cost The cost of the recipe.
    * @param string $ingredients The ingredients used in the recipe.
    * @param string $steps The steps to follow for the recipe.
    * @param string $adminUsername The username of the admin who adds the recipe.
    *
    * @throws \PDOException if a database error occurs during the insertion.
    */
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
