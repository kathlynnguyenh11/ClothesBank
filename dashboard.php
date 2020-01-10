
<html>
<head>
	
	<link rel="stylesheet" href="styles.css">

</head>
<body>
	<?php
		session_start();
		include_once("func/func.php");
	?>
	<header>
		<h1>Welcome, <?php get_username();?></h1>
		<h2>Login successfully</h1>
	</header>

		<nav class="main-nav">
			<div class="center">
				<a href="profile.php">See Profile</a>
				<a href="donate.php">Make Donation</a>
				<a href="donationHistory.php">View donation history</a>
				<a href="logout.php">Log out</a>
				<a href="getDonation.php">Go here if you are in need of something</a>
			</div>
		</nav>		
</body>
</html>
