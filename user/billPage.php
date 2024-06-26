<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./CSS/airtime.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logo.jpg">
</head>
<body>
  <div class="container">
    <!-- sidebar container -->
    <div class="sidebar">
      <!-- Your sidebar content goes here -->
      <div class="sidebar-content">
        <ul>
          <li><a href="./dashboard.php"><i class="bi bi-columns-gap"></i> Dashboard</a></li>
          <li class="with-arrow account"><i class="fas fa-user"></i> Account <i class="bi bi-chevron-down"></i>
          <!-- submenu for account -->
          <ul class="submenu">
            <li><i class="bi bi-arrow-right-short"></i> Profile</li>
            <li><i class="bi bi-arrow-right-short"></i> Upgrade Account</li>
            <li><i class="bi bi-arrow-right-short"></i> KYC</li>
            <li><i class="bi bi-arrow-right-short"></i> Pin Management</li>
            <li><i class="bi bi-arrow-right-short"></i> Change Password</li>
          </ul>
          </li>
          <li><a href="./fundWallet.php"><i class="fas fa-wallet"></i> Fund Wallet</a></li>
          <li><a href="./dataPage.php"><i class="fas fa-wifi"></i> Buy Data</a></li>
          <li><a href="./airtimePage.php"><i class="fas fa-phone"></i> Buy Airtime</a></li>
          <li><a href="./billPage.php"><i class="fas fa-lightbulb"></i> Bills</a></li>
          <li><i class="fas fa-dollar-sign"></i> Transactions</li>
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
        <button class="navbar">&#9776;</button>
      </div>
      <!-- Your main content goes here -->
      <div class="main-content">
        <div class="form-container">
          <h2 class="">Buy Electricity Bill</h2>
          <form id="billForm" method="POST" action="./PHP/buyBill.php">

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
            <button type="submit" class="btn" id="btn" name="submit">Pay</button>
          </div>
        </form>
      </div>
      <!-- end of main content -->
    </div>
  </div>
<script src="./JQUERY/jquery.js"></script>
<script src="./SweetAlert/sweetalert.js"></script>
<!-- <script src="./JS/redirect.js"></script> -->
<!-- <script src="./JS/buyBill.js"></script> -->
<script>
$('document').ready(function(){
    $('.navbar').click(function(e){
        e.preventDefault();
        $('.sidebar').toggle();
    });
    $('.account').click(function(){
        $(this).toggleClass('open');
        $(this).find('.submenu').toggle();
    });
})
</script>

<script>
        function togglePopDownInput(){
          var optionsDropDown = document.getElementById("network_id");
          var hiddenInput = document.getElementById("hidden");
          // Reset the display property of all options
          document.getElementById("vtu").style.display = "block";
    
          if(optionsDropDown.value === "1" || optionsDropDown.value === "3" || optionsDropDown.value === "2" || optionsDropDown.value === "6"){
            hiddenInput.style.display = "block";
            // document.getElementById("fourthType").style.display = "none";
          }
        }
</script>
</body>
</html>