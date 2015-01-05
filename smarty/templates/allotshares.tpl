<html>
<head>
<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">


</head>
<BODY>
<form name="shortselling_flag" method="post" action="allotshares.php">
<BR><BR>

<div style="margin-left:10%; margin-right:10%; margin-top:1%">
<table align="left"cellpadding="10" cellspacing="10">
<tr><h3 align="left">EXISTING COMPANIES</h3></tr>
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

<div style="margin-left:60%; margin-right:20%; margin-top:1%">

<h3 align="center">ALLOT SHARES</h3>




<table cellpadding="10" cellspacing="10">





<TR>

 <TD>Select Company</TD>
 <td>
 <select name="company_id" >
   {html_options values=$company_ids output=$company_names }
</select></td>
</TR>



<TR>

 <TD>Enter Shares to be Alloted to All Customers</TD>
 <td><input type="text" name="no_of_shares" value=""></td>
</TR>

<tr>



<TD><input type="radio" name="allotshares" value="literal" checked>literal</TD>
<TD><input type="radio" name="allotshares" value="percent" >
  Give Dividend (%)    </TD>
</tr>



<tr>
  <td><input type="submit" name="submit" value="ALLOT "></td>
</tr>
</table>




</div>

</form>


</body>
</html>

