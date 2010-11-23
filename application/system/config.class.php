<?php
/**
 * 
 * Configuration class 
 * Loading configuration file from config/config.xml
 * @author tigrunja
 *
 */
final class Config {
	
	protected static $_instance; 
	public static function &getInstance() {
		if (!isset(self::$_instance)) {
			self::$_instance = new self(); 
		}
		return self::$_instance; 
	}
	
	private $_holder; 
	
	public function __construct() {
		
		//Reading config file 
		 
		$xmlObject = simplexml_load_file(ROOT.DS."config".DS."config.xml"); 
		foreach($xmlObject as $key=>$node) {
			if ($key == 'database'){
				foreach($node as $value_key=>$value){
					$this->$value_key = $value;
				}
			}
		}
	}
	
	public function __get($varName) {
		if (isset($this->_holder)) {
			if (key_exists($varName, $this->_holder)) {
				return $this->_holder[$varName]; 
			}
		}
		return null;
	}
	
	public function __set($varName, $varValue) {
		if (!isset($this->_holder)) $this->_holder = array(); 
		$this->_holder[$varName] = $varValue; 
	}
	
}