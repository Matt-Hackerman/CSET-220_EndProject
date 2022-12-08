<html>
    <head>
        <title>Patient Home</title>
        <link rel="stylesheet" href="../homePage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <script src="jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body> 
        <?php if($_SESSION["accessLevel"] == 5) { ?>
            
        <?php } ?>
        <script src="../homePage.js"></script>
    </body>
</html>