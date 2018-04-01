<?php
	class DBConnection{
		var $host = "localhost";
		var $username = "root";
		var $password = "";
		var $db = "google-option4";
		
		public function connect(){
			$c = mysqli_connect($this->host,$this->username,$this->password,$this->db) or die ("Can not connect to the database or fetch table from database");
			return $c;
		}
	}
?>