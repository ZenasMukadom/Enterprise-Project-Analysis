<!doctype html>

<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="projectepa";
$conn = mysqli_connect($servername, $username, $password, $dbname);

//echo("connection");
if(isset($_POST ['Login'])) {
	$user=$_POST['user'];
  $pass = $_POST['pass'];
  $usertype=$_POST['usertype'];
	$query = "SELECT * FROM `employee` WHERE Username='".$user."' and Pass ='".$pass."' and usertype='".$usertype."'";
  $result = mysqli_query($conn, $query);

$rowcount=mysqli_num_rows($result);
if($rowcount==true)
{

  //Admin Username & Password - admin123
    echo "Your username and password is right";
    if($usertype=="admin")
    {
      $_SESSION['user']=$user;
        ?>
        <script type="text/javascript">
        window.location.href="dashboard.php"</script>
        <?php
         
    }
    else if($usertype=="user"){
      $_SESSION['user']=$user;
    ?>
    <script type="text/javascript">
    window.location.href="memberdashboard.php"</script>
    <?php  
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("Uncorrect Username or Password")';
      echo '</script>';

    }  
}

    else if($rowcount==false){
      echo '<script language="javascript">';
      echo 'alert("Uncorrect Username or Password ")';
      echo '</script>';
        }
        else
        {

        }
}
  ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  


  <body>
 <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">
       
        <div class="col-12 user-img">
          <img src="ulogin.png">
        </div>

         <form class="col-12" method="POST">
          <div class="form-group">
          <input type="text" class="form-control" name="user" placeholder="Enter Username">
        </div>
         <div class="form-group">
        

          <input type="password" class="form-control" name="pass" placeholder="Enter Password">
        </div>


        <select name="usertype">
             <option value="admin" selected="selected">admin</option>
             <option value="user">user</option>
        </select>

        <div>
          <br>
          <button type="submit" name="Login" value="Login" class="btn"><i class="fas fa-sign-in-alt"></i>Login</button>  
        </div>  
        </form>

 
</div>
</div>
</div>     
</body>
</html>