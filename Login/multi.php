<!doctype html>
<?php
include_once '../includes/dbConnect.php';

if(isset($_REQUEST['Login'])){
$user=$_REQUEST['user'];
$pass = $_REQUEST['pass'];
$usertype=$_REQUEST['usertype'];
$query = "SELECT * FROM `multiuserlogin` WHERE Username='".$user."' and Pass = '".$pass."'";
$result = mysqli_query($conn, $query);

$rowcount=mysqli_num_rows($result);
if($rowcount==true)
{
    echo "Your username and password is right";
    if($usertype=="admin")
    {
        ?>
        <script type="text/javascript">
        window.location.href="admin.html"</script>
        <?php
         
    }
    else if($usertype=="user"){
    ?>
    <script type="text/javascript">
    window.location.href="user.html"</script>
    <?php
         
    }
    else{

    }
       
    
}

    else if($rowcount==false){
        echo "Your username and password is wrong";
        }
        else
        {

        }
    }
 
?>

<html>
<head>
<meta charset="utf-8">
<title>Multi user login system</title>
</head>
 
<body>
<form method="post">
<table>
<tr>
<td>Username:<input type="text" name="user" placeholder="enter your username"></td>
 
</tr>
<tr>
<td>Password:<input type="text" name="pass" placeholder="enter your password"></td>
</tr>
<tr>
<td>
Select user type: <select name="usertype">
<option value="admin">admin</option>
<option value="user">user</option>
</select>
</td>
</tr>
<tr>
<td><input type="submit" name="Login" value="Login"></td>
</tr>
</table>
</form>
</body>
</html>