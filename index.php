<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yamboy Sub</title>
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="./assets/img/yamboyLogo.jpg">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <script src="./assets/lib/fontawesome-free-6.5.0-web/js/all.min.js"></script>
        <link rel="stylesheet" href="./assets/lib/fontawesome-free-6.5.0-web/css/all.min.css"> -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .about-header {
  background: linear-gradient(to right, #007bff, #ffffff);
  color: #fff;
}
.hero {
  background: linear-gradient(to bottom, rgba(0, 123, 255, 0.7), rgba(255, 255, 255, 0.8)), 
              url('./assets/img/hero-bg.jpg') center/cover no-repeat;
  color: #fff;
}

</style>
</head>
<body>
      
<!-- Navbar -->
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
  <div class="container d-flex justify-content-between align-items-center">
    <!-- Navbar Brand -->
    <a class="navbar-brand" href="#">
      <img src="./assets/img/yamboyLogo.jpg" class="logo img-fluid" width="30" alt="" loading="lazy">
    </a>

    <!-- Toggler button for mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-dark" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Prices</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Testimonials</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar -->

  <!-- hero section -->
  <div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
      <div class="row g-5 py-5">
        <div class="col-lg-6 text-center text-lg-start">
          <h1 class="text-white mb-4 animated zoomIn">Welcome to Yamboy Sub</h1>
          <p class="text-white pb-3 animated zoomIn">Seamlessly top up airtime, data, and utilities at unbeatable prices, your reliable partner for fast, secure, and convenient top-ups. Whether you need airtime, data bundles, or utility bill payments, we’ve got you covered—all in one place Our mission is to simplify the way you stay connected by providing a seamless and user-friendly platform for virtual top-ups. At Yamboy Sub, we understand that time is valuable, and that’s why we’ve made it our goal to offer instant transactions, so you can get back to what matters most.
          Powered by cutting-edge technology and a commitment to excellence, Yamboy Sub is here to make sure you're always connected to the things that matter—no more queues, no more hassles, just easy and fast solutions. Join us today and experience the future of top-up services with Yamboy Sub!
          </p>
          <a href="./user/register.php" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Register</a>
          <a href="./user/login.php" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Login</a>
        </div>
        <div class="col-lg-6 text-center text-lg-start">
          <img class="img-fluid" src="./assets/img/hero.png" alt="">
        </div>
      </div>
    </div>
  </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                            <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->

    <!-- about us-->
     <!-- About Header Section -->
<section class="about-header bg-light py-5">
  <div class="container d-flex flex-column align-items-center text-center">
    <!-- Title -->
    <h2 class="display-5 fw-bold text-primary">
      About Yamboy Sub
    </h2>

    <!-- Subtitle -->
    <p class="lead text-muted mt-3">
      Your Trusted Partner for Seamless VTU Services.
    </p>

    <!-- Interactive Description -->
    <p class="text-dark mt-4 mb-5 px-3" style="max-width: 800px;">
      At Yamboy Sub, we specialize in providing fast and reliable Virtual Top-Up (VTU) services, 
      including airtime, data, cable TV subscriptions, and utility bill payments. With a focus on 
      affordability and convenience, we empower individuals and businesses across Nigeria to stay 
      connected and productive.
    </p>

    <!-- Call-to-Action Buttons -->
    <div>
      <a href="#our-story" class="btn btn-primary btn-lg mx-2">Our Story</a>
      <a href="#contact" class="btn btn-outline-dark btn-lg mx-2">Contact Us</a>
    </div>
  </div>
</section>

    <!-- services -->
    <div class="container my-5">
        <h1 class="text-center">Our Services</h1>
        <!-- 1st row -->
        <div class="row">
          <!-- data card  -->
          <div class="col-lg-4 my-2">
            <div class="card shadow">
              <div class="card-body">
                <i class="bi bi-wifi"></i>
                <h4 class="card-title text-center">Data</h4>
                <p class="card-text">Get affordable data bundles with instant activation. Stay connected with seamless browsing, streaming, and downloads anytime, anywhere.</p>
              </div>
            </div>
          </div>
          <!-- airtime card  -->
          <div class="col-lg-4 my-2">
            <div class="card shadow">
              <div class="card-body">
                <i class="bi bi-telephone-inbound-fill"></i>
                <h4 class="card-title text-center">Airtime</h4>
                <p class="card-text">Top-up airtime instantly for all networks. Enjoy fast, reliable service that keeps you connected to the people that matter.</p>
              </div>
            </div>
          </div>
          <!-- tv card  -->
          <div class="col-lg-4">
            <div class="card shadow">
              <div class="card-body">
                <i class="bi bi-tv"></i>
                <h4 class="card-title text-center">TV Cables</h4>
                <p class="card-text">Pay for your favorite TV subscriptions quickly and easily. Enjoy uninterrupted viewing of your favorite channels and shows.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- 2st row -->
        <div class="row my-3">
          <!-- bill card -->
          <div class="col-lg-4">
            <div class="card shadow">
              <div class="card-body">
                <i class="bi bi-lightbulb-fill"></i>
                <h4 class="card-title text-center">Electricity</h4>
                <p class="card-text">Pay your electricity bills from the comfort of your home. No more queues, just quick and easy transactions to keep the lights on.</p>
              </div>
            </div>
          </div>
        <!-- result pin -->
        <div class="col-lg-4 my-2">
          <div class="card shadow">
            <div class="card-body">
              <i class="bi bi-mortarboard-fill"></i>
              <h4 class="card-title text-center">Result Pin</h2>
              <p class="card-text">Purchase result checking pins for exams like WAEC, NECO, and JAMB instantly and conveniently.</p>
            </div>
          </div>
        </div>
        <!-- airtime to money -->
        <div class="col-lg-4">
          <div class="card shadow">
            <div class="card-body">
              <i class="bi bi-cash"></i>
              <h2 class="card-title text-center">Airtime To Cash</h2>
              <p class="card-text">Convert your excess airtime to cash in a few simple steps. Enjoy a hassle-free experience with instant conversion.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- prices -->
    <div class="container" id="prices">
      <h1 class="text-center">Prices</h1>
      <div class="row">
        <!-- mtn price -->
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <img src="./assets/img/mtn.jpeg" style="width:50%; height:20%"  alt="" class="card-img-top img-fluid">
                <table class="table table-striped text-center">
                <thead>
                  <tr>
                      <th>Data Plan</th>
                      <th>Price (₦)</th>
                  </tr>
                </thead>
                  <tr>
                    <td>500MB</td>
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
            <!-- airtel price -->
            <div class="col-lg-3">
              <div class="card">
                <div class="card-body">
                <img src="./assets/img/airtel.jpeg" style="width:50%; height:20%" alt="" class="card-img-top img-fluid">
                <table class="table table-striped text-center">
                <thead>
                  <tr>
                      <th>Data Plan</th>
                      <th>Price (₦)</th>
                  </tr>
                </thead>
              <tr>
                <td>500MB</td>
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
            <!-- glo price -->
            <div class="col-lg-3">
            <div class="card">
            <div class="card-body">
                <img src="./assets/img/glo.jpeg" style="width:50%; height:20%" alt="" class="card-img-top">
                <table class="table table-striped text-center">
                <thead>
                  <tr>
                      <th>Data Plan</th>
                      <th>Price (₦)</th>
                  </tr>
                </thead>
              <tr>
                <td>500MB</td>
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
            <!-- 9mobile price -->
            <div class="col-lg-3">
            <div class="card">
            <div class="card-body">
                <img src="./assets/img/9mobile.jpeg" style="width:50%; height:20%" alt="" class="card-img-top rounded-2 width-10">
                <table class="table table-striped text-center">
                <thead>
                  <tr>
                      <th>Data Plan</th>
                      <th>Price (₦)</th>
                  </tr>
                </thead>
              <tr>
                <td>500MB</td>
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
        </div>
    </div>
    <!-- <section class="ftco-section testimony-section bg-primary">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section heading-section-white text-center ftco-animate">
					<span class="subheading">Testimonies</span>
					<h2 class="mb-4">What client says about?</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row ftco-animate">
				<div class="col-md-12">
					<div class="carousel-testimony owl-carousel">
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="text">
									<span class="fa fa-quote-left"></span>
									<p class="mb-4 pl-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(./assets/img/person_1.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="text">
									<span class="fa fa-quote-left"></span>
									<p class="mb-4 pl-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(assets/img/person_2.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="text">
									<span class="fa fa-quote-left"></span>
									<p class="mb-4 pl-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(assets/img/person_3.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="text">
									<span class="fa fa-quote-left"></span>
									<p class="mb-4 pl-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(assets/img/person_1.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="text">
									<span class="fa fa-quote-left"></span>
									<p class="mb-4 pl-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(assets/img/person_2.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

    <!-- testimonials -->
    <h1 style="text-align: center">TESTIMONIALS</h1>
    <p style="text-align: center">What our customers / clients says about our site</p>
    <div class="testimonials" id="testimonials">
      <!-- testimonials cards div container -->
      <div class="testimonialsCardsDiv">
        <!-- 1st client -->

        <div class="mySlides fade">
          <img src="./assets/img/testimonial1.jpeg" alt="">
          <h5>— Chika A., Lagos</h5>
          <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
          <p>"Yamboy Sub has been a game-changer for me. I love how fast and easy it is to top up my data and airtime. No more waiting in line at kiosks—just a few clicks, and I'm good to go. Highly recommend!"</p>
          <!-- <div class="text">Testimonial 1</div> -->
        </div>

        <!-- 2nd client -->
        <div class="mySlides fade">
          <img src="./assets/img/testimonial2.jpeg" alt="">
          <h5>— Adeola K., Abuja</h5>
          <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
          <p>"I’ve been using Yamboy Sub for a few months now, and I’m impressed with the service. The platform is user-friendly, and my transactions are always instant. Plus, the payment options are super convenient!"</p>
          <!-- <div class="text">Testimonial 2</div> -->
        </div>

        <!-- 3rd client -->
        <div class="mySlides fade">
          <img src="./assets/img/testimonial3.jpeg" alt="">
          <h5>— Michael O., Port Harcourt</h5>
          <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
          <p>"Yamboy Sub makes it so easy to stay connected. I appreciate the security and speed of the platform. It’s my go-to for topping up airtime and paying bills. Best service out there!"</p>
        </div>

      </div>
        <!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

      <!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
    </div>
    <!-- why choose us -->
    <h1 style="text-align: center">Why Choose US</h1>
     <div class="container">

      <div class="fast">
        <i class="fas fa-bolt"></i>
        <h3>Fast and Reliable Service</h3>
        <p>We prioritize speed and efficiency to ensure that your top-up is processed instantly. No more waiting—just seamless transactions.</p>
      </div>

      <div class="secure">
        <i class="fas fa-lock"></i>
        <h3>Secure Transactions</h3>
        <p>Your safety is our top priority. Our platform is built with advanced security protocols, ensuring that your personal information and payment details are protected at all times.</p>
      </div>

      <div class="pricing">
        <i class="fas fa-tags"></i>
        <h3>Competitive Pricing</h3>
        <p>We offer some of the best rates in the market, giving you more value for your money. No hidden fees—just transparent, affordable pricing.</p>
      </div>

      <div class="customerSupport">
        <i class="fas fa-headset"></i>
        <h3>24/7 Customer Support</h3>
        <p>We are here for you around the clock. Our dedicated support team is always ready to assist with any questions or concerns you may have.</p>
      </div>

      <div class="EasyToUse">
        <i class="fas fa-check-circle"></i>
        <h3>Easy to Use</h3>
        <p>Our user-friendly platform makes it simple for you to top up anytime, anywhere. Just a few clicks, and you're done!</p>
      </div>

      <div class="WideRangeOfServices">
        <i class="fas fa-th-list"></i>
        <h3>Wide Range of Services</h3>
        <p>Whether you need airtime, data, or utility payments, we have you covered. Enjoy the convenience of multiple services all in one place.</p>
      </div>
     </div>
     <!-- whatsapp us -->
      <a style="color: green" href="https://wa.me/08149715017" target="_blank" class="whatsappUs">
      <i class="fab fa-whatsapp"></i>
        <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
      </a>
    
    <!-- Footer Start -->
         <div class="container-fluid footer bg-dark wow fadeIn" data-wow-delay=".3s">
            <div class="container pt-5 pb-4">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <a href="index.html">
                            <h1 class="text-white fw-bold d-block">High<span class="text-secondary">Tech</span> </h1>
                        </a>
                        <p class="mt-4 text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta facere delectus qui placeat inventore consectetur repellendus optio debitis.</p>
                        <div class="d-flex hightech-link">
                            <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-facebook-f text-primary"></i></a>
                            <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-twitter text-primary"></i></a>
                            <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-instagram text-primary"></i></a>
                            <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="h3 text-secondary">Short Link</a>
                        <div class="mt-4 d-flex flex-column short-link">
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>About us</a>
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Contact us</a>
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Our Services</a>
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Our Projects</a>
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Latest Blog</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="h3 text-secondary">Help Link</a>
                        <div class="mt-4 d-flex flex-column help-link">
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Terms Of use</a>
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Privacy Policy</a>
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Helps</a>
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>FQAs</a>
                            <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Contact</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="h3 text-secondary">Contact Us</a>
                        <div class="text-white mt-4 d-flex flex-column contact-link">
                            <a href="#" class="pb-3 text-light border-bottom border-primary"><i class="fas fa-map-marker-alt text-secondary me-2"></i> 123 Street, New York, USA</a>
                            <a href="#" class="py-3 text-light border-bottom border-primary"><i class="fas fa-phone-alt text-secondary me-2"></i> +123 456 7890</a>
                            <a href="#" class="py-3 text-light border-bottom border-primary"><i class="fas fa-envelope text-secondary me-2"></i> info@exmple.con</a>
                        </div>
                    </div>
                </div>
                <hr class="text-light mt-5 mb-4">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        <span class="text-light"><a href="#" class="text-secondary"><i class="fas fa-copyright text-secondary me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <span class="text-light">Designed By<a href="https://htmlcodex.com" class="text-secondary">HTML Codex</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer End -->

    <script>
      
      function toggleMenu() {
          let sidebar = document.getElementById('menu');
          let isOpen = sidebar.style.top === '0px';
          sidebar.style.top = isOpen ? '-100%' : '0px';

          let toggleIcon = document.querySelector(".menu-toggle");
          toggleIcon.classList.toggle('open');
      }

      let slideIndex = 0;
      showSlides();

      function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
      }
    </script>
    <!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/css/bootstrap.min.js"></script>
</body>
</html>