<?php
require_once 'dbconnect.php';
function insert($id, $email, $name, $city,$phno)
{
    // var_dump(Database::$conn);
    $stmt = Database::$conn->prepare("INSERT INTO companyprofile 
            (CompanyId, CompanyName, Email,PhoneNumber,City)
            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss",$id, $name, $email,$phno,$city);
    $res= $stmt->execute();
    echo Database::$conn->error;
    if(!$res)
        echo("Error: ".$stmt->error);
    return $res;
}




if (isset($_POST['ressub'])) { // if save button on the form is clicked
    // name of the uploaded file
    //var_dump($_POST);
    $sid=$_POST['studentid'];
    $rid=$_POST['rno'];
    $dept=$_POST['dept'];
    $gradyear=$_POST['gradyear'];
    $gpa=$_POST['gpa'];
    $mark12=$_POST['mark12'];
    $mark10=$_POST['mark10'];
    $filename = $_FILES['resumefile']['name'];

    
    $destination = 'uploads/' . $filename;

    
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['resumefile']['tmp_name'];
    $size = $_FILES['resumefile']['size'];

    if (!in_array($extension, ['pdf'])) {
        echo "You file extension must be .pdf ";
    } elseif ($_FILES['resumefile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $stmt = Database::$conn->prepare("INSERT INTO studentresume 
            (studentid,resumeid,cgpa,mark12,mark10,department,gradyear,filename,file) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $sid,$rid,$gpa,$mark12,$mark10,$dept,$gradyear,$filename,$file);
            $res= $stmt->execute();
            if(!$res)
                echo("Error: ".$stmt->error);
            else
                echo "<script>alert('file upload success')</script>";
        }
    }
}








// var_dump($_POST['submit']);
if(isset($_POST['submit']))
{
    // echo "hello";
    var_dump($_POST);
    $id=$_POST['CompanyId'];
    $email=$_POST['Email'];
    $name=$_POST['name'];
    $city=$_POST['City'];
    $phno=$_POST['PhoneNumber'];
    

    $sql=insert($id, $email, $name, $city,$phno);
    if($sql)
    {
        echo "<script>alert('Data inserted');</script>";
        echo "<script>location.replace('../dashboardpage/mainindex.php');</script>";
    }
    else
    {
    echo "<script>alert('Data not inserted');</script>";
    }
}
?>