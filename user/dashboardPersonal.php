<?php require_once '../PHP/session.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<title>Dashboard</title>
<style>
body {
  margin: 0;
}

#sidebar {
  list-style-type: none;
  margin: 0px;
  padding: 0;
  width: 26%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
  text-align: center;
 
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
  font-size: large;
}

/* li a.active {
  background-color: #04AA6D;
  color: white;
} */

li a:hover{
  color: blue;
}
#services{
    margin: 15px 0px;
    /* justify-content: center; */
}

@media (max-width: 768px) {
  #sidebar {
    display: none;
  }
  #sidebar-toggle {
  position: fixed;
  top: 0;
  left: 0;
  padding: 15px;
  cursor: pointer;
  background: #007BFF;
  color: #fff;
  z-index: 2;
}

#sidebar.active {
  width: 50%;
}

#wholeBody{
  width: 100%;
}

}


</style>
</head>
<body>

<ul id="sidebar">
<div id="services" style="display: flex; align-items:center">
<i class="bi bi-house-door fa-2x"></i><li><a href="#news">Dashboard</a></li>
</div>
<div id="services" style="display: flex; align-items:center">
<i class="bi bi-person fa-2x"></i></i><li style="display: flex; align-items:center; justify-content:space-between" data-bs-toggle="collapse" data-bs-target="#demo"><a href="#news">Account</a><i class="fas fa-angle-right"></i>
</li>
</div>
<div id="demo" class="collapse" style="float: left; margin-top:5px;">
<p>- Profile</p> 
<p>- Change Transaction Pin</p>
</div>
<div id="services" style="display: flex; align-items:center">
<i class="bi bi-wallet fa-2x"></i><li><a href="fundWallet.php">Fund Wallet</a></li>
</div>
    <div id="services" style="display: flex; align-items:center">
<i class="bi bi-wifi fa-2x"></i><li style="display: flex;"><a class="active" href="data.php">Buy Data</a><i style="display:none" class="fa fa-times" aria-hidden="true"></i></li>
</div>
<div id="services" style="display: flex; align-items:center">
<i class="bi bi-telephone-fill fa-2x"></i><li><a href="airtime.php">Buy Airtime</a></li>
</div>
<div id="services" style="display: flex; align-items:center">
<i class="bi bi-lightbulb fa-2x"></i><li><a href="#contact">Pay Bill</a></li>
</div>
<div id="services" style="display: flex; align-items:center">
<i class="bi bi-tv fa-2x"></i><li><a href="#about">TV Subscription</a></li>
</div>
</ul>

<div id="wholeBody" style="margin-left:25%;padding:1px 16px;height:100px;">
  <h2 id="header" style="justify-content:space-around; display:flex; background:white; box-shadow:2px 2px 5px rgba(0,0,0,0.5); position:fixed; width:73%; z-index:1; margin:0; padding: 15px 0px">
<!-- <div class="align-right"><i class="bi bi-bell-fill"></i><i class="bi bi-bullseye"></i></div>-->
<div id="sidebar-toggle">
  <i class="fas fa-bars"></i>
</div>

</h2> 

  <div class="container mt-5 shadow h-40" style="justify-content: space-around;">
  <h2 class="text-center mb-5"><marquee>Welcome Again <?php $username; ?></marquee></h2>
  <div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
          <div class="card shadow">
          <i class="bi bi-wallet fa-3x" style="margin: 0 auto;"></i>
          <div class="card-body">
            <h3 class="card-title">Account balance <span>₦5,000,000</span></h3>
          </div>
          </div>
        </div>
        

        <div class="container mt-5">
          <h2 class="text-center">Top Up Instantly</h2>
          <!-- first row of services -->
          <div class="row">
            <!-- first column -->
            <div class="col-md-6">
              <div class="card">
              <i class="bi bi-wifi fa-3x" style="margin: 0 auto;"></i>
                <div class="body">
                  <h5 class="card-title text-center">Buy Data</h5>
                </div>
              </div>
            </div>
            <!-- second column -->
            <div class="col-md-6">
            <div class="card">
            <i class="bi bi-telephone-fill fa-3x" style="margin: 0 auto;"></i>
                <div class="body">
                  <h5 class="card-title text-center">Top Up Airtime</h5>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- second row of service -->
  <div class="row mt-3">
    <!-- first column -->
            <div class="col-md-6">
              <div class="card">
              <i class="bi bi-lightbulb fa-3x" style="margin: 0 auto;"></i>
                <div class="body">
                  <h5 class="card-title text-center">Pay Bill</h5>
                </div>
              </div>
            </div>
            <!-- second column -->
            <div class="col-md-6">
            <div class="card">
            <i class="bi bi-tv fa-3x" style="margin: 0 auto;"></i>
                <div class="body">
                  <h5 class="card-title text-center">Pay TV Sub</h5>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const sidebarToggle = document.getElementById("sidebar-toggle");

  sidebarToggle.addEventListener("click", function () {
    sidebar.classList.toggle("active");
  });
});
</script>

</body>
</html>