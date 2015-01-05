<?php
include("header.php");
include("db.php");
include("functions.php");
session_start();
//whenever client logs in ... function debit_loan is called
debit_loan();

if ($_POST['submit'])

{
				checkSession();
			include 'banner.php';
			$customer_id=intval($_POST['customer_id']);
			$service_name=($_POST['service_name']);
			if($customer_id == NULL)
			{
				?><script language="Javascript">
				window.location = "client.php"
				alert("Please enter a valid customer id") ;
				</script><?	
			}
			if ($service_name=="Loan")
			
			{
			 
					 $loan_limit=100000;//also edit in loan.php file
				
					$query=sprintf("Select * from rate_of_interest order by time_period");
			
					$result=mysql_query($query);
			
					$time_period=array();
					$TimePeriod=array();
					$rate_of_interest=array();
			
					while($current_row=mysql_fetch_assoc($result))
					{
						$time_period[$current_row['time_period']]=$current_row['time_period'];
						array_push($TimePeriod,$current_row['time_period']);
						array_push($rate_of_interest,$current_row['rate_of_interest']);
					}
			
			
			$smarty->assign("time_period",$time_period);
			$smarty->assign("rate_of_interest",$rate_of_interest);
			$smarty->assign("customer_id",$customer_id);
			
				$query=sprintf("select  current_balance from customer_balance where customer_id = %d",$customer_id);	
				$result=mysql_query($query);
			
				$balance_result=mysql_fetch_assoc($result);
				$current_balance=$balance_result["current_balance"];
			
			$smarty->assign("current_balance",$current_balance);
			
				$loanperiod=array();
			
				  $query=sprintf("Select sum(loan_amount) as sum from customer_bank_loan where customer_id=%d",             $customer_id);
				$result=mysql_query($query);
				
				$row=mysql_fetch_assoc($result);
				$breaker=intval($row['sum']);
				
			$smarty->assign("loan_allowed",$loan_limit-$breaker); 
			$smarty->assign("loan_active",$breaker); 
			
			
			$smarty->assign("time_period",$time_period);
			$smarty->assign("TimePeriod",$TimePeriod);
			$smarty->assign("rate_of_interest",$rate_of_interest);
			
				  
			
			
				   $smarty->display("loan.tpl");
			}
			
			else if($service_name=="NormalTrading")
			{
			//print '<div align = "center"><h3> ' .$service_name. ' </h3></div>';
	//		
			$query=sprintf("Select * from company_shareprice left join sector_companies on company_shareprice.company_id = sector_companies.company_id order by sector_id");
			$result=mysql_query($query);
			
			$sector_ids = array();
			$company_names=array();
			$company_ids=array();
			$share_prices=array();
			$shares_held=array();
			while($current_row=mysql_fetch_assoc($result))
			{
			  array_push($company_names,$current_row['company_name']);
			  array_push($share_prices,$current_row['share_price']);
			  array_push($company_ids,$current_row['company_id']);
  			  array_push($sector_ids,$current_row['sector_id']);
			
			}
			
			
			
			$query=sprintf("Select * from customer_balance where customer_id='%s'",$_POST['customer_id']);
			$result=mysql_query($query);
			$balance_result=mysql_fetch_assoc($result);
			$balance=$balance_result["current_balance"];
			 
			
			foreach($company_ids as $company_id)
			{
			  $query=sprintf("Select no_of_shares from customer_shares_normal where customer_id='%s' and company_id='%s'",
					 $_POST['customer_id'],
					 mysql_real_escape_string($company_id));
			
			  $result=mysql_query($query);
			  $current_row=mysql_fetch_assoc($result);
			  array_push($shares_held,$current_row['no_of_shares']);
			}
			
		//				
			
			$sector_names = array();
			foreach($sector_ids as $sector_id)
			{
				$q100 = "select * from sector_index where sector_id = " . $sector_id;
				$r100 = mysql_query($q100);
				$c = mysql_fetch_assoc($r100);
				array_push($sector_names,$c['sector_name']);
			}
			#print_r($shares_held);
			$smarty->assign('sector_names',$sector_names);			
			$smarty->assign('company_ids',$company_ids);
			$smarty->assign('company_names',$company_names);
			$smarty->assign('share_prices',$share_prices);
			$smarty->assign('customer_id',$_POST['customer_id']);
			$smarty->assign('current_balance',$balance);
			$smarty->assign('shares_held',$shares_held);
			
			$smarty->display('share_normal.tpl');
			}
			
			
			
			
			
			else if ($service_name=="Shortselling")
			{
			//print '<div align = "center"><h3> ' .$service_name. ' </h3></div>';
			$query=sprintf("Select * from company_shareprice");
			$result=mysql_query($query);
			
			$company_names=array();
			$company_ids=array();
			$share_prices=array();
			
			while($current_row=mysql_fetch_assoc($result))
			{
			  array_push($company_names,$current_row['company_name']);
			  array_push($company_ids,$current_row['company_id']);
			  array_push($share_prices,$current_row['share_price']);
			}
			
			$query=sprintf("Select * from customer_balance where customer_id='%s'",$_POST['customer_id']);
			$result=mysql_query($query);
			$balance_result=mysql_fetch_assoc($result);
			$balance=$balance_result["current_balance"];
			
			
			
			
			$query=sprintf("Select * from company_shareprice");
			$result=mysql_query($query);
			
			$company_names=array();
			$company_ids=array();
			$share_prices=array();
			$shares_held=array();
			
			while($current_row=mysql_fetch_assoc($result))
			{
			  array_push($company_names,$current_row['company_name']);
			  array_push($company_ids,$current_row['company_id']);
			  array_push($share_prices,$current_row['share_price']);
			}
			
			
			
			foreach($company_ids as $company_id)
			{
			  $query=sprintf("Select no_of_shares from customer_shares_shortselling where customer_id='%s' and company_id='%s'",
					 $_POST['customer_id'],
					 mysql_real_escape_string($company_id));
			
			  $result=mysql_query($query);
			  $current_row=mysql_fetch_assoc($result);
			  array_push($shares_held,$current_row['no_of_shares']);
			}
			
			
			//print_r($shares_held);
			$smarty->assign('company_ids',$company_ids);
			$smarty->assign('company_names',$company_names);
			$smarty->assign('share_prices',$share_prices);
			$smarty->assign('customer_id',$_POST['customer_id']);
			$smarty->assign('current_balance',$balance);
			$smarty->assign('shares_held',$shares_held);
			
			$smarty->display('share_short_selling.tpl');
			
				 
			}
			
			
			
			
			
			
			
			
			
				else if($service_name=="Batting")
			{
			//print '<div align = "center"><h3> ' .$service_name. ' </h3></div>';
	//		
			$query=sprintf("Select * from company_shareprice left join sector_companies on company_shareprice.company_id = sector_companies.company_id order by sector_id");
			$result=mysql_query($query);
			
			$sector_ids = array();
			$company_names=array();
			$company_ids=array();
			$share_prices=array();
			$shares_held=array();
			while($current_row=mysql_fetch_assoc($result))
			{
			  array_push($company_names,$current_row['company_name']);
			  array_push($share_prices,$current_row['share_price']);
			  array_push($company_ids,$current_row['company_id']);
  			  array_push($sector_ids,$current_row['sector_id']);
			
			}
			
			
			
			$query=sprintf("Select * from customer_balance where customer_id='%s'",$_POST['customer_id']);
			$result=mysql_query($query);
			$balance_result=mysql_fetch_assoc($result);
			$balance=$balance_result["current_balance"];
			 
			
			foreach($company_ids as $company_id)
			{
			  $query=sprintf("Select no_of_shares from customer_shares_normal where customer_id='%s' and company_id='%s'",
					 $_POST['customer_id'],
					 mysql_real_escape_string($company_id));
			
			  $result=mysql_query($query);
			  $current_row=mysql_fetch_assoc($result);
			  array_push($shares_held,$current_row['no_of_shares']);
			}
			
		//				
			
			$sector_names = array();
			foreach($sector_ids as $sector_id)
			{
				$q100 = "select * from sector_index where sector_id = " . $sector_id;
				$r100 = mysql_query($q100);
				$c = mysql_fetch_assoc($r100);
				array_push($sector_names,$c['sector_name']);
			}
			#print_r($shares_held);
			$smarty->assign('sector_names',$sector_names);			
			$smarty->assign('company_ids',$company_ids);
			$smarty->assign('company_names',$company_names);
			$smarty->assign('share_prices',$share_prices);
			$smarty->assign('customer_id',$_POST['customer_id']);
			$smarty->assign('current_balance',$balance);
			$smarty->assign('shares_held',$shares_held);
			
			$smarty->display('batting.tpl');
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			if ($service_name=="MutualFund")
			
			{
				
				$smarty->assign("customer_id",$customer_id);
				$query=sprintf("select  current_balance from customer_balance where 	customer_id = %d",$customer_id);	
				$result=mysql_query($query);
			
				$balance_result=mysql_fetch_assoc($result);
				$current_balance=$balance_result["current_balance"];
			
				$smarty->assign("current_balance",$current_balance);
			
				
				$query=sprintf("select mutual_fund_balance from customer_mutual_fund where 	customer_id = %d",$customer_id);	
				$result=mysql_query($query);
			
				$balance_result=mysql_fetch_assoc($result);
				$mutual_fund_balance=intval($balance_result["mutual_fund_balance"]);
			
				$smarty->assign("mutual_fund_balance",$mutual_fund_balance);
				  
				$smarty->display("mutualfund.tpl");
			}



}

else if (   verify()  )
{
		checkSession();
		include 'banner.php';
		$query=sprintf("Select * from shortselling_flag");
		$result=mysql_query($query);
		$row=mysql_fetch_assoc($result);
		$flag=$row['flag'];
		//print $flag;
		
		
		if($flag==1)  
		{
		$serviceNames=array ("NormalTrading"=>"Normal Trading","Shortselling"=>"Short selling","Loan"=>"Loan","MutualFund"=>"Mutual Fund","Batting"=>"Betting");
		}
		else
		{
		$serviceNames=array ("NormalTrading"=>"Normal Trading","Loan"=>"Loan","MutualFund"=>"Mutual Fund","Batting"=>"Battin");
		}
		$smarty->assign("customer_id",$_SESSION['customer_id']);
		$smarty->assign("servicenames",$serviceNames);
		$smarty->display("client.tpl");
}

else
{
	//$_SESSION['site'] = "client.php";
	header("location:login.php");
}

?>