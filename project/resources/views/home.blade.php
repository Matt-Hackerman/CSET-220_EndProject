<?php
    if(!isset($_SESSION)) {
        session_start();
    } 
?>
<html>
    
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="../homePage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <script src="jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body>
        <header class="header">
            <ul>
                <li><a href="/home">Home</a></li>
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/additionalPatient">Additional Patients</a></li><?php } ?>
                <?php if($_SESSION['accessLevel'] > 2) {?><li><a href="/patientSearch">Patients</a></li><?php } ?>
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/emp_search">Employees</a></li><?php } ?>
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/registrationApproval">Approval</a></li><?php } ?>
                <?php if($_SESSION['accessLevel'] == 5) {?><li><a href="/newroster">newRoster</a></li><?php } ?>
                <li><a href="/roster">Roster</a></li>
                <?php if($_SESSION['role'] == "admin") {?><li><a href="/payment">Payment</a></li><?php } ?>
                <form id="logout" action="/api/logout" method="POST">
                    <button type="submit">Logout</button>
               </form>
            </ul>
        </header>
        <form id="logout" action="/api/logout" method="POST"></form>

        <h1><?php echo $_SESSION["currentUser"]; ?></h1>
        <h1><?php echo $_SESSION["userID"]; ?></h1>

        <?php 
            $al = $_SESSION["accessLevel"];
            $role = $_SESSION["role"];
            $hide = "hidden";
            $show = "show";
        ?>

        <iframe src="/patientFMhome" class="<?php echo ($al == 1) ? $show : $hide; ?> homePageIframe" frameBorder="0"></iframe>
        <iframe src="/patienthome" class="<?php echo ($al == 2) ? $show : $hide; ?> homePageIframe" frameBorder="0"></iframe>
        <iframe src="/caregiverhome" class="<?php echo ($al == 3) ? $show : $hide; ?> homePageIframe" frameBorder="0"></iframe>
        <iframe src="/doctorhome" class="<?php echo ($al == 4) ? $show : $hide; ?> homePageIframe" frameBorder="0"></iframe>
        <iframe src="/adminReport" class="<?php echo ($al == 5 ) ? $show : $hide; ?> homePageIframe" frameBorder="0"></iframe>


        <script src="../homePage.js"></script>
    </body>
</html>
