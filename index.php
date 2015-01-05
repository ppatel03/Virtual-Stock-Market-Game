<?php
session_start();	//in case an already existing session exists 
session_destroy();	//... it is destroyed !
session_start();	//and a new session is started !
$_SESSION['index'] = 1;
header("location:login.php");

?>
