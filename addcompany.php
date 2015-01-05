<?php

//verified !
include("header.php");
include("db.php");
session_start();

if ($_POST['submit'])
{
$company_name= $_POST['company_name'];
$share_price= intval($_POST['share_price']);


$query=sprintf("insert into company_shareprice  (company_name,share_price)	values('%s',%d)",$company_name,$share_price);
$result=mysql_query($query);
if(!$result) {die('Error insertin to company_shareprice: ' . mysql_error());}

$q = "select MAX(company_id) as company_id from company_shareprice";
$r = mysql_query($q);
$c = mysql_fetch_assoc($r);

$q = sprintf("insert into sector_companies (sector_id,company_id) values (%d,%d)",$_POST['sector'],$c['company_id']);
print $q;
$r = mysql_query($q);
if(!$r) die("watever " . mysql_error());

if ($result !=1)

{


?><script language="Javascript">
			window.location = "administrator.php"
			alert("Failed to add company.The company to be added already exists") ;
			</script><?

}

else
	{
		
		?><script language="Javascript">
			window.location = "administrator.php"
			alert("You have successfully added the company <? echo $_POST['company_name'];  ?> ") ;
			</script><?
	}

}



else

?><script language="Javascript">
			window.location = "administrator.php"
			alert("Redirecting to administrator.php") ;
			</script><?
    
?>

