<?php

//verified !!!

include("header.php");
include("db.php");
session_start();
if ($_POST['submit'])
{

	
	$no_of_shares= intval($_POST['no_of_shares']);
	//$company_name= $_POST['company_name'];
	$company_id= $_POST['company_id'];
	$allotshares=$_POST['allotshares'];
	$query=sprintf("select no_of_customers from shortselling_flag");
	$result=mysql_query($query);
	$current_row=mysql_fetch_assoc($result);
 	$no_of_cust=$current_row['no_of_customers'];

//print $company_id;

	
	$query=sprintf("Select * from company_shareprice where company_id = '%s'",$company_id);
	$result=mysql_query($query);
	$c = mysql_fetch_assoc($result);
	$company_name = $c['company_name'];


	if(mysql_num_rows($result)==0)					
	{
		?><script language="Javascript">
		window.location = "administrator.php"
		alert("The company name '<? echo $company_name ; ?>' you entered is incorrect.") ;
		</script><?

		
	}


	$query=sprintf("Select * from customer_shares_normal where company_id = '%s'",$company_id);


	$result=mysql_query($query);


	if(mysql_num_rows($result)==0)					
	{
		$custno = 1;
		
		if ($allotshares=='literal')

		{	while($custno<=$no_of_cust)

			{
				$query=sprintf("insert into customer_shares_normal values(%d,'%s',%d)",$custno,$company_id,$no_of_shares);
	
				$result=mysql_query($query);	
				if(!$result) {die('Error : ' . mysql_error());}
				$custno=$custno + 1;
		
		
			}
			
		}
		/*else															//not required

		{	while($custno<=$no_of_cust)

			{
				$query=sprintf("insert into customer_shares_normal values(%d,'%s',%d)",$custno,$company_id,0);
	
				$result=mysql_query($query);	
	
				$custno=$custno + 1;
		
		
			}


		}*/





	}
	else
	{
		$custno = 1;

		if ($allotshares=='literal')
		{

			while($custno<=$no_of_cust)

			{
				$query=sprintf("update customer_shares_normal set no_of_shares=no_of_shares + %d where customer_id= %d and company_id = '%s'",$no_of_shares,$custno,$company_id);					
	
				$result=mysql_query($query);	
				if(!$result) {die('Error : ' . mysql_error());}
				$custno=$custno + 1;

	
			}
			

		}	

		else
		{
			while($custno<=$no_of_cust)

			{
				$query=sprintf("update customer_shares_normal set no_of_shares=no_of_shares + (no_of_shares * %d)* 0.01 where customer_id= %d and company_id = '%s'",$no_of_shares,$custno,$company_id);					
	
				$result=mysql_query($query);	
				if(!$result) {die('Error: ' . mysql_error());}
				$custno=$custno + 1;
			}
			

		}	

	}

			?><script language="Javascript">
			window.location = "administrator.php"
			alert("Allotment of shares successful") ;
			</script><?


}

else
{
	include 'banner.php';
	$smarty->display("allotshares.tpl");

}
?>


