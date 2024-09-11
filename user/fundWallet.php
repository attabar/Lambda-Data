<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Wallet</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/fund.css">
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"> -->
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logo.jpg">
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
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
                    <li><a href="./dashboard.php"><i class="bi bi-columns-gap"></i> Dashboard</a></li>
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
      <div class="navbar" onclick="toggleSidebar()">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
    </div>
    <!-- Your main content goes here -->
    <div class="main-content">
      <h1 class="heading">FUNDING METHODS</h1>
      <!-- method 2 direct bank transfer -->
      <h2 class="method1">METHOD 1: BANK TRANSFER</h2>
      <div class="bankNames">
                <button id="monify" onclick="navigateToMonify()"><i class="fa fa-university" aria-hidden="true"></i>WEMA</button>
                <button id="paystack" onclick="navigateToPaystack()"><i class="fa fa-university" aria-hidden="true"></i>FIRST</button>
                <button id="ps9" onclick="navigateToPbs()"><i class="fa fa-university" aria-hidden="true"></i>UNITY</button>
            </div>

            <!-- account -->
            <div class="account-details">
                <!-- wema bank logo img-->
                 <div class="monifyContainer">
                    <!-- <img src="../assets/img/wemaBankLogo.jpeg" class="wemaImg" alt="" srcset=""> -->
                    <h3>Account Number: <span id="accNum">08149715017</span></h3><br>
                    <h3>Account Name: <span id="accName">Ali Goni</span><span class="chargesAmount"></span></h3>
                    <br>
                    <h3>Bank Name: <span id="bank">WEMA BANK</span></h3><br>
                    <h3>Charges Fee: ₦50</h3>
                </div>

                <div class="paystackContainer">
                    <!-- <img src="../assets/img/paystack.png" class="wemaImg" alt="" srcset=""> -->
                    <h3>Account Number: <span id="accNum2">45635797653</span></h3><br>
                    <h3>Account Name: <span id="accName2">ABBA SALEH</span><span class="chargesAmount"></span></h3><br>
                    <h3>Bank Name: <span id="bank">FIRST BANK</span></h3><br>
                    <h3>Charges Fee: ₦50</h3>
                    <br>
                </div>

                <div class="psb9Container">
                    <!-- <img src="../assets/img/psb9.png" class="wemaImg" alt="" srcset=""> -->
                    <h3>Account Number: <span id="accNum">14678934672</span></h3><br>
                    <h3>Account Name: <span id="accName">Abbas Ahmad</span><span class="chargesAmount"></span></h3>
                    <br>
                    <h3>Bank Name: <span id="bank">UNITY BANK</span></h3><br>
                    <h3>Charges Fee: ₦50</h3>
                </div>
            </div>
            <!-- funding method 2 -->
      <div class="methodTwoDiv">       
      <h2 class="method2">METHOD 2: AUTOMATED FUNDING</h2>
      <div class="form-container">
        <h2 class="">AUTOMATED FUNDING</h2>
        <i class="fas fa-wallet"></i>
        <form id="checkoutForm">  
          <div class="">
            <label for="amount" class="form-label">Amount For Funding<span style="color: red;">*</span></label>
            <input type="number" placeholder="0" name="amount" id="amount">
          </div>
          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">Fund Now</button>
          </div>
        </form>
      </div>
      </div>
          <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="spinner"></div>
    </div>
      <!-- end of main content -->
    </div>
  </div>
  <script>
    function toggleSidebar(){
      let sidebar = document.getElementById("sidebar");
      let isOpen = sidebar.style.left === "-15rem";
      isOpen = sidebar.style.left = isOpen ? "0px": "-15rem";

      let togggleBar = document.querySelector(".navbar");
      togggleBar.classList.toggle("open");
    }

    const navigateToMonify = () => {
            let monifyCon = document.querySelector(".monifyContainer").style.display = 'block';
            let paystackCon = document.querySelector(".paystackContainer").style.display = 'none';
            let ps9Con = document.querySelector(".psb9Container").style.display = 'none';
        }

        const navigateToPaystack = () => {
            let paystackCon = document.querySelector(".paystackContainer").style.display = 'block';
            let monifyCon = document.querySelector(".monifyContainer").style.display = 'none';
            let ps9Con = document.querySelector(".psb9Container").style.display = 'none';
        }

        const navigateToPbs = () => {
            let ps9Con = document.querySelector(".psb9Container").style.display = 'block';
            let paystackCon = document.querySelector(".paystackContainer").style.display = 'none';
            let monifyCon = document.querySelector(".monifyContainer").style.display = 'none';
        }

  </script>
<script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
<script src="./assets/JS/fundWallet.js"></script>
</body>
</html>