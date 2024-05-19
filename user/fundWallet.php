<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Wallet</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./CSS/fund.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"> -->
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
        <h2 class="">AUTOMATED FUNDING</h2>
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
<script src="./JS/fundWallet.js"></script>
</body>
</html>