<?php

namespace Models;

class Read extends DbConnection
{
    private$data;
    private $sql;
    private $query;
    private $result;
    private $timeZone;
    private $errDate;
    private $errLog;
    
    // USER CONTENT
    // LOGIN IN
    private function readUserAccount($email, $password)
    {
        try {
            $this->data = [$email];
            $this->sql = "SELECT * FROM user WHERE email = ?";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->execute($this->data);
            $this->result = $this->query->fetch();
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
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function readCurrentUserAccount($email, $password)
    {
        return $this->readUserAccount($email, $password);
    }

    // CHECK IF USER EMAIL ALREADY EXISTS
    private function readUserAccountEmailCurrentExistence($email)
    {
        try {
            $this->data = [$email];
            $this->sql = "SELECT * FROM user WHERE email = ?";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->execute($this->data);
            $this->result = $this->query->fetch();
            if ($this->result) {
                exit("Ce compte existe déjà ⚠️");
            }
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function readUserAccountEmailExistence($email)
    {
        return $this->readUserAccountEmailCurrentExistence($email);
    }

    // CHECK IF USER USERNAME ALREADY EXISTS
    private function readUserAccountUsernameCurrentExistence($username)
    {
        try {
            $this->data = [$username];
            $this->sql = "SELECT * FROM user WHERE username = ?";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->execute($this->data);
            $this->result = $this->query->fetch();
            if ($this->result) {
                exit("Ce compte existe déjà ⚠️");
            }
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function readUserAccountUsernameExistence($username)
    {
        return $this->readUserAccountUsernameCurrentExistence($username);
    }

    // DISPLAY A SPECIFIC COMMENT
    private function getCurrentComments()
    {
        try {
            $this->sql = "SELECT commentTitle, content, rating, title, username, creationDate FROM comment";
            $this->query = $this->getDbConn($this->sql)->prepare($this->sql);
            $this->query->execute();
            return $this->query->fetchAll();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function getComments()
    {
        return $this->getCurrentComments();
    }

    // ADMIN CONTENT
    // LOGIN IN
    private function readAdminAccount($adminEmail, $adminPassword)
    {
        try {
            $this->data = [$adminEmail];
            $this->sql = "SELECT * FROM admin WHERE adminEmail = ?";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->execute($this->data);
            $this->result = $this->query->fetch();
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
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function readCurrentAdminAccount($adminEmail, $adminPassword)
    {
        return $this->readAdminAccount($adminEmail, $adminPassword);
    }

    // CHECK IF ADMIN EMAIL ALREADY EXISTS
    private function readAdminAccountEmailCurrentExistence($adminEmail)
    {
        try {
            $this->data = [$adminEmail];
            $this->sql = "SELECT * FROM admin WHERE adminEmail = ?";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->execute($this->data);
            $this->result = $this->query->fetch();
            if ($this->result) {
                exit("Ce compte existe déjà ⚠️");
            }
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function readAdminAccountEmailExistence($adminEmail)
    {
        return $this->readAdminAccountEmailCurrentExistence($adminEmail);
    }

    // CHECK IF USER ADMIN USERNAME ALREADY EXISTS
    private function readAdminAccountUsernameCurrentExistence($adminUsername)
    {
        try {
            $this->data = [$adminUsername];
            $this->sql = "SELECT * FROM admin WHERE adminUsername = ?";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->execute($this->data);
            $this->result = $this->query->fetch();
            if ($this->result) {
                exit("Ce compte existe déjà ⚠️");
            }
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function readAdminAccountUsernameExistence($adminUsername)
    {
        return $this->readAdminAccountUsernameCurrentExistence($adminUsername);
    }

    // USER + ADMIN CONTENT
    // ALL THE RECIPES (CRUD)
    private function getCurrentRecipes()
    {
        try {
            $this->sql = "SELECT recipeId, title, adminUsername, creationDate FROM recipe";
            $this->query = $this->getDbConn($this->sql)->prepare($this->sql);
            $this->query->execute();
            return $this->query->fetchAll();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function getRecipes()
    {
        return $this->getCurrentRecipes();
    }

    // DISPLAY A SPECIFIC RECIPE (CRUD)
    private function getCurrentRecipe($recipeId)
    {
        try {
            $this->data = [$recipeId];
            $this->sql = "SELECT recipeId, title, description, prepTime, bakeTime, totalTime, difficulty, cost, ingredients, steps, adminUsername, creationDate FROM recipe WHERE recipeId = ?";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->execute($this->data);
            return $this->query->fetch();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function getRecipe($recipeId)
    {
        return $this->getCurrentRecipe($recipeId);
    }

    // DISPLAY ALL THE USERS (SUPER ADMIN ONLY)
    private function getCurrentUsers()
    {
        try {
            $this->sql = "SELECT userId, username, firstname, lastname, email FROM user";
            $this->query = $this->getDbConn($this->sql)->prepare($this->sql);
            $this->query->execute();
            return $this->query->fetchAll();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/read/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function getUsers()
    {
        return $this->getCurrentUsers();
    }
}
