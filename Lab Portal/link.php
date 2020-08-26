<?php
$choice=$_POST['choseit'];
if($choice=='usn')
    header('Location: http://localhost/byusn.php');
if($choice=='subject')
    header('Location: http://localhost/bysub.php')
?>