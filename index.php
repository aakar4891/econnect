<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$root = $_SERVER['DOCUMENT_ROOT'].'/econnect/';
	if(count($_POST) != 0){
		require_once $root.'config/classes/RegistrationInfo.class.php';

		$registrationObj = new RegistrationInfo();
		$registrationObj->setRegistrationData($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['gender'], $_POST['date'].'-'.$_POST['month'].'-'.$_POST['year']);

	}else{

		require_once $root.'config/mySmarty.php';
		$smarty = new mySmarty();
		$smarty->display('index.tpl');	

	}	

?>