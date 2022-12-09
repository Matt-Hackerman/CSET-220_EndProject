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
    .hidden {
        display: none;
    }
    </style>
    <?php if($_SESSION["accessLevel"] > 2) { ?>
    <body>
    <?php $test = $_SESSION['patientSearch'] ?>
    <div class="grid1">
    </div>
        <input id="search" type="text" placeholder="Search">
        <br>
        <br>
        <table>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Emergency Contact</th>
                <th>Emergency Contact Name</th>
                <th>Admission Date</th>    
            </tr>
            <?php if(count($_SESSION['patientSearch']) == 0){?>
            <tr>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
            </tr>
            <?php } else { ?>
                <?php for($i=0;$i<count($_SESSION['patientSearch']);$i++) {?>
                <tr class="info">
                    <td><?php echo $_SESSION['patientSearch'][$i]->patientID ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->name ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->age ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->emergencyContact ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->contactRelationship ?></td>
                    <td><?php echo $_SESSION['patientSearch'][$i]->admissionDate ?></td>
                </tr>
                <?php } ?>
            <?php }?>
        </table>
    </body>
    <script>
        search = document.getElementById('search');
        var test = JSON.parse('<?php echo json_encode($test) ?>');
        rows = document.querySelectorAll(".info");
        search.addEventListener("input", e => {
            const value = e.target.value;
            for(x=0;x<test.length;x++){
                const vis = test[x].name.toLowerCase().includes(value.toLowerCase()) || test[x].patientID.toLowerCase().includes(value.toLowerCase());
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
            <h2>Missing Access Level</h1>
        </body>
    <?php } ?>
</html>