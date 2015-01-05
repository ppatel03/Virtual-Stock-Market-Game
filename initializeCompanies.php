<?php
require 'header.php';
require 'db.php';
session_start();
if(isset($_POST['Reset']))
{
	include 'banner.php';
	$smarty->assign("reset",1);
	$query=sprintf("truncate table sector_companies");
	$result=mysql_query($query);
	$q = "truncate table company_shareprice";
	$r =mysql_query($q);
	if(!$r) {   die(   "Error truncating table : " . mysql_error()  ) ;  }
	else $smarty->assign("success",'company_shareprice table successfully reseted.Now goto add company to add companies');

}
$smarty -> display ("initializeCompanies.tpl");



?>