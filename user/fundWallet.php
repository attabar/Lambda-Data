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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
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
    </div>
  </div>
    <!-- Your main content goes here -->
    <div class="main-content">
      <marquee class="heading">FUNDING METHODS</marquee>
      <!-- method 2 direct bank transfer -->
      <h2 class="method1">METHOD 1: BANK TRANSFER</h2>
    
            <!-- account -->
            <div class="manual-funding">
                <!-- wema bank logo img-->
                    <img src="../assets/img/wemaBankLogo.jpeg" class="wemaImg" alt="" srcset="">
                    <h3>Account Number: <span id="accNum"></span></h3><br>
                    <h3>Account Name: <span id="accName"></span><span class="chargesAmount"></span></h3>
                    <br>
                    <h3>Bank Name: <span id="bank">WEMA BANK</span></h3><br>
                    <h3>Charges Fee: 10%</h3>
              </div>

            <!-- funding method 2 -->
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
          <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="spinner"></div>
    </div>
     <!-- whatsapp us -->
     <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
    <i class="fab fa-whatsapp"></i></a>
      <!-- end of main content -->
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
<script src="./assets/JS/walletInfo.js"></script>
<script src="./assets/JS/fundWallet.js"></script>
</body>
</html>