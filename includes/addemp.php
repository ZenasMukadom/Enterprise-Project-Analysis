<?php
include_once 'dbConnect.php';

$Empid=$_POST['empid'];
$Firstname=$_POST['empfirst'];
$Lastname=$_POST['emplast'];
$Username=$_POST['user'];
$Pass=$_POST['pass'];
$Usertype=$_POST['usertype'];

$Designation=$_POST['empdes'];
$Department=$_POST['empdept'];
$Email=$_POST['empemail'];
$Salary=$_POST['empsal'];
$Contact=$_POST['empcont'];
$day=$_POST['empdobday'];
$month=$_POST['empdobmonth'];
$year=$_POST['empdobyear'];
$rawdate=$year . '-' . $month . '-' . $day;
$date = mysqli_real_escape_string($conn,$rawdate);

$query="INSERT INTO `employee`(`empid`,`Firstname`, `Lastname`, `Username`,`Pass`,`usertype`, `Designation`, `Department`, 
`Email`, `Salary`, `Contact`, `Date`) 
VALUES ('$Empid','$Firstname','$Lastname','$Username','$Pass','$Usertype','$Designation','$Department','$Email','$Salary','$Contact','$date')";

$run=mysqli_query($conn,$query);

header("Location:../employee.php");
?>