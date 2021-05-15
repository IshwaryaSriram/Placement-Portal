<?php
    //start the session
    session_start();
    $connection = mysqli_connect('localhost','root');
    
    $db = mysqli_select_db($connection,'phppractice');
    if(isset($_POST['submit'])){
        $user = $_POST['admin'];
        $pass = $_POST['password'];
        
        $sql ="select * from admintable where adminUserId='$user' AND adminpass = '$pass'";
        $query = mysqli_query($connection,$sql);
        $row = mysqli_num_rows($query);
            
        if($row == 1){
                echo "Admin Successfully logged in<br>";
                $_SESSION['admin'] = $user;
                header('Location:adminmainpage.php');
            }
            else{
                echo "Log in failed<br>";
                header('Location:adminmainpage.php');
            }
        
    }

?>