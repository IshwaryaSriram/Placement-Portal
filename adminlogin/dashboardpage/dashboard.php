<?php require_once 'dbconnect.php' ?>
<div id="Dashboard" class="portion" > 
<!-- style="display:none"> -->
    <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM studentlogin";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>
                        </div>
                        <div class="cardName">Total Students</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-users"></i>
                    </div>
                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM companylogin";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>
                        </div>
                        <div class="cardName">Total Companies</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM studentdetails where status = 'n'";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>                        
                        </div>
                        <div class="cardName">Students Active</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-id-card"></i>
                    </div>
                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM studentdetails where status = 'y'";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>   
                        </div>
                        <div class="cardName">Students Placed</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-box-open"></i>
                    </div>
                    
                </div>
            </div>

            <div class="details">
                <div class="recent">
                    <div class="cardHeader">
                        <h2>Table</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Student ID</td>
                                <td>Name</td>
                                <td>Status</td>
                                </tr>
                        </thead>
                        <?php
                            $sql = "SELECT * FROM studentdetails";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            // echo($rowCount);
                            if($rowCount > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr><td>".$row['StudentId']."</td><td>".$row['FirstName']."</td>";
                                    if($row['Status']=='y'){
                                        echo "<td><span class='status placed'>"."Placed"."</span></td><br>";
                                    }
                                    else if($row['Status']=='n'){
                                        echo "<td><span class='status pending'>"."Not Placed"."</span></td><br>";
                                    }
                                }
                            }
                        ?>
                        <!-- <tbody>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status placed">placed</span></td>
                            </tr>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status placed">placed</span></td>
                            </tr>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status blacklist">Blacklisted</span></td>
                            </tr>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status placed">placed</span></td>
                                
                            </tr>
                        </tbody> -->
                    </table>
                </div>

                <div class="recentComm">
                    <div class="cardHeader">
                        <h2>Side</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Job Id</td>
                                <td>Company Name</td>
                                <td>Vacancy Count</td>
                            </tr>
                        </thead>
                        <?php
                            $sql = "SELECT * FROM jobdetails inner join companyprofile
                            on jobdetails.CompanyId = companyprofile.CompanyId";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            // echo($rowCount);
                            if($rowCount > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr><td>".$row['JobId']."</td><td>".$row['CompanyName']."</td><td>".$row['Vacancies']."</td></tr>";
                                }
                            }
                        ?>
                        <!-- <tbody>
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="companylogo.jpg" ></div></td>
                                <td><h4>Comapny Name<br> <span>Type</span></spacn></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="companylogo.jpg" ></div></td>
                                <td><h4>Comapny Name<br> <span>Type</span></spacn></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="companylogo.jpg" ></div></td>
                                <td><h4>Comapny Name<br> <span>Type</span></spacn></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="companylogo.jpg" ></div></td>
                                <td><h4>Comapny Name<br> <span>Type</span></spacn></h4></td>
                            </tr>
                        </tbody> -->
                    </table>
                </div>

            </div>



</div>

            
            
           