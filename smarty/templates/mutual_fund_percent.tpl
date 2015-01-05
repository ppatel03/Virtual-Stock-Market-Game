<head>
<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">

</head>
<h3>Update Mutual Fund Balance</h3>
<p> ...{$message} ... </p>
<form name = "form1" method = "post" action = "update_mutual_fund.php" >
<p>Percentage Change in SharePrice : <input type = "text" name = "percent" value = "{$mutual_percent}" /></p>
  <p><input type = "checkbox" name = "checkbox_update_mutual_fund" checked />Apply the above percentage change to mutual fund balance of all customers</p>
  <p>
    <input type="submit" name="update_mutual_fund" value="Go" />
  </p>
</form> 
  