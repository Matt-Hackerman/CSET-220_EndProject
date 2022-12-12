<?php
use App\Http\Controllers\registercontrollerAPI;
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
  padding: 22px 48px;
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
.button3{
    background-color: #2E8B57;
  padding: 22px 48px;
  text-align: center;
  display: inline-block;
  margin: 4px 2px;
  cursor:pointer;
color:white;
 
}
input{
    height:32px;  
}
.othertest{
    visibility:hidden
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
    <body>
<h1>
    Register
</h1>
<form action="/api/registercontroller" method="POST">
<div class="parent">
  <div class="child">
    <div class=button2>Role</div> <select id=sel name=sel onchange="myFunction()">
    <option name="Admin" value="Admin">Admin</option>
    <option name="PatientFM" value="PatientFM">Patient Family Member</option>
    <option name="Supervisor" value="Supervisor">Supervisor</option>
    <option name="Doctor" value="Doctor">Doctor</option>
    <option name="Caregiver" value="Caregiver">Caregiver</option>
    <option name="Patient" value="Patient">Patient</option>
    </select>
  </div>
  <div class="child">
  <div class=button2>Date of Birth</div> <input name="DOB" type="date">
  </div>
</div>
<p><br></p>
<div class="parent">
  <div class="child">
  <div class=button2>First Name</div> <input type="f_name" name="f_name">
  </div>
  <div class="child">
    <div class=othertest id=patientonly><div class=button2>Family Code (For Patient Family Member) </div><input name="familyCode" type="text"></div>
  </div>
</div>
<p><br></p>
<div class="parent">
  <div class="child">
    <div class=button2>Last Name</div> <input type="text" name="l_name">
  </div>
  <div class="child">
  <div class=othertest id=patientonly2><div class=button2>Emergency Contact</div> <input name="emergencyContact"></div>
  </div>
</div>
<p><br></p>
<div class="parent">
  <div class="child">
  <div class=button2>Email</div><input type="email" name="email">
  </div>
  <div class="child">
  <div class=othertest id=patientonly3><div class=button2>Relation to Emergency Contact</div> <input name="contactRelationship" type="text"></div>
  </div>
</div>
<p><br></p>
<div class="parent">
  <div class="child">
  <div class=button2>Phone</div> <input type="text" name="phone">
  </div>
</div>
<p><br></p>
<div class="parent" style=display:inline-block>
  <div class="child">
  <div class=button2>Password</div> <input type="password" name="password">
  </div>
  <input type=submit class="submit" value=Ok>
  <a href="/"><button type="button" class="submit">Cancel</button></a>
</div>
</form>
<script src="../homePage.js"></script>
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
    document.getElementById("patientonly3").style.visibility = "hidden";}}
</script>