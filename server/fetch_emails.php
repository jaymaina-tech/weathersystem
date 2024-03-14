<?php
require_once "db.php";

// Fetch email addresses from the database
$sql = "SELECT email FROM user_emails";
$result = mysqli_query($conn, $sql);

$emails = array(); // Initialize an empty array to store emails

// Populate the array with fetched emails
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $email = $row['email'];
        // Hide characters between the first two and the last letter before "@gmail.com"
        $hidden_email = preg_replace('/(?<=.{2}).(?=[^@]*?@)/', '*', $email);
        $emails[] = $hidden_email;
    }
}

// Close database connection
mysqli_close($conn);

// Return the array of emails
return $emails;
?>
