<!DOCTYPE html>
<html>
<head>
	<title>Random Link Generator</title>
</head>
<body>
	<h1>Random Link Generator</h1>
	<p>Click the button to go to a random link:</p>
	<button onclick="generateLink()">Generate Link</button>

	<script>
		function generateLink() {
			window.location.href = "random_link.php";
		}
	</script>
    <?php
// array of links
$links = array(
    "https://example.com/page1",
    "https://example.com/page2",
    "https://example.com/page3",
    "https://example.com/page4",
    "https://example.com/page5"
);

// generate a random number based on the array length
$randIndex = rand(0, count($links) - 1);

// get the link at the random index
$randomLink = $links[$randIndex];

// redirect to the random link
header("Location: $randomLink");
exit;
?>
</body>
</html>