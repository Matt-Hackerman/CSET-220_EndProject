<html>
    <style>
        * {
            padding:0;
            margin:0;
            box-sizing: border-box;
        }
        text{
            font-family:Calibri;
        }
        .parent {
            width: 100%;
        }
        .child {
            float: left;
            width: 50%;
        }  
        .button{
            background-color: #2E8B57;
            padding: 15px 32px;
            text-align: center;
            display: inline-block;
            margin: 4px 2px;
            cursor:pointer;
            color:white;
        }
        .button2{
            border-radius: 0% 8% 0% 0%;
            background-color: #008CBA;
            padding: 7px 16px;
            text-align: center;
            display: inline-block;
            margin: 4px 2px;
            color:white;
        }

        .submit {
            background-color: #2E8B57;
            height: 50px;
            width: 100px;
            cursor:pointer;
            color:white;
            border-style: none;
        }
        input{
            height:32px;  
        }
    </style>
    <head>
    </head>
    <body>
        <?php $test = $_SESSION['addPatients'] ?>
        <h1>Additional Patient Info</h1>
        <form action="/api/additionalPatient" method="POST">
            @csrf
            <div class="parent">
            <div class="child">
                <div class=button2>Patient ID</div>
                <input name="patientID" id="patID" type="text" required>
            </div>  
            <div class="child">
                <div class=button2>Patient Name</div>
                <input id="name" readonly>
            </div>
            </div>
            <br>
            <br>
            <div class="parent" style=display:inline-block>
            <div class="child">
                <div class=button2>Group</div>
                <input type="text" name="groups">
            </div>
            </div>
            <br>
            <div class="parent" style=display:inline-block>
            <div class="child">
                <div class=button2>Admission Date</div>
                <input name="admissionDate" type="date" value="<?php echo date('Y-m-d') ?>">
            </div>
            </div>
            <br>
            <div class="parent" style=display:inline-block;width:61%;text-align:right>
            <input type="submit" value="Ok" class="submit">
            <button type="submit" class="submit">Cancel</button>
            </div>
        </form>
    </body>
    <script>
        patientID = document.getElementById("patID");
        
        patientID.addEventListener("input", e => {
            const value = e.target.value;
            var test = JSON.parse('<?php echo json_encode($test) ?>');
            for(x=0;x<test.length;x++){
                if(value.toLowerCase() == test[x].patientID.toLowerCase()){
                    document.getElementById("name").value = test[x].name;
                break;
                }
                else{
                    document.getElementById("name").value = "";
                }
            }
        });
    </script>
</html>