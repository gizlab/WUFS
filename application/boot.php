<?php

//Define ROOT
define('ROOT', dirname(__FILE__)); 
define('DS', DIRECTORY_SEPARATOR); 

function __autoload($className) {
	$className = strtolower($className); 
	
	$fileName = ROOT.DS.'system'.DS.$className.'.class.php'; 
	if (file_exists($fileName)) {
		require_once $fileName;
		return true; 
	}	
}