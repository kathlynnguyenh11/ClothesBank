<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<script>
function checkPasswords(form){
	let isOk = form.password.value == form.confirm.value;
	if(!isOk){ alert("Passwords don't match");}
	return isOk;
}
</script>
</head>
<body>
	<form method="POST" onsubmit="return checkPasswords(this);"/>
		<input type="text" placeholder="Enter Username" name="username"/>
		<input type="password" placeholder="Enter Password" name="password"/>
		<input type="password" placeholder="Confirm Password" name="confirm"/>
		<input type="email" placeholder="Enter Email" name="email"/>
		<input type="text" placeholder="Enter first name" name="firstname"/>
		<input type="text" placeholder="Enter last name" name="lastname"/>
		<input type="text" placeholder="Enter phone number" name="phone"/>
		<input type="text" placeholder="Enter zip code" name="zip"/>
		<input type="submit" value="Register"/>
	</form>
</body>
</html>
<?php
	if(isset($_POST['username']) 
		&& isset($_POST['password'])
		&& isset($_POST['confirm'])
		&& isset($_POST['email'])
		&& isset($_POST['firstname'])
		&& isset($_POST['lastname'])
		&& isset($_POST['phone'])
		&& isset($_POST['zip'])){
			
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$confirm = $_POST['confirm'];
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$zip = $_POST['zip'];

		if($pass != $confirm){
				echo "Passwords don't match";
				exit();
		}
		try{
			//do hash of password
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("INSERT into `project` (`username`, `password`,`email`,`firstname`,`lastname`,`contact_number`,`zip`) 
			VALUES(:username, :password, :email, :firstname, :lastname, :phone, :zip)");
			$result = $stmt->execute(
				array(":username"=>$user,
					":password"=>$hash,
					":email" =>$email,
					":firstname"=>$firstname,
					":lastname"=>$lastname,
					":phone"=>$phone,
					":zip"=>$zip

				)
			);
			print_r($stmt->errorInfo());
			
			echo var_export($result, true);
			echo "Successfully registered. <a href='login.php'>Please login</a>.";
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	else{
		echo "Please enter missing fields";
	}
?>