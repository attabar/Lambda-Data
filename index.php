<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yamboy Sub</title>
    <link rel="stylesheet" href="./assets/css/style.css">
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
</head>
<body>
      <!-- Header with menu toggle -->
      <div class="header">
        <img src="./assets/img/yamboyLogo.jpg" class="logo" alt="" srcset="">
        <!-- Side menu -->
        <div class="menu" id="menu">
            <ul>
                <li><a href="/" class="home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contactUs">Contact</a></li>
                <li><a href="#prices">Prices</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="./user/RegistrationPage.php" class="register">Register</a></li>
                <li><a href="./user/loginPage.php" class="login">Login</a></li>
            </ul>
        </div>
        <div class="menu-toggle" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>

  <!-- hero section -->
  <div class="hero">

    <div class="hero-text">
      <div class="effect"></div>
        <h1>Welcome To <span>Yamboy</span> Sub, The most fast Virtual Top Up Company In Nigeria.</h1>
        <h3>Top Up Anytime and Anywhere</h3>
        <a href="./user/RegistrationPage.php" class="btn1">Register</a>
        <a href="./user/loginPage.php" class="btn2">Login</a>
    </div>
    <!-- hero img start -->
    <div class="hero-img">
      <img src="./assets/img/hero.png" alt="">
    </div>
  </div>
    <!-- about us-->
     <h1 style="text-align: center;">About Yamboy Sub</h1>
    <div class="aboutUs" id="about">
        <img src="./assets/img/yamboyLogo.jpg" alt="aboutUsImg" id="aboutUsImg">
        <h2>Yamboy Sub</h2>
        <h4>Welcome to Yamboy Sub, your reliable partner for fast, secure, and convenient top-ups. Whether you need airtime, data bundles, or utility bill payments, we’ve got you covered—all in one place
          <br/><br/>Our mission is to simplify the way you stay connected by providing a seamless and user-friendly platform for virtual top-ups. At Yamboy Sub, we understand that time is valuable, and that’s why we’ve made it our goal to offer instant transactions, so you can get back to what matters most.
          <br/><br/>Powered by cutting-edge technology and a commitment to excellence, Yamboy Sub is here to make sure you're always connected to the things that matter—no more queues, no more hassles, just easy and fast solutions.

Join us today and experience the future of top-up services with Yamboy Sub!</h4>
    </div>
    
    <!-- services -->
    <div class="services" id="services">
        <h1>Our Services</h1>
        <!-- grid container -->
        <div class="grid-container">
        <!-- data -->
        <div class="data">
        <i class="bi bi-wifi"></i>
        <h2>Data</h2>
        <p>Get affordable data bundles with instant activation. Stay connected with seamless browsing, streaming, and downloads anytime, anywhere.</p>
        </div>
        <!-- airtime -->
        <div class="airtime">
        <i class="bi bi-telephone-inbound-fill"></i>
        <h2>Airtime</h2>
        <p>Top-up airtime instantly for all networks. Enjoy fast, reliable service that keeps you connected to the people that matter.</p>
        </div>
        <!-- tv -->
        <div class="tv">
        <i class="bi bi-tv"></i>
        <h2>TV Cables</h2>
        <p>Pay for your favorite TV subscriptions quickly and easily. Enjoy uninterrupted viewing of your favorite channels and shows.</p>
        </div>
        <!-- bill -->
        <div class="bill">
        <i class="bi bi-lightbulb-fill"></i>
        <h2>Electricity</h2>
        <p>Pay your electricity bills from the comfort of your home. No more queues, just quick and easy transactions to keep the lights on.</p>
        </div>
        <!-- result pin -->
        <div class="result-pin">
        <i class="bi bi-mortarboard-fill"></i>
        <h2>Result Pin</h2>
        <p>Purchase result checking pins for exams like WAEC, NECO, and JAMB instantly and conveniently.</p>
      </div>
        <!-- airtime to money -->
        <div class="airtime-to-money">
        <i class="bi bi-cash"></i>
        <h2>Airtime To Cash</h2>
        <p>Convert your excess airtime to cash in a few simple steps. Enjoy a hassle-free experience with instant conversion.</p>
        </div>
        </div>
    </div>

    <!-- prices -->
    <div class="prices" id="prices">
        <h1>Prices</h1>
        <!-- grid container -->
        <div class="grid-container">
            <!-- mtn price -->
            <div class="mtn-price">
                <img src="./assets/img/mtn.jpeg" alt="">
                <table style="display: flex; justify-content:space-around; width:100%">
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
            <!-- airtel price -->
            <div class="airtel-price">
                <img src="./assets/img/airtel.jpeg" alt="">
                <table style="display: flex; justify-content:space-around; width:100%">
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
            <!-- glo price -->
            <div class="glo-price">
                <img src="./assets/img/glo.jpeg" alt="">
                <table style="display: flex; justify-content:space-around; width:100%">
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
            <!-- 9mobile price -->
            <div class="9mobile-price">
                <img src="./assets/img/9mobile.jpeg" alt="">
                <table style="display: flex; justify-content:space-around; width:100%">
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
     <div class="whyChooseUs">

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
    
    <!-- footer -->
    <div class="footer">
      <!-- first Child -->
      <div class="firstChild">
        <!-- address -->
        <div class="contact-info">
          <h3>Address / Contact </h3>
          <p>- Street: Jiddari Bus Stop, Maiduguri, Borno State</p>
          <p>- Tel: 08149715017, 09028350494</p>
          <p>- Email: mabdulmalik436@gmail.com</p>
        </div>
        <!-- usefull link 1 -->
        <div class="useful-link1 footer-div">
          <h3>Quick nav</h3>
          <p><a href="/">Home</a></p>
          <p><a href="#about">About</a></p>
          <p><a href="#services">Services</a></p>
          <p><a href="#testimonials">Testimonials</a></p>
          <p><a href="#prices">Prices</a></p>
        </div>
        <!-- usefull link 2-->
        <div class="useful-link2 footer-div">
          <h3>Social Media Handles</h3>
          <p><i class="fab fa-whatsapp"></i> WhatsApp</p>
          <p><i class="fab fa-facebook-f"></i> Facebook</p>
          <p><i class="fab fa-telegram-plane"></i> Telegram</p>
          <p><i class="fab fa-youtube"></i> YouTube</p>
        </div>
        <div class="subscribe">
          <h3 class="newsletterH">Subscribe To Our Newsletter</h3>
          <form action="./PHP/subscribe.php" method="POST">
            <input type="email" name="email-subscribe"  id="subscribe">
            <button id="subscribe-button">Subscribe</button>
          </form>
        </div>
      </div>
      <div class="secondChild">
      <div class="copy-right">
        <p>&copy; <?php $date = date("Y"); echo $date; ?> <a style="color: white; text-decoration:none" href="https://wa.me/08149715017">Lambda Tech Solution Services</a></p>
      </div>
      </div>
    </div>
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
</body>
</html>