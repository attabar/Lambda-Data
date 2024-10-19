<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airtime</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/airtime.css">
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg">
</head>
<body>
  <div class="container">

    <div class="content">
      <!-- header -->
      <div class="header">
      <p>Hi, <span id="fullname"></span></p>
                <p><i class="bi bi-bell-fill"></i><sub style="background-color:red; color: #fff;border-radius: 5px;">10+</sub></p>
      </div>
      </div>
      <!-- Your main content goes here -->
      <div class="main-content">

      <div class="padd">
        <div class="form-container">
          <h2>Top Up Airtime</h2>
          <form id="airtimeForm">

          <div>
            <label for="options" class="form-label">Network<span style="color: red;">*</span></label>
            <select name="network_id" id="network_id" onchange="togglePopDownInput()">
              <option>------</option>
              <option value="1">MTN</option>
              <option value="3">Airtel</option>
              <option value="6">Glo</option>
              <option value="2">9Mobile</option>
            </select>
          </div>
                  
          <div id="hidden">
            <label for="airtime_type" class="form-label">Airtime Type</label>
            <select id="airtime_type" name="airtime_type">
              <option id='vtu' value="VTU">VTU</option>
            </select>
          </div>

          <div>
            <label for="mobile_number" class="form-label">Phone Number<span style="color: red;">*</span></label>
            <input type="number" name="mobile_number" id="mobile_number">
          </div>

          <div>
            <label for="amount" class="form-label">Amount<span style="color: red;">*</span></label>
            <select name="amount" id="amount" >
              <option value="">Select Amount</option>
            </select>
          </div>

          <div>
            <label for="amountToPay" class="form-label">Amount to Pay</label>
            <input type="number" name="amountToPay" id="amountToPay" placeholder="0">
          </div>

          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">Top Up</button>
          </div>
        </form>
      </div>
      </div>
       <!-- whatsapp us -->
       <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
            <i class="fab fa-whatsapp"></i>
                <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
            </a>
            <section class="sidebar" id="sidebar">
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
            </section>
      <!-- end of main content -->
    </div>
  </div>
<script>
  function toggleSidebar() {
    let sidebar = document.getElementById('sidebar');
    let isOpen = sidebar.style.left === '-15rem';
    sidebar.style.left = isOpen ? '0px' : '-15rem';

    let toggleIcon = document.querySelector(".navbar");
    toggleIcon.classList.toggle('open');
  }
  
</script>
<script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/airtimeOptions.js"></script>
<script src="./assets/JS/buyAirtime.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
</body>
</html>