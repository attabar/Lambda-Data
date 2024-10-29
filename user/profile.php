
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="./assets/CSS/dashboard.css">
    <link rel="stylesheet" href="./assets/CSS/profile.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
</head>
<!-- git commit -m -->
 <!-- git push origin master -->
<body>
    <div class="container">
        <div class="content">
            <!-- header -->
            <div class="header">
            <p>Hi, <span id="fullname"></span></p>
            <p><i class="bi bi-bell-fill"></i><sub style="background-color:red; color: #fff;border-radius: 5px;">10+</sub></p>
            </div>
            <!-- Your main content goes here -->
            <div class="main-content">
            
                <div class="hztal">
                    <button onclick="navigateTouserprofile()">Profile</button>
                    <button onclick="navigateTouserpass()">Password</button>
                    <button onclick="navigateToUserPin()">Pin</button>
                </div>
                <!-- account -->
                <div class="user-profile">
                    <h5 style="color:aqua">Account Details</h5>
                    <h3 style="margin-bottom: 2%;">Basic information</h3>
                    <h5><i class="fas fa-user"></i>  Name: <span id="fullname2"></span></h5><br>
                    <h5><i class="fa fa-envelope-o" aria-hidden="true"></i> E-mail: <span id="email"></span></h5><br>
                    <h5><i class="bi bi-telephone-inbound-fill"></i> Mobile: <span id="mobile"></span></h5>
                    <!-- <a class="editProfile" href="./editProfile.php"><h4>Edit Profile</h4></a> -->

                    <h5 style="margin-top: 2%;color:aqua">Referrals</h5>
                    <h3>Referral Code</h3>
                    <input type="text" class="ReferralLinkC" id="referral" style="color:black">
                    <button onclick="myFunction()" style="margin-top: 2%; background-color:orangered;padding: 7px; color: #fff;">Copy Link</button>
                    <button style="margin-top: 2%; background-color:green;padding: 7px; color: #fff;">View Commission</button>
                </div>

                <div class="user-pass">
                    <form>
                        <h5 style="color:aqua">Update Login Details</h5>
                        <h3 style="margin-bottom: 2%;">Login Details</h3>
                        <label for="oldPass">old Password</label>
                        <input type="password" placeholder="Old Password" id="oldPass" name="oldPass" class="password-change" style="color:black;"><br>
                        <label for="newPass">New Password</label>
                        <input type="password" placeholder="New Password" id="newPass" name="newPass" class="password-change" style="color:black"><br>
                        <label for="retypePass">Retype Password</label>
                        <input type="password" placeholder="Retype Password" id="retypePass" name="retypePass" class="password-change" style="color:black"><br>
                        
                        <button type="submit" class="updatePassBtn" style="margin-top: 1%; background-color:orangered;padding: 7px; color: #fff;">Update Password</button>
                    </form>
                </div>
                <div class="user-pin">
                    <form>
                        <h5 style="color:aqua">Update Transaction Pin</h5>
                        <h3 style="margin-bottom: 2%;">Transaction Pin</h3>
                        <label for="">old Pin</label>
                        <input type="password" placeholder="Old Pin" name="oldPin" class="password-change" style="color:black;"><br>
                        <label for="">New Pin</label>
                        <input type="password" placeholder="New Pin" name="newPin" class="password-change" style="color:black"><br>
                        <label for="">Retype Pin</label>
                        <input type="password" placeholder="Retype Pin" name="retypePin" class="password-change" style="color:black"><br>
                        
                        <button class="updatePassBtn" style="margin-top: 1%; background-color:orangered;padding: 7px; color: #fff;">Update Pin</button>
                    </form>
                </div>
                <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
            <i class="fab fa-whatsapp"></i>
                <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
            </a>
            <div class="sidebar" id="sidebar">
                <a href="./dashboard.php">
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

                <a href="/">
                <i class="fa fa-th" aria-hidden="true"></i>
                    <p>More</p>
                </a>
            </div>
                <!-- end of main content -->
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("referral");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const isOpen = sidebar.style.left === '0px' || !sidebar.style.left;
            sidebar.style.left = isOpen ? '-15rem' : '0px';

            const toggleIcon = document.querySelector(".navbar");
            toggleIcon.classList.toggle('open');
        }

        document.addEventListener("DOMContentLoaded", function () {
            const withArrowElements = document.querySelectorAll(".with-arrow");

            withArrowElements.forEach(element => {
                element.addEventListener("click", function () {
                    this.classList.toggle('open');

                    const submenu = this.querySelector(".submenu");

                    if (submenu) {
                        submenu.style.display = submenu.style.display === "block" ? "none" : "block";
                    }
                });
            });
        });

        const navigateTouserprofile = () => {
            let userprofile = document.querySelector(".user-profile").style.display = 'block';
            let userpass = document.querySelector(".user-pass").style.display = 'none';
            let ps9Con = document.querySelector(".user-pin").style.display = 'none';
        }

        const navigateTouserpass = () => {
            let userpass = document.querySelector(".user-pass").style.display = 'block';
            let userprofile = document.querySelector(".user-profile").style.display = 'none';
            let ps9Con = document.querySelector(".user-pin").style.display = 'none';
        }

        const navigateToUserPin = () => {
            let ps9Con = document.querySelector(".user-pin").style.display = 'block';
            let paystackCon = document.querySelector(".user-profile").style.display = 'none';
            let monifyCon = document.querySelector(".user-pass").style.display = 'none';
        }
    </script>
    <script src="./assets/SweetAlert/sweetalert.js"></script>
    <script src="./assets/JS/changePassword.js"></script>
    <!-- wallet account file -->
    <script src="./JS/getAccountDetails.js"></script>
    <!-- session file -->
    <script src="./assets/JS/referral.js"></script>
    <script src="./assets/JS/user.js"></script>
</body>

</html>