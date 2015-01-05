<?php

//verified !
include("header.php");
include("db.php");
session_start();


	if(isset($_POST['Submit']))
	{
		$q = sprintf("insert into sector_index (sector_name) values ('%s')",$_POST['textfield']);
		//print $q;
		$r = mysql_query($q);	
		if(!$r) die("could not insert :" . mysql_error());
	
	$q = "select * from sector_index order by sector_id";
	//print $q;
	$r1 = mysql_query($q);
	$sectors = array();
	$sector_ids = array();
	while($c = mysql_fetch_assoc($r1))
	{
		array_push($sectors,$c['sector_name']);
		array_push($sector_ids,$c['sector_id']);		
	}
	
	$smarty->assign("sectors",$sectors);
	$smarty->assign("sector_ids",$sector_ids);
	$smarty->display("addsector.tpl");
	
	//$q = "select * from sector_companies order by sector_id";
	//$r2 = mysql_query($q);

	
	}


?>
