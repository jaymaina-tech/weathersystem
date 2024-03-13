CREATE TABLE weather_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    period VARCHAR(20) NOT NULL,
    temperature DECIMAL(5, 2) NOT NULL,
    humidity DECIMAL(5, 2) NOT NULL,
    wind_speed DECIMAL(5, 2) NOT NULL,
    weather VARCHAR(20) NOT NULL,
    description TEXT NOT NULL,
    admin_username VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
