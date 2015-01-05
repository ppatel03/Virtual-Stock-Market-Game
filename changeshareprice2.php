<?php
include("header.php");
include("db.php");
require 'functions.php';
session_start();
$query=sprintf("Select * from company_shareprice");
$r=mysql_query($query);
$no_of_companies=mysql_num_rows($r);
//print $no_of_companies;
 
 
if ($_POST['calculate_shareprice'])
{
include 'banner.php';

$GautamsConstant=0.062745;

$company_names=array();
$share_prices=array();
$company_ids = array();


	while($current_row=mysql_fetch_assoc($r))
		{
  			array_push($company_names,$current_row['company_name']);
 			array_push($share_prices,$current_row['share_price']);
			array_push($company_ids,$current_row['company_id']);
		}

	
$total_shares_normal = array();
$total_shares_shortselling = array();

calculate_total_shares($total_shares_normal,$total_shares_shortselling);
	
	

$prev_shares = array();
$query=sprintf("Select * from company_shareprice");
$r=mysql_query($query);
while($c0 = mysql_fetch_assoc($r))//for every company in company_shareprice
{
	//print 'in';
	$q1 = sprintf("SELECT * FROM log_total_shares WHERE log_timestamp in (select MAX(log_timestamp) from log_total_shares where company_id = '%s') AND company_id = '%s' ",$c0['company_id'],$c0['company_id']);
	//print $q1;
	$r1 = mysql_query($q1);
	$cc = mysql_fetch_assoc($r1);
	if(		(!$r1) || ($r1 == NULL)	|| !$cc) 
	{
		//die ('total shares in log_total_shares is NULL' . mysql_error());
		array_push($prev_shares,'1');
	}
	else 
	{
		//print 'there';
		
		//print $cc['total_shares'];
		array_push($prev_shares,$cc['total_shares']);
	}
}
//print_r($prev_shares);
//calculation for converting mutual fund amount to shares
$qm = "select SUM(mutual_fund_balance) as sum from customer_mutual_fund";
$rm = mysql_query($qm);
$cm = mysql_fetch_assoc($rm);
$total_mutual = $cm['sum'];
$each_mutual = $total_mutual / $no_of_companies;
//print 'total mutual = ' . $total_mutual . ' each mutual = ' . $each_mutual;

$count=0;
$new_prices=array();
$curr_total_shares = array();
$maximum_variation = 25;//change this value to affect the max possible variation in the share price

	while ($count<$no_of_companies)//for every company
	{
	$total_shares=($total_shares_normal[$count] - $total_shares_shortselling[$count]);
	//now add the shares due to mutual fund as well
	$mutual_shares = $each_mutual / $share_prices[$count] ;
	$total_shares = $total_shares + $mutual_shares;
	//print '<p>prev shares = ' . $prev_shares[$count] . ' mutual shares of ' . $count . ' company = ' . $mutual_shares . ' and total shares = '. $total_shares . '</p>';
	
	array_push($curr_total_shares,intval($total_shares));
	
	if ($prev_shares[$count] == 0) $prev_shares[$count] = 1;
	
	$new_shareprice = 
       (	$share_prices[$count] +
              	(
                	(     ($total_shares-$prev_shares[$count])   /   $prev_shares[$count]      ) 
                       
                    * pow($share_prices[$count],5/4) * pow(floatval($GautamsConstant),5/4)
				) 
           
		);
		
	$neg = 0;
	$diff = $new_shareprice - $share_prices[$count] ;
	//print '<p> diff is '.$diff . '</p>';
	
	
	if($diff < 0) {$diff = - $diff; $neg = 1;} //diff is the unsigned difference 
	if($diff > $maximum_variation) 
	{
		if(!$neg)	
		$new_shareprice = $share_prices[$count] + $maximum_variation*$share_prices[$count]/100 ;
		else 		
		$new_shareprice = $share_prices[$count] - $maximum_variation*$share_prices[$count]/100 ;
			
	}
	
	array_push($new_prices,intval($new_shareprice));
	


/*	$query=sprintf("update company_shareprice set total_shares= %d where company_id = %s",$total_shares,$company_ids[$count]);
	$result=mysql_query($query);
	
	$query=sprintf("update company_shareprice set share_price= %d where company_id = %s",$new_shareprice,$company_ids[$count]);
	$result=mysql_query($query);	*/

	$count=$count+1;
	}


$smarty->assign("company_id",$company_ids);
$smarty->assign("company_names",$company_names);
$smarty->assign("share_prices",$share_prices);
$smarty->assign("total_shares_at_last_shareprice",$prev_shares);
$smarty->assign("current_total_shares",$curr_total_shares);
$smarty->assign("projected_shareprice",$new_prices);


$smarty->display("calculated_prices.tpl");
}

else if (isset($_POST['change_prices']))
{
include 'banner.php';
	$query=sprintf("Select * from company_shareprice");
	$r=mysql_query($query);
	$prevShareprice = array();
	while ($companies = mysql_fetch_assoc($r))//for every company
	{
	
	array_push($prevShareprice,$companies['share_price']);
	$str = $companies[company_id];
	$query=sprintf("update company_shareprice set share_price= %d where company_id = %d",intval($_POST[$str]),$companies[company_id]);
	$result=mysql_query($query);
	if(!$result) {die('Error : ' . mysql_error());}
	}
	
	$q = "select * from sector_index order by sector_index";
	$r = mysql_query($q);
	$sector_ids = array();
	while($c = mysql_fetch_assoc($r))
		array_push($sector_ids,$c['sector_id']);
//	$sector_companies = array[][];
	foreach($sector_ids as $sector_id)
	{
		$q  = "select * from sector_index where sector_id = " . $sector_id;
		$result = mysql_query($q);
		$c100=mysql_fetch_assoc($result);
		
		$q = "select * from company_shareprice left join sector_companies on company_shareprice.company_id = sector_companies.company_id where sector_id = " . $sector_id;
		$r = mysql_query($q);
		$sum = 0;
		$num = 0;
		while($c = mysql_fetch_assoc($r))
		{
			$sum = $sum + $c['share_price'];		
			$num ++;
		}
		if($num == 0) $num = 1;
		$index = $sum / $num ;
		$q = "update sector_index set sector_index = " . $index . ",prev_index=" . $c100['sector_index'] . " where sector_id = " . $sector_id  ;	
		$r = mysql_query($q);
	}
	
	
	
	
	
	//if(isset($_POST['update_mutual_fund']))
	
	//print $prevShareprice;
	$percent = calculateMutualPercent($prevShareprice);
	//$percent = $percent * 7;
	
	$smarty->assign("mutual_percent",$percent);
	//$smarty->assign("message","You have successfully updated the shareprices");
	?><script language="Javascript">
	//window.location = "something.php"
	alert("You have successfully updated the shareprices") ;
	</script><?
	$smarty->display("mutual_fund_percent.tpl");


	

}


?>