<?php

namespace Models;

class DbConnection
{
	private $dbConn;
	private $host = "8bit-burger.fr";
	private $port = "3307";
	private $dbname = "eight_bit_burger";
	private $charset = "utf8mb4";
	private $username = "root";
	private $password = "XXXXXXXXXX";
	private $timeZone;
	private $errDate;
	private $errLog;
	
	/**
	 * Sets up the database connection using PDO.
	 *
	 * @throws \PDOException if a database connection error occurs.
	 */
	private function setDbConn()
	{
		try {
			$this->dbConn = new \PDO('mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname . ';charset=' . $this->charset . ';', $this->username, $this->password);
			$this->dbConn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch(\PDOException $e) {
			$this->timeZone = date_default_timezone_set('Europe/Paris');
			$this->errDate = date('d-m-Y 📅 H:i:s ⏰');
			$this->errLog = file_put_contents('logs/database/errors.txt', $e . $this->errDate . PHP_EOL, FILE_APPEND);
            exit("Quelque chose ne va pas ⚠️! Merci de lire le message suivant ! ➡️ " . $e->getMessage() . " ⛔"); // Display SQLSTATE (code + message) next to the "Something went wrong!"
        }
	}
	
	/**
	 * Returns the database connection instance.
	 * If the connection is null, it sets up the connection before returning.
	 *
	 * @return \PDO the database connection instance.
	 */
	public function getDbConn()
	{
		if ($this->dbConn == null) {
			$this->setDbConn();
		}
		return $this->dbConn;
	}
}
