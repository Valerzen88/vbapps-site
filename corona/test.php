<html>
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>

<style>
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900|Dosis:300,400,600,700,800|Droid+Sans:400,700|Lato:300,400,700,900|PT+Sans:400,700|Ubuntu:300,400,500,700|Open+Sans:400,300,600,700|Roboto:400,300,500,700,900|Roboto+Condensed:400,300,700|Open+Sans+Condensed:300,700|Play:400,700|Maven+Pro:400,500,700,900&subset=latin,latin-ext);
body {
  padding: 0;
  margin: 0;
  background-color: #222;
  overflow: hidden;
}

svg {
  position: absolute;
  width: 800px;
  height: 480px;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSI2MCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiLz48c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMyMTU3NjkiLz48L2xpbmVhckdyYWRpZW50PjwvZGVmcz48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyYWQpIiAvPjwvc3ZnPiA=');
  background-size: 100%;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(60%, #000000), color-stop(100%, #215769));
  background-image: -moz-linear-gradient(#000000 60%, #215769 100%);
  background-image: -webkit-linear-gradient(#000000 60%, #215769 100%);
  background-image: linear-gradient(#000000 60%, #215769 100%);
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: 0 0 50px rgba(0, 0, 0, 0.8);
  -webkit-box-shadow: 0 0 50px rgba(0, 0, 0, 0.8);
  box-shadow: 0 0 50px rgba(0, 0, 0, 0.8);
}

.bgDot {
  stroke: none;
  fill: #215769;
}

.clockCircle {
  fill: none;
  stroke: #2a2a2a;
}

.clockArc {
  fill: none;
  stroke: #1bbccb;
}

.clockDot {
  fill: #e9fafc;
}

.caption {
  font-family: "Source Sans Pro";
  font-weight: 300;
  fill: White;
}

.dayText {
  font-size: 1.7rem;
}

.dateText {
  font-size: 2.5rem;
  font-weight: 400;
}

.timeText {
  font-family: "Open Sans";
  font-size: 5rem;
  font-weight: 600;
  fill: White;
}
</style>

</head>
<body>
<svg>
	<defs>
		<pattern id="dotPattern"
						 x="0" y="0" width="10" height="10"
						 patternUnits="userSpaceOnUse">
				<circle class="bgDot" cx="5" cy="5" r="2" />
		</pattern>
		
		<radialGradient id="backHoleBelowClock" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
			<stop offset="50%"  style="stop-color:rgb(0,0,0);stop-opacity:0.7"/>
			<stop offset="100%"	style="stop-color:rgb(0,0,0);stop-opacity:0"/>
		</radialGradient>

		<radialGradient id="blackVignette" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
      <stop offset="40%" style="stop-color:rgb(0,0,0);stop-opacity:0" />
      <stop offset="100%" style="stop-color:rgb(0,0,0);stop-opacity:1" />
    </radialGradient>

		<filter id="glow">
				<feGaussianBlur stdDeviation="2.5" result="coloredBlur"/>
				<feMerge>
						<feMergeNode in="coloredBlur"/>
						<feMergeNode in="SourceGraphic"/>
				</feMerge>
		</filter>		
		
		<filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
			<feGaussianBlur in="SourceAlpha" stdDeviation="3" result="shadow"/>
			<feOffset dx="1" dy="1"/>
			<feMerge>
				<feMergeNode/>
				<feMergeNode in="SourceGraphic"/>
			</feMerge>
		</filter>		
		
	</defs>
	
	<!-- Background objects -->
	<rect x="0" y="0" width="100%" height="100%" style="stroke: #000000; fill: url(#dotPattern);" /> 	
	<ellipse cx="500" cy="240" rx="300" ry="300" fill="url(#backHoleBelowClock)"/>	
	<ellipse cx="500" cy="240" rx="600" ry="600" fill="url(#blackVignette)"/>	
	
	<!-- Clock objects -->
	<circle class="clockCircle hour" cx="500" cy="240" r="150" stroke-width="6" />
	<path id="arcHour" class="clockArc hour" stroke-width="6" stroke-linecap="round" filter="url(#glow)" />
	<circle class="clockDot hour" r="8" filter="url(#glow)" />

	<circle class="clockCircle minute" cx="500" cy="240" r="170" stroke-width="3" />
	<path id="arcMinute" class="clockArc minute" stroke-width="3" stroke-linecap="round" filter="url(#glow)" />
	<circle class="clockDot minute" r="5" filter="url(#glow)" />
	
	<!-- Caption objects -->
	<text id="time" class="caption timeText" x="500" y="240" stroke-width="0" text-anchor="middle" alignment-baseline="middle"  filter="url(#shadow)"></text>
	
	<text id="day" class="caption dayText" x="300" y="210" stroke-width="0" text-anchor="end" alignment-baseline="middle"  filter="url(#shadow)"></text>
	<text id="date" class="caption dateText" x="300" y="250" stroke-width="0" text-anchor="end" alignment-baseline="middle" filter="url(#shadow)"></text>
	
</svg>

<script>
/*
Inspired by https://dribbble.com/shots/2004657-Alarm-Clock-concept
 */
var describeArc, polarToCartesian, setCaptions;

polarToCartesian = function(centerX, centerY, radius, angleInDegrees) {
  var angleInRadians;
  angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;
  return {
    x: centerX + radius * Math.cos(angleInRadians),
    y: centerY + radius * Math.sin(angleInRadians)
  };
};

describeArc = function(x, y, radius, startAngle, endAngle) {
  var arcSweep, end, start;
  start = polarToCartesian(x, y, radius, endAngle);
  end = polarToCartesian(x, y, radius, startAngle);
  arcSweep = endAngle - startAngle <= 180 ? '0' : '1';
  return ['M', start.x, start.y, 'A', radius, radius, 0, arcSweep, 0, end.x, end.y].join(' ');
};

setCaptions = function() {
  var dot, hour, hourArc, minArc, minute, now, pos;
  now = new Date();
  hour = now.getHours() % 12;
  minute = now.getMinutes();
  hourArc = (hour * 60 + minute) / (12 * 60) * 360;
  minArc = minute / 60 * 360;
  $('.clockArc.hour').attr('d', describeArc(500, 240, 150, 0, hourArc));
  $('.clockArc.minute').attr('d', describeArc(500, 240, 170, 0, minArc));
  $('.clockDot.hour').attr('d', describeArc(500, 240, 150, hourArc - 3, hourArc));
  $('.clockDot.minute').attr('d', describeArc(500, 240, 170, minArc - 1, minArc));
  dot = $(".clockDot.hour");
  pos = polarToCartesian(500, 240, 150, hourArc);
  dot.attr("cx", pos.x);
  dot.attr("cy", pos.y);
  dot = $(".clockDot.minute");
  pos = polarToCartesian(500, 240, 170, minArc);
  dot.attr("cx", pos.x);
  dot.attr("cy", pos.y);
  return $('#time').text(moment().format('H:mm'));
};

$('#day').text(moment().format('dddd'));

$('#date').text(moment().format('MMMM D'));

setCaptions();

setInterval(function() {
  return setCaptions();
}, 10 * 1000);

$(function() {
  TweenMax.staggerFrom(".clockArc", .5, {
    drawSVG: 0,
    ease: Power3.easeOut
  }, 0.3);
  TweenMax.from("#time", 1.0, {
    attr: {
      y: 350
    },
    opacity: 0,
    ease: Power3.easeOut,
    delay: 0.5
  });
  TweenMax.from(".dayText", 1.0, {
    attr: {
      y: 310
    },
    opacity: 0,
    delay: 1.0,
    ease: Power3.easeOut
  });
  return TweenMax.from(".dateText", 1.0, {
    attr: {
      y: 350
    },
    opacity: 0,
    delay: 1.5,
    ease: Power3.easeOut
  });
});

// ---
// generated by coffee-script 1.9.2
</script>

</body>
</html>