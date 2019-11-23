<?php
function get_username(){
	if(isset($_SESSION['user']['name'])){
		echo $_SESSION['user']['name'];
	}
	else{
		echo "[Session missing 111]";
	}
}
function get_firstname(){
	if(isset($_SESSION['firstname'])){
		echo $_SESSION['firstname'];
	}
	else{
		echo "[Session missing 111]";
	}
}
?>
