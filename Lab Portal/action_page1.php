<?php 
date_default_timezone_set('Asia/Calcutta');
	$date1=date("F j, Y, g:i a");   
session_start();
#$ls=exec('hey 2>&1');
#echo $ls.'and';
#$x=shell_exec('./hey < input.txt');
    $usn=$_SESSION['usn'];
$branch=$_SESSION['dno'];
$name=$_SESSION['name'];
$sem=$_SESSION['sem'];
$subject=$_SESSION['subject'];
$pno=$_POST['program'];
$upl = '/var/www/html/portal';
$upf = $uploaddir . $_FILES['fileToUpload']['name'];
$count=0;




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
	top: 3%;
	left :2%;
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
	<br>
	<br>
	<table style="width:100%;background-color:slategray;padding:20px;">
  <tr>
    <th style="font-family:calibri;color:white;font-size:28px;text-align:center;">Submission Statistics</th>
  </tr>
</table><br>
	<h4 align="center"style="font-family:calibri;color:slategray;"><strong>'.$name.'</strong></h4>
	<h4 align="center"style="font-family:calibri;color:slategray;"><strong>'.$usn.'</strong></h4>

	
    <br>
		
<br>
		
		
	<span style="position:absolute;top:0%;left:85%;"><br>Phone:080-67178020/21<br>080-67178026/8164<br>Fax:080-28600337<br>Website:www.rvce.edu.in<br>Email ID: principal@rvce.edu.in</span><div>
	  <img src="https://upload.wikimedia.org/wikipedia/en/a/a7/RVCE_New_Logo.JPG" class="img-circle" alt="Cinque Terre" width="200" height="200"> 

	</div>

</body>
</html>';







#echo 'Connected successfully'.'</br>';
echo"Name: ".$name." <br> Sem=".$sem." <br> Subject: ".$subject."<br> Branch: ".$branch."<br> USN: ".$usn."<br> program name: ".$pno."<br><br>";

$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'ethanhulk';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
{
   die('Could not connect: ' . mysql_error());
}
	#$sql = "select Name from mark where Name='$pno'";
	mysql_select_db('portal');
	#$retval=mysql_query($sql,$conn);
	#echo mysql_fetch_assoc($retval);
	
$ppno=mysql_fetch_row(mysql_query("select pgno from programlog where pgname='$pno' AND psubcode='$subject'",$conn));

$input=mysql_fetch_row(mysql_query("select path from testcases where tpno='$ppno[0]' AND subcode='$subject'",$conn));
$file=fopen($input[0],"r");

$src=mysql_fetch_row(mysql_query("select source from programlog where pgname='$pno' AND psubcode='$subject'",$conn));
$countear=1;
if($file)
{
	while(($line=fgets($file))!=false)
	{
		$st1='./'.$upf.' < '.$line;
        
		$x=shell_exec($st1);
		$st2='./'.$src[0].' < '.$line;
        $y=shell_exec($st2);
		$reg_exp='/\s+/';
		$x2=preg_replace($reg_exp," ",$x);
		$y2=preg_replace($reg_exp," ",$y);
		$ret=strcmp($x2,$y2);
		echo $x2.' and '.$y2;
        
		if($ret==0)
		{
			echo '<p style="font-family:calibri">Test Case #'.$countear.': Passed</p>';
			$count=$count+1;
            $countear=$countear+1;
		}
		else
		{
			echo '<p style="font-family:calibri">Test Case #'.$countear.': Wrong answer</p>';
            $countear=$countear+1;
		}
	}
	fclose($file);
	echo "</br>";
	
    
	$tst=$count.'/'.'3';
	$marks=($count/3)*10;
    
   
    $sql="select sid from solutionlog where subcode='$subject' AND spgno='$ppno[0]' AND susn='$usn'";
	$val=mysql_query($sql,$conn);
    $xyz=mysql_num_rows($val);
        
    if($xyz==0){
    $sql = "INSERT INTO solutionlog(sid,susn,subcode,spgno,date,time,solvedtc,totaltc,submission,percentage) VALUES (NULL,'$usn','$subject',$ppno[0],CURDATE(),NOW(),$count,3,1,$marks)";
	$retval=mysql_query($sql,$conn);
	if (! $retval)
	{
		die('Could not update daterea: ' . mysql_error());
	}
    }
    else
    {
        $x5=mysql_fetch_row($val);
        
        $dick=mysql_query("select * from solutionlog where sid='$x5[0]'",$conn);
        if(!$dick){
             die('Could not update part2 data: ' . mysql_error());
        }
        $cunt=mysql_fetch_row($dick);
        if(!$cunt)
        {
            die('Could not update part3 data: ' . mysql_error());
        }
        if($cunt[9]<$marks)
        {
            $cock=mysql_query("update solutionlog set percentage=$marks,solvedtc='$tst',submission=submission+1 where sid=$x5[0]");
            if(!$cock){
                die('Could not update part4 data: ' . mysql_error());
            }
        }
        else
        {
            $cock=mysql_query("update solutionlog set submission=submission+1 where sid=$x5[0]");
            if(!$cock){
                die('Could not update part4 data: ' . mysql_error());
            }
        }
        
            
    }
    echo '<h4 style="font-family:calibri;color:slategray">Test case solved:  '.$tst.'</h4>';
    echo '<h4 style="font-family:calibri;color:slategray"></br> Marks obtained is:  '.$marks.'</h4>';
}
else
{
	echo "Error in reading input file\n".$input[0];
}
?>
