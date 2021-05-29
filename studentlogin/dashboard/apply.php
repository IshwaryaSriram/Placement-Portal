<?php
include "dbconnect.php"; // Using database connection file here
include "company.php";
if(isset($_POST['submit']))
{		
    // $sql="SELECT * from jobdetails where JobId='".$_GET['jobid']."'";
    // $result = mysqli_query(Database::$conn,$sql);
    // $rows = mysqli_fetch_array($result);
    // $fullname = $_POST['fullname'];
    // $age = $_POST['age'];

    // if(mysqli_query(Database::$conn,"SELECT * from jobdetails where JobId='".$_GET['jobid']."'")){
        $jobid =$_POST['JobId'];
        $stuid = $_POST['studentId'];
        // echo "$jobid";
        if(!mysqli_query(Database::$conn,"INSERT INTO `jobappl`(`Status`, `studentid`, `JobId`) VALUES ('n','$stuid','$jobid')")){
            echo mysqli_error(Database::$conn);
        }
        else
        {
            echo "Records added successfully.";
            // header('location: mainindex.php');
        }
}


// mysqli_close($db); // Close connection
?>