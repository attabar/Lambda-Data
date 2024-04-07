<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./CSS/dashboard.css">
    <link rel="stylesheet" href="./CSS/editProfile.css">
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
        <div class="sidebar">
            <!-- Your sidebar content goes here -->
            <div class="sidebar-content">
                <ul>
                    <li><a href="#"><i class="bi bi-columns-gap"></i> Dashboard</a></li>
                    <li class="with-arrow account"><i class="fas fa-user"></i> Account <i
                            class="bi bi-chevron-down"></i>
                        <!-- submenu for account -->
                        <ul class="submenu">
                            <li><a href="./profile.php"><i class="bi bi-arrow-right-short"></i> Profile</a></li>
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
                    <li class="with-arrow transaction"><i class="fas fa-dollar-sign"></i> Transactions <i
                            class="bi bi-chevron-down"></i>
                        <!-- submenu for transactions history -->
                        <ul class="submenu">
                            <li><a href="./dataTransactionHistory.php"><i class="bi bi-arrow-right-short"></i>Data</a>
                            </li>
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
                <!-- account -->
                <div class="form-container">
  <form id="signUpForm" autocomplete="off">
    <!-- brand container -->
    <div class="brand">
      <img src="../img/logo.jpg" alt="">
      <h3>EDIT PROFILE</h3>
    </div>
    <!-- message -->
    <div class="message"></div>
    <div class="loading"></div>
    <!-- fname container -->
    <div class="fname-container">
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="fname" required>
    </div>
    <!-- lname container -->
    <div class="lname-container">
      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lname" required>
    </div>
    <!-- username container-->
    <div class="username-container">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>
    </div>
    <!-- Email container -->
    <div class="email-container">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>
    </div>
    <!-- phone number container -->
    <div class="mobile-container">
      <label for="mobile">Mobile</label>
      <input type="number" name="phone" id="mobile" required>
    </div>
    <!-- password container -->
    <div class="password-container">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" autocomplete="off" required>
    </div>
    <!-- confirm password -->
    <div class="cpassword">
      <label for="cpassword">Confirm Password</label>
      <input type="password" name="cpassword" id="cpassword" autocomplete="off" required>
    </div>
    <!-- submit button container -->
    <div class="button">
      <button name="submit" id="submitBtn" type="submit">Submit</button>
    </div>  
  </form>
</div>
                </div>
                <!-- end of main content -->
            </div>
        </div>
    </div>
    <script src="./JQUERY/jquery.js"></script>
    <script>
    $('document').ready(function() {
        $('.navbar').click(function(e) {
            e.preventDefault();
            $('.sidebar').toggle();
        });
        $('.account').click(function() {
            $(this).toggleClass('open');
            $(this).find('.submenu').toggle();
        });
        $('.transaction').click(function() {
            $(this).toggleClass('open');
            $(this).find('.submenu').toggle();
        })
        // logout
        $('#logout').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: './PHP/logout.php',
                type: 'GET',
                success: function(response) {
                    window.location.href = './loginPage.php'
                },
                error: function(xhr, status, error) {
                    console.log("AJAX ERROR: " + status + " - " + error);
                }
            })
        })
    })
    </script>
</body>

</html>