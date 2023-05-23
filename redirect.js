
    var countDownDate = new Date().getTime() + 5000; // 2 seconds from now
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get the current time
      var now = new Date().getTime();
      
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
      
      // Calculate time remaining in seconds
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Output the result
      document.getElementById("countdown").innerHTML = "Redirecting automatically to Your projects in " + seconds + " seconds...";
      
      // If the count down is finished, redirect to projects.php
      if (distance < 0) {
        clearInterval(x);
        window.location.href = "projects.php";
      }
    }, 1000);
  
    
    <div id="countdown">Redirecting automatically to Your projects in 5 seconds...</div>