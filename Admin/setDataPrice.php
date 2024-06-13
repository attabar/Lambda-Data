<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./CSS/AdminDashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logo.jpg">
    <!-- custom css -->
    <link rel="stylesheet" href="./CSS/set_data_price.css">
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
                    <li><a href="./allUsers.php"><i class="bi bi-arrow-right-short"></i>All Users</a></li>
                    <li><i class="bi bi-arrow-right-short"></i>Add User</li>
                </ul>
                </li>
                <li class="with-arrow account"><i class="bi bi-cash"></i> Set Prices  <i class="bi bi-chevron-down"></i>
                <!-- submenu for prices -->
                <ul class="submenu">
                    <li><a href="./data.php"><i class="bi bi-arrow-right-short"></i> Buy Data</a></li>
                    <li><a href="./airtime.php"><i class="bi bi-arrow-right-short"></i> Buy Airtime</a></li>
                    <li><i class="bi bi-arrow-right-short"></i> Bills</li>
                    <li><i class="bi bi-arrow-right-short"></i>TV Cables</li>
                </ul>
                </li>
                <li class="with-arrow account"><i class="fas fa-exchange-alt"></i> Transactions <i class="bi bi-chevron-down"></i>
                <ul class="submenu">
                    <li><a href="./data.php"><i class="bi bi-arrow-right-short"></i>Data History</a></li>
                    <li><a href="./airtime.php"><i class="bi bi-arrow-right-short"></i>Airtime History</a></li>
                    <li><i class="bi bi-arrow-right-short"></i>Bills History</li>
                    <li><i class="bi bi-arrow-right-short"></i>TV History</li>
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
            <button class="navbar">&#9776;</button>
        </div>
        <!-- Your main content goes here -->
        <div class="main-content">
        <div class="form-container">
        <h2 class="">Buy Data</h2>
        <form id="dataForm" action="./PHP/buyData.php" method="POST">
          <div>
            <label for="network" class="form-label">Network<span style="color: red;">*</span></label>
            <select class="form-select form-select-lg" id="network" name="network_provider" required>
              <option value="0" disabled selected>--Select Network--</option>
              <option value="1">MTN</option>
              <option value="2">Airtel</option>
              <option value="3">Glo</option>
              <option value="4">9Mobile</option>
            </select>
          </div>

          <div class="">
            <label for="dataType" class="form-label">Data Type<span style="color: red;">*</span></label>
            <select class="form-select form-select-lg" id="dataType" name="data_type" required>
              <option>----</option>
              <option>CORPORATE GIFTING</option>
              <option>CORPORATE GIFTING</option>
              <option>CORPORATE GIFTING</option>
            </select>
          </div>

          <div class="">
            <label for="dataPlan" class="form-label">Data Plan<span style="color: red;">*</span></label>
            <select class="form-select form-select-lg" id="dataPlan" name="data_plan" required>
              <option>----</option>
              <option value="270">50.0 MB	- ₦25.0</option>
              <option value="271">150.0 MB - ₦37.5</option>
              <option value="272">₦80.0	 -  ₦250</option>
            </select>
          </div>
          
          <div class="">
            <label for="amount" class="form-label">Amount<span style="color: red;">*</span></label>
            <input type="number" class="form-control lg" disabled placeholder="0" name="amount" id="amount" required>
          </div>
          <div id="btn-container">
            <button type="submit" class="btn" id="btn" name="submit">RESET PRICE</button>
          </div>
        </form>
      </div>
      </div>
  </div>
<!-- Chart.js cdn -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Jquery cdn -->
<script src="../user/JQUERY/jquery.js"></script>
<script src="./JS/script.js"></script>
<script>
$('document').ready(function(){
    $('.navbar').click(function(e){
        e.preventDefault();
        $('.sidebar').toggle();
    });
    $('.account').click(function(){
        $(this).toggleClass('open');
        $(this).find('.submenu').toggle();
    });
    // logout
    $('#logout').click(function(e){
        e.preventDefault();
        $.ajax({
            url: './PHP/logout.php',
            type: 'GET',
            success: function(response){
                window.location.href = './loginPage.php'
            },
            error: function(xhr, status, error){
                console.log("AJAX ERROR: " + status + " - " + error);
            }
        })
    })
})
</script>
</body>
</html>