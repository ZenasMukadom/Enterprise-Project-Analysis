<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "goddb";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $projectid = 1;

    $pquery = "SELECT projectname,startdate,enddate FROM project WHERE projectid = '$projectid' limit 1";
    $presult = mysqli_query($conn, $pquery);
    $prow = mysqli_fetch_row($presult);
    $pname = $prow[0];
    $psdate = $prow[1];
    $pedate = $prow[2];

    $taskid = 1;

    $tquery = "SELECT taskname,startdate,enddate FROM task WHERE projectid = '$projectid' and taskid='$taskid' limit 1";
    $tresult = mysqli_query($conn, $tquery);
    $trow = mysqli_fetch_row($tresult);
    $tname = $trow[0];
    $tsdate = $trow[1];
    $tedate = $trow[2];

    $subtaskid = 2;

    $squery = "SELECT subtaskname FROM subtask WHERE projectid = '$projectid' and taskid='$taskid' and subtaskid='$subtaskid' limit 1";
    $sresult = mysqli_query($conn, $squery);
    $srow = mysqli_fetch_row($sresult);
    $sname = $srow[0];

    echo "project name is : " .$pname;
    echo "\nproject start date is : ".$psdate;
    echo "\nproject end date is : ".$pedate;
    echo "\nTask name is : ".$tname;
    echo "\nTask start date is ".$tsdate;
    echo "\nTask end date is ".$tedate;
    echo "\nsubtask name is : ".$sname;
    mysqli_close($conn);
?>