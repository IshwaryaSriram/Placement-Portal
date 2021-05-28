<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin: auto;
    margin-top: 20px;
}
.styled-table thead tr {
    background-color: #950740;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #1A1A1D;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #950740;
}
.styled-table tbody tr:hover{
    background: #4e4e50;
    color: white;
}
</style>
<?php
    require_once 'dbconnect.php';
    // $id='".$_SESSION['admin']."';
    //var_dump($_SESSION);
    if(!mysqli_query(Database::$conn,"SELECT * FROM adminlogin where AdminId='".$_SESSION['admin']."'")){
        echo mysqli_error(Database::$conn);
    }
    $result=mysqli_query(Database::$conn,"SELECT * FROM adminlogin where AdminId='".$_SESSION['admin']."'");
?>
<div id="Settings" class="portion" style="display:none">
<table class="styled-table">
    <thead>
    <tr>
        <th>Particular</th>
        <th>Details</th>
    </tr>
    
    </thead>
<?php
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {?>
	    <tr>
            <td>Admin ID: </td>
            <td><?php echo $row["AdminId"]; ?></td>
        </tr>
        <tr>
            <td>Password</td>
		    <td><button class="pwdbtn"><a href="changepass.php?AdminId=<?php echo $row["AdminId"]; ?>">Change Password</a></button></td>
        </tr>
			<?php
			
			}
			?>
</table>



</div>