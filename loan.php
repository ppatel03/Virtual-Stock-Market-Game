<?php
include("header.php");
include("db.php");
session_start();
require 'functions.php';

$loan_limit=100000;//also edit in client.php file

if ($_POST['submit'])
   {	
    ?><link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css"><?

    include 'banner.php';  
    $customer_id=intval($_POST['customer_id']);
	$amount= intval($_POST['amount']);
	$period=intval($_POST['time_period']);
//print_r($_POST);
    $query=sprintf("Select sum(loan_amount) as sum from customer_bank_loan where customer_id=%d",$customer_id);
	$result=mysql_query($query);
	
	$row=mysql_fetch_assoc($result);
	$breaker=intval($row['sum']);
	if( $breaker + $amount <= $loan_limit ) 
	{	 

	$query=sprintf("insert into customer_bank_loan (customer_id,loan_amount,loan_period) values(%d,%d,%d)",$customer_id,$amount,$period);
	$result=mysql_query($query);
	if(!$result) die('Error inserting : ' . mysql_error());


$query=sprintf("update customer_balance set current_balance=current_balance + %d where customer_id = %d",$amount,$customer_id);
$result=mysql_query($query);
	$q = sprintf("select * from customer_balance where customer_id = %d",$customer_id);
	$r = mysql_query($q);
	$c = mysql_fetch_assoc($r);
	$bal = $c['current_balance'];
	if($result) print "<p>Loan for Rs. $amount sanctioned !  Your current balance is Rs. $bal</p>";
	display();
	exit();

//header("Location:client.php");
	}
   else
    {
		 print "<p>Loan amount cannot be sanctioned. Maximum Loan Limit reached</p>";	 
		 display();
		 exit();
	}	
	
  }

else
	header("Location:client.php");
		
?>