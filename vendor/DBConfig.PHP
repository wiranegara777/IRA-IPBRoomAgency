<?php
	class DbConfig
	{
		private $_host = 'localhost';
		private $_username = 'id6320420_ira';
		private $_password = 'superman777';
		private $_database = 'id6320420_test';

		protected $connection;

		public function __construct()
		{
			if(!isset($this->connection)){
				//session_start();
				$this->connection = new mysqli($this->_host,$this->_username,$this->_password,$this->_database);
				if(!$this->connection){
					error_reporting(E_ALL);
					ini_set('display_errors', 1);

					echo 'Cannot connect';
					exit;
				}
			}

			return $this->connection;
		}
	}
?>