<?php
include("header.php");
include("db.php");
session_start();
require 'functions.php';

if ($_POST['submit'])

{
	
	checkSession();	
	include 'banner.php';
	$service_name=($_POST['service_name']);
	
	//$company_names and $share_prices stores current share prices of all companies		
				
				$query=sprintf("Select * from company_shareprice");
		
				$result=mysql_query($query);
		
				$company_names=array();
				$company_ids=array();
				$share_prices=array();
				$cnames = array();
				while($current_row=mysql_fetch_assoc($result))
				{
					$cnames[$current_row['company_id']] = $current_row['company_name'];
					array_push($company_names,$current_row['company_name']);
					array_push($company_ids,$current_row['company_id']);
					array_push($share_prices,$current_row['share_price']);
				}
		//end company names and share prices
		$smarty->assign("cnames",$cnames);
		$smarty->assign("company_names",$company_names);
		$smarty->assign("share_prices",$share_prices);
		$smarty->assign("company_ids",$company_ids);
		
		$q = "select * from sector_index order by sector_id";
		
		$r1 = mysql_query($q);
		$sectors =array();
		$sector_ids = array();
		while($c=mysql_fetch_assoc($r1))
		{
				array_push($sectors,$c['sector_name']);
				array_push($sector_ids,$c['sector_id']);
		}
		$smarty->assign("sectors",$sectors);
		$smarty->assign("sector_ids",$sector_ids);		
		

			  

	if ($service_name=="AddCompany")
		{
				$q = "select * from sector_index order by sector_id";
				$r2 = mysql_query($q);
				$c1 = mysql_fetch_assoc($r2);
				$myselect = $c1['sector_id'];
				$r1 = mysql_query($q);
				$sec = array();
				while($c=mysql_fetch_assoc($r1))
					$sec[$c['sector_id']] = $c['sector_name'];
				$smarty->assign("sec",$sec);
				$smarty->assign("myselect",$myselect);
				
			   $smarty->display("addcompany.tpl");
			
		}
	
	else if ($service_name=="AddSector")
		{
		
			   $smarty->display("addsector.tpl");
			
		}
		
	else if ($service_name=="AllotShares")
	{
	
			$smarty->display("allotshares.tpl");
	
	}
	
	
	else if ($service_name=="InitializeGame")
	
	{
			$smarty->display("initializegame.tpl");
	
	}
	
	
	else if ($service_name=="ShortSelling")
	
	{
			$smarty->display("shortsellingflag.tpl");
	}
	
	
	
	else if ($service_name=="Betting")
	
	{
			$smarty->display("bettingcheck.tpl");
	}
	
	
	
	
	
	
	
	
	else if($service_name=="ChangeSharePrice")
	{
			
			//$company_names and $share_prices stores current share prices of all companies		
		
		$query=sprintf("Select * from company_shareprice");
//print $query;
		$result=mysql_query($query);

		$company_names=array();
		$share_prices=array();

		while($current_row=mysql_fetch_assoc($result))
		{
  			array_push($company_names,$current_row['company_name']);
 			array_push($share_prices,$current_row['share_price']);
		}
//end company names and share prices

$smarty->assign("company_names",$company_names);
$smarty->assign("share_prices",$share_prices);


$smarty->display("changeshareprice.tpl");
			
			
			
	}
	else if ($service_name=="InitializeCompanies")
		$smarty->display("initializeCompanies.tpl");
	
	
	
	



}



else if (verify())
	{
	checkSession();	
	//include 'banner.php';
	$serviceNames=array ("InitializeCompanies"=>"Initialize Companies","AddSector"=>"Add Sector","AddCompany"=>"Add Company","InitializeGame"=>"Initialize Game","AllotShares"=>"Allot Shares","ChangeSharePrice"=>"Change Share Price","ShortSelling"=>"Short Selling","Betting"=>"Betting");
	
	 
	
	$smarty->assign("servicenames",$serviceNames);
	
	$smarty->display("administrator.tpl");
	}
	
else 
{
	$_SESSION['site'] = "administrator.php";
	header("location:login.php");
}	



?>