<?php /* Smarty version 2.6.14, created on 2007-02-22 03:42:04
         compiled from addcompany.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'addcompany.tpl', 78, false),)), $this); ?>
<html>
<head>

<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">

</head>
<BODY>
<form name="add_company" method="post" action="addcompany.php">
<BR><BR>

<div style="margin-left:10%; margin-right:10%; margin-top:2%">

<h3 align="left">EXISTING COMPANY NAMES</h3>




<table align="left"cellpadding="10" cellspacing="10">
<tr>
<TH>Company Name</TH>
  <TH>Share Price</TH> 
</tr>


<?php unset($this->_sections['companies']);
$this->_sections['companies']['name'] = 'companies';
$this->_sections['companies']['loop'] = is_array($_loop=$this->_tpl_vars['company_names']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['companies']['show'] = true;
$this->_sections['companies']['max'] = $this->_sections['companies']['loop'];
$this->_sections['companies']['step'] = 1;
$this->_sections['companies']['start'] = $this->_sections['companies']['step'] > 0 ? 0 : $this->_sections['companies']['loop']-1;
if ($this->_sections['companies']['show']) {
    $this->_sections['companies']['total'] = $this->_sections['companies']['loop'];
    if ($this->_sections['companies']['total'] == 0)
        $this->_sections['companies']['show'] = false;
} else
    $this->_sections['companies']['total'] = 0;
if ($this->_sections['companies']['show']):

            for ($this->_sections['companies']['index'] = $this->_sections['companies']['start'], $this->_sections['companies']['iteration'] = 1;
                 $this->_sections['companies']['iteration'] <= $this->_sections['companies']['total'];
                 $this->_sections['companies']['index'] += $this->_sections['companies']['step'], $this->_sections['companies']['iteration']++):
$this->_sections['companies']['rownum'] = $this->_sections['companies']['iteration'];
$this->_sections['companies']['index_prev'] = $this->_sections['companies']['index'] - $this->_sections['companies']['step'];
$this->_sections['companies']['index_next'] = $this->_sections['companies']['index'] + $this->_sections['companies']['step'];
$this->_sections['companies']['first']      = ($this->_sections['companies']['iteration'] == 1);
$this->_sections['companies']['last']       = ($this->_sections['companies']['iteration'] == $this->_sections['companies']['total']);
?>

<TR>

<TD><?php echo $this->_tpl_vars['company_names'][$this->_sections['companies']['index']]; ?>
</TD>
<TD><?php echo $this->_tpl_vars['share_prices'][$this->_sections['companies']['index']]; ?>
</TD>


</TR>
<?php endfor; endif; ?>



</table>












<BR><BR>
<h3 align="center">ADD COMPANY</h3>


<table align="right" cellpadding="10" cellspacing="10">


<TR>

 <TD align="right">Enter Company Name</TD>
 <td><input type="text" name="company_name" value=""></td>

</TR>


<TR>

 <TD>Enter Shareprice</TD>
 <td><input type="text" name="share_price" value=""></td>

</TR>

<TR>

 <TD>Enter Sector</TD>
 <td><select name="sector"  >
 
 	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['sec'],'selected' => $this->_tpl_vars['myselect']), $this);?>

  
 
 	</select></td>

</TR>

<tr>
<td><input type="submit" name="submit" value="ADD "></td>
</tr>


</table>




</div>

</form>


</body>
</html>
