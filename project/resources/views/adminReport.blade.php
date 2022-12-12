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
    <head>
        <link rel="stylesheet" href="../homePage.css">
    </head>
    <?php if($_SESSION["accessLevel"] == "5") { ?>
    <body>
    <div class="grid1">
        <h2>Date</h2>
        <input type="date" name="date" value="<?php echo date('Y-m-d');?>" readonly>
    </div>
    <br>
    <br>
    <table>
        <tr>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Doctor Appointment</th>
            <th>Caregiver Name</th>
            <th>Morning Medicine</th>
            <th>Afternoon Medicine</th>    
            <th>Night Medicine</th>    
            <th>Breakfast</th>    
            <th>Lunch</th>  
            <th>Dinner</th>  
        </tr>
        <?php if(count($_SESSION['adminPatient']) == 0){?>
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
            <td>None</td>
        </tr>
        <?php } else { ?>
            <?php for($i=0;$i<count($_SESSION['adminPatient']);$i++) {?>
            <tr>
                <td><?php echo $_SESSION['adminPatient'][$i]->patName ?></td>
                <td><?php echo $_SESSION['adminPatient'][$i]->docName ?></td>
                <td><?php if($_SESSION['adminPatient'][$i]->doctorAppoint == 1) {echo "Done";}else{ echo "Not Done";} ?></td>
                <td><?php echo $_SESSION['adminPatient'][$i]->careName ?></td>
                <td><?php if($_SESSION['adminPatient'][$i]->morningMeds == 1) {echo "Done";}else{ echo "Not Done";} ?></td>
                <td><?php if($_SESSION['adminPatient'][$i]->afternoonMeds == 1) {echo "Done";}else{ echo "Not Done";} ?></td>
                <td><?php if($_SESSION['adminPatient'][$i]->nightMeds == 1) {echo "Done";}else{ echo "Not Done";} ?></td>
                <td><?php if($_SESSION['adminPatient'][$i]->breakfast == 1) {echo "Done";}else{ echo "Not Done";} ?></td>
                <td><?php if($_SESSION['adminPatient'][$i]->lunch == 1) {echo "Done";}else{ echo "Not Done";} ?></td>
                <td><?php if($_SESSION['adminPatient'][$i]->dinner == 1) {echo "Done";}else{ echo "Not Done";} ?></td>
            </tr>
            <?php } ?>
        <?php }?>

        
      </table>
      <script src="../homePage.js"></script>
    </body>
          <?php } else { ?>
        <body>
            <h2>Missing Access Level</h1>
        </body>
    <?php } ?>
</html>