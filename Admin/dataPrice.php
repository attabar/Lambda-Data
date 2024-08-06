<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logo.jpg">
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
                <li><a href="dashboards.php"><i class="bi bi-columns-gap"></i> Dashboard</a></li>
                <li class="with-arrow account"><i class="fas fa-user"></i> Manage Users <i class="bi bi-chevron-down"></i>
                <!-- submenu for account -->
                <ul class="submenu">
                    <li><a href="./allUsers.php"><i class="bi bi-arrow-right-short"></i>Users</a></li>
                    <li><i class="bi bi-arrow-right-short"></i>Add User</li>
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
            <div class="navbar" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
        <!-- Your main content goes here -->
        <div class="main-content">

            <div class="search-and-heading">
            <h2>Data Price</h2>
            <form action="">
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="search" name="" id="search" placeholder="Search Users...">
                </div>
            </form>
            <a href="#setDataPrice" id="btnText"><button class="addUserBtn">Update Price</button></a>
            </div>

            <div id="dataPrice"></div>
        
        <div class="setDataPrice" id="setDataPrice">
            <div class="heading">
                <h2>UPDATE PRICE</h2>
            </div>
            <form id="updateDataPrice">
                <div class="network-id" id="divForUpdate">
                    <label for="network">Network</label>
                    <select name="network" id="network">
                        <option value="0" selected disabled>Select Network</option>
                        <option value="1">MTN</option>
                        <option value="3">AIRTEL</option>
                        <option value="2">GLO</option>
                        <option value="6">9MOBILE</option>
                    </select>
                </div>
                <div class="planType" id="divForUpdate">
                    <label for="">Plan Type</label>
                    <select name="planType" id="planType">
                    </select>
                </div>
                <div class="buying-price" id="divForUpdate">
                    <label for="">Buying Price</label>
                    <input type="number" name="buying-price" id="buying-price" placeholder="Buying Price">
                </div>
                <div class="selling-price" id="divForUpdate">
                    <label for="">Selling Price</label>
                    <input type="number" name="selling-price" id="selling-price" placeholder="Selling Price">
                </div>
                <div class="update-btn" id="divForUpdate">
                    <input type="submit" value="Update" id="btn" name="update" id="update">
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<script src="../assets/JS/sweetalert.js"></script>
<script>
        function toggleMenu() {
            let sidebar = document.getElementById('sidebar');
            let isOpen = sidebar.style.left === '-228px';
            sidebar.style.left = isOpen ? '0px' : '-228px';

            let toggleIcon = document.querySelector(".navbar");
            toggleIcon.classList.toggle('open');
        }
      
        document.addEventListener("DOMContentLoaded", function() {
            const withArrowElements = document.querySelectorAll(".with-arrow");

            withArrowElements.forEach(element => {
                element.addEventListener("click", function() {
                    // Toggle the 'open' class on the clicked element
                    this.classList.toggle("open");

                    // Toggle the display of the submenu
                    const submenu = this.querySelector(".submenu");
                    if (submenu) {
                        submenu.style.display = submenu.style.display === "block" ? "none" : "block";
                    }
                });
            });
        });

    </script>

<!-- price table -->
<script src="./assets/JS/dataPrice.js"></script>
<script src="./assets/JS/dataOptions.js"></script>
<script src="./assets/JS/resetData.js"></script>
<script src="./assets/JS/logout.js"></script>
</body>
</html>
