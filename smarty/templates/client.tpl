<html>
<head>
<title>VSM CLIENT</title>
{literal}
<style type="text/css">
<!--
.style1 {color: #0080C0}
-->
</style>



<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">
{/literal}
</head>
<BODY>
<h3 align="center" class="style1">Welcome to VSM</h3>

<form name="select_service_name" method="post" action="client.php">
<div style="margin-left:30%; margin-right:30%; ">
<table cellpadding="10" cellspacing="10">
<TR>
 <TD>Customer ID </TD>
 <td align="left">{$customer_id}</td>
</TR>
<tr>

 <TD>Select Service </TD>
 <td align="left"><select name="service_name">
      {html_options options=$servicenames}
    </select>  </td>

</tr>

<tr>

<TD colspan="2" align="center">
<input type="submit" name="submit" value="Go >> ">
</TD>

</tr>

</table>

</div>
<input type="hidden" name="customer_id" value="{$customer_id}"/>
<input type="hidden" name="_submit_check" value="1"/>
</form>







</body>
</html>

