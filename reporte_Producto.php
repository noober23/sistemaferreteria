<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<!-- libraries google chart -->

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <!-- js of google of chart for PHP Google Charts --> 
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    
    <script type="text/javascript">
	    	// Load the Visualization API and the piechart package.
	    google.charts.load('current', {'packages':['corechart']});
	      
	    // Set a callback to run when the Google Visualization API is loaded.
	    google.charts.setOnLoadCallback(drawChart);
	      
	    function drawChart() {
	      var jsonData = $.ajax({
	          url: "getData.php",
	          dataType: "json",
	          async: false
	          }).responseText;
	          
	      // Create our data table out of JSON data loaded from server.
	      var data = new google.visualization.DataTable(jsonData);

	      // Instantiate and draw our chart, passing in some options.
	      var chart = new google.visualization.PieChart(document.getElementById('stock-minimo'));
	      chart.draw(data, {width: 400, height: 240});
    }

    </script>


	<title></title>
</head>
<body>

    <!--Div that will hold the pie chart-->

	<div id="pie-chart"></div>
	<?php
		echo '<h1>hotla</h1>';

	?>
	<label for="s">Categoria</label>

	


	<div id="stock-minimo"></div>


	<div id="piechart" style="width: 900px; height: 500px;"></div>

<?php
	require_once "app/coneccion.php";
	$cnn= new Conexion();
	$con = $cnn->conexionMysql();

	mysqli_select_db($con,"sistemaferreteria");
	$query = "SELECT nombre,stock FROM producto WHERE stock>100";
	

                $result = $con->query($query);

                //get no of rows

                $rows_count = $result ->num_rows;

               if($rows_count>0):

  ?>

                <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);

 function drawChart() {

var data = google.visualization.arrayToDataTable([

          ['Coding', 'Hours per Day'],

         <?php

                                 foreach($result as $info){

                                 extract($info);

                                 echo  "['$nombre', $stock],";

         }  ?>

        ]);

  var options = {

          title: 'My Daily Coding Activities'

        };

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));

chart.draw(data, options);

      }

    </script>

  <?php endif; ?>



<?Php
require_once "app/coneccion.php";

  $cnn= new Conexion();
  $con = $cnn->conexionMysql();
  mysqli_select_db($con,"sistemaferreteria");

if($stmt = $con->query("SELECT nombre,stock,precio_compra FROM producto")){

  echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>Nombre</th><th>Stock</th><th>Precio (compra)</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
//echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
    
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'nombre');
        data.addColumn('number', 'Stock');
    data.addColumn('number', 'Precio');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1]),parseInt(my_2d[i][2])]);
       var options = {
          title: 'venta',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);
       }
  ///////////////////////////////
////////////////////////////////////  
</script>
<div id="chart_div"></div>

</body>
</html>