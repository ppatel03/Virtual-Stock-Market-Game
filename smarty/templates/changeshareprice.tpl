<html>
<head>
<title>VSM CHANGE SHAREPRICE</title>
<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">




</head>
<BODY>

<BR><BR>
<h3 align="center">CHANGE SHARE PRICE</h3>









<table align="left" cellpadding="5" cellspacing="5">


<tr>
<TH>Company Name</TH>
  <TH>Current SharePrice</TH> 
</tr>


{section name=company_name loop=$company_names}

<TR>

<TD>{$company_names[company_name]}</TD>
<TD>{$share_prices[company_name]}</TD>


</TR>
{/section}


</table>

<table align="right" cellpadding="10" cellspacing="10">
<tr>

 

</tr>








</table>






<div align="center">
<form name="changeshareprice" method="post" action="changeshareprice.php">
  <input type="submit" name="calculate_shareprice" value="CALCULATE SHAREPRICE ">
</form>

</div>



</body>
</html>

