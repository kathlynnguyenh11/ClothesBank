<html>
 <script>    
 </script>
<body>
    <div>
    <form id="lookup" method="POST">
        Item:   <input type="text" name="item"/>
                <input type="submit" value="Look up to see if someone has the item for donation"/>
    </form>
    </div>
</body>
<?php
    session_start();
    ini_set('display_errors',1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include_once("func/func.php");
    if(isset($_POST['item'])){
        try{
	        require("config.php");
	        $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	        $db = new PDO($conn_string, $username, $password);
	        $stmt = $db->prepare("select * from donation where donation = :item");
	        $stmt->execute(array(":item"=>$_POST['item']));
            //print_r($stmt->errorInfo());
	        echo "<table><tr><th>Username</th><th>Type</th><th>Item</th> <th>Condition</th><th>Date</th></tr>";
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            //echo var_export($row, true);
	            if($row && count($row) > 0){ 
			        echo "<tr><td>" . $row['username'] ."</td><td>" . $row['type'] . "</td><td>" . $row['donation'] . "</td><td>" . $row['condition']. "</td><td>".$row['date']. "</td></tr>";
		            echo "<br>";
                }
            }
            
        }
        catch(Exception $e){
			echo $e->getMessage();
        }  
}
?>
<body>
    <form id="info" method="POST">
        Enter username of donor after lookup:
        <input type="text" name="username"/>
        <input type="submit" value="submit to show info of the donor"/>
    </form>
</body>
<?php
if(isset($_POST['username'])){
    echo"Here's the information of the donor. Please reach out to him/her to request a pickup of the item";
    require("config.php");
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $db = new PDO($conn_string, $username, $password);
    $stmt = $db->prepare("select * from project where username = :username");
    
    $stmt->execute(array(":username"=>$_POST['username']));
    echo "<table><tr><th>Username</th><th>First name</th><th>Last Name</th><th>Contact Number</th><th>Email</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($row && count($row) > 0){ 
            echo "<tr><td>" . $row['username'] ."</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['contact_number']. "</td><td>".$row['email']. "</td></tr>";
            echo "<br>";
        }
    }

}
?>
</html>