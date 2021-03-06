# Enterprise Project Analysis

Enterprise Project Analysis will give the estimated time of completion for a particular project according to the day to day completion of the parts of a project completed by the employee.

The System will consist of two logins, Admin and Employees :
The Admin will be able to either add the project name and its description or check for existing projects and then monitor the status of the project. The admin can add different task such as Planning, Coding, Testing etc. The admin can assign an employee to do different tasks.

The Employee will receive the assigned work with the help of this system. In the employee login, the employee will receive the task allotted to him & will update the amount(in percentage) of the compeletion of the task which will go to the admin.

## Technologies

- HTML5
- PHP
- CSS
- Bootstrap
- Javascript
- JQuery

## Installation and Getting Started

#### DB Connections 
 - [DB Connection File](includes/dbConnect.php)
```php
<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="projectepa";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
?>
```

#### DB file

DB file for the project is included in sql folder: [SQL File](./sql/projectepa.sql) 


## ScreenShots

### Multi-Login Page

![](images/Login_Page.png)

### Admin Dashboard

![](images/Admin_Dashboard.png)

### Employee Details

![](images/Employees_Details_Insertion.png)

### Projects

![](images/Project_Insertion.png)

### Replace Employee

![](images/Replace_Employees.png)

### Employee Dashboard

![](images/Employee_Dashboard.png)

### Employee Projects

![](images/Employee_Projects.png)
