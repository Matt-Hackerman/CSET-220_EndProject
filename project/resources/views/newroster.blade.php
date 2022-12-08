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
    {{-- <?php if($_SESSION["accessLevel"] == "5") { ?> --}}
  <body>
    <h1>New Roster</h1>
    <form action="/api/newroster" method="POST">
    <div class="parent">
      <div class="child">
        <div class=button2>Date</div> <input min="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>" name="date" type="date" required>
      </div>
    </div>
    <br>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Supervisor</div>
        <select name="superID" required>
          <?php for($i=0;$i<count($_SESSION['super']);$i++){?>
            <option value="<?php echo $_SESSION['super'][$i]->superID;?>"><?php echo $_SESSION['super'][$i]->name;?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Doctor</div>
        <select name="doctorID" required>
          <?php for($i=0;$i<count($_SESSION['doctor']);$i++){?>
            <option value="<?php echo $_SESSION['doctor'][$i]->doctorID;?>"><?php echo $_SESSION['doctor'][$i]->name;?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Caregiver 1</div>
        <select name="caregiver_1_ID" required>
          <?php for($i=0;$i<count($_SESSION['caregiver']);$i++){?>
            <option value="<?php echo $_SESSION['caregiver'][$i]->caregiverID;?>"><?php echo $_SESSION['caregiver'][$i]->name;?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Caregiver 2</div>
        <select name="caregiver_2_ID" required>
          <?php for($i=0;$i<count($_SESSION['caregiver']);$i++){?>
            <option value="<?php echo $_SESSION['caregiver'][$i]->caregiverID;?>"><?php echo $_SESSION['caregiver'][$i]->name;?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
      <div class=button2>Caregiver 3</div>
      <select name="caregiver_3_ID" required>
        <?php for($i=0;$i<count($_SESSION['caregiver']);$i++){?>
          <option value="<?php echo $_SESSION['caregiver'][$i]->caregiverID;?>"><?php echo $_SESSION['caregiver'][$i]->name;?></option>
        <?php } ?>
      </select>
    </div>
    </div>
    <br>
    <div class="parent" style=display:inline-block>
      <div class="child">
        <div class=button2>Caregiver 4</div>
        <select name="caregiver_4_ID" required>
          <?php for($i=0;$i<count($_SESSION['caregiver']);$i++){?>
            <option value="<?php echo $_SESSION['caregiver'][$i]->caregiverID;?>"><?php echo $_SESSION['caregiver'][$i]->name;?></option>
          <?php } ?>
        </select>
      </div>
      <input type="submit" value="Ok" class="submit">
      <div class="button">Cancel</div>
    </div>
    </form>
  </body>
          {{-- <?php } else { ?>
        <body>
            <h2>Missing Access Level</h1>
        </body>
    <?php } ?> --}}
</html>
