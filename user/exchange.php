<?php require_once './assets/PHP/dashboard.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Your Commission To Main Balance</title>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- bootstrap icon -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<ul class="container-fluid nav d-flex justify-content-around bg-light p-2 shadow fixed-top">
        <li class="nav-item">
            <a class="nav-link" href="#" id="fullname"></a>
        </li>
        <li class="nav-item">
            <i class="bi bi-bell-fill"></i><sub style="background-color:red; color: #fff;border-radius: 5px;">10+</sub>
        </li>
    </ul>
    \
    <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card p-4 bg-dark shadow rounded my-3 p-5">
          <div class="body">
        <h4 class="text-center text-white">Transfer Commission</h4>
        <form id="dataForm">

        <div class="form-group mt-2">
            <label for="mobile" class="form-label">Total Commission</label>
            <input type="number" class="form-control" name="mobile_number" id="mobile_number" disabled placeholder="₦1500,000">
          </div>

          <div class="form-group mt-2">
            <label for="mobile" class="form-label">Amount To Send</label>
            <input type="number" class="form-control" name="mobile_number" id="mobile_number" placeholder="₦15,000">
          </div>
          <br>
          <div id="form-group mb-2">
            <button type="submit" class="btn bg-primary text-light form-control" id="btn" name="submit">Send</button>
          </div>

        </form>
          </div>
        </div>
      </div>
    </div>
    </div>
       <!-- whatsapp us -->
       <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
          <i class="fab fa-whatsapp"></i>
      </a>
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
                <p>Transfer</p>
            </a>
        </div>
    </nav>
</div>
     
  <script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/dataOptions.js"></script>
<script src="./assets/JS/buyData.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
</body>
</html>