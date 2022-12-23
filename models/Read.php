<?php

namespace Models;

class Read extends DbConnection
{
    private$data;
    private $sql;
    private $query;
    private $result;
    
    // USER CONTENT
    // LOGIN IN
    private function readUserAccount($email, $password)
    {
        try {
            $this->data = [$email];
            $this->sql = "SELECT userId, username, password FROM user WHERE email = ?";
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
            }
        } catch(\PDOException $e) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    // DISPLAY A SPECIFIC COMMENT
    private function getCurrentComments()
    {
        try {
            $this->sql = "SELECT commentTitle, content, rating, title, username, creationDate FROM comment";
            $this->query = $this->getDbConn($this->sql)->prepare($this->sql);
            $this->query->execute();
            return $this->query->fetchAll();
        } catch (\PDOException $err) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $err->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function getComments()
    {
        return $this->getCurrentComments();
    }

    public function readCurrentUserAccount($email, $password)
    {
        return $this->readUserAccount($email, $password);
    }

    // ADMIN CONTENT
    // LOGIN IN
    private function readAdminAccount($adminEmail, $adminPassword)
    {
        try {
            $this->data = [$adminEmail];
            $this->sql = "SELECT adminId, adminUsername, adminPassword FROM admin WHERE adminEmail = ?";
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
            }
        } catch (\PDOException $e) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function readCurrentAdminAccount($adminEmail, $adminPassword)
    {
        return $this->readAdminAccount($adminEmail, $adminPassword);
    }


    // USER + ADMIN CONTENT
    // ALL THE RECIPES (CRUD)
    private function getCurrentRecipes()
    {
        try {
            $this->sql = "SELECT recipeId, title, description, prepTime, bakeTime, totalTime, difficulty, cost, ingredients, steps, adminUsername, creationDate FROM recipe";
            $this->query = $this->getDbConn($this->sql)->prepare($this->sql);
            $this->query->execute();
            return $this->query->fetchAll();
        } catch (\PDOException $err) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $err->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
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
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function getUsers()
    {
        return $this->getCurrentUsers();
    }
}
