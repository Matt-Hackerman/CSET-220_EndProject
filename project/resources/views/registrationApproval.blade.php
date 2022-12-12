<html>
    <style>
        .centerH1 {
            text-align: center;
            padding: 2rem;
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
        .input{
            margin-left: 10px;
            border: 7px solid blue;
            width: 250px;
            height: 50px;
        }
        .button{
            margin-top: 1rem;
            background-color: #2E8B57;
            height: 50px;
            width: 100px;
            cursor:pointer;
            color:white;
            border-style: none;
        }
        .click{
            display: flex;
            gap: 2%;
            justify-content: center;
        }
        label{
            background-color: blue;
            border-top-right-radius: 10px;
            border-color: black;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: 50px;
            
        }
        .flex {
            display: flex;
            width: fit-content;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            width: 100%;
        }
        .text{
            display: flex;
            gap: 2rem;
            justify-content: center;
            align-items: center;
            margin-top: 2rem;;
            margin-bottom: 1rem;
        }
        .text > div {
            display: flex;
            align-items:center;
        } 
        select {
            margin-left: 10px;
            border: 7px solid blue;
            width: 250px;
            height: 50px;
        }
        .submit {
            margin-top: 1rem;
            background-color: #2E8B57;
            height: 50px;
            width: 100px;
            cursor:pointer;
            color:white;
            border-style: none;
        }
    </style>
    <head>
        <link rel="stylesheet" href="../homePage.css">
    </head>
    <?php if($_SESSION["accessLevel"] == "5") { ?>
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
        
        <h1 class="centerH1">Approval</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Approval</th>
                <th>Submit</th>
            </tr>
                <?php for($i=0;$i<count($_SESSION['approval']);$i++){ ?>
                    <form action="/api/registrationApproval" method="POST">
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['approval'][$i]->ID ?>">
                    <tr>
                        <td><?php echo $_SESSION['approval'][$i]->name ?></td>
                        <td><?php echo $_SESSION['approval'][$i]->role ?></td>
                        <td>
                            <div class="flex">
                                <div class="flex">
                                    <p>Yes</p>
                                    <input value="Approved" name="approval" type="radio" required>
                                </div>
                                <div class="flex">
                                    <p>No</p>
                                    <input value="Denied" name="approval" type="radio" required>
                                </div>
                            </div>
                        </td>
                        <td><input class="submit" type="submit"></td>
                    </tr>
                </form>
                <?php } ?>
        </table>
        <script src="../homePage.js"></script>
    </body>
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