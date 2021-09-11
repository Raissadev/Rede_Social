<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Pessoas Online'],
          ['Germany', <?php echo count($usuariosOnline); ?>],
          ['United States', <?php echo count($usuariosOnline); ?>],
          ['Brazil', <?php echo count($usuariosOnline); ?>],
          ['Canada', <?php echo count($usuariosOnline); ?>],
          ['France', <?php echo count($usuariosOnline); ?>],
          ['RU', <?php echo count($usuariosOnline); ?>]
        ]);

        var options = {
			backgroundColor: 'transparent',
			datalessRegionColor: '#22223D',
			defaultColor: '#5a51c7',
			colorAxis: {colors: ['#5a51c7', '#5a51c7']}
		};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Effort', 'Amount given'],
          ['Myall', <?php echo $pegarVisitasTotais; ?>],
        ]);

        var options = {
          pieHole: 0.5,
		  pieSliceBorderColor: 'transparent',
		  slices: [{color: '5a51c7'}],
		  pieSliceTextStyle: {
            color: 'var(--textColor)',
          },
          legend: 'none',
		  backgroundColor: 'transparent',
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
      }
    </script>