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
    </head>
    <?php if($_SESSION["accessLevel"] == 5) { ?>
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
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/adminReport">Admin Report</a></li><?php } ?>
                <?php if($_SESSION['role'] == "admin") {?><li><a href="/payment">Payment</a></li><?php } ?>
            </ul>
        </header>
        <?php $test = $_SESSION['addPatients'] ?>
        <h1>Additional Patient Info</h1>
        <form action="/api/additionalPatient" method="POST">
            @csrf
            <div class="parent">
            <div class="child">
                <div class=button2>Patient ID</div>
                <select name="patientID" id="patID" type="text" required>
                    <option selected hidden>Select a patientID</option>
                    <?php for($i=0;$i<count($test);$i++){ ?>
                        <option value="<?php echo $test[$i]->patientID ?>"><?php echo $test[$i]->patientID ?></option>
                    <?php } ?>
                </select>
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
                <div class=button2>Group</div>
                <input type="text" name="groups">
            </div>
            </div>
            <br>
            <div class="parent" style=display:inline-block>
            <div class="child">
                <div class=button2>Admission Date</div>
                <input name="admissionDate" type="date" value="<?php echo date('Y-m-d') ?>">
            </div>
            </div>
            <br>
            <div class="parent" style=display:inline-block;width:61%;text-align:right>
            <input type="submit" value="Ok" class="submit">
            <button type="submit" class="submit">Cancel</button>
            </div>
        </form>
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
                    <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/adminReport">Admin Report</a></li><?php } ?>
                    <?php if($_SESSION['role'] == "admin") {?><li><a href="/payment">Payment</a></li><?php } ?>
                </ul>
            </header>
            <h2>Missing Access Level</h1>
        </body>
    <?php } ?>
</html>