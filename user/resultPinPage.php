<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Pin</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/result.css">
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
          <h2 class="">Result Pin</h2>
          <form id="tvCableSubForm" method="POST" action="./assets/PHP/buyResultPin.php">

          <div>
            <label for="exam_name" class="form-label">Exam Name<span style="color: red;">*</span></label>
            <select name="exam_name" id="exam_name">
              <option disabled selected>---Exam Name---</option>
              <option value="WAEC">WAEC</option>
              <option value="NECO">NECO</option>
              <option value="NABTEB">NABTEB</option>
            </select>
          </div>

          <div>
            <label for="quantity" class="form-label">Quantity<span style="color: red;">*</span></label>
            <input type="number" name="quantity" id="quantity" placeholder="quantity 1, 2, Or 5">
          </div>

          <div>
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" placeholder="0">
          </div>


          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">Top Up</button>
          </div>
        </form>
      </div>
      <!-- end of main content -->
    </div>
  </div>
<script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
<script>
  const toggleSidebar = () => {
    let sidebar = document.getElementById("sidebar");
    let isOpen = sidebar.style.left === "-15rem";
    sidebar.style.left = isOpen ? "0px" : "-15rem";

    let toggleBar = document.querySelector(".navbar");
    toggleBar.classList.toggle("open");
  }
</script>

</body>
</html>