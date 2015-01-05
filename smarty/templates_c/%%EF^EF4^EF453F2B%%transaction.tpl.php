<?php /* Smarty version 2.6.14, created on 2006-08-26 20:11:31
         compiled from transaction.tpl */ ?>
<html>
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>
<BODY>
<br>
<B>Customer ID :</B><?php echo $this->_tpl_vars['customer_id']; ?>
<br>


<form name="share_form" method="POST" action="share_normal.php">

<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['customer_id']; ?>
">
<table cellpadding="15" cellspacing="15" align="center" >

<TR>

  <TH>Company Name</TH>
  <TH>Share Price</TH>
  <TH>Shares Held</TH>
  <TH colspan="2">Transaction Type</TH>
  <TH>No. Of Shares</TH>
  
</TR>


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
<TD><?php echo $this->_tpl_vars['shares_held'][$this->_sections['companies']['index']]; ?>
</TD>
<TD><input type="radio" name=<?php echo $this->_tpl_vars['company_names'][$this->_sections['companies']['index']]; ?>
_transaction_type value="buy">Buy</TD>
    <TD><input type="radio" name=<?php echo $this->_tpl_vars['company_names'][$this->_sections['companies']['index']]; ?>
_transaction_type value="sell">Sell</TD>
<TD><input type="text" name=<?php echo $this->_tpl_vars['company_names'][$this->_sections['companies']['index']]; ?>
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
