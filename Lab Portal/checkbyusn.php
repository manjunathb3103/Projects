<?php
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

$usn=$_POST['usn'];
$program=$_POST['program'];
$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'ethanhulk';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
{
   die('Could not connect: ' . mysql_error());
}


mysql_select_db("portal");
$val=mysql_query("select pgno from programlog where pgname='$program'",$conn);
if(!$val){
    die('Could not retrive data: ' . mysql_error());
}
$p=mysql_fetch_row($val);

if(!$p)
{
    die('Could not fetch data: ' . mysql_error());
}
if ($program=='all')
    if($usn=='all')
        $sql="select * from solutionlog";
    else
        $sql="select * from solutionlog where susn='$usn'";
else
    if($usn=='all')
        $sql="select * from solutionlog where spgno='$p[0]'";
    else
        $sql="select * from solutionlog where susn='$usn' AND spgno='$p[0]'";

$val=mysql_query($sql,$conn);
if(!val){
    die('Could not retrive data: ' . mysql_error());
}

while($ret=mysql_fetch_assoc($val)){
    echo"</br>usn : ".$ret['susn']."   Program number : ".$ret['spgno']."   date : ".$ret['date']."   time : ".$ret['time']."  testcase solved : ".$ret['solvedtc']."   marks : ".$ret['percentage']."   attempts : ".$ret['submission'];
}

?>
