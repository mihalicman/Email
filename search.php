<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="search-box">
		<h2>Search Results</h2>
		<?php
			// Connect to database
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "email";
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Get search term from form
			$search = $_POST['search'];

			// SQL query to search for matching records
			$sql = "SELECT * FROM messages WHERE to_user LIKE '%$search%' OR subject LIKE '%$search%' OR message LIKE '%$search%'";

			$result = mysqli_query($conn, $sql);

			// Display search results
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "<div class='record'>";
					echo "<p><strong>Name:</strong> " . $row["to_user"] . "</p>";
					echo "<p><strong>Email:</strong> " . $row["subject"] . "</p>";
					echo "<p><strong>Phone:</strong> " . $row["message"] . "</p>";
					echo "</div>";
				}
			} else {
				echo "No results found.";
			}

			mysqli_close($conn);
		?>
	</div>
</body>
</html>
