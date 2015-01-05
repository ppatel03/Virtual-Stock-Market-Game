<html>
<head>
<title>{$title}</title>
</head>
<BODY>
<br>
<B>Customer ID :</B>{$customer_id}<br>


<form name="share_form" method="POST" action="share_normal.php">

<input type="hidden" name="id" value="{$customer_id}">
<table cellpadding="15" cellspacing="15" align="center" >

<TR>

  <TH>Company Name</TH>
  <TH>Share Price</TH>
  <TH>Shares Held</TH>
  <TH colspan="2">Transaction Type</TH>
  <TH>No. Of Shares</TH>
  
</TR>


{section name=companies loop=$company_names}

<TR>

<TD>{$company_names[companies]}</TD>
<TD>{$share_prices[companies]}</TD>
<TD>{$shares_held[companies]}</TD>
<TD><input type="radio" name={$company_names[companies]}_transaction_type value="buy">Buy</TD>
    <TD><input type="radio" name={$company_names[companies]}_transaction_type value="sell">Sell</TD>
<TD><input type="text" name={$company_names[companies]}_no_of_shares value="0"></TD>


</TR>


{/section}

<TR><TD colspan="5" align="right"><b>Current Balance:</b></TD><td>Rs. {$current_balance}</td></TR>


<tr><TD colspan="6" align="right"><input type="submit" name="share_transaction" value="Go >>"></TD></tr>


</table>

</form>


</TD>

</body>
</html>

