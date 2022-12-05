<html>
    <style>
    body{
        padding-top: 5%;
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
    table {
    border: 1px solid ;
    background-color: lightgray;
    width: 1000px;
    height: 50px;
    margin-left: auto;
    margin-right: auto; 
}
    </style>
    <body>
    <form class="grid1">
    <h2>Date</h2>
     <input type="date" name="date" value="<?php echo date('Y-m-d');?>">
    </form>
   
    <table>
        <tr>
          <th>Supervisor</th>
          <th>Doctor</th>
          <th>Caregiver1</th>
          <th>Caregiver2</th>
          <th>Caregiver3</th>
          <th>Caregiver4</th>    
        </tr>
        
      </table>
    </body>

</html>