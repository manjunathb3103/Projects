<?php


echo'<html><body>
<br>
<br>
<br>
<form  method="post" action="link.php">
<table width="100%">
<tr>
	<td align="center" height="50">

	    <select name="choseit">
	        <option value="" selected="selected">--SELECT BRANCH--</option>
	        <option VALUE="usn"> <a href="chose.php">By USN</a></option>
	        <option VALUE="program"> By program name</option>
	        <option VALUE="subject"> By subject</option>
	        <option VALUE="topper"> By rank</option>
	    </select>

	</td>
</tr>


<br>
<br>
<br>
<br>
	<tr>
		<td colspan="2" align="center" height="150"><input type="submit" value="submit"  bgcolor="#00FF00"></td>
	</tr>
</table>
</form>


<br>
<br>
<br>
<br>
<div align="center">
</div>

</body></html>';
?>