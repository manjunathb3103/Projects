<?php






date_default_timezone_set('Asia/Calcutta');
	$date1=date("F j, Y, g:i a");   
	
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
$name=$_SESSION['name'];
$subject=$_SESSION['subject'];
		
echo $subject;

$x=mysql_query("select pgname from programlog where psubcode='$subject'",$con);
$arr=array();
while($row=mysql_fetch_assoc($x))
{
    array_push($arr,$row['pgname']);
}





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
	<h4 align="center"style="font-family:calibri;color:slategray;"><strong>'.$_SESSION['subject'].'</strong></h4>
	<br><br>
	<h4 align="center" style="font-family:calibri;color:slategray;"><strong>Select Subject</strong></h4>
	
    
    <form method="post" action="checkbyusn.php" enctype="multipart/form-data">
<table width="100%">

<tr>
			<td>USN</td>
			<td align="center"><input type="text" name="usn" size="30"></td>
		</tr>

<tr>

	<td colspan="2" align="center" height="50">
		';
foreach ($arr as $value)
{
    echo '<input type="radio" name="program" value="'.$value.'" checked> <font size="3" family="calibri">'.$value.'</font><br><br>';
}

	    echo'
	</td>
</tr>


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










echo'<form action="checkbyusn.php" method="post" enctype="multipart/form-data">
		<table border="0" align="center">
    	<tr>
			<td>USN</td>
			<td align="center"><input type="text" name="usn" size="30"></td>
		</tr>
		<tr>

	<td align="center" height="50">
		<select name="subject">
	        <option value="" selected="selected">--SELECT LAB--</option>
            <option VALUE="all"> all</option>
	        <option VALUE="12IS63"> PIC</option>
	        <option VALUE="12IS64"> Data Structures</option>
	        <option VALUE="UNIX"> Unix</option>
	        <option VALUE="System Software"> System Software</option>
	    </select>
	</td>
</tr>
    	
		
    	<tr>
			<td colspan="2" align="center"><input type="submit" value="Upload"></td>
		</tr>
    	</table>
	
	</form>';
    */
?>