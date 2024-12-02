<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
      <!-- favicon -->
    <link rel="shortcut icon" type="image/jpeg" href="../assets/img/yamboyLogo.jpg" />
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6">
      <div class="card p-4 my-5 shadow">
      <div class="body">
      <form id="loginForm">
        <h3 class="text-center">Login</h3><br>
        <div class="error" role="alert"></div>

        <div class="form-group">
          <label class="form-label" for="username"><strong>Username:</strong></label>
          <input type="text" name="username" id="user" required class="form-control mb-3 rounded">
        </div>

        <div class="form-group">
          <label for="pwd"><strong>Password:<strong></label>
          <input type="password" name="password" id="pass" required class="form-control mb-3">
      </div>
  
        <div class="center"><h5 class="loading"></h5></div>
        <button type="submit" name="submit" class="btn btn-primary w-100 my-2" id="submitBtn">Login</button>
    </form>
</div>
</div>
</div>
    </div>
  </div>
  <script src="../assets/JS/sweetalert.js"></script>
  <script src="./assets/JS/login.js"></script>
</body>
</html>