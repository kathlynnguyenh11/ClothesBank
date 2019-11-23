
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
		<a href="?page=profile.php">See Profile</a>
		<a href="?page=logout.php">Log out</a>
	</nav>
</header>
</body>
</html>
