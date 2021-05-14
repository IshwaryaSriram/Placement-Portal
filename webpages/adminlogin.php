<?php
     require_once 'header.php';   
     include_once('../admin/admin_login.php');  
       
    

    ?>
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
        <fieldset> <legend> LOGIN </legend>
		<p id="pn1">
			<input type="text"  name="adminid" placeholder="ADMIN ID" pattern="[a-zA-Z0-9]+" required/>
            <p class="err-msg">
                <?php if($nameErr!=1){ echo $nameErr; } ?> </p>
		</p>
		<p id="pr2">
			<input type="password"  name="password" placeholder="PASSWORD"/>
            <p class="err-msg">
                <?php if($passErr!=1){ echo $passErr; } ?> </p>
            </p>
		</p>
        <button class ="btn1" type="submit" name="submit" >LOG IN</button>
        </fieldset>
        </form>
<?php
    
    require_once 'footer.php';
?>
