<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="../homePage.css">
    </head>

    <body>

        <h1><?php echo $_SESSION["currentUser"]; ?></h1>
        <h1><?php echo $_SESSION["userID"]; ?></h1>

        <form action="/api/home" method="POST">
            Date: <select name="date">
                <option value="<?php date("Y-m-d") ?>"><?php echo date("Y-m-d"); ?></option>
                <?php for($i = 0; $i < count($_SESSION["dates"]); $i++) { ?>
                    <option value="<?php $_SESSION["dates"][$i]->date;?>"><?php print_r($_SESSION["dates"][$i]->date); ?></option>
                <?php
                }
                ?>
            </select>
        </form>

        <div class="checklistTable">
            <table>
                <tr>
                    <th>Doctor</th>
                    <th>Apointment today</th>
                    <th>Caregiver</th>
                    <th>Morning Meds</th>
                    <th>Afternoon Meds</th>
                    <th>Night Meds</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>
                <tr>
                    <td><?php echo $_SESSION["list"][0]->doctor ?></td>
                    <td id="yesNo"><?php echo $_SESSION["list"][0]->doctorAppoint ?></td>
                    <td><?php echo $_SESSION["list"][0]->caregiver ?></td>
                    <td id="yesNo"><?php echo $_SESSION["list"][0]->morningMeds ?></td>
                    <td id="yesNo"><?php echo $_SESSION["list"][0]->afternoonMeds ?></td>
                    <td id="yesNo"><?php echo $_SESSION["list"][0]->nightMeds ?></td>
                    <td id="yesNo"><?php echo $_SESSION["list"][0]->breakfast ?></td>
                    <td id="yesNo"><?php echo $_SESSION["list"][0]->lunch ?></td>
                    <td id="yesNo"><?php echo $_SESSION["list"][0]->dinner ?></td>
                </tr>
            </table>
        </div>
        <script src="../homePage.js"></script>
    </body>
</html>
