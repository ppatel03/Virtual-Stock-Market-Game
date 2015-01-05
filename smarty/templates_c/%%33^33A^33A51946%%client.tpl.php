<?php /* Smarty version 2.6.14, created on 2006-10-11 01:09:22
         compiled from client.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'client.tpl', 30, false),)), $this); ?>
<html>
<head>
<title>VSM CLIENT</title>
<?php echo '
<style type="text/css">
<!--
.style1 {color: #0080C0}
-->
</style>



<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">
'; ?>

</head>
<BODY>
<h3 align="center" class="style1">Welcome to VSM</h3>

<form name="select_service_name" method="post" action="client.php">
<div style="margin-left:30%; margin-right:30%; ">
<table cellpadding="10" cellspacing="10">
<TR>
 <TD>Customer ID </TD>
 <td align="left"><?php echo $this->_tpl_vars['customer_id']; ?>
</td>
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
<input type="hidden" name="customer_id" value="<?php echo $this->_tpl_vars['customer_id']; ?>
"/>
<input type="hidden" name="_submit_check" value="1"/>
</form>







</body>
</html>
