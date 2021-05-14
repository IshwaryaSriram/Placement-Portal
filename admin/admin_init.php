<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$dbname="LOGIN";
$sql = "CREATE DATABASE IF NOT EXISTS ".$dbname;
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//create table
$sql = "CREATE TABLE IF NOT EXISTS ADMIN_LOG (
    admin_id varchar(10) PRIMARY KEY,
    name varchar(100) NOT NULL,
    pwd varchar(255) NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table ADMIN_LOG created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }


$sql = "INSERT INTO admin_log(admin_id,pwd)
VALUES ('ADM001','Placement Admin','root')";

if ($conn->query($sql) === TRUE) {
  echo "admin created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

