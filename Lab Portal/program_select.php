<?php
date_default_timezone_set('Asia/Calcutta');
	$date1=date("F j, Y, g:i a");   
	echo "<html><body bgcolor=Lightcyan>";
	echo "<table width=100%  BORDER=1 bgcolor=lightblue >
	<TR><TD align=center rowspan=2><img src=rvce.JPG height=100 width=100></TD>
	<tr><td align=center valign=top>Rashtreeya Sikshana Samithi Trust<BR>
	<b>R.V.COLLEGE OF ENGINEERING</b><BR>(Autonomous Institution Affiliated to VTU, Belgaum)<BR>
	Approved by All India Council for Technical Education, New Delhi
	<br>R.V.Vidyanikethan Post, Mysore Road, BANGALORE-560059
	</td><td>Phone:080-67178020/21<br>080-67178026/8164<br>Fax:080-28600337<br>Website:www.rvce.edu.in<br>Email ID: principal@rvce.edu.in
	</td></TR>
	<tr><td colspan=2 align=center ><h3><b>RVCE Lab Portal</b></h3></td><td><b>Date:$date1</b></td></tr>
	</table>";
$con=mysql_connect("localhost","root", "ethanhulk");

//echo "hai";

if(!$con)
{
	echo("<BR>Connection failed");
	exit();
}
//echo ("<BR>connected to the database");

$db=mysql_select_db("portal",$con);

if(!$db)
{
	echo("<BR>Database not selected");
	exit();
}

session_start();
$_SESSION['subject']=$_POST['subject'];
$subject=$_SESSION['subject'];
$x=mysql_query("select pgname from programlog where psubcode='$subject'",$con);
$arr=array();
while($row=mysql_fetch_assoc($x))
{
    array_push($arr,$row['pgname']);
}
echo'<html><body>
<br>
<br>
<br>
<form method="post" action="action_page.php" enctype="multipart/form-data">
<table width="100%">

<tr>

	<td colspan="2" align="center" height="50">
		<select name="program">
	        <option value="" selected="selected">--SELECT Program--</option>';
foreach ($arr as $value)
{
    echo '<option value="'.$value.'">'.$value.'</option>';
}

	    echo'</select>
	</td>
</tr>
	<tr>
    		<td align="right">Chose file</td>
    	
    	<td align="left"><input type="file" name="fileToUpload" id="fileToUpload"></td>
    	</tr>

<br>
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