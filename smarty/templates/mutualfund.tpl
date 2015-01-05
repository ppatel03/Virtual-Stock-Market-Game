<html>
<head>
<title>VSM MUTUAL FUND</title>
<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">

</head>
<BODY>

<BR><BR>
<h3 align="center">MUTUAL FUND</h3>


<form name="select_mutualfund_amount" method="post" action="mutualfund.php">

<div style="margin-left:30%; margin-right:30%; margin-top:10%">

<table cellpadding="5" cellspacing="5">

<tr>

 <TD>Customer id </TD>
 <td align="left"  type="text" name="customer_id" value=>{$customer_id}
</td>

</tr>
<TR>

<TD><input type="radio" name="flag" value="invest" checked>Invest in Mutual Fund  </TD>
   
 <TD><input type="radio" name="flag" value="withdraw">Withdraw from Mutual Fund</TD>


</TR>






<TR>

<TR>

 <TD>Enter Amount  </TD>
 <td align="left"><input type="text" name="amount" value=""></td>

</TR>

<tr>

 <TD>Current Balance Rs</TD>
 <td align="left" name="current_balance " value=>{$current_balance}
     
      </td>

</tr>
<tr>

 <TD>Mutual Fund Balance Rs</TD>
 <td align="left" name="mutual_fund_balance " value=>{$mutual_fund_balance}
     
      </td>

</tr>
<tr>

<TD colspan="2" align="center">
<input type="submit" name="submit" value="ok ">
</TD>

</tr>

</table>





</div>
<input type="hidden" name="customer_id" value={$customer_id}/>
</form>


</div>
<input type="hidden" name="current_balance" value={$current_balance}/>
</form>



</body>
</html>

