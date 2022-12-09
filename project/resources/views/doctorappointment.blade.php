<html>
<style>
  * {
    padding:0;
    margin:0;
    box-sizing: border-box;
  }
  text{
    font-family:Calibri;
  }
  .parent {
    width: 100%;
  }
  .child {
    float: left;
    width: 50%;
  }  
  .button{
    background-color: #2E8B57;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    margin: 4px 2px;
    cursor:pointer;
    color:white;
  }
  .button2{
    border-radius: 0% 8% 0% 0%;
    background-color: #008CBA;
    padding: 7px 16px;
    text-align: center;
    display: inline-block;
    margin: 4px 2px;
    color:white;
  }

  .submit {
    background-color: #2E8B57;
    height: 50px;
    width: 100px;
    cursor:pointer;
    color:white;
    border-style: none;
  }
  input{
    height:32px;  
  }
</style>
<head>
  <link rel="stylesheet" href="../homePage.css">
</head>
<?php if($_SESSION["role"] == 5) { ?>
<body>
  <header class="header">
    <ul>
        <li><a href="/home">Home</a></li>
        <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/additionalPatient">Additional Patients</a></li><?php } ?>
        <?php if($_SESSION['accessLevel'] > 2) {?><li><a href="/patientSearch">Patients</a></li><?php } ?>
        <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/emp_search">Employees</a></li><?php } ?>
        <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/registrationApproval">Approval</a></li><?php } ?>
        <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/newroster">newRoster</a></li><?php } ?>
        <li><a href="/roster">Roster</a></li>
        <?php if($_SESSION['role'] == "admin") {?><li><a href="/payment">Payment</a></li><?php } ?>
        <form id="logout" action="/api/logout" method="POST">
          <button type="submit">Logout</button>
        </form>
    </ul>
</header>
  <?php $test = $_SESSION['patients'] ?>
  <?php $test2 = $_SESSION['doctorRoster'] ?>
  <h1>Doctor's Appointment</h1>
  <form action="/api/doctorappointment" method="POST">
    @csrf
    <div class="parent">
      <div class="child">
        <div class=button2>Patient ID</div>
        <input name="patientID" id="patID" type="text" required>
      </div>  
      <div class="child">
        <div class=button2>Patient Name</div>
        <input id="name" readonly>
      </div>
    </div>
    <br>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Date</div>
        <input id="date" value="<?php echo date('Y-m-d') ?>" name="appointmentDate" type="date" required>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Doctor</div>
        <select name="doctorID" id="" required>
          <?php for($i=0;$i<count($_SESSION['doctors']);$i++){?>
            <option class="options" value="<?php echo $_SESSION['doctors'][$i]->doctorID;?>"><?php echo $_SESSION['doctors'][$i]->name;?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block;width:61%;text-align:right>
      <input type="submit" value="Ok" class="submit">
      <button type="submit" class="submit">Cancel</button>
    </div>
  </form>
  <script src="../homePage.js"></script>
</body>

<script>

  patientID = document.getElementById("patID");

  patientID.addEventListener("input", e => {
    const value = e.target.value;
    var test = JSON.parse('<?php echo json_encode($test) ?>');
    for(x=0;x<test.length;x++){
        if(value.toLowerCase() == test[x].patientID.toLowerCase()){
          document.getElementById("name").value = test[x].name;
          break;
        }
        else{
          document.getElementById("name").value = "";
        }
    }
  });
</script>
    <?php } else { ?>
        <body>
              <header class="header">
                <ul>
                    <li><a href="/home">Home</a></li>
                    <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/additionalPatient">Additional Patients</a></li><?php } ?>
                    <?php if($_SESSION['accessLevel'] > 2) {?><li><a href="/patientSearch">Patients</a></li><?php } ?>
                    <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/emp_search">Employees</a></li><?php } ?>
                    <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/registrationApproval">Approval</a></li><?php } ?>
                    <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/newroster">newRoster</a></li><?php } ?>
                    <li><a href="/roster">Roster</a></li>
                    <?php if($_SESSION['role'] == "admin") {?><li><a href="/payment">Payment</a></li><?php } ?>
                    <a href="#" id="logOutLink">Logout</a>
                </ul>
            </header>
            <h2>Missing Access Level</h1>
            <script src="../homePage.js"></script>
        </body>
    <?php } ?>
</html>
