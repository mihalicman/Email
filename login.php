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
	// Get username and password from form
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Prepare and execute SQL statement to retrieve user data
	$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	// Check if user data was retrieved
	if (mysqli_num_rows($result) > 0) {
		// User authentication successful, redirect to homepage or dashboard
		header("Location: registration_form.html");
		exit();
	} else {
		// User authentication failed, display error message
		echo "Invalid username or password";
    }
}