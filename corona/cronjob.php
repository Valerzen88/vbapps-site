<?php
//get data from worldmeter
//save to database
error_reporting(0);

	$htmlContent = file_get_contents("https://www.worldometers.info/coronavirus/");
		
	$DOM = new DOMDocument();
	$DOM->loadHTML($htmlContent);
	
	$mainNumber = $DOM->getElementsByTagName('div.maincounter-number');
	
	$xpath   = new DOMXPath( $DOM );
	// if the className doesn`t changes
	//$members = $xpath->query( '//div[@class="mbs fcg"]' );
	// if the class name changes ex. class="mbs fcg my-other class-name"
	//$mainNumber = $xpath->query( '//div[contains(@class,"maincounter-number")]' );
	//$total_cases = $mainNumber[0] -> nodeValue;
	
	$Header = $DOM->getElementsByTagName('th');
	$Detail = $DOM->getElementsByTagName('tr');
	$len = $Detail->length;
	$lenHeader = $Header->length;
	$count = $len % 2 == 0 ? $len/2 : $len/2 +0.5;
	$countHeader = $lenHeader % 2 == 0 ? $lenHeader/2 : $lenHeader/2 +0.5;

    //#Get header name of the table
	$c0=0;
	foreach($Header as $NodeHeader) 
	{
		$aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
		$c0++;
		if($c0==$countHeader)break;
	}
	//print_r($aDataTableHeaderHTML); die();

	//#Get row data/detail table without header name as key
	$j = 0;
	foreach($Detail as $sNodeDetail) 
	{
		for($c=0;$c<($sNodeDetail->childNodes->length);$c++){
			$aDataTableDetailHTML[$j][$c] = $sNodeDetail->childNodes->item($c)->nodeValue;
		}
		$j = $j % count($count) == 0 ? $j + 1 : $j;
		if ($j>$count) {break;}
	}
	//print("<pre>".print_r($aDataTableDetailHTML,true)."</pre>");die();
	
	$countries_arr = array();
	print_r(count($aDataTableDetailHTML));
	for($i=1;$i < (count($aDataTableDetailHTML));$i++) {
		//print_r(!array_search("Total:", $countries_arr,true));
		//print("<pre>".print_r($aDataTableDetailHTML[$i],true)."</pre>");
		if (count($aDataTableDetailHTML[$i])>10) {
		if ($aDataTableDetailHTML[$i]==1) {
			//print("<pre>".print_r($aDataTableDetailHTML[$i],true)."</pre>");
			array_push($countries_arr,array("country" => $aDataTableDetailHTML[$i][0],"total_cases" => str_replace(",","",$aDataTableDetailHTML[$i][2]),
			"new_cases" => str_replace(",","",$aDataTableDetailHTML[$i][4]), "total_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][6]),
			"new_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][8]), "total_recovered" => str_replace(",","",$aDataTableDetailHTML[$i][10]),
			"active_cases" => str_replace(",","",$aDataTableDetailHTML[$i][12]),"critical" => str_replace(",","",$aDataTableDetailHTML[$i][14]),
			"tot_cases_pop" => str_replace(",","",$aDataTableDetailHTML[$i][16])));
		} else if (!$aDataTableDetailHTML[$i-1][10]=="Total:") {
			//print("<pre>".print_r($aDataTableDetailHTML[$i],true)."</pre>");
			array_push($countries_arr,array("country" => $aDataTableDetailHTML[$i][0],"total_cases" => str_replace(",","",$aDataTableDetailHTML[$i][2]),
			"new_cases" => str_replace(",","",$aDataTableDetailHTML[$i][4]), "total_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][6]),
			"new_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][8]), "total_recovered" => str_replace(",","",$aDataTableDetailHTML[$i][10]),
			"active_cases" => str_replace(",","",$aDataTableDetailHTML[$i][12]),"critical" => str_replace(",","",$aDataTableDetailHTML[$i][14]),
			"tot_cases_pop" => str_replace(",","",$aDataTableDetailHTML[$i][16])));/*,
			"country" => str_replace(",","",$aDataTableDetailHTML[$i][9]),"total_cases" => str_replace(",","",$aDataTableDetailHTML[$i][10]),
			"new_cases" => str_replace(",","",$aDataTableDetailHTML[$i][11]), "total_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][12]),
			"new_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][13]), "total_recovered" => str_replace(",","",$aDataTableDetailHTML[$i][14]),
			"active_cases" => str_replace(",","", $aDataTableDetailHTML[$i][15]),"critical" => str_replace(",","",$aDataTableDetailHTML[$i][16]),
			"tot_cases_pop" => str_replace(",","",$aDataTableDetailHTML[$i][17])));*/
		} else {
			//print("<pre>".print_r($aDataTableDetailHTML[$i],true)."</pre>");
			array_push($countries_arr,array("country" => $aDataTableDetailHTML[$i][0],"total_cases" => str_replace(",","",$aDataTableDetailHTML[$i][2]),
			"new_cases" => str_replace(",","",$aDataTableDetailHTML[$i][4]), "total_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][6]),
			"new_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][8]), "total_recovered" => str_replace(",","",$aDataTableDetailHTML[$i][10]),
			"active_cases" => str_replace(",","",$aDataTableDetailHTML[$i][12]),"critical" => str_replace(",","",$aDataTableDetailHTML[$i][14]),
			"tot_cases_pop" => str_replace(",","",$aDataTableDetailHTML[$i][16])));
		}/*else if (count($aDataTableDetailHTML[$i]) < 10 && count($aDataTableDetailHTML[$i]) > 0) {
			array_push($countries_arr,array("country" => str_replace(",","",$aDataTableDetailHTML[$i][0]),"total_cases" => str_replace(",","",$aDataTableDetailHTML[$i][1]),
			"new_cases" => str_replace(",","",$aDataTableDetailHTML[$i][2]), "total_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][3]),
			"new_deaths" => str_replace(",","",$aDataTableDetailHTML[$i][4]), "total_recovered" => str_replace(",","",$aDataTableDetailHTML[$i][5]),
			"active_cases" => str_replace(",","",$aDataTableDetailHTML[$i][6]),"critical" => str_replace(",","",$aDataTableDetailHTML[$i][7]),
			"tot_cases_pop" =>str_replace(",","", $aDataTableDetailHTML[$i][8])));*/
		}
	}
	
	$data = null;
	
	$now = date_create()->format('Y-m-d H:i:s');
	foreach($countries_arr as $value) {
		//echo "(".str_replace(";", "','","'".implode(";",array_values($value))."'), <br>");
		$data .= "(".str_replace(";", "','","'".implode(";",array_values($value))."','".$now."'), ");
	}

	$SQL = "INSERT INTO main (".implode(",",array_keys($countries_arr[0])).",timestamp) VALUES ".substr($data,0,strlen($data)-2);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "corona";
	// Create connection
	$conn = mysql_connect($servername, $username, $password, $dbname);

	$db_selected = mysql_select_db($dbname, $conn);
	if (!$db_selected) {
		die ('Kann db nicht benutzen : ' . mysql_error());
	}
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//echo "SQL: ".$SQL;
	$SQL_DEL = "DELETE FROM main";
	mysql_query($SQL_DEL) or die(mysql_error());
	$res = mysql_query($SQL) or die(mysql_error());
	//var_dump($res);
	
	//USA
	$htmlContent = null;
	$htmlContent = file_get_contents("https://www.worldometers.info/coronavirus/country/us/");
		
	$DOM = new DOMDocument();
	$DOM->loadHTML($htmlContent);
	
	//$mainNumber = $DOM->getElementsByTagName('div.maincounter-number');
	
	$xpath   = new DOMXPath( $DOM );
	// if the className doesn`t changes
	//$members = $xpath->query( '//div[@class="mbs fcg"]' );
	// if the class name changes ex. class="mbs fcg my-other class-name"
	//$mainNumber = $xpath->query( '//div[contains(@class,"maincounter-number")]' );
	//$total_cases = $mainNumber[0] -> nodeValue;

	$Header = $DOM->getElementsByTagName('th');
	$Detail = $DOM->getElementsByTagName('tr');
	$len = $Detail->length;
	$lenHeader = $Header->length;
	$count = $len % 2 == 0 ? $len/2 : $len/2 +0.5;
	$countHeader = $lenHeader % 2 == 0 ? $lenHeader/2 : $lenHeader/2 +0.5;

    //#Get header name of the table
	$c0=0;
	foreach($Header as $NodeHeader) 
	{
		$aDataTableHeaderHTML_US[] = trim($NodeHeader->textContent);
		$c0++;
		if($c0==$countHeader)break;
	}
	//print_r($aDataTableHeaderHTML_US); die();

	//#Get row data/detail table without header name as key
	$j = 0;
	foreach($Detail as $sNodeDetail) 
	{
		for($c=0;$c<($sNodeDetail->childNodes->length);$c++){
			$aDataTableDetailHTML_US[$j][$c] = $sNodeDetail->childNodes->item($c)->nodeValue;
		}
		$j = $j % count($count) == 0 ? $j + 1 : $j;
		if ($j>$count) {break;}
	}
	//die();
	//print("<pre>".print_r($aDataTableDetailHTML_US,true)."</pre>");die();
	
	$state_arr = array();
	//print_r(count($aDataTableDetailHTML));
	for($i=1;$i < (count($aDataTableDetailHTML_US));$i++) {
		//print_r(!array_search("Total:", $state_arr,true));
		//print("<pre>".print_r($aDataTableDetailHTML[$i],true)."</pre>");
		if (count($aDataTableDetailHTML_US[$i])>10) {
		if ($aDataTableDetailHTML_US[$i]==1) {
			//print("<pre>".print_r($aDataTableDetailHTML_US_US[$i],true)."</pre>");
			array_push($state_arr,array("us_state" => trim($aDataTableDetailHTML_US[$i][0]),"total_cases" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][2])),
			"new_cases" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][4])), "total_deaths" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][6])),
			"new_deaths" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][8])), "active_cases" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][10]))));
		} else if (!$aDataTableDetailHTML_US[$i-1][10]=="Total:") {
			//print("<pre>".print_r($aDataTableDetailHTML_US[$i],true)."</pre>");
			array_push($state_arr,array("us_state" => trim($aDataTableDetailHTML_US[$i][0]),"total_cases" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][2])),
			"new_cases" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][4])), "total_deaths" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][6])),
			"new_deaths" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][8])), "active_cases" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][10]))));/*,
			"country" => str_replace(",","",$aDataTableDetailHTML_US[$i][9]),"total_cases" => str_replace(",","",$aDataTableDetailHTML_US[$i][10]),
			"new_cases" => str_replace(",","",$aDataTableDetailHTML_US[$i][11]), "total_deaths" => str_replace(",","",$aDataTableDetailHTML_US[$i][12]),
			"new_deaths" => str_replace(",","",$aDataTableDetailHTML_US[$i][13]), "total_recovered" => str_replace(",","",$aDataTableDetailHTML_US[$i][14]),
			"active_cases" => str_replace(",","", $aDataTableDetailHTML_US[$i][15]),"critical" => str_replace(",","",$aDataTableDetailHTML_US[$i][16]),
			"tot_cases_pop" => str_replace(",","",$aDataTableDetailHTML_US[$i][17])));*/
		} else {
			//print("<pre>".print_r($aDataTableDetailHTML_US[$i],true)."</pre>");
			array_push($state_arr,array("us_state" => trim($aDataTableDetailHTML_US[$i][0]),"total_cases" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][2])),
			"new_cases" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][4])), "total_deaths" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][6])),
			"new_deaths" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][8])), "active_cases" => trim(str_replace(",","",$aDataTableDetailHTML_US[$i][10]))));
		}/*else if (count($aDataTableDetailHTML_US[$i]) < 10 && count($aDataTableDetailHTML_US[$i]) > 0) {
			array_push($countries_arr,array("country" => str_replace(",","",$aDataTableDetailHTML_US[$i][0]),"total_cases" => str_replace(",","",$aDataTableDetailHTML_US[$i][1]),
			"new_cases" => str_replace(",","",$aDataTableDetailHTML_US[$i][2]), "total_deaths" => str_replace(",","",$aDataTableDetailHTML_US[$i][3]),
			"new_deaths" => str_replace(",","",$aDataTableDetailHTML_US[$i][4]), "total_recovered" => str_replace(",","",$aDataTableDetailHTML_US[$i][5]),
			"active_cases" => str_replace(",","",$aDataTableDetailHTML_US[$i][6]),"critical" => str_replace(",","",$aDataTableDetailHTML_US[$i][7]),
			"tot_cases_pop" =>str_replace(",","", $aDataTableDetailHTML_US[$i][8])));*/
		}
	}
	
	$data = null;
	
	$now = date_create()->format('Y-m-d H:i:s');
	foreach($state_arr as $value) {
		//echo "(".str_replace(";", "','","'".implode(";",array_values($value))."'), <br>");
		$data .= "(".str_replace(";", "','","'".implode(";",array_values($value))."','".$now."'), ");
	}

	$SQL_US = "INSERT INTO main_us (us_state,total_cases,new_cases,total_deaths,new_deaths,active_cases,timestamp) VALUES ".substr($data,0,strlen($data)-2);
	//print("<pre>".print_r($SQL_US,true)."</pre>");//die();

	//echo "SQL: ".$SQL;
	$SQL_DEL_US = "DELETE FROM main_us";
	mysql_query($SQL_DEL_US) or die(mysql_error());
	$res = mysql_query($SQL_US) or die(mysql_error());
	//var_dump($res);
	
    mysql_close($db->get_link());
	exit;
	//print("<pre>".print_r($countries_arr,true)."</pre>");
	
?>