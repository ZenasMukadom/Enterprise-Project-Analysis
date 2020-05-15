<?php
session_start();
$con = mysqli_connect("localhost","root","","projectepa");

#Session for particular User
$user=$_SESSION["user"];
$selectuser="SELECT * from employee where `Username`='$user'";
$userresult=mysqli_query($con,$selectuser);
$row1=mysqli_fetch_array($userresult);
$id=$row1['empid'];

#subtaskcompletionaverage Value 
$query="SELECT subtaskcompletionaverage FROM `subtask` WHERE `empid`='$id'";
$run=mysqli_query($con,$query);
$row=mysqli_fetch_array($run);
$subtask=$row['subtaskcompletionaverage'];
//echo "$subtask";

#Subtask name
$query2="SELECT subtaskname FROM `subtask` WHERE `empid`='$id'";
$run2=mysqli_query($con,$query2);
$row1=mysqli_fetch_array($run2);
$subtaskname=$row1['subtaskname'];
//echo "$subtaskname";

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


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/main.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


    <!--Jquery Progress bar for subtask -->
    <link rel="stylesheet" href="jquery.lineProgressbar.css" />

    


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
                <li class="active">
                    <a href="memberdashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
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
            
            <!-- First Card Starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><b>Your Projects<b></h4>
                            </div>

                            <div class="container-fluid">

                                <!-- Subtask progress bar Start-->
                                <script>

                                    $('#progressbar1').LineProgressbar({
                                    
                                    }); 
                                </script>

                                <label><h3> <?=$subtaskname?> Completion progress</h3> </label>
                                    <div id="progressbar1" >
                                    <div 
                                        line-progressbar 
                                        data-percentage="<?=$subtask?>" 
                                        data-progress-color="#9b59b6" 
                                        data-height="25px"></div>
                                    </div>
                                <!-- Subtask progress bar Start-->

                            </div>
                        </div>


                    </div>
                                            


                </div>
            </div>

            <!-- First Card Ends-->





        </div>
         <!--Body content ends-->
    </div>
</div>


</body>

    <!--Jquery Lib for Progress bar subtask-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="js/jquery.lineProgressbar.js"></script>                        

    <!--   Core JS Files   
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script> -->
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
