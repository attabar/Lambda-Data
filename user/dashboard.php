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
        <div class="content">
            <!-- header -->
            <div class="header">
                <p>Hi, <span id="username"></span></p>
                <i class="bi bi-bell-fill"></i>
            </div><br>

            <!-- Your main content goes here -->
            <div class="main-content">
                <!-- <h4 style="color:black;padding:35px" class="welcomingUser">Hi, <span id="username"></span></h4> -->
            <div class="balanceContainer">
                
                <div class="balance">
                    <i class="fas fa-wallet"></i>
                    <p>Available Balance</p>
                    <h5>
                        <p id="accBalance">₦0.00</p>
                        <p class="fa fa-eye" aria-hidden="true"></p>
                    </h5>
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
                        <h4>Airtime</h4>
                    </a>
                    <!-- data -->
                    <a href="./dataPage.php" class="data">
                        <i class="bi bi-wifi"></i>
                        <h4>Data</h4>
                    </a>
                    
                    <!-- tv -->
                    <a href="./tvCableSubPage.php" class="tv">
                        <i class="bi bi-tv"></i>
                        <h4>Cable Tv</h4>
                    </a>
                    <!-- bill -->
                    <a href="./billPage.php" class="bill">
                        <i class="bi bi-lightbulb-fill"></i>
                        <h4>Electricity</h4>
                    </a>
                    <!-- result pin -->
                    <a href="./resultPinPage.php" class="result-pin">
                        <i class="bi bi-mortarboard-fill"></i>
                        <h4>Exam Pins</h4>
                    </a>
                    <!-- airtime to money -->
                    <a href="#" class="airtime-to-money">
                        <i class="bi bi-cash"></i>
                        <h4>Airtime To Cash</h4>
                    </a>
                    <!-- airtime to money -->
                    <a href="./profile.php" class="airtime-to-money">
                        <i class="fas fa-user"></i>
                        <h4>Profile</h4>
                    </a>
                    <a href="#" class="airtime-to-money">
                        <i class="bi bi-tag-fill"></i>
                        <h4>Pricing</h4>
                    </a>
                    <a href="#" class="airtime-to-money">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        <h4>recharge card</h4>
                    </a>

                    <a href="./resultPinPage.php">
                        <i class="bi bi-mortarboard-fill"></i>
                        <h4>Result Pin</h4>
                    </a>

                    <a href="./billPage.php">
                        <i class="fas fa-lightbulb"></i>
                         <h4>Bills</h4>
                    </a>

                    <a href="">
                        <i class="fa fa-book" aria-hidden="true"></i> 
                        <h4>Transactions</h4>
                    </a>

                    <a href="">
                        <i class="fa fa-users" aria-hidden="true"></i> 
                        <h4>Referrals</h4>
                    </a>

                    <a href="" id="logout">
                        <i class="bi bi-box-arrow-left"></i> 
                        <h4>Logout</h4>
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
            </div><br/><br><br/><br><br/><br>
            
            <div class="sidebar" id="sidebar">
                <a href="./dashboard.php">
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

                <a href="/">
                    <i class="bi bi-gear-fill"></i> 
                    <p>Settings</p>
                </a>
            </div>
    </div>
</div>

    <script>
        // function toggleMenu() {
        //     const sidebar = document.getElementById('sidebar');
        //     const isOpen = sidebar.style.left === '0px' || !sidebar.style.left;
        //     sidebar.style.left = isOpen ? '-15rem' : '0px';

        //     const toggleIcon = document.querySelector(".navbar");
        //     toggleIcon.classList.toggle('open');
        // }

        // document.addEventListener("DOMContentLoaded", function () {
        //     const withArrowElements = document.querySelectorAll(".with-arrow");

        //     withArrowElements.forEach(element => {
        //         element.addEventListener("click", function () {
        //             this.classList.toggle('open');

        //             const submenu = this.querySelector(".submenu");

        //             if (submenu) {
        //                 submenu.style.display = submenu.style.display === "block" ? "none" : "block";
        //             }
        //         });
        //     });
        // });


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