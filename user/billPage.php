<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <!-- custom css file -->
    <!-- <link rel="stylesheet" href="./assets/CSS/bill.css">
    <link rel="stylesheet" href="./assets/CSS/dashboard.css"> -->
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
    <!-- bootstrap cdn-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <!-- Nav -->
    <ul class="container-fluid nav d-flex justify-content-around bg-light p-2 shadow fixed-top">
      <li class="nav-item">
          <a class="nav-link" href="#" id="fullname"></a>
      </li>
      <li class="nav-item">
          <i class="bi bi-bell-fill"></i><sub style="background-color:red; color: #fff;border-radius: 5px;">10+</sub>
      </li>
    </ul>

    <!-- form -->
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <div class="card p-4 shadow rounded my-3 p-5 bg-dark">
            <div class="body">
              <form id="billForm" action="./assets/PHP/buyBill.php" method="POST">
                <h2 class="text-center text-white">Bill</h2>
                <div class="error" role="alert"></div>

                <div class="form-group">
                  <label for="disco_name" class="form-label text-white"><strong> Disco Name </strong></label>
                  <select name="disco_name" id="disco_name" class="form-select">
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

                <div class="form-group">
                  <label for="amount" class="form-label text-white"><strong> Amount </strong></label>
                  <input type="number" class="form-control" name="amount" id="amount" required>
                </div>

                <div class="form-group mt-2">
                  <label for="smart_card_number" class="form-label text-white"><strong> Smart card number </strong></label>
                  <input type="number" class="form-control" name="smart_card_number" id="smart_card_number" placeholder="Smart card Number" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                  <label for="meter_number" class="form-label text-white"><strong> Meter Number </strong></label>
                  <input type="number" class="form-control" name="meter_number" id="meter_number" placeholder="Meter Number" required>
                </div>

                <div>
                  <label for="meter_type" class="form-label text-white"><strong> Meter Type </strong></label>
                  <select name="meter_type" id="meter_type" class="form-select" required>
                    <option value="0" disabled selected>---Select Meter Type---</option>
                    <option value="1">Prepaid</option>
                    <option value="2">Postpaid</option>
                  </select>
                </div>

                <div class="form-group">
                    <label for="check"></label>
                    <button type="submit" name="submit" id="btn" class="btn bg-primary text-light form-control" id="submitBtn">Top Up</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
      <i class="fab fa-whatsapp"></i>
      <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
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
          <p>Exchange</p>
        </a>
      </div>
    </nav>
   
  </div>
<script src="./assets/SweetAlert/sweetalert.js"></script>
<!-- <script src="./assets/JS/buyBill.js"></script> -->
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
</body>
</html>