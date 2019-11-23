<?php
function get_username(){
	if(isset($_SESSION['user']['firstname'])){
		echo $_SESSION['user']['firstname'];
	}
	else{
		echo "[Session missing]";
	}
}
?>
