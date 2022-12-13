<?php

namespace Models;

class Update extends DbConnection
{
    private $sql;
    private $query;

    // ADMIN CONTENT
    // UPDATE A SPECIFIC RECIPE (CRUD)
    public function updateCurrentRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        try {
            $this->sql = "UPDATE recipe SET title = ?, description = ?, prepTime = ?, bakeTime = ?, totalTime = ?, difficulty = ?, cost = ?, ingredients = ?, steps = ? WHERE recipeId = ?";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->bindValue(1, $title);
            $this->query->bindValue(2, $description);
            $this->query->bindValue(3, $prepTime, \PDO::PARAM_INT);
            $this->query->bindValue(4, $bakeTime, \PDO::PARAM_INT);
            $this->query->bindValue(5, $totalTime, \PDO::PARAM_INT);
            $this->query->bindValue(6, $difficulty);
            $this->query->bindValue(7, $cost);
            $this->query->bindValue(8, $ingredients);
            $this->query->bindValue(9, $steps);
            $this->query->bindValue(10, $recipeId, \PDO::PARAM_INT);
            $this->query->execute();
        } catch(\PDOException $err) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $err->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function updateRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId)
    {
        return $this->updateCurrentRecipe($title, $description, $prepTime, $bakeTime, $totalTime, $difficulty, $cost, $ingredients, $steps, $recipeId);
    }
}
