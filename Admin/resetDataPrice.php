<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Data Price</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg">
    <!-- custom css -->
    <link rel="stylesheet" href="./assets/CSS/resetDataPrice.css">
</head>
<body>
<div class="container">
    <!-- sidebar container -->
    <div class="sidebar">
        <!-- Your sidebar content goes here -->
        <div class="sidebar-content">
            <ul>
                <li><a href="#"><i class="bi bi-columns-gap"></i> Dashboard</a></li>
                <li class="with-arrow account"><i class="fas fa-user"></i> Manage Users <i class="bi bi-chevron-down"></i>
                <!-- submenu for account -->
                <ul class="submenu">
                  <a href="./users.php"><li><i class="bi bi-arrow-right-short"></i>All Users</li></a>
                </ul>
                </li>
                <li class="with-arrow account"><i class="bi bi-cash"></i> Set Prices  <i class="bi bi-chevron-down"></i>
                <!-- submenu for prices -->
                <ul class="submenu">
                  <a href=".#"><li><i class="bi bi-arrow-right-short"></i> Buy Data</li></a>
                  <a href="./airtime.php"><li><i class="bi bi-arrow-right-short"></i> Buy Airtime</li></a>
                  <a href="./bill.php"><li><i class="bi bi-arrow-right-short"></i> Bills</li></a>
                  <a href="./tv.php"><li><i class="bi bi-arrow-right-short"></i>TV Cables</li></a>
                  <a href="./airtime.php"><li><i class="bi bi-arrow-right-short"></i>Result Pin History</li></a>
                </ul>
                </li>
                <li class="with-arrow account"><i class="fas fa-exchange-alt"></i> Transactions <i class="bi bi-chevron-down"></i>
                <ul class="submenu">
                    <li><a href="./data.php"><i class="bi bi-arrow-right-short"></i>Data History</a></li>
                    <li><a href="./airtime.php"><i class="bi bi-arrow-right-short"></i>Airtime History</a></li>
                    <li><i class="bi bi-arrow-right-short"></i>Bills History</li>
                    <li><i class="bi bi-arrow-right-short"></i>TV History</li>
                    <a href="./airtime.php"><li><i class="bi bi-arrow-right-short"></i>Result Pin History</li></a>
                </ul>
                </li>
                <!-- <li><i class="bi bi-cash"></i> Wallet Summary</li>
                <li class="with-arrow"><i class="bi bi-sliders"></i> Others <i class="bi bi-chevron-down"></i></li>
                <li><i class="bi bi-gear-fill"></i> Settings</li>
                <li><i class="bi bi-tag-fill"></i> Price</li> -->
                <li><i class="bi bi-bell-fill"></i> Notifications</li>
                <li id="logout"><i class="bi bi-box-arrow-left"></i> Logout</li>
            </ul>
        </div>
    </div>
    
    <div class="content">
        <!-- header -->
        <div class="header">
            <div class="navbar" onclick="toggleMenu()">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
            </div>
        </div>
        <!-- Your main content goes here -->
        <div class="main-content">
        <div class="form-container">
        <h2 class="">Buy Data</h2>
        <form id="dataForm">
          <div>
            <label for="network" class="form-label">Network<span style="color: red;">*</span></label>
            <select class="form-select form-select-lg" id="network" name="network" required>
              <option value="0" disabled selected>--Select Network--</option>
              <option value="1">MTN</option>
              <option value="3">Airtel</option>
              <option value="2">Glo</option>
              <option value="6">9Mobile</option>
            </select>
          </div>

          <div class="">
            <label for="dataType" class="form-label">Data Type<span style="color: red;">*</span></label>
            <select class="form-select form-select-lg" id="dataType" name="dataType" required>
            </select>
          </div>

          <div class="">
            <label for="buyPrice" class="form-label">Buy Price<span style="color: red;">*</span></label>
            <input type="number" class="form-control lg" placeholder="0" name="buyPrice" id="buyPrice" required>
            </select>
          </div>
          
          <div class="">
            <label for="sellPrice" class="form-label">Sell Price<span style="color: red;">*</span></label>
            <input type="number" class="form-control lg" placeholder="0" name="sellPrice" id="sellPrice" required>
          </div>
          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">RESET PRICE</button>
          </div>
        </form>
      </div>
      </div>
  </div>
<script>
  function toggleMenu() {
    let sidebar = document.getElementById('sidebar');
    let isOpen = sidebar.style.left === '-228px';
    sidebar.style.left = isOpen ? '0px' : '-228px';

    let toggleIcon = document.querySelector(".navbar");
    toggleIcon.classList.toggle('open');
  }

document.addEventListener("DOMContentLoaded", function() {
  const withArrowElements = document.querySelectorAll(".with-arrow");
  withArrowElements.forEach(element => {
    element.addEventListener("click", function(){
      this.classList.toggle("open");

      const submenu = this.querySelector(".submenu");
      if(submenu) {
        submenu.style.display = submenu.style.display === "block" ? "none" : "block"
      }
    })
  })
})

</script>
<script src="./assets/JS/resetDataPrice.js"></script>
</body>
</html>