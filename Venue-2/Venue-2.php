<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Lotte Hotel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/Venue-2.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/slick-theme.css" />
  <link rel="stylesheet" href="css/slick.css" />
  <link rel="icon" type="image/x-icon" href="../Home/images/favicon.png">
</head>
<style>
  /* Navigation styles */
  #main-nav {
    position: fixed;
    text-align: right;
    top: 0;
    display: flex;
    justify-content: space-between;
    width: 100%;
    line-height: 100px;
    z-index: 100;
    padding: 0 20px;
    transition: 0.4s;
    background-color: #fff;
  }

  #main-nav a {
    float: right;
    color: rgb(33, 33, 33);
    text-align: right;
    padding: 0px;
    text-decoration: none;
    font-size: 14px;
    line-height: 15px;
    border-radius: 8px;
    margin-right: 30px;
  }

  #nav-logo {
    float: left;
    margin-left: 25px;
  }

  .nav-menu {
    float: right;
    padding: 8px 10px;
    margin-right: 20px;
    color: black;
  }

  .nav-menu li {
    position: relative;
    display: inline-block;
  }

  .nav-menu li:hover {
    text-decoration: underline;
  }

  .nav-menu a.active {
    text-decoration: underline;
  }

  .nav-menu ul {
    text-align: right;
    display: flex;
    list-style-type: none;
    gap: 20px;
  }

  .nav-menu ul li {
    position: relative;
    text-align: right;
  }

  .nav-menu .dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: rgba(255, 255, 255, 0.8);
    min-width: 150px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: max-height 0.3s ease-out;
    overflow: hidden;
    z-index: 1;
    max-height: 10px;
    padding: 0;
    margin: 0;
  }

  .nav-menu .dropdown a {
    display: block;
    padding: 1px;
    text-align: center;
    text-decoration: none;
  }

  .nav-menu ul li:hover .dropdown {
    display: block;
    max-height: 290px;
    text-decoration: underline;
    padding: 0;
    margin: 0;
  }

  .nav-menu-btn {
    display: none;
  }

  @media screen and (max-width: 786px) {
    .nav-menu-btn {
      display: block;
    }

    .nav-menu-btn i {
      font-size: 30px;
      color: #473535;
      padding: 10px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 5px 5px 5px;
      cursor: pointer;
      transition: .3s;
      margin-right: 20px;
    }

    .nav-menu-btn i:hover {
      background: rgba(255, 255, 255, 0.15);
    }

    #main-nav {
      padding: 8px 10px !important;
    }

    .nav-menu.responsive {
      background: linear-gradient(white, transparent);
      top: 100px;
      text-align: center;
    }

    .nav-menu {
      text-align: center;
      position: absolute;
      top: -800px;
      width: 100%;
      height: 90vh;
      transition: 0.3s;
      display: flex;
    }

    .nav-menu ul {
      flex-direction: column;
    }

    .nav-menu.active {
      display: block;
    }

    .nav-menu ul li .dropdown {
      display: none;
      position: bottom;
      top: 100%;
      left: 0;
      background: rgba(255, 255, 255, 0.8);
      padding: 5px 10px;
      min-width: 150px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: max-height 0.3s ease-out;
      max-height: 0;
      overflow: hidden;
    }

    .nav-menu ul li .dropdown li {
      margin: 0 0 10px;
    }

    .nav-menu ul li .dropdown li a {
      color: #000;
      padding: 5px 14px;
      text-decoration: none;
      display: block;
      white-space: nowrap;
    }

    .nav-menu ul li .dropdown li a:hover {
      text-align: center;
      background: rgba(0, 0, 0, 0.1);
    }

    .nav-menu ul li:hover .dropdown {
      display: block;
      max-height: 300px;
    }

    .works-grid {
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      padding: 0 50px;
    }
  }

  #hero {
    background-size: cover;
    background-position: center;
    height: 100vh;
    position: relative;
  }

  #hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;
  }

  #hero>* {
    position: relative;
    z-index: 2;
  }

  .book-now-button {
    display: inline-block;
    padding: 20px 40px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    font-size: 24px;
    font-weight: bold;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s, transform 0.3s;
    margin-top: 20px;
  }

  .book-now-button:hover {
    background-color: #555;
    transform: translateY(-3px);
  }
</style>

<body>

  <!-- Navigation panel -->
  <nav id="main-nav">
    <!-- Logo -->
    <div id="nav-logo">
      <a href="../Home/index.php" class="logo">
        <img src="../Home/images/header-logo.png" alt="Company logo" width="110">
      </a>
    </div>

    <!-- Nav Menu -->
    <div class="nav-menu" id="navMenu" style="margin-top: 15px;">
      <ul>
        <li><a href="../Home/index.php">Home</a></li>
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

  <!-- Hero section -->
  <section id="hero" class="text-white tm-font-big " style="background-image: url('img/Venue2-bg-1.jpg');">
    <div class="text-center tm-hero-text-container">
      <div class="tm-hero-text-container-inner">
        <h2 class="tm-hero-title">Lotte Hotel</h2>
        <p class="tm-hero-subtitle">
          Seoul
        </p>
        <div class="text-center">
          <a href="../Payments/Payment.php" class="book-now-button">Book Now</a>
        </div>
      </div>
    </div>

    <div class="tm-next tm-intro-next">
      <a href="#introduction" class="text-center tm-down-arrow-link">
        <i class="fas fa-3x fa-caret-down tm-down-arrow"></i>
      </a>
    </div>
  </section>

  <section id="introduction" class="tm-section-pad-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <img src="img/Venue2-show-1.jpg" alt="Image" class="img-fluid tm-intro-img" />
        </div>
        <div class="col-lg-6">
          <div class="tm-intro-text-container">
            <h2 class="tm-text-primary mb-4 tm-section-title">About Lotte Hotel</h2>
            <p class="mb-4 tm-intro-text">
              A refined and elegant wedding ceremony at the highest wedding hall under the sky will be an unforgettable
              moment in your life.
              The high-quality design concept of ‘Kristin Banta,’ a remarkable wedding planner for Hollywood celebrities
              and the 3-star Michelin chef,
              Yannick Alléno, serve the latest Parisian menus to make your once-in-a-lifetime wedding even more
              complete.
            </p>
            <p class="mb-5 tm-intro-text">

              <a rel="nofollow" href="https://templatemo.com"></a>.
            </p>
            <div class="tm-next">
              <a href="#work" class="tm-intro-text tm-btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row tm-section-pad-top">
        <div class="col-lg-4">
          <i class="fas fa-4x fa-bus text-center tm-icon"></i>
          <h4 class="text-center tm-text-primary mb-4"></h4>
          <p>
            “Shine the brightest on the most important day of your life”
            SIGNIEL Wedding is the highest wedding venue under the sky, with a spectacular panoramic view overlooking
            the Seoul skyline and full of natural light.
            It’s time for you to shine, looking into the pink sunset and clouds in the blue sky.
          </p>
        </div>

        <div class="col-lg-4 mt-5 mt-lg-0">
          <i class="fas fa-4x fa-bicycle text-center tm-icon"></i>
          <h4 class="text-center tm-text-primary mb-4"></h4>
          <p>
          SIGNIEL Wedding Menu by Yannick Alléno, a 3 Michelin star chef and the 2016 Chef of the Year, 
          exemplifies culinary excellence. Alléno has proven his prowess at the 3-star French restaurant 
          Pavillon Ledoyen, the luxury resort Cheval Blanc run by LVMH, and the Royal Mansour Marrakech 
          restaurant in Morocco. His expertise and innovation promise an extraordinary dining experience 
          for your special day.
          </p>
        </div>
        <div class="col-lg-4 mt-5 mt-lg-0">
          <i class="fas fa-4x fa-city text-center tm-icon"></i>
          <h4 class="text-center tm-text-primary mb-4"></h4>
          <p>
          SIGNIEL Wedding Styling by Kristin Banta, a world-class event designer, showcases her exceptional 
          talent in the world's highest wedding venue, the three-story high Grand Ballroom at SIGNIEL Seoul. 
          Selected as the Wedding Planner of the Year by America's Event Solutions for two consecutive years 
          (2014, 2015), Banta has elegantly created a wedding in the clouds. 
          </p>
        </div>
      </div>
  </section>
  <section id="work" class="tm-section-pad-top">
    <div class="container tm-container-gallery">
      <div class="row">
        <div class="text-center col-12">
          <h2 class="tm-text-primary tm-section-title mb-4">Gallery</h2>
        </div>
      </div>
      <div class="row" style="margin-bottom: 100px;">
        <div class="col-12">
          <div class="mx-auto tm-gallery-container">
            <div class="grid tm-gallery">
              <a href="img/tn2-02.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="img/tn2-02.jpg" alt="Image" class="img-fluid">
                </figure>
              </a>
              <a href="img/img2-04.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="img/img2-04.jpg" alt="Image" class="img-fluid">
                </figure>
              </a>
              <a href="img/img2-05.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="img/img2-05.jpg" alt="Image" class="img-fluid">
                </figure>
              </a>
              <a href="img/tn2-01.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="img/tn2-01.jpg" alt="Image" class="img-fluid">
                </figure>
              </a>
              <a href="img/Venue2-bg-1.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="img/Venue2-bg-1.jpg" alt="Image" class="img-fluid">
                </figure>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="tm-section-pad-top tm-parallax-2" style="background-image: url('img/Venue2-bg-2.jpg');">
    <style>
      #contact {
        background-image: url('img/Venue-bg2-1.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        position: relative;
      }

      #contact::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
      }

      #contact>* {
        position: relative;
        z-index: 2;
      }
    </style>
    <div class="container tm-container-contact">
      <div class="row">
        <div class="col-12">
          <h2 class="mb-4 tm-section-title">Contact Us</h2>
          <div class="mb-5 tm-underline">
            <div class="tm-underline-inner"></div>
          </div>
          <p class="mb-5">
            SIGNIEL provides quality that rises above all your expectations.
            We offer the finest personal services along with a luxurious style you cannot find anywhere else.
            Treat yourself to life’s greatest privileges by staying at SIGNIEL.
            Your stay will be an unforgettable experience.
          </p>
        </div>

        <div class="col-sm-12 col-md-6 d-flex align-items-center tm-contact-item">
          <a href="#" class="tm-contact-item-link">
            <i class="fas fa-3x fa-phone mr-4"></i>
            <span class="mb-0">(717) 550-1675</span>
          </a>
        </div>
        <div class="col-sm-12 col-md-6 d-flex align-items-center tm-contact-item">
          <a href="#" class="tm-contact-item-link">
            <i class="fas fa-3x fa-envelope mr-4"></i>
            <span class="mb-0">lottehotel@company.com</span>
          </a>
        </div>
        <div class="col-sm-12 col-md-6 d-flex align-items-center tm-contact-item">
          <a href="https://www.google.com/maps/place/LOTTE+HOTEL+SEOUL/@37.5653,126.9619246,15z/data=!4m13!1m2!2m1!1sLotte+Hotel!3m9!1s0x357ca2edff4360f7:0x3b5a131fe5e3d759!5m2!4m1!1i2!8m2!3d37.5653!4d126.980979!15sCgtMb3R0ZSBIb3RlbCIDiAEBWg0iC2xvdHRlIGhvdGVskgEFaG90ZWzgAQA!16s%2Fg%2F11bw27106v?entry=ttu" class="tm-contact-item-link">
            <i class="fas fa-3x fa-map-marker-alt mr-4"></i>
            <span class="mb-0">Location on Maps</span>
          </a>
        </div>
      </div>
    </div>

  </section>
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="slick/slick.min.js"></script>
  <script src="magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.singlePageNav.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>

    function getOffSet() {
      var _offset = 450;
      var windowHeight = window.innerHeight;

      if (windowHeight > 500) {
        _offset = 400;
      }
      if (windowHeight > 680) {
        _offset = 300
      }
      if (windowHeight > 830) {
        _offset = 210;
      }

      return _offset;
    }

    function setParallaxPosition($doc, multiplier, $object) {
      var offset = getOffSet();
      var from_top = $doc.scrollTop(),
        bg_css = 'center ' + (multiplier * from_top - offset) + 'px';
      $object.css({ "background-position": bg_css });
    }

    var background_image_parallax = function ($object, multiplier, forceSet) {
      multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
      multiplier = 1 - multiplier;
      var $doc = $(document);

      if (forceSet) {
        setParallaxPosition($doc, multiplier, $object);
      } else {
        $(window).scroll(function () {
          setParallaxPosition($doc, multiplier, $object);
        });
      }
    };

    var background_image_parallax_2 = function ($object, multiplier) {
      multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
      multiplier = 1 - multiplier;
      var $doc = $(document);
      $object.css({ "background-attachment": "fixed" });
      $(window).scroll(function () {
        var firstTop = $object.offset().top,
          pos = $(window).scrollTop(),
          yPos = Math.round((multiplier * (firstTop - pos)) - 186);

        var bg_css = 'center ' + yPos + 'px';

        $object.css({ "background-position": bg_css });
      });
    };

    $(function () {
      background_image_parallax($(".tm-parallax"), 0.30, false);
      background_image_parallax_2($("#contact"), 0.80);

      window.addEventListener('resize', function () {
        background_image_parallax($(".tm-parallax"), 0.30, true);
      }, true);

      $(window).scroll(function (e) {
        if ($(document).scrollTop() > 120) {
          $('.tm-navbar').addClass("scroll");
        } else {
          $('.tm-navbar').removeClass("scroll");
        }
      });

      $('#tmNav a').on('click', function () {
        $('.navbar-collapse').removeClass('show');
      })

      $('#tmNav').singlePageNav();

      $("a").on('click', function (event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;

          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 400, function () {
            window.location.hash = hash;
          });
        } // End if
      });

      // Pop up
      $('.tm-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: { enabled: true }
      });

      // Gallery
      $('.tm-gallery').slick({
        dots: true,
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 2,
        responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    });
  </script>
</body>

</html>