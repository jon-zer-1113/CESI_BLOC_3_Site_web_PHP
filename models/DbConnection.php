<?php

namespace Models;

class DbConnection
{
	private $dbConn;
	private $host = "8bit-burger.fr";
	private $port = "3306";
	private $dbname = "eight_bit_burger";
	private $charset = "utf8mb4";
	private $username = "root";
	private $password = "";
	
	// DATABASE CONNECTION USING PDO
	private function setDbConn()
	{
		try {
			$this->dbConn = new \PDO('mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname . ';charset=' . $this->charset . ';', $this->username, $this->password);
			$this->dbConn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch(\PDOException $err) {
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $err->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
	}

	public function getDbConn()
	{
		if ($this->dbConn == null) {
			$this->setDbConn();
		}
		return $this->dbConn;
	}
}

