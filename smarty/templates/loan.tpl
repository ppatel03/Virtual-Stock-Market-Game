<html>
<head>
<title>VSM LOAN</title>
<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">
</head>
<BODY>
<h3 align="center">LOAN</h3>
<form name="select_loan_amount" method="post" action="loan.php">
<div style="margin-left:10%; margin-right:10%;">
<table width="220" height="131" align="left" cellpadding="5" cellspacing="5">


<tr>
<TH width="100"><p>Time Period(min)</p>
  </TH>
  <TH width="120">Rate Of Interest (%) over the entire time period </TH> 
</tr>


{section name=timeperiod loop=$TimePeriod}

<TR>

<TD><div align="center">{$TimePeriod[timeperiod]}</div></TD>
<TD><div align="center">{$rate_of_interest[timeperiod]} </div></TD>


</TR>
{/section}


</table>

<table align="right" cellpadding="10" cellspacing="10">
<tr>

 <TD>Customer id </TD>
 <td align="left"  type="text" name="customer_id" value=>{$customer_id}
</td>

</tr>

<TR>

 <TD>Enter Amount to be taken as loan</TD>
 <td align="left"><input type="text" name="amount" id='loan' value=""></td>

</TR>


<tr>

 <TD>Time for which Loan is to be taken (in minutes) </TD>
 <td align="left"><select name="time_period">
      {html_options options=$time_period}
    </select>  </td>
</tr>

<tr>
 <td>Currently Active Loan Amount</td>
 <td align="left">Rs. {$loan_active} </td>
</tr>

<tr>
 <td>Maximum Loan that can be taken yet</td>
 <td align="left">Rs. {$loan_allowed} </td>
</tr>

<tr>

 <TD>Current Balance Rs</TD>
 <td align="left" name="current_balance " value=>{$current_balance}
     
      </td>

</tr>




<tr>

<TD colspan="2" align="center">
<input type="submit" name="submit" value="ok ">
</TD>

</tr>

</table>

<input type="hidden" name="customer_id" value={$customer_id}/>
</div>
</form>





</body>
</html>

