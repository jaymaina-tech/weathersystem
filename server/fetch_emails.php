<?php
require_once "db.php";

// Fetch subscribed emails
$sql = "SELECT * FROM user_emails";
$result = mysqli_query($conn, $sql);

// Prepare emails array
$emails = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $emails[] = $row["email"];
    }
}

mysqli_close($conn);
