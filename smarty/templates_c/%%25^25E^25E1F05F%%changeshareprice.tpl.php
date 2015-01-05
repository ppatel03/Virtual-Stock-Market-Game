<?php /* Smarty version 2.6.14, created on 2009-02-18 15:59:37
         compiled from changeshareprice.tpl */ ?>
<html>
<head>
<title>VSM CHANGE SHAREPRICE</title>
<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">




</head>
<BODY>

<BR><BR>
<h3 align="center">CHANGE SHARE PRICE</h3>









<table align="left" cellpadding="5" cellspacing="5">


<tr>
<TH>Company Name</TH>
  <TH>Current SharePrice</TH> 
</tr>


<?php unset($this->_sections['company_name']);
$this->_sections['company_name']['name'] = 'company_name';
$this->_sections['company_name']['loop'] = is_array($_loop=$this->_tpl_vars['company_names']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['company_name']['show'] = true;
$this->_sections['company_name']['max'] = $this->_sections['company_name']['loop'];
$this->_sections['company_name']['step'] = 1;
$this->_sections['company_name']['start'] = $this->_sections['company_name']['step'] > 0 ? 0 : $this->_sections['company_name']['loop']-1;
if ($this->_sections['company_name']['show']) {
    $this->_sections['company_name']['total'] = $this->_sections['company_name']['loop'];
    if ($this->_sections['company_name']['total'] == 0)
        $this->_sections['company_name']['show'] = false;
} else
    $this->_sections['company_name']['total'] = 0;
if ($this->_sections['company_name']['show']):

            for ($this->_sections['company_name']['index'] = $this->_sections['company_name']['start'], $this->_sections['company_name']['iteration'] = 1;
                 $this->_sections['company_name']['iteration'] <= $this->_sections['company_name']['total'];
                 $this->_sections['company_name']['index'] += $this->_sections['company_name']['step'], $this->_sections['company_name']['iteration']++):
$this->_sections['company_name']['rownum'] = $this->_sections['company_name']['iteration'];
$this->_sections['company_name']['index_prev'] = $this->_sections['company_name']['index'] - $this->_sections['company_name']['step'];
$this->_sections['company_name']['index_next'] = $this->_sections['company_name']['index'] + $this->_sections['company_name']['step'];
$this->_sections['company_name']['first']      = ($this->_sections['company_name']['iteration'] == 1);
$this->_sections['company_name']['last']       = ($this->_sections['company_name']['iteration'] == $this->_sections['company_name']['total']);
?>

<TR>

<TD><?php echo $this->_tpl_vars['company_names'][$this->_sections['company_name']['index']]; ?>
</TD>
<TD><?php echo $this->_tpl_vars['share_prices'][$this->_sections['company_name']['index']]; ?>
</TD>


</TR>
<?php endfor; endif; ?>


</table>

<table align="right" cellpadding="10" cellspacing="10">
<tr>

 

</tr>








</table>






<div align="center">
<form name="changeshareprice" method="post" action="changeshareprice.php">
  <input type="submit" name="calculate_shareprice" value="CALCULATE SHAREPRICE ">
</form>

</div>



</body>
</html>
