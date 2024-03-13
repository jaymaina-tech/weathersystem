<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Information</title>
    <link rel="stylesheet" href="../admin/styles.css">
</head>
<body>
    <h2>Weather Information</h2>

    <div class="period-selector">
        <label for="period">Select Period:</label>
        <select name="period" id="period">
            <option value="daily">Daily</option>
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
            <option value="yearly">Yearly</option>
        </select>
    </div>

    <div class="weather-container">
        <?php include '../server/fetch_weather.php'; ?>
    </div>
   
    <div class="email-container"> 
    <h4>Want daily updates on weather forecast? subscribe here</h4>
    <form action="../server/subscribe.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        <button type="submit">Subscribe</button>
    </form>
</div>

    <script>
        
        document.getElementById('period').addEventListener('change', function() {
            var selectedPeriod = this.value;
            window.location.href = 'index.php?period=' + selectedPeriod;
        });
    </script>
</body>
</html>
