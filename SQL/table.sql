CREATE TABLE IF NOT EXISTS data_prices(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    Data_ID INT(11),
    Network_Name VARCHAR(255),
    plan_type VARCHAR(255),
    price VARCHAR(255),
    data_type VARCHAR(255)
);