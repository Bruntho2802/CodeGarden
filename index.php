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
        <div class="container-fluid">

        <div class="search">
                <a href="search.php" class="ShareUpload" alt="SEARCH">
                    <i>S</i>
                    <i>E</i>
                    <i>A</i>
                    <i>R</i>
                    <i>C</i>
                    <i>H</i>
                </a>
            </div>
            <div class="search">
                <a href="Upload.php" class="ShareUpload" alt="UPLOAD">
                    <i>U</i>
                    <i>P</i>
                    <i>L</i>
                    <i>O</i>
                    <i>A</i>
                    <i>D</i>
                </a>
            </div>

            <div class="search">
                <a href="share.php" class="ShareUpload" alt="SHARE">
                    <i>S</i>
                    <i>H</i>
                    <i>A</i>
                    <i>R</i>
                    <i>E</i>
                </a>
            </div>
        </div>


        <!-- contactlink -->
        <?php include("contactlink.php"); ?>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>