 <?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "corona";
$arr_values = array();
$arr_values_countries = array();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT total_cases as total_sum,total_deaths,total_recovered FROM main WHERE country='Total:'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$arr_values = array("total_cases" => $row["total_sum"],"total_deaths" => $row["total_deaths"],"total_recovered" => $row["total_recovered"]);
       // echo "total_cases_sum: " . $row["total_sum"]. " - total_deaths: " . $row["total_deaths"]. " total_recovered" . $row["total_recovered"]. "<br>";
    }
} else {
    //echo "0 results;sql";
}
$sql1 = "SELECT * FROM main WHERE country <> 'Total:' ORDER BY total_cases DESC LIMIT 15";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		array_push($arr_values_countries,$row);
    }
} else {
    //echo "0 results;sql1";
};
$sql2 = "SELECT country, (total_cases-total_deaths-total_recovered) as active_cases FROM main WHERE country <> 'Total:'";
$result2 = $conn->query($sql2);

$arr_all_active = array();
if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
		array_push($arr_all_active,$row);
    }
} else {
    //echo "0 results;sql1";
};

$conn->close();

function xml2array ( $xmlObject, $out = array () )
{
    foreach ( (array) $xmlObject as $index => $node )
        $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;

    return $out;
}

$xml=simplexml_load_file("http://feeds.reuters.com/reuters/healthNews") or die("Error: Cannot create object");

if ($xml === false) {
    echo "Failed loading XML: ";
    foreach(libxml_get_errors() as $error) {
        echo "<br>", $error->message;
    }
} else {
	$xml_arr = xml2array($xml);
	//print("<pre>".print_r($xml_arr,true)."</pre>");
}

 ?>
 <!DOCTYPE html>
 <!--[if IE 8]> <html lang="en" class="ie8"> <![endif]--><!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
 <!--[if !IE]><!--> <html lang="en"> <!--<![endif]--> 
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <link href="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.css" rel="stylesheet">
 <script src="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" integrity="sha256-YjcCvXkdRVOucibC9I4mBS41lXPrWfqY2BnpskhZPnw=" crossorigin="anonymous" />
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
  display: none;
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
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
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
google.charts.load('current', {'packages':['corechart', 'geochart', 'bar'],'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
	var recovered=<?php echo $arr_values["total_recovered"];?>;
	var death=<?php echo $arr_values["total_deaths"];?>;
	var activeCases=<?php echo $arr_values["total_cases"];?>-death-recovered;
  var data = google.visualization.arrayToDataTable([
  ['Info', 'Amount'],
  ['Active cases', activeCases],
  ['Recovered', recovered],
  ['Death', death]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {
	  chartArea:{width:'85%',height:'85%'},
  is3D: true,
  width: 700,
        height: 400,
  colors:['orange','green', 'black'],
  legend:{position: 'bottom', textStyle: {color: 'white', fontName: 'Montserrat', fontSize: 12}},
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
    for($i=0;$i<count($arr_all_active);$i++){
		if ($arr_all_active[$i]['country']=='USA') {
		$arr_all_active[$i]['country'] = 'US';	
		}
		if ($arr_all_active[$i]['country']=='UK') {
		$arr_all_active[$i]['country'] = 'United Kingdom';	
		}
		if ($arr_all_active[$i]['country']=='S. Korea') {
		$arr_all_active[$i]['country'] = 'KR';	
		}
		if($i!=count($arr_all_active)-1) {
			echo "['".$arr_all_active[$i]['country']. "',".$arr_all_active[$i]['active_cases']."],";
		}else{
			echo "['".$arr_all_active[$i]['country']. "',".$arr_all_active[$i]['active_cases']."]";
		} 
	}
    ?>
    ]);

      var options1 = {
		  width: 1300,
        height: 430,
        displayMode: 'auto',
        colorAxis: {colors: ['yellow', 'red']},
		legend: 'none',
		backgroundColor: '#283142'
      };

      var chart1 = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart1.draw(data1, options1);
	  
	  var data2 = google.visualization.arrayToDataTable([
        ['Europe', 'Asia', 'North. America', 'South America', 'Australia',
         'Africa', { role: 'annotation' } ],
        ['World', 28, 19, 29, 30, 12, '']
      ]);

      var options2 = {
        width: 770,
        height: 400,
        legend: { position: 'right', textStyle: {color: 'white', fontSize: 12}},
        bar: { groupWidth: '75%' },
        isStacked: 'percent',
		backgroundColor: '#283142',
		vAxis:
		{
			textStyle:{ color: 'white',
  fontName: 'Montserrat', fontSize: 18}
		},
		hAxis:
		{
			textStyle:{ color: 'white',
  fontName: 'Montserrat', fontSize: 18}
		}
      };	  
	  //var chart2 = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      //chart2.draw(data2, options2);
	  
	  var data3 = new google.visualization.DataTable();
    data3.addColumn('string', 'Country');
    data3.addColumn('number', 'Active');
	data3.addColumn('number', 'Recovered');
	data3.addColumn('number', 'Death');	
    data3.addRows([

    <?php
    for($i=0;$i<count($arr_values_countries);$i++){
		if($i!=count($arr_values_countries)-1) {
			$active= $arr_values_countries[$i]['total_cases']-$arr_values_countries[$i]['total_recovered']-$arr_values_countries[$i]['total_deaths'];
			echo "['".$arr_values_countries[$i]['country']. "',".$active.",".$arr_values_countries[$i]['total_recovered'].",".$arr_values_countries[$i]['total_deaths']."],";
		}else{
			echo "['".$arr_values_countries[$i]['country']. "',".$active.",".$arr_values_countries[$i]['total_recovered'].",".$arr_values_countries[$i]['total_deaths']."]";
		} 
	}
    ?>
    ]);

        var options3 = {
			backgroundColor: '#283142',
			vAxis:
		{
			textStyle:{ color: 'white',
  fontName: 'Montserrat', fontSize: 16}
		},
		hAxis:
		{
			textStyle:{ color: 'white',
  fontName: 'Montserrat', fontSize: 13}
		},
		legend: { position: 'bottom', textStyle: {color: 'white', fontName: 'Montserrat', fontSize: 16}},
		colors:['orange','green', 'black'],
          chart: {
			backgroundColor: '#283142'
          }
        };

        var chart3 = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart3.draw(data3, google.charts.Bar.convertOptions(options3));
}
</script>

 </head>
<body style="color:white;background-color:#283142;font-family: 'Montserrat', sans-serif;">

<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
  <h1 align="center">Coronavirus Cases Update</h1>
    <table style="margin-left:auto; margin-right:auto;">
<tr>
<td colspan="2">
<div id="chart_div" style="width: 1200px; height: 450px;"></div>
</td>
<td>

</td>
</tr>
<tr>
<td align="center" style="padding-left:75px;">
<table width="80%>
<tr>
<td align="center">
<h1 style="font-width:bold;font-size:35pxc;color:orange;">Cases<br><font style="font-width:bold;font-size:35px;"><?php echo $arr_values["total_cases"];?></font></h1>
</td>
<td align="center" style="padding-left:50px;padding-right:50px;">
<h1 style="font-width:bold;font-size:35px;color:lightblue;">Deaths<br><font style="font-width:bold;font-size:35px;"><?php echo $arr_values["total_deaths"];?></h1>
</td>
<td align="center">
<h1 style="font-width:bold;font-size:35px;color:green;">Recovered<br><font style="font-width:bold;font-size:35px;"><?php echo $arr_values["total_recovered"];?></h1>
</td>
</tr>
</table>
</td>
<td>
<div id="piechart" style="width: 700px; height: 400px;"></div>
<!--<div id="columnchart_values" style="width: 700px; height: 400px;"></div> -->
</td>
</tr>
</table>
  </div>

  <div class="mySlides fade">
  <h1 style="text-align:center">Top 15 countries</h1>
   <div id="columnchart_material" style="width: 90%; height: 750px;padding-left:150px;padding-top:50px;"></div>
  </div>
  
  <div class="mySlides fade">
  <h1 style="text-align:center";>Top World News</h1>
    <?php
		echo "<div style='margin:auto;position: relative;text-align:center;'>";
		foreach($xml_arr['channel']['item'] as $item) {
			echo '<h3>+++  ', $item -> title, "  +++</h3>";
			//echo '<h5>', strip_tags($item -> description), "</h5>";
		}
		echo "</div>";
	?>
  </div>

  <div class="mySlides fade">
    <img src="corona_digest.png" style="width:100%;height:85%;margin:auto;position: relative;">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center;visibility:hidden;">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
</div>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}

</script>

</body>
<html>