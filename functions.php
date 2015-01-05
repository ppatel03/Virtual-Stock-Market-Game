<?php
require 'db.php';

function checkSession()
{
	$end=time();
    include("start_timer.php");
    include("end_timer.php"); 
}


function calcElapsedTime($time)
//takes start_time : no of seconds ...ie unix timestamp and returns no of minutes since then
{

// calculate elapsed time (in seconds!)
$diff = time()-$time;
$daysDiff = 0; $hrsDiff = 0; $minsDiff = 0; $secsDiff = 0;

$sec_in_a_day = 60*60*24;
while($diff >= $sec_in_a_day){$daysDiff++; $diff -= $sec_in_a_day;}
$sec_in_an_hour = 60*60;
while($diff >= $sec_in_an_hour){$hrsDiff++; $diff -= $sec_in_an_hour;}
$sec_in_a_min = 60;
while($diff >= $sec_in_a_min){$minsDiff++; $diff -= $sec_in_a_min;}
$secsDiff = $diff;

return ($minsDiff);

}




function calculate_total_shares(&$t1,&$t2)
{
		$query=sprintf("Select SUM(t1.no_of_shares) as sum from customer_shares_normal AS t1 INNER JOIN company_shareprice AS t2 ON t1.company_id = t2.company_id group by t1.company_id");
		$result=mysql_query($query);
		if(!$result) {die('Error : ' . mysql_error());}
		//$total_shares_normal=array();
	
		while($current_row=mysql_fetch_assoc($result))
			{
				array_push($t1,$current_row['sum']);			
			}	
		//$t1 = $total_shares_normal;
	
		$query=sprintf("Select SUM(t1.no_of_shares) as sum from customer_shares_shortselling AS t1 INNER JOIN company_shareprice AS t2 ON t1.company_id = t2.company_id group by t1.company_id");
		$result=mysql_query($query);
		if(!$result) {die('Error : ' . mysql_error());}
		//$total_shares_shortselling=array();
		
		while($current_row=mysql_fetch_assoc($result))
			{
				array_push($t2,$current_row['sum']);
			//print $current_row['sum'];
			}
		//$t2 = $total_shares_shortselling;


}

function verify ()
{//print 'here';
	if($_SESSION['login'] == 1 )
		{
		//print 'wat d ';
		return 1;
		}
		
	if(isset($_POST['login']))
	{
		$q = sprintf("select * from administrator where username = '%s' AND password = '%s'",mysql_real_escape_string($_POST['txtuser']),mysql_real_escape_string($_POST['txtpass']));
	//	print $q;
	
		$r = mysql_query($q);
		
		
		if(mysql_num_rows($r)!= 1)
		{
			//print 'here';
			$q1 = sprintf("select * from customer where customer_id = '%s' AND password = '%s'",mysql_real_escape_string($_POST['txtuser']),mysql_real_escape_string($_POST['txtpass']));
		//print $q;
			$r1 = mysql_query($q1);
			if(mysql_num_rows($r1)!= 1)
			{
				return 0;//print '0';
			}
			else 
			{
				$_SESSION['login'] = 1;
				$_SESSION['user'] = "client";
				$_SESSION['customer_id'] = $_POST['txtuser'];
				return 1;
			}
			
		}

		else
		{
			//$admin = 1;
			$_SESSION['login'] = 1;
			$_SESSION['user'] = "administrator";
			return 1;
		}
		
	}
	else
	{
		return 0;
	}

}

function debit_loan()
{

/* # algorithm
   1. for all records in rate of interest table
        get the rate of interest for different time periods and store it into an array 
  
   2. for all records in loan table
      if ( current time - the timestamp has exceed the load period )
        temp_loan_id= the load id of the current row
        debit account from the balance of the customer id with rate of interest
        delete current row from the table
*/


# step 1

$rate_of_interest=array();

$query=sprintf("Select * from rate_of_interest order by time_period");
$result=mysql_query($query);

while($row=mysql_fetch_assoc($result)) {
 $rate_of_interest[$row['time_period']]=$row['rate_of_interest'];

}

# step 2

$query=sprintf("SELECT loan_id,customer_id,loan_amount,loan_period,UNIX_TIMESTAMP(start_time) as start FROM customer_bank_loan ");
//print $query;
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)) 
{
	$minPassed = calcElapsedTime($row['start']);
	if($minPassed >= $row['loan_period'])			
	{
			  $loan_id=$row['loan_id'];
			  $customer_id=$row['customer_id'];
			  $loan_amount=$row['loan_amount'];
			  //print $loan_amount;
			  $amount_debit=$loan_amount + ( $rate_of_interest[$row['loan_period']]*$loan_amount/100 );
			  //print $amount_debit;
			  $query=sprintf("Update customer_balance set current_balance=current_balance -  %d where customer_id=%d",
								intval($amount_debit),
								$customer_id
							);
			  mysql_query($query);
			  $query=sprintf("Delete from customer_bank_loan where loan_id=%d",
							  $loan_id);
			  mysql_query($query);
	}
 } 




}


function calculateMutualPercent(&$prevPrices)
{
	$q = "select * from company_shareprice";
	$r1 = mysql_query($q);
	$old_total = 0;
	$new_total = 0;
	$count =0;
	while($newPrices = mysql_fetch_assoc($r1))
	{
		$old_total = $old_total + $prevPrices[$count];
		$new_total = $new_total + $newPrices['share_price'];
		$count = $count +1;
	}
	//print 'old ' . $old_total . ' new ' . $new_total;
	$diff = $new_total - $old_total;
	$percent_change = 100 * ($diff / $old_total) ;
	return 	$percent_change ;
}

function display()
{			?> 
		    <h4 align="left">&nbsp;</h4>
		    <h4 align="left">&nbsp;</h4>
		    <h4 align="left">&nbsp;</h4>
		    <h4 align="left"><a href = 'client.php'>Back to main page</a></h4>
		    <?
}

function verify_customer ()
{
	if($_SESSION['login_customer'] == 1 )
		return 1;
	
	if(isset($_POST['login']))
	{
		$q = sprintf("select * from customer where customer_id = '%s' AND password = '%s'",mysql_real_escape_string($_POST['txtuser']),mysql_real_escape_string($_POST['txtpass']));
		//print $q;
		$r = mysql_query($q);
		if(mysql_num_rows($r)!= 1)
		{
			print('<p>Login failed</p><br>');
			return 0;
		}
		else
		{
			$_SESSION['login_customer'] = 1;
			$_SESSION['customer_id'] = $_POST['txtuser'];
			return 1;
		}
	
	
	}	
	else
	{
		return 0;
	}

}


function display_balance($id)
{
	$query = "select current_balance from customer_balance where customer_id =  " . $id;
	$r = mysql_query($query);
	$c = mysql_fetch_assoc($r);
	print "<p><b>Current Balance = Rs. " . $c['current_balance'] . "</b></p>";
}
php?>