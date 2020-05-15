<?php

$con = mysqli_connect("localhost","root","","goddb");

$query="SELECT `startdate`, `enddate`,`projectid`,`projectname`,`projectcompletionaverage` FROM `project` ORDER BY `startdate`";
$result=mysqli_query($con,$query);


?>



<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

<?php
    $query="SELECT `startdate`, `enddate` FROM `project`";
    $tresult = mysqli_query($conn, $query);
    $trow = mysqli_fetch_row($tresult);
    $tstart = $trow[0];
    $tend = $trow[1];
    echo "\nTask name is : ".$tstart;
    echo "\nTask start date is ".$tend;

?>
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'projectid');
      data.addColumn('string', 'projectname');
    //  data.addColumn('string', 'Resource');
      data.addColumn('date', 'startdate');
      data.addColumn('date', 'enddate');
   //   data.addColumn('number', 'Duration');
      data.addColumn('string', 'projectcompletionaverage');
   //   data.addColumn('string', 'Dependencies');

      data.addRows([


        <?php

        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result))
            {
                                                                                
                echo "['".$row['projectid']."','".$row['projectname']."','".new Date($row['startdate'])."','".new Date($row['enddate'])."','".$row['projectcompletionaverage']."'],"; 
            }
        }

        ?>
     //   ['2014Spring', 'Spring 2014',new Date(2014, 2, 22), new Date(2014, 5, 20), 100],
        
      ]);

      var options = {
        height: 400,
        gantt: {
          trackHeight: 30
        }
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>
</head>
<body>
  <div id="chart_div"></div>
  asdasda
  fuck
  <span>
    whatsadasjdaposdj
  </span>
</body>
</html>