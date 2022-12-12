<html>
    <style>
    .grid1{
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 10px;
        text-align: center;
        
    }
    h2{
        background-color: blue;
        text-align: center;
        border:2px solid black;
        border-top-right-radius: 10px;
        color: white;
        padding: 1%;
        
    }
    input{
        font-size: 150%;
    }
    table {
        overflow-y: scroll;
        max-height: 300px;
        min-height: fit-content;
        display:block;
    }
    table, tr, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
        width: 1000px;
        margin-left: auto;
        margin-right: auto; 
    }
    tr, th {
        height: 25px;
    }
    th {
        background-color: lightgray;
    }
    .hidden {
        display: none;
    }
    </style>
    <head>
        <link rel="stylesheet" href="../homePage.css">
    </head>
    <?php if($_SESSION["accessLevel"] > 2) { ?>
    <body>
        <header class="header">
            <ul>
                <li><a href="/home">Home</a></li>
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/additionalPatient">Additional Patients</a></li><?php } ?>
                <?php if($_SESSION['accessLevel'] > 2) {?><li><a href="/patientSearch">Patients</a></li><?php } ?>
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/emp_search">Employees</a></li><?php } ?>
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/registrationApproval">Approval</a></li><?php } ?>
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/newroster">newRoster</a></li><?php } ?>
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/doctorappointment">Doctor Appointments</a></li><?php } ?>
                <li><a href="/roster">Roster</a></li>
                <?php if($_SESSION['role'] == "admin") {?><li><a href="/payment">Payment</a></li><?php } ?>
                <form id="logout" action="/api/logout" method="POST">
                    <button type="submit">Logout</button>
                </form>
            </ul>
        </header>
        <br>
    <?php $test = $_SESSION['patientSearch'] ?>
    <div class="grid1">
    </div>
        <input id="search" type="text" placeholder="Search">
        <br>
        <br>
        <table>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Emergency Contact</th>
                <th>Emergency Contact Name</th>
                <th>Admission Date</th>    
            </tr>
            <?php if(count($_SESSION['patientSearch']) == 0){?>
            <tr>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
            </tr>
            <?php } else { ?>
                <?php for($i=0;$i<count($_SESSION['patientSearch']);$i++) {?>
                <tr class="info">
                    <td><?php echo $_SESSION['patientSearch'][$i]->patientID ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->name ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->age ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->emergencyContact ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->contactRelationship ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->admissionDate ?></td>
                </tr>
                <?php } ?>
            <?php }?>
        </table>
        <script src="../homePage.js"></script>
    </body>
    <script>
        search = document.getElementById('search');
        var test = JSON.parse('<?php echo json_encode($test) ?>');
        rows = document.querySelectorAll(".info");
        search.addEventListener("input", e => {
            const value = e.target.value;
            for(x=0;x<test.length;x++){
                const vis = test[x].name.toLowerCase().includes(value.toLowerCase()) || test[x].patientID.toLowerCase().includes(value.toLowerCase());
                if(vis==false){
                    rows[x].style.display = "none";
                }
                else{
                    rows[x].style.display = "table-row";
                }
            };
            console.log("\n");
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
                    <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/doctorappointment">Doctor Appointments</a></li><?php } ?>
                    <li><a href="/roster">Roster</a></li>
                    <?php if($_SESSION['role'] == "admin") {?><li><a href="/payment">Payment</a></li><?php } ?>
                    <form id="logout" action="/api/logout" method="POST">
                        <button type="submit">Logout</button>
                    </form>
                </ul>
            </header>
            <h2>Missing Access Level</h1>
            <script src="../homePage.js"></script>
        </body>
    <?php } ?>
</html>