<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Pin</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/result.css">
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
      <p>Hi, <span id="username"></span></p>
      <i class="bi bi-bell-fill"></i>
      </div>
      <!-- Your main content goes here -->
      <div class="main-content">
        <div class="form-container">
          <h2 class="">Result Pin</h2>
          <form id="tvCableSubForm" method="POST" action="./assets/PHP/buyResultPin.php">

          <div>
            <label for="exam_name" class="form-label">Exam Name<span style="color: red;">*</span></label>
            <select name="exam_name" id="exam_name">
              <option disabled selected>---Exam Name---</option>
              <option value="WAEC">WAEC</option>
              <option value="NECO">NECO</option>
              <option value="NABTEB">NABTEB</option>
            </select>
          </div>

          <div>
            <label for="quantity" class="form-label">Quantity<span style="color: red;">*</span></label>
            <input type="number" name="quantity" id="quantity" placeholder="quantity 1, 2, Or 5">
          </div>

          <div>
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" placeholder="0">
          </div>


          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">Top Up</button>
          </div>
        </form>
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

    let toggleBar = document.querySelector(".navbar");
    toggleBar.classList.toggle("open");
  }
</script>

</body>
</html>