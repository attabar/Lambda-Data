<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- favicon -->
  <link rel="shortcut icon" type="image/jpeg" href="../img/logo.jpg" />
  <!-- css file -->
  <link rel="stylesheet" href="./CSS/login.css">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="form-container">
    <form id="loginForm" method="post" action="./PHP/login.php">
      <!-- brand -->
      <div class="brand">
        <img src="../img/logo.jpg" alt="" srcset="">
        <h2>Login Form</h2>
      </div>
      <!-- message -->
      <div id="message"></div>
      <!-- username container -->
      <div class="username-container">
        <label for="user">Username</label>
        <input type="text" name="username" id="user" required>
      </div>
      <!-- password container -->
      <div class="password-container">
        <label for="pass">Password</label>
        <input type="password" name="password" id="pass" required>
      </div>
      <!-- login button -->
      <div class="login-button">
        <button type="submit" id="submitBtn" class="button">Login</button>
        <p>Don&apos;t have an account <a href="./register.php">Sign Up</a></p>
      </div>
    </form>
  </div>
  <script src="./JQUERY/jquery.js"></script>
  <script src="../js/sweetalert.js"></script>
  <script>
    $(document).ready(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-right",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    // Submitting form using jQuery AJAX -->
    $('#loginForm').submit(function (e) {
      e.preventDefault();

      // Get form data
      var formData = new FormData(this);

        // Send AJAX request to the server
         $.ajax({
          url: './PHP/login.php',
          method: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (data) {
            if (data.status === 'success') {
              $("#submitBtn").text("Authenticating...").css("opacity", 0.5)
              // SweetAlert for success
              Toast.fire({
                icon: "success",
                title: data.message,
                // text: data.message
              });
              setTimeout(function(){
                window.location.href = './dashboard.php'
              }, 4000)
            } else { 
              // SweetAlert for error
              Toast.fire({
                icon: "error",
                title: data.message,
                // text: data.message
              });
            }
          },
          error: function (error) {
            console.error('Error:', error);
          }
        });
    });
}); 
  </script>
</body>
</html>