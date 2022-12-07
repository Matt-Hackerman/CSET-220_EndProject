<html>
    <style>
        table{
        border: 1px solid ;
        background-color: lightgray;
        width: 1000px;
        height: 50px;
        margin-left: auto;
        margin-right: auto; 
        }
        input{
        margin-top: 10px;
        margin-left: 10px;
        border: 7px solid blue;
        width: 250px;
        height: 50px;
    }
    button{
    background-color: #2E8B57;
    border-color: black;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    margin-top: 10%;
    width: 100px;
}
.click{
    display: flex;
    gap: 2%;
}
label{
    background-color: blue;
    border-top-right-radius: 10px;
    border-color: black;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin-top: 3%;
    width: 7%;
    
}
.text{
    margin-top: 10%;
}
    </style>
    <header>

    </header>
    <body>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Salary</th>
            </tr>
        </table>
        <div class="text">
        <label for="emp_id">Emp ID</label>
        <input type="text" name="emp_id">
        <br>
        <label for="New_Salary">New Salary</label>
        <input type="text" name="New_Salary">
        </div>
        <div class="click">
        <a href="">
            <button>Ok</button>
        </a>    
        <a href="">
            <button>Cancel</button>
        </a>
    </body>
</html>