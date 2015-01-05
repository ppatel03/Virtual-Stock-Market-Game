<?php
include("header.php");
include("db.php");

if (array_key_exists('_submit_check', $_POST)) 
{
  if(trim($_POST['id'])=="")
   {
    print "Invalid ID <a href='client.php'>Back</a>";
   }
  else
   {
		$smarty->assign("id",$_POST['id']);  
       	$smarty->assign("service_name",$_POST['service_name']); 
		//$smarty->assign("title",$_POST['service_name']|capitalize);
//$company_names and $share_prices stores current share prices of all companies		
		$query=sprintf("Select * from company_shareprice");
		$result=mysql_query($query);

		$company_names=array();
		$share_prices=array();

		while($current_row=mysql_fetch_assoc($result))
		{
  			array_push($company_names,$current_row['company_name']);
 			array_push($share_prices,$current_row['share_price']);
		}
//end company names and share prices

// $balance stores the current balance of the customer
	$query=sprintf("Select * from customer_balance where customer_id='%s'",$_POST['id']);
	$result=mysql_query($query);
	$balance_result=mysql_fetch_assoc($result);
	$balance=$balance_result["current_balance"];	 
// end balance

	 
	 
	 
	 
	 
       
	   $smarty->display("transaction.tpl");
   }

  //$smarty->display("redirect.tpl");

}

?>