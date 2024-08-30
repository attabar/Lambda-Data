<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- custom css -->
  <link rel="stylesheet" href="./assets/CSS/register.css">
  <!-- favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/yamboyLogo.jpg">
</head>
<body>
<div class="form-container">
  <form id="signUpForm" autocomplete="off">
    <!-- brand container -->
    <div class="brand">
      <img src="../assets/img/yamboyLogo.jpg" alt="">
      <h3>Register To Continue Enjoying</h3>
    </div>
    <!-- message -->
    <div class="message"></div>
    <div class="loading"></div>
    <!-- fname container -->
    <div class="fname-container">
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname" required placeholder="Muhammad Abdulmalik">
    </div>
    
    <!-- Email container -->
    <div class="email-container">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required placeholder="mabdulmalik343@gmail.com">
    </div>
    <!-- phone number container -->
    <div class="mobile-container">
      <label for="phone">Mobile</label>
      <input type="tel" name="phone" id="phone" required placeholder="+2348149715017">
    </div>
    <div class="username-container">
      <label for="referral">Referral</label>
      <input type="text" name="referral" id="referral" placeholder="Referral Code (Optional)">
    </div>
    <div class="cpassword">
      <label for="pin">Create Pin</label>
      <input type="password" name="pin" id="pin" placeholder="Transaction Pin" autocomplete="off" required placeholder="Coder@3433">
    </div>
    <!-- password container -->
    <div class="password-container">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" autocomplete="off" required>
    </div>
    <!-- confirm password -->
    
    <!-- submit button container -->
    <div class="button">
      <button name="submit" id="submitBtn" type="submit">Submit</button>
      <p>Already have an Account <a href="./loginPage.php">Login</a></p>
    </div>  
  </form>
</div>
<!-- sweetalert -->
<script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/register.js"></script>
</body>
</html>