<?php /* Smarty version 2.6.14, created on 2006-08-26 17:29:00
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'index.tpl', 28, false),)), $this); ?>
<html>
<head>
<title>VSM CLIENT</title>
</head>
<BODY>

<BR><BR>
<h3 align="center">Welcome to VSM</h3>


<form name="select_service_name" method="post" action="vsm_client.php">

<div style="margin-left:30%; margin-right:30%; margin-top:10%">

<table cellpadding="10" cellspacing="10">

<TR>

 <TD>Enter Customer ID </TD>
 <td align="left"><input type="text" name="id" value=""></td>

</TR>

<tr>

 <TD>Select Service </TD>
 <td align="left"><select name="service_name">
      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['servicenames']), $this);?>

    </select>  </td>

</tr>

<tr>

<TD colspan="2" align="center">
<input type="submit" name="submit" value="Go >> ">
</TD>

</tr>

</table>

</div>

</form>







</body>
</html>
