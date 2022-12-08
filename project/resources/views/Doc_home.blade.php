<html>
    <style>
        table{
        border: 1px solid ;
        background-color: lightgray;
        width: 1000px;
        height: 50px; 
        margin-top: 20px;
        }
        .second{
         border: 1px solid ;
        background-color: lightgray;
        width: 150px;
        height: 50px; 
        margin-top: 75px;
        }
        button{
        background-color: #2E8B57;
        border-color: black;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        width: 150px;
        margin-left: 20px;
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
        width: 150px;
        }
        .grid{
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
        margin-top: 75px;
        }
    </style>
    <body>
        <table>
            <th>Name</th>
            <th>Date</th>
            <th>Comment</th>
            <th>Morning Meds</th>
            <th>Afternoon Meds</th>
            <th>Night Meds</th>
        </table>
        <div class="grid">
        <label for="Appointment">Appointment</label>
        <input type="text" name="Appointment">
       <div class="click">
        <a href="">
        <button>Submit</button>
         </a>
    </div>
    </div> 
    <table class="second">
        <th>Patient</th>
        <th>Date</th>
    </table>
    </body>
</html>