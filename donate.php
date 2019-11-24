<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<script>
</script>
</head>
<body>
    <p> Make donation: Food or Clothes </p>
	<form method="POST"/>
		<input type="text" placeholder="Enter food or clothe" name="type"/>
		<input type="text" placeholder="Enter the item" name="donation"/>
		<input type="text" placeholder="Enter condition" name="condition"/>
		<input type="submit" value="donate"/>
        <p>Click submit button to donate</p>
	</form>
</body>
</html>
<?php
	if(isset($_POST['type']) 
		&& isset($_POST['donation'])
		&& isset($_POST['condition'])){
			
		$user = $_SESSION['user']['name'];
		$type = $_POST['type'];
		$donation = $_POST['donation'];
		$condition = $_POST['condition'];

		try{
			require("config.php");
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("INSERT into `donation` (`username`, `type`,`donation`,`condition`,`date`) 
			VALUES(:username, :type, :donation, :condition, CURDATE()");
			$result = $stmt->execute(
				array(":username"=>$user,
					":type"=>$type,
					":donation" =>$donation,
					":condition"=>$condition
				)
			);
			print_r($stmt->errorInfo());
			
			echo var_export($result, true);
			echo "Successfully added your donation info to the system. we'll let u know when someone needs anything";
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	else{
		echo "Please enter missing fields";
	}
?>