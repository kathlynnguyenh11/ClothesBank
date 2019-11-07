<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('config.php');
echo "Loaded Host: " . $host;
echo "for testing, username: hang, password: 12";
$response="";
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
    $db = new PDO($conn_string, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    if (isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
            $password = $_POST["password"];
    
        $query = "select * from project1 where username='$username' AND password='$password'";
        echo "<br>Connected";
        $stmt = $db->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(":username"=> $username,":password"=>$password));      
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if(($results['username'] == $username) && ($results['password'] == $password)){
        $response = "<br>Successfully logged in";}
        else {
                if(!$stmt->errorInfo()) {
                    print_r($stmt->errorInfo());}
                    else {
                        $response = "<br><br>The username OR password is incorrect or does not exist";}
        }
    }
    else { 
            $response = "The username or password field is empty";
    }
    echo $response;
    
}
    catch(Exception $e){
        echo $e->getMessage();
        exit("Something went wrong");
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1>
        <form action="initDB.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password</label>
            <input type="text" id="password" name="password"><br>
            <input type="submit" name="register" value="Register"></button>
        </form>
    </body>
</html>
