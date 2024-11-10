<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Your Commission To Main Balance</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/exchange.css">
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <h2 class="">Send Your Commission To Main Balance</h2>
        <form id="dataForm">

        <div class="">
            <label for="mobile" class="form-label">Total Commission</label>
            <input type="number" name="mobile_number" id="mobile_number" disabled placeholder="₦1500,000">
          </div>

          <div class="">
            <label for="mobile" class="form-label">Amount To Send<span style="color: red;">*</span></label>
            <input type="number" name="mobile_number" id="mobile_number" placeholder="₦15,000">
          </div>

          
          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">Send</button>
          </div>

        </form>
      </div>
      </div>
       <!-- whatsapp us -->
       <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
          <i class="fab fa-whatsapp"></i>
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

                <a href="./exchange.php">
                    <i class="fa fa-exchange" aria-hidden="true"></i> 
                    <p>Exchange</p>
                </a>
            </div>
      <!-- end of main content -->
    </div>
  </div>
  <script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/dataOptions.js"></script>
<script src="./assets/JS/buyData.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
</body>
</html>