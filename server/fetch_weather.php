<?php
// Include database connection
require_once 'db.php';

// Default period is 'daily' if not provided in the URL
$period = isset($_GET['period']) ? $_GET['period'] : 'daily';

// Fetch weather data based on selected period
$sql = "SELECT * FROM weather_data WHERE period = '$period'";
$result = mysqli_query($conn, $sql);

// Display weather data
if (mysqli_num_rows($result) > 0) {
    echo "<div class='weather-data'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='weather-item'>";
        echo "<h3>" . ucfirst($row['period']) . " Weather</h3>";
        echo "<p><strong>Temperature:</strong> " . $row['temperature'] . "°C</p>";
        echo "<p><strong>Humidity:</strong> " . $row['humidity'] . "%</p>";
        echo "<p><strong>Wind Speed:</strong> " . $row['wind_speed'] . " km/h</p>";
        echo "<p><strong>Weather:</strong> " . $row['weather'] . "</p>";
        echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
        echo "<p><strong>Posted by:</strong> " . $row['admin_username'] . "</p>";
        echo "<hr>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No weather data available for " . ucfirst($period) . ".";
}

// Close database connection
mysqli_close($conn);

