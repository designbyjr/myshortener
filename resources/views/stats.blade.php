<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stats for {{$page_name}}</title>
    <script src = "https://www.gstatic.com/charts/loader.js"></script>
    <script type = "text/javascript">
		google.charts.load('current', {packages: ['corechart']});
    </script>
</head>
<body>
<h1>Stats for {{$page_name}} by date (Last 7 days)</h1>
<h3>Url:{{$url}}</h3>
<div id = "container" style = "width: 550px; height: 400px; margin: 0 auto">
</div>
<script language = "JavaScript">
	function drawChart() {
		// Define the chart to be drawn.
		var data = google.visualization.arrayToDataTable([
            ['date','requests'],
			['{{$items['name'][0]}}', Number({{$items['value'][0]}})],


		]);

		var options = {title: 'Requests by date'};

		// Instantiate and draw the chart.
		var chart = new google.visualization.BarChart(document.getElementById('container'));
		chart.draw(data, options);
	}
	google.charts.setOnLoadCallback(drawChart);
</script>
</body>
</html>