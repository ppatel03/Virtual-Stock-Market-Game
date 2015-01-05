<?php

//verified !

include("header.php");
include("db.php");

if ($_POST['submit'])
{ 
	$flag=$_POST['flag'];
	$query=sprintf("select no_of_customers from shortselling_flag");
	$result=mysql_query($query);
	$current_row=mysql_fetch_assoc($result);
 	$no_of_cust=$current_row['no_of_customers'];
	
	if ($flag=='ENABLE')
	{
		//print 'here';
		$query=sprintf("update shortselling_flag set flag =%d",1);
		$result=mysql_query($query);
	
	}
	else
	{	//print '123';
		$query=sprintf("update shortselling_flag set flag =%d",0);
		$result=mysql_query($query);
	}
	
	if(isset($_POST['buy_all_shares']) )
		{
		//print 'watever';
		
			$custno = 1;
		
			while($custno<=$no_of_cust)							//for every customer
		
			{
		
					$query=sprintf("Select * from company_shareprice");
					$result=mysql_query($query);
					
					$company_ids=array();
		
					while($current_row=mysql_fetch_assoc($result))
					{
						array_push($company_ids,$current_row['company_id']);
					
					}
					$companyno=count($company_ids);
					$count=0;
		
					while($count < $companyno)				//for every customer for every company
		
					{
		
						
						$query=sprintf("select no_of_shares from customer_shares_shortselling where customer_id=%d 					and company_id='%s'",$custno,$company_ids[$count]);
						//print $query;
			
						$result=mysql_query($query);	
				
		
		
						$current_row=mysql_fetch_assoc($result);
						$shareno=$current_row['no_of_shares'];
						
						$query=sprintf("select share_price from company_shareprice where 									company_id='%s'",$company_ids[$count]);
		
		
						$result=mysql_query($query);	
		
		
		
						$current_row=mysql_fetch_assoc($result);
						$shareprice=$current_row['share_price'];
		
						$ssprice=$shareno*$shareprice;
		
		
		
						$query=sprintf("update customer_balance set current_balance= current_balance - %d where 					customer_id=%d",$ssprice,$custno);
						$result=mysql_query($query);//buying all shares so deduct amount from customer balance
						$count=$count+1;
					}
			$custno=$custno + 1;
			}
		
			}
			
//now dat all shares hav been bought ... reinitialise shortselling
			$query=sprintf("truncate table customer_shares_shortselling");
			$result=mysql_query($query);

				$custno = 1;

	while($custno<=$no_of_cust)

	{
		
			$query=sprintf("select * from company_shareprice");
			$result=mysql_query($query);
			//print $query;
			$company_ids=array();

			while($current_row=mysql_fetch_assoc($result))
			{
  				array_push($company_ids,$current_row['company_id']);
 			
			}
			$companyno=count($company_ids);
			$count=0;
			while($count < $companyno)
			{
				$query=sprintf("insert into customer_shares_shortselling values(%d,'%s',%d)",$custno,$company_ids[$count],0);
				//print $query;
				$result=mysql_query($query);
				$count=$count+1;
			}
			$custno = $custno + 1;

	}
	?><script language="Javascript">
		window.location = "administrator.php"
		alert("You have successfully completed the transaction") ;
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


