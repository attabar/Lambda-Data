    <?php require_once '../sidebar.php' ?>
    <!--  Main wrapper -->
    
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 mt-5 col-sm-4 col-xs-3">
            <a href="data.php">
            <div class="card rounded-2 h-100 shadow">
            <div class="position-relative d-flex align-items-center justify-content-center">
            <i class="bi bi-wifi fa-3x"></i>
            </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4 text-center">Buy Data</h6>
              </div>
            </div>
            </a>
          </div>


          <div class="col-md-6 col-sm-4 col-xs-3">
            <a href="airtime.php">
            <div class="card rounded-2 h-100 shadow">
            <div class="position-relative d-flex align-items-center justify-content-center">
                
            </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4 text-center">Buy Airtime</h6>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-6 mt-5 col-sm-4 col-xs-3">
            <a href="electricity.php">
            <div class="card rounded-2 h-100 shadow">
            <div class="position-relative d-flex align-items-center justify-content-center">
              <i class="bi bi-lightbulb fa-3x"></i>
            </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4 text-center">Pay Bill</h6>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-6 mt-5 col-sm-4 col-xs-3">
          <a href="tv.php">
            <div class="card h-100 rounded-2 shadow">
              <div class="position-relative d-flex align-items-center justify-content-center">
                
              </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4 text-center">Cable Subscription</h6>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-6 col-sm-4 col-xs-3 mt-5">
            <a href="fundWallet.php">
            <div class="card rounded-2 h-100 shadow">
            <div class="position-relative d-flex align-items-center justify-content-center">
            <i class="bi bi-wallet fa-3x"></i>
            </div>
              <div class="card-body">
                <h6 class="fw-semibold fs-4 text-center">Fund Wallet</h6>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-6 col-sm-4 col-xs-3 mt-5">
            <a href="rChecker.php">
            <div class="card rounded-2 h-100 shadow">
            <div class="position-relative d-flex align-items-center justify-content-center">
            <i class="fa fa-graduation-cap fa fa-3x" aria-hidden="true"></i>
            </div>
              <div class="card-body">
                <h6 class="fw-semibold fs-4 text-center">Result Checker</h6>
              </div>
            </div>
            </a>
          </div>

    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>