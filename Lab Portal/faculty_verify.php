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
		header('Location: http://localhost/portal/byusn.php');
	}
	
//echo ("<BR>Database SELECTED");



?>
