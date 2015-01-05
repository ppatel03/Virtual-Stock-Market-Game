<head>
<link href="smarty/templates/styles/3.css" rel="stylesheet" type="text/css">
</head>

<h3>Initialize Companies</h3>
<form id="form1" name="form1" method="post" action="initializeCompanies.php">
  {if $reset eq 1  }
  <p>{$success}</p>
  {else}
  <input type="checkbox" name="checkbox" value="checkbox" checked/> 
  Reset the company_shareprice table by deleting all companies
  <input type="submit" name="Reset" value="Go" />
  {/if}
</form>

<p><a href="administrator.php">Back to administrator</a>  </p>
