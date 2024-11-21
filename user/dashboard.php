<?php require_once './assets/PHP/dashboard.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
    <script src="../../fontawesome-free-6.4.0-web/js/all.min.js"></script>
    <link rel="stylesheet" href="../../fontawesome-free-6.4.0-web/css/all.min.css">
</head>

<body>
    <ul class="container-fluid nav d-flex justify-content-around bg-light p-2 shadow fixed-top">
        <li class="nav-item">
            <a class="nav-link" href="#" id="fullname"></a>
        </li>
        <li class="nav-item">
            <i class="bi bi-bell-fill"></i><sub style="background-color:red; color: #fff;border-radius: 5px;">10+</sub>
        </li>
    </ul>

    <div class="container bg-dark py-4 text-light my-5 align-item-center">
        <div class="d-flex justify-content-around">
            <div class="text-center">
                <i class="fas fa-wallet"></i>
                <p>Available Balance</p>
                <h5>
                    <p id="accBalance" class="text-light"></p>
                    <!-- <p class="fa fa-eye" aria-hidden="true"></p> -->
                    <i onclick="hideShowBalance()" class="fa fa-eye text-light" id="toggleEye" aria-hidden="true" style="cursor: pointer;"></i>
                </h5>
            </div>
    
            <a href="./fundWallet.php" class="text-light text-center">
                <i class="fas fa-plus my-3"></i>
                <p>Fund Wallet</p>
            </a>
        </div>
            <!-- <div class="text-center mt-5" id="create">
                <button id="verifyAccountBtn" onclick="createWallet()" class="btn bg-primary text-white">Create Wallet</button>
            </div>

            <div class="text-center mt-5" id="detail">
                <p class="text-light">Account Number: <span id="accNum"></span></p>
                <p class="text-light">Bank Name: <span id="bank"></span></p>
            </div> -->
        </div>
    <!-- services -->
    <div class="container my-10" id="services">
        <h3 class="text-center">Quick Links</h3>
        <!-- grid container -->
        <div class="row">
            <!-- airtime -->
            <div class="col-lg-3 col-sm-2">
                <a href="./airtimePage.php" class="airtime">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-telephone-inbound-fill card-header"></i>
                        </div>
                    </div>
                    <h4>Airtime</h4>
                </a>
                </div>
        
            <div class="col-lg-3 col-sm-2">
                <!-- data -->
                <a href="./dataPage.php" class="data">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-wifi card-header"></i>
                        </div>
                    </div>
                    <h4>Data</h4>
                </a>
            </div>

            <div class="col-lg-3 col-sm-2">
                <!-- tv -->
                <a href="./tvCableSubPage.php" class="tv">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-tv card-header"></i>
                        </div>
                    </div>
                    <h4>Cable Tv</h4>
                </a>
            </div>

            <div class="col-lg-3 col-sm-2">
                <!-- bill -->
                <a href="./billPage.php" class="bill">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-lightbulb-fill card-header"></i>
                        </div>
                    </div>
                    <h4>Electricity</h4>
                </a>
            </div>
        </div>

        <!-- 2nd -->
        <div class="row">
            <div class="col-lg-3 col-sm-2">
                <!-- result pin -->
                <a href="./resultPinPage.php" class="result-pin">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-mortarboard-fill card-header"></i>
                        </div>
                    </div>
                    <h4>Exam Pins</h4>
                </a>
            </div>

            <div class="col-lg-3 col-sm-2">
                <!-- airtime to money -->
                <a href="#" class="airtime-to-money">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-cash card-header"></i>
                        </div>
                    </div>
                    <h4>Airtime To Cash</h4>
                </a>
            </div>
                
            <div class="col-lg-3 col-sm-2">
                <!-- airtime to money -->
                <a href="./profile.php" class="airtime-to-money">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-user card-header"></i>
                        </div>
                    </div>
                    <h4>Profile</h4>
                </a>
            </div>

            <div class="col-lg-3 col-sm-2">
                <!-- airtime to money -->
                <a href="#" class="airtime-to-money">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-tag-fill card-header"></i>
                        </div>
                    </div>
                    <h4>Pricing</h4>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-2">
                <!-- airtime to money -->
                <a href="#" class="airtime-to-money">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-credit-card card-header" aria-hidden="true"></i>
                        </div>
                    </div>
                    <h4>Recharge card</h4>
                </a>
            </div>

            <div class="col-lg-3 col-sm-2">
                <!-- airtime to money -->
                <a href="#" class="airtime-to-money">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-mortarboard-fill card-header" aria-hidden="true"></i>
                        </div>
                    </div>
                    <h4>Result Pin</h4>
                </a>
            </div>

            <div class="col-lg-3 col-sm-2">
                <!-- airtime to money -->
                <a href="#" class="airtime-to-money">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-lightbulb card-header" aria-hidden="true"></i>
                        </div>
                    </div>
                    <h4>Bills</h4>
                </a>
            </div>

            <div class="col-lg-3 col-sm-2">
                <!-- airtime to money -->
                <a href="./transactions.php" class="airtime-to-money">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-book card-header" aria-hidden="true"></i>
                        </div>
                    </div>
                    <h4>Transactions</h4>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-2">
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-users card-header" aria-hidden="true"></i> 
                        </div>
                    </div>
                    <h4>Referrals</h4>
                </a>
            </div>

            <div class="col-lg-3 col-sm-2">
                <a href="#" id="logout">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-box-arrow-left card-header"></i> 
                        </div>
                    </div>
                    <h4>Logout</h4>
                </a>
            </div>

            <div class="col-lg-3 col-sm-2">
                <a href="./exchange.php">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-exchange card-header"></i> 
                        </div>
                    </div>
                    <h4>Transfer</h4>
                </a>
            </div>
        </div>

                
            </div>
        </div>
            <br><br>
             <!-- whatsapp us -->
            <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
            <i class="fab fa-whatsapp"></i>
                <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
            </a>
            </div>
            
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
        <div class="container-fluid text-center">
            <a href="./dashboard.php" class="">
                <i class="fa fa-home" aria-hidden="true"></i> 
                <p>Home</p>
            </a>

            <a href="./fundWallet.php">
                <i class="fas fa-wallet"></i> 
                <p>Wallet</p>
            </a>

            <a href="./dataPage.php">
                <i class="fas fa-wifi"></i>
                <p>Data</p>
            </a>

            <a href="./airtimePage.php">
                <i class="fas fa-phone"></i> 
                <p>Airtime</p>
            </a>

            <a href="./exchange.php">
                <i class="fa fa-exchange" aria-hidden="true"></i> 
                <p>Transfer</p>
            </a>
        </div>
    </nav>
</div>

<script>
let isBalanceVisible = true;

function hideShowBalance () {
    const accBalance = document.getElementById('accBalance');
    const toggleEye = document.getElementById('toggleEye');

    // toggleEye.addEventListener("click", function() {})

    if (isBalanceVisible) {
        // Hide the balance and show the closed eye icon
        accBalance.textContent = '₦****';
        toggleEye.classList.remove('fa-eye');
        toggleEye.classList.add('fa-eye-slash');
    } else {
        // Show the balance and revert the eye icon
        accBalance.textContent = 'N100,000';
        toggleEye.classList.remove('fa-eye-slash');
        toggleEye.classList.add('fa-eye');
        // !isBalanceVisible;
    }
    isBalanceVisible = !isBalanceVisible; // Toggle the state
}
</script>
<script src="./assets/JS/createWallet.js"></script>
<script src="./assets/JS/user.js"></script>
    <!-- wallet account file -->
    <script src="./assets/JS/walletInfo.js"></script>
    <!-- account balance -->
    <script src="./assets/JS/balance.js"></script>
    <script src="./assets/JS/logout.js"></script>
</body>
</html>