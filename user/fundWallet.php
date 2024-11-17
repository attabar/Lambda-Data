<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Wallet</title>
    <!-- custom css file -->
    <!-- <link rel="stylesheet" href="./assets/CSS/fund.css"> -->
    
    <!-- <link rel="stylesheet" href="./assets/CSS/dashboard.css"> -->
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <script src="../../fontawesome-free-6.4.0-web/js/all.min.js"></script>
        <link rel="stylesheet" href="../../fontawesome-free-6.4.0-web/css/all.min.css">
</head>
<body>
  <div class="container">
    <ul class="container-fluid nav d-flex justify-content-around bg-light p-2 shadow fixed-top">
      <li class="nav-item">
          <a class="nav-link" href="#" id="fullname"></a>
      </li>
      <li class="nav-item">
          <i class="bi bi-bell-fill"></i><sub style="background-color:red; color: #fff;border-radius: 5px;">10+</sub>
      </li>
    </ul>
    <br><br><br><br>
      <select class="form-select mb-2" name="" id="paymentMethodContainer">
        <option value="" disabled selected>Select payment Method</option>
        <option value="transfer" id="transfer">BANK TRANSFER</option>
        <option value="auto" id="auto">AUTOMATED FUNDING</option>
      </select>
    
      <!-- account -->
      <div class="manual-funding container bg-light shadow" style="display: none;">
          <!-- wema bank logo img-->
          <img src="../assets/img/wemaBankLogo.jpeg" style="width:50px" class="d-block w-10" alt="" srcset="">
          <h3>Account Number: <span id="accNum"></span></h3><br>
          <h3>Account Name: <span id="accName"></span><span class="chargesAmount"></span></h3>
          <br>
          <h3>Bank Name: <span id="bank">WEMA BANK</span></h3><br>
          <h3>Charges Fee: 10%</h3>
        </div>

      <!-- funding method 2 -->

      <div class="container form-container" style="display: none;">
    <div class="row justify-content-center">
      <div class="col-sm-6">
      <div class="card p-4 my-5 shadow">
      <div class="body">
      <form id="checkoutForm">
        <h3 class="text-center">AUTOMATED FUNDING</h3><br>
        <div class="error" role="alert"></div>

        <div class="form-group">
          <label class="form-label" for="amount">Amount For Funding<span style="color: red;">*</span></label>
          <input type="number" placeholder="0" name="amount" id="amount" class="form-control mb-3 rounded" id="amount">
        </div>
  
        <div class="center"><h5 class="loading"></h5></div>
        <button type="submit" id="btn" name="submit" class="btn btn-primary w-100 my-2" id="submitBtn">Fund Now</button>

    </form>
</div>
</div>
</div>
    </div>
  </div>
            
          <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="spinner"></div>
    </div>
     <!-- whatsapp us -->
     <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
    <i class="fab fa-whatsapp"></i></a>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
        <div class="container-fluid text-center">
            <a href="./dashboard.php" class="">
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
    </nav>
</div>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("paymentMethodContainer").addEventListener("change", function(e){
        e.preventDefault();

        var paymentMethodContainer = document.getElementById("paymentMethodContainer").value;
        if(paymentMethodContainer === 'transfer') { 
          document.querySelector(".manual-funding").style.display = 'block';
          document.querySelector(".form-container").style.display = 'none';
        }
        else if(paymentMethodContainer === 'auto') { 
          document.querySelector(".manual-funding").style.display = 'none';
          document.querySelector(".form-container").style.display = 'block';
        }
    });
  })
  </script>
<script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
<script src="./assets/JS/walletInfo.js"></script>
<script src="./assets/JS/fundWallet.js"></script>
</body>
</html>