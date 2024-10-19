<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tv Sub</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/tv.css">
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
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
          <h2 class="">Tv Subscription</h2>
          <form id="tvCableSubForm" method="POST" action="./assets/PHP/buyCableSub.php">

          <div>
            <label for="cable_name" class="form-label">Cable Name<span style="color: red;">*</span></label>
            <select name="cable_name" id="cable_name">
              <option disabled selected>---Select Cable name---</option>
              <option value="1">GOTV</option>
              <option value="2">DSTV</option>
              <option value="3">STARTIME</option>
            </select>
          </div>
          
          <div>
            <label for="cable_plan_id" class="form-label">Cable Plan<span style="color: red;">*</span></label>
            <select name="cable_plan_id" id="cable_plan_id">
              <option value="0" disabled selected>---Select Cable Plan---</option>
              <option value="2">GOtv Max - 7200</option>
              <option value="6">DStv Yanga - 5100</option>
              <option value="7">DStv Compact - 	15700</option>
            </select>
          </div>

          <div>
            <label for="smart_card_number" class="form-label">Smart card number</label>
            <input type="number" name="smart_card_number" id="smart_card_number" placeholder="Smart card Number">
          </div>

          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">Top Up</button>
          </div>
        </form>
      </div>
        </div>
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
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>
<script>
  const toggleSidebar = () => {
    let sidebar = document.getElementById("sidebar");
    let isOpen = sidebar.style.left === "-15rem";
    sidebar.style.left = isOpen ? "0px" : "-15rem";

    let toggleSidebar = document.querySelector(".navbar");
    toggleSidebar.classList.toggle("open")
  }
</script>

</body>
</html>