<?php
use App\Http\Controllers\registerapprovalAPI;
?>
<html>
<style>
  * {
    padding:0;
    margin:0;
    box-sizing: border-box;
  }
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
    padding: 7px 64px;
    text-align: left;
    display: inline-block;
    margin: 4px 2px;
    color:white;
  }
  .push{
    border-radius: 0% 8% 0% 0%;
    padding: 7px 32px;
    text-align: left;
    display: inline-block;
    margin: 4px 2px;
    color:white;
  }
  .push2{
    border-radius: 0% 8% 0% 0%;
    padding: 7px 16px;
    text-align: left;
    display: inline-block;
    margin: 4px 2px;
    color:white;
  }
  .submit {
    background-color: #2E8B57;
    height: 50px;
    width: 100px;
    cursor:pointer;
    color:white;
    border-style: none;
  }
  input{
    height:32px;  
  }
</style>
<head>
</head>
<body>
  <h1>Registration Approval</h1>
  <br>
  <br>
  <form action="/api/registerapproval" method="POST">
  <div class="parent">
    <div class="child" style=width:100%>
        <div style=display:inline-block><div class=button2>Name</div><br><div style=text-align:center id=thename>
            <?php
                foreach($_SESSION['admin'] as $x)
                  echo " ", implode(json_decode(json_encode($x), true)), "<br>";
                ?>
        </div>
        <div style=text-align:center id=thename>
          <?php
              foreach($_SESSION['doctor'] as $x)
                echo " ", implode(json_decode(json_encode($x), true)), "<br>";
              ?>
      </div>
      <div style=text-align:center id=thename>
        <?php
            foreach($_SESSION['patient'] as $x)
              echo " ", implode(json_decode(json_encode($x), true)), "<br>";
            ?>
    </div>
    <div style=text-align:center id=thename>
      <?php
          foreach($_SESSION['patientfm'] as $x)
            echo " ", implode(json_decode(json_encode($x), true)), "<br>";
          ?>
  </div>
  <div style=text-align:center id=thename>
    <?php
        foreach($_SESSION['caregiver'] as $x)
          echo " ", implode(json_decode(json_encode($x), true)), "<br>";
        ?>
</div>
<div style=text-align:center id=thename>
  <?php
      foreach($_SESSION['supervisor'] as $x)
        echo " ", implode(json_decode(json_encode($x), true)), "<br>";
      ?>
</div></div>
<div style=display:inline-block><div class=button2>ID</div><br><div style=text-align:center id=thename>
  <?php
      foreach($_SESSION['adminID'] as $x)
        echo " ", implode(json_decode(json_encode($x), true)), "<br>";
      ?>
</div>
<div style=text-align:center id=thename>
<?php
    foreach($_SESSION['doctorID'] as $x)
      echo " ", implode(json_decode(json_encode($x), true)), "<br>";
    ?>
</div>
<div style=text-align:center id=thename>
<?php
  foreach($_SESSION['patientID'] as $x)
    echo " ", implode(json_decode(json_encode($x), true)), "<br>";
  ?>
</div>
<div style=text-align:center id=thename>
<?php
foreach($_SESSION['patientfmID'] as $x)
  echo " ", implode(json_decode(json_encode($x), true)), "<br>";
?>
</div>
<div style=text-align:center id=thename>
<?php
foreach($_SESSION['caregiverID'] as $x)
echo " ", implode(json_decode(json_encode($x), true)), "<br>";
?>
</div>
<div style=text-align:center id=thename>
<?php
foreach($_SESSION['supervisorID'] as $x)
echo " ", implode(json_decode(json_encode($x), true)), "<br>";
?>
</div></div>
      <div style=display:inline-block><div class=button2>Role</div><br><div style=text-align:center id=theroleadmin>
        @foreach($_SESSION['adminID'] as $x)
          <label>Admin</label><br>
          @endforeach
      </div>
<div style=text-align:center id=theroledoctor>
        <?php
        $h=implode(json_decode(json_encode($x), true));
foreach($_SESSION['doctor'] as $x)
          echo " ", "Doctor</input>", "<br>";
        ?>
      </div>
<div style=text-align:center id=therolepatient>
        <?php
                $h=implode(json_decode(json_encode($x), true));
        foreach($_SESSION['patient'] as $x)
          echo " ", "Patient</input>", "<br>";
        ?>
      </div>
<div style=text-align:center id=therolepatientfm>
        <?php
                $h=implode(json_decode(json_encode($x), true));
        foreach($_SESSION['patientfm'] as $x)
          echo " ", "Patient Family Member</input>", "<br>";
        ?>
      </div>
<div style=text-align:center id=therolecaregiver>
        <?php
                $h=implode(json_decode(json_encode($x), true));
        foreach($_SESSION['caregiver'] as $x)
          echo " ", "Caregiver</input>", "<br>";
        ?>
      </div>
<div style=text-align:center id=therolesupervisor>
        <?php
                $h=implode(json_decode(json_encode($x), true));
        foreach($_SESSION['supervisor'] as $x)
          echo " ", "Supervisor</input>", "<br>";
        ?>
      </div>
    </div>
    <input name=theirid placeholder="Insert ID"></input>
    <div class=push></div>
    <input type=checkbox name=Yes></input>
    <label for=Yes>Yes</input>
      <div class=push2></div>
      <input type=checkbox name=No></input>
    <label for=No>No</input>
  </div>
    <div class="parent">
        <div class="child" style=float:right>
            <input type=submit class="button" value=Ok>
            <input type=button class=button value=Cancel onclick=location.href="newroster">
        </div>
    </div>  
</form>
</body>
 
</html>
 
