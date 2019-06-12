<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <title>Epsilon 7.0</title>
      <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>styles/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>styles/skin.css">
      <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>styles/framework.css">
      <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>styles/ionicons.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>styles/archimeda.css">
      <script type="text/javascript" src="<?php echo $data['media_path']; ?>scripts/jquery.js"></script>
      <script type="text/javascript" src="<?php echo $data['media_path']; ?>scripts/plugins.js"></script>
      <script type="text/javascript" src="<?php echo $data['media_path']; ?>scripts/custom.js"></script>
   </head>
   <body>
      <div id="page-transitions">
      <!-- NAVIGATION LEFT -->
      <div class="sidebars sidebars-light">
         <div class="sidebar sidebar-left">
            <div class="sidebar-header sidebar-header-image bg-2">
               <div class="overlay dark-overlay"></div>
               <div class="sidebar-socials">
                  <a href="#"><i class="ion-social-facebook"></i></a>
                  <a href="#"><i class="ion-social-twitter"></i></a>
                  <a href="#"><i class="ion-ios-telephone"></i></a>
                  <a href="#"><i class="login-icon ion-person"></i></a>
                  <a class="close-sidebar" href="#"><i class="ion-android-close"></i></a>
                  <div class="clear"></div>
               </div>
            </div>
            <img class="nav-img" src="https://myhealth.alberta.ca/HealthTopics/healthcare101/PublishingImages/healthcare-revolves-around-you.png" alt="" />
            <div class="menu-search">
               <i class="ion-ios-search-strong"></i>
               <input type="text" class="search-field" value="find departments" onblur="if (this.value == '') {this.value = 'Search...';}" onfocus="if (this.value == 'Search...') {this.value = '';}" >
            </div>
            <div class="menu-options icon-background no-submenu-numbers sidebar-menu">
               <em class="menu-divider">Navigation</em>
               <a href="departments.html"><i class="icon-bg bg-green-dark ion-ios-paper-outline"></i><span>departments</span><i class="ion-record"></i></a>
               <a href="examination.html"><i class="icon-bg bg-red-dark ion-ios-heart"></i><span>new examination</span><i class="ion-record"></i></a>
               <a href="examinations.html"><i class="icon-bg bg-night-dark ion-checkmark"></i><span>my examinations</span><i class="ion-record"></i></a>
               <a href="login.html"><i class="icon-bg bg-night-dark ion-log-in"></i><span>login</span><i class="ion-record"></i></a>
               <a href="registration.html"><i class="icon-bg bg-night-dark ion-ios-star"></i><span>registration</span><i class="ion-record"></i></a>
               <em class="menu-divider">Archimeda <u class="copyright-year"></u>. developed by Digilopment</em>
            </div>
         </div>
         <div class="sidebar sidebar-right">
            <div class="sidebar-header sidebar-header-classic">
               <div class="sidebar-socials">
                  <a class="close-sidebar" href="#"><i class="ion-android-close"></i></a>
                  <a href="#"><i class="ion-social-facebook"></i></a>
                  <a href="#"><i class="ion-social-twitter"></i></a>
                  <a href="#"><i class="ion-ios-telephone"></i></a>
                  <a href="#"><i class="login-icon ion-person"></i></a>
                  <div class="clear"></div>
               </div>
               <div class="profile">
                  <img src="https://scontent-vie1-1.xx.fbcdn.net/v/t1.0-1/p160x160/49024008_2300667943277803_6661093671611400192_n.jpg?_nc_cat=102&_nc_ht=scontent-vie1-1.xx&oh=4e57dc5334bc077e5cd1920a234a8f2d&oe=5D80FD44" >
               </div>
               <?php 
                  /* <a href="index.html" class="sidebar-logo">
                  <strong>The Ultimate Mobile Solution</strong>
                  </a>
                  */ ?>
            </div>
            <div class="menu-options icon-background sidebar-menu">
               <em class="menu-divider">Tomáš Doubek</em>
               <a href="index.html"><i class="icon-bg bg-green-dark ion-android-home"></i><span>profile</span><i class="ion-record"></i></a>
               <a href="index.html"><i class="icon-bg bg-blue-dark ion-gear-a"></i><span>settings</span><i class="ion-record"></i></a>
               <a href="index.html"><i class="icon-bg bg-red-light ion-log-out"></i><span>logout</span><i class="ion-record"></i></a>
               <em class="menu-divider">Copyright <u class="copyright-year"></u>. All rights reserved</em>
            </div>
         </div>
      </div>
      <div class="header header-logo-center header-dark">
         <a href="#" class="header-icon header-icon-1 hamburger-animated open-sidebar-left"></a>
         <!--<a href="index.html" class="header-logo"></a>-->
         <span class="header-logo-text">Archimeda</span>
         <a href="#" class="header-icon header-icon-4 open-sidebar-right"><i class="login-icon ion-person"></i></a>
      </div>
      <div id="page-content" class="page-content">
         <div id="page-content-scroll" class="header-clear">
            <div class="coverpage-slider coverpage-classic">
               <div class="swiper-wrapper">
                  <div class="swiper-slide ">
                     <div id="page-transitions">
                        <div class="landing-homepage">
                           <div class="landing-page landing-dark">
                              <div class="landing-wrapper">
                                 <div class="landing-header no-bottom">
                                    <span class="header-logo-text">Archimeda</span>
                                 </div>
                                 <div class="slide-wrapper">
                                    <ul>
                                       <li>
                                          <a href="index.html">
                                          <i class="ion-ios-home bg-red-dark"></i>
                                          <em>neurology</em>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="features-typography.html">
                                          <i class="ion-ios-gear bg-green-dark"></i>
                                          <em>Pregnancy & Births</em>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="gallery-square.html">
                                          <i class="ion-ios-camera bg-blue-dark"></i>
                                          <em>Heart Center</em>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="portfolio-one.html">
                                          <i class="ion-ios-analytics bg-magenta-dark"></i>
                                          <em>Dental Surgery</em>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="pageapp-coverpage.html">
                                          <i class="ion-iphone bg-orange-dark"></i>
                                          <em>Cancer Oncology</em>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="page-soon.html">
                                          <i class="ion-ios-browsers bg-teal-dark"></i>
                                          <em>Diagnose & Research</em>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="page-blog.html">
                                          <i class="ion-ios-book bg-night-dark"></i>
                                          <em>Drug / Medicine</em>
                                          </a>
                                       </li>
                                       <li>
                                          <a class="tel:+1 234 567 890" href="#">
                                          <i class="ion-ios-telephone bg-green-dark"></i>
                                          <em>Endocrinology</em>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="contact.html">
                                          <i class="ion-ios-email bg-blue-dark"></i>
                                          <em>Medical Counseling</em>
                                          </a>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="overlay dark-overlay"></div>
                  </div>
                  <div class="swiper-slide bg-4" style="background: url(<?php echo $data['media_path']; ?>img/cover.jpg?v2) 0% 0% / cover;background-position: unset;background-position: 0px 55px;">
                     <div class="coverpage-bottom app-info">
                        <div class="text-buble">
                           <h3>Evolution of medical talking <strong class="color-blue-light">Archimeda</strong></h3>
                           <p>
                              Our mission is to simplify patient-doctor communication. Therefore, we have developed a revolutionary application in which you have all your examinations and medical findings. With QR code data can be exchanged between doctor and patient.
                           </p>
                           <div class="decoration"></div>
                        </div>
                     </div>
                  </div>
                  <!-- registration -->
                  <div class="swiper-slide">
                     <div class="page-login content">
                        <a href="#" class="page-login-logo"><img class="preload-image" data-original="<?php echo $data['media_path']; ?>img/logo.png" alt="img"></a>
                        <div class="page-login-input">
                           <i class="login-icon ion-person"></i>
                           <input name="name" type="text" placeholder="Name" value="" >
                        </div>
                        <div class="page-login-input">
                           <i class="login-icon ion-person"></i>
                           <input name="surname" type="text" placeholder="Surname" value="" >
                        </div>
                        <div class="page-login-input">
                           <i class="login-icon ion-at"></i>
                           <input type="text" name="email" placeholder="Email Address">
                        </div>
                        <div class="page-login-input full-bottom">
                           <i class="login-icon ion-locked"></i>
                           <input type="password" value="password" onfocus="if (this.value=='password') this.value = ''" onblur="if (this.value=='') this.value = 'password'">
                        </div>
                        <a type="submit" name="sent" href="#" class="button button-green button-icon button-full half-top full-bottom"><i class="ion-log-in"></i>Create Account</a>
                     </div>
                  </div>
                  <!-- login -->
                  <div class="swiper-slide">
                     <div class="page-login content">
                        <a href="#" class="page-login-logo"><img class="preload-image" data-original="<?php echo $data['media_path']; ?>img/logo.png" alt="img"></a>
                        <div class="page-login-input">
                           <i class="login-icon ion-at"></i>
                           <input type="text" name="email" placeholder="Email Address">
                        </div>
                        <div class="page-login-input">
                           <i class="login-icon ion-locked"></i>
                           <input type="password" value="password" onfocus="if (this.value=='password') this.value = ''" onblur="if (this.value=='') this.value = 'password'">
                        </div>
                        <div class="pageapp-login-links">
                           <a href="#" class="page-login-forgot "><i class="ion-eye"></i>Forgot Credentials</a>
                           <a href="#" class="page-login-create ">Create Account<i class="ion-person"></i></a>
                           <div class="clear"></div>
                        </div>
                        <a href="#" class="button button-green button-icon button-full half-top full-bottom "><i class="ion-ios-arrow-thin-right"></i>Login</a>
                     </div>
                  </div>
               </div>
               <div class="coverpage-clear full-bottom"></div>
            </div>
         </div>
         <a href="#" class="back-to-top-badge"><i class="ion-ios-arrow-up"></i></a>
      </div>
   </body>