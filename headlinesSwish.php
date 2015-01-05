<?php

 require('db.php');


 # generic code to fetch `n` headlines

$no_of_headlines = $_GET['no'];

$query = sprintf("Select * from headlines where flag=1 order by time desc limit %d",$no_of_headlines);

$result = mysql_query($query);

$i=1;
while($row=mysql_fetch_assoc($result)) {

  echo "&h".$i."=".$row['headline'];
 $i=$i+1;

}


?>