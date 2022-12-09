<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="../homePage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <script src="jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body>
        <form id="logout" action="/api/logout" method="POST">
            <button type="submit">Logout</button>
        </form>

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
        <iframe src="/supervisorhome" class="<?php echo ($al == 5 && $role == "supervisor") ? $show : $hide; ?> homePageIframe" frameBorder="0"></iframe>
        <iframe src="/adminhome" class="<?php echo ($al == 5 && $role == "admin") ? $show : $hide; ?> homePageIframe" frameBorder="0"></iframe>

        <script src="../homePage.js"></script>
    </body>
</html>
