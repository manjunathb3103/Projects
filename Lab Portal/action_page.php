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
session_start();
echo "hey there\n"."</br>";
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




#echo 'Connected successfully'.'</br>';
echo"Name: ".$name." <br> Sem=".$sem." <br> Subject: ".$subject."<br> Branch: ".$branch."<br> USN: ".$usn."<br> program name".$pno."<br>";

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
			echo ":  Test case passed </br>";
			$count=$count+1;
		}
		else
		{
			echo ":  Wrong answer </br>";
		}
	}
	fclose($file);
	echo "</br>";
	
    
	$tst=$count.'/'.'3';
	$marks=($count/3)*10;
    
   
    echo $ppno[0];
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
        echo"<br>".$x5[0];
        $dick=mysql_query("select * from solutionlog where sid='$x5[0]'",$conn);
        if(!$dick){
             die('Could not update part2 data: ' . mysql_error());
        }
        $cunt=mysql_fetch_row($dick);
        if(!$cunt)
        {
            die('Could not update part3 data: ' . mysql_error());
        }
        echo $cunt[9];
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
	echo "Test case solved:  ".$tst;
	echo "</br> Marks obtained is:  ".$marks;
}
else
{
	echo "Error in reading input file\n".$input[0];
}
?>
