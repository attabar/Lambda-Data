<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logo.jpg">
</head>

<body>
    <div class="container">
        <!-- sidebar container -->
        <div class="sidebar" id="sidebar">
        <!-- Your sidebar content goes here -->
        <div class="sidebar-content">
            <ul>
                <li><a href="#"><i class="bi bi-columns-gap"></i> Dashboard</a></li>
                <li class="with-arrow account"><i class="fas fa-user"></i> Manage Users <i class="bi bi-chevron-down"></i>
                <!-- submenu for account -->
                <ul class="submenu">
                    <li><a href="./users.php"><i class="bi bi-arrow-right-short"></i>Users</a></li>
                </ul>
                </li>
                <li class="with-arrow account"><i class="bi bi-cash"></i> Set Prices  <i class="bi bi-chevron-down"></i>
                <!-- submenu for prices -->
                <ul class="submenu">
                    <li><a href="./updateDataPrice.php"><i class="bi bi-arrow-right-short"></i>Data Price</a></li>
                    <li><a href="./AirtimePrice.php"><i class="bi bi-arrow-right-short"></i>Airtime Price</a></li>
                </ul>
                </li>
                <li class="with-arrow account"><i class="fas fa-exchange-alt"></i> Transactions <i class="bi bi-chevron-down"></i>
                <ul class="submenu">
                    <li><a href="./dataTransactions.php"><i class="bi bi-arrow-right-short"></i>Data History</a></li>
                    <li><a href="./airtime.php"><i class="bi bi-arrow-right-short"></i>Airtime History</a></li>
                    <li><i class="bi bi-arrow-right-short"></i>Bills History</li>
                    <li><i class="bi bi-arrow-right-short"></i>TV History</li>
                    <!-- <li><i class="bi bi-arrow-right-short"></i>Result Pin History</li> -->
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
                    <!-- &#9776; -->
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
            <!-- Your main content goes here -->
            <div class="main-content">
                <!-- <marquee class="marquee" behavior="" direction="">This is the only avalailable bank we have for now that is wema bank
                </marquee> -->
                <div class="balanceContainer">
                <h1 style="color:aliceblue;padding:35px">Hi, <span id="username"></span></h1>
                    <div class="balance">
                    <i class="fas fa-wallet fa-2x"></i>
                    Monnify Wallet
                    <h2 style="color:aliceblue;padding-left:35px;padding-top:40px" id="accBalance">₦50,000.00</h2>
                    </div>
                    <div class="balance">
                    <i class="fas fa-wallet fa-2x"></i>
                    Glatiding Wallet
                    <h2 style="color:aliceblue;padding-left:35px;padding-top:40px" id="accBalance">₦100,000.00</h2>
                    </div>
                    <div class="users">
                        <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                        Total Users
                        <h2 style="color:aliceblue;padding-left:35px;padding-top:40px" id="total">1000</h2>
                    </div>
                    <div class="dataBalance">
                    <i class="bi bi-cash-coin fa-2x"></i>
                    Daily Profit
                    <h2 style="color:aliceblue;padding-left:35px;padding-top:40px" id="accBalance">₦60,000.00</h2>
                    </div>
                </div>
                <div class="bankNames">
                        <marquee behavior="" direction="">Recent Transactions</marquee>
                </div>
                <!-- account -->
                <div class="recentTransaction">
                <h2>Transactions made in 24 Hours</h2>

                <table>
                <tr>
                    <th>Network</th>
                    <th>Phone</th>
                    <th>Plan</th>
                    <th>Status</th>
                    <th>Plan Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <td>MTN</td>
                    <td>08149715017</td>
                    <td>270</td>
                    <td>Successful</td>
                    <td>1GB</td>
                    <td>300</td>
                    <td>2024-05-20 00:00:00</td>
                </tr>
                <tr>
                <td>MTN</td>
                    <td>07047473655</td>
                    <td>270</td>
                    <td>Successful</td>
                    <td>1GB</td>
                    <td>300</td>
                    <td>2024-05-20 00:00:00</td>
                </tr>
                <tr>
                <td>MTN</td>
                    <td>08063993522</td>
                    <td>270</td>
                    <td>Successful</td>
                    <td>1GB</td>
                    <td>300</td>
                    <td>2024-05-20 00:00:00</td>
                </tr>
                <tr>
                <td>MTN</td>
                    <td>08069272851</td>
                    <td>270</td>
                    <td>Successful</td>
                    <td>1GB</td>
                    <td>300</td>
                    <td>2024-05-20 00:00:00</td>
                </tr>
                <tr>
                <td>MTN</td>
                    <td>07042654502</td>
                    <td>270</td>
                    <td>Successful</td>
                    <td>1GB</td>
                    <td>300</td>
                    <td>2024-05-20 00:00:00</td>                
                </tr>
                <tr>
                <td>MTN</td>
                    <td>09161703699</td>
                    <td>270</td>
                    <td>Successful</td>
                    <td>1GB</td>
                    <td>300</td>
                    <td>2024-05-20 00:00:00</td>
                </tr>
                </table>

                </div>
                <!-- end of main content -->
            </div>
        </div>
    </div>
    <script>
        function toggleMenu() {
            let sidebar = document.getElementById('sidebar');
            let isOpen = sidebar.style.left === '0px';
            sidebar.style.left = isOpen ? '-228px' : '0px';

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

    <script src="./assets/JS/admin.js"></script>
    <script src="./assets/JS/logout.js"></script>
</body>
</html>