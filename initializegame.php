<?php

//verified !!!

include("header.php");
include("db.php");
require 'functions.php';
session_start();

if ($_POST['submit'])

{
	$no_of_cust= intval($_POST['no_of_cust']);
	$no_of_shares= intval($_POST['no_of_shares']);
	$current_balance=intval($_POST['current_balance']);
	

	$query=sprintf("truncate table shortselling_flag ");
	$result=mysql_query($query);

	$query=sprintf("insert into shortselling_flag values (%d,%d)",0,$no_of_cust);
	$result=mysql_query($query);

	$query=sprintf("truncate table customer");
	$result=mysql_query($query);

	$query=sprintf("truncate table customer_shares_normal");
	$result=mysql_query($query);
	
	$query=sprintf("truncate table customer_shares_shortselling");
	$result=mysql_query($query);
	
	$query=sprintf("truncate table customer_balance");
	$result=mysql_query($query);
	
	$query=sprintf("truncate table log_mutual_fund");
	$result=mysql_query($query);

	$query=sprintf("truncate table log_total_shares");
	$result=mysql_query($query);
	
	$query=sprintf("truncate table log_transaction");
	$result=mysql_query($query);
	
	if(isset($_POST['mutual_fund']))
	{
		$query=sprintf("truncate table customer_mutual_fund");
		$result=mysql_query($query);
	}
	
	if(isset($_POST['bank_loan']))
	{
		$query=sprintf("truncate table customer_bank_loan");
		$result=mysql_query($query);
	}
	

	$custno = 1;

	while($custno<=$no_of_cust)			// for every customer

	{
		
				$query=sprintf("insert into customer (customer_id) values (%d)",$custno);
				$result=mysql_query($query);
				
				$query=sprintf("insert into customer_balance values (%d,%d)",$custno,0);
				$result=mysql_query($query);



				$query=sprintf("update customer_balance set current_balance=%d where customer_id=%d",$current_balance,$custno);
				$result=mysql_query($query);




		$query=sprintf("Select * from company_shareprice");
			$result=mysql_query($query);
			
			$company_names=array();
			$shareprice = array();
			$company_ids = array();

			while($current_row=mysql_fetch_assoc($result))		
			{
  				array_push($company_names,$current_row['company_name']);
 				array_push($shareprice,$current_row['share_price']);
				array_push($company_ids,$current_row['company_id']);
			}
	

			$companyno=count($company_names);
			$count=0;

			while($count < $companyno)			//for every company

			{
				$query=sprintf("insert into customer_shares_normal values(%d,'%s',%d)",$custno,$company_ids[$count],$no_of_shares);	
				$result=mysql_query($query);	

				
				$query=sprintf("insert into customer_shares_shortselling values(%d,'%s',%d)",$custno,$company_ids[$count],0);
				$result=mysql_query($query);

				


				$count=$count+1;
			}


			

	if(isset($_POST['mutual_fund']))
	{
			
		$query=sprintf("insert into customer_mutual_fund values (%d,%d)",$custno,0);
		$result=mysql_query($query);
		
		
	}
	
	$custno=$custno + 1;
}
$count = 0;
while($count < $companyno)
{
$query = sprintf("update company_shareprice set share_price = %d where company_id = %d",$shareprice[$count],$company_ids[$count]);
//print $query;
$result = mysql_query($query);
if(!$result) {die('Error : ' . mysql_error());}
$count = $count +1;
}

?><script language="Javascript">
window.location = "administrator.php"
alert("The game has been initialised successfully") ;
</script><?


}
else

{
  ?><script language="Javascript">
window.location = "administrator.php"
alert("Start from administrator.php") ;
</script><?
}    
?>