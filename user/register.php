<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
<!-- bootstrap 5 link -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<!-- js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/jpeg" href="../assets/img/yamboyLogo.jpg" />
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card p-4 shadow rounded my-3">
          <div class="body">
            <form enctype="multipart/form-data" id="signUpForm">
              <h3 class="text-center">Registration</h3><br>
              <div class="error" role="alert"></div>
              <div class="form-group">
                <label for="fullname"><strong>Full Name<span class="text-danger">*</span></strong></label>
                <input type="text" class="form-control" name="fullname" id="fullname">
                <span id="fullname" style="color: red;"></span>
              </div>
  
              <div class="form-group mt-2">
                <label for="email"><strong>Email<span class="text-danger">*</span><strong></label>
                <input type="email" name="email" class="form-control" id="email">
              </div>

              <div class="form-group mt-2">
                <label for="phone"><strong>Mobile<span class="text-danger">*</span><strong></label>
                <input type="tel" name="phone" class="form-control" id="phone">
              </div>

              <div class="form-group mt-2">
                <label for="referral"><strong>Referral<strong></label>
                <input type="text" name="ref" class="form-control" id="referral">
              </div>

              <div class="form-group mt-2">
                <label for="pin"><strong>Create Pin<span class="text-danger">*</span><strong></label>
                <input type="password" name="pin" class="form-control" id="pin">
              </div>

              <div class="form-group mt-2">
                <label for="password"><strong>Password<span class="text-danger">*</span><strong></label>
                <input type="password" name="password" class="form-control" id="password">
              </div>

              <div class="form-group mt-3">
                  <label for="check"></label>
                  <button type="submit" name="submit" class="bg-primary text-light form-control" id="submitBtn">Sign Up</button>
              </div>
              <p class="mt-2 text-center">Already have An Account <a href="login.php" class="text-decoration-none">Login</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<script src="./assets/SweetAlert/sweetalert.js"></script>
<script src="./assets/JS/register.js"></script>
</body>
</html>
