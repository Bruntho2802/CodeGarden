<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link class="img-fluid rounded-circle" rel="shortcut icon" type="logo/png" href="pictures/codegarden_logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Search</title>
</head>

<body>
    <!-- Navbar -->
    <?php include("navbar.php"); ?>

    <div class="body2">
        <!-- LOGO IMG -->
        <div class="container">
            <img src="pictures/codegardensmall.png" class="rounded mx-auto d-block img-fluid" style="width:500px; height: auto; margin-top: 80px; margin-bottom: 80px;" alt="fulllogo">
        </div>

        <!-- Search -->
        <div class="container" style="margin-bottom: 75px">
            <h3 class="recent"> Search </h3>
            <form method="post" action="search.php">
                <input class="form-control me-2" type="search" name="search" placeholder="Type here" style="width: 80%; margin-bottom: 15px">
                <button>
                    <div class="svg-wrapper-1">
                        <div class="svg-wrapper">
                            <svg height="24" width="24" viewBox="0 0 24 24">
                                <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>
                    <span>Submit</span>
                </button>
            </form>
        </div>

        <!-- Results -->
        <div class="container" style="margin-bottom: 25px">
            <h3 class="recent"> Results </h3>
            <div class="search">
                <p> <?php
                    // connect to the database
                    $host = 'localhost'; // your database host
                    $username = 'bit_academy'; // your database username
                    $password = 'bit_academy'; // your database password
                    $database = 'codegarden'; // your database name
                    $dsn = "mysql:host=$host;dbname=$database";

                    try {
                        $conn = new PDO($dsn, $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $e) {
                        die("Connection failed: " . $e->getMessage());
                    }

                    // get the search term from the form
                    $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';


                    // query the database
                    $sql = "SELECT * FROM `public` WHERE `Title` LIKE :searchTerm";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // check if any rows were returned
                    if (count($result) > 0) {
                        // loop through each row and display the results
                        foreach ($result as $row) {
                            echo $row['Title'] . '<br>';
                        }
                    } else {
                        echo 'No matching results found.';
                    }

                    // close the database connection
                    $conn = null;
                    ?>

            </div>
        </div>

        <!-- Contactlink -->
        <?php include("contactlink.php"); ?>

        <!-- Footer -->
        <?php include("footer.php"); ?>
    </div>
</body>

</html>