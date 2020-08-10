<?php ob_start(); session_start();
	class Connection{
		function getConnection(){
			$servername = "localhost";
			$username = "root";
			$password = ""; 
			
			/*$servername = "localhost";
			$username = "bless83y_renoo";
			$password = "Evg@2512";*/

			//$conn = new PDO("mysql:host=$servername;dbname=bless83y_renoo", $username, $password);
			$conn = new PDO("mysql:host=$servername;dbname=renovation", $username, $password);
			return $conn;
		}
	}
  
?>