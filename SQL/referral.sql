-- Users Table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    referral_code VARCHAR(50),
    referred_by INT NULL,  -- Stores the ID of the user who referred them
    FOREIGN KEY (referred_by) REFERENCES users(user_id)
);

-- Transactions Table
CREATE TABLE transactions (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  -- The user who made the purchase
    amount DECIMAL(10, 2),
    transaction_type ENUM('data', 'airtime', 'other'), -- Transaction type
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Referral Benefits Table (optional)
-- To store rewards given to referrers
CREATE TABLE referral_benefits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    referrer_id INT,  -- The user who referred
    referred_user_id INT,  -- The referred user
    benefit_amount DECIMAL(10, 2),
    transaction_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (referrer_id) REFERENCES users(user_id),
    FOREIGN KEY (referred_user_id) REFERENCES users(user_id),
    FOREIGN KEY (transaction_id) REFERENCES transactions(transaction_id)
);


session_start();
require_once './connection.php';

// When a user registers and uses a referral code
function registerUser($name, $email, $password, $referralCode, $conn) {
    // Check if referral code exists
    $sql = $conn->prepare("SELECT user_id FROM users WHERE referral_code = ?");
    $sql->bind_param("s", $referralCode);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $referrer = $result->fetch_assoc();
        $referred_by = $referrer['user_id'];  // The ID of the person who referred them

        // Insert new user
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $referralCode = generateReferralCode(); // Function to generate a unique referral code
        $insertSql = $conn->prepare("INSERT INTO users (name, email, password, referral_code, referred_by) VALUES (?, ?, ?, ?, ?)");
        $insertSql->bind_param("ssssi", $name, $email, $hashedPassword, $referralCode, $referred_by);
        if ($insertSql->execute()) {
            echo "User registered successfully!";
        } else {
            echo "Error registering user.";
        }
    } else {
        echo "Invalid referral code.";
    }
}

// Function to generate unique referral code
function generateReferralCode() {
    return substr(md5(uniqid(rand(), true)), 0, 6); // Generate a 6-character unique code
}

3. Tracking Purchases and Rewarding the Referrer

function handleTransaction($userId, $amount, $transactionType, $conn) {
    // Record the transaction
    $sql = $conn->prepare("INSERT INTO transactions (user_id, amount, transaction_type) VALUES (?, ?, ?)");
    $sql->bind_param("ids", $userId, $amount, $transactionType);

    if ($sql->execute()) {
        $transactionId = $conn->insert_id;

        // Check if the user was referred by someone
        $checkReferral = $conn->prepare("SELECT referred_by FROM users WHERE user_id = ?");
        $checkReferral->bind_param("i", $userId);
        $checkReferral->execute();
        $result = $checkReferral->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $referrerId = $row['referred_by'];

            if ($referrerId) {
                // Calculate the benefit (e.g., 5% of the purchase)
                $benefitAmount = $amount * 0.05;

                // Record the referral benefit
                $benefitSql = $conn->prepare("INSERT INTO referral_benefits (referrer_id, referred_user_id, benefit_amount, transaction_id) VALUES (?, ?, ?, ?)");
                $benefitSql->bind_param("iidi", $referrerId, $userId, $benefitAmount, $transactionId);
                $benefitSql->execute();

                // Optionally, update referrer's balance or notify them of the reward
                echo "Referral benefit of $benefitAmount granted to referrer!";
            }
        }
    } else {
        echo "Transaction failed.";
    }
}

4. Optional: Display Referrer’s Benefits

function getReferralEarnings($referrerId, $conn) {
    $sql = $conn->prepare("SELECT SUM(benefit_amount) AS total_earnings FROM referral_benefits WHERE referrer_id = ?");
    $sql->bind_param("i", $referrerId);
    $sql->execute();
    $result = $sql->get_result();

    if ($row = $result->fetch_assoc()) {
        return $row['total_earnings'];
    } else {
        return 0;
    }
}
