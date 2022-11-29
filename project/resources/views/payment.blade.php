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
    <h1>
    Payment
</h1>
<div class="parent" style=display:inline-block>
  <div class="child">
    <div class=button2>Patient ID</div> <input></input>
  </div>
</div>
<p><br></p>
<div class="parent" style=display:inline-block>
  <div class="child">
  <div class=button2>Total Due</div> <input></input>
  </div>
</div>
<p><br></p>
<div class="parent" style=display:inline-block>
  <div class="child">
  <div class=button2>New Payment</div> <input></input>
  </div>
</div>
<div class="parent" style=display:inline-block;text-align:center>
  <div class="button">
Ok
</div>
<div class="button">
Cancel
</div>
</div>
<div class="parent" style=display:inline-block;text-align:center>
<div class="button">
Update
</div>
</div>
</body>
</html>
