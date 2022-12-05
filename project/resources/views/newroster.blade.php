<html>
  <style>
    text{
        font-family:Calibri;
    }
    .parent {
        width: 100%;
    }
    .child {
        float: left;
        width: 50%;
    }  
    .button{
        background-color: #2E8B57;
      padding: 15px 32px;
      text-align: center;
      display: inline-block;
      margin: 4px 2px;
      cursor:pointer;
    color:white;
    }
    .button2{
    border-radius: 0% 8% 0% 0%;
        background-color: #008CBA;
      padding: 7px 16px;
      text-align: center;
      display: inline-block;
      margin: 4px 2px;
      color:white;
    }
    input{
        height:32px;  
    }
  </style>
  <body>
    <h1>New Roster</h1>
    <div class="parent">
      <div class="child">
        <div class=button2>Date</div> <input>
      </div>
    </div>
    <br>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Supervisor</div>
        <select></select>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Doctor</div>
        <select></select>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Caregiver 1</div>
        <select></select>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Caregiver 2</div>
        <select></select>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
      <div class=button2>Caregiver 3</div>
      <select></select>
    </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Caregiver 4</div>
        <select></select>
      </div>
      <div class="button">Ok</div>
      <div class="button">Cancel</div>
    </div>
  </body>
</html>
