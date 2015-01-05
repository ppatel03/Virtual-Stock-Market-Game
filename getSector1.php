<?php

 require('db.php');
 

 # generic code to get sector information

 $sector_number = $_GET['sector'];
 
 $query = sprintf("Select sector_id ,sector_index, sector_name from sector_companies natural join sector_index where sector_id=%d",$sector_number);
 $result = mysql_query($query);

 $row = mysql_fetch_assoc($result);
 echo "&s=".$row['sector_name'];

 $sector_id = $row['sector_id'];

 $query = sprintf("Select company_name,share_price from company_shareprice natural join sector_companies where sector_id=%d",$sector_id);
 $result = mysql_query($query);
 if(!$result)
    print mysql_error();
 $i=1;
 while($row = mysql_fetch_assoc($result))
 {

   echo "&c".$i."name=".$row['company_name'];
   echo "&c".$i."price=".$row['share_price'];
   
   $i++;
 }

 if($i < 4 ) {
   while($i <= 4 ) {
        echo "&c".$i."name="." ";
		   echo "&c".$i."price="."";
	      $i=$i+1;
		}
	}
  


?>
 

















