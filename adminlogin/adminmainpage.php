<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:adminlogin.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Main Page</title>
    <?php include 'links.php' ?>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container center-div shadow">
        <div class="Heading text-center text-black mb-5">Admin users name <?php echo $_SESSION['admin']?>
        </div>
        <a href="logout.php" class = "btn btn-danger">LOGOUT</a>
    </div>
    
</body>
</html>