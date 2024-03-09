<?php
// Include database connection
require_once 'db.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert admin data into database
    $sql = "INSERT INTO admin_users (username, password) VALUES ('$username', '$hashedPassword')";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        // Registration successful
        header("Location: ../admin/login.php");
        exit();
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}

