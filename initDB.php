<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('config.php');
echo "Loaded Host: " . $host;
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

	if (isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
        $password = $_POST['password'];
	try{
 	$query = "select * from `project1` where `username`=:username and `password`=:password";
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
      	$stmt->bindParam('username', $username, PDO::PARAM_STR);
      	$stmt->bindValue('password', $password, PDO::PARAM_STR);
      	$stmt->execute();

	}
//}
	catch(Exception $e){
		echo $e->getMessage();
		exit("Something went wrong");
	}
}
	else{
		echo"please enter username and password";
	}
?>
