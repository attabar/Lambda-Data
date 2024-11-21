<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airtime</title>
    <!-- custom css file -->
    <!-- <link rel="stylesheet" href="./assets/CSS/data.css">
    <link rel="stylesheet" href="./assets/CSS/dashboard.css"> -->
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
  
    <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card bg-dark p-4 shadow rounded my-3 p-5">
          <div class="body">
          <h2 class="text-center text-white">Airtime</h2>
          <form id="airtimeForm">

          <div class="form-group mt-2">
            <label for="options" class="form-label text-white"><strong> Network </strong></label>
            <select name="network_id" class="form-select" id="network_id" onchange="togglePopDownInput()">
              <option>------</option>
              <option value="1">MTN</option>
              <option value="3">Airtel</option>
              <option value="6">Glo</option>
              <option value="2">9Mobile</option>
            </select>
          </div>
                  
          <div class="form-group mt-2">
            <label for="airtime_type" class="form-label text-white"><strong> Airtime Type </strong></label>
            <select id="airtime_type" class="form-select" name="airtime_type">
              <option id='vtu' value="VTU">VTU</option>
            </select>
          </div>

          <div class="form-group mt-2">
            <label for="mobile_number" class="form-label text-white"><strong> Phone Number </strong></label>
            <input type="number" class="form-control" name="mobile_number" id="mobile_number">
          </div>

          <div class="form-group mt-2">
            <label for="amount" class="form-label text-white"><strong> Amount </strong></label>
            <select name="amount" class="form-select" id="amount" >
              <option value="">Select Amount</option>
            </select>
          </div>

          <div class="form-group mt-2">
            <label for="amountToPay" class="form-label text-white"><strong> Amount to Pay </strong></label>
            <input type="number" class="form-control" readonly name="amountToPay" id="amountToPay" placeholder="0">
          </div>

          <div class="form-group mt-2">
            <button type="submit" class="btn bg-primary text-light form-control" id="btn" name="submit">Top Up</button>
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
<script src="./assets/JS/airtimeOptions.js"></script>
<script src="./assets/JS/buyAirtime.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
</body>
</html>