<?php
session_start();
require_once 'db.php';


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $period = $_POST['period'];
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];
    $windSpeed = $_POST['wind_speed'];
    $weather = $_POST['weather'];
    $description = $_POST['description'];

    // Get admin username
    $username = $_SESSION['username'];

    // Prepare SQL statement to insert weather data into database
    $sql = "INSERT INTO weather_data (period, temperature, humidity, wind_speed, weather, description, admin_username) 
            VALUES ('$period', '$temperature', '$humidity', '$windSpeed', '$weather', '$description', '$username')";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        // Data posted successfully
        echo "Data posted succesfully";
        header("Location: ../admin/dashboard.php");
        exit();
    } else {
        // Error posting data
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
