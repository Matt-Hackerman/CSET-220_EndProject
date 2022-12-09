<html>
    <style>
    body{
        padding-top: 5%;
    }
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
    th {
        background-color: lightgray;
    }
    table, tr, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
        width: 1000px;
        height: 50px;
        margin-left: auto;
        margin-right: auto; 
}
    </style>
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
        <div class="grid1">
            <h2>Date</h2>
            <input type="date" name="date" value="<?php echo date('Y-m-d');?>" readonly>
        </div>
    <table>
        <tr>
            <th>Supervisor</th>
            <th>Doctor</th>
            <th>Caregiver1</th>
            <th>Caregiver2</th>
            <th>Caregiver3</th>
            <th>Caregiver4</th>    
        </tr>
        <?php if(count($_SESSION['roster']) == 0){?>
        <tr>
            <td>None</td>
            <td>None</td>
            <td>None</td>
            <td>None</td>
            <td>None</td>
            <td>None</td>
        </tr>
        <?php } else { ?>
            <tr>
                <li><a href="/home">Home</a></li>
                <td><?php echo $_SESSION['roster'][0]->superName ?></td>
                <td><?php echo $_SESSION['roster'][0]->doctorName ?></td>
                <td><?php echo $_SESSION['careRoster1'][0]->name ?></td>
                <td><?php echo $_SESSION['careRoster2'][0]->name ?></td>
                <td><?php echo $_SESSION['careRoster3'][0]->name ?></td>
                <td><?php echo $_SESSION['careRoster4'][0]->name ?></td>
            </tr>
        <?php }?>

        
      </table>
    </body>

</html>