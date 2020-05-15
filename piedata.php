<?php

header('Content-Type:application/json');
$con = mysqli_connect("localhost","root","","projectepa");

$query="SELECT `Taskid`, `Taskname`,`Taskperc` FROM `task` ORDER BY `Taskid`";
$run=mysqli_query($con,$query);


$data=array();
foreach ($run as $row){
    $data[] = $row;
}

$run->close();
$con->close();

echo json_encode($data);
?>
