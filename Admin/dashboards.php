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
                    <li><a href="./users.php"><i class="bi bi-arrow-right-short"></i>Users</a></li>
                    <!-- <li><i class="bi bi-arrow-right-short"></i>Add User</li> -->
                </ul>
                </li>
                <li class="with-arrow account"><i class="bi bi-cash"></i> Set Prices  <i class="bi bi-chevron-down"></i>
                <!-- submenu for prices -->
                <ul class="submenu">
                    <li><a href="./dataPrice.php"><i class="bi bi-arrow-right-short"></i>Data Price</a></li>
                    <li><a href="./AirtimePrice.php"><i class="bi bi-arrow-right-short"></i>Airtime Price</a></li>
                </ul>
                </li>
                <li class="with-arrow account"><i class="fas fa-exchange-alt"></i> Transactions <i class="bi bi-chevron-down"></i>
                <ul class="submenu">
                    <li><a href="./dataTransactions.php"><i class="bi bi-arrow-right-short"></i>Data History</a></li>
                    <li><a href="./airtime.php"><i class="bi bi-arrow-right-short"></i>Airtime History</a></li>
                    <li><i class="bi bi-arrow-right-short"></i>Bills History</li>
                    <li><i class="bi bi-arrow-right-short"></i>TV History</li>
                </ul>
                </li>
                <!-- <li><i class="bi bi-cash"></i> Wallet Summary</li>
                <li class="with-arrow"><i class="bi bi-sliders"></i> Others <i class="bi bi-chevron-down"></i></li>
                <li><i class="bi bi-gear-fill"></i> Settings</li> -->
                <li><i class="fa fa-envelope-open" aria-hidden="true"></i> Send Email</li> 
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
            <div class="funding-revenue">
            <div class="head"><h1>OVERVIEW</h1></div>
            <div class="row-2">
                    <div class="child1"><i class="fas fa-wallet"></i><h5>Total Balance</h5><h6>9,000</h6></div>
                    <div class="child2"><i class="fas fa-user"></i><h5>Users</h5><h6>N300,000</h6></div>
                    <div class="child3"><i class="fas fa-wifi"></i><h5>Top Transaction</h5><h6>N100,000</h6></div>
                </div>

                <div class="head"><h1>DATA <i class="fas fa-wifi"></i></h1></div>
                <div class="row-1">
                    <div class="child1"><i class="fa fa-line-chart" aria-hidden="true"></i><h5>Daily Profit</h5><h6>N600,000</h6></div>
                    <div class="child2"><i class="fas fa-exchange-alt"></i><h5>Weekly Profit</h5><h6>N3,000</h6></div>
                    <div class="child3"><i class="fas fa-exchange-alt"></i><h5>Monthly Profit</h5><h6>N90,000</h6></div>
                </div>
                <div class="head"><h1>AIRTIME <i class="fas fa-phone"></i></h1></div>
                <div class="row-2">
                    <div class="child1"><i class="fa fa-line-chart" aria-hidden="true"></i><h5>Daily Profit</h5><h6>9,000</h6></div>
                    <div class="child2"><i class="fa fa-bar-chart" aria-hidden="true"></i><h5>Weekly Profit</h5><h6>N300,000</h6></div>
                    <div class="child3"><i class="fa fa-area-chart" aria-hidden="true"></i><h5>Monthly Profit</h5><h6>N100,000</h6></div>
                </div>
            </div>
            <div class="chart-container">
            <div class="head"><h1>Recent Transaction <i class="fas fa-exchange-alt"></i></h1></div>
            </div>
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
                window.location.href = './index.php'
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