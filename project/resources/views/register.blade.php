<?php
use App\Http\Controllers\registercontroller;
?>
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
.othertest{
    visibility:hidden
}
</style>
    <body>
<h1>
    Register
</h1>
<div class="parent">
  <div class="child">
    <div class=button2>Role</div> <select id=sel onchange="myFunction()">
    <option name="Admin" value="Admin">Admin</option>
    <option name="Supervisor" value="Supervisor">Supervisor</option>
    <option name="Doctor" value="Doctor">Doctor</option>
    <option name="Caregiver" value="Caregiver">Caregiver</option>
    <option name="Patient" value="Patient">Patient</option>
    </select>
  </div>
  <div class="child">
  <div class=button2>Date of Birth</div> <input></input>
  </div>
</div>
<p><br></p>
<div class="parent">
  <div class="child">
  <div class=button2>First Name</div> <input></input>
  </div>
  <div class="child">
    <div class=othertest id=patientonly><div class=button2>Family Code (For Patient Family Member) </div><input></input></div>
  </div>
</div>
<p><br></p>
<div class="parent">
  <div class="child">
    <div class=button2>Last Name</div> <input></input>
  </div>
  <div class="child">
  <div class=othertest id=patientonly2><div class=button2>Emergency Contact</div> <input></input></div>
  </div>
</div>
<p><br></p>
<div class="parent">
  <div class="child">
  <div class=button2>Email ID </div><input></input>
  </div>
  <div class="child">
  <div class=othertest id=patientonly3><div class=button2>Relation to Emergency Contact</div> <input></input></div>
  </div>
</div>
<p><br></p>
<div class="parent">
  <div class="child">
  <div class=button2>Phone</div> <input></input>
  </div>
</div>
<p><br></p>
<div class="parent" style=display:inline-block>
  <div class="child">
  <div class=button2>Password</div> <input></input>
  </div>
  <div class="button" onclick="registration()">
Ok
</div>
<div class="button">
Cancel
</div>
</div>
</body>
<script>
function myFunction() {
    var x = document.getElementById("sel").value;
    if (x == "Patient") {document.getElementById("patientonly").style.visibility = "visible";
    document.getElementById("patientonly2").style.visibility = "visible";
    document.getElementById("patientonly3").style.visibility = "visible";}
    else{
        document.getElementById("patientonly").style.visibility = "hidden";
    document.getElementById("patientonly2").style.visibility = "hidden";
    document.getElementById("patientonly3").style.visibility = "hidden";
    }
}
    </script>
</html>