<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*$user = $_SESSION['user'];
echo $user;
include_once("func/func.php");
*/
try{
	require("config.php");
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	$db = new PDO($conn_string, $username, $password);
	$stmt = $db->prepare("select * from project where username = :username");
	$stmt->execute(array(":username"=>get_username()));
	print_r($stmt->errorInfo());

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	echo var_export($results, true);

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
*/
?>
<html>
<section> Welcome, <?php get_username();?>.</section>
<body>
<table width="398" border="0" align="center" cellpadding="0">
  <tr>
    <td height="26" colspan="2">Your Profile Information </td>
	//<td><div align="right"><a href="index.php">logout</a></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">LastName:</div></td>
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
//<p align="center"><a href="index.php"></a></p>