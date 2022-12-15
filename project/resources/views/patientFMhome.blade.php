<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<html>
    <head>
        <title>Patient Home</title>
        <link rel="stylesheet" href="../homePage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <script src="jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body> 
        <?php if($_SESSION["accessLevel"] == 1) { ?>
            <div>Date: <?php echo date("Y-m-d"); ?></div><br>

            <form action="/api/findFamilyPatient" method="POST">
                <input type="text" name="familyCode" placeholder="Family Code:">
                <input type="text" name="patientID" placeholder="Patient ID:">
                <button type="submit">Find</button>
            </form>

            <br>

            <div class="checkListTable">
                <table>
                    <tr>
                        <th>Doctor</th>
                        <th>Appointment today</th>
                        <th>Caregiver</th>
                        <th>Morning Meds</th>
                        <th>Afternoon Meds</th>
                        <th>Night Meds</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                    </tr>
                    <?php if ($_SESSION["count"] == 0 ) { ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } else if ($_SESSION["count"] > 0 && count($_SESSION["familyViewCL"]) == 0 ) { ?>
                        <tr>
                            <td>None</td>
                            <td>Not Done</td>
                            <td>None</td>
                            <td>Not Done</td>
                            <td>Not Done</td>
                            <td>Not Done</td>
                            <td>Not Done</td>
                            <td>Not Done</td>
                            <td>Not Done</td>
                        </tr>
                    <?php } else { ?>
                    <tr>
                        <td><?php echo $_SESSION["familyViewCL"][0]->doctor ?></td>
                        <td id="check" class="check"><?php echo $_SESSION["familyViewCL"][0]->doctorAppoint ?></td>
                        <td><?php echo $_SESSION["familyViewCL"][0]->caregiver ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["familyViewCL"][0]->morningMeds ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["familyViewCL"][0]->afternoonMeds ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["familyViewCL"][0]->nightMeds ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["familyViewCL"][0]->breakfast ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["familyViewCL"][0]->lunch ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["familyViewCL"][0]->dinner ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
        <script src="../homePage.js"></script>
    </body>
</html>