<html>
<head>

<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">

</head>
<BODY>
<form name="add_company" method="post" action="addcompany.php">
<BR><BR>

<div style="margin-left:10%; margin-right:10%; margin-top:2%">

<h3 align="left">EXISTING COMPANY NAMES</h3>




<table align="left"cellpadding="10" cellspacing="10">
<tr>
<TH>Company Name</TH>
  <TH>Share Price</TH> 
</tr>


{section name=companies loop=$company_names}

<TR>

<TD>{$company_names[companies]}</TD>
<TD>{$share_prices[companies]}</TD>


</TR>
{/section}



</table>












<BR><BR>
<h3 align="center">ADD COMPANY</h3>


<table align="right" cellpadding="10" cellspacing="10">


<TR>

 <TD align="right">Enter Company Name</TD>
 <td><input type="text" name="company_name" value=""></td>

</TR>


<TR>

 <TD>Enter Shareprice</TD>
 <td><input type="text" name="share_price" value=""></td>

</TR>

<TR>

 <TD>Enter Sector</TD>
 <td><select name="sector"  >
 
 	{html_options options=$sec selected=$myselect}
  
 
 	</select></td>

</TR>

<tr>
<td><input type="submit" name="submit" value="ADD "></td>
</tr>


</table>




</div>

</form>


</body>
</html>

