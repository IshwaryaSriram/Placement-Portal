<?php
     require_once 'header.php';   
     include_once('../admin/admin_login.php');  
       
    $funObj = new dbFunction();  
    if(isset($_POST['submit'])){  
        $adminid = $_POST['adminid'];  
        $password = $_POST['password'];  

        $user = $funObj->Login($adminid, $password);  
        if ($user) {  
            // Registration Success  
           header("location:home.php");  
        } else {  
            // Registration Failed  
            echo "<script>alert('AdminId Does Not Match')</script>";  
        }  
    }  

    ?>
       
        <form action="" method="POST" enctype="multipart/form-data">
        <fieldset> <legend> LOGIN </legend>
		<p id="pn1">
			<input type="text"  name="adminid" placeholder="ADMIN ID" pattern="[a-zA-Z0-9]+" required/>
		</p>
		<p id="pr2">
			<input type="password"  name="password" placeholder="PASSWORD"/>
		</p>
        <button class ="btn1" type="submit" name="submit" >LOG IN</button>
        </fieldset>
        </form>
<?php
    
    require_once 'footer.php';
?>
