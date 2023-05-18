<?php

namespace Models;

class Delete extends DbConnection
{
    private $sql;
    private $stmt;
    private $timeZone;
    private $errDate;
    private $errLog;
    
     /**
     * Deletes the recipe with the specified recipeId from the database.
     *
     * @param int $recipeId The ID of the recipe to delete.
     *
     * @throws \PDOException if a database error occurs during the deletion.
     */
    private function deleteCurrentRecipe($recipeId)
    {
        try {
            $this->sql = "DELETE FROM recipe WHERE recipeId = ?";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $recipeId, \PDO::PARAM_INT);
            $this->stmt->execute();
        } catch(\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/delete/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function deleteRecipe($recipeId)
    {
        $this->deleteCurrentRecipe($recipeId);
    }
    
     /**
     * Deletes the user with the specified userId from the database.
     *
     * @param int $userId The ID of the user to delete.
     *
     * @throws \PDOException if a database error occurs during the deletion.
     */
    private function deleteCurrentUser($userId)
    {
        try {
            $this->sql = "DELETE FROM user WHERE userId = ?";
            $this->stmt = $this->getDbConn()->prepare($this->sql);
            $this->stmt->bindValue(1, $userId, \PDO::PARAM_INT);
            $this->stmt->execute();
        } catch (\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/delete/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function deleteUser($userId)
    {
        $this->deleteCurrentUser($userId);
    }
}
