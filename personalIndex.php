<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lambda Data</title>
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
<!-- Bootstrap JavaScript (popper.js is required for some Bootstrap features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="assets/css/style.css">
<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<!-- JQuery links -->
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<!-- favicon -->
<link rel="shortcut icon" type="image/jpeg" href="./assets/img/logo.jpeg" />
<!-- fontawesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
 tr{
  display: flex;
  justify-content: space-between;
  width: 100%;
  margin-bottom: 10px;
 }
 td{
  margin: 0 5px;
 }
 .styleHero{
  background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));
  /* background-color: #888; */
  border-bottom-left-radius: 50px;
  border-top-right-radius: 100px;
  padding-bottom: 5px;
  /* background-image: linear-gradient(rgba(to bottom, 0,0,0,0.9),rgba(to bottom, 0,0,0,0.9),rgba(to bottom, 230,130,110,1),); */
  /* border: 10px solid transparent;
  border-image: url("assets/img/borderImage.jpeg") 30 round; */
 }

 @media screen and (max-width:676px) {
  .footer .parent-footer-div{
    display: block;
  }
  footer{
    width: 100%;
  }
  .custom-carousel-item{
    flex-direction: column;
  }
  .custom-carousel-item img{
    width: 100%;
  }
  .custom-carousel-item h2, .custom-carousel-item p {
    text-align: center; /* Center text on small screens */
  }
  }
 
 #gurantee{
  background: url("assets/img/gurantee.jpeg") center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 100vh;
  display: flex;
  align-items: center;
  padding: 50px;
  background-color: transparent;
 }

</style>
</head>
<body>
  
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow fixed-top">
<a href="index.html" class="navbar-brand align-items-center px-4">
<h2 class="m-0 text-primary" id="logo"><i class="bi bi-wifi"></i> Lambda Data</h2>
</a>
<button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
<div class="navbar-nav ms-auto p-4 p-lg-0">
<li class="nav-item me-3"><a href="#" class="nav-item nav-link active">Home</a></li>
<li class="nav-item me-3"><a href="" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#aboutModal">About</a></li>
<li class="nav-item me-3"><a href="#courses" class="nav-item nav-link">Courses</a></li>
<li class="nav-item me-3"><a href="register.php" class="nav-item nav-link">Register</a></li>
<li class="nav-item me-3"><a href="userDashboard/dashboard.php" class="nav-item nav-link">Contact</a></li>
</div>
<!-- <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a> -->
</div>
</nav>

<div id="myCarousel" class="carousel styleHero slide mt-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    <!-- First Slide -->
    <div class="carousel-item active custom-carousel-item">
      <div class="container">
        <div class="row" id="heroContainer">
          <div class="col-md-6 col-sm-12">
            <img src="assets/img/hero3.png"  alt="Image 1">
          </div>
          <div class="col-md-6 col-sm-12">
            <h2 style="word-spacing: 5px;"><i class="bi bi-stars text-warning"></i><span class="text-light">To Lambda Data</span><i class="bi bi-stars text-warning"></i></h2>
            <p>We are a registered telecommunication company that provide voice or data transmission services, such as; Mobile Data, Cable Sub, Electric Bill, Airtime (VTU).</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Second Slide -->
    <div class="carousel-item custom-carousel-item">
      <div class="container">
        <div class="row" style="justify-content: space-between; display:flex; align-items:center">
          <div class="col-md-6">
            <img src="assets/img/homepage.png" alt="Image 2" width="500">
          </div>
          <div class="col-md-6 mt-5">
            <h3><i class="bi bi-star-half text-warning"></i> Unlock a World of Connectivity.</h2>
            <h3><i class="bi bi-star-half text-warning"></i> Top-Up & Connect in the Blink of an Eye.</h2>
            <h3><i class="bi bi-star-half text-warning"></i> Top-Up Smarter, Not Harder.</h2>
          </div>
        </div>
      </div>
    </div>

    <!-- Add more slides as needed -->

  </div>
  <!-- Controls (optional) -->
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>

<!-- Products Categories -->

<!-- Product Categories Section -->
<div class="container mt-5">
    <h2>What We Offer</h2>
    <div class="row">
        <!-- Category Card 1 -->
        <div class="col-md-4">
            <div class="card shadow">
            <!-- <i class="bi bi-telephone-fill"></i> -->
                <div class="card-body">
                <i class="bi bi-telephone-fill fa-5x align-items-center justify-content-center"></i>
                    <h5 class="card-title">Mobile Top-Ups</h5>
                    <p class="card-text">Recharge your mobile balance instantly.</p>
                    <a href="#" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>

        <!-- Category Card 2 -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                <i class="bi bi-wifi fa-5x"></i>
                    <h5 class="card-title">Data Plans</h5>
                    <p class="card-text">Get data plans for surfing the web.</p>
                    <a href="#" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>

        <!-- Category Card 3 -->
        <div class="col-md-4">
            <div class="card shadow">
            
                <div class="card-body">
                <i class="fa fa-graduation-cap fa-7x" aria-hidden="true"></i>
                    <h5 class="card-title">Waec/Neco Pin</h5>
                    <p class="card-text">Top up your gaming accounts.</p>
                    <a href="#" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Category Card 1 -->
        <div class="col-md-4">
            <div class="card shadow">
            <!-- <i class="bi bi-telephone-fill"></i> -->
                <div class="card-body">
                <i class="bi bi-tv fa-5x"></i>
                    <h5 class="card-title">TV Subscription</h5>
                    <p class="card-text">Recharge your mobile balance instantly.</p>
                    <a href="#" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>

        <!-- Category Card 2 -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                <i class="bi bi-lightbulb fa-5x"></i>
                    <h5 class="card-title">Electricity Bill</h5>
                    <p class="card-text">Get data plans for surfing the web.</p>
                    <a href="#" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>

        <!-- Category Card 3 -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                <i class="bi bi-cash fa-5x"></i>
                    <h5 class="card-title">Airtime to Cash</h5>
                    <p class="card-text">Top up your gaming accounts.</p>
                    <a href="#" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5" id="gurantee">
  <div class="container mb-5">
  <h1>We Are Unique</h1>
  <ul>
    <li>We Are Available 24/7</li>
    <li>We Accept Different Payment Method</li>
    <li>We Pay referrals</li>
    <li>We have low Price</li>
  </ul>
  </div>
</div>

<div class="container mt-5">
        <h2 class="text-center mb-4">User Guide On How To Navigate</h2>
        <div class="row shadow">
            <div class="col-md-4">
                <div class="step">
                    <h4>Step 1</h4>
                    <p>Sign Up for an Account</p>
                    <img src="assets/img/howItWork2.png" alt="Step 1 Image" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="step">
                    <h4>Step 2</h4>
                    <p>Go to Login Page</p>
                    <img src="assets/img/howItWork3.png" alt="Step 2 Image" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="step">
                    <h4>Step 3</h4>
                    <p>Go Dashboard & Select Service</p>
                    <img src="assets/img/dashboard.png" alt="Step 3 Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
      <h3 class="text-center">Pricing and Plans</h3>
      <div class="row">
        <div class="col-md-3">
          <div class="card">
          <img src="assets/img/mtn.jpeg" alt="" class="top-img-card" height="100">
          <div class="card-body">
            <table style="display: flex; justify-content:space-around; width:100%">
              <tr>
                <td colspan="5">500MB</td>
                <td>₦110</td>
              </tr>
              <tr>
                <td>750MB</td>
                <td>₦130</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦210</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦220</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦230</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦410</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦420</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦430</td>
              </tr>
              <tr>
                <td>3GB</td>
                <td>₦620</td>
              </tr>
              <tr>
                <td>3GB</td>
                <td>₦630</td>
              </tr>
              <tr>
                <td>5GB</td>
                <td>₦1100</td>
              </tr>
              <tr>
                <td>10GB</td>
                <td>₦2000</td>
              </tr>
            </table>
          </div>
          </div>
        </div>
        <!-- second column -->
        <div class="col-md-3">
          <div class="card">
          <img src="assets/img/airtel.jpeg" alt="" class="top-img-card" height="100">
          <div class="card-body">
            <table style="display: flex; justify-content:space-around; width:100%">
              <tr>
                <td colspan="5">500MB</td>
                <td>₦110</td>
              </tr>
              <tr>
                <td>750MB</td>
                <td>₦130</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦210</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦220</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦230</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦410</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦420</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦430</td>
              </tr>
              <tr>
                <td>3GB</td>
                <td>₦620</td>
              </tr>
              <tr>
                <td>3GB</td>
                <td>₦630</td>
              </tr>
              <tr>
                <td>5GB</td>
                <td>₦1100</td>
              </tr>
              <tr>
                <td>10GB</td>
                <td>₦2000</td>
              </tr>
            </table>
          </div>
          </div>
        </div>
      <!-- third column -->
      <div class="col-md-3">
          <div class="card">
          <img src="assets/img/glo.jpeg" alt="" class="top-img-card" height="100">
          <div class="card-body">
            <table style="display: flex; justify-content:space-around; width:100%">
              <tr>
                <td colspan="5">500MB</td>
                <td>₦110</td>
              </tr>
              <tr>
                <td>750MB</td>
                <td>₦130</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦210</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦220</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦230</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦410</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦420</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦430</td>
              </tr>
              <tr>
                <td>3GB</td>
                <td>₦620</td>
              </tr>
              <tr>
                <td>3GB</td>
                <td>₦630</td>
              </tr>
              <tr>
                <td>5GB</td>
                <td>₦1100</td>
              </tr>
              <tr>
                <td>10GB</td>
                <td>₦2000</td>
              </tr>
            </table>
          </div>
          </div>
        </div>
        <!-- fourth column -->
        <div class="col-md-3">
          <div class="card">
          <img src="assets/img/9mobile.jpeg" alt="" class="top-img-card" height="100">
          <div class="card-body">
            <table style="display: flex; justify-content:space-around; width:100%">
              <tr>
                <td colspan="5">500MB</td>
                <td>₦110</td>
              </tr>
              <tr>
                <td>750MB</td>
                <td>₦130</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦210</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦220</td>
              </tr>
              <tr>
                <td>1GB</td>
                <td>₦230</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦410</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦420</td>
              </tr>
              <tr>
                <td>2GB</td>
                <td>₦430</td>
              </tr>
              <tr>
                <td>3GB</td>
                <td>₦620</td>
              </tr>
              <tr>
                <td>3GB</td>
                <td>₦630</td>
              </tr>
              <tr>
                <td>5GB</td>
                <td>₦1100</td>
              </tr>
              <tr>
                <td>10GB</td>
                <td>₦2000</td>
              </tr>
            </table>
          </div>
          </div>
        </div>
        <!-- End of Row -->
      </div>
      <!-- End of Pricing and Plan -->
    </div>
    
    <!-- testimonials -->
    <div class="container mt-5">
      <h3 class="text-center">What Our Clients Says</h3>
      <div class="row">
        <!-- first column -->
        <div class="col-md-3">
          <div class="card">
            <img src="assets/img/testimonial1.jpeg" alt="" style="height:20vh">
            <div class="card-body">
              <h4 class="card-title">John Kame</h4>
              <hp><i class="fa-solid fa-quote-left"></i> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem praesentium laboriosam quasi. Placeat ut in temporibus possimus sit iste, ea corrupti rem inventore voluptatibus commodi doloribus facere quo unde perspiciatis. <i class="fa-solid fa-quote-right"></i></p>
            </div>
          </div>
        </div>
        <!-- second column -->
        <div class="col-md-3">
          <div class="card">
            <img src="assets/img/testimonial2.jpeg" alt="" style="height:20vh">
            <div class="card-body">
              <h4 class="card-title">Mark Ameri</h4>
              <hp><i class="fa-solid fa-quote-left"></i> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem praesentium laboriosam quasi. Placeat ut in temporibus possimus sit iste, ea corrupti rem inventore voluptatibus commodi doloribus facere quo unde perspiciatis. <i class="fa-solid fa-quote-right"></i></p>
            </div>
          </div>
        </div>
        <!-- third column -->
        <div class="col-md-3">
          <div class="card">
            <img src="assets/img/testimonial3.jpeg" alt="" style="height:20vh">
            <div class="card-body">
              <h4 class="card-title">Musa Ali</h4>
              <hp><i class="fa-solid fa-quote-left"></i> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem praesentium laboriosam quasi. Placeat ut in temporibus possimus sit iste, ea corrupti rem inventore voluptatibus commodi doloribus facere quo unde perspiciatis. <i class="fa-solid fa-quote-right"></i></p>
            </div>
          </div>
        </div>
        <!-- fourth column -->
        <div class="col-md-3">
          <div class="card">
            <img src="assets/img/testimonial4.jpeg" alt="" style="height:20vh">
            <div class="card-body">
              <h4 class="card-title">Fatima Goni</h4>
              <hp><i class="fa-solid fa-quote-left"></i> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem praesentium laboriosam quasi. Placeat ut in temporibus possimus sit iste, ea corrupti rem inventore voluptatibus commodi doloribus facere quo unde perspiciatis. <i class="fa-solid fa-quote-right"></i></p>
            </div>
          </div>
        </div>
        <!-- End of Row -->
      </div>
      <!-- End of Testimonial -->
    </div>
    <!-- footer -->
    <div class="container-fluid footer mt-5 bg-dark text-light h-100 py-5 ">
   <div class="parent-footer-div first-row d-flex" style="justify-content: space-around;">

   <div class="contact-information"> 
    <h4>CONTACT US</h4>
    <h5 class="email-contact"><i class="bi bi-envelope"></i> mabdulmalik436@gmail.com</h5>
    <h5 class="phone-number"><i class="bi bi-telephone-fill"></i> 08149715017, 09028350494</h5>
    <h5 class="office-address"><i class="bi bi-geo-alt"></i> Jiddari Bus Stop</h5>
   </div>

   <div class="social-media-links">
    <h4>SOCIAL MEDIA LINKS</h4>
    </h5 class="whatsapp-link"><i class="bi bi-whatsapp"></i> <a href="#" class="text-decoration-none text-light">WhatsApp Us</a></h5>
    <h5 class="facebook-link"><i class="bi bi-facebook"></i> <a href="#" class="text-decoration-none text-light">Facebook</a></h5>
    <h5 class="youtube-link"><i class="bi bi-youtube"></i> <a href="#" class="text-decoration-none text-light">YouTube</a></h5>
   </div>

   <div class="useful-links">
    <h4>USEFUL LINKS</h4>
    <ul>
      <li><a href="">About Us</a></li>
      <li><a href="">Blog</a></li>
      <li><a href="">Refund Policy</a></li>
    </ul>
   </div>

   <div class="newsletter">
    <h4>NEWSLETTERS</h4>
    <form action="">
      <input type="email" name="" id="" placeholder="Enter Your Email"><button>Subscribe</button>
    </form>
   </div>
  

   <div class="second-row mt-3 text-center" style="justify-content: center;">
   &copy; 2023 Lambda Data. All rights reserved.
   </div>

</div>
</div>
<script>
$(document).ready(function () {
  // Set the interval for auto-sliding (1 second = 1000 milliseconds)
  var interval = 5000;

  // Function to trigger the next slide
  function nextSlide() {
    $('#myCarousel').carousel('next');
  }

  // Start the auto-slide interval
  var slideInterval = setInterval(nextSlide, interval);

  // Pause auto-slide when a user interacts with the carousel
  $('#myCarousel').on('slide.bs.carousel', function () {
    clearInterval(slideInterval); // Clear the interval
    slideInterval = setInterval(nextSlide, interval); // Restart the interval
  });
});
</script>
</body>
</html>


    