<?php

require 'header.php';
require 'db.php';
session_start();
require 'functions.php';

if (isset($_POST['update_mutual_fund']))
{
	if(isset($_POST['checkbox_update_mutual_fund']))
	{
		$per = $_POST['percent'];
		$q = sprintf("update customer_mutual_fund set mutual_fund_balance = mutual_fund_balance + (%d * mutual_fund_balance / 100)",$per);
		print $q;
		$r = mysql_query($q);
		if(!$r) {die('Error updating: ' . mysql_error());}
		else 
		{
		?>
		<script language="Javascript">
		window.location = "administrator.php"
		alert("Mutual Fund Balance successfully updated") ;
		</script>
		<? }
	}
}




?>