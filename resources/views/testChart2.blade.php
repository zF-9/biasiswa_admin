<!DOCTYPE html>
<html>
  <head>
    <title>My first Chartist Tests</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Chart.min.css') }}">
    <script src="{{ asset ('js/Chart.js') }}"></script>
  </head>
  <body>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

  	<!--<div class="ct-chart ct-perfect-fourth"></div>
    
    <script>
		var data = {
		  labels: ['Bananas', 'Apples', 'Grapes'],
		  series: [20, 15, 40]
		};

		var options = {
		  labelInterpolationFnc: function(value) {
		    return value[0]
		  }
		};

		var responsiveOptions = [
		  ['screen and (min-width: 640px)', {
		    chartPadding: 30,
		    labelOffset: 100,
		    labelDirection: 'explode',
		    labelInterpolationFnc: function(value) {
		      return value;
		    }
		  }],
		  ['screen and (min-width: 1024px)', {
		    labelOffset: 80,
		    chartPadding: 20
		  }]
		];

		new Chartist.Pie('.ct-chart', data, options, responsiveOptions);    	
    </script>-->
  </body>
</html>