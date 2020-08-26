<?php
date_default_timezone_set('Asia/Calcutta');
$date1=date("F j, Y, g:i a");   


echo "
	<title>Marks entry for valuer</title>
</head>
<center>
<table width=100%  BORDER=1 bgcolor=Lightblue>
	<TR><TD align=center rowspan=2><img src=rvce.JPG height=100 width=100></TD>

	<tr><td align=center valign=top>Rashtreeya Sikshana Samithi Trust<BR>
	<b>R.V.COLLEGE OF ENGINEERING</b><BR>(Autonomous Institution Affiliated to VTU, Belgaum)<BR>
	Approved by All India Council for Technical Education, New Delhi
	<br>R.V.Vidyanikethan Post, Mysore Road, BANGALORE-560059
	</td><td>Phone:080-67178020/21<br>080-67178026/8164<br>Fax:080-28600337<br>Website:www.rvce.edu.in<br>Email ID: principal@rvce.edu.in
	</td>
	
	</TR>
<tr><td colspan=2 align=center ><h3><b>Software for Digital Evaluation</b></h3></td><td><h3>$date1</h3></td></tr>
	</table>";

?>