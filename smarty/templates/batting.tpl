<html>
<head>
<title>VSM CLIENT : BATTING</title>
<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">

{literal}<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {color: #000080}
-->
</style>{/literal}
</head>
<BODY>
<div align = "center">
  <h3 class="style1">BETTIN </h3>
  <h3 class="style2"><B>Customer ID :   </B>{$customer_id}</h3>
</div>
<form name="share_form" method="POST" action="batting.php">

<input type="hidden" name="id" value="{$customer_id}">
<table cellpadding="15" cellspacing="15" align="center" >

<TR>
	<TH>Sector Name</TH>
  <TH>Company Name</TH>
  <TH>Share Price</TH>
  <TH>Shares Held</TH>
  <TH colspan="1">NO. OF BATTING SHARES</TH>
  
  
</TR>

{section name=companies loop=$company_names}

<TR>
<TD>{$sector_names[companies]}</TD>
<TD>{$company_names[companies]}</TD>
<TD>{$share_prices[companies]}</TD>
<TD>{$shares_held[companies]}</TD>
<TD><input type="radio" name={$company_ids[companies]}_transaction_type value="buy">BATT</TD>
    
<TD><input type="text" name={$company_ids[companies]}_no_of_shares value="200"></TD>


</TR>
{/section}

<TR><TD colspan="5" align="right"><b>Current Balance:</b></TD><td>Rs. {$current_balance}</td></TR>


<tr><TD colspan="6" align="right"><input type="submit" name="share_transaction" value="Go >>"></TD></tr>


</table>

</form>


</TD>







</body>
</html>

