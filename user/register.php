<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- custom css -->
  <link rel="stylesheet" href="./CSS/register.css">
  <!-- favicon -->
  <link rel="icon" type="image/x-icon" href="../img/logo.jpg">
  <!-- jquery cdn -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
</head>
<body>
<div class="form-container">
  <form id="signUpForm" autocomplete="off">
    <!-- brand container -->
    <div class="brand">
      <img src="../img/logo.jpg" alt="">
      <h3>REGISTERATION FORM</h3>
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
      <p>Already have an Account <a href="./loginPage.php">Login</a></p>
    </div>  
  </form>
</div>
<!-- sweetalert -->
<script src="./SweetAlert/sweetalert.js"></script>
<!-- jquery link -->
<script src="JQUERY/jquery.js"></script>
<script>

document.getElementById("signUpForm").addEventListener("submit", function(e){
  e.preventDefault();

  var formData = new FormData(this);

  fetch("./PHP/Registration.php", {
    method: "POST",
    body: formData
  })
  .then(response => {
    if(!response.ok){
      throw new Error("Network response was not ok");
    }
    return response.json();
  })
  .then(data => {
    console.log(data);
    if(data.success){
      showMessage(data.message, "success")
    }else{
      showMessage(data.message, "error");
    }
  })
  .catch(error => {
    console.log("There was a problem with the response operation: ",error);
  })
})

function showMessage(message, type){
  Swal.fire({
    icon: type,
    title: type === "success" ? "success" : "error",
    text: message
  });
}

</script>
</body>
</html>