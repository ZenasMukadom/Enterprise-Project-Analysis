<?php
require 'includes/dbConnect.php';

$query="SELECT * FROM `employee`";
$run=mysqli_query($conn,$query);

?>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Employee</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />   -->

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="cs/employee.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <!--New Bootstrap Net v4  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" > -->


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


    <!--PHP-->


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
                        <a href="dashboard.php">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="employee.php">
                            <i class="pe-7s-users"></i>
                            <p>Employee</p>
                        </a>
                    </li>
                    <li>
                        <a href="projects.html">
                            <i class="pe-7s-note2"></i>
                            <p>Projects</p>
                        </a>
                    </li>
                    <li>
                        <a href="projectlist.php">
                            <i class="pe-7s-news-paper"></i>
                            <p>Project Manage</p>
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
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="dashboard.php">Dashboard</a>
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

                    <!--Form Starts-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Create Employees</h4>
                                </div>
                                <div class="content">

                                    <form method="POST" action="includes/addemp.php">

                                        <div class="row">

                                        <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Emp Id</label>
                                                    <input type="text" class="form-control" name='empid'>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name='empfirst'>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="emplast">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">

                                        <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input type="text" class="form-control" name="user"
                                                        placeholder="Login name">
                                                </div> 
                                        </div>
                                        <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>User Password</label>
                                                    <input type="text" class="form-control" name="pass"
                                                        placeholder="Password">
                                                </div> 
                                        </div>
                                        <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>User Type</label>
                                                    <input type="text" class="form-control" name="usertype"
                                                        placeholder="Type of user">
                                                </div> 
                                        </div>


                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input type="text" class="form-control" name="empdes">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <input type="text" class="form-control" name="empdept">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Email Id</label>
                                                    <input type="text" class="form-control" name="empemail">
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Salary</label>
                                                    <input type="text" class="form-control" name="empsal">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Contact No.</label>
                                                    <input type="text" class="form-control" name="empcont">
                                                </div>
                                            </div>
                                        </div>

                                        <label>Date of Birth</label>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>Day</label>
                                                    <input type="text" class="form-control" name="empdobday">
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group" title="Date of birth">
                                                    <label>Month</label>
                                                    <input type="text" class="form-control" name="empdobmonth">
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group" title="Date of birth">
                                                    <label>Year</label>
                                                    <input type="text" class="form-control" name="empdobyear">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <input class="btn btn-danger" type="submit" value="Submit">

                                    </form>

                                   
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--Form Ends-->

                    <!--Project Table Starts-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">View Employees</h4>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Emp ID</th>
                                                        <th scope="col">First Name</th>
                                                        <th scope="col">Last Name</th>
                                                        <th scope="col">User Name</th>
                                                        <th scope="col">User Password</th>
                                                        <th scope="col">User Type</th>
                                                        <th scope="col">Designation</th>
                                                        <th scope="col">Department</th>
                                                        <th scope="col">Email Id</th>
                                                        <th scope="col">Salary</th>
                                                        <th scope="col">Contact No.</th>
                                                        <th scope="col">Date of Birth</th>
                                                    </tr>


                                                    <?php

                                                        while($row=mysqli_fetch_array($run))
                                                        {
                                                            echo ' <tr>
                                                            <td>'.$row['empid'].'</td>
                                                            <td>'.$row['Firstname'].'</td>
                                                            <td>'.$row['Lastname'].'</td>
                                                            <td>'.$row['Username'].'</td>
                                                            <td>'.$row['Pass'].'</td>
                                                            <td>'.$row['usertype'].'</td>
                                                            <td>'.$row['Designation'].'</td>
                                                            <td>'.$row['Department'].'</td>
                                                            <td>'.$row['Email'].'</td>
                                                            <td>'.$row['Salary'].'</td>
                                                            <td>'.$row['Contact'].'</td>
                                                            <td>'.$row['Date'].'</td>
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
            </div>
        </div>
        <!--Body content ends-->
    </div>
    </div>


</body>

<!--   Core JS Files 
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>  
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>  -->

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="js/employee.js"></script>



</html>