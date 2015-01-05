<html>
<head>
<title>VSM ADMINISTRATOR</title>
<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">

</head>
<BODY>

<BR><BR>
<h2 align="center">Welcome to VSM</h2>
<h3 align="center">Administrator</h3>

<form name="select_service_name" method="post" action="administrator.php"><div style="margin-left:30%; margin-right:30%; margin-top:5%">
<table cellpadding="10" cellspacing="10">


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
<input type="hidden" name="_submit_check" value="1"/>
</form>







</body>
</html>

