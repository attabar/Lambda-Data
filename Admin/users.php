<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg">
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/users.css">
</head>
<body>
<div class="container">
    <!-- sidebar container -->
    <div class="sidebar" id="sidebar">
        <!-- Your sidebar content goes here -->
        <div class="sidebar-content">
            <ul>
            <a href="./dashboards.php"><li><i class="bi bi-columns-gap"></i> Dashboard</li></a>
                <li class="with-arrow account"><i class="fas fa-user"></i> Manage Users <i class="bi bi-chevron-down"></i>
                <!-- submenu for account -->
                <ul class="submenu">
                    <a href="./users.php"><li><i class="bi bi-arrow-right-short"></i>Users</li></a>
                    <!-- <li><i class="bi bi-arrow-right-short"></i>Add User</li> -->
                </ul>
                </li>
                <li class="with-arrow account"><i class="bi bi-cash"></i> Set Prices  <i class="bi bi-chevron-down"></i>
                <!-- submenu for prices -->
                <ul class="submenu">
                    <a href="./dataPrice.php"><li><i class="bi bi-arrow-right-short"></i>Data Price</li></a>
                    <a href="./AirtimePrice.php"><li><i class="bi bi-arrow-right-short"></i>Airtime Price</li></a>
                </ul>
                </li>
                <li class="with-arrow account"><i class="fas fa-exchange-alt"></i> Transactions <i class="bi bi-chevron-down"></i>
                <ul class="submenu">
                    <a href="./dataTransactions.php"><li><i class="bi bi-arrow-right-short"></i>Data History</li></a>
                    <a href="./airtime.php"><li><i class="bi bi-arrow-right-short"></i>Airtime History</li></a>
                    <a href="./bill.php"><li><i class="bi bi-arrow-right-short"></i>Bills History</li></a>
                    <a href="./tv.php"><li><i class="bi bi-arrow-right-short"></i>TV History</li></a>
                    <a href="./pin.php"><li><i class="bi bi-arrow-right-short"></i>Result Pin History</li></a>
                </ul>
                </li>
                <li><i class="bi bi-gear-fill"></i> Settings</li>
                <li><i class="fa fa-envelope-open" aria-hidden="true"></i> Send Email</li> 
                <li><i class="bi bi-bell-fill"></i> Notifications</li>
                <li id="logout"><i class="bi bi-box-arrow-left"></i> Logout</li>
            </ul>
        </div>
    </div>
    
    <div class="content">
        <!-- header -->
        <div class="header">
            <div class="navbar" onclick="navbarToggle()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
        <!-- Your main content goes here -->
        <div class="main-content">

            <div class="search-and-heading">
            <h2>USERS DATA</h2>
            <!-- <button>Add Users</button> -->
            <form action="">
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="search" name="" id="search" placeholder="Search Users...">
                </div>
            </form>
            <button class="addUserBtn"><a href="../user/RegistrationPage.php">Add Users</a></button>
            </div>
            
          <div id="users-table"></div>
        
        </div>
    </div>
</div>
<script src="./assets/JS/users.js"></script>
<script src="./assets/JS/admin.js"></script>
<script>
    // sidebar toggler
    const navbarToggle = () => {
        const sidebar = document.getElementById("sidebar");
        const isOpen = sidebar.style.left === "-228px";
        sidebar.style.left = isOpen ? "0px" : "-228px";

        const navbarContainer = document.querySelector(".navbar");
        navbarContainer.classList.toggle("open");
    }
    document.addEventListener("DOMContentLoaded", function() {
        let withArrowElements = document.querySelectorAll(".with-arrow");
        withArrowElements.forEach(element => {
            element.addEventListener("click", function() {
                this.classList.toggle("open");
                let submenu = this.querySelector(".submenu");
                if(submenu) {
                    submenu.style.display = submenu.style.display === "block" ? "none" : "block"
                }
            })
        })
    })
</script>
</body>
</html>
