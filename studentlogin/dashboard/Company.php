<?php
    //include connection.php
    include'connection.php';
    $sql="select * from  (select companyprofile.CompanyName,jobdetails.JobDesc,jobdetails.Vacancies,jobdetails.Start,jobdetails.Mode,
    jobdetails.Salary,jobdetails.City,jobdetails.ApplDeadline
    from companyprofile inner join jobdetails on companyprofile.CompanyId = jobdetails.CompanyId) as result";

    if(isset($_POST['search'])){
        $search_term = mysqli_real_escape_string($connect,$_POST['search_box']);
        $col = mysqli_real_escape_string($connect,$_POST['column']);
        $sql .= " Where result.$col = '{$search_term}'";      
        //$sql .= " OR jobdetails.$col = '{$search_term}'";
        //$sql .= "ORDER BY jobdetails.ApplDeadline DESC";
    }
    
    $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SEARCH</title>
    <link rel="stylesheet" type="text/css" href="app_style.css">
    
</head>
<body style="background-color: black;">
<div id="Companies" class="portion" style="display:none">
        <div class="heading"><center>PLACEMENT APPLICATION</center></div>
        <form name="search" method="POST" action="Company.php">
            <div class="form-group">
                <input type="text" name="search_box" value=""/>
            </div>
            <input type="submit" name="search" value="Search"/>
            <select name="column">
                <option value="">Filter</option>
                <option value="companyid">Company Id</option>
                <option value="companyname">Company Name</option>
                <option value="mode">Mode</option>
                <option value="city">City</option>
            </select>
        </form>
        <table width="70%" cellpadding="5" cellspace="5" style="margin-left:auto;margin-right:auto;">
            <tr>
                <td><strong>COMPANY NAME</strong></td>
                <td><strong>JOB DESC</strong></td>
                <td><strong>NO. OF VACANCIES</strong></td>
                <td><strong>START</strong></td>
                <td><strong>MODE</strong></td>
                <td><strong>SALARY</strong></td>
                <td><strong>CITY NAME</strong></td>
                <td><strong>DEADLINE</strong></td>
                <td><strong>APPLY</strong></td>
                        
            </tr>

		</table>

			<?php while($row = mysqli_fetch_array($query)){?>
			<table width="70%" cellpadding="5" cellspace="5" style="margin-left:auto;margin-right:auto;">
			<tr>
				<td><?php echo $row['CompanyName'];?></td>
				<td><?php echo $row['JobDesc'];?></td>
                <td><?php echo $row['Vacancies'];?></td>
                <td><?php echo $row['Start'];?></td>
                <td><?php echo $row['Mode'];?></td>
                <td><?php echo $row['Salary'];?></td>
                <td><?php echo $row['City'];?></td>
				<td><?php echo $row['ApplDeadline']."<br>";?></td>
                <td><a href="#" style="text-decoration: none;">Click to Apply</a></td>
			</tr>    
			</table>
		<?php }?>
     
</div>
</body>
</html>