<?php /* Smarty version 2.6.14, created on 2006-10-10 23:46:08
         compiled from initializeCompanies.tpl */ ?>
<head>
<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">
</head>

<h3>Initialize Companies</h3>
<form id="form1" name="form1" method="post" action="initializeCompanies.php">
  <?php if ($this->_tpl_vars['reset'] == 1): ?>
  <p><?php echo $this->_tpl_vars['success']; ?>
</p>
  <?php else: ?>
  <input type="checkbox" name="checkbox" value="checkbox" checked/> 
  Reset the company_shareprice table by deleting all companies
  <input type="submit" name="Reset" value="Go" />
  <?php endif; ?>
</form>

<p><a href="administrator.php">Back to administrator</a>  </p>