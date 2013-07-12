<?php


class ConnectionToDb
{
	
	private $connectionInfo = array("HOST_NAME" => "localhost", 
							  "USERNAME" => "root",
							  "PASSWORD" => "password",
							  "DATABASE" => "");

	//$tables = array("TABLE_NAME" => "NAME");

	function connectDb($database)
	{
		$this->connectionInfo["DATABASE"] = $database;
		if(!@mysql_connect($this->connectionInfo["HOST_NAME"], $this->connectionInfo["USERNAME"], $this->connectionInfo["PASSWORD"]) || !@mysql_select_db($this->connectionInfo["DATABASE"]))
		{
			echo $database;
			die('Sorry! Some Problem Occured.');
		}
		echo 'Connected to '.$database;
	}

	function disconnectDb()
	{
		mysql_close();
	}

}

?>