<?php
    session_start();
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
?>
<html>
    <head></head>
    <body>
        <form method="POST"/>
        Username:    <input type="text" name="username"/>
        Password:    <input type="password" name="password"/>
            <input type="submit" value="Login"/>
        </form>
    </body>
</html>

<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
        $user = $_POST["username"];
        $pass = $_POST["password"];
        try{
            //test 
	    //again
            require("config.php");
            $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
            $db = new PDO($conn_string,$username,$password);
            $stmt = $db->prepare("select id, username, password from `project` where username = :username LIMIT 1");
            $stmt->execute(array(":username"=>$user));
            //print_r($stmt->errorInfo());
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            echo var_export($results, true);
			if($results && count($results) > 0){
                $hash = password_hash($pass, PASSWORD_BCRYPT);
                if(password_verify($pass, $results['password'])){
		    echo "Welcome, " . $results["username"];
		    echo "[" . $results["id"] . "]";
			$user = array("id"=> $results['id'],
    				"name"=> $results['username']);

		    $_SESSION['user'] = $user;
			$_SESSION['username']=$results['username'];
			//$_SESSION['firstname'] = $results["firstname"] ;

		    echo var_export($user, true);
		    echo var_export($_SESSION, true);
			header("Location: dashboard.php");
	    	}
            	else{
            		echo "Invalid password";
            	}

	}            	
	   else{
		echo "Invalid username";
	    }
       }
       catch(Exception $e){
       		echo $e->getMessage();
       }
	//}
    }
?>
