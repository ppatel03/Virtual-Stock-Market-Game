<?php

include("header.php");
include("db.php");
session_start();
require 'functions.php';

?>

<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">
<?
/* Connecting, selecting database
$mysql_link = mysql_connect($mysql_server,$mysql_username,$mysql_password)
   or die('Could not connect: ' . mysql_error());
mysql_select_db($mysql_databasename) or die('Could not select database');*/

// performing sql query
$error = 0;
$query=sprintf("Select * from company_shareprice");
$result=mysql_query($query);

$company_names=array();
$company_ids=array();
$share_prices=array();

while($current_row=mysql_fetch_assoc($result))
{
  array_push($company_names,$current_row['company_name']);
  array_push($company_ids,$current_row['company_id']);
  $share_prices[$current_row['company_id']]=$current_row['share_price'];
}

$query=sprintf("Select * from customer_balance where customer_id='%s'",$_POST['id']);
$result=mysql_query($query);
$balance_result=mysql_fetch_assoc($result);
$balance=$balance_result["current_balance"];
     
	 


if($_POST['share_transaction'])
 {
  
     include 'banner.php';
	 
	 $sum_total=0;
     $iter=0;
	 $only_sell = 1;

    $shares_held=array();
     foreach($company_ids as $company_id)
     {
       $query=sprintf("Select no_of_shares from customer_shares_normal where customer_id='%s' and company_id='%s'",
           $_POST['id'],
           mysql_real_escape_string($company_id));

       $result=mysql_query($query);
       $current_row=mysql_fetch_assoc($result);
       $shares_held[$company_id]=$current_row['no_of_shares'];
     }
     
      
    foreach($company_ids as $company_id)
     {
       
      if($_POST[$company_id."_transaction_type"])
       {
   
        if($_POST[$company_id."_transaction_type"]=="buy")
           {
               $only_sell = 0;
			   $sum_total+=intval($_POST[$company_id."_no_of_shares"])*intval($share_prices[$company_id]);
               //print $sum_total;
           }
        else
           {
             if ( intval($shares_held[$company_id]) < intval($_POST[$company_id."_no_of_shares"] ) )
               {
                  print "<p>You do not have that many shares to sell. No transaction took place at all</p>";
				  display();
				  exit();
                }  

              $sum_total-=intval($_POST[$company_id."_no_of_shares"])*intval($share_prices[$company_id]);
              //print $sum_total;
             }
            
        }  
 
        $iter=$iter+1;
   
      }

   
   if ( ($balance < $sum_total) && ($only_sell == 0)      )
	{	
			print "<p>Not enough balance. No transaction took place at all</p>";
			display();
			exit();
	}
   else
      {
        $iter=0;
        foreach($company_ids as $company_id)
         {
              // first check whether any radio button was checked
         if(!$_POST[$company_id."_transaction_type"])
          {
            if(intval($_POST[$company_id."_no_of_shares"])!=0) 
            {  print "<p>You didn't specify transaction type for company $company_names[$iter] . No transaction took place for $company_names[$iter] </p>";
			$error = 1;
			}
			else print "<p>No transaction for $company_names[$iter]</p>";
           
          }
         else
          {
		  	$shares = $_POST[$company_id."_no_of_shares"];
            if($_POST[$company_id."_transaction_type"]=="sell")
                  $_POST[$company_id."_no_of_shares"]=-intval($_POST[$company_id."_no_of_shares"]);
           
            $query=sprintf("Update customer_shares_normal set no_of_shares=%d where company_id=%d and customer_id='%s'",
                            intval($shares_held[$company_id]) + intval($_POST[$company_id."_no_of_shares"]),$company_id,$_POST['id']);
            //print $query;
            mysql_query($query);
           	if($_POST[$company_id."_no_of_shares"] > 0 ) $t = "<b>Bought </b>";
			else $t = "<b>Sold </b>";
			print "<p> $t $shares shares of $company_names[$iter]  </p>";
          } 

          $iter=$iter+1;
                  
 
         }
        
         $query=sprintf("Update customer_balance set current_balance=%d where customer_id='%s'", 
                          intval($balance)-intval($sum_total),
                          $_POST['id']);
         mysql_query($query);
         display_balance($_POST['id']);
         display();
       
       }


 }

?>
