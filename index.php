<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lambda Data</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="./img/logo.jpg">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
      <!-- Header with menu toggle -->
      <div class="header">
        <img src="./img/logo.jpg" class="logo" alt="" srcset="">
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
        <h1>Welcome To <span>Lambda</span> Data, The most fast Virtual Top Up Company In Nigeria.</h1>
        <h3>Top Up Anytime and Anywhere</h3>
        <a href="./user/RegistrationPage.php" class="btn1">Register</a>
        <a href="./user/RegistrationPage.php" class="btn2">Login</a>
    </div>
    <!-- hero img start -->
    <div class="hero-img">
      <div class="discount"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i><p>20% Discount</p></div>
      <div class="imgBg"></div>
      <img src="./img/hero.png" alt="">
      <div class="fast"><i class="fa fa-plane" aria-hidden="true"></i><p>100% Fast</p></div>
    </div>
  </div>
    <!-- about us-->
     <h1 style="text-align: center;">About Lambda Data</h1>
    <div class="aboutUs" id="about">
        <img src="./img/logo.jpg" alt="aboutUsImg" id="aboutUsImg">
        <h2>Lambda Data</h2>
        <h4>Lambda data is a virtual top up company registered with CAC Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima, obcaecati quos in cumque sunt sequi possimus pariatur fugit alias ab animi? Distinctio aut velit perferendis, sit nam sint culpa odit!
        Eius officiis, optio maxime, quam facere velit suscipit possimus architecto hic assumenda illum ratione quaerat! Architecto, dicta vitae cupiditate quisquam explicabo possimus minima voluptas laborum quod tempore corrupti odit natus!
        Quas, illo necessitatibus quam odit saepe quia quis accusamus? Possimus id eos sunt dolores labore cupiditate eius quos incidunt voluptates iusto similique totam nobis nostrum, quia facilis tenetur ad libero?.</h4>
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
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat illo nesciunt tempora animi velit cum laudantium ipsa numquam repellendus dolore architecto ab perferendis, ratione dicta, corporis molestiae, modi deserunt obcaecati!</p>
        </div>
        <!-- airtime -->
        <div class="airtime">
        <i class="bi bi-telephone-inbound-fill"></i>
        <h2>Airtime</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis commodi assumenda ducimus ab harum facere. Explicabo, fuga! Repellendus nobis officia, illo doloribus ipsam deleniti perferendis consectetur esse at obcaecati iure.</p>
        </div>
        <!-- tv -->
        <div class="tv">
        <i class="bi bi-tv"></i>
        <h2>TV Cables</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum earum consectetur voluptatibus esse ea numquam eius dolore odio, quae eligendi et distinctio suscipit sapiente. Ea consequatur eaque vero ut maxime.</p>
        </div>
        <!-- bill -->
        <div class="bill">
        <i class="bi bi-lightbulb-fill"></i>
        <h2>Electricity</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque autem voluptatem doloribus praesentium consequatur, dolores nihil quis? Eligendi quas, iure officiis molestiae ipsam mollitia ab facere dicta sed non totam.</p>
        </div>
        <!-- result pin -->
        <div class="result-pin">
        <i class="bi bi-mortarboard-fill"></i>
        <h2>Result Pin</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque cumque assumenda nemo voluptatum ducimus eveniet, quam explicabo voluptates! Aut odit tempora provident molestiae cumque facilis quia aperiam minus quos alias.</p>
        </div>
        <!-- airtime to money -->
        <div class="airtime-to-money">
        <i class="bi bi-cash"></i>
        <h2>Airtime To Cash</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti sit iure inventore aut qui, corporis ad vitae distinctio ducimus sapiente a quibusdam esse eum aliquid id consequatur totam obcaecati exercitationem?</p>
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
                <img src="./img/mtn.jpeg" alt="">
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
                <img src="./img/airtel.jpeg" alt="">
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
                <img src="./img/glo.jpeg" alt="">
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
                <img src="./img/9mobile.jpeg" alt="">
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
    <div class="testimonials" id="testimonials">
      <!-- first child -->
      <div class="firstChild">
      <h1>TESTIMONIALS</h1>
      <p>What our customers / clients says about our site</p>
      </div>
      <!-- second child -->
      <div class="secondChild">
        <!-- 1st client -->
        <div class="fClient">
          <img src="./img/testimonial1.jpeg" alt="">
          <h5>Ali Zannah</h5>
          <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus iusto veniam distinctio nisi vitae nemo eius velit dicta itaque consectetur? Ea magnam voluptate consequatur eos aspernatur. Laborum voluptas veritatis dolores?</p>
        </div>
        <!-- 2nd client -->
        <div class="sClient">
          <img src="./img/testimonial2.jpeg" alt="">
          <h5>Abba Ali</h5>
          <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, autem commodi? Dolores commodi ducimus saepe nostrum, vel provident in, inventore ipsa amet aspernatur velit repellat culpa incidunt exercitationem laudantium omnis.</p>
        </div>
        <!-- 3rd client -->
        <div class="tClient">
          <img src="./img/testimonial3.jpeg" alt="">
          <h5>Modu Gana</h5>
          <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, suscipit! Fuga explicabo quasi laborum debitis iure voluptas amet eveniet odit, at unde ea repudiandae possimus, illo minus veniam, vero exercitationem!</p>
        </div>
      </div>
    </div>
    <!-- contact us -->
    <div class="contactUs" id="contactUs">
      <!-- first child -->
      <div class="firstChild">
        <h1>Contact US</h1>
        <p>Fill out the below form so that your complaint might reach us</p>
      </div>
      <!-- second child -->
      <div class="secondChild">
        <form action="./PHP/handleContactUsForm.php" method="POST">
        <div class="twoInputWrapper">
          <!-- input 1 -->
          <div class="fullname-container">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname">
          </div>
          <!-- input 2 -->
          <div class="email-container">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email">
          </div>
        </div>
          <!-- input 3 -->
          <div class="message-container">
            <label for="message">Message</label><br>
            <textarea name="message" id="message" cols="" rows="10"></textarea>
          </div>
          <div class="button-container">
            <button type="submit">SEND</button>
          </div>
        </form>
      </div>
    </div>
    <!-- footer -->
    <div class="footer">
      <!-- first Child -->
      <div class="firstChild">
        <!-- contacts -->
        <div class="contact-info">
        <img src="./img/logo.jpg" class="logo" alt="" srcset="">
          <h1><span>Lambda</span> Data</h1>
          <p>is a virtual top up company that <br/> is used to purchased data, airtime<br/> Tv Subscription, Electricity bill, <br> result pin and airtime to cash.</p>
        </div>
        <!-- usefull link 1 -->
        <div class="useful-link1">
          <h1>Nav Links</h1>
          <p><a href="/">Home</a></p>
          <p><a href="#about">About</a></p>
          <p>Services</p>
          <p>Contact</p>
        </div>
        <!-- usefull link 2-->
        <div class="useful-link2">
          <h1>SM Handles</h1>
          <p><i class="fa fa-whatsapp" aria-hidden="true" style="color: white;"></i> WhatsApp</p>
          <p><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</p>
          <p><i class="fa fa-telegram" aria-hidden="true"></i> Telegram</p>
          <p><i class="fa fa-youtube-play" aria-hidden="true"></i> YouTube</p>
        </div>
        <div class="subscribe">
          <form action="./PHP/subscribe.php" method="POST">
            <input type="email" name="email-subscribe" placeholder="Enter Your Email" id="subscribe">
            <button id="subscribe-button">Subscribe</button>
          </form>
        </div>
      </div>
      <div class="copy-right">
        <p>&copy; Copyright LAMBDA TECH SERVICES SOLUTION <?php $date = date("Y"); echo $date; ?></p>
      </div>
    </div>
    <script>
        // Function to toggle the menu visibility
        function toggleMenu() {
            var menu = document.getElementById('menu');
            var isOpen = menu.style.top === '0%';
            menu.style.top = isOpen ? '-100%' : '0%';
            // Change toggle icon
            var toggleIcon = document.querySelector('.menu-toggle');
            toggleIcon.classList.toggle('open');
        }
    </script>

</body>
</html>