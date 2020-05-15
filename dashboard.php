
<?php
session_start();
echo $_SESSION['user'];
$con = mysqli_connect("localhost","root","","projectepa");
$projectname = "";
$projectperc = "";
$projectleader = "";
$prostartdate1 = "";
$proenddate1 = "";
$taskname = "";  
$taskstartdate1 = "";
$taskenddate1 = ""; 
$taskperc1 = "";
$projectperc2 = "";
$deadline1= "";
$deadlinecomp1= "";
$deadline2= "";
$deadlinecomp2= "";
$subtaskempid = "";
$years = "";
$months = "";                                                   
$days = "";
$pid= "";
$tid="";
$finaltaskcount="";
$finalprojectcount="";

#Project Progress Bar 
if(isset($_POST['Generate'])) {

    #Project Database
    $pid=$_POST['pid'];
    $query1="SELECT * FROM `project` WHERE projectid='$pid'";
    $result=mysqli_query($con,$query1);
    $row=mysqli_fetch_array($result);
    $projectid=$row['projectid'];
    $projectname=$row['projectname'];
    $projectperc=$row['projectcompletionaverage'];
    $projectleader=$row['projectleader'];

    #Project Percentage completion 
    $queryperc2="SELECT SUM(taskcompletionaverage) AS totalsum
    FROM `task` WHERE  projectid='$pid'";
    $resultperc2=mysqli_query($con,$queryperc2);
    $rowperc2=mysqli_fetch_array($resultperc2);
    $projectperc2=$rowperc2['totalsum'];


    #ProDateject
    $prostartdate1=$row['startdate'];
    $proenddate1=$row['enddate'];




    #Task Database 
    $pid=$_POST['pid'];
    $tid=$_POST['tid'];
    $query2="SELECT * FROM `task` WHERE  projectid='$pid' and taskid='$tid'";
    $result1=mysqli_query($con,$query2);
    $row1=mysqli_fetch_array($result1);
    $taskname=$row1['taskname'];

    //$deadline1=$row1['deadline1'];
    //$deadlinecomp1=$row1['deadlinecomp1'];
    //$deadline2=$row1['deadline2'];
    //$deadlinecomp2=$row1['deadlinecomp2'];
   // echo "$deadlinecomp2";
    


    #Task Percentage completion 
    $queryperc1="SELECT SUM(subtaskcompletionaverage) AS totalsum
    FROM `subtask` WHERE  projectid='$pid' and taskid='$tid'";
    $resultperc=mysqli_query($con,$queryperc1);
    $rowperc1=mysqli_fetch_array($resultperc);
    $taskperc1=$rowperc1['totalsum'];

    

    


    #Taskdate
    $taskstartdate1=$row1['startdate'];
    $taskenddate1=$row1['enddate'];



    #Subtask Database 
    $pid=$_POST['pid'];
    $tid=$_POST['tid'];
    $subtid=$_POST['sid'];
    $query3="SELECT * FROM `subtask` WHERE subtaskid='$subtid' and projectid='$pid' and taskid='$tid'";
   # $query3="SELECT * FROM `subtask` as su JOIN `employee` as em ON em.empid=su.empid 
   # where subtaskid='$subtid'";
    $result2=mysqli_query($con,$query3);
    $row2=mysqli_fetch_array($result2);
    $subtaskname=$row2['subtaskname'];
    $subtaskperc=$row2['subtaskcompletionaverage'];
    $subtaskempid=$row2['empid'];
   # $subtaskempfirstname=$row2['Firstname'];
   # $subtaskemplastname=$row2['Lastname'];


    #Count Query For Task from subtask count
   $querycountsubtask="SELECT count(*) AS Count1 FROM subtask  WHERE projectid='$pid' and taskid='$tid'";
   $resultcount=mysqli_query($con,$querycountsubtask);
   $subtaskrows = mysqli_fetch_assoc($resultcount);
   
   $taskcount=$subtaskrows['Count1'];
   
   $taskcountresult=$taskperc1/$taskcount;
   
   $finaltaskcount=$taskcountresult;
   
    

   #Count Query For Project from task count
   $querycounttask="SELECT count(*) AS Count2 FROM subtask  WHERE projectid='$pid'";
   $resultcount1=mysqli_query($con,$querycounttask);
   $taskrows = mysqli_fetch_assoc($resultcount1);
   
   $projectcount=$taskrows['Count2'];
  
   $projectcountresult=$projectperc2/$projectcount;
 
   
   $finalprojectcount=$projectcountresult;



    #Launch Date For Project 
$date1 = "$prostartdate1";
$date2 = "$proenddate1";

$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$date1=date_create("$prostartdate1");
$date2=date_create("$proenddate1");
$diff=date_diff($date1,$date2);  


#Launch Date For Task
$tdate1 = "$taskstartdate1";
$tdate2 = "$taskenddate1";

$tdiff = abs(strtotime($tdate2) - strtotime($tdate1));

$tyears = floor($tdiff / (365*60*60*24));
$tmonths = floor(($tdiff - $tyears * 365*60*60*24) / (30*60*60*24));
$tdays = floor(($tdiff - $tyears * 365*60*60*24 - $tmonths*30*60*60*24)/ (60*60*24));

$tdate1=date_create("$taskstartdate1");
$tdate2=date_create("$taskenddate1");
$tdiff=date_diff($tdate1,$tdate2);  




$taskdifference=$tdiff->format("%a");
 $taskdifference;






  #  echo $diff->format("%R%a days");


}


/*
#Project Deadline Date
if(isset($_POST['Submit']))
{
    $projectid=$_POST['pid1'];
    $query4="SELECT * FROM project WHERE projectid='$projectid'";
    $result3=mysqli_query($con,$query4);
    $row3=mysqli_fetch_array($result3);
    $projectname=$row3['projectname'];
    $prostartdate1=$row3['startdate'];
    $proenddate1=$row3['enddate'];

    $taskid=$_POST['tid1'];
    $query5="SELECT * FROM task WHERE taskid='$taskid' and projectid='$projectid'";
    $result4=mysqli_query($con,$query5);
    $row4=mysqli_fetch_array($result4);
    $taskname=$row4['taskname'];
    $taskstartdate1=$row4['startdate'];
    $taskenddate1=$row4['enddate'];

} 

*/



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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />  -->

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!--link href="assets/css/main.css" rel="stylesheet" /-->


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
        






    <!--Notify-->
    <link href="misc/pnotify.css" rel="stylesheet">
    <link href="misc/pnotify.brighttheme.css" rel="stylesheet">
    <script src="misc/pnotify.js"></script>
    

    <!--Project Progress bar-->
    <link rel="stylesheet" href="misc/progresscircle.css">
    <script src="misc/progresscircle.js" type="text/javascript"></script>


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
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
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
            
                <div class="row">


                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><b>Project</b></h4>
                            </div>
                            <br>
                            <center>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" action="dashboard.php">
                                            <div class="row">
                                            
                                                <div id="circlechart1" class="circlechart1" data-percentage=<?=intval($finalprojectcount);?>><?=$projectname;?></div>
                                                <br>
                                            </div>
                                            <script>
                                                $('.circlechart1').circlechart(); // Initialization
                                            </script>

                                            <div class="row">
                                                    <p>Project name is <?php echo $projectname; ?>.</p>  
                                                    <p>Project Leader name is <?php echo $projectleader; ?>.</p>                                                    
                                                    <p>Project Start date is <?php echo $prostartdate1; ?>.</p>
                                                    <p>Project End Date is <?php echo $proenddate1; ?>.</p>
                                                    <br>
                                                </div>
                                       
                                            <div class="row">
                                                    <div class="col-sm-12">
                                                    
                                                            <div class="form-group">
                                                             
                                                                <input type="text" class="form-control" name="pid"
                                                                    placeholder="Project ID">
                                                                   
                                                            </div> 
                                                            
                                                            
                                                    </div>
                                                                  
                                                <!-- JQuery function starts-->
                                                    
                                            </div>  
                                          
                                        
                                    </div>
                                </div>
                            <div>
                            </center>
                        </div>
                    </div>





                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><b>Task</b></h4>
                            </div>
                            <br>
                            <center>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                       
                                            <div class="row">
                                           
                                                <div class="circlechart2" data-percentage=<?=intval($finaltaskcount);?>><?=$taskname;?></div>
                                                <br>
                                            </div>
                                            <script>
                                                $('.circlechart2').circlechart(); 
                                            </script>
                                            <div class="row">
                                                    <p>Task name is <?php echo $taskname; ?>.</p>  
                                                    <p>Task Start date is <?php echo $taskstartdate1; ?>.</p>
                                                    <p>Task End Date is <?php echo $taskenddate1; ?>.</p>
                                                    
                                                    <br>
                                                </div>
                                       
                                            <div class="row">
                                                    <div class="col-sm-12">
                                                    
                                                            <div class="form-group">
                                                             
                                                                <input type="text" class="form-control" name="tid"
                                                                    placeholder="Task ID">
                                                                   
                                                            </div> 
                                                            
                                                     
                                                    </div>
                                                                  
                                                    <!-- JQuery function starts-->
                                                    <!--
                                                    <script>
                                                  
                                                        var deadline1= <?php echo $deadline1;?>;                    
                                                        var deadlinecomp1=50;
                                                        var deadline2= <?php echo $deadline2;?>;               
                                                        var deadlinecomp2=95;        
                                                        var a= <?php echo $taskdifference;?>;
                                                        var c= <?php echo $subtaskperc;?>;
                                                        
                                       

                                                            if(a<deadline2)            
                                                            {
                                   

                                                                    $(function(){
                                                                        new PNotify({
                                                                        title: 'Deadline 2',
                                                                        text: 'Employee id :<?=$subtaskempid?> has been laging by <?=$subtaskperc?>%',
                                                                        type: 'error'
                                                                        });
                                                                
                                                                    });
                                                                }
                                                            else if(a<deadline1)
                                                                {
                                                                    $(function(){
                                                                        new PNotify({
                                                                        title: 'Deadline 1',
                                                                        text: 'Employee id :<?=$subtaskempid?> has been laging by <?=$subtaskperc?>%',
                                                                        type: 'error'
                                                                        });
                                                                
                                                                    });                     
                                                                    

                                                                }
                                                                
                                                                else{

                                                                    $(function(){
                                                                        new PNotify({
                                                                        title: 'On-Time 2',
                                                                        text: 'Employee id :<?=$subtaskempid?> has been on time.',
                                                                        type: 'info'
                                                                        });
                                                                
                                                                    });

                                                                }
                                                            
                                                            
                                                           
                                                            
                                                    
                                                    </script>
                                                    -->
                                                <!-- JQuery function ends-->
                                            </div>  
                                          
                                        
                                    </div>
                                </div>
                            <div>
                            </center>
                            <br>
                        </div>
                    </div>




                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><b>Sub Task</b></h4>
                            </div>
                            <br>
                            <center>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                       
                                            <div class="row">
                                                <div class="circlechart3" data-percentage=<?=$subtaskperc?>><?=$subtaskname?></div>
                                                <br>
                                            </div>
                                            <div class="row">
                                                    <p>Member Assigned is EMPID :<?php echo  $subtaskempid ?>.</p> 
                                                 <!--   <p>Member Assigned is :<?php #echo $subtaskempfirstname.' '. $subtaskemplastname ?>.</p>  -->
                                                    
                                                    <br>
                                                </div>
                                       
                                            <div class="row">
                                                    <div class="col-sm-12">
                                                    
                                                            <div class="form-group">
                                                             
                                                                <input type="text" class="form-control" name="sid"
                                                                    placeholder="Subtask ID">
                                                                   
                                                            </div> 
                                                            
                                                           
                                                    </div>
                                                                  
                                                <!-- JQuery function starts-->
                                                    <script>
                                                        $('.circlechart3').circlechart(); // Initialization
                                                    </script>
                                                <!-- JQuery function ends-->
                                            </div>  
                                          
                                    </div>
                                </div>
                            <div>
                            </center>
                            <br>
                        </div>
                        
                    </div>


                    <div class="col-md-3">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title"><b>Launch Date For the Project</b></h4>
                                </div>
                                <br>
                                <center>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                        
                                                <div class="row">
                                                    <p>Years to go :<?php echo $years ?>.</p>  
                                                    <p>Months to go :<?php echo $months ?>.</p>
                                                    <p>Days to go :<?php echo $days ?>.</p>
                                                    <br>
                                                </div>
                                        
                                                <div class="row">
                                                        <div class="col-sm-12">
                                                        
                     
                                                        </div>
                                                </div>  
                                            
                                        </div>
                                    </div>
                                <div>
                                </center>
                            </div>
                        </div>





                </div>
                <!-- 1st row ends-->

                <!-- 2st row starts-->
                <div class="row">   
                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><b></b></h4>
                            </div>
                            <br>
                            <center>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="row">
                                                    <div class="col-sm-12">   
                                                            <center>
                                                            <input class="btn btn-danger btn-circle btn-xl" type="submit" value="Generate" name="Generate">
                                                            </center>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                                  
                                               
                                            </div>  
                                          
                                        </form>
                                    </div>
                                </div>
                            <div>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- 2st row ends-->

               


            </div>




        </div>



         <!--Body content ends-->
    </div>
</div>


</body>

    <!--   Core JS Files   
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script> 
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script> -->

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script> 

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, -->
    <!--script src="assets/js/main.js"></script--> 
    
    <!-- Jquery for project progress bar -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="misc/progresscircle.js" type="text/javascript"></script>


</html>
