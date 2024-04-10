<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- favicon -->
  <link rel="shortcut icon" type="image/jpeg" href="../img/logo.jpg" />
  <!-- css file -->
  <link rel="stylesheet" href="./CSS/adminlogin.css">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="form-container">
    <form id="loginForm">
      <!-- brand -->
      <div class="brand">
        <img src="../img/logo.jpg" alt="" srcset="">
        <h2>Admin Login</h2>
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
      </div>
    </form>
  </div>
  <script src="../js/sweetalert.js"></script>
  <script>
    // declaring toast function
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
      })
document.getElementById("loginForm").addEventListener("submit", function(e) {
  e.preventDefault();

  var formData = new FormData(this);

  fetch("./php/login.php", {
    method: "POST",
    body: formData
  })
  .then(response => {
    if(!response.ok){
      throw new Error("response network was not okey");
    }
    return response.json();
  })
  .then(data => {
    if(data.status){
      Toast.fire({
        icon: "success",
        title: data.title,
        text: data.message
      })
      setTimeout(function(){
        window.location.href = './dashboards.php'
      }, 5000)
    }else{
      Toast.fire({
        icon: "error",
        title: data.title,
        text: data.message
      })
    }
  }).catch(error => {
    console.log(error);
  })


})
  </script>
</body>
</html>