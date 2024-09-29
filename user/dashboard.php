<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
    <script src="../../fontawesome-free-6.4.0-web/js/all.min.js"></script>
        <link rel="stylesheet" href="../../fontawesome-free-6.4.0-web/css/all.min.css">
</head>

<body>
    <div class="container">

        <!-- sidebar container -->
        <div class="sidebar" id="sidebar">
            <!-- Your sidebar content goes here -->
            <div class="sidebar-content">
            <marquee><h2>Welcome <span id="username"></span></h2></marquee>
                <ul>
                    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <!-- <li class="with-arrow account"><i class="fas fa-user"></i> Account <i class="bi bi-chevron-down"></i>
                        <ul class="submenu">
                            <li><a href="./profile.php"><i class="bi bi-arrow-right-short"></i> Profile</a></li>
                            <li><a href="./PHP/WebHook.php"><i class="bi bi-arrow-right-short"></i> Upgrade Account</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i> KYC</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i> Pin Management</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i> Change Password</a></li>
                        </ul>
                    </li> -->

                    <li><a href="./fundWallet.php"><i class="fas fa-wallet"></i> Fund Wallet</a></li>
                    <li><a href="./dataPage.php"><i class="fas fa-wifi"></i> Buy Data</a></li>
                    <li><a href="./airtimePage.php"><i class="fas fa-phone"></i> Buy Airtime</a></li>
                    <li><a href="./billPage.php"><i class="fas fa-lightbulb"></i> Bills</a></li>
                    <li><a href="./tvCableSubPage.php"><i class="bi bi-tv"></i> TV Cables</a></li>
                    <li><a href="./resultPinPage.php"><i class="bi bi-mortarboard-fill"></i> Result Pin</a></li>

                    <!-- transaction history -->
                    <li class="with-arrow transaction"><i class="fa fa-book" aria-hidden="true"></i> Transactions <i
                            class="bi bi-chevron-down"></i>
                        <!-- submenu for transactions history -->
                        <ul class="submenu">
                            <li><a href="./dataTransactionHistory.php"><i class="bi bi-arrow-right-short"></i>Data</a></li>
                            <li><a href="./airtime.php"><i class="bi bi-arrow-right-short"></i>Airtime</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i> Bill</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i> TV Cables</a></li>
                            <li><a href=""><i class="bi bi-arrow-right-short"></i> Results Pin</a></li>
                        </ul>
                    </li>

                    <!-- <li><i class="bi bi-cash"></i> Wallet Summary</li> -->
                    <!-- <li class="with-arrow"><i class="bi bi-sliders"></i> Others <i class="bi bi-chevron-down"></i></li> -->
                    <!-- <li><i class="bi bi-gear-fill"></i> Settings</li> -->
                    <li><i class="fa fa-list-ul" aria-hidden="true"></i> Pricing</li>
                    <li><i class="bi bi-bell-fill"></i> Notifications</li>
                    <li><a href="./profile.php"><i class="fas fa-user"></i> Profile</a></li>
                    <li><i class="fa fa-users" aria-hidden="true"></i> Referrals</li>
                    <li id="logout"><i class="bi bi-box-arrow-left"></i> Logout</li>
                </ul>
            </div>
        </div>

        <div class="content">

            <!-- header -->
            <div class="header">
                <div class="navbar" onclick="toggleMenu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>

            <!-- Your main content goes here -->
            <div class="main-content">
                <!-- <h4 style="color:black;padding:35px" class="welcomingUser">Hi, <span id="username"></span></h4> -->
            <div class="balanceContainer">
                
                <div class="balance">
                    <i class="fas fa-wallet"></i>
                    <p>Total Balance</p>
                    <p id="accBalance">₦0.00</p>
                </div>

                <a href="./fundWallet.php" class="fundWallet">
                    <i style="text-align: center" class="fas fa-plus"></i>
                    <p>Fund Wallet</p>
                </a>

                <!-- <div class="referral">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <p>Referral Commission</p>
                    <h2 style="color:black" id="accBalance">₦0.00</h2>
                </div> -->

                <!-- <div class="dataBalance">
                    <i class="fas fa-wifi"></i>
                    <p>Data Balance</p>
                    <h2 style="color:black;" id="accBalance">0.00</h2>
                </div> -->
            </div>

            <!-- <div class="bankNames">
                <button id="monify" onclick="navigateToMonify()"><i class="fa fa-university" aria-hidden="true"></i> Monnify</button>
                <button id="paystack" onclick="navigateToPaystack()"><i class="fa fa-university" aria-hidden="true"></i> Paystack</button>
                <button id="ps9" onclick="navigateToPbs()"><i class="fa fa-university" aria-hidden="true"></i> Moniepoint</button>
            </div> -->

            <!-- account -->
            <div class="account-details">
                <!-- wema bank logo img-->
                 <div class="monifyContainer">
                    <img src="../assets/img/wemaBankLogo.jpeg" class="wemaImg" alt="" srcset="">
                    <h3>Account Number: <span id="accNum">Unverified</span></h3><br>
                    <h3>Account Name: <span id="accName">Unverified</span><span class="chargesAmount"> ₦50<br>Charges</span></h3>
                    <br>
                    <h3>Bank Name: <span id="bank">Unverified</span></h3><br><br>
                    <h3>Unverified Account ?</h3>
                    <button id="verifyAccountBtn" onclick="createWallet()">Verify Your Account here</button>
                </div>

                <!-- <div class="paystackContainer">
                    <img src="../assets/img/paystack.png" class="wemaImg" alt="" srcset="">
                    <h3>Account Number: <span id="accNum2">Unverified</span></h3><br>
                    <h3>Account Name: <span id="accName2">Unverified</span><span class="chargesAmount"> ₦50<br>Charges</span></h3>
                    <br>
                    <h3>Bank Name: <span id="bank">Unverified</span></h3><br><br>
                    <h3>Unverified Account ?</h3>
                    <button id="verifyAccountBtn">Verify Your Account here</button>
                </div> -->

                <!-- <div class="psb9Container">
                    <img src="../assets/img/psb9.png" class="wemaImg" alt="" srcset="">
                    <h3>Account Number: <span id="accNum">Unverified</span></h3><br>
                    <h3>Account Name: <span id="accName">Unverified</span><span class="chargesAmount"> ₦50<br>Charges</span></h3>
                    <br>
                    <h3>Bank Name: <span id="bank">Unverified</span></h3><br><br>
                    <h3>Unverified Account ?</h3>
                    <button id="verifyAccountBtn">Verify Your Account here</button>
                </div> -->
            </div>

            <!-- services -->
            <div class="services" id="services">
                <h3 style="text-align:center; color: blue; margin-bottom:15px">Quick Links</h3>
                <!-- grid container -->
                <div class="grid-container">
                    <!-- airtime -->
                    <a href="./airtimePage.php" class="airtime">
                        <i class="bi bi-telephone-inbound-fill"></i>
                        <h2>Airtime</h2>
                    </a>
                    <!-- data -->
                    <a href="./dataPage.php" class="data">
                        <i class="bi bi-wifi"></i>
                        <h2>Data</h2>
                    </a>
                    
                    <!-- tv -->
                    <a href="./tvCableSubPage.php" class="tv">
                        <i class="bi bi-tv"></i>
                        <h2>Cable Tv</h2>
                    </a>
                    <!-- bill -->
                    <a href="./billPage.php" class="bill">
                        <i class="bi bi-lightbulb-fill"></i>
                        <h2>Electricity</h2>
                    </a>
                    <!-- result pin -->
                    <a href="./resultPinPage.php" class="result-pin">
                        <i class="bi bi-mortarboard-fill"></i>
                        <h2>Exam Pins</h2>
                    </a>
                    <!-- airtime to money -->
                    <a href="#" class="airtime-to-money">
                        <i class="bi bi-cash"></i>
                        <h2>Airtime To Cash</h2>
                    </a>
                    <!-- airtime to money -->
                    <a href="./profile.php" class="airtime-to-money">
                        <i class="fas fa-user"></i>
                        <h2>Profile</h2>
                    </a>
                    <a href="#" class="airtime-to-money">
                        <i class="bi bi-tag-fill"></i>
                        <h2>Pricing</h2>
                    </a>
                    <a href="#" class="airtime-to-money">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        <h2>recharge card</h2>
                    </a>
                    
                </div>
            </div>
            <br><br>
             <!-- whatsapp us -->
            <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
            <i class="fab fa-whatsapp"></i>
                <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
            </a>
            <!-- <div class="finalContainer">
                <div>
                    <h4>Referal Link </h4>
                    <input type="text" value="mubarak306" id="Refer" disabled> <i class="far fa-clipboard" onclick="CopyReferalCode()"></i>
                </div><br>

                <div>
                    <h4>Total Commission</h4>
                    <span>₦10,000</span>
                </div><br>

                <div>
                    <h4>Total Referral</h4>
                    <span>5</span>
                </div>
            </div> -->

                <!-- Example content here -->
            </div>
        </div>
    </div>

    <script>
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const isOpen = sidebar.style.left === '-15rem' || !sidebar.style.left;
            sidebar.style.left = isOpen ? '0px' : '-15rem';

            const toggleIcon = document.querySelector(".navbar");
            toggleIcon.classList.toggle('open');
        }

        document.addEventListener("DOMContentLoaded", function () {
            const withArrowElements = document.querySelectorAll(".with-arrow");

            withArrowElements.forEach(element => {
                element.addEventListener("click", function () {
                    this.classList.toggle('open');

                    const submenu = this.querySelector(".submenu");

                    if (submenu) {
                        submenu.style.display = submenu.style.display === "block" ? "none" : "block";
                    }
                });
            });
        });


        function CopyReferalCode() {
  /* Get the text field */
  var copyText = document.getElementById("Refer");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
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