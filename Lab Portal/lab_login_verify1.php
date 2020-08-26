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

	//echo "<br> row=$row  ---$uname ---  $pword";
	if($row ==0) 
	{
		echo "<br>---Unsuccessful login<input type=submit value=Back to login page>";
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

$_SESSION['usn']=$uname;


$temp=mysqli_query($con,"select sname from student where usn='$uname'");
if(! $temp){
        die('Could not retrive sdfdata: ' . mysql_error());
    }
$x=mysqli_fetch_row($temp);

$_SESSION['name']=$x[0];
//echo ("<BR>Database SELECTED");








echo '   <html>
   <head>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
$(document).ready(function(){
	$("#program").hide()
    $("#hi").click(function(){
        $("#program").show();
    });
});
</script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=#50, initial-scale=1">
   	<style>
  .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
.button2{
	position: absolute;
	top:80%;
	border-radius: 12px;
	left:45%;
}
.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);} 	

	.panel-heading {
    padding: 5px 50px;
}

.panel-footer {
	padding: 1px 15px;
	color: #A0A0A0;
}
.img-circle{
	position: absolute;
	top: 0%;
	left :0%;
}
.profile-img {
	width: 96px;
	height: 96px;
	margin: 0 auto 10px;
	display: block;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
}

   	</style>
   </head>
   <body class="photo" >
   	<div style="background:white; height:180px;"> <span text-align="center"><h4 align="center" style="font-family:calibri">Rashtreeya Sikshana Samithi Trust</h4>
	<h2 align="center"style="color:slategray;font-family:calibri;"><strong>R V College of Engineering</strong></h2>
	<p align="center" style="font-family:calibri">Autonomous Institution under Visvesvaraya Technological University, Belagavi
	<br>Approved By AICTE, New Delhi, Accredited By NBA, New Delhi
	<br>R V Vidyanikethan Post, Mysore Road, Bengaluru-560059</p>
	<h2 align="center" style="color:slategray;font-family:calibri"><strong>Lab Portal</strong></h2></span></div>
	<br><br>
	<table style="width:100%;background-color:slategray;padding:20px;">
  <tr>
    <th style="font-family:calibri;color:white;font-size:28px;text-align:center;">VI Semester</th>
  </tr>
</table>
<br>
       <h4 align="center"style="font-family:calibri;color:slategray;"><strong>'.$_SESSION['name'].'</strong></h4>
	<h4 align="center"style="font-family:calibri;color:slategray;"><strong>'.$_SESSION['usn'].'</strong></h4>
	<br><br>
    <br><br>
	<h4 align="center" style="font-family:calibri;color:slategray;"><strong>Select Subject</strong></h4>
    
    
    
    <form method="post" action="program_select1.php">
<table width="100%">

<tr>

	<td colspan="2" align="center" height="50">
		';
foreach ($stack as $value)
{
    echo '<input type="radio" name="subject" value="'.$value.'" checked> <font size="5" family="calibri">'.$value.'</font><br><br>';
}

	    echo'
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

    
    
    
    
    
    
	

	<span style="position:absolute;top:0%;left:85%;"><br>Phone:080-67178020/21<br>080-67178026/8164<br>Fax:080-28600337<br>Website:www.rvce.edu.in<br>Email ID: principal@rvce.edu.in</span><div>
	  <img src="https://upload.wikimedia.org/wikipedia/en/a/a7/RVCE_New_Logo.JPG" class="img-circle" alt="Cinque Terre" width="100" height="100"> 

	</div>

</body>
</html>';













/*
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

*/
?>
