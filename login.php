<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "modelvliegclub";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the username and password from the POST request
$user = $_POST['username'];
$pass = $_POST['password'];

// Query the members table to verify the login credentials
$sql = "SELECT * FROM members WHERE username='$user' AND password='$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Redirect to a member's area page if login is successful
    header("Location: members_area.php");
} else {
    // Display an error message if login fails
    echo "Invalid username or password";
}

mysqli_close($conn);
?>
