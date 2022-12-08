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