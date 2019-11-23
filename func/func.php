<?php
function get_username(){
	if(isset($_SESSION['user'])){
		echo $_SESSION['user'];
	}
	else{
		echo "[Session missing 111]";
	}
}
?>
