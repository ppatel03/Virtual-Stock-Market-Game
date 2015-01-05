<?php /* Smarty version 2.6.14, created on 2007-02-22 00:51:13
         compiled from addsector.tpl */ ?>
<html>
<body>
<p><strong>Add New Sector</strong></p>
<p><form id="form1" name="form1" method="post" action="addSector.php">
  Name of Sector : 
  <input type="text" name="textfield" />
  <input type="submit" name="Submit" value="Add" />
</form>
</p>

<br />
<p><strong>
Existing Sectors  
</strong></p>

		<table width="639" height="43"  cellspacing="10">
        
		<?php unset($this->_sections['sectors1']);
$this->_sections['sectors1']['name'] = 'sectors1';
$this->_sections['sectors1']['loop'] = is_array($_loop=$this->_tpl_vars['sectors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sectors1']['show'] = true;
$this->_sections['sectors1']['max'] = $this->_sections['sectors1']['loop'];
$this->_sections['sectors1']['step'] = 1;
$this->_sections['sectors1']['start'] = $this->_sections['sectors1']['step'] > 0 ? 0 : $this->_sections['sectors1']['loop']-1;
if ($this->_sections['sectors1']['show']) {
    $this->_sections['sectors1']['total'] = $this->_sections['sectors1']['loop'];
    if ($this->_sections['sectors1']['total'] == 0)
        $this->_sections['sectors1']['show'] = false;
} else
    $this->_sections['sectors1']['total'] = 0;
if ($this->_sections['sectors1']['show']):

            for ($this->_sections['sectors1']['index'] = $this->_sections['sectors1']['start'], $this->_sections['sectors1']['iteration'] = 1;
                 $this->_sections['sectors1']['iteration'] <= $this->_sections['sectors1']['total'];
                 $this->_sections['sectors1']['index'] += $this->_sections['sectors1']['step'], $this->_sections['sectors1']['iteration']++):
$this->_sections['sectors1']['rownum'] = $this->_sections['sectors1']['iteration'];
$this->_sections['sectors1']['index_prev'] = $this->_sections['sectors1']['index'] - $this->_sections['sectors1']['step'];
$this->_sections['sectors1']['index_next'] = $this->_sections['sectors1']['index'] + $this->_sections['sectors1']['step'];
$this->_sections['sectors1']['first']      = ($this->_sections['sectors1']['iteration'] == 1);
$this->_sections['sectors1']['last']       = ($this->_sections['sectors1']['iteration'] == $this->_sections['sectors1']['total']);
?>
        <tr>
          <td scope="col"><?php echo $this->_tpl_vars['sectors'][$this->_sections['sectors1']['index']]; ?>
</td>
       </tr>
		<?php endfor; endif; ?>
      </table>

</body>
</html>