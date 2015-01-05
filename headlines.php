<?php
include("header.php");
include("db.php");
require 'functions.php';
session_start();

$no_of_headlines = 5;

//query for company names and prices
$q = "select company_name,share_price,inPrice from company_shareprice left join sector_companies on company_shareprice.company_id = sector_companies.company_id order by sector_id";
$r1 = mysql_query($q);

//query for getting sector indices
$q = "select * from sector_index order by sector_id";
$r2 = mysql_query($q);

//query for getting headlines
$q = "select * from headlines where flag=1 order by time desc limit " . $no_of_headlines;
$r3 = mysql_query($q);

//query for getting the two most recent prices one after another for a company
// $diff has new - old shareprice
$diff = array();
while($c = mysql_fetch_assoc($r1))
{
	$q = sprintf("select * from log_total_shares where company_id = %d order by log_timestamp desc limit 2",$c['company_id']);
	$r = mysql_query($q);
	
	$c0 = mysql_fetch_assoc($r);//1st record
	$new = $c0['share_price'];
	
	$c0 = mysql_fetch_assoc($r);//2nd record
	$old = $c0['share_price'];	
	
	$diff[$c['company_id']] = $new - $old ;	
}

$colors =array('blue','orange');



?>

<html>
<head>
</head>
<body>

<br>

<marquee scrolldelay=25 style="font-size:xx-large;">
<?php 
	
	$q = "select company_name,share_price from company_shareprice left join sector_companies on company_shareprice.company_id = sector_companies.company_id order by sector_id";
	$r1 = mysql_query($q);

  print "Share Prices :   ";
  while($c1 = mysql_fetch_assoc($r1))  
{
	
	if($diff[$c1['company_id']] >= 0 ) $pricecolor = "green";
	else $pricecolor = "red";
	
	print " || ";
	print $c1['company_name'] . " " . $c1['share_price'] ;
    
	print "<span style='color:".$pricecolor.";'>";
	print  "(";
	if($diff>=0) print "+";
      print $diff[$c1['company_id']];
	print  ")";
    print "</span>";
}
  ?>
</marquee>

<br>

<marquee SCROLLDELAY=50 style="font-size:x-large;">


<?php   
	$i = 0;
print "Sector Index :   ";

while($c2 = mysql_fetch_assoc($r2))  
{
	if($i==0)	{	print "";	$i = 1;	}
	else 		{	print "";	$i = 0; }
	print " || ";
	print $c2['sector_name'] . " " . $c2['sector_index'] ;
	print "";
}
?>
</marquee>

<br>
<marquee SCROLLDELAY=75 style="font-size:xx-large;">

<?php 
	$i = 0;
print "Headlines  : ";
   while($c3 = mysql_fetch_assoc($r3))  
{
	if($i==0)	{	print "";	$i = 1;	}
	else 		{	print "";	$i = 0; }
	print " || ";
	print  $c3['headline'];
	print "";
}
?>
</marquee>
<?
$result = mysql_query("SELECT * FROM company_shareprice");

echo "<table border='1'>
<tr>
<th>COMPANY NAME</th>
<th>SHARE PRICES</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['company_name'] . "</td>";
  echo "<td>" . $row['share_price'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


?>


</body>
</html>