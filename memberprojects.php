<?php
session_start();
include_once 'includes/dbConnect.php';
$user=$_SESSION["user"];
$selectuser="SELECT * from employee where `Username`='$user'";
$userresult=mysqli_query($conn,$selectuser);
$row1=mysqli_fetch_array($userresult);
$id=$row1['empid'];

$query="SELECT * FROM `subtask` WHERE `empid`='$id'";
$run=mysqli_query($conn,$query);


if(isset($_POST['update'])){
    $Proid=$_POST['upid'];
    $Taskid=$_POST['utid'];
    $Subid=$_POST['usid'];
    $Avgcomp=$_POST['usubavg'];

    #Update Subtask
    $updatequery="UPDATE `subtask` SET `subtaskcompletionaverage`='$Avgcomp' WHERE `projectid`='$Proid' AND 
    `taskid`='$Taskid' AND `subtaskid`='$Subid'";
    $resultup=mysqli_query($conn,$updatequery);

    #Update Task
    $queryperc1="SELECT SUM(subtaskcompletionaverage) AS totalsum
    FROM `subtask` WHERE  projectid='$Proid' and taskid='$Taskid'";
    $resultperc=mysqli_query($conn,$queryperc1);
    $rowperc1=mysqli_fetch_array($resultperc);
    $taskperc1=$rowperc1['totalsum'];

    $updatetask="UPDATE `task` SET `taskcompletionaverage`='$taskperc1'WHERE  projectid='$Proid' and taskid='$Taskid' ";
    $updatetaskresult=mysqli_query($conn,$updatetask);


    #Update Project
    $queryperc2="SELECT SUM(taskcompletionaverage) AS totalsum
    FROM `task` WHERE  projectid='$Proid'";
    $resultperc2=mysqli_query($conn,$queryperc2);
    $rowperc2=mysqli_fetch_array($resultperc2);
    $projectperc2=$rowperc2['totalsum'];


    $updateproject="UPDATE `project` SET `projectcompletionaverage`='$projectperc2'WHERE  projectid='$Proid'";
    $updateprojectresult=mysqli_query($conn,$updateproject);
}

?>




<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Enterprise Project Analysis by ZAS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" /> -->

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project    
    <link href="assets/css/main.css" rel="stylesheet" />  -->


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

     <!--Net Libraries    -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker-standalone.css">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body>

    <!--Sidebar Dashboard start-->

    <div class="wrapper">
            <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">


                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                            Enterprise Project Analysis
                        </a>
                    </div>

                    <ul class="nav">
                        <li>
                            <a href="memberdashboard.php">
                                <i class="pe-7s-graph"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="memberprojects.php">
                                <i class="pe-7s-note2"></i>
                                <p>Projects</p>
                            </a>
                        </li>
            
                    </ul>
                </div>
            </div>

            <!--Sidebar Dashboard end-->
            <div class="main-panel">

                <!--Header navbar starts-->

                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="memberdashboard.php">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            

                            <ul class="nav navbar-nav navbar-right">
                                
                                <li>
                                    <a href="logout.php">
                                        <p>Log out</p>
                                    </a>
                                </li>
                                <li class="separator hidden-lg"></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                     
                <!--Header navbar ends-->

                <!--Body content starts-->

                    <div class="content">
                        <div class="container-fluid">
                            
                            <div class="row">
                            
                                <div class="col-md-12">
                                
                                    <div class="card">
                                    
                                        <div class="header">
                                            <h4 class="title">Projects</h4>
                                        </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="header">
                                                        <h4 class="title">Ongoing</h4>
                                                    </div>
                                                        <div class="content">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <table class="table">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th scope="col">Project ID</th>
                                                                                <th scope="col">Task ID </th>
                                                                                <th scope="col">Sub Task ID</th>
                                                                                <th scope="col">Sub Task Name</th>
                                                                                <th scope="col">Emp Id</th>
                                                                                <th scope="col">Completion</th>     
                                                                            </tr>


                                                                            <?php

                                                                                while($row=mysqli_fetch_array($run))
                                                                                {
                                                                                    echo ' <tr>
                                                                                    <td>'.$row['projectid'].'</td>
                                                                                    <td>'.$row['taskid'].'</td>
                                                                                    <td>'.$row['subtaskid'].'</td>
                                                                                    <td>'.$row['subtaskname'].'</td>
                                                                                    <td>'.$row['empid'].'</td>
                                                                                    <td>'.$row['subtaskcompletionaverage'].'</td>
                                                                                    </tr>';
                                                                                }
                                                                                    
                                                                            ?>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="header">
                                                        <h4 class="title">Update Project Completion</h4>
                                                    </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="content">
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <form action="memberprojects.php" method="POST">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <div class="form-group">
                                                                                            <label>Project Id</label>
                                                                                            <input type="text" class="form-control" name="upid">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="form-group">
                                                                                            <label>Task Id</label>
                                                                                            <input type="text" class="form-control" name="utid">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="form-group">
                                                                                            <label>Subtask Id</label>
                                                                                            <input type="text" class="form-control" name="usid">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="form-group">
                                                                                            <label>Completion</label>
                                                                                            <input type="text" class="form-control" name="usubavg">
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                <input class="btn btn-danger" type="submit" value="Update" name="update">
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                                                                               
                <!--Body content ends-->
            </div>
        </div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/main.js"></script>


</html>
