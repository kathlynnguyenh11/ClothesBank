
<html>
<head>
<style>
.nav{padding:1%;}
</style>
</head>
<body>
<?php
	session_start();
//echo "<strong>Hi " . $_SESSION['user'] . ", welcome back!</strong>";
//include_once("partials/header.php");
	include_once("func/func.php");
?>

<section> Welcome, <?php get_username();?>.</section>
<header>
	<nav>
		<a href="profile.php">See Profile</a>
		<a href="donate.php">Make Donation</a>
		<a href="donationHistory.php">View donation history</a>
		<a href="logout.php">Log out</a>
	</nav>
</header>
<p align="center" class="style1">Login successfully </p>
</body>
</html>
