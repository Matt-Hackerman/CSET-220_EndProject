<html>
    <style>
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
    input{
        margin-top: 10px;
        margin-left: 10px;
        border: 7px solid blue;
        width: 250px;
        height: 50px;
    }
    table{
        border: 1px solid ;
        background-color: lightgray;
        width: 1000px;
        height: 50px;
        margin-left: auto;
        margin-right: auto; 
        margin-top: 20px;
        }
    .name{
        margin-left: 10%;
    }
    th{
        border: 1px solid white;
        width: 100px;
    }
    
    </style>
    <body>
        <div>
            <label for="id" class="id" >
                Patient Id
            </label>
            <input type="text" name="id" />
            <label for="name" class="name" >
                Patient Name
            </label>
            <input type="text" name="name" />
            <br>
            <label for="date" class="date" >
                Date
            </label>
            <input type="text" name="date" />
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