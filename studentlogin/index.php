<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../mainpage/index.html");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Home Page</title>
	<link rel="stylesheet" type="text/css" href="styl.css">
	<?php include 'links.php'?>
</head>
<body style="background-color: black;">
	<!--styling using bootstrap classes -->
    <div class="container center-div shadow ">
        <div class="heading text-center text-white mb-5">Student HOME Page</div>
           	<!-- logged in user information -->
			<div style="text-align: center;">
				<?php  if (isset($_SESSION['username'])) : ?>
					<p>Welcome <strong><?php echo $_SESSION['username']."<br>"; ?></strong></p>
					<p><a href="index.php?logout='1'" style="color:red;">Logout</a> </p>
				<?php endif ?>
			</div>	
    </div>
</body>
</html>
