<?php
 $ipaddress = $_SERVER['REMOTE_ADDR'];
 $keyword='';
 if(isset($_GET['keyword'])) {
	 $keyword=$_GET['keyword'];
 }
 $host="localhost";
 $username="root";
 $password="";
 $databasename="landing";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename);
 if ($ipaddress!="89.130.114.62"){
 $res = mysql_query("insert into clicks values('','$ipaddress','$keyword',CURRENT_TIME())"); 
 }

?>