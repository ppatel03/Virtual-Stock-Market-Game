<html>
<head>
<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">


</head>
<BODY>
<form name="initialize_game" method="post" action="initializegame.php">
<BR><BR>

<div style="margin-left:20%; margin-right:30%; margin-top:2%">

<h3 align="left">INITIALIZE GAME</h3>
<p align="left">Initialize the game only after initilizing company_shareprices </p>
<div align="left">
  <table width="541" height="394" cellpadding="10" cellspacing="10">
    
    
    
    
    <TR>
      
      <TD width="109" >Enter No of Customers </TD>
     <td width="233"><input type="text" name="no_of_cust" value=""></td>
</TR>
    
    
    <TR>
      
      <TD>Enter Number of Shares to be Alloted to All Customers</TD>
     <td><input type="text" name="no_of_shares" value=""></td>
</TR>
    
    
    <TR>
      
      <TD>Enter Starting Balance</TD>
     <td><input type="text" name="current_balance" value=""></td>
</TR>
    <TR>
      
      <TD>Clear Mutual Fund Balance<input type="checkbox" name="mutual_fund" checked ></TD>
     <td>Clear Bank Loan Table<input type="checkbox" name="bank_loan" checked ></td>
</TR>
    <tr>
      <td><input type="submit" name="submit" value="Initialise game "></td>
    </tr>
  </table>
</div>
</div>

</form>


</body>
</html>

