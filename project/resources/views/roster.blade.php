<html>
    <style>
    body{
        padding-top: 5%;
    }
    .grid-container {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
    }
    .grid-container>* {
        display: flex;
        justify-content: center;
        align-content: center;
        text-align: center;
        border: 1px solid white;
        padding: 5px;
        padding-bottom: 30px;
        background-color:lightgrey;
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
    </style>
    <body>
    <form class="grid1">
    <h2>Date</h2>
     <input type="date" name="date" value="<?php echo date('Y-m-d');?>">
    </form>
    <div class="grid-container">
        <h3> Supervisor </h3>
        <h3> Doctor </h3>
        <h3> Caregiver1 </h3>
        <h3> Caregiver2 </h3>
        <h3> Caregiver3 </h3>
        <h3> Caregiver4 </h3>
    </div>
    </body>
</html>