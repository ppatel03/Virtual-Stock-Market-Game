<?php
require 'db.php';

$query=sprintf("Select * from company_shareprice");
$r=mysql_query($query);
$no_of_companies=mysql_num_rows($r);


$prev_shares = array();
while($c0 = mysql_fetch_assoc($r))//for every company in company_shareprice
{
	$q1 = sprintf("SELECT * FROM log_total_shares WHERE log_timestamp in (select MAX(log_timestamp) from log_total_shares where company_name = '%s'); ",$c0['company_name']);
	print $q1;
	$r1 = mysql_query($q1);
	if(!$r1) 
	{
		array_push($prev_shares,1);
	}
	else 
	{
		$cc = mysql_fetch_assoc($r1);
		array_push($prev_shares,$cc['total_shares']);
	}
}











?>