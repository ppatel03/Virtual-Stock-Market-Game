<html>
<head>
<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">

</head>
<h2>PROJECTED PRICES </h2>
<form id="form1" name="form1" method="post" action="">
<table width="776" height="93" border="1">
  <tr>
    <th width="179" scope="col">Company Name </th>
    <th width="126" scope="col">Total Shares at last shareprice </th>
    <th width="147" scope="col">Current Total Shares </th>
    <th width="134" scope="col">Current Share Price </th>
    <th width="156" scope="col">Projected Share Price </th>
  </tr>

{section name=company_name loop=$company_names}
  <tr>
    <td>{$company_names[company_name]}</td>
    <td>{$total_shares_at_last_shareprice[company_name]}</td>
    <td>{$current_total_shares[company_name]}</td>
    <td>{$share_prices[company_name]}</td>
    <td>
      <input type="text" name= "{$company_id[company_name]}" value = "{$projected_shareprice[company_name]}" />
    
    </td>
  </tr>
{/section}  
</table>
<div align="right">
  
  
  <p><input type="submit" name="change_prices" value="Confirm the above Changed Prices" /></p>
  
</div>
</form>
<p>
  <label>
  
  </label>
</p>
</html>