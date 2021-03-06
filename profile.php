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
	$stmt = $db->prepare("select * from project where username = :username");
	$stmt->execute(array(":username"=>$_SESSION['user']['name']));
	//print_r($stmt->errorInfo());

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	//echo var_export($row, true);

	if($row && count($row) > 0){ 
		$fname=$row['firstname'];
		$lname=$row['lastname'];
		$contact=$row['contact_number'];
		$email=$row['email'];
		$zip=$row['zip'];
	}
}
catch(Exception $e){
			echo $e->getMessage();
}

?>
<html>
  <link rel="stylesheet" href="styles.css">
<h1> Welcome, <?php get_username();?>.</h1>
<body>

<table width="398" border="0" align="center" cellpadding="0">
  <tr>
    <td height="26" colspan="2">Your Profile Information </td>
  </tr>
  <tr>
    <td valign="top"><div align="left">First Name:</div></td>
    <td valign="top"><?php echo $fname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Last Name:</div></td>
    <td valign="top"><?php echo $lname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Email:</div></td>
    <td valign="top"><?php echo $email ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Zip Code:</div></td>
    <td valign="top"><?php echo $zip ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Contact No.: </div></td>
    <td valign="top"><?php echo $contact ?></td>
  </tr>
</table>
</body>
</html>
