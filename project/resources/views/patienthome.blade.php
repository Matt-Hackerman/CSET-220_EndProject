<html>
    <head>
        <title>Patient Home</title>
        <link rel="stylesheet" href="../homePage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <script src="jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body> 
        <?php if($_SESSION["accessLevel"] == 2) { ?>
            <form id="checkList" action="/api/previous_day" method="POST">
                Date: <select id="allDates" name="date">
                    <option value="<?php date("Y-m-d") ?>"><?php echo date("Y-m-d"); ?></option>
                    <?php for($i = 0; $i < count($_SESSION["dates"]); $i++) { ?>
                        <option value="<?php echo $_SESSION["dates"][$i]->date;?>"><?php print_r($_SESSION["dates"][$i]->date); ?></option>
                    <?php
                    }
                    ?>
                </select>
            </form>

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
                    <?php if (count($_SESSION["list"]) == 0) { ?>
                        <tr>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                            <td>None</td>
                        </tr>
                    <?php } else { ?>
                    <tr>
                        <td><?php echo $_SESSION["list"][0]->doctor ?></td>
                        <td id="check" class="check"><?php echo $_SESSION["list"][0]->doctorAppoint ?></td>
                        <td><?php echo $_SESSION["list"][0]->caregiver ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["list"][0]->morningMeds ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["list"][0]->afternoonMeds ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["list"][0]->nightMeds ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["list"][0]->breakfast ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["list"][0]->lunch ?></td>
                        <td id="yesNo" class="symbol"><?php echo $_SESSION["list"][0]->dinner ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
        <script src="../homePage.js"></script>
    </body>
</html>