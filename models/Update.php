<?php

namespace Models;

class Update extends DbConnection
{
    private $data;
    private $sql;
    private $stmt;
    private $timeZone;
    private $errDate;
    private $errLog;

    private function updateCurrentRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        try {
            $this->sql = "UPDATE recipe SET title = ?, description = ?, prepTime = ?, bakeTime = ?, totalTime = ?, difficulty = ?, cost = ?, ingredients = ?, steps = ? WHERE recipeId = ?";
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
            $this->stmt->bindValue(10, $recipeId, \PDO::PARAM_INT);
            $this->stmt->execute();
        } catch(\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/update/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Something went wrong ⚠️! Please read the following message ! ➡️ " . $e->getMessage() . " ⛔");
        }
    }

    public function updateRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        return $this->updateCurrentRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId);
    }
}
