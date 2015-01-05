<?php /* Smarty version 2.6.14, created on 2006-10-10 19:08:51
         compiled from administrator.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'administrator.tpl', 21, false),)), $this); ?>
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
<input type="hidden" name="_submit_check" value="1"/>
</form>







</body>
</html>
