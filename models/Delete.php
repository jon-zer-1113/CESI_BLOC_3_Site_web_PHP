<?php

namespace Models;

class Delete extends DbConnection
{
    private $sql;
    private $query;

    // ADMIN CONTENT
    // DELETE A SPECIFIC RECIPE (CRUD)
    private function deleteCurrentRecipe($recipeId)
    {
        try {
            $this->sql = "DELETE FROM recipe WHERE recipeId = ?";
            $this->query = $this->getDbConn()->prepare($this->sql);
            $this->query->bindValue(1, $recipeId, \PDO::PARAM_INT);
            $this->query->execute();
        } catch(\PDOException $err) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $err->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function deleteRecipe($recipeId)
    {
        $this->deleteCurrentRecipe($recipeId);
    } 
}
