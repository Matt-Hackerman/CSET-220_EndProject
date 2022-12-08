<html>
    <style>
         table{
        border: 1px solid ;
        background-color: lightgray;
        width: 1200px;
        height: 50px; 
        margin-top: 20px;
        margin-bottom: 50px;
        }
        .click{
        display: flex;
        text-align: center;
        align-items: center;
        gap: 3%;
        }
        button{
        background-color: #2E8B57;
        border-color: black;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        margin-top: 50px;
        width: 100px;
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
        width: 15%;
        }  
        input{
        margin-top: 10px;
        margin-left: 10px;
        border: 7px solid blue;
        width: 200px;
        height: 50px;
        }
    </style>
    <body>
        <div class="grid">
            <label for="date">Date</label>
            <input type="text" name="date">
            <label for="Code">Family code (For Patient Family Member)</label>
            <input type="text" name="Code">
            <label for="ID">Family ID (For Patient Family Member)</label>
            <input type="text" name="ID">
        </div>
        <div class="click">
            <div class="ok">
                <a href="">
                    <button>Ok</button>
                </a>
            </div>
            <div class="cancel">
                <a href="">
                    <button>Cancel</button>
                </a>
            </div>
            </div>
            <table>
                <tr>
                    <th>Doctor's Name</th>
                    <th>Doctor's Appointment</th>
                    <th>Caregiver's Name</th>
                    <th>Morning Meds</th>
                    <th>Afternoon Meds</th>
                    <th>Night Meds</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>
                </table>    
    </body>
</html>