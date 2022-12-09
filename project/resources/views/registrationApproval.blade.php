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
    <head>

    </head>
    <?php if($_SESSION["accessLevel"] == "5") { ?>
    <body>
        <?php print_r($_SESSION['approval']) ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Approval</th>
                <th>Submit</th>
            </tr>
                <?php for($i=0;$i<count($_SESSION['approval']);$i++){ ?>
                    <form action="/api/registrationApproval" method="POST">
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['approval'][$i]->ID ?>">
                    <tr>
                        <td><?php echo $_SESSION['approval'][$i]->name ?></td>
                        <td><?php echo $_SESSION['approval'][$i]->role ?></td>
                        <td> <div> Yes<input value="Approved" name="approval" type="radio"> </div> <div>No<input value="Denied" name="approval" type="radio"></div></td>
                        <td><input class="submit" type="submit"></td>
                    </tr>
                </form>
                <?php } ?>
        </table>
    </body>
    <?php } else { ?>
        <body>
            <h2>Missing Access Level</h1>
        </body>
    <?php } ?>
</html>