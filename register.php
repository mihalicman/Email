<?php
// Check if the form was submitted
if(isset($_POST['register'])) {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the form data
    if(empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Please fill all fields.";
    } elseif($password != $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Connect to the database (replace with your own database credentials)
        $conn = mysqli_connect('localhost', 'root', '', 'email');

        // Check if the connection was successful
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert the user data into the database
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

        if(mysqli_query($conn, $sql)) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
}
?>
