<?php

require_once 'ConnectionToDb.class.php';
class RegistrationInfo extends ConnectionToDb
{
	//const $root = $_SERVER['DOCUMENT_ROOT'].'/econnect/';
	private $registration_info = array("USERNAME" => "",
										"FIRST_NAME" => "",
										"LAST_NAME" => "",
										"EMAIL" => "",
										"PASSWORD" => "",
										"GENDER" => "",
										"DOB" => "",
										"IP_ADDRESS" => "",
										"DATE_TIME" => "",
										"TOKEN" => "");
	
	public $message, $database, $tables;

	function __construct()
	{
		$this->setDatabaseInfo();
		$this->connectDb($this->database);
	}

	function __destruct()
	{
		$this->disconnectDb();
	}

	function setDatabaseInfo(){
		$table_json = @file_get_contents('config/databases.json');
		$database_info = json_decode($table_json, true);
		$json_root = $database_info["DATABASE1"];

		$this->database = $json_root["DATABASE_NAME"];
		$this->tables = $json_root["TABLES"];
		print_r($this->tables);

	}

	//$username is trimmed input. Please make it sure.
	private function setUsername($username)
	{	
		if(preg_match("/^[a-zA-Z0-9]+$/", $username) && $username != "")
		{
			$this->registration_info["USERNAME"] = $username;
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
			$this->registration_info["FIRST_NAME"] = $firstname;
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
			$this->registration_info["LAST_NAME"] = $lastname;
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
			$this->registration_info["EMAIL"] = $email;
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
			$this->registration_info["GENDER"] = $gender;
			return true;
		}
		else
		{
			return false;
		}
	}

	private function setDOB($dob)
	{	
		if(preg_match("/^[0-9]{1,2}[-][a-z]{3,4}[-][0-9]{1,2}$/", $dob))
		{
			$this->registration_info["DOB"] = $dob;
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
			$this->registration_info["PASSWORD"] = $this->passwordEncrypt($password);
			return true;
		}
		else
		{
			return false;
		}
	}

	private function setIP()
	{
		$this->registration_info["IP_ADDRESS"] = $_SERVER["REMOTE_ADDR"];
		return true;
	}

	private function setDateTime()
	{
		$this->registration_info["DATE_TIME"] = date("Y-m-d H:i:s");
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

		$this->registration_info["TOKEN"] = SHA1($this->registration_info["EMAIL"].str_shuffle($this->registration_info["USERNAME"]));
	}
	

	private function insertDataInDatabase(){

	}


	function setRegistrationData($username, $firstname, $lastname, $email, $password, $gender, $dob)
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
		$this->setDateTime();
		$this->setOneTimeURL();

		$this->message = "Data Successfully Updated!";
		return true;	
	}
}

?>