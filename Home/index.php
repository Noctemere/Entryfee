<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Entreèfy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    .profile-pic{
    width: 50px; 
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    margin-top: 30px;
}
.sub-menu-wrap{
    position: absolute;
    top: 100%;
    right: 10%;
    width: 320px;
    max-height: 0px;
    overflow: hidden;
    transition: max-height 0.5s;
}
.sub-menu-wrap.open-menu{
    max-height: 800px;
}
.sub-menu{
    background: #fff;
    padding: 20px;
    margin: 10px;
}
.user-info{
    display: flex;
    align-items: center;
}
.user-info h3{
    font-weight: 500;
}
.user-info img{
    width: 60px;
    border-radius: 50%;
    margin-right: 15px;
}
.sub-menu hr{
    border: 0;
    height: 1px;
    width: 100%;
    background: #ccc;
    margin: 15px 0 10px;
}
.sub-menu-link{
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #525252;
    margin: 12px 0;
}
.sub-menu-link p{
    width: 100%;
}
.sub-menu-link img{
    width: 40px;
    background: #e5e5e5;
    border-radius: 50%;
    padding: 8px;
    margin-right: 15px;
}
.sub-menu-link span{
    font-size: 22px;
    transition: transform 0.5s;
}
.sub-menu-link:hover span{
    transform: translateX(5px);
}
.sub-menu-link:hover p{
   font-weight: 600;
}

.ayoko{
    font-family: 'Poppins', sans-serif;
}

.hide {
    display: none;
}

</style>
<body>
    <!-- Navigation panel -->
        <nav id="main-nav">
            <!-- Logo -->
            <div id="nav-logo">
                <a href="index.php" class="logo">
                    <img src="images/header-logo.png" alt="Company logo" width="110">
                </a>
            </div>

            <!-- Nav Menu -->
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#" class="link">Venues</a>
                        <ul class="dropdown">
                            <li><a href="../Venue-1/Venue-1.php">Brooklyn Botanic Garden</a></li>
                            <li><a href="../Venue-2/Venue-2.php">Lotte Hotel</a></li>
                            <li><a href="../Venue-3/Venue-3.php">Verdant Haven</a></li>
                        </ul>
                    </li>
                    <li><a href="../Payments/Payment.php" class="link">Reserve Now</a></li>
                    <?php if (!isset($_SESSION['user_id'])) : ?>
                        <li><a href="../Profile/logging.php" class="link">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- Mobile Menu Button -->
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="menuFunction()">=</i>
            </div>
            <!-- End Main Menu -->
        </nav>

    <!-- End Navigation panel -->

    <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="ayokona" style="position: fixed; right: 60px; top: 40px; margin-top: 0;">
            <img src="../Profile/images/user.png" class="profile-pic" id="top-profile" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../Profile/images/user.png">
                        <h3 style="font-family: 'Poppins', sans-serif;"><?php echo htmlspecialchars($_SESSION['username']); ?></h3>
                    </div>
                    <hr>
                    <a href="../Profile/profile.php" class="sub-menu-link">
                        <img src="../Profile/images/profile.png">
                        <p style="font-family: 'Poppins', sans-serif; text-align: left;">Edit Profile</p>
                        <span>></span>
                    </a>
                    <a href="../Profile/logout.php" class="sub-menu-link">
                        <img src="../Profile/images/logout.png">
                        <p style="font-family: 'Poppins', sans-serif; text-align: left;">Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <main id="main">
        <!-- Home Section -->
        <section class="home-section" id="homeSection">
            <div class="home-title">
                <!-- Home Content -->
                <div class="home-content">
                    <div class="fadeInUpShort animated animatedFadeInUpShort">
                        <h1>Orchestrating<br>Exquisite<br>Events</h1>
                    </div>
                    <div class="fadeInUpShort animated animatedFadeInUpShort">
                        <p>
                            The art of effortless reservations.
                        </p>
                    </div>
                </div>
                <!-- End Home Content -->
            </div>
        </section>
        <!-- End Home Section -->

        <!-- Portfolio Section -->
        <section class="works-section " id="top-elem">
            <div class="works-title appear">
                <h2>Events</h2>
                <p>
                    Look at the selection of our events reserved.
                </p>
            </div>
            <!-- Works Grid -->
            <ul class="works-grid">
                <!-- Work Item -->
                <li class="work-item-1 appear2">
                    <img src="images/works-1.png" alt="Work-Image">
                </li>
                <li class="work-item-2 appear2">
                    <img src="images/works-2.png" alt="Work-Image">
                </li>
                <li class="work-item-3 appear2">
                    <img src="images/works-3.png" alt="Work-Image">
                </li>
                <li class="work-item-4 appear2">
                    <img src="images/works-4.png" alt="Work-Image">
                </li>
                <li class="work-item-5 appear2">
                    <img src="images/works-5.png" alt="Work-Image">
                </li>
                <li class="work-item-6 appear2">
                    <img src="images/works-6.png" alt="Work-Image">
                </li>
            </ul>
            <!-- End Works Grid -->
        </section>
        <!-- End Portfolio Section -->

        <!-- Call Action Section -->
        <section class="action">
            <div class="container">
                <div class="row">

                    <!-- Overlapping Images -->
                    <div class="call-action">
                        <div class="over-images">

                            <div class="over-image-1 appear2">
                                <img src="images/act-1.png" alt="overlay-img" />
                            </div>

                            <div class="over-image-2 appear2">
                                <img src="images/act-4.png" alt="overlay-img" />
                            </div>

                            <div class="over-image-3 appear2">
                                <img src="images/act-2.png" alt="overlay-img" />
                            </div>

                        </div>
                    </div>
                    <!-- End Images -->

                    <!-- Text -->
                    <div class="fadeInUpShort">
                        <h2>Entreèfy</h2>

                        <dl class="col-text">
                            <dt>
                                <h3>01. Our Mission.</h3>
                            </dt>
                            <dd>
                                At Entreèfy, our mission is to create unforgettable experiences through seamless event planning and exceptional service.
                                We strive to exceed your expectations and make every event a memorable success.
                            </dd>
                            <dt>
                                <h3>02. Our Expertise.</h3>
                            </dt>
                            <dd>
                                With a team of seasoned event professionals, we bring years of experience and a wealth of knowledge to every project. 
                                From intimate gatherings to large-scale events, we handle every detail with precision and care.
                            </dd>
                            <dt>
                                <h3>03. Our Commitment.</h3>
                            </dt>
                            <dd>
                                We are dedicated to providing top-notch customer service and personalized solutions. 
                                Our commitment to excellence ensures that your event is not only well-organized but also truly special and unique.
                            </dd>
                        </dl>
                    </div>
                    <!-- End Text -->
                </div>
            </div>
        </section>
        <!-- End Call Action Section -->

        <!-- Action Section -->
        <section class="action">
            <div class="container">
                <div class="row">
                    <!-- Text -->
                    <div class="fadeInUpShort appear2">
                        <h2>Reserve events with us</h2>

                        <dl class="col-text">
                            <dt>
                                <h3>01. Extensive Event Experience.</h3>
                            </dt>
                            <dd>
                                With years of experience in event management, we bring unparalleled expertise to ensure your event is a success. 
                                From small gatherings to large conferences, we handle it all.
                            </dd>
                            <dt>
                                <h3>02. Tailored Event Solutions.</h3>
                            </dt>
                            <dd>
                                We understand that every event is unique. Our team works closely with you to tailor every detail to match your vision, 
                                ensuring a personalized and memorable experience.
                            </dd>
                            <dt>
                                <h3>03. Reliable and Professional.</h3>
                            </dt>
                            <dd>
                                Our commitment to professionalism and reliability ensures that your event runs smoothly from start to finish. 
                                You can count on us for punctuality, attention to detail, and exceptional service.
                            </dd>
                        </dl>
                    </div>
                    <!-- End Text -->
                     <!-- Overlapping Images -->
                    <div class="call-action">
                        <div class="over-images">

                            <div class="over-image-1 appear2">
                                <img src="images/act-3.png" alt="overlay-img" />
                            </div>
                            <div class="over-image-2 appear2">
                                <img src="images/act-5.png" alt="overlay-img" />
                            </div>
                        </div>
                    </div>
                    <!-- End Images -->
                </div>
            </div>
        </section>
        <!-- End Promo Section -->

        <!-- Slider Section -->
        <section class="features-slider">
            <div class="fadeInUpShort animated animatedFadeInUpShort">
                <div class="slider-container">

                    <div class="slider">
                        <div class="col-icon">
                            <img src="images/icons/s1-fun.png" alt="Icon" width="35" />
                        </div>
                      <h3>Explore the fun</h3>
                      <p class="slider-desc">Discover luxurious venues to enhance your event experience.</p>
                    </div>
                  
                    <div class="slider">
                        <div class="col-icon">
                            <img src="images/icons/s1-easy.png" alt="Icon" width="35" />
                        </div>
                        <h3>Event reservation made easy</h3>
                        <p class="slider-desc">Effortlessly book and organize your events.</p>
                      </div>
                  
                      <div class="slider">
                        <div class="col-icon">
                            <img src="images/icons/s1-manage.png" alt="Icon" width="35" />
                        </div>
                        <h3>Manage your events</h3>
                        <p class="slider-desc">Stay on top of all your event details.</p>
                      </div>
                  
                    <!-- Next/prev buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                  </div>
                  
                  <!-- Dots/bullets/indicators -->
                  <div class="dot-container">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                  </div>
            </div>
        </section>
        <!-- End Features Section -->

        <!-- Contact Section -->
        <section class="contact">
            <div class="container">
                <div class="fadeInUpShort animated animatedFadeInUpShort">
                    <h2>Contact Us</h2>
                </div>
                <div class="contact-body">
                    <div class="col-num fadeInUpShort animated animatedFadeInUpShort">
                        <div class="col-icon">
                            <img src="images/icons/phone-call.png" alt="Phone-Icon" width="35" />
                        </div>
                        <p class="contact-number">
                            +91 90000 80000
                        </p>
                    </div>
                    <div class="col-add fadeInUpShort animated animatedFadeInUpShort">
                        <div class="col-icon">
                            <img src="images/icons/address.png" alt="Address-Icon" width="35" />
                        </div>
                        <p class="contact-address">
                            Sampaloc, Manila
                        </p>
                    </div>
                    <div class="col-mail fadeInUpShort animated animatedFadeInUpShort">
                        <div class="col-icon">
                            <img src="images/icons/email.png" alt="Mail-Icon" width="35" />
                        </div>
                        <p class="contact-email">
                            entreefy@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

        <!-- Footer -->
        <footer class="footer" id="bot-elem">
            <div class="container">
                <p>&copy; 2024 Entreèfy. All Rights Reserved.</p>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- Scroll to top -->
        <div class="scroll">
            <a href="#top">
                <img src="images/up-arrow.png" alt="Scroll-to-Top" width="30">
            </a>
        </div>
        <!-- End Scroll to top -->

        <!-- JS -->
        <script src="all.js"></script>
    </main>
</body>
<script>
    function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }

    window.addEventListener('scroll', function() {
        var profilePic = document.getElementById('top-profile');
        if (window.scrollY > 0) {
            profilePic.classList.add('hide');
        } else {
            profilePic.classList.remove('hide');
        }
    });
</script>
</html>
