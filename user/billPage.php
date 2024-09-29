<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/bill.css">
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
</head>
<body>
  <div class="container">
    <!-- sidebar container -->
            <!-- sidebar container -->
           <!-- sidebar container -->
        <div class="sidebar" id="sidebar">
            <!-- Your sidebar content goes here -->
            <div class="sidebar-content">
            <marquee><h2>Welcome <span id="username"></span></h2></marquee>
                <ul>
                    <li><a href="./dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
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
      <div class="header" onclick="toggleSidebar()">
        <div class="navbar">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </div>
      <!-- Your main content goes here -->
      <div class="main-content">
        <div class="form-container">
          <h2 class="">Buy Electricity Bill</h2>
          <form id="billForm" action="./assets/PHP/buyBill.php" method="POST">

          <div>
            <label for="disco_name" class="form-label">Disco Name<span style="color: red;">*</span></label>
            <select name="disco_name" id="disco_name">
              <option disabled selected>---Select disco name---</option>
              <option value="1">Ikeja Electric</option>
              <option value="2">Eko Electric</option>
              <option value="3">Abuja Electric</option>
              <option value="4">Kano Electric</option>
              <option value="5">Enugu Electric</option>
              <option value="6">Port Harcourt Electric</option>
              <option value="7">Ibadan Electric</option>
              <option value="8">Kaduna Electric</option>
              <option value="9">Jos Electric</option>
              <option value="10">Benin Electric</option>
              <option value="11">Yola Electric</option>
            </select>
          </div>

          <div>
            <label for="amount" class="form-label">Amount<span style="color: red;">*</span></label>
            <input type="number" name="amount" id="amount">
          </div>

          <div>
            <label for="meter_number" class="form-label">Meter Number</label>
            <input type="number" name="meter_number" id="meter_number" placeholder="Meter Number">
          </div>
          
          <div>
            <label for="meter_type" class="form-label">Meter Type<span style="color: red;">*</span></label>
            <select name="meter_type" id="meter_type">
              <option value="0" disabled selected>---Select Meter Type---</option>
              <option value="1">Prepaid</option>
              <option value="2">Postpaid</option>
            </select>
          </div>

          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">Top Up</button>
          </div>
        </form>
      </div>
      <!-- end of main content -->
    </div>
  </div>
  <script>
    function toggleSidebar() {
      let sidebar = document.getElementById("sidebar");
      let isOpen = sidebar.style.left === "-15rem";
      sidebar.style.left = isOpen ? "0px" : "-15rem";

      let toggleBarContainer = document.querySelector(".navbar");
      toggleBarContainer.classList.toggle("open")
    }
  </script>
<script src="./assets/SweetAlert/sweetalert.js"></script>
<!-- <script src="./assets/JS/buyBill.js"></script> -->
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
</body>
</html>