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

<body>

    <?php
    // connect to the database
    $servername = "localhost";
    $username = "bit_academy";
    $password = "bit_academy";
    $dbname = "codegarden";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // insert username and password to the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>


    <div class="body2">
        <!-- LOGO IMG -->
        <div class="container">
            <img src="pictures/codegardensmall.png" class="rounded mx-auto d-block img-fluid" style="width:500px; height: auto; margin-top: 80px; margin-bottom: 80px;" alt="fulllogo">
        </div>
        <div class="container">
            <h3 class="text-center d-flex justify-content-center font-weight-bold" style="color: #6FCA3A; margin-top: 50px; margin-bottom: 10px">Register an account </h3>
            <form method="post" action="register.php">
                <!-- Username input -->
                <div class="text-center d-flex justify-content-center">
                    <div class="form-outline mb-4 text-center">
                        <label class="form-label" for="form2Example1">Username</label>
                        <input type="text" id="form2Example1" class="form-control" style="width: 300px" name="username" />
                    </div>
                </div>

                <!-- Password input -->
                <div class="text-center d-flex justify-content-center">
                    <div class="form-outline mb-4 text-center">
                        <label class="form-label" for="form2Example2">Password</label>
                        <input type="password" id="form2Example2" class="form-control" style="width: 300px" name="password" />
                    </div>
                </div>

                <!-- Submit button -->
                <div class="text-center d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-block mb-4" style="width: 150px">Create account</button>
                </div>

                <!-- Back button -->
                <div class="text-center">
                    <p>Already have an account? <a class="text-success" href="login.php">Log in</a></p>
                </div>
            </form>
        </div>

    </div>

</body>

</html>