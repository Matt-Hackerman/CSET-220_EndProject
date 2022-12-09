<html>
    <head>
        <title>Patient Home</title>
        <link rel="stylesheet" href="../homePage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <script src="jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body> 
        <?php if($_SESSION["accessLevel"] == 4) { ?>
            <div class="checkListTable">
                <h1>Previous Appointments</h1>
                <table>
                    <tr>
                        <th>Patient</th>
                        <th>Date</th>
                        <th>Comment</th>
                        <th>Morning Med</th>
                        <th>Afternoon Med</th>
                        <th>Night Med</th>
                    </tr>
                    <?php if (count($_SESSION["oldAppointments"]) == 0) { ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php } else { ?>
                        <?php for ($i = 0; $i < count($_SESSION["oldAppointments"]); $i++) { ?>
                            <tr>
                                <td><?php echo $_SESSION["oldAppointments"][$i]->name ?></td>
                                <td><?php echo $_SESSION["oldAppointments"][$i]->appointmentDate ?></td>
                                <td><?php echo $_SESSION["oldAppointments"][$i]->comment ?></td>
                                <td><?php echo $_SESSION["oldAppointments"][$i]->morningMed ?></td>
                                <td><?php echo $_SESSION["oldAppointments"][$i]->afternoonMed ?></td>
                                <td><?php echo $_SESSION["oldAppointments"][$i]->nightMed ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>

            <div>Date: <?php echo date("Y-m-d"); ?></div><br>

            <div class="checkListTable">
                <h1>Appointments</h1>
                <table>
                    <tr>
                        <th>Patient</th>
                        <th>Date</th>
                    </tr>
                    <?php if (count($_SESSION["appointments"]) == 0) { ?>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php } else { ?>
                        <?php for ($i = 0; $i < count($_SESSION["appointments"]); $i++) { ?>
                            <tr>
                                <td><?php echo $_SESSION["appointments"][$i]->name ?></td>
                                <td><?php echo $_SESSION["appointments"][$i]->appointmentDate ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
        <script src="../homePage.js"></script>
    </body>
</html>