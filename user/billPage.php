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
    
    <div class="content">
      <!-- header -->
      <div class="header">
      <p>Hi, <span id="fullname"></span></p>
      <p><i class="bi bi-bell-fill"></i><sub style="background-color:red; color: #fff;border-radius: 5px;">10+</sub></p>
      </div>
      <!-- Your main content goes here -->
      <div class="main-content">
        <div class="padd">
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
        </div>
      <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
            <i class="fab fa-whatsapp"></i>
                <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
            </a>
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