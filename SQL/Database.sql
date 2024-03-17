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
CREATE TABLE IF NOT EXISTS transaction_history(
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
    data_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    data_user_id INT(11),
    transaction_id INT(11), -- transaction id
    balance_before INT(11),
    balance_after INT(11),
    plan_network VARCHAR(255),
    mobile_number INT(11),
    plan INT(11),
    status VARCHAR(255),
    plan_name VARCHAR(255),
    plan_amount INT(11),
    create_date DATETIME,
    FOREIGN KEY (data_user_id) REFERENCES users(user_id)
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

-- insert Data into Admin table
INSERT INTO admintable(username,pass) VALUES('Malik', 'Malik@306')