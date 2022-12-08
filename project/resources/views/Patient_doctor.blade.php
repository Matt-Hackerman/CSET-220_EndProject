<html>
    <style>
        table{
        border: 1px solid ;
        background-color: lightgray;
        width: 1000px;
        height: 50px; 
        margin-top: 20px;
        margin-bottom: 50px;
        }
        .click{
        display: flex;
        text-align: center;
        align-items: center;
        gap: 5%;
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
        h4{
        background-color: blue;
        border-top-right-radius: 10px;
        border-color: black;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin-top: 3%;
        width: 10%;
        }
    </style>
    <body>
        <table>
            <th>Date</th>
            <th>Comment</th>
            <th>Morning Meds</th>
            <th>Afternoon Meds</th>
            <th>Night Meds</th>
        </table>
        <h4>New Prescription</h4>
        <table>
            <th>Comment</th>
            <th>Morning Meds</th>
            <th>Afternoon Meds</th>
            <th>Night Meds</th>
        </table>
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
    </body>
</html>