<?php

namespace Models;

class Delete extends DbConnection
{
    private $data;
    private $sql;
    private $query;
    private $timeZone;
    private $errDate;
    private $errLog;

    // ADMIN CONTENT
    // DELETE A SPECIFIC RECIPE (CRUD)
    private function deleteCurrentRecipe($recipeId)
    {
        try {
            $this->data = [$recipeId];
            $this->sql = "DELETE FROM recipe WHERE recipeId = ?";
            $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch(\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/delete/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function deleteRecipe($recipeId)
    {
        $this->deleteCurrentRecipe($recipeId);
    }

    // DELETE A SPECIFIC USER
    private function deleteCurrentUser($userId)
    {
        try {
            $this->data = [$userId];
            $this->sql = "DELETE FROM user WHERE userId = ?";
            $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/delete/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function deleteUser($userId)
    {
        $this->deleteCurrentUser($userId);
    }
}
