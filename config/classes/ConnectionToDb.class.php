<?php


class ConnectionToDb
{
	
	private $connectionInfo = array("HOST_NAME" => "localhost", 
									"USERNAME" => "root",
									"PASSWORD" => "password",
									"DATABASE" => "");

	private $database, $tables, $connectionObj;
	protected $root;

	function setRoot(){
		$this->root = $_SERVER['DOCUMENT_ROOT'].'/econnect';
	}

	function setDatabaseInfoAndConnectDb($databaseNo){

		$table_json = @file_get_contents('config/databases.json');
		$database_info = json_decode($table_json, true);
		$json_root = $database_info["DATABASE".$databaseNo];

		$this->database = $json_root["DATABASE_NAME"];
		$this->tables = $json_root["TABLES"];
		$this->connectDb($this->database);
		$returnData = array($this->tables, $this->connectionObj);
		return $returnData;

	}

	private function connectDb($database)
	{
		$this->setRoot();//setting root
		try {
			$this->connectionObj = new PDO("mysql:host=localhost;dbname=".$database, $this->connectionInfo["USERNAME"], $this->connectionInfo["PASSWORD"]);
			//echo "Connection created!";
		} catch (PDOException $exception) {
			file_put_contents($this->root."/config/logs/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: " . $exception->getMessage().PHP_EOL, FILE_APPEND);
			echo "Connection error: " . $exception->getMessage();
		}

	}

	function disconnectDb()
	{
		try{
			$this->connectionObj = null;
		}catch (PDOException $exception){
			file_put_contents($this->root."config/logs/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: " . $exception->getMessage().PHP_EOL, FILE_APPEND);
            die($exception->getMessage());
		}
	}

}

?>