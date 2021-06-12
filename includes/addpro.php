<?php
include_once 'dbConnect.php';

$Proid=$_POST['pid'];
$Proname=$_POST['proname'];
$Proleader=$_POST['proleader'];
$Prodesc=$_POST['prodesc'];
$Prostartdate=$_POST['prostart'];
$Proenddate=$_POST['proend'];
$Proavg=$_POST['proavg'];


/*
$Proday=$_POST['prodobday'];
$Promonth=$_POST['prodobmonth'];
$Proyear=$_POST['prodobyear'];
$prodate=$Proyear . '-' . $Promonth . '-' . $Proday;
$datepro = mysqli_real_escape_string($conn,$prodate);
*/

$TProid=$_POST['tpid'];
$Taskid=$_POST['tid'];
$Taskname=$_POST['taskname'];
$Taskavg=$_POST['taskavg'];
$Taskstartdate=$_POST['taskstart'];
$Taskenddate=$_POST['taskend'];

/*
    $Tdeadline1=$_POST['deadline1'];
    $Tdeadlinecomp1=$_POST['deadlinecomp1'];
    $Tdeadline2=$_POST['deadline2'];
    $Tdeadlinecomp2=$_POST['deadlinecomp2'];

    $Taskday=$_POST['taskdobday'];
    $Taskmonth=$_POST['taskdobmonth'];
    $Taskyear=$_POST['taskdobyear'];
    $Taskdate=$Taskyear . '-' . $Taskmonth . '-' . $Taskday;
    $datetask = mysqli_real_escape_string($conn,$Taskdate);
*/

$STProid=$_POST['spid'];
$STaskid=$_POST['stid'];
$Subid=$_POST['sid'];
$Subname=$_POST['subtaskname'];
$Subavg=$_POST['subavg'];
$Subemp=$_POST['sempid'];


$querypro="INSERT INTO `project`(`projectname`, `projectid`, `projectdesc`, `projectleader`, `projectcompletionaverage`, `startdate`, `enddate`) 
VALUES ('$Proname','$Proid','$Prodesc','$Proleader','$Proavg','$Prostartdate','$Proenddate')";

$querytask="INSERT INTO `task`(`projectid`, `taskname`, `taskid`, `taskcompletionaverage`, `startdate`, `enddate`) 
VALUES ('$TProid','$Taskname','$Taskid','$Taskavg','$Taskstartdate','$Taskenddate')";

$querysub="INSERT INTO `subtask`(`projectid`, `taskid`, `subtaskid`, `subtaskname`, `empid`, `subtaskcompletionaverage`) 
VALUES ('$STProid','$STaskid','$Subid','$Subname','$Subemp','$Subavg')";

$run1=mysqli_query($conn,$querypro);
$run2=mysqli_query($conn,$querytask);
$run3=mysqli_query($conn,$querysub);

header("Location:../projects.html");
?>