<?php

namespace Models;

class Delete extends DbConnection
{
    private $data;
    private $sql;
    private $query;

    // ADMIN CONTENT
    // DELETE A SPECIFIC RECIPE (CRUD)
    private function deleteCurrentRecipe($recipeId)
    {
        try {
            $this->data = [$recipeId];
            $this->sql = "DELETE FROM recipe WHERE recipeId = ?";
            $this->query = $this->getDbConn()->prepare($this->sql)->execute($this->data);
        } catch(\PDOException $e) {
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
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
    }

    public function deleteUser($userId)
    {
        $this->deleteCurrentUser($userId);
    }
}
