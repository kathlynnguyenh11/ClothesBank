<?php
session_start();
include_once("func/func.php");
$user = $_SESSION['username'];
echo $user;
$user=get_username();
$result = mysql_query("SELECT * FROM project where username='$user'");
while($row = mysql_fetch_array($result))
{ 
$fname=$row['firstname'];
$lname=$row['lastname'];
$contact=$row['contact_number'];
$email=$row['email'];
$zip=$row['zip'];
}
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