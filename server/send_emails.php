<?php
require_once "db.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected emails and period from the form
    $selected_emails = $_POST["selected_emails"];
    $period = $_POST["period"];

    // Fetch weather updates based on the selected period from the database
    $sql = "SELECT * FROM weather_data WHERE period = '$period'";
    $result = mysqli_query($conn, $sql);

    // Compose the email body with the weather updates
    $email_body = "Weather Updates for $period:\n\n";
    while ($row = mysqli_fetch_assoc($result)) {
        $email_body .= "Temperature: " . $row['temperature'] . "°C\n";
        $email_body .= "Description: " . $row['description'] . "\n\n";
    }

    // Send the email to each selected subscriber
    foreach ($selected_emails as $email) {
        $to = $email;
        $subject = "Weather Updates";
        $message = $email_body;
        $headers = "From: mjay58148@gmail.com\r\n";

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully to $to<br>";
        } else {
            echo "Failed to send email to $to<br>";
        }
    }
}

// Close database connection
mysqli_close($conn);
?>
