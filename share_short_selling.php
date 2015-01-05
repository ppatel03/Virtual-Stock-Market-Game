<?php
include("header.php");
include("db.php");
session_start();
require 'functions.php';

/*
// Connecting, selecting database
$mysql_link = mysql_connect($mysql_server,$mysql_username,$mysql_password)
   or die('Could not connect: ' . mysql_error());
mysql_select_db($mysql_databasename) or die('Could not select database');*/

// performing sql query
?>
<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">


<?
$query=sprintf("Select * from company_shareprice");
$result=mysql_query($query);

$company_names=array();
$share_prices=array();
$company_ids=array();


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

    $shares_sold=array();
     foreach($company_ids as $company_id)
     {
       $query=sprintf("Select company_id,no_of_shares from customer_shares_shortselling where customer_id='%s' and company_id='%s'",
           $_POST['id'],
           mysql_real_escape_string($company_id));
;
       $result=mysql_query($query);
       $current_row=mysql_fetch_assoc($result);
       $shares_sold[$current_row['company_id']]=$current_row['no_of_shares'];

     }
#print_r($shares_sold);     
     
     
    foreach($company_ids as $company_id)
     {
       
      if($_POST[$company_id."_transaction_type"])
       {
        if($_POST[$company_id."_transaction_type"]=="buy")
           {
               
             if ( intval($shares_sold[$company_id]) < intval($_POST[$company_id."_no_of_shares"] ) )
               {
                  print "<p>You did not sell that many shares. No transaction took place at all</p>";
				  display();
                  exit();
                }  

               $sum_total+=intval($_POST[$company_id."_no_of_shares"])*intval($share_prices[$company_id]);
               #print $sum_total;
           }
        else
           {
             #if ( intval($shares_sold[$iter]) < intval($_POST[$company_id."_no_of_shares"] ) )
             #  {
             #     print "Sorry, you do not have that many shares Click <a href='go.html'>here</a> to go back";
             #     exit();
             #   }  

              $sum_total-=intval($_POST[$company_id."_no_of_shares"])*intval($share_prices[$company_id]);
              #print $sum_total;
           }
      
        $iter=$iter+1;
       }
     }

   
   if ( $balance < $sum_total)
   {
   	  print "<p>Not enough balance to buy the said no of shares.  No transaction took place at all</p>";
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
              print "<p>You didn't specify transaction type for company $company_names[$iter]. No transaction took place for $company_names[$iter]</p>";
			else	print "<p>No transaction for $company_names[$iter]</p>";
           
          }
         else
          {
            $factor=1;
            $shares = $_POST[$company_id."_no_of_shares"];
			if($_POST[$company_id."_transaction_type"]=="buy")
                  $factor=-1;
			
            $query=sprintf("Update customer_shares_shortselling set no_of_shares=%d where company_id='%s' and customer_id='%s'",
                    intval($shares_sold[$company_id]) + $factor*intval($_POST[$company_id."_no_of_shares"]),$company_id,$_POST['id']);
            mysql_query($query);
			if($factor < 0 ) $t = "<b>Bought </b>";
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
