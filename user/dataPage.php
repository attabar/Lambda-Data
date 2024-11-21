<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
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
        <div class="card p-4 bg-dark shadow rounded my-3 p-5">
          <div class="body">
            <form id="dataForm">
              <h2 class="text-center text-white">Data</h2>
              <div class="error" role="alert"></div>
              <div class="form-group">
                <label for="network_id" class="text-white"><strong>Network</strong></label>
                <select class="form-select" id="network_id" name="network_id" required>
                  <option disabled selected>--Select Network--</option>
                  <option value="1">MTN</option>
                  <option value="3">Airtel</option>
                  <option value="2">Glo</option>
                  <option value="6">9Mobile</option>
                </select>
              </div>
  
              <div class="form-group mt-2">
                <label for="network_id" class="text-white"><strong>Plan Type</strong></label>
                <select class="form-select" id="plan_id" name="plan_id" required>
                  <option disabled selected>------</option>
                </select>
              </div>

            <div class="form-group mt-2">
              <label for="mobile" class="form-label text-white"><strong> Phone Number</strong></label>
              <input type="tel" class="form-control" name="mobile_number" id="mobile_number" required maxlength="11" placeholder="+2348149715017">
            </div>

          <div class="form-group mt-2">
            <label for="data_type" class="form-label text-white"><strong> Data Type</strong></label>
            <input type="text" class="form-control" id="data_type" name="data_type" required>
          </div>
          
          <div class="form-group mt-2">
            <label for="amount" class="form-label text-white">Price</label>
            <input type="number" class="form-control" readonly placeholder="0" name="amount" id="amount" required>
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
<script>
function toggleMenu(){
  let sidebar = document.getElementById("sidebar");
  let isOpen = sidebar.style.left === "-15rem";
  sidebar.style.left = isOpen ? "0px" : "-15rem";

  let toggleIcon = document.querySelector(".navbar");
  toggleIcon.classList.toggle("open");
}

</script>
<script src="./assets/JS/dataOptions.js"></script>
<script src="./assets/JS/buyData.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
</body>
</html>