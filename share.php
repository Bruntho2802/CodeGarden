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
    <!-- Generates link -->
    <?php
    error_reporting(0);
    // Define an array of possible characters for the link
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    // Generate a random link if the button is pressed
    if (isset($_POST['generate_link'])) {
        // Generate a 10-character random string
        $link = '';
        for ($i = 0; $i < 10; $i++) {
            $link .= $chars[rand(0, strlen($chars) - 1)];
        }
    }
    ?>

    <!-- Navbar -->
    <?php include("navbar.php"); ?>

    <div class="body2">
        <!-- LOGO IMG -->
        <div class="container">
            <img src="pictures/codegardensmall.png" class="rounded mx-auto d-block img-fluid" style="width:500px; height: auto; margin-top: 80px; margin-bottom: 80px;" alt="fulllogo">
        </div>

        <!-- Your link -->
        <div class="container" style="margin-bottom: 25px">
            <h3 class="recent"> Your link </h3>
            <div class="search">
                <div class="Searchbar">
                    <p name="link"><?php echo 'http://codegarden.com?id=' . $link . ''; ?></p>
                </div>
            </div>
        </div>

        <!-- Button Copy Link -->
        <button id="copy-button" style="margin-right: 10px;">
            <div class="svg-wrapper-1">
                <div class="svg-wrapper">
                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                    </svg>
                </div>
            </div>
            <span>Copy</span>
        </button>

        <!-- Button Generate Link -->
        <form method="POST">
            <button type="submit" name="generate_link" style="margin-left: 10px">
                <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                        </svg>
                    </div>
                </div>
                <span>Generate link</span>
            </button>
        </form>
    </div>
    </div>

    <!-- footer -->
    <?php include("footer.php"); ?>

    <!-- Javascript Copy Link -->
    <script>
        const copyBtn = document.querySelector('#copy-button');
        copyBtn.addEventListener('click', () => {
            const linkInput = document.querySelector('p[name="link"]');
            const linkText = linkInput.textContent;
            navigator.clipboard.writeText(linkText)
                .then(() => {
                    console.log('Link copied to clipboard!');
                })
                .catch(err => {
                    console.error('Failed to copy link: ', err);
                });
        });
    </script>

</body>

</html>