<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it
require('config.php');
echo "Loaded Host: " . $host;
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	//create table
	$query = "create table if not exists `project`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`password` int default 0,
		`firstname` varchar(32) NOT NULL,
  		`lastname` varchar(32) NOT NULL,
  		`email` varchar(64) NOT NULL,
  		`contact_number` varchar(64) NOT NULL,
		`zip` varchar(10) not null,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
	print_r($stmt->errorInfo());
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
	unset($r);
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
