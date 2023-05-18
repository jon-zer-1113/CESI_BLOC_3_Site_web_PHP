<?php

namespace Models;

class Read extends DbConnection
{
    private$data;
    private $sql;
    private $stmt;
    private $result;
    private $timeZone;
    private $errDate;
    private $errLog;
    
    /**
    * Reads the user account from the database using the specified email and password.
    *
    * @param string $email The email of the user.
    * @param string $password The password of the user.
    * @throws \PDOException If an error occurs while executing the database query.
    */
    private function readUserAccount($email, $password)
    {
        try {
            $this->sql = "SELECT * FROM user WHERE email = ?";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $email);
            $this->stmt->execute();
            $this->result = $this->stmt->fetch();
            if (!$this->result || !password_verify($password, $this->result['password'])) {
                exit("Informations de connexion invalides ⚠️");
            } else {
                session_start();
                $_SESSION['userId'] = $this->result['userId'];
                $_SESSION['username'] = $this->result['username'];
                $_SESSION['email'] = $this->result['email'];
                $_SESSION['firstname'] = $this->result['firstname'];
                $_SESSION['lastname'] = $this->result['lastname'];
            }
        } catch(\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function readCurrentUserAccount($email, $password)
    {
        return $this->readUserAccount($email, $password);
    }
    
    /**
    * Checks if a user account with the specified email already exists in the database.
    *
    * @param string $email The email to check.
    * @throws \PDOException If an error occurs while executing the database query.
    */
    private function readUserAccountEmailCurrentExistence($email)
    {
        try {
            $this->sql = "SELECT * FROM user WHERE email = ?";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $email);
            $this->stmt->execute();
            $this->result = $this->stmt->fetch();
            if ($this->result) {
                exit("Ce compte existe déjà ⚠️");
            }
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function readUserAccountEmailExistence($email)
    {
        return $this->readUserAccountEmailCurrentExistence($email);
    }
    
   /**
    * Checks if a user account with the specified email already exists in the database.
    *
    * @param string $email The email to check.
    * @throws \PDOException If an error occurs while executing the database query.
    */
    private function readUserAccountUsernameCurrentExistence($username)
    {
        try {
            $this->sql = "SELECT * FROM user WHERE username = ?";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $username);
            $this->stmt->execute();
            $this->result = $this->stmt->fetch();
            if ($this->result) {
                exit("Ce compte existe déjà ⚠️");
            }
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function readUserAccountUsernameExistence($username)
    {
        return $this->readUserAccountUsernameCurrentExistence($username);
    }

    /**
    * Retrieves the current comments from the database.
    *
    * @return array An array containing the fetched comments.
    * @throws \PDOException If an error occurs while executing the database query.
    */
    private function getCurrentComments()
    {
        try {
            $this->sql = "SELECT commentTitle, content, rating, title, username, creationDate FROM comment";
            $this->stmt = $this->getDbConn($this->sql)->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function getComments()
    {
        return $this->getCurrentComments();
    }
    
     /**
     * Retrieves the admin account information from the database based on the provided email and password.
     *
     * @param string $adminEmail The email of the admin.
     * @param string $adminPassword The password of the admin.
     * @throws \PDOException If an error occurs while executing the database query.
     */
    private function readAdminAccount($adminEmail, $adminPassword)
    {
        try {
            $this->sql = "SELECT * FROM admin WHERE adminEmail = ?";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $adminEmail);
            $this->stmt->execute();
            $this->result = $this->stmt->fetch();
            if (!$this->result || !password_verify($adminPassword, $this->result['adminPassword'])) {
                exit("Informations de connexion invalides ⚠️");
            } else {
                session_start();
                $_SESSION['adminId'] = $this->result['adminId'];
                $_SESSION['adminUsername'] = $this->result['adminUsername'];
                $_SESSION['adminEmail'] = $this->result['adminEmail'];
                $_SESSION['adminFirstname'] = $this->result['adminFirstname'];
                $_SESSION['adminLastname'] = $this->result['adminLastname'];
            }
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function readCurrentAdminAccount($adminEmail, $adminPassword)
    {
        return $this->readAdminAccount($adminEmail, $adminPassword);
    }
    
    /**
    * Reads the existence of the admin account email currently.
    *
    * @param string $adminEmail The email address of the admin account.
    */
    private function readAdminAccountEmailCurrentExistence($adminEmail)
    {
        try {
            $this->sql = "SELECT * FROM admin WHERE adminEmail = ?";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $adminEmail);
            $this->stmt->execute();
            $this->result = $this->stmt->fetch();
            if ($this->result) {
                exit("Ce compte existe déjà ⚠️");
            }
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function readAdminAccountEmailExistence($adminEmail)
    {
        return $this->readAdminAccountEmailCurrentExistence($adminEmail);
    }
    
    /**
    * Checks the current existence of an admin account by username.
    *
    * @param string $adminUsername The username of the admin account.
    * @return void
    */
    private function readAdminAccountUsernameCurrentExistence($adminUsername)
    {
        try {
            $this->sql = "SELECT * FROM admin WHERE adminUsername = ?";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $adminUsername);
            $this->stmt->execute();
            $this->result = $this->stmt->fetch();
            if ($this->result) {
                exit("Ce compte existe déjà ⚠️");
            }
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function readAdminAccountUsernameExistence($adminUsername)
    {
        return $this->readAdminAccountUsernameCurrentExistence($adminUsername);
    }
    
    /**
    * Retrieves the current recipes from the database.
    *
    * @return array An array containing the recipeId, title, adminUsername, and creationDate of each recipe.
    */
    private function getCurrentRecipes()
    {
        try {
            $this->sql = "SELECT recipeId, title, adminUsername, creationDate FROM recipe";
            $this->stmt = $this->getDbConn($this->sql)->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function getRecipes()
    {
        return $this->getCurrentRecipes();
    }
    
    /**
    * Retrieves the details of a specific recipe from the database.
    *
    * @param int $recipeId The ID of the recipe to retrieve.
    * @return array|false An array containing the recipeId, title, description, prepTime, bakeTime, totalTime, difficulty, cost, ingredients, steps, adminUsername, and creationDate of the recipe. Returns false if the recipe does not exist.
    */
    private function getCurrentRecipe($recipeId)
    {
        try {
            $this->sql = "SELECT recipeId, title, description, prepTime, bakeTime, totalTime, difficulty, cost, ingredients, steps, adminUsername, creationDate FROM recipe WHERE recipeId = ?";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $recipeId, \PDO::PARAM_INT);
            $this->stmt->execute();
            return $this->stmt->fetch();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function getRecipe($recipeId)
    {
        return $this->getCurrentRecipe($recipeId);
    }
    
    /**
    * Retrieves the current list of users from the database.
    *
    * @return array An array containing the userId, username, firstname, lastname, and email of each user.
    */
    private function getCurrentUsers()
    {
        try {
            $this->sql = "SELECT userId, username, firstname, lastname, email FROM user";
            $this->stmt = $this->getDbConn($this->sql)->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function getUsers()
    {
        return $this->getCurrentUsers();
    }
}
