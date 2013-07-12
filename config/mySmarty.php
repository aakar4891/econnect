<?php
error_reporting(E_ALL ^ E_NOTICE);
$root = $_SERVER['DOCUMENT_ROOT'].'/econnect/';
require_once "$root/smarty/libs/Smarty.class.php";

class mySmarty extends Smarty{

	function __construct(){

		//need to call the parent constructor, i.e., "Smarty()" in order to access its member function through mySmarty instance.
		parent::__construct();

		$this->template_dir = $root.'smarty/templates/';
		$this->compile_dir = $root.'smarty/templates_c/';
		$this->config_dir = $root.'smarty/config/';
		$this->cache_dir = $root.'smarty/cache/';
		$this->caching = Smarty::CACHING_LIFETIME_CURRENT;

	}
}

?>