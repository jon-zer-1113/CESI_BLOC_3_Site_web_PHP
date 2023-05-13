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
