<?php
//error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "corona";
$arr_values = array();
$arr_values_countries = array();
$arr_values_us = array();
$arr_values_states_10=array();
$arr_all_active_us=array();
$arr_all_active_eu=array();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM main WHERE country='Total:'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $arr_values = array("total_cases" => $row["total_cases"], "total_deaths" => $row["total_deaths"], 
		"active_cases" => $row["active_cases"], "total_recovered" => $row["total_recovered"],
		"new_cases" => $row["new_cases"], "new_deaths" => $row["new_deaths"]);
        // echo "total_cases_sum: " . $row["total_sum"]. " - total_deaths: " . $row["total_deaths"]. " total_recovered" . $row["total_recovered"]. "<br>";
    }
} else {
    //echo "0 results;sql";
}
$arr_all_active_us = array();
$sql5 = "SELECT * FROM main_us WHERE us_state='Total:'";
$result5 = $conn->query($sql5);

if ($result5->num_rows > 0) {
    // output data of each row
    while ($row = $result5->fetch_assoc()) {
        $arr_values_us = array("total_cases" => $row["total_cases"], "total_deaths" => $row["total_deaths"], 
		"active_cases" => $row["active_cases"], "total_recovered" => $row["total_recovered"],
		"new_cases" => $row["new_cases"], "new_deaths" => $row["new_deaths"]);
        // echo "total_cases_sum: " . $row["total_sum"]. " - total_deaths: " . $row["total_deaths"]. " total_recovered" . $row["total_recovered"]. "<br>";
    }
} else {
    //echo "0 results;sql";
}
$sql1 = "SELECT * FROM main WHERE country <> 'Total:' AND country <> 'World' AND country <> 'USA' ORDER BY active_cases DESC LIMIT 10";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while ($row = $result1->fetch_assoc()) {
        array_push($arr_values_countries, $row);
    }
} else {
    //echo "0 results;sql1";
};
$sql6 = "SELECT * FROM main_us WHERE us_state <> 'Total:' AND us_state <> 'USState' ORDER BY active_cases DESC LIMIT 10";
$result6 = $conn->query($sql6);

if ($result6->num_rows > 0) {
    // output data of each row
    while ($row = $result6->fetch_assoc()) {
        array_push($arr_values_states_10, $row);
    }
} else {
    //echo "0 results;sql1";
};
$sql2 = "SELECT country, (total_cases-total_deaths-total_recovered) as active_cases FROM main WHERE country <> 'Total:' AND country <> 'World'";
$result2 = $conn->query($sql2);

$arr_all_active = array();
if ($result2->num_rows > 0) {
    // output data of each row
    while ($row = $result2->fetch_assoc()) {
        array_push($arr_all_active, $row);
    }
} else {
    //echo "0 results;sql1";
};
$sql3 = "SELECT us_state, active_cases FROM main_us WHERE us_state <> 'Total:' AND us_state <> 'USState'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    // output data of each row
    while ($row = $result3->fetch_assoc()) {
        array_push($arr_all_active_us, $row);
    }
} else {
    //echo "0 results;sql1";
};
$sql7='SELECT * FROM `main` WHERE country IN ("Ukraine","France","Spain","Sweden","Germany","Finland","Norway","Poland","Italy","UK","Romania","Belarus","Greece","Bulgaria",
"Iceland","Portugal","Czechia","Denmark","Hungary","Serbia","Austria","Ireland","Lithuania","Latvia","Croatia","Bosnia and Herzegovina","Slovakia","Estonia","Netherlands",
"Switzerland","Moldova","Belgium","Albania","Macedonia","Slovenia","Montenegro","Cyprus","Luxembourg","Faroe","Andorra","Malta","Liechtenstein","Guernsey",
"San Marino","Gibraltar","Monaco","Vatican","Russia") ORDER BY `active_cases` DESC';
$result7 = $conn->query($sql7);
$arr_values_eu=array();
if ($result7->num_rows > 0) {
    // output data of each row
    while ($row = $result7->fetch_assoc()) {
        array_push($arr_values_eu, $row);
    }
} else {
    //echo "0 results;sql1";
};
$eu_total_cases=null;$eu_total_death=null;$eu_total_recovered=null;$eu_total_active=null;$eu_new_cases=null;$eu_new_deaths=null;
for($i=0;$i<count($arr_values_eu);$i++) {
	$eu_total_cases = $eu_total_cases + $arr_values_eu[$i]["total_cases"];
	$eu_total_death = $eu_total_death + $arr_values_eu[$i]["total_deaths"];
	$eu_total_recovered = $eu_total_recovered + $arr_values_eu[$i]["total_recovered"];
	$eu_total_active = $eu_total_active + $arr_values_eu[$i]["active_cases"];
	$eu_new_deaths = $eu_new_deaths + $arr_values_eu[$i]["new_deaths"];
	$eu_new_cases = $eu_new_cases + $arr_values_eu[$i]["new_cases"];
}
$conn->close();

function xml2array($xmlObject, $out = array())
{
    foreach ((array)$xmlObject as $index => $node)
        $out[$index] = (is_object($node)) ? xml2array($node) : $node;

    return $out;
}

$xml = simplexml_load_file("http://feeds.reuters.com/reuters/healthNews") or die("Error: Cannot create object");

if ($xml === false) {
    echo "Failed loading XML: ";
    foreach (libxml_get_errors() as $error) {
        echo "<br>", $error->message;
    }
} else {
    $xml_arr = xml2array($xml);
    //print("<pre>".print_r($xml_arr,true)."</pre>");
}

?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]--><!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="refresh" content="180">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
	display:block;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 0.5s;
  animation-name: fade;
  animation-duration: 0.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
    </style>
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {
            'packages': ['corechart', 'bar', 'geochart'],
            'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var recovered =<?php echo $arr_values["total_recovered"];?>;
            var death =<?php echo $arr_values["total_deaths"];?>;
            var activeCases = <?php echo $arr_values["total_cases"];?>-death - recovered;
            var data = google.visualization.arrayToDataTable([
                ['Info', 'Amount'],
                ['Active cases', activeCases],
                ['Recovered', recovered],
                ['Death', death]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {
                chartArea: {width: '85%', height: '85%'},
                is3D: true,
                width: 600,
                height: 450,
                colors: ['orange', 'green', 'black'],
                legend: {position: 'right', textStyle: {color: 'white', fontName: 'Montserrat', fontSize: 16}},
                pieSliceTextStyle: {
                    fontName: 'Montserrat', fontSize: 16
                },
                backgroundColor: '#283142'
            };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);

            var data1 = new google.visualization.DataTable();
            data1.addColumn('string', 'Country');
            data1.addColumn('number', 'Active cases');
            data1.addRows([
                <?php
                for ($i = 0; $i < count($arr_all_active); $i++) {
                    if ($arr_all_active[$i]['country'] == 'USA') {
                        $arr_all_active[$i]['country'] = 'US';
                    }
                    if ($arr_all_active[$i]['country'] == 'UK') {
                        $arr_all_active[$i]['country'] = 'United Kingdom';
                    }
                    if ($arr_all_active[$i]['country'] == 'S. Korea') {
                        $arr_all_active[$i]['country'] = 'KR';
                    }
					if ($arr_all_active[$i]['country'] == 'Czechia') {
                        $arr_all_active[$i]['country'] = 'CZ';
                    }
                    if ($i != count($arr_all_active) - 1) {
                        echo "['" . $arr_all_active[$i]['country'] . "'," . $arr_all_active[$i]['active_cases'] . "],";
                    } else {
                        echo "['" . $arr_all_active[$i]['country'] . "'," . $arr_all_active[$i]['active_cases'] . "]";
                    }
                }
                ?>
            ]);

            var options1 = {
                width: 1700,
                height: 600,
                displayMode: 'auto',
				legend: 'none',
                colorAxis: {colors: ['#BCDE7E','#FFC300', '#FF5733', '#C70039', '#900C3F', '#72025E']},
                backgroundColor: '#283142'
            };

            var chart1 = new google.visualization.GeoChart(document.getElementById('chart_div'));
            chart1.draw(data1, options1);
		
            var data4 = new google.visualization.DataTable();
            data4.addColumn('string', 'State');
            data4.addColumn('number', 'Active cases');
            data4.addRows([
                <?php
                for ($i = 0; $i < count($arr_all_active_us); $i++) {
                    if ($i != count($arr_all_active_us) - 1) {
                        echo "['" . $arr_all_active_us[$i]['us_state'] . "'," . $arr_all_active_us[$i]['active_cases'] . "],";
                    } else {
                        echo "['" . $arr_all_active_us[$i]['us_state'] . "'," . $arr_all_active_us[$i]['active_cases'] . "]";
                    }
                }
                ?>
            ]);

            var options4 = {
                width: 1050,
                height: 600,
				region: 'US',
				resolution: 'provinces',
                displayMode: 'auto',
				legend: {position: 'bottom', textStyle: {fontSize: 14}},
                colorAxis: {colors: ['#BCDE7E','#FFC300', '#FF5733', '#C70039', '#900C3F', '#72025E']},
                backgroundColor: '#283142'
            };

            var chart4 = new google.visualization.GeoChart(document.getElementById('piechart_usa'));
            chart4.draw(data4, options4);
			
			var data5 = new google.visualization.DataTable();
            data5.addColumn('string', 'Country');
            data5.addColumn('number', 'Active cases');
            data5.addRows([
                <?php
                for ($i = 0; $i < count($arr_values_eu); $i++) {
                    if ($arr_values_eu[$i]['country'] == 'UK') {
                        $arr_values_eu[$i]['country'] = 'GB';
                    }                    
					if ($arr_values_eu[$i]['country'] == 'Czechia') {
                        $arr_values_eu[$i]['country'] = 'CZ';
                    }
                    if ($i != count($arr_values_eu) - 1) {
                        echo "['" . $arr_values_eu[$i]['country'] . "'," . $arr_values_eu[$i]['active_cases'] . "],";
                    } else {
                        echo "['" . $arr_values_eu[$i]['country'] . "'," . $arr_values_eu[$i]['active_cases'] . "]";
                    }
                }
                ?>
            ]);

            var options5 = {
                width: 1050,
                height: 600,
				region: '150',
                displayMode: 'auto',
				legend: {position: 'bottom', textStyle: {fontSize: 14}},
                colorAxis: {colors: ['#BCDE7E','#FFC300', '#FF5733', '#C70039', '#900C3F', '#72025E']},
                backgroundColor: '#283142'
            };

            var chart5 = new google.visualization.GeoChart(document.getElementById('piechart_eu'));
            chart5.draw(data5, options5);
			
			var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Country');
            data3.addColumn('number', 'Active');
            data3.addColumn('number', 'Recovered');
            data3.addColumn('number', 'Death');
            data3.addRows([
                <?php
                for ($i = 0; $i < count($arr_values_countries); $i++) {
                    if ($i != count($arr_values_countries) - 1) {
                        $active = $arr_values_countries[$i]['total_cases'] - $arr_values_countries[$i]['total_recovered'] - $arr_values_countries[$i]['total_deaths'];
                        echo "['" . $arr_values_countries[$i]['country'] . "'," . $active . "," . $arr_values_countries[$i]['total_recovered'] . "," . $arr_values_countries[$i]['total_deaths'] . "],";
                    } else {
                        echo "['" . $arr_values_countries[$i]['country'] . "'," . $active . "," . $arr_values_countries[$i]['total_recovered'] . "," . $arr_values_countries[$i]['total_deaths'] . "]";
                    }
                }
                ?>
            ]);

            var options3 = {
                backgroundColor: '#283142',
				width: '90%',
                height: '90%',
				bars: 'vertical',
                vAxis:
                    {
                        textStyle: {
                            color: 'white',
                            fontName: 'Montserrat', fontSize: 20
                        }
                    },
                hAxis:
                    {
                        textStyle: {
                            color: 'white',
                            fontName: 'Montserrat', fontSize: 20
                        }
                    },
                legend: {position: 'bottom', textStyle: {color: 'white', fontName: 'Montserrat', fontSize: 18}},
                colors: ['orange', 'green', 'black']
            };

            var chart3 = new google.charts.Bar(document.getElementById('columnchart_material'));
	
            chart3.draw(data3, google.charts.Bar.convertOptions(options3));
			
			var data5 = new google.visualization.DataTable();
            data5.addColumn('string', 'State');
            data5.addColumn('number', 'Active');
            data5.addColumn('number', 'Recovered');
            data5.addColumn('number', 'Death');
            data5.addRows([
                <?php
                for ($i = 0; $i < count($arr_values_states_10); $i++) {
                    if ($i != count($arr_values_states_10) - 1) {
                        $recovered = $arr_values_states_10[$i]['total_cases'] - $arr_values_states_10[$i]['active_cases'] - $arr_values_states_10[$i]['total_deaths'];
                        echo "['" . $arr_values_states_10[$i]['us_state'] . "'," . $arr_values_states_10[$i]['active_cases'] . "," . $recovered . "," . $arr_values_states_10[$i]['total_deaths'] . "],";
                    } else {
                        echo "['" . $arr_values_states_10[$i]['us_state'] . "'," . $arr_values_states_10[$i]['active_cases'] . "," . $recovered . "," . $arr_values_states_10[$i]['total_deaths'] . "]";
                    }
                }
                ?>
            ]);

            var options5 = {
                backgroundColor: '#283142',
				width: '90%',
                height: '90%',
				bars: 'vertical',
                vAxis:
                    {
                        textStyle: {
                            color: 'white',
                            fontName: 'Montserrat', fontSize: 20
                        }
                    },
                hAxis:
                    {
                        textStyle: {
                            color: 'white',
                            fontName: 'Montserrat', fontSize: 16
                        }
                    },
                legend: {position: 'bottom', textStyle: {color: 'white', fontName: 'Montserrat', fontSize: 18}},
                colors: ['orange', 'green', 'black']
            };

            var chart5 = new google.charts.Bar(document.getElementById('columnchart_material_us'));
	
            chart5.draw(data5, google.charts.Bar.convertOptions(options5));

            /*var data2 = google.visualization.arrayToDataTable([
                ['Europe', 'Asia', 'North. America', 'South America', 'Australia',
                    'Africa', {role: 'annotation'}],
                ['World', 28, 19, 29, 30, 12, '']
            ]);

            var options2 = {
                width: 770,
                height: 400,
                legend: {position: 'right', textStyle: {color: 'white', fontSize: 12}},
                bar: {groupWidth: '75%'},
                isStacked: 'percent',
                backgroundColor: '#283142',
                vAxis:
                    {
                        textStyle: {
                            color: 'white',
                            fontName: 'Montserrat', fontSize: 18
                        }
                    },
                hAxis:
                    {
                        textStyle: {
                            color: 'white',
                            fontName: 'Montserrat', fontSize: 18
                        }
                    }
            };
            var chart2 = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart2.draw(data2, options2);*/

            
        }
    </script>

</head>
<body style="color:white;background-color:#283142;font-family: 'Montserrat', sans-serif;">

<!-- Slideshow container -->
<div class="slideshow-container">

	<div class="mySlides fade">
        <h1 style="text-align:center"><u>Top 10 states in USA</u></h1>
        <div id="columnchart_material_us" style="width:90%;height:920px;padding-top:50px;margin:auto;position:relative;"></div>
    </div>
	
    <div class="mySlides fade">
        <h1 style="text-align:center"><u>Top 10 countries (except USA)</u></h1>
        <div id="columnchart_material" style="width:90%;height:920px;padding-top:50px;margin:auto;position:relative;"></div>		
    </div>
	
	<div class="mySlides fade">
		<h1 style="text-align:center"><u>Coronavirus cases in USA</u></h1>
		<table style="margin-left:auto;margin-right:auto;" width="95%" height="95%">
            <tr>
                <td>
                    <div id="piechart_usa" style="width:1000px;height:600px;"></div>
                </td>
                <td>
                    <table style="margin-left:-250px;">
                     <tr>
                    <td align="center">
                    <h1 style="font-width:bold;font-size:35pxc;color:grey;">Cases<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($arr_values_us["total_cases"],0,",","."); ?></font>
								<font style="font-width:bold;font-size:20px;"><u>+<?php echo number_format($arr_values_us["new_cases"],0,",","."); ?></u></font>
                    </h1>
                </td>
				<td align="center">
                    <h1 style="padding-left:50px;font-width:bold;font-size:35px;color:orange;">Active<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($arr_values_us["active_cases"],0,",","."); ?>
                    </h1>
                </td>
				</tr><tr>
                <td align="center" style="padding-left:50px;padding-right:50px;">
                    <h1 style="font-width:bold;font-size:35px;color:lightblue;">Deaths<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($arr_values_us["total_deaths"],0,",","."); ?>
								<font style="font-width:bold;font-size:20px;"><u>+<?php echo number_format($arr_values_us["new_deaths"],0,",","."); ?></u>
								</h1>
                </td>
                <td align="center">
                    <h1 style="font-width:bold;font-size:35px;color:green;">Recovered<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format(
								$arr_values_us["total_cases"]-$arr_values_us["active_cases"]-$arr_values_us['total_deaths'],0,",","."); ?>
                    </h1>
                </td>
            </tr>
        </table>
        </td>
        </tr>
		</table>		
	</div>
	
	<div class="mySlides fade">
		<h1 style="text-align:center"><u>Coronavirus cases in Europe</u></h1>
		<table style="margin-left:auto;margin-right:auto;" width="95%" height="95%">
            <tr>
                <td>
                    <div id="piechart_eu" style="width:1000px;height:600px;"></div>
                </td>
                <td>
                    <table style="margin-left:-250px;">
                     <tr>
                    <td align="center">
                    <h1 style="font-width:bold;font-size:35pxc;color:grey;">Cases<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($eu_total_cases,0,",","."); ?></font>
								<font style="font-width:bold;font-size:20px;"><u>+<?php echo number_format($eu_new_cases,0,",","."); ?></u></font>
                    </h1>
                </td>
				<td align="center">
                    <h1 style="padding-left:50px;font-width:bold;font-size:35px;color:orange;">Active<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($eu_total_active,0,",","."); ?>
                    </h1>
                </td>
				</tr><tr>
                <td align="center" style="padding-left:50px;padding-right:50px;">
                    <h1 style="font-width:bold;font-size:35px;color:lightblue;">Deaths<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($eu_total_death,0,",","."); ?>
								<font style="font-width:bold;font-size:20px;"><u>+<?php echo number_format($eu_new_deaths,0,",","."); ?></u>
								</h1>
                </td>
                <td align="center">
                    <h1 style="font-width:bold;font-size:35px;color:green;">Recovered<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($eu_total_recovered,0,",","."); ?>
                    </h1>
                </td>
            </tr>
        </table>
        </td>
        </tr>
		</table>		
	</div>
	
    <div class="mySlides fade">
        <h1 align="center">Coronavirus Cases Infos</h1>
        <table style="margin-left:auto; margin-right:auto;" width="95%" height="95%">
            <tr>
                <td colspan="2">
                    <div id="chart_div" style="width:1800px; height:600px;"></div>
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td align="center" style="padding-left:75px;">
                    <table width="80%">
                     <tr>
                    <td align="center">
                    <h1 style="font-width:bold;font-size:35pxc;color:grey;">Cases<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($arr_values["total_cases"],0,",","."); ?></font>
								<font style="font-width:bold;font-size:20px;"><u>+<?php echo number_format($arr_values["new_cases"],0,",","."); ?></u></font>
                    </h1>
                </td>
				<td align="center">
                    <h1 style="padding-left:50px;font-width:bold;font-size:35px;color:orange;">Active<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($arr_values["active_cases"],0,",","."); ?>
                    </h1>
                </td>
				</tr><tr>
                <td align="center" style="padding-left:50px;padding-right:50px;">
                    <h1 style="font-width:bold;font-size:35px;color:lightblue;">Deaths<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($arr_values["total_deaths"],0,",","."); ?>
								<font style="font-width:bold;font-size:20px;"><u>+<?php echo number_format($arr_values["new_deaths"],0,",","."); ?></u>
								</h1>
                </td>
                <td align="center">
                    <h1 style="font-width:bold;font-size:35px;color:green;">Recovered<br><font
                                style="font-width:bold;font-size:35px;"><?php echo number_format($arr_values["total_recovered"],0,",","."); ?>
                    </h1>
                </td>
            </tr>
        </table>
        </td>
        <td>
            <div id="piechart" style="width: 350px; height: 400px;"></div>
            <!--<div id="columnchart_values" style="width: 700px; height: 400px;"></div> -->
        </td>
        </tr>
        </table>
    </div>

    <div class="mySlides fade">
        <h1 style="text-align:center;"><u>Top World News</u></h1>
        <?php
        echo "<div style='text-align:center;'>";
		$i=0;
        foreach ($xml_arr['channel']['item'] as $item) {
			if($i<15) {
            echo '<h1>+++  ', $item->title, "  +++</h1>";
            //echo '<h5>', strip_tags($item -> description), "</h5>";
			}
			$i++;
        }
        echo "</div>";
        ?>
    </div>

    <div class="mySlides fade">
        <img src="corona_protect.png" style="width:90%;height:90%;display: block;margin-left: auto;margin-right: auto;margin-top: 150px;">
    </div>
	
	 <div class="mySlides fade">
        <img src="corona_protect_1.png" style="width:90%;height:90%;display: block;margin-left: auto;margin-right: auto;margin-top: 150px;">
    </div>

</div>
<br><br><br>

<script>
var slideIndex = 0;
(function(funcName, baseObj) {
    // The public function name defaults to window.docReady
    // but you can pass in your own object and own function name and those will be used
    // if you want to put them in a different namespace
    funcName = funcName || "docReady";
    baseObj = baseObj || window;
    var readyList = [];
    var readyFired = false;
    var readyEventHandlersInstalled = false;

    // call this when the document is ready
    // this function protects itself against being called more than once
    function ready() {
        if (!readyFired) {
            // this must be set to true before we start calling callbacks
            readyFired = true;
            for (var i = 0; i < readyList.length; i++) {
                // if a callback here happens to add new ready handlers,
                // the docReady() function will see that it already fired
                // and will schedule the callback to run right after
                // this event loop finishes so all handlers will still execute
                // in order and no new ones will be added to the readyList
                // while we are processing the list
                readyList[i].fn.call(window, readyList[i].ctx);
            }
            // allow any closures held by these functions to free
            readyList = [];
        }
    }

    function readyStateChange() {
        if ( document.readyState === "complete" ) {
            ready();
        }
    }

    // This is the one public interface
    // docReady(fn, context);
    // the context argument is optional - if present, it will be passed
    // as an argument to the callback
    baseObj[funcName] = function(callback, context) {
        if (typeof callback !== "function") {
            throw new TypeError("callback for docReady(fn) must be a function");
        }
        // if ready has already fired, then just schedule the callback
        // to fire asynchronously, but right away
        if (readyFired) {
            setTimeout(function() {callback(context);}, 1);
            return;
        } else {
            // add the function and context to the list
            readyList.push({fn: callback, ctx: context});
        }
        // if document already ready to go, schedule the ready function to run
        if (document.readyState === "complete") {
            setTimeout(ready, 1);
        } else if (!readyEventHandlersInstalled) {
            // otherwise if we don't have event handlers installed, install them
            if (document.addEventListener) {
                // first choice is DOMContentLoaded event
                document.addEventListener("DOMContentLoaded", ready, false);
                // backup is window load event
                window.addEventListener("load", ready, false);
            } else {
                // must be IE
                document.attachEvent("onreadystatechange", readyStateChange);
                window.attachEvent("onload", ready);
            }
            readyEventHandlersInstalled = true;
        }
    }
})("docReady", window);

docReady(function(){
    showSlidesInit();
});

function showSlidesInit() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "block";
  }
  setTimeout(showSlides, 3000);
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 8000);
}
</script>

</body>
<html>