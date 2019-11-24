
<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("func/func.php");
try{
	require("config.php");
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	$db = new PDO($conn_string, $username, $password);
	$stmt = $db->prepare("select * from donation where username = :username");
	$stmt->execute(array(":username"=>$_SESSION['user']['name']));
	//print_r($stmt->errorInfo());
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	//echo var_export($row, true);
	    if($row && count($row) > 0){ 
		    echo "Type: " . $row['type'] . " - Item: " . $row['donation'] . " - Condition: " . $row['condition']. " - Date: ".$row['date'];
        }
    }  
}
catch(Exception $e){
			echo $e->getMessage();
}
?>
<html>
<section> Thank you for donating, <?php get_username();?>.</section>
<body>
    <p>Above is your history of donation</p>
</body>
</html>