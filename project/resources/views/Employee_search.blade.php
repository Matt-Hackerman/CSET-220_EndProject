<html>
    <style>
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
        input{
            margin-left: 10px;
            border: 7px solid blue;
            width: 250px;
            height: 50px;
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
    <?php if($_SESSION["accessLevel"] == "5") { ?>
    <body>
        <?php $test = $_SESSION['employeeSearch'] ?>
        <form action="/api/emp_search" method="POST">
        <div class="text">
            <div>
                <label for="emp_id">Emp ID</label>
                <input id="search" type="text" name="empID">
            </div>
            <?php if($_SESSION["role"] == "admin") { ?>

            <div>
                <label for="New_Salary">New Salary</label>
                <select type="text" name="newSalary">
                    <option value="1">60000</option>
                    <option value="2">80000</option>
                    <option value="3">100000</option>
                    <option value="4">120000</option>
                </select>
            </div>
            <?php } ?>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Salary</th>
            </tr>
            <?php for($x=0;$x<count($_SESSION['employeeSearch']);$x++){?>
            <tr class="info">
                <td><?php echo $_SESSION['employeeSearch'][$x]->ID?></td>
                <td><?php echo $_SESSION['employeeSearch'][$x]->name?></td>
                <td><?php echo $_SESSION['employeeSearch'][$x]->role?></td>
                <td><?php echo $_SESSION['employeeSearch'][$x]->salary?></td>
            </tr>
            <?php } ?>
        </table>
        <div class="click">
            <?php if($_SESSION["role"] == "admin") { ?>
                <input value="Ok" class="submit" type="submit">  
            <?php } ?>
            <a href="">
                <button>Cancel</button>
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
            <h2>Missing Access Level</h1>
        </body>
    <?php } ?>
</html>