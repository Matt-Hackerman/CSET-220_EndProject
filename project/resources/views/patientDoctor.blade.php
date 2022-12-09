<html>
    <style>
        h2 {
            text-align: center;
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
        button{
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
    <header>

    </header>
    <?php if($_SESSION["accessLevel"] == 4) { ?>
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
        <h2>Past Prescriptions</h2>
        <?php $test = DB::select('select * from prescription where patientID = "'.$_SESSION['pid'].'" and doctorID = "'.$_SESSION['userID'].'"');?>
        <?php $test2 = DB::select('select appointmentDate from doctorappointments where patientID = "'.$_SESSION['pid'].'" and doctorID = "'.$_SESSION['userID'].'"');?>
        <table>
            <tr>
                <th>Date</th>
                <th>Comment</th>
                <th>Morning Med</th>
                <th>Afternoon Med</th>
                <th>Night Med</th>
            </tr>
            <?php if(count($test) == 0) {?>
                <tr>
                    <td>None</td>
                    <td>None</td>
                    <td>None</td>
                    <td>None</td>
                    <td>None</td>
                </tr>
            <?php } else {?>
                <?php for($x=0;$x<count($test);$x++){?>
                <tr class="info">
                    <td><?php echo $test[$x]->date ?></td>
                    <td><?php echo $test[$x]->comment ?></td>
                    <td><?php echo $test[$x]->morningMed ?></td>
                    <td><?php echo $test[$x]->afternoonMed ?></td>
                    <td><?php echo $test[$x]->nightMed ?></td>
                </tr>
                <?php } ?>
            <?php } ?>
        </table>
        <br>
        <form action="/api/patientDoctor" method="POST">
            <h2>New prescription</h2>
            <br>
            <table>
                <tr>
                    <th>Comment</th>
                    <th>Morning Med</th>
                    <th>Afternoon Med</th>
                    <th>Night Med</th>
                </tr>
                <tr>
                    <td><input name="comment" placeholder="Comment" type="text" required></td>
                    <td><input name="morningMed" placeholder="Morning Med" type="text" required></td>
                    <td><input name="afternoonMed" placeholder="Afternoon Med" type="text" required></td>
                    <td><input name="nightMed" placeholder="Night Med" type="text" required></td>
                </tr>
            </table>
            <div class="click">
                <?php $check = false; for($i=0;$i<count($test2);$i++){
                    if($test2[$i]->appointmentDate == date('Y-m-d')){
                        $check = true;
                    }
                } ?>
                <?php if($check == true){ ?>
                    <input value="Ok" class="submit" type="submit">
                <?php } ?>
                <a href="javascript:history.back()">
                    <button type="button">Cancel</button>
                </a>
            </div>
        </form>
    </body>
    <script>
        search = document.getElementById('search');
        var test = JSON.parse('<?php echo json_encode($test) ?>');
        rows = document.querySelectorAll(".info");
        console.log(rows);
        search.addEventListener("input", e => {
            const value = e.target.value;
            for(x=0;x<test.length;x++){
                const vis = test[x].ID.toLowerCase().includes(value.toLowerCase()); 
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
                    <li><a href="/roster">Roster</a></li>
                    <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/adminReport">Admin Report</a></li><?php } ?>
                    <?php if($_SESSION['role'] == "admin") {?><li><a href="/payment">Payment</a></li><?php } ?>
                </ul>
            </header>
            <h2>Missing Access Level</h1>
        </body>
    <?php } ?>
</html>