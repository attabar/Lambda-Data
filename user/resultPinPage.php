<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Pin</title>
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
              <form id="tvCableSubForm" method="POST" action="./assets/PHP/buyResultPin.php">
                <h2 class="">Result Pin</h2>
                <div class="form-group">
                  <label for="exam_name" class="form-label">Exam Name</label>
                  <select class="form-select" name="exam_name" id="exam_name">
                    <option disabled selected>---Exam Name---</option>
                    <option value="WAEC">WAEC</option>
                    <option value="NECO">NECO</option>
                    <option value="NABTEB">NABTEB</option>
                  </select>
                </div>

          <div class="form-group mt-2">
            <label for="quantity" class="form-label">Quantity<span style="color: red;">*</span></label>
            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="quantity 1, 2, Or 5">
          </div>

          <div class="form-group mt-2">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="0">
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
          <p>Transfer</p>
        </a>
      </div>
    </nav>
<script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/logout.js"></script>
<script src="./assets/JS/user.js"></script>


</body>
</html>