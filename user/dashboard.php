<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg">
</head>

<body>
    <div class="container">
        <!-- sidebar container -->
        <div class="sidebar" id="sidebar">
            <!-- Your sidebar content goes here -->
            <div class="sidebar-content">
                <ul>
                    <li><a href="#"><i class="bi bi-columns-gap"></i> Dashboard</a></li>
                    <li class="with-arrow account"><i class="fas fa-user"></i> Account <i class="bi bi-chevron-down"></i>
                        <!-- submenu for account -->
                        <ul class="submenu">
                            <li><a href="./profile.php"><i class="bi bi-arrow-right-short"></i> Profile</a></li>
                            <li><a href="./PHP/WebHook.php"><i class="bi bi-arrow-right-short"></i> Upgrade Account</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i> KYC</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i> Pin Management</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i> Change Password</a></li>
                        </ul>
                    </li>
                    <li><a href="./fundWallet.php"><i class="fas fa-wallet"></i> Fund Wallet</a></li>
                    <li><a href="./dataPage.php"><i class="fas fa-wifi"></i> Buy Data</a></li>
                    <li><a href="./airtimePage.php"><i class="fas fa-phone"></i> Buy Airtime</a></li>
                    <li><a href="./billPage.php"><i class="fas fa-lightbulb"></i> Bills</a></li>
                    <li><a href="./tvCableSubPage.php"><i class="bi bi-tv"></i>TV Cables</a></li>
                    <li><a href="./resultPinPage.php"><i class="bi bi-mortarboard-fill"></i>Result Pin</a></li>
                    <!-- transaction history -->
                    <li class="with-arrow transaction"><i class="fas fa-dollar-sign"></i> Transactions <i
                            class="bi bi-chevron-down"></i>
                        <!-- submenu for transactions history -->
                        <ul class="submenu">
                            <li><a href="./dataTransactionHistory.php"><i class="bi bi-arrow-right-short"></i>Data</a>
                            </li>
                            <li><a href="./airtime.php"><i class="bi bi-arrow-right-short"></i>Airtime</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i>Bill</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i>TV Cables</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i>Results Pin</a></li>
                        </ul>
                    </li>

                    <li><i class="bi bi-cash"></i> Wallet Summary</li>
                    <li class="with-arrow"><i class="bi bi-sliders"></i> Others <i class="bi bi-chevron-down"></i></li>
                    <li><i class="bi bi-gear-fill"></i> Settings</li>
                    <li><i class="bi bi-tag-fill"></i> Price</li>

                    <li><i class="bi bi-bell-fill"></i> Notifications</li>
                    <li id="logout"><i class="bi bi-box-arrow-left"></i> Logout</li>
                </ul>
            </div>
        </div>

        <div class="content">
            <!-- header -->
            <div class="header">
                <div class="navbar" onclick="toggleMenu()">
                    <!-- &#9776; -->
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
            <!-- Your main content goes here -->
            <div class="main-content">
                <!-- <marquee class="marquee" behavior="" direction="">This is the only avalailable bank we have for now that is wema bank
                </marquee> -->
                <div class="balanceContainer">
                <h1 style="color:aliceblue;padding:35px">Hi, <span id="username"></span></h1>
                    <div class="balance">
                    <i class="fas fa-wallet fa-2x"></i>
                    Wallet Balance
                    <h2 style="color:aliceblue;padding-left:35px;padding-top:40px" id="accBalance">₦0.00</h2>
                    </div>
                    <div class="referral">
                        <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                        Referral Commission
                        <h2 style="color:aliceblue;padding-left:35px;padding-top:40px" id="accBalance">₦0.00</h2>
                    </div>
                    <div class="dataBalance">
                    <i class="fas fa-wifi fa-2x"></i>
                    Data Balance
                    <h2 style="color:aliceblue;padding-left:35px;padding-top:40px" id="accBalance">0.00</h2>
                    </div>
                </div>
                <div class="bankNames">
                        <button><i class="fa fa-university" aria-hidden="true"></i>Wema Bank</button>
                        <button><i class="fa fa-university" aria-hidden="true"></i>9PS Bank</button>
                        <button><i class="fa fa-university" aria-hidden="true"></i>Moniepoint</button>
                </div>
                <!-- account -->
                <div class="account-details">
                    <!-- wema bank logo img-->
                    <img src="../assets/img/wemaBankLogo.jpeg" class="wemaImg" alt="" srcset="">
                    <h3>Account Number: <span id="accNum"></span></h3><br>
                    <h3>Account Name: <span id="accName"></span><span class="chargesAmount"> ₦50<br>Charges</span></h3>
                    <br>
                    <h3>Bank Name: <span id="bank"></span></h3><br><br>
                    <h3>AUTOMATED BANK TRANSFER</h3>
                    <h4>Make transfer to this account to fund your wallet</h4>
                </div>
                <!-- services -->
                <div class="services" id="services">
                    <!-- grid container -->
                    <div class="grid-container">
                        <!-- data -->
                        <div class="data">
                            <i class="bi bi-wifi"></i>
                            <h2>Buy <br>Data</h2>
                        </div>
                        <!-- airtime -->
                        <div class="airtime">
                            <i class="bi bi-telephone-inbound-fill"></i>
                            <h2>Buy <br>Airtime</h2>
                        </div>
                        <!-- tv -->
                        <div class="tv">
                            <i class="bi bi-tv"></i>
                            <h2>TV Cables</h2>
                        </div>
                        <!-- bill -->
                        <div class="bill">
                            <i class="bi bi-lightbulb-fill"></i>
                            <h2>Buy <br>Electricity</h2>
                        </div>
                        <!-- result pin -->
                        <div class="result-pin">
                            <i class="bi bi-mortarboard-fill"></i>
                            <h2>Result Pin</h2>
                        </div>
                        <!-- airtime to money -->
                        <div class="airtime-to-money">
                            <i class="bi bi-cash"></i>
                            <h2>Airtime To Cash</h2>
                        </div>
                    </div>
                </div>
            
                <!-- end of main content -->
            </div>
        </div>
    </div>
    <script>
        function toggleMenu() {
            let sidebar = document.getElementById('sidebar');
            let isOpen = sidebar.style.left === '0px';
            sidebar.style.left = isOpen ? '-228px' : '0px';

            let toggleIcon = document.querySelector(".navbar");
            toggleIcon.classList.toggle('open');
        }

        document.addEventListener("DOMContentLoaded", function() {
            let withArrowElements = document.querySelectorAll(".with-arrow");

            withArrowElements.forEach(element => {
                element.addEventListener("click", function(){
                    this.classList.toggle('open');

                    let submenu = document.querySelector(".submenu");

                    if(submenu){
                        submenu.style.display = submenu.style.display === "block" ? "block" : "none"
                    }
                })
            })
        })
    </script>

    <script src="./assets/JS/user.js"></script>
    <!-- wallet account file -->
    <script src="./assets/JS/walletInfo.js"></script>
    <!-- account balance -->
    <script src="./assets/JS/balance.js"></script>
    <script src="./assets/JS/logout.js"></script>
</body>

</html>