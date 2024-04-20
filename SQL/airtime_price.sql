CREATE TABLE IF NOT EXISTS airtime_prices(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    Recharge_id INT(11),
    Network_Name VARCHAR(255),
    Airtime_type VARCHAR(255),
    amount VARCHAR(255),
    amountToPay VARCHAR(255)

);