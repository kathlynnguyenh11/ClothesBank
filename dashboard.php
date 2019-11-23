
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
<section>
<header>Items Due Soon</header>
<p>Item one</p>
<p>Item two</p>
<p>Item three</p>
<p>...</p>
</section>
</body>
</html>
