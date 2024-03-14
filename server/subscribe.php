<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    // Add the email to the database
    $sql = "INSERT INTO user_emails (email) VALUES ('$email')";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header("Location: ../user/index.php");
        exit(); // Ensure that script execution stops after redirection
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
