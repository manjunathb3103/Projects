<?php


$localhost="localhost";

$con=mysqli_connect("localhost","root", "ethanhulk");

//echo "hai";

if(!$con)
{
	echo("<BR>Connection failed");
	exit();
}
//echo ("<BR>connected to the database");

$db=mysqli_select_db($con,"portal");

if(!$db)
{
	echo("<BR>Database not selected");
	exit();
}

session_start();
echo "<script type='text/javascript'>
function onSubmitCheck()
{
	if(document.forms['form1']['role'].value =='')
	{
		alert('Selection of role is mandatory');
		document.forms['form1']['role'].focus();	
		return false;
	}	
	return true;
}
 </script>";
	date_default_timezone_set('Asia/Calcutta');
	$date1=date("F j, Y, g:i a");   

	$uname=$_POST["uname"];
	$pword=$_POST["pword"];
	//echo "<br>----------- row=$row  ---$uname ---  $pword";
	$_SESSION['uname']=$uname;
	$_SESSION['pword']=$pword;
	echo $uname;
	$row=0;
	$sql = "select sno from login_details where uname='$uname' and pword='$pword'";
	$query=mysqli_query($con,$sql) or die(mysql_error());
	//echo "<br>query=$query ---$uname ---  $pword";
	// extract role using while statement
	while(list($r)=mysqli_fetch_row($query))
	{
		$role=$r;
	}
	$row = mysqli_num_rows($query) or die(mysql_error());
	echo "<html><body bgcolor=LIGHTCYAN>";
	echo "<table width=100%  BORDER=1 bgcolor=Lightblue>
	<TR><TD align=center rowspan=2><img src=rvce.JPG height=100 width=100></TD>
	<tr><td align=center valign=top>Rashtreeya Sikshana Samithi Trust<BR>
	<b>R.V.COLLEGE OF ENGINEERING</b><BR>(Autonomous Institution Affiliated to VTU, Belgaum)<BR>
	Approved by All India Council for Technical Education, New Delhi
	<br>R.V.Vidyanikethan Post, Mysore Road, BANGALORE-560059
	</td><td>Phone:080-67178020/21<br>080-67178026/8164<br>Fax:080-28600337<br>Website:www.rvce.edu.in<br>Email ID: principal@rvce.edu.in
	</td></TR>
	<tr><td colspan=2 align=center ><h3><b>Software to Measure Course Outcome - CIE</b></h3></td><td><b>Date:$date1<br>User name:$uname  Role:$role </b></td></tr></table>";

	//echo "<br> row=$row  ---$uname ---  $pword";
	if($row ==0) 
	{
		echo "<br>---Unsuccessful login<input type=submit value=Back to login page>";
	}

	if($row !=0) 
	{	$_SESSION['role']=$role;

		echo "<center><Br><h1>Logged in successfully  as ".$uname."</h1></center>".$role;
		if ($role=='faculty')
		{
			$_SESSION['role']=$role;
			header('Location:http://localhost/cie/login_test_cie.php');
		}
		if ($role=='admin')
		{
			$_SESSION['role']=$role;
			header('Location:http://localhost/cie/administrator.php');
		}
	}


$sql="select lsemno,ldno,lscode from link where lusn='$uname'";
$val=mysqli_query($con,$sql);
    if(! $val){
        die('Could not retrive data: ' . mysql_error());
    }
     
$stack = array();
while($row = mysqli_fetch_assoc($val))
{
    array_push($stack,$row['lscode']);
    $_SESSION['dno']=$row['ldno'];
//echo $row['lscode'];
$_SESSION['sem']=$row['lsemno'];
}

echo $stack[0];
$_SESSION['usn']=$uname;
echo $row['lsemno'];
echo $_SESSION['sem'];

$temp=mysqli_query($con,"select sname from student where usn='$uname'");
if(! $temp){
        die('Could not retrive sdfdata: ' . mysql_error());
    }
$x=mysqli_fetch_row($temp);
echo $x[0];
$_SESSION['name']=$x[0];
//echo ("<BR>Database SELECTED");
echo'<html><body>
<br>
<br>
<br>
<form method="post" action="program_select.php">
<table width="100%">

<tr>

	<td colspan="2" align="center" height="50">
		<select name="subject">
	        <option value="" selected="selected">--SELECT LAB--</option>';
foreach ($stack as $value)
{
    echo '<option value="'.$value.'">'.$value.'</option>';
}

	    echo'</select>
	</td>
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
