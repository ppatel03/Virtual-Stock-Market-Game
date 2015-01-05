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
        
		{section name=sectors1 loop=$sectors}
        <tr>
          <td scope="col">{$sectors[sectors1]}</td>
       </tr>
		{/section}
      </table>

</body>
</html>