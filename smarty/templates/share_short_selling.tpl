<html>
<head>
<title>VSM CLIENT : SHORT SELLING</title>
<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">

{literal}<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {color: #000080}
-->
</style>{/literal}
</head>
<BODY>
<h3 align="center" class="style1"><br>
 Short Selling </h3>
<h3 align="center"><span class="style2"><B>Customer ID :</B>{$customer_id}</span><br>
</h3>
<form name="share_form" method="POST" action="share_short_selling.php">

<input type="hidden" name="id" value="{$customer_id}">
<table cellpadding="15" cellspacing="15" align="center" >

<TR>
<TH>Sector Name</TH>
  <TH>Company Name</TH>
  <TH>Share Price</TH>
  <TH>Shares Sold </TH>
  <TH colspan="2">Transaction Type</TH>
  <TH>No. Of Shares</TH>
  
</TR>


{section name=companies loop=$company_ids}

<TR>
<TD>{$sector_names[companies]}</TD>
<TD>{$company_names[companies]}</TD>
<TD>{$share_prices[companies]}</TD>
<TD>{$shares_held[companies]}</TD>
<TD><input type="radio" name={$company_ids[companies]}_transaction_type value="buy">Buy</TD>
    <TD><input type="radio" name={$company_ids[companies]}_transaction_type value="sell">Sell</TD>
<TD><input type="text" name={$company_ids[companies]}_no_of_shares value="0"></TD>


</TR>


{/section}

<TR><TD colspan="5" align="right"><b>Current Balance:</b></TD><td>Rs. {$current_balance}</td></TR>


<tr><TD colspan="6" align="right"><input type="submit" name="share_transaction" value="Go >>"></TD></tr>


</table>

</form>


</TD>







</body>
</html>

