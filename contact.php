<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link class="img-fluid rounded-circle" rel="shortcut icon" type="logo/png" href="pictures/codegarden_logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>CodeGarden</title>
</head>

<body>
<?php
    // start the session
    session_start();

    // check if the user is logged in
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    } else {
        // user is not logged in, redirect to login.php
        echo "You are not logged in. Redirecting to login page...";
        header("Location: login.php");
        exit;
    }
    ?>
    <!-- NAVBAR -->
    <?php include("navbar.php"); ?>
    <div class="body2">
        <!-- LOGO IMG -->
        <div class="container">
            <img src="pictures/codegardensmall.png" class="rounded mx-auto d-block img-fluid" style="width:500px; height: auto; margin-top: 80px; margin-bottom: 80px;" alt="fulllogo">
        </div>

        <!-- Search Upload Share -->
        <div class="container-fluid" style="margin-bottom: 25px">
            <h3 class="recent"> Contact </h3>
            <div class="search">
                <a class="ShareUpload" href="mailto:169357@student.horizoncollege.nl" target="_blank" alt="CODEGRADENSERVICE@GMAIL.COM">
                    <i>C</i>
                    <i>O</i>
                    <i>D</i>
                    <i>E</i>
                    <i>G</i>
                    <i>A</i>
                    <i>R</i>
                    <i>D</i>
                    <i>E</i>
                    <i>N</i>
                    <i>S</i>
                    <i>E</i>
                    <i>R</i>
                    <i>V</i>
                    <i>I</i>
                    <i>C</i>
                    <i>E</i>
                    <i>@</i>
                    <i>G</i>
                    <i>M</i>
                    <i>A</i>
                    <i>I</i>
                    <i>L</i>
                    <i>.</i>
                    <i>C</i>
                    <i>O</i>
                    <i>M</i>
                </a>
            </div>
            <div class="search">
                <a class="ShareUpload" href="tel:0618920693" style="font-weight: bold;" alt="06 12 34 56 78">
                    <i>0</i>
                    <i>6</i>
                    <i>&nbsp;</i>
                    <i>1</i>
                    <i>2</i>
                    <i>&nbsp;</i>
                    <i>3</i>
                    <i>4</i>
                    <i>&nbsp;</i>
                    <i>5</i>
                    <i>6</i>
                    <i>&nbsp;</i>
                    <i>7</i>
                    <i>8</i>
                </a>
            </div>
        </div><br>
    <br>
    </div>
    
    <?php include("footer.php"); ?>
</body>

</html>