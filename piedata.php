<?php

header('Content-Type:application/json');
include_once 'includes/dbConnect.php';

$query="SELECT `Taskid`, `Taskname`,`Taskperc` FROM `task` ORDER BY `Taskid`";
$run=mysqli_query($conn,$query);


$data=array();
foreach ($run as $row){
    $data[] = $row;
}

$run->close();
$conn->close();

echo json_encode($data);
?>
