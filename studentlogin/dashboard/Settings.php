<style>

</style>
<?php
    require_once 'dbconnect.php';
    $id=$_SESSION['username'];
    //var_dump($_SESSION);
    if(!mysqli_query(Database::$conn,"SELECT * FROM studentdetails where studentid=$id")){
        echo mysqli_error(Database::$conn);
    }
    $result=mysqli_query(Database::$conn,"SELECT * FROM studentdetails where studentid=$id");
?>
<div id="Settings" class="portion" style="display:none">
<table>
<?php
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {?>
	    <tr>
            <td>Student ID: </td>
            <td><?php echo $row["StudentId"]; ?></td>
        </tr>
        <tr>
		    <td>First Name</td>
            <td><?php echo $row["FirstName"]; ?></td>
        </tr>
        <tr>
		    <td>Last Name</td>
            <td><?php echo $row["LastName"]; ?></td>
        </tr>
        <tr>
		    <td>Email id</td>
            <td><?php echo $row["EmailId"]; ?></td>
		</tr>
        <tr>
		    <td>DoB</td>
            <td><?php echo $row["DoB"]; ?></td>
        </tr>
        <tr>
		    <td>Phone Number</td>
            <td><?php echo $row["MobileNumber"]; ?></td>
        </tr>
        <tr>
		    <td>Study</td>
            <td><?php echo $row["UG"]; ?></td>
        </tr>
        <tr>
		    <td>College</td>
            <td><?php echo $row["College"]; ?></td>
        </tr>
        <tr>
		    <td>Gender</td>
            <td><?php echo $row["Gender"]; ?></td>
        </tr>
	    <tr>
            <td>Action</td>
		    <td><a href="updatesettings.php?StudentId=<?php echo $row["StudentId"]; ?>">Update</a></td>
        </tr>
			<?php
			
			}
			?>
</table>



</div>