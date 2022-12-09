<html>
<?php if($_SESSION["roles"] == "admin") { ?>
<body>
    <form action="/api/role" method="POST">
    <div class="text">
        <div>
            <label for="emp_id">Role</label>
            <input id="role" type="text" name="role">
        </div>
        <div>
            <label for="New_Salary">Accesss Level</label>
            <select id="access" type="text" name="accessLevel">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>
    <table>
        <tr>
            <th>Role</th>
            <th>Access Level</th>
        </tr>
        <?php for($i=0;$i<count($_SESSION['roles']);$i++){ ?>
        <tr>
            <td><?php echo $_SESSION['roles'][$i]->role ?></td>
            <td><?php echo $_SESSION['roles'][$i]->accessLevel ?></td>
        </tr>
        <?php } ?>
    </table>
    <div class="grid2">
        <div class="click">
            <input value="Ok" class="submit" type="submit">  
            <a href="">
                <button>Cancel</button>
            </a>
        </div>
    </div>
    </form>

</body>
    <?php } else { ?>
        <body>
            <h2>Missing Access Level</h1>
        </body>
    <?php } ?>
</html> 
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