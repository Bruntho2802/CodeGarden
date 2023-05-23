<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link class="img-fluid rounded-circle" rel="shortcut icon" type="logo/png" href="pictures/codegarden_logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>

<?php
// start the session
session_start();

// check if the user is already logged in
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    // user is already logged in, redirect to index.php
    header("Location: index.php");
    exit;
}

// check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // process the login form

    // replace these with your actual database credentials
    $host = "localhost";
    $username = "bit_academy";
    $password = "bit_academy";
    $database = "codegarden";

    // create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // retrieve the submitted username and password
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // query the database for a user with matching credentials
    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // check if the query returned a result
    if (mysqli_num_rows($result) == 1) {
        // user found, log them in

        // retrieve the user ID from the result
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];

        // set the session variable to store the user ID
        $_SESSION['user_id'] = $user_id;

        // redirect to the index page
        header("Location: index.php");
        exit;
    } else {
        // invalid login credentials
        $error = "Invalid username or password.";
    }

    // close the database connection
    mysqli_close($conn);
}
?>

    <?php
    // display any login errors
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <div class="body2">
        <!-- LOGO IMG -->
        <div class="container">
            <img src="pictures/codegardensmall.png" class="rounded mx-auto d-block img-fluid" style="width:500px; height: auto; margin-top: 80px; margin-bottom: 80px;" alt="fulllogo">
        </div>
        <div class="container">
            <h3 class="text-center d-flex justify-content-center font-weight-bold" style="color: #6FCA3A; margin-top: 50px; margin-bottom: 10px">Log in </h3>

            <form method="POST">
                <!-- Username input -->
                <div class="text-center d-flex justify-content-center">
                    <div class="form-outline mb-4 text-center">
                        <label class="form-label" for="form2Example1">Username</label>
                        <input type="text" id="username" name="username" class="form-control" style="width: 300px" required>
                    </div>
                </div>

                <!-- Password input -->
                <div class="text-center d-flex justify-content-center">
                    <div class="form-outline mb-4 text-center">
                        <label class="form-label" for="form2Example2">Password</label>
                        <input type="password" id="password" name="password" class="form-control" style="width: 300px" required>
                    </div>
                </div>

                <!-- Submit button -->
                <div class="text-center d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-block mb-4" style="width: 150px">Submit</button>
                </div>

                <!-- Register & Back buttons -->
                <div class="text-center">
                    <p>Not a member? <a class="text-success" href="register.php">Register</a></p>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
