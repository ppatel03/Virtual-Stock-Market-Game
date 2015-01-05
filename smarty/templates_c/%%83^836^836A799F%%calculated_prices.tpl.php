<?php /* Smarty version 2.6.14, created on 2006-10-10 21:35:31
         compiled from calculated_prices.tpl */ ?>
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
  <tr>
    <td><?php echo $this->_tpl_vars['company_names'][$this->_sections['company_name']['index']]; ?>
</td>
    <td><?php echo $this->_tpl_vars['total_shares_at_last_shareprice'][$this->_sections['company_name']['index']]; ?>
</td>
    <td><?php echo $this->_tpl_vars['current_total_shares'][$this->_sections['company_name']['index']]; ?>
</td>
    <td><?php echo $this->_tpl_vars['share_prices'][$this->_sections['company_name']['index']]; ?>
</td>
    <td>
      <input type="text" name= "<?php echo $this->_tpl_vars['company_id'][$this->_sections['company_name']['index']]; ?>
" value = "<?php echo $this->_tpl_vars['projected_shareprice'][$this->_sections['company_name']['index']]; ?>
" />
    
    </td>
  </tr>
<?php endfor; endif; ?>  
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