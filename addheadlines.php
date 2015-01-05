<?php
include("header.php");
include("db.php");
require 'functions.php';
session_start();
if(isset($_POST['addHead']))
{
	$query=sprintf("insert into headlines (headline,flag) values ('%s','%d')",$_POST['textarea'],isset($_POST['checkbox']) );
	mysql_query($query);
	print "New Headline added with flag : " ;
	print $_POST['checkbox'];
}

if(isset($_POST['showHead']))
{
	
	
	$nums = array();
	foreach($_POST as $key=>$value)
   {
   			if(ereg("[0-9]+",$key))
				array_push($nums,$key);
	}
	
	if(count($nums) != 0)
	{	
		$query="update headlines set flag=1 where id = ";
		$query .= $nums[0];
		$i = 1;
		if($nums[$i])
		{
			$query .= " and " . $i;
			$i++;
		}
		mysql_query($query);
		print "New Headlines updated";
	}



}



$q = "select id,headline,flag from headlines order by flag desc";
$r = mysql_query($q);

?>
<html>
<head>
</head>
<body>
	<form id="form1" name="form1" method="post" action="addheadlines.php">
	<p><strong>Add Headline</strong></p>
  	<p><textarea name="textarea"></textarea></p>
	<p>Show Headline 	  
	  <input type="checkbox" name="checkbox" value="1" />
	</p>
	<p>
	   <input type="submit" name="addHead" value="Add Headline" />
	 </p>
</form>

<hr />


	<form id="form2" name="form2" method="post" action="addheadlines.php">
	
	  <table width="639" height="43"  cellspacing="10">
        <tr>
          <th width="508" scope="col">Headline</th>
          <th width="29" scope="col">Flag</th>
          <th width="48" scope="col">Show</th>
        </tr>
		<?php  while($c = mysql_fetch_assoc($r)) { ?>
        <tr>
          <td scope="col"><?php print $c['headline']; ?></td>
          <td scope="col"><?php print $c['flag']; ?></td>
          <td scope="col"><?php if($c['flag'] == 0) print '<input type="checkbox" name=' . $c['id'] . ' value=' . $c['id'] . ' />';?></td>
        </tr>
		<?php } ?>
      </table>
		<p>
	   <input type="submit" name="showHead" value="Show Checked Headlines" />
	 </p>
	</form>
</body>
</html>
