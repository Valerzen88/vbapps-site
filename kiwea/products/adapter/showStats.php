<?php
 $host="localhost";
 $username="root";
 $password="";
 $databasename="landing";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename);
 
 $res_visitors = mysql_query("select * from visitor_details"); 
 $res_clicks = mysql_query("select * from clicks"); 
 
 echo "<table border=1><tr><th>ID</th><th>IP Address</th><th>Referrer</th><th>Timestamp</th><th>User Agent</th><th>Page name</th></tr>";
 while ($row = mysql_fetch_array($res_visitors, MYSQL_ASSOC)) {
    echo "<tr><td>".$row['id']."</td><td>".$row['ip']."</td><td>".$row['referrer']."</td><td>".$row['time']."</td><td>".$row['user_agent']."</td><td>".$row['page_name']."</td></tr>";
}
echo "</table><br><br><table border=1><tr><th>ID</th><th>IP Address</th><th>Keyword</th><th>Timestamp</th></tr>";
while ($row1 = mysql_fetch_array($res_clicks, MYSQL_ASSOC)) {
	 echo "<tr><td>".$row1['id']."</td><td>".$row1['ip']."</td><td>".$row1['keyword']."</td><td>".$row1['timestamp']."</td></tr>";
}
 echo "</table>";

?>