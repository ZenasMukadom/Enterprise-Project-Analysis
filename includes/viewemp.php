<?php
include_once 'dbConnect.php';

$query="SELECT * FROM `employee`";
$run=mysqli_query($conn,$query);
?>

<?php

while($row=mysql_fetch_array($run))
{
    echo ' <tr>
    <td>'.$row['empid'].'</td>
    <td>'.$row['Firstname'].'</td>
    <td>'.$row['Lastname'].'</td>
    <td>'.$row['Username'].'</td>
    <td>'.$row['Designation'].'</td>
    <td>'.$row['Email'].'</td>
    <td>'.$row['Salary'].'</td>
    <td>'.$row['Contact'].'</td>
    <td>'.$row['Date'].'</td>
    </tr>';
}
    
?>