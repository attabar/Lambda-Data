-- Admin Table
CREATE TABLE IF NOT EXISTS admintable(
    id INT(11) AUTO_INCREMENT,
    username VARCHAR(255),
    pass VARCHAR(255),
    PRIMARY KEY (id)
);

-- users table
CREATE TABLE IF NOT EXISTS users(
    user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255),
    lname VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(255),
    pass VARCHAR(255),
    confirmPass VARCHAR(255)
);

-- Account details table
CREATE TABLE IF NOT EXISTS wallet_account(
    wallet_user_id INT,
    wallet_account_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    account_name VARCHAR(100),
    account_number VARCHAR(20),
    bank_name VARCHAR(100),
    account_reference VARCHAR(50),
    FOREIGN KEY (wallet_user_id) REFERENCES users(user_id)
);

-- Wallet Ballance
CREATE TABLE IF NOT EXISTS account_balance(
    transaction_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    transaction_user_id INT(11),
    settlement_amount VARCHAR(255),
    paid_on DATETIME,
    payment_reference VARCHAR(255),
    transaction_reference VARCHAR(255),
    payment_status VARCHAR(255),
    FOREIGN KEY (transaction_user_id) REFERENCES users(user_id)
);

-- Data Transaction Table
CREATE TABLE IF NOT EXISTS data_transaction(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    data_user_id INT(11),
    transaction_id INT(11), -- transaction id
    plan_network VARCHAR(255),
    mobile_number INT(11),
    plan INT(11),
    status VARCHAR(255),
    plan_name VARCHAR(255),
    plan_amount INT(11),
    create_date DATETIME,
    FOREIGN KEY (data_user_id) REFERENCES users(user_id)
);

-- Airtime Transaction Table
CREATE TABLE IF NOT EXISTS airtime_transaction(
    airtime_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    airtime_user_id INT(11),
    transaction_id INT(11), -- transaction id
    plan_network VARCHAR(255),
    mobile_number INT(11),
    status VARCHAR(255),
    plan_amount INT(11),
    paid_amount INT,
    create_date DATETIME,
    FOREIGN KEY (airtime_user_id) REFERENCES users(user_id)
);

-- Contact Us table
CREATE TABLE IF NOT EXISTS contact_us(
    id INT(11) AUTO_INCREMENT,
    fullname VARCHAR(255),
    email VARCHAR(255),
    messages VARCHAR(255),
    PRIMARY KEY(id)
);

-- Subscribers
CREATE TABLE IF NOT EXISTS subscribers(
    id INT(11) AUTO_INCREMENT,
    subscribers VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS airtime_prices(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    Recharge_id VARCHAR(255),
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

INSERT INTO airtime_prices(Recharge_id, Network_Name, Airtime_type, amount, amountToPay) 
VALUES('13', '1', 'VTU', '100', '98'),
('14', '1', 'VTU', '200', '198'),
('15', '1', 'VTU', '500', '480'),
('16', '2', 'VTU', '100', '98'),
('17', '2', 'VTU', '200', '198'),
('18', '1', 'VTU', '1000', '980'),
('19', '3', 'VTU', '100', '98'),
('20', '3', 'VTU', '200', '198'),
('21', '3', 'VTU', '500', '480'),
('22', '3', 'VTU', '1000', '980'),
('23', '6', 'VTU', '100', '98'),
('24', '2', 'VTU', '500', '480'),
('25', '2', 'VTU', '1000', '980'),
('26', '1', 'VTU', '400', '380'),
('27', '1', 'VTU', '750', '740'),
('28', '6', 'VTU', '200', '198');

INSERT INTO data_prices(data_id, network_id, plan_type, price, selling_price, data_type) 
VALUES(166, 'MTN', 'SME', '253', '273' '1GB'),
(167, 'MTN', 'SME', '506', '520', '2GB'),
(168, 'MTN', 'SME', '759', '810', '3GB'),
(169, 'MTN', 'SME', '1265', '1275', '5GB'),
(179, 'MTN', 'SME', '127', '140', '500MB')
(270, 'MTN', 'CG', '25', '50', '50MB');

-- the encrypted password for admin login: Coder@306 --
INSERT INTO admintable(username,pass) VALUES('Malik', '$2y$10$GvoyFuTBNmnfKOx.P9R0n.FuU6P3L3dUx8b9oejOf64NVSBmSt.Bq')