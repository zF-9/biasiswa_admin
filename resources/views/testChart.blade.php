<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Shares of Electricity Generation by Fuel"
	},
	subtitles: [{
		text: "United Kingdom, 2016",
		fontSize: 16
	}],
	data: [{
		type: "pie",
		indexLabelFontSize: 18,
		radius: 184,
		indexLabel: "{label} - {y}",
		yValueFormatString: "###0.0'%'",
		click: explodePie,
		dataPoints: [
			{ y: 42, label: "Gas" },
			{ y: 21, label: "Nuclear"},
			{ y: 24.5, label: "Renewable" },
			{ y: 9, label: "Coal" },
			{ y: 3.1, label: "Other Fuels" }
		]
	}]
});
chart.render();

function explodePie(e) {
	for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
		if(i !== e.dataPointIndex)
			e.dataSeries.dataPoints[i].exploded = false;
	}
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="{{ asset ('js/canvasjs.min.js') }}"></script>
</div>
</body>
</html>