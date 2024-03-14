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

    <!-- First section: Post weather updates -->
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

    <!-- Second section: Select emails to send weather updates -->
<form action="../server/send_emails.php" method="POST">
    <h3>Select Emails to Send Weather Updates</h3>
    <div class="email-container">
        <?php
        require_once "../server/fetch_emails.php";
        ?>
        <?php if (!empty($emails)): ?>
            <?php foreach ($emails as $email): ?>
                <div class="checkbox">
                    <input type="checkbox" name="selected_emails[]" value="<?php echo $email; ?>">
                    <label><?php echo $email; ?></label>
                </div>
            <?php endforeach; ?>
            <button type="submit">Send Updates</button>
        <?php else: ?>
            <p>No subscribed emails found.</p>
        <?php endif; ?>
    </div>
</form>

   

    <p><a href="../server/logout.php">Logout</a></p>
</body>
</html>
