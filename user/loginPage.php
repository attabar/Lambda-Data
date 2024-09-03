<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- favicon -->
  <link rel="shortcut icon" type="image/jpeg" href="../assets/img/yamboyLogo.jpg" />
  <!-- css file -->
  <link rel="stylesheet" href="./assets/CSS/login.css">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="form-container">
    <form id="loginForm">
      <!-- brand -->
      <div class="brand">
        <img src="../assets/img/yamboyLogo.jpg" alt="" srcset="">
        <h2>Sign in to your account</h2>
      </div>
      <!-- message -->
      <div id="message"></div>
      <!-- username container -->
      <div class="username-container">
        <label for="user">Email</label>
        <input type="email" name="email" id="user" required>
      </div>
      <!-- password container -->
      <div class="password-container">
        <label for="pass">Password</label>
        <input type="password" name="password" id="pass" required>
      </div>
      <!-- login button -->
      <div class="login-button">
        <button type="submit" id="submitBtn" class="button">Login</button>
        <p>Don&apos;t have an account <a href="./RegistrationPage.php">Sign Up</a></p>
      </div>
    </form>
  </div>
  <script src="./assets/SweetAlert/sweetalert.js"></script>
  <script src="./assets/JS/login.js"></script>
</body>
</html>