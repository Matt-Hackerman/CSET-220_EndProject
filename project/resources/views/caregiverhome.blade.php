<html>
    <head>
        <title>Patient Home</title>
        <link rel="stylesheet" href="../homePage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <script src="jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body> 
        <?php if($_SESSION["accessLevel"] == 3) { ?>
            <div class="checkListTable">
                <table>
                    <tr>
                        <th class="hidden">Patient ID</th>
                        <th>Patient Name</th>
                        <th>Morning Meds</th>
                        <th>Afternoon Meds</th>
                        <th>Night Meds</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                        <th>Submit</th>
                    </tr>
                    <?php for ($i = 0; $i < count($_SESSION["patientList"]); $i++) { ?>
                    <form id="updateList" action="/api/updateCheckList" method="POST">
                        <tr>
                            <td class="hidden">
                                <input value="<?php echo $_SESSION["patientList"][$i]->patientID; ?>" type="text" name="PID">
                            </td>
                            <td><?php echo $_SESSION["patientList"][$i]->patient ?></td>
                            <td>
                                <?php if($_SESSION["patientList"][$i]->morningMeds == 1) { ?>
                                    <select name="mm">
                                        <option value="1">Done</option>
                                        <option value="0">Not Done</option>
                                    </select>
                                <?php } else { ?>
                                <select name="mm">
                                    <option id="yesNo" class="symbol" value="0"><?php echo $_SESSION["patientList"][$i]->morningMeds; ?></option>
                                    <option value="1">Done</option>
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($_SESSION["patientList"][$i]->afternoonMeds == 1) { ?>
                                    <select name="am">
                                        <option value="1">Done</option>
                                        <option value="0">Not Done</option>
                                    </select>
                                <?php } else { ?>
                                <select name="am">
                                    <option id="yesNo" class="symbol" value="0"><?php echo $_SESSION["patientList"][$i]->afternoonMeds; ?></option>
                                    <option value="1">Done</option>
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($_SESSION["patientList"][$i]->nightMeds == 1) { ?>
                                    <select name="nm">
                                        <option value="1">Done</option>
                                        <option value="0">Not Done</option>
                                    </select>
                                <?php } else { ?>
                                <select name="nm">
                                    <option id="yesNo" class="symbol" value="0"><?php echo $_SESSION["patientList"][$i]->nightMeds; ?></option>
                                    <option value="1">Done</option>
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($_SESSION["patientList"][$i]->breakfast == 1) { ?>
                                    <select name="breakfast">
                                        <option value="1">Done</option>
                                        <option value="0">Not Done</option>
                                    </select>
                                <?php } else { ?>
                                <select name="breakfast">
                                    <option id="yesNo" class="symbol" value="0"><?php echo $_SESSION["patientList"][$i]->breakfast; ?></option>
                                    <option value="1">Done</option>
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($_SESSION["patientList"][$i]->lunch == 1) { ?>
                                    <select name="lunch">
                                        <option value="1">Done</option>
                                        <option value="0">Not Done</option>
                                    </select>
                                <?php } else { ?>
                                <select name="lunch">
                                    <option id="yesNo" class="symbol" value="0"><?php echo $_SESSION["patientList"][$i]->lunch; ?></option>
                                    <option value="1">Done</option>
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($_SESSION["patientList"][$i]->dinner == 1) { ?>
                                    <select name="dinner">
                                        <option value="1">Done</option>
                                        <option value="0">Not Done</option>
                                    </select>
                                <?php } else { ?>
                                <select name="dinner">
                                    <option id="yesNo" class="symbol" value="0"><?php echo $_SESSION["patientList"][$i]->dinner ?></option>
                                    <option value="1">Done</option>
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                                <button type="submit">Update</button>
                            </td>
                        </tr>
                    </form>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
        <script src="../homePage.js"></script>
    </body>
</html>