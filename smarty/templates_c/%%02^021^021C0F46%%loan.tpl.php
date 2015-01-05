<?php /* Smarty version 2.6.14, created on 2006-10-11 01:16:59
         compiled from loan.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'loan.tpl', 55, false),)), $this); ?>
<html>
<head>
<title>VSM LOAN</title>
<link href="smarty/templates/styles/1.css" rel="stylesheet" type="text/css">
</head>
<BODY>
<h3 align="center">LOAN</h3>
<form name="select_loan_amount" method="post" action="loan.php">
<div style="margin-left:10%; margin-right:10%;">
<table width="220" height="131" align="left" cellpadding="5" cellspacing="5">


<tr>
<TH width="100"><p>Time Period(min)</p>
  </TH>
  <TH width="120">Rate Of Interest (%) over the entire time period </TH> 
</tr>


<?php unset($this->_sections['timeperiod']);
$this->_sections['timeperiod']['name'] = 'timeperiod';
$this->_sections['timeperiod']['loop'] = is_array($_loop=$this->_tpl_vars['TimePeriod']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['timeperiod']['show'] = true;
$this->_sections['timeperiod']['max'] = $this->_sections['timeperiod']['loop'];
$this->_sections['timeperiod']['step'] = 1;
$this->_sections['timeperiod']['start'] = $this->_sections['timeperiod']['step'] > 0 ? 0 : $this->_sections['timeperiod']['loop']-1;
if ($this->_sections['timeperiod']['show']) {
    $this->_sections['timeperiod']['total'] = $this->_sections['timeperiod']['loop'];
    if ($this->_sections['timeperiod']['total'] == 0)
        $this->_sections['timeperiod']['show'] = false;
} else
    $this->_sections['timeperiod']['total'] = 0;
if ($this->_sections['timeperiod']['show']):

            for ($this->_sections['timeperiod']['index'] = $this->_sections['timeperiod']['start'], $this->_sections['timeperiod']['iteration'] = 1;
                 $this->_sections['timeperiod']['iteration'] <= $this->_sections['timeperiod']['total'];
                 $this->_sections['timeperiod']['index'] += $this->_sections['timeperiod']['step'], $this->_sections['timeperiod']['iteration']++):
$this->_sections['timeperiod']['rownum'] = $this->_sections['timeperiod']['iteration'];
$this->_sections['timeperiod']['index_prev'] = $this->_sections['timeperiod']['index'] - $this->_sections['timeperiod']['step'];
$this->_sections['timeperiod']['index_next'] = $this->_sections['timeperiod']['index'] + $this->_sections['timeperiod']['step'];
$this->_sections['timeperiod']['first']      = ($this->_sections['timeperiod']['iteration'] == 1);
$this->_sections['timeperiod']['last']       = ($this->_sections['timeperiod']['iteration'] == $this->_sections['timeperiod']['total']);
?>

<TR>

<TD><div align="center"><?php echo $this->_tpl_vars['TimePeriod'][$this->_sections['timeperiod']['index']]; ?>
</div></TD>
<TD><div align="center"><?php echo $this->_tpl_vars['rate_of_interest'][$this->_sections['timeperiod']['index']]; ?>
 </div></TD>


</TR>
<?php endfor; endif; ?>


</table>

<table align="right" cellpadding="10" cellspacing="10">
<tr>

 <TD>Customer id </TD>
 <td align="left"  type="text" name="customer_id" value=><?php echo $this->_tpl_vars['customer_id']; ?>

</td>

</tr>

<TR>

 <TD>Enter Amount to be taken as loan</TD>
 <td align="left"><input type="text" name="amount" id='loan' value=""></td>

</TR>


<tr>

 <TD>Time for which Loan is to be taken (in minutes) </TD>
 <td align="left"><select name="time_period">
      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['time_period']), $this);?>

    </select>  </td>
</tr>

<tr>
 <td>Currently Active Loan Amount</td>
 <td align="left">Rs. <?php echo $this->_tpl_vars['loan_active']; ?>
 </td>
</tr>

<tr>
 <td>Maximum Loan that can be taken yet</td>
 <td align="left">Rs. <?php echo $this->_tpl_vars['loan_allowed']; ?>
 </td>
</tr>

<tr>

 <TD>Current Balance Rs</TD>
 <td align="left" name="current_balance " value=><?php echo $this->_tpl_vars['current_balance']; ?>

     
      </td>

</tr>




<tr>

<TD colspan="2" align="center">
<input type="submit" name="submit" value="ok ">
</TD>

</tr>

</table>

<input type="hidden" name="customer_id" value=<?php echo $this->_tpl_vars['customer_id']; ?>
/>
</div>
</form>





</body>
</html>
