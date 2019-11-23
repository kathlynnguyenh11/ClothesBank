<?php
function get_username(){
	if(isset($_SESSION['id']['name'])){
		echo $_SESSION['id']['name'];
	}
	else{
		echo "[Session missing 111]";
	}
}
?>
