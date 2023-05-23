<?php

session_start();

// check if the user is logged in
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
} else {
  // user is not logged in, redirect to login.php
  echo "You are not logged in. Redirecting to login page...";
  header("Location: login.php");
  exit;
}

$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";
$dbname = "codegarden";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$welk = $_SESSION['welk'];
$id = $welk;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  $title = $_POST['replacetitle'];
  $language = $_POST['replacelanguage'];
  $description = $_POST['replacedescription'];
  $code = $_POST['replacecode'];

  try {
    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE private SET Title=:title, Language=:language, Description=:description, Code=:code WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':language', $language);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':code', $code);
    $stmt->execute();
    
    // set message to display on projects.php
    echo "<h1>Record updated successfully</h1>";
    ?>
    
    <!-- JavaScript countdown for the redirect -->
    <script>
    var countDownDate = new Date().getTime() + 4000; 
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get the current time
      var now = new Date().getTime();
      
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
      
      // Calculate time remaining in seconds
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // print the time remaining
      document.getElementById("countdown").innerHTML = "Redirecting automatically to Your projects in " + seconds + " seconds...";
      
      // when the countdown hits 0 it will redirect to projects.php
      if (distance < 0) {
        clearInterval(x);
        window.location.href = "projects.php";
      }
    }, 1000);
    </script>
    
    <div id="countdown">Redirecting automatically to Your projects in 3 seconds...</div>
    <?php

  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

?>
