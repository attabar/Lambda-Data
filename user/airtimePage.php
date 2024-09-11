<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airtime</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/airtime.css">
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg">
</head>
<body>
  <div class="container">
    <!-- sidebar container -->
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
        <div class="form-container">

          <h2>Top Up Airtime</h2>
          <form id="airtimeForm">

          <div>
            <label for="options" class="form-label">Network<span style="color: red;">*</span></label>
            <select name="network_id" id="network_id" onchange="togglePopDownInput()">
              <option>------</option>
              <option value="1">MTN</option>
              <option value="3">Airtel</option>
              <option value="6">Glo</option>
              <option value="2">9Mobile</option>
            </select>
          </div>
                  
          <div id="hidden">
            <label for="airtime_type" class="form-label">Airtime Type</label>
            <select id="airtime_type" name="airtime_type">
              <option id='vtu' value="VTU">VTU</option>
            </select>
          </div>

          <div>
            <label for="mobile_number" class="form-label">Phone Number<span style="color: red;">*</span></label>
            <input type="number" name="mobile_number" id="mobile_number">
          </div>

          <div>
            <label for="amount" class="form-label">Amount<span style="color: red;">*</span></label>
            <select name="amount" id="amount" >
              <option value="">Select Amount</option>
            </select>
          </div>

          <div>
            <label for="amountToPay" class="form-label">Amount to Pay</label>
            <input type="number" name="amountToPay" id="amountToPay" placeholder="0">
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
    let sidebar = document.getElementById('sidebar');
    let isOpen = sidebar.style.left === '-15rem';
    sidebar.style.left = isOpen ? '0px' : '-15rem';

    let toggleIcon = document.querySelector(".navbar");
    toggleIcon.classList.toggle('open');
  }
  
</script>
<script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/airtimeOptions.js"></script>
<script src="./assets/JS/buyAirtime.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
</body>
</html>