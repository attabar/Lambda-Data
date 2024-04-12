<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./CSS/data.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logo.jpg">
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
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
        <li><i class="fas fa-wallet"></i> Fund Wallet</li>
        <li><a href="./data.php"><i class="fas fa-wifi"></i> Buy Data</a></li>
        <li><i class="fas fa-phone"></i> Buy Airtime</li>
        <li><i class="fas fa-lightbulb"></i> Bills</li>
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
        <h2 class="">Buy Data</h2>
        <form id="dataForm">
          <div>
            <label for="network" class="form-label">Network<span style="color: red;">*</span></label>
            <select class="form-select form-select-lg" id="network" name="network" required>
              <option disabled selected>--Select Network--</option>
              <option value="1">MTN</option>
              <option value="3">Airtel</option>
              <option value="2">Glo</option>
              <option value="6">9Mobile</option>
            </select>
          </div>

          <div>
            <label for="plan_type" class="form-label">Plan Type<span style="color: red;">*</span></label>
            <select id="plan_id" name="plan_id" required>
            </select>
          </div>

          <div class="">
            <label for="mobile" class="form-label">Phone Number<span style="color: red;">*</span></label>
            <input type="number" name="mobile_number" id="mobile" required maxlength="11">
          </div>

          <div class="">
            <label for="data_type" class="form-label">Data Type<span style="color: red;">*</span></label>
            <input type="text" disabled id="data_type" name="data_type" required>
          </div>
          
          <div class="">
            <label for="amount" class="form-label">Price<span style="color: red;">*</span></label>
            <input type="number" class="form-control lg" placeholder="0" name="amount" id="amount" required>
          </div>
          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">Buy</button>
          </div>
        </form>
      </div>
      <!-- end of main content -->
    </div>
  </div>
  <script src="./SweetAlert/sweetalert.js"></script>
<script src="./JQUERY/jquery.js"></script>
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
    // logout
    $('#logout').click(function(e){
        e.preventDefault();
        $.ajax({
            url: './PHP/logout.php',
            type: 'GET',
            success: function(response){
                window.location.href = './loginPage.php'
            },
            error: function(xhr, status, error){
                console.log("AJAX ERROR: " + status + " - " + error);
            }
        })
    });
})
</script>
<script src="./JS/buyData.js"></script>
</body>
</html>