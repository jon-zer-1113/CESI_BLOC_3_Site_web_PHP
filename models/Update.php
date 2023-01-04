<?php

namespace Models;

class Update extends DbConnection
{
    private $data;
    private $sql;
    private $query;
    private $timeZone;
    private $errDate;
    private $errLog;

    // ADMIN CONTENT
    // UPDATE A SPECIFIC RECIPE (CRUD)
    private function updateCurrentRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        try {
            $this->data = [$title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId];
            $this->sql = "UPDATE recipe SET title = ?, description = ?, prepTime = ?, bakeTime = ?, totalTime = ?, difficulty = ?, cost = ?, ingredients = ?, steps = ? WHERE recipeId = ?";
            $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch(\PDOException $e) {
            $this->timeZone = date_default_timezone_set('Europe/Paris');
            $this->errDate = date('d-m-Y 📅 H:i:s ⏰');
            $this->errLog = file_put_contents('logs/update/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function updateRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        return $this->updateCurrentRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId);
    }
}
