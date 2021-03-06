<?php

require_once 'ConnectionToDb.class.php';
class RegistrationInfo extends ConnectionToDb
{
	//const $root = $_SERVER['DOCUMENT_ROOT'].'/econnect/';
	private $registrationInfo = array("USERNAME" => "",
										"FIRST_NAME" => "",
										"LAST_NAME" => "",
										"EMAIL" => "",
										"PASSWORD" => "",
										"GENDER" => "",
										"DOB" => "",
										"IP_ADDRESS" => "",
										"TOKEN" => "");
	
	public $message;

	private $myTables, $pdoObj; 

	function __construct()
	{
		$databaseNo = 1;
		$infoReceived = $this->setDatabaseInfoAndConnectDb($databaseNo);
		$this->myTables = $infoReceived[0]; //Collecting table names
		$this->pdoObj = $infoReceived[1]; //Fetching PDO information
	}

	function __destruct()
	{
		$this->disconnectDb();
	}

	

	//$username is trimmed input. Please make it sure.
	private function setUsername($username)
	{	
		if(preg_match("/^[a-zA-Z0-9]+$/", $username) && $username != "")
		{
			$this->registrationInfo["USERNAME"] = $username;
			return true;
		}
		else
		{
			return false;
		}
	}

	private function setFirstname($firstname)
	{	
		if(preg_match("/^[a-zA-Z]+$/", $firstname) && $firstname != "")
		{
			$this->registrationInfo["FIRST_NAME"] = $firstname;
			return true;
		}
		else
		{
			return false;
		}
	}

	private function setLastname($lastname)
	{	
		if(preg_match("/^[a-zA-Z]+$/", $lastname) && $lastname != "")
		{
			$this->registrationInfo["LAST_NAME"] = $lastname;
			return true;
		}
		else
		{
			return false;
		}
	}

	private function setEmail($email)
	{	
		if(preg_match("/^[a-zA-Z0-9._]+[@][a-zA-Z0-9]+[.]([a-zA-Z]{2,4}|[a-zA-Z]{2}[.][a-zA-Z]{2,4})$/", $email) && $email != "")
		{
			$this->registrationInfo["EMAIL"] = $email;
			return true;
		}
		else
		{
			return false;
		}
	}

	private function setGender($gender)
	{	
		if(preg_match("/^[a-zA-Z]+$/", $gender) && $gender != "")
		{
			$this->registrationInfo["GENDER"] = $gender;
			return true;
		}
		else
		{
			return false;
		}
	}

	private function setDOB($dob)
	{	
		if(preg_match("/^[0-9]{1,2}[-][a-z]{3,5}[-][0-9]{4}$/", $dob))
		{
			$this->registrationInfo["DOB"] = $dob;
			return true;
		}
		else
		{
			return false;
		}
	}

	private function setPassword($password)
	{	
		if(preg_match("/^[a-zA-Z0-9!@#$%^&*()_+]+$/", $password) && $password != "")
		{
			$this->registrationInfo["PASSWORD"] = $this->passwordEncrypt($password);
			return true;
		}
		else
		{
			return false;
		}
	}

	private function setIP()
	{
		$this->registrationInfo["IP_ADDRESS"] = $_SERVER["REMOTE_ADDR"];
		return true;
	}

	private function passwordEncrypt($password)
	{
		//Salts
		$salt_left = md5("aXvbuIdjkR");
		$salt_right = md5("jhkhHDskaF");
		$pass = md5($password);
		//Encryption for password.
		$array_left = str_split($salt_left, 8);
		$array_right = str_split($salt_right, 8);
		$array_pass = str_split($pass, 8);
		//Encryption algo.
		for ($i=0; $i < 3; $i++) { 
			
			$array_new[$i] = $array_pass[$i].$array_left[$i].$array_right[$i];
		}

		return implode($array_new, "");
	}

	private function setOneTimeURL(){

		$this->registrationInfo["TOKEN"] = SHA1($this->registrationInfo["EMAIL"].str_shuffle($this->registrationInfo["USERNAME"]));
	}
	

	private function insertDataInDatabase(){

			$dbh = $this->pdoObj;
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

			$query = "SELECT * FROM `".$this->myTables["LOGIN"]."` WHERE `username` = '".$this->registrationInfo["USERNAME"]."' OR `email` = '".$this->registrationInfo["EMAIL"]."'";
			$stmt = $dbh->prepare($query);

			@$stmt->execute();
			$error = $stmt->errorInfo();

			if($error[2] !== NULL){
				file_put_contents($this->root."/config/logs/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: (Table: " . $this->myTables["LOGIN"] . ")" . $error[2].PHP_EOL, FILE_APPEND);
				$this->message = "Query Error: " . $error[2];
				return false;
			}elseif($stmt->rowCount() >= 1){
				$this->message = 'This email is already registered!';
				return false;
			}

			//Starting transaction... for table entry in login, users, unregistered.
			$dbh->beginTransaction();

			//Inserting in `login` table
			//Last login date is set through sql NOW() function.
			$query = "INSERT INTO `".$this->myTables["LOGIN"]."` SET `username` = :user, `email` = :email, `password` = :pass, `last_ip` = :last_ip, `last_login_date` = NOW(),`status` = 'inactive'";
			$stmt = $dbh->prepare($query);

			$stmt->bindParam(':user', $this->registrationInfo["USERNAME"]);
			$stmt->bindParam(':email', $this->registrationInfo["EMAIL"]);
			$stmt->bindParam(':pass', $this->registrationInfo["PASSWORD"]);
			$stmt->bindParam(':last_ip', $this->registrationInfo["IP_ADDRESS"]);

			@$stmt->execute();
			$error = $stmt->errorInfo();
			if($error[2] !== NULL){
				file_put_contents($this->root."/config/logs/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: (Table: " . $this->myTables["LOGIN"] . ")" . $error[2].PHP_EOL, FILE_APPEND);
				$this->message = "Query Error: " . $error[2];
				$dbh->rollBack();
				//After rolling back autoincrement needed to be deducted.
				$query = "ALTER TABLE `".$this->myTables["LOGIN"]."` AUTO_INCREMENT = 1";
				$stmt = $dbh->prepare($query);
				$stmt->execute();				
				return false;
			}

			//Inserting in `users` table
			//Date time is set through sql NOW() function.
			$query = "INSERT INTO `".$this->myTables["USERS"]."` SET `firstname` = :first, `lastname` = :last, `gender` = :gen, `dob` = :dob, `registration_ip` = :ip, `date_time` = NOW()";
			$stmt = $dbh->prepare($query);

			$stmt->bindParam(':first', $this->registrationInfo["FIRST_NAME"]);
			$stmt->bindParam(':last', $this->registrationInfo["LAST_NAME"]);
			$stmt->bindParam(':gen', $this->registrationInfo["GENDER"]);
			$stmt->bindParam(':dob', $this->registrationInfo["DOB"]);
			$stmt->bindParam(':ip', $this->registrationInfo["IP_ADDRESS"]);

			@$stmt->execute();
			$error = $stmt->errorInfo();
			if($error[2] !== NULL){
				file_put_contents($this->root."/config/logs/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: (Table: " . $this->myTables["USERS"] . ")" . $error[2].PHP_EOL, FILE_APPEND);
				$this->message = "Query Error: " . $error[2];
				$dbh->rollBack();

				//After rolling back autoincrement needed to be deducted.
				$query = "ALTER TABLE `".$this->myTables["USERS"]."` AUTO_INCREMENT = 1";
				$stmt = $dbh->prepare($query);
				$stmt->execute();
				return false;
			}

			//Inserting in `users` table
			$query = "INSERT INTO `".$this->myTables["UNREGISTERED"]."` SET `token` = :token";
			$stmt = $dbh->prepare($query);

			$stmt->bindParam(':token', $this->registrationInfo["TOKEN"]);			

			@$stmt->execute();
			$error = $stmt->errorInfo();
			if($error[2] !== NULL){
				file_put_contents($this->root."/config/logs/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: (Table: " . $this->myTables["USERS"] . ")" . $error[2].PHP_EOL, FILE_APPEND);
				$this->message = "Query Error: " . $error[2];
				$dbh->rollBack();

				//After rolling back autoincrement needed to be deducted.
				$query = "ALTER TABLE `".$this->myTables["UNREGISTERED"]."` AUTO_INCREMENT = 1";
				$stmt = $dbh->prepare($query);
				$stmt->execute();
				return false;
			}

			$dbh->commit();
			return true;
	}


	function setRegistrationDataAndInsertInDatabase($username, $firstname, $lastname, $email, $password, $gender, $dob)
	{
		if(!$this->setUsername(trim($username)))
		{
			if(trim($username) == '')
			{
				$this->message = "Username can't be blank!";
				return false;
			}
			else
			{
				$this->message = "Username is invalid! Try different.";
				return false;
			}
		}

		if(!$this->setFirstname(trim($firstname)))
		{

			if(trim($firstname) == '')
			{
				$this->message = "Firstname can't be blank!";
				return false;
			}
			else
			{
				$this->message = "Firstname is invalid!";
				return false;
			}
		}
		
		if(!$this->setLastname(trim($lastname)))
		{
			if(trim($lastname) == '')
			{
				$this->message = "Lastname can't be blank!";
				return false;
			}
			else
			{
				$this->message = "Lastname is invalid!";
				return false;
			}
		}
			
		if(!$this->setEmail(trim($email)))
		{
			if(trim($email) == '')
			{
				$this->message = "Email can't be blank!";
				return false;
			}
			else
			{
				$this->message = "Email is invalid!";
				return false;
			}
		}
		
		if(!$this->setGender(trim($gender)))
		{
			if(trim($gender) == '')
			{
				$this->message = "Gender not selected!";
				return false;
			}
			else
			{
				$this->message = "Gender is invalid!";
				return false;
			}
		}
		
		if(!$this->setDOB(trim($dob)))
		{
			if(trim($dob) == '')
			{
				$this->message = "Date-of-Birth can't be blank!";
				return false;
			}
			else
			{
				$this->message = "Date-of-Birth is invalid!";
				return false;
			}
		}	

		if(!$this->setPassword(trim($password)))
		{
			if(trim($password) == '')
			{
				$this->message = "Password can't be blank!";
				return false;
			}
			else
			{
				$this->message = "Password is invalid!";
				return false;
			}
		}

		$this->setIP();
		$this->setOneTimeURL();

		$this->message = "Data Successfully Updated!";
		if(!$this->insertDataInDatabase()){
			echo $this->message;
		}
		return true;

	}
}

?>