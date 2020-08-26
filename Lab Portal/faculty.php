<?php

echo "yolo";

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

echo "<script type='text/javascript'>
function onSubmitCheck()
{
	if(document.forms['form1']['uname'].value =='')
	{
		alert('User name is mandatory');
		document.forms['form1']['uname'].focus();	
		return false;
	}	
	if(document.forms['form1']['pword'].value =='')
	{
		alert('Password is mandatory');
		document.forms['form1']['pword'].focus();	
		return false;
	}
	return true;
}
 </script>";

	echo "<center>";
	echo "<form method =post name='form1' action=http://localhost//portal//faculty_verify.php onsubmit='return onSubmitCheck();'>";
	echo "<table border=4 bgcolor=lightyellow>";
	echo "<tr><td colspan=2 align=center><b>Faculty LOGIN</b></td></tr>
	<tr><td>username</td><td><input type=text name='uname'></td></tr>
	<tr><td>Password</td><td><input type=password name='pword'></td></tr>
	<tr><td colspan=2 align=center><input type=submit value=signin></td></tr>
	</form>";
	echo "</table>";
    
    
echo"wtf";	
?>
