<?php

$con = mysqli_connect("localhost","root","","projectepa");

$query="SELECT `Projectdate`, `Projectperc` FROM `project` ORDER BY `Projectdate` desc";
$result=mysqli_query($con,$query);


?>

<!DOCTYPE HTML>
<html>
    <head>
    <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Projectdate', 'Projectperc'],

          <?php

                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result))
                    {
                        echo "['".$row['Projectdate']."','".$row['Projectperc']."'],"; 
                    }
                }

            ?>
        
        ]);

        var options = {
          chart: {
            title: 'Project Performance',
            subtitle: ' ',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  







  
<body>
<div id="columnchart_material" style="width: 800px; height: 500px;"></div>

</body>
</html>