<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <form action="../server/post_weather.php" method="POST">
        <label for="period">Select Period:</label>
        <select name="period" id="period">
            <option value="daily">Daily</option>
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
            <option value="yearly">Yearly</option>
        </select><br>
        <label for="temperature">Temperature (°C):</label>
        <input type="text" id="temperature" name="temperature" required><br>
        <label for="humidity">Humidity (%):</label>
        <input type="text" id="humidity" name="humidity" required><br>
        <label for="wind-speed">Wind Speed (km/h):</label>
        <input type="text" id="wind-speed" name="wind-speed" required><br>
        <label for="weather">Weather:</label>
        <select name="weather" id="weather" required>
            <option value="sunny">Sunny</option>
            <option value="cloudy">Cloudy</option>
            <option value="rainy">Rainy</option>
            <option value="stormy">Stormy</option>
            <option value="snowy">Snowy</option>
        </select><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>
        <button type="submit">Post Weather</button>
    </form>
    <p><a href="../server/logout.php">Logout</a></p>
</body>
</html>
