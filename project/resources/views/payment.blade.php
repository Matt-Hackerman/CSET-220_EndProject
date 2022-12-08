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
    .submit {
      background-color: #2E8B57;
      height: 50px;
      width: 100px;
      cursor:pointer;
      color:white;
      border-style: none;
    }
  </style>
    {{-- <?php if($_SESSION["role"] == "admin") { ?> --}}
  <body>
    <?php $payment = $_SESSION['payment'] ?>
    <?php $doctorAppointments = $_SESSION['doctorAppointments'] ?>
    <?php $pre = $_SESSION['prescription'] ?>
    <h1>Payment</h1>
    <form action="/api/payment" method="POST">
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Patient ID</div>
        <input name="patientID" type="text" id="patID" required>
        <input type="hidden" id="today" value="<?php echo date("Y-m-d") ?>">
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Total Due</div>
        <input name="totalDue" id="total" readonly>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>New Payment</div>
        <input name="newPayment" id="new" type="number" required>
      </div>
    </div>
    <div class="parent" style=display:inline-block;text-align:center>
      <input type="submit" value="Ok" class="submit">
      <div class="button">Cancel</div>
    </form>
    </div>
    <div class="parent" style=display:inline-block;text-align:center>
      <button class="submit" onclick="payment()">Update</button>
    </div>
  </body>
  <script>
    var pay = JSON.parse('<?php echo json_encode($payment) ?>');
    var doc = JSON.parse('<?php echo json_encode($doctorAppointments) ?>');
    var pre = JSON.parse('<?php echo json_encode($pre) ?>');
    function payment(){
      console.log(pay);
      total = 0;
      dr = 0;
      preDate = " ";
      prescriptions = 0;
      patID = document.getElementById("patID").value;
      today = document.getElementById("today").value;
      last = " ";
      due = 0;
      

      for(x=0;x<pay.length;x++){
        if(patID == pay[x].patientID){
          if(last == " " || pay[x].date > last){
            last = pay[x].date;
            due = pay[x].payment;
          }
        }
      }
      for(i=0;i<doc.length;i++){
        if(patID == doc[i].patientID){
          if(today > doc[i].appointmentDate && doc[i].appointmentDate > last){
            dr += 1;
          }
        }
      }
      for(y=0;y<pre.length;y++){
        if(patID == pre[y].patientID){
          if(pre[y].date == " " || pre[y].date > preDate){
            preDate = pre[y].date;
          }
        }
      }
      for(z=0;z<pre.length;z++){
        if(patID == pre[z].patientID && preDate == pre[z].date){
          if(pre[z].morningMed != null){
            prescriptions += 1;
          }
          if(pre[z].afternoonMed != null){
            prescriptions += 1;
          }
          if(pre[z].nightMed != null){
            prescriptions += 1;
          }
        }
      }
      today = new Date(today);
      last = new Date(last);
      days = (today.getTime()-last.getTime()) / (1000 * 3600 * 24);
      months = (today.getMonth()-last.getMonth());
      total += days*10;
      total += dr*50;
      total += prescriptions*5*months;
      total += due;
      document.getElementById("total").value = total;
      document.getElementById("new").max = total;
    }
    
  </script>
            {{-- <?php } else { ?>
        <body>
            <h2>Missing Access Level</h1>
        </body>
    <?php } ?> --}}
</html>
