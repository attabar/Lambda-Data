 <?php require_once './assets/PHP/dashboard.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <!-- custom css file -->
    <!-- <link rel="stylesheet" href="./assets/CSS/dashboard.css"> -->
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
    <script src="../../fontawesome-free-6.4.0-web/js/all.min.js"></script>
        <link rel="stylesheet" href="../../fontawesome-free-6.4.0-web/css/all.min.css">
</head>

<body>

    <ul class="container-fluid nav d-flex justify-content-around bg-light p-2 shadow fixed-top">
        <li class="nav-item">
            <a class="nav-link" href="#" id="fullname"></a>
        </li>
        <li class="nav-item">
            <i class="bi bi-bell-fill"></i><sub style="background-color:red; color: #fff;border-radius: 5px;">10+</sub>
        </li>
    </ul><br>

    <div class="table-responsive-sm mt-5">
        <h2>Data Transactions</h2>        
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>ID</th>
    <th>Transaction ID</th>
    <th>Plan Network</th>
    <th>Mobile Number</th>
    <th>Plan</th>
    <th>Status</th>
    <th>Plan Name</th>
    <th>Plan Amount</th>
    <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <!-- <td id="id"></td>
        <td id="transaction_id"></td>
        <td id="plan_network"></td>
        <td id="mobile_number"></td>
        <td id="plan"></td>
        <td id="status"></td>
        <td id="plan_name"></td>
        <td id="plan_amount"></td>
        <td id="create_date"></td> -->
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
      <tr>
        <td>4</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
      <tr>
        <td>5</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
    </tbody>
  </table>
  </div>

  <div class="table-responsive-sm mt-5">
        <h2>Airtime Transactions</h2>        
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>ID</th>
    <th>Transaction ID</th>
    <th>Plan Network</th>
    <th>Mobile Number</th>
    <th>Plan</th>
    <th>Status</th>
    <th>Plan Name</th>
    <th>Plan Amount</th>
    <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <!-- <td id="id"></td>
        <td id="transaction_id"></td>
        <td id="plan_network"></td>
        <td id="mobile_number"></td>
        <td id="plan"></td>
        <td id="status"></td>
        <td id="plan_name"></td>
        <td id="plan_amount"></td>
        <td id="create_date"></td> -->
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
      <tr>
        <td>4</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
      <tr>
        <td>5</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
        <td>Female</td>
        <td>Yes</td>
        <td>Yes</td>
      </tr>
    </tbody>
  </table>
  </div>


            <br><br>
             <!-- whatsapp us -->
            <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
            <i class="fab fa-whatsapp"></i>
                <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
            </a>
            </div>
            
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

<script src="./assets/JS/user.js"></script>
    <!-- wallet account file -->
    <script src="./assets/JS/transaction.js"></script>
    <script src="./assets/JS/logout.js"></script>
</body>
</html>