<?php
// Set database information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "email";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form has been submitted
if (isset($_POST['submit'])) {
	// Get message data from form
	$to_user = $_POST['to_user'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	// Prepare and execute SQL statement to insert message into database
	$sql = "INSERT INTO messages (to_user, subject, message) VALUES ('$to_user', '$subject', '$message')";
	if (mysqli_query($conn, $sql)) {
		echo "Message sent successfully!";
	} else {
		echo "Error sending message: " . mysqli_error($conn);
	}
}

// Close database connection
mysqli_close($conn);
?>
