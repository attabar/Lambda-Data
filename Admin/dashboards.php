<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard || Admin</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
        <a href="./notifications.php" class="nav-item">
            <i class="bi bi-bell-fill"></i><sub style="background-color:red; color: #fff;border-radius: 5px;">10+</sub>
        </a>
    </ul>

    <div class="container bg-dark py-4 text-light my-5 align-item-center">
        <div class="d-flex justify-content-around">
            <div class="text-center">
                <i class="fas fa-wallet"></i>
                <p>Available Balance</p>
                <h5>
                    <p id="accBalance" class="text-light"></p>
                    <!-- <p class="fa fa-eye" aria-hidden="true"></p> -->
                    <i onclick="hideShowBalance()" class="fa fa-eye text-light" id="toggleEye" aria-hidden="true" style="cursor: pointer;"></i>
                </h5>
            </div>
    
            <div class="text-light text-center">
                <!-- <i class="fa fa-money card-header" aria-hidden="true"></i>  -->
                <i class="fa fa-line-chart" aria-hidden="true"></i>
                <p>Daily profits</p>
                <p>1,000</p>
            </div>

            <div class="text-light text-center">
                <i class="fa fa-users card-header" aria-hidden="true"></i> 
                <p>All Users</p>
                <p>1,000</p>
            </div>
        </div>
    </div>
    
            <div class="container table-responsive-sm mt-5">
        <h2>Daily Transactions (Data)</h2>        
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

  <div class="container table-responsive-sm mt-5">
        <h2>Daily Transactions (Airtime)</h2>        
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
            
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
        <div class="container-fluid text-center">
            <a href="./dashboard.php" class="">
                <i class="fa fa-home" aria-hidden="true"></i> 
                <p>Home</p>
            </a>

            <a href="./transactions.php">
                <i class="fa fa-book" aria-hidden="true"></i> 
                <p>History</p>
            </a>

            <a href="./prices.php">
                <!-- <i class="fa fa-money" aria-hidden="true"></i> -->
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <p>Price</p>
            </a>

            <a href="./users.php">
                <i class="fa fa-users" aria-hidden="true"></i>  
                <p>Users</p>
            </a>

            <a href="./exchange.php">
                <i class="bi bi-box-arrow-left"></i>
                <p>Logout</p>
            </a>
        </div>
    </nav>
</div>

<script>
let isBalanceVisible = true;

function hideShowBalance () {
    const accBalance = document.getElementById('accBalance');
    const toggleEye = document.getElementById('toggleEye');

    // toggleEye.addEventListener("click", function() {})

    if (isBalanceVisible) {
        // Hide the balance and show the closed eye icon
        accBalance.textContent = '₦****';
        toggleEye.classList.remove('fa-eye');
        toggleEye.classList.add('fa-eye-slash');
    } else {
        // Show the balance and revert the eye icon
        accBalance.textContent = 'N100,000';
        toggleEye.classList.remove('fa-eye-slash');
        toggleEye.classList.add('fa-eye');
        // !isBalanceVisible;
    }
    isBalanceVisible = !isBalanceVisible; // Toggle the state
}
</script>
<script src="./assets/JS/createWallet.js"></script>
<script src="./assets/JS/user.js"></script>
    <!-- wallet account file -->
    <script src="./assets/JS/walletInfo.js"></script>
    <!-- account balance -->
    <script src="./assets/JS/balance.js"></script>
    <script src="./assets/JS/logout.js"></script>
</body>
</html>