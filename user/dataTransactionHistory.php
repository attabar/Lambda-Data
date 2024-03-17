<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logo.jpg">
    <!-- custom css file -->
    <link rel="stylesheet" href="./CSS/dataTransactionHistory.css">
</head>
<body>
<div class="container">
    <!-- sidebar container -->
    <div class="sidebar">
        <!-- Your sidebar content goes here -->
        <div class="sidebar-content">
            <ul>
                <li><a href="#"><i class="bi bi-columns-gap"></i> Dashboard</a></li>
                <li class="with-arrow account"><i class="fas fa-user"></i> Account <i class="bi bi-chevron-down"></i>
                <!-- submenu for account -->
                <ul class="submenu">
                    <li><a href=""><i class="bi bi-arrow-right-short"></i> Profile</a></li>
                    <li><a href=""><i class="bi bi-arrow-right-short"></i> Upgrade Account</a></li>
                    <li><a href=""><i class="bi bi-arrow-right-short"></i> KYC</a></li>
                    <li><a href=""><i class="bi bi-arrow-right-short"></i> Pin Management</a></li>
                    <li><a href=""><i class="bi bi-arrow-right-short"></i> Change Password</a></li>
                </ul>
                </li>
                <li><i class="fas fa-wallet"></i> Fund Wallet</li>
                <li><a href="./data.php"><i class="fas fa-wifi"></i> Buy Data</a></li>
                <li><a href="./airtime.php"><i class="fas fa-phone"></i> Buy Airtime</a></li>
                <li><i class="fas fa-lightbulb"></i> Bills</li>
                <li><i class="bi bi-tv"></i>TV Cables</li>
                <!-- transaction history -->
                <li class="with-arrow transaction"><i class="fas fa-dollar-sign"></i> Transactions <i class="bi bi-chevron-down"></i>
                    <!-- submenu for transactions history -->
                    <ul class="submenu">
                        <li><a href="./dataTransactionHistory.php"><i class="bi bi-arrow-right-short"></i>Data</a></li>
                        <li><a href="./airtime.php"><i class="bi bi-arrow-right-short"></i>Airtime</a></li>
                        <li><a href=""><i class="bi bi-arrow-right-short"></i>Bill</a></li>
                        <li><a href=""><i class="bi bi-arrow-right-short"></i>TV Cables</a></li>
                        <li><a href=""><i class="bi bi-arrow-right-short"></i>Results Pin</a></li>
                    </ul>
                </li>
                
                <li><i class="bi bi-cash"></i> Wallet Summary</li>
                <li class="with-arrow"><i class="bi bi-sliders"></i> Others <i class="bi bi-chevron-down"></i></li>
                <li><i class="bi bi-gear-fill"></i> Settings</li>
                <li><i class="bi bi-tag-fill"></i> Price</li>
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
            <marquee behavior="" direction="">This page contains of all transactions you made for your mobile data transactions history</marquee>
            <div class="table-container">
                <h2>Data | Transactions History</h2>

                <table>
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
                <tr>
                    <td id="id"></td>
                    <td id="transaction_id"></td>
                    <td id="plan_network"></td>
                    <td id="mobile_number"></td>
                    <td id="plan"></td>
                    <td id="status"></td>
                    <td id="plan_name"></td>
                    <td id="plan_amount"></td>
                    <td id="create_date"></td>
                </tr>
                </table>
            </div>
            <!-- end of main content -->
        </div>
    </div>
</div>
<script src="./JQUERY/jquery.js"></script>
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
    $('.transaction').click(function(){
        $(this).toggleClass('open');
        $(this).find('.submenu').toggle();
    })
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
<!-- wallet account file -->
<script src="./JS/getFundWalletFile.js"></script>
<!-- session file -->
<script src="./JS/getSessionFile.js"></script>
<!-- account balance -->
<script src="./JS/getBalance.js"></script>
<!-- data transaction history -->
<script src="./JS/getDataTransactionHistory.js"></script>
</body>
</html>
