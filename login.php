<?php
	require 'header.php';
	session_start();
	require 'functions.php';
	$start=time();
    $_SESSION['time_start']=$start;
	//checkSession();
	//$user = "client";
	//if user  verified...go to appr site ... verify function has $_post
    
	if(verify() == 1)
		{
			$str = "location:" . $_SESSION['user'] . ".php";
			header($str);
			//exit();
		}
	
	//here : verify test failed
	//if user has submitted the login form then it means wrong username password	
	else if(isset($_POST['login']))
			print '<p align = "center">Login failed.Try again</p><br>';
	
	//other way of getting here is directly from other pages whenever session expires	
	else if (!isset($_SESSION['index'])) 
		print "<p align = 'center'>Your session has expired .You need to login again</p>";
	
	
	$smarty->display("login.tpl");
	


?>