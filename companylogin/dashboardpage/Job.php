<div id="Jobs" class="portion" style="display:none">

<div class="rescontainer">
    <div class="title">Job Details</div>
    <div class="content">
      <form action="formsub.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Company ID</span>
            <input type="text" name="CompanyId" placeholder="Enter Company ID" required >
          </div>
          <div class="input-box">
            <span class="details">Job ID</span>
            <input type="text" name="JobId" placeholder="Enter Job ID" required>
          </div>

          <div class="input-text">
            <span class="details">Job Description</span>
            <textarea id="desc" name="desc" rows="4" cols="80"placeholder="Enter Job Description" required> </textarea>
            <!-- <input type="textarea" name="desc" placeholder="Enter Job Description" required > -->
          </div>

          <div class="input-box">
            <span class="details">Application Deadline</span>
            <input type="date" name="deadline" placeholder="Enter Application Deadline" required >
          </div>

          
          <div class="input-box">
            <span class="details">Approximate Start Date</span>
            <input type="text" name="Start" placeholder="Enter Start Time" required >
          </div>

          <div class="input-box">
            <span class="details">City</span>
            <input type="text" name="City" placeholder="Enter City" required >
          </div>

          <div class="input-box">
            <span class="details">State</span>
            <input type="text" name="State" placeholder="Enter State" required >
          </div>

          <div class="rowform" >
            
            <div class="input-float"> 
              <span class="mark">Mode</span>
              <input type="text" name="Mode" placeholder="Online/Offline/Mixed" required>
            </div>

            <div class="input-float">
              <span class="mark">Salary</span>
              <input type="number" name="Salary" placeholder="Enter approx salary" required>
            </div>

            <div class="input-float">
              <span class="details" style="padding: 0px;">Vacancies</span>
              <input type="number" name="Vacancies" placeholder="Enter Vacancies" required>
            </div>

         </div>
         </div>
        <div class="button">
          <input type="submit" name="ressub" value="Submit" style="width:200px;margin-top: 15px;">
        </div>
      </form>
    </div>
  </div>



</div>