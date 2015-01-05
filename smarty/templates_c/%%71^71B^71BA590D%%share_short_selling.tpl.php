<?php /* Smarty version 2.6.14, created on 2007-02-22 10:42:42
         compiled from share_short_selling.tpl */ ?>
<html>
<head>
<title>VSM CLIENT : SHORT SELLING</title>
<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">

<?php echo '<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {color: #000080}
-->
</style>'; ?>

</head>
<BODY>
<h3 align="center" class="style1"><br>
 Short Selling </h3>
<h3 align="center"><span class="style2"><B>Customer ID :</B><?php echo $this->_tpl_vars['customer_id']; ?>
</span><br>
</h3>
<form name="share_form" method="POST" action="share_short_selling.php">

<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['customer_id']; ?>
">
<table cellpadding="15" cellspacing="15" align="center" >

<TR>
<TH>Sector Name</TH>
  <TH>Company Name</TH>
  <TH>Share Price</TH>
  <TH>Shares Sold </TH>
  <TH colspan="2">Transaction Type</TH>
  <TH>No. Of Shares</TH>
  
</TR>


<?php unset($this->_sections['companies']);
$this->_sections['companies']['name'] = 'companies';
$this->_sections['companies']['loop'] = is_array($_loop=$this->_tpl_vars['company_ids']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<TD><?php echo $this->_tpl_vars['sector_names'][$this->_sections['companies']['index']]; ?>
</TD>
<TD><?php echo $this->_tpl_vars['company_names'][$this->_sections['companies']['index']]; ?>
</TD>
<TD><?php echo $this->_tpl_vars['share_prices'][$this->_sections['companies']['index']]; ?>
</TD>
<TD><?php echo $this->_tpl_vars['shares_held'][$this->_sections['companies']['index']]; ?>
</TD>
<TD><input type="radio" name=<?php echo $this->_tpl_vars['company_ids'][$this->_sections['companies']['index']]; ?>
_transaction_type value="buy">Buy</TD>
    <TD><input type="radio" name=<?php echo $this->_tpl_vars['company_ids'][$this->_sections['companies']['index']]; ?>
_transaction_type value="sell">Sell</TD>
<TD><input type="text" name=<?php echo $this->_tpl_vars['company_ids'][$this->_sections['companies']['index']]; ?>
_no_of_shares value="0"></TD>


</TR>


<?php endfor; endif; ?>

<TR><TD colspan="5" align="right"><b>Current Balance:</b></TD><td>Rs. <?php echo $this->_tpl_vars['current_balance']; ?>
</td></TR>


<tr><TD colspan="6" align="right"><input type="submit" name="share_transaction" value="Go >>"></TD></tr>


</table>

</form>


</TD>







</body>
</html>
