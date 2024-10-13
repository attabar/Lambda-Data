<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/data.css">
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
      <p>Hi, <span id="username"></span></p>
      <i class="bi bi-bell-fill"></i>
    </div>
    <!-- Your main content goes here -->
    <div class="main-content">
      <div class="form-container">
        <h2 class="">Top Up Data</h2>
        <form id="dataForm">
          <div>
            <label for="network_id" class="form-label">Network<span style="color: red;">*</span></label>
            <select class="form-select form-select-lg" id="network_id" name="network_id" required>
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
            <option disabled selected>------</option>
            </select>
          </div>

          <div class="">
            <label for="mobile" class="form-label">Phone Number<span style="color: red;">*</span></label>
            <input type="tel" name="mobile_number" id="mobile_number" required maxlength="11" placeholder="+2348149715017">
          </div>

          <div class="">
            <label for="data_type" class="form-label">Data Type<span style="color: red;">*</span></label>
            <input type="text" id="data_type" name="data_type" required>
          </div>
          
          <div class="">
            <label for="amount" class="form-label">Price<span style="color: red;">*</span></label>
            <input type="number" placeholder="0" name="amount" id="amount" required>
          </div>
          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">Top Up</button>
          </div>
        </form>
      </div>
       <!-- whatsapp us -->
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