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
    <!-- custom css file -->
    <link rel="stylesheet" href="./CSS/allUsers.css">
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
                <li><i class="fas fa-wallet"></i> Fund Wallet</li>
                <li><a href="./data.php"><i class="fas fa-wifi"></i> Buy Data</a></li>
                <li><a href="./airtime.php"><i class="fas fa-phone"></i> Buy Airtime</a></li>
                <li><i class="fas fa-lightbulb"></i> Bills</li>
                <li><i class="fas fa-dollar-sign"></i> Transactions</li>
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

            <div class="search-and-heading">
            <h2>USERS DATA</h2>
            <form action="">
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="search" name="" id="search" placeholder="Search Users...">
                </div>
            </form>
            </div>

            <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>        
            </table>
        
        </div>
    </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<!-- Jquery cdn -->
<script src="../user/JQUERY/jquery.js"></script>
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
<!-- users account -->
<script src="./JS/allUsers.js"></script>
</body>
</html>
