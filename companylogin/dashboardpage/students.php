
<?php
    //include connection.php
    include'connection.php';
    $sql="select * from  (select studentdetails.FirstName , studentdetails.DoB , studentdetails.EmailId , studentdetails.UG,
    studentdetails.College , studentdetails.Gender , studentresume.Department , studentresume.CGPA , studentresume.GradYear , jobappl.JobId 
    from studentdetails
    inner join studentresume on studentdetails.StudentId  = studentresume.StudentId
    inner join jobappl on studentdetails.StudentId  = jobappl.StudentId
    )as result";

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
    <title>VIEW STUDENT APPLICATIONS</title>
    <link rel="stylesheet" type="text/css" href="app_style.css">
    
</head>
<body style="background-color: black;color:white;">
<div id="Students" class="portion" style="display:none">
    <div class="heading">VIEW STUDENT APPLICATIONS</div>
        <form name="search" method="POST" action="students.php">
			<div>
                <input type="text" name="search_box" value=""/>
			</div>
			<input type="submit" name="search" value="Search"/>
                <select name="column">
                    <option value="">Filter</option>
                    <option value="UG">UG/PG</option>
                    <option value="College">College</option>
                    <option value="Department">Department</option>
                    <option value="GradYear">Y-o-G</option>
                    <option value="Gender">Gender</option>
                </select>
        </form>
        <table width="70%" cellpadding="5" cellspace="5" style="margin-left:auto;margin-right:auto;">
            <tr>
                <td><strong>STUDENT NAME</strong></td>
                <td><strong>COLLEGE</strong></td>
                <td><strong>DEPARTMENT</strong></td>
                <td><strong>CGPA</strong></td>
                <td><strong>YEAR OF GRADUATION</strong></td>
                <td><strong>UG/PG</strong></td>
                <td><strong>JOB ID</strong></td>
                <td><strong>DOB</strong></td>
                <td><strong>GENDER</strong></td>
                <td><strong>EMAIL ID</strong></td>
                <td><strong>APPL. STATUS</strong></td> 
            </tr>

        </table>

        <?php while($row = mysqli_fetch_array($query)){?>
        <table width="70%" cellpadding="5" cellspace="5" style="margin-left:auto;margin-right:auto;">
        <tr>
            <td><?php echo $row['FirstName'];?></td>
            <td><?php echo $row['College'];?></td>
            <td><?php echo $row['Department'];?></td>
            <td><?php echo $row['CGPA'];?></td>
            <td><?php echo $row['GradYear'];?></td>
            <td><?php echo $row['UG'];?></td>
            <td><?php echo $row['JobId'];?></td>
            <td><?php echo $row['DoB']."<br>";?></td>
            <td><?php echo $row['Gender']."<br>";?></td>
            <td><?php echo $row['EmailId']."<br>";?></td>
            <td><a href="#" style="text-decoration: none;">Change Appl. Status</a></td>
        </tr>    
        </table>
    <?php }?>
    </div>  

</body>
</html>
