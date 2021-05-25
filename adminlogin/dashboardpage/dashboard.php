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
                        <div class="cardName">Total Comapnies</div>
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
                        <tbody>
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
                        </tbody>
                    </table>
                </div>

                <div class="recentComm">
                    <div class="cardHeader">
                        <h2>Side</h2>
                    </div>
                    <table>
                        <tbody>
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
                        </tbody>
                    </table>
                </div>

            </div>



</div>

            
            
           