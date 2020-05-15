
<?php

$con = mysqli_connect("localhost","root","","projectepa");

$query="SELECT * FROM `project`";
$run=mysqli_query($con,$query);

$query1="SELECT * FROM `task`";
$run1=mysqli_query($con,$query1);

$query2="SELECT * FROM `subtask`";
$run2=mysqli_query($con,$query2);





if(isset($_POST['replace'])){
    $Proid=$_POST['pid'];
    $Taskid=$_POST['tid'];
    $Subid=$_POST['subid'];
    $Newemp=$_POST['empid2'];


    $replacequery="UPDATE `subtask` SET `empid`='$Newemp' WHERE `projectid`='$Proid' AND 
    `taskid`='$Taskid' AND `subtaskid`='$Subid'";
    $resultup=mysqli_query($con,$replacequery);

}

if(isset($_POST['delete'])){
    $Proid=$_POST['ppid'];
    $deletequerypro=" DELETE FROM `project` WHERE `projectid`='$Proid'";
    $deletequerytask=" DELETE FROM `task` WHERE `projectid`='$Proid'";
    $deletequerysub=" DELETE FROM `subtask` WHERE `projectid`='$Proid'";
    $resultup1=mysqli_query($con,$deletequerypro);
    $resultup2=mysqli_query($con,$deletequerytask);
    $resultup3=mysqli_query($con,$deletequerysub);

}


/*
if(isset($_GET['insert'])){
    $Proid1=$_GET['dpid'];
    $Taskid1=$_GET['dtid'];
   
    $Tdeadline1=$_GET['deadline1'];
    $Tdeadlinecomp1=$_GET['deadlinecomp1'];
    $Tdeadline2=$_GET['deadline2'];
    $Tdeadlinecomp2=$_GET['deadlinecomp2'];

    $insertquery="INSERT INTO `task`(`deadline1`,`deadlinecomp1`,`deadline2`,`deadlinecomp2`) 
    VALUES ('$Tdeadline1','$Tdeadlinecomp1','$Tdeadline2','$Tdeadlinecomp2') WHERE `projectid`='$Proid1' AND 
    `taskid`='$Taskid1'";
    $resultup1=mysqli_query($con,$insertquery);

}
*/

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
                    <li >
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
                    <li class="active">
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

                     <!--Project Table Starts-->
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Replace Employee For Project</h4>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form method="POST" action="projectlist.php">

                                                <div class="row">

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Project Id</label>
                                                            <input type="text" class="form-control" name='pid'>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Task Id</label>
                                                            <input type="text" class="form-control" name='tid'>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Subtask Id</label>
                                                            <input type="text" class="form-control" name='subid'>
                                                        </div>
                                                    </div>

                                              

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>New Emp Id</label>
                                                            <input type="text" class="form-control" name='empid2'>
                                                        </div>
                                                    </div>
                                                </div>  

                                                <input class="btn btn-danger" name="replace" type="submit" value="Update">
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--Drop Project Starts-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Delete  Project</h4>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form method="POST" action="projectlist.php">

                                                <div class="row">

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Project Id</label>
                                                            <input type="text" class="form-control" name='ppid'>
                                                        </div>
                                                    </div>
                                                <div>

                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <br>
                                                        <input class="btn btn-danger" name="delete" type="submit" value="Delete">
                                                    </div>
                                                </div>  

                                                
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<!--
                    Deadline Insert Table Starts
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Insert Deadline for Project</h4>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form method="GET" action="projectlist.php">

                                                <div class="row">

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Project Id</label>
                                                            <input type="text" class="form-control" name='dpid'>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Task Id</label>
                                                            <input type="text" class="form-control" name='dtid'>
                                                        </div>
                                                    </div>

                                                  

                                                </div>  

                                                <div class="row">

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Expected Deadline  1</label>
                                                            <input type="text" class="form-control" name='deadline1'>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>Expected DeadlineCompletion  1</label>
                                                            <input type="text" class="form-control" name='deadlinecomp1'>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Expected Deadline  2</label>
                                                            <input type="text" class="form-control" name='deadline2'>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>Expected DeadlineCompletion  2</label>
                                                            <input type="text" class="form-control" name='deadlinecomp2'>
                                                        </div>
                                                    </div>

                                                </div> 

                                                <input class="btn btn-danger" name="insert" type="submit" value="Insert">
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    Deadline Insert Table Ends-->


                    <!--Project Table Starts-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Project list</h4>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Project ID</th>
                                                        <th scope="col">Project Name</th>
                                                        <th scope="col">Project Desc</th>
                                                        <th scope="col">Project Leader</th>
                                                        <th scope="col">Project Completion</th>
                                                        <th scope="col">Project Start Date</th>
                                                        <th scope="col">Project End Date</th>
                                                        
                                                    </tr>


                                                    <?php

                                                        while($row1=mysqli_fetch_array($run))
                                                        {
                                                            echo ' <tr>
                                                            <td>'.$row1['projectid'].'</td>
                                                            <td>'.$row1['projectname'].'</td>
                                                            <td>'.$row1['projectdesc'].'</td>
                                                            <td>'.$row1['projectleader'].'</td>
                                                            <td>'.$row1['projectcompletionaverage'].'</td>
                                                            <td>'.$row1['startdate'].'</td>
                                                            <td>'.$row1['enddate'].'</td>
                                                        
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



                    <!--Task Table Starts-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Task list</h4>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Project ID</th>
                                                        <th scope="col">Task ID</th>
                                                        <th scope="col">Task Name</th>
                                            
                                                        <th scope="col">Task Completion</th>
                                                        <th scope="col">Task Start Date</th>
                                                        <th scope="col">Task End Date</th>
                                                        
                                                    </tr>


                                                    <?php

                                                        while($row2=mysqli_fetch_array($run1))
                                                        {
                                                            echo ' <tr>
                                                            <td>'.$row2['projectid'].'</td>
                                                            <td>'.$row2['taskid'].'</td>
                                                            <td>'.$row2['taskname'].'</td>
                                                         
                                                            <td>'.$row2['taskcompletionaverage'].'</td>
                                                            <td>'.$row2['startdate'].'</td>
                                                            <td>'.$row2['enddate'].'</td>
                                                            
                                                        
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



                    <!--Sub Task Table Starts-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title"> Sub Task list</h4>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Project ID</th>
                                                        <th scope="col">Task ID</th>
                                                        <th scope="col">Sub task ID</th>
                                                        <th scope="col">Sub-Task Name</th>
                                                        <th scope="col">Employee ID</th>
                                                        <th scope="col">Subtask Completion</th>
                                        
                                                        
                                                    </tr>


                                                    <?php

                                                        while($row3=mysqli_fetch_array($run2))
                                                        {
                                                            echo ' <tr>
                                                            <td>'.$row3['projectid'].'</td>
                                                            <td>'.$row3['taskid'].'</td>
                                                            <td>'.$row3['subtaskid'].'</td>
                                                            <td>'.$row3['subtaskname'].'</td>
                                                            <td>'.$row3['empid'].'</td>
                                                            <td>'.$row3['subtaskcompletionaverage'].'</td>
                                                            
                                                        
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