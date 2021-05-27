<?php
session_start();

// initializing variables
$username = "";
//$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'placement_portal');


// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        //$password = md5($password);
        $query = "SELECT * FROM companylogin WHERE CompanyId='$username' AND pwd='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          $sqlquery="select * from companydetails where companyid='$username'";
          $res=mysqli_query($db,$sqlquery);
          if(mysqli_num_rows($results) == 0)
          {

        //   if ($_COOKIE['username']!=$_SESSION['username'])
        //     {
        //         setcookie("username", $_SESSION['username'], time() + (10 * 365 * 24 * 60 * 60));
                header('Location: form/form.php');
                exit();
            }
            else
            {
                header('Location: dashboardpage/mainindex.php');
                exit();
            }
          //header('location: dashboardpage/mainindex.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>