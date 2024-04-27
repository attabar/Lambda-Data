CREATE TABLE IF NOT EXISTS airtime_prices(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    Recharge_id INT(11),
    Network_Name VARCHAR(255),
    Airtime_type VARCHAR(255),
    amount VARCHAR(255),
    amountToPay VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS data_prices(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    data_id INT(11),
    network_id VARCHAR(255),
    plan_type VARCHAR(255),
    price VARCHAR(255),
    data_type VARCHAR(255)
);

INSERT INTO airtime_prices(Recharge_id,Network_Name, Airtime_type, amount, amountToPay) 
VALUES('13', '1', 'VTU', '100', '98'),
('14', '1', 'VTU', '200', '198'),
('15', '1', 'VTU', '500', '480'),
('16', '2', 'VTU', '100', '98'),
('17', '2', 'VTU', '200', '198'),
('18', '1', 'VTU', '1000', '980'),
('19', '3',  'VTU', '100', '98'),
('20', '3', 'VTU', '200', '198'),
('21', '3', 'VTU', '500', '480'),
('22', '3', 'VTU', '1000', '980'),
('23', '6', 'VTU' '100', '98'),
('24', '2', 'VTU', '500', '480'),
('25', '2', 'VTU', '1000', '980'),
('26', '1', 'VTU', '400', '380'),
('27', '1', 'VTU', '750' '740'),
('28', '6', 'VTU', '200', '198');
INSERT INTO data_prices(data_id, Network_Name, plan_type, price, data_type) 
VALUES('166','MTN','SME', '253', '1GB'),
('167', 'MTN', 'SME', '506', '2GB'),
('168', 'MTN', 'SME', '759', '3GB'),
('169', 'MTN', 'SME', '1265', '5GB'),
('179', 'MTN', 'SME', '127', '500MB');
