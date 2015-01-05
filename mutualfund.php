<?php
include("header.php");
include("db.php");
session_start();
require 'functions.php';
if ($_POST['submit'])

   {	
 	?><link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css"><?

	include 'banner.php';
	
	$flag=($_POST['flag']);  
   $amount= ($_POST['amount']);
   
	$customer_id=($_POST['customer_id']);

	$query=sprintf("select * from customer_balance where customer_id = %d ",$customer_id);
	$result=mysql_query($query);
	$balance_result=mysql_fetch_assoc($result);
	$bal=$balance_result["current_balance"];
	





	$query=sprintf("select * from customer_mutual_fund where customer_id = %d ",$customer_id);
	$result=mysql_query($query);
	$balance_result=mysql_fetch_assoc($result);
	$mutual_fund_balance=$balance_result["mutual_fund_balance"];

//print $amount;



	$query=sprintf("select * from customer_mutual_fund where customer_id = %d ",$customer_id);
	$result=mysql_query($query);
	$c = mysql_fetch_assoc($result);
	$mbal = $c['mutual_fund_balance'];
	if ($flag=='invest')
	{	
		
		 if ($amount > $bal)
		{	
			print "<p>Not enough balance.Could not invest in mutual fund </p>";
			print "<p>Current Balance = Rs. $bal</p>";
			print "<p>Current Mutual fund Balance = Rs. $mbal</p>";
			display();
			exit();
		}

		
	if(mysql_num_rows($result)==0)		

	{
	$query=sprintf("insert into customer_mutual_fund 			values(%d,%d)",$customer_id,$amount);
	}			
	else
	{	
	$query=sprintf("update customer_mutual_fund set mutual_fund_balance = 	mutual_fund_balance + %d 				     where customer_id = %d",$amount,$customer_id);
	}
	$result=mysql_query($query);

	
	$query=sprintf("update customer_balance set current_balance = 		current_balance - %d where customer_id = %d ",$amount,$customer_id);
$result=mysql_query($query);
	$t = "Invested ";$t1 = "in";
	$mbal = $mbal + $amount;$bal = $bal - $amount;
	}
	
	
	
	else //flag is withdraw
	
	{	
		
		 if ($mutual_fund_balance < $amount)
		{	
			print "Not enough balance in mutual funds";
			print "<p>Current Balance = Rs. $bal</p>";
			print "<p>Current Mutual fund Balance = Rs. $mbal</p>";
			display();
			exit();

		}

		
		
		//print '123';
		$query=sprintf("update customer_mutual_fund set mutual_fund_balance = 	mutual_fund_balance - %d 				     where customer_id = %d",$amount,$customer_id);
		$result=mysql_query($query);
	
	$query=sprintf("update customer_balance set current_balance = 		current_balance + %d where customer_id = %d ",$amount,$customer_id);
$result=mysql_query($query);
	$t = "Withdrawn ";$t1 = "from";
	$mbal = $mbal - $amount;$bal = $bal + $amount;
	}
	
	
			print "$t Rs. $amount $t1 mutual funds";
			print "<p>Current Balance = Rs. $bal</p>";
			print "<p>Current Mutual Fund Balance = Rs. $mbal</p>";
			display();
			exit();	


//header("location:client.php")
	
	
  }
else
{
include 'banner.php';
print "START FROM BEGINNING";

}

?>


