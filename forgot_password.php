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

// Retrieve the email address from the form submission
$email = $_POST['email'];

// Generate a unique reset link
$reset_token = bin2hex(random_bytes(16));
$reset_link = "http://yourwebsite.com/reset_password.php?token=" . $reset_token;

// Store the reset token in the database
$sql = "UPDATE members SET reset_token='$reset_token' WHERE email='$email'";
if (mysqli_query($conn, $sql)) {
    // Send the reset link via email
    $to = $email;
    $subject = "Wachtwoord Reset Verzoek";
    $message = "Klik op de volgende link om je wachtwoord te resetten: " . $reset_link;
    $headers = "From: no-reply@modelvliegclub.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Er is een email met een reset link naar je emailadres gestuurd.";
    } else {
        echo "Er is een fout opgetreden bij het verzenden van de email.";
    }
} else {
    echo "Er is een fout opgetreden bij het verwerken van je verzoek.";
}

mysqli_close($conn);
?>
