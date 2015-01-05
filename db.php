<?php

$mysql_username="root";
$mysql_password="";
$mysql_databasename='vsm123';
$mysql_server="127.0.0.1";

// Connecting, selecting database
$mysql_link = mysql_connect($mysql_server,$mysql_username,$mysql_password) 
							or die('Could not connect: ' . mysql_error());
mysql_select_db($mysql_databasename) or die('Could not select database');

?>