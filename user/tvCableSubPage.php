<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tv Sub</title>
    <!-- custom css file -->
    <!-- <link rel="stylesheet" href="./assets/CSS/tv.css">
    <link rel="stylesheet" href="./assets/CSS/dashboard.css"> -->
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- bootstrap cdn-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
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
              <form id="tvCableSubForm" method="POST" action="./assets/PHP/buyCableSub.php">
                <h2 class="text-center">Tv Sub</h2>
                <div class="error" role="alert"></div>

                <div class="form-group">
                  <label for="cable_name" class="form-label"><strong> Cable Name </strong></label>
                  <select name="cable_name" id="cable_name" class="form-select">
                    <option disabled selected>---Select Cable name---</option>
                    <option value="1">GOTV</option>
                    <option value="2">DSTV</option>
                    <option value="3">STARTIME</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="cable_plan_id" class="form-label"><strong> Cable Plan </strong></label>
                  <select name="cable_plan_id" id="cable_plan_id" class="form-select">
                    <option value="0" disabled selected>---Select Cable Plan---</option>
                    <option value="2">GOtv Max - 7200</option>
                    <option value="6">DStv Yanga - 5100</option>
                    <option value="7">DStv Compact - 	15700</option>
                  </select>
                </div>

                <div class="form-group mt-2">
                  <label for="smart_card_number" class="form-label">Smart card number</label>
                  <input type="number" name="smart_card_number" id="smart_card_number" placeholder="Smart card Number" class="form-control">
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

    <!-- whatsapp -->
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
          <p>Transfer</p>
        </a>
      </div>
    </nav>
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