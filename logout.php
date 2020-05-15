<?php
session_start();

if(isset($_SESSION['user']))
{
    session_destroy();
    header('Location:multiplelogin.php');
}
else
{
    header('Location:multiplelogin.php');
}


?>