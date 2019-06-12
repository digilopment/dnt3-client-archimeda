<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <title>Epsilon 7.0</title>
      <link rel="stylesheet" type="text/css" href="styles/style.css">
      <link rel="stylesheet" type="text/css" href="styles/skin.css">
      <link rel="stylesheet" type="text/css" href="styles/framework.css">
      <link rel="stylesheet" type="text/css" href="styles/ionicons.min.css">
      <link rel="stylesheet" type="text/css" href="styles/archimeda.css">
      <script type="text/javascript" src="scripts/jquery.js"></script>
      <script type="text/javascript" src="scripts/plugins.js"></script>
      <script type="text/javascript" src="scripts/custom.js"></script>
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
                  
                  
				  
				  <?php /*<a class="active-item" data-sub="sidebar-sub-1" href="#"><i class="icon-bg bg-blue-dark ion-android-home"></i><span>Home</span><strong class="plushide-animated"></strong></a>
                  <div class="submenu" id="sidebar-sub-1">
                     <a href="index.html"><span>Homepage</span></a>
                     <a href="index2.html"><span>Homepage 2</span></a>
                     <a class="active-item" href="index-cover.html"><span>Cover Slider</span></a>
                     <a href="index-circle.html"><span>Circle Slider</span></a>
                     <a href="index-no-slider.html"><span>No Slider</span></a>
                     <a href="index-store.html"><span>Store Front</span></a>
                     <a href="index-news.html"><span>News Front</span></a>
                     <a href="index-splash.html"><span>Splash</span></a>
                     <a href="index-login.html"><span>Login</span></a>
                     <a href="index-register.html"><span>Register</span></a>
                     <a href="index-landing.html"><span>Landing Page</span></a>
                  </div>
                  <a class="has-numbers" data-sub="sidebar-sub-0" href="#"><i class="icon-bg bg-red-dark ion-navicon"></i><span>Menus</span><strong class="plushide-animated"></strong></a>
                  <div class="submenu" id="sidebar-sub-0">
                     <a href="menu-sidebar-dual.html"><span>Dual Sidebar</span></a>
                     <a href="menu-sidebar-left.html"><span>Left Sidebar</span></a>
                     <a href="menu-sidebar-right.html"><span>Right Sidebar</span></a>
                     <a href="menu-modal.html"><span>Modal Menu</span></a>
                     <a href="menu-header.html"><span>Header Menu</span></a>
                     <a href="menu-footer.html"><span>Footer Menu</span></a>
                     <a href="menu-fixed.html"><span>Footer Fixed</span></a>
                     <a href="menu-floating.html"><span>Floating Icons</span></a>
                     <a href="menu-landing.html"><span>Landing Menu</span></a>
                     <a class="toggle-menu-style" href="#"><span>Toggle Menu Icons</span></a>
                     <a class="toggle-menu-color" href="#"><span>Toggle Menu Colors</span></a>
                     <a class="toggle-menu-numbers" href="#"><span>Toggle Menu Numbers</span></a>
                  </div>
                  <a data-sub="sidebar-sub-2" href="#"><i class="icon-bg bg-green-dark ion-gear-a"></i><span>Features</span><strong class="plushide-animated"></strong></a>
                  <div class="submenu" id="sidebar-sub-2">
                     <a href="features-tabs.html"><span>Tabs</span></a>
                     <a href="features-toggles.html"><span>Toggles</span></a>
                     <a href="features-dropdown.html"><span>Dropdowns</span></a>
                     <a href="features-accordion.html"><span>Accordions</span></a>
                     <a href="features-typography.html"><span>Typography</span></a>
                     <a href="features-menu-bars.html"><span>Menu Bars</span></a>
                     <a href="features-notifications.html"><span>Notifications</span></a>
                     <a href="features-decorations.html"><span>Deco & Divicers</span></a>
                     <a href="features-buttons.html"><span>Buttons & Icons</span></a>
                     <a href="features-inputs.html"><span>Input Elements</span></a>
                     <a href="features-detection.html"><span>Device Detection</span></a>
                  </div>
                  <a data-sub="sidebar-sub-3" href="#"><i class="icon-bg bg-blue-dark ion-ios-analytics"></i><span>Galleries</span><strong class="plushide-animated"></strong></a>
                  <div class="submenu" id="sidebar-sub-3">
                     <a href="gallery-round.html"><span>Round</span></a>
                     <a href="gallery-square.html"><span>Square</span></a>
                     <a href="gallery-blocks.html"><span>Blocks</span></a>
                     <a href="gallery-adaptive.html"><span>Adaptive</span></a>
                     <a href="gallery-collections.html"><span>Collections</span></a>
                  </div>
                  <a data-sub="sidebar-sub-4" href="#"><i class="icon-bg bg-magenta-dark ion-image"></i><span>Portfolio</span><strong class="plushide-animated"></strong></a>
                  <div class="submenu" id="sidebar-sub-4">
                     <a href="portfolio-one.html"><span>One</span></a>
                     <a href="portfolio-two.html"><span>Two</span></a>
                     <a href="portfolio-fluid.html"><span>Fluid</span></a>
                     <a href="portfolio-cards.html"><span>Cards</span></a>
                     <a href="portfolio-adaptive.html"><span>Adaptive</span></a>
                     <a href="portfolio-widescreen.html"><span>Widescreen</span></a>
                  </div>
                  <a data-sub="sidebar-sub-5" href="#"><i class="icon-bg bg-orange-dark ion-ios-list-outline"></i><span>Site Pages</span><strong class="plushide-animated"></strong></a>
                  <div class="submenu" id="sidebar-sub-5">
                     <a href="page-error.html"><span>Error</span></a>
                     <a href="page-soon.htm"><span>Soon</span></a>
                     <a href="page-login.html"><span>Login</span></a>
                     <a href="page-register.html"><span>Register</span></a>
                     <a href="page-reviews.html"><span>Reviews</span></a>
                     <a href="page-sitemap.html"><span>Sitemap</span></a>
                     <a href="page-profile-1.html"><span>Profile 1</span></a>
                     <a href="page-profile-2.html"><span>Profile 2</span></a>
                     <a href="page-timeline-1.html"><span>Timeline 1</span></a>
                     <a href="page-timeline-2.html"><span>Timeline 2</span></a>
                     <a href="page-pricing.html"><span>Pricing Table</span></a>
                     <a href="page-status.html"><span>System Status</span></a>
                  </div>
                  <a data-sub="sidebar-sub-6" href="#"><i class="icon-bg bg-night-dark ion-heart"></i><span>AppStyled</span><strong class="plushide-animated"></strong></a>
                  <div class="submenu" id="sidebar-sub-6">
                     <a href="pageapp-chat.html"><span>Chat</span></a>
                     <a href="pageapp-error.html"><span>Error</span></a>
                     <a href="pageapp-soon.html"><span>Soon</span></a>
                     <a href="pageapp-login.html"><span>Login</span></a>
                     <a href="pageapp-register.html"><span>Register</span></a>
                     <a href="pageapp-tasklist.html"><span>Tasklist</span></a>
                     <a href="pageapp-checklist.html"><span>Checklist</span></a>
                     <a href="pageapp-interests.html"><span>Interests</span></a>
                     <a href="pageapp-calendar.html"><span>Calendar</span></a>
                     <a href="pageapp-coverpage.html"><span>Coverpage</span></a>
                     <a href="pageapp-userlists.html"><span>User Lists</span></a>
                     <a href="pageapp-map.html"><span>Fullscreen Map</span></a>
                  </div>
                  <a data-sub="sidebar-sub-7" href="#"><i class="icon-bg bg-green-dark ion-ios-paper-outline"></i><span>News</span><strong class="plushide-animated"></strong></a>
                  <div class="submenu" id="sidebar-sub-7">
                     <a href="news-faq.html"><span>FAQ</span></a>
                     <a href="news-home-1.html"><span>Home 1</span></a>
                     <a href="news-home-2.html"><span>Home 2</span></a>
                     <a href="news-cover.html"><span>Cover</span></a>
                     <a href="news-article-1.html"><span>Article 1</span></a>
                     <a href="news-article-2.html"><span>Article 2</span></a>
                     <a href="news-article-3.html"><span>Article 3</span></a>
                     <a href="news-list-1.html"><span>Article List 1</span></a>
                     <a href="news-list-2.html"><span>Article List 2</span></a>
                     <a href="news-list-3.html"><span>Article List 3</span></a>
                     <a href="news-archive.html"><span>Article Archive</span></a>
                  </div>
                  <a data-sub="sidebar-sub-8" href="#"><i class="icon-bg bg-blue-dark ion-ios-cart"></i><span>Store</span><strong class="plushide-animated"></strong></a>
                  <div class="submenu" id="sidebar-sub-8">
                     <a href="store-faq.html"><span>FAQ</span></a>
                     <a href="store-home-1.html"><span>Homepage 1</span></a>
                     <a href="store-home-2.html"><span>Homepage 2</span></a>
                     <a href="store-apps.html"><span>Home Apps</span></a>
                     <a href="store-music.html"><span>Home Music</span></a>
                     <a href="store-video.html"><span>Home Video</span></a>
                     <a href="store-cover.html"><span>Home Cover</span></a>
                     <a href="store-product-1.html"><span>Product 1</span></a>
                     <a href="store-product-2.html"><span>Product 2</span></a>
                     <a href="store-cart-1.html"><span>Cart 1</span></a>
                     <a href="store-cart-2.html"><span>Cart 2</span></a>
                     <a href="store-cart-3.html"><span>Cart 3</span></a>
                     <a href="store-invoice.html"><span>Invoice</span></a>
                     <a href="store-history.html"><span>History</span></a>
                     <a href="store-locations.html"><span>Locations</span></a>
                     <a href="store-checkout.html"><span>Checkout</span></a>
                  </div>
                  <a href="page-blog.html"><i class="icon-bg bg-orange-light ion-edit"></i><span>Blog</span><i class="ion-record"></i></a>
                  <a href="page-videos.html"><i class="icon-bg bg-pink-dark ion-ios-film-outline"></i><span>Videos</span><i class="ion-record"></i></a>
                  <a href="page-contact.html"><i class="icon-bg bg-green-dark ion-ios-chatboxes-outline"></i><span>Contact</span><i class="ion-record"></i></a>
                  <a href="#" class="close-sidebar"><i class="icon-bg bg-red-light ion-android-close"></i><span>Close</span><i class="ion-record"></i></a>
				  */?>
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
					 
					 <div class="swiper-slide bg-4" style="background: url(/img/cover.jpg?v2) 0% 0% / cover;background-position: unset;background-position: 0px 55px;">
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
							<a href="#" class="page-login-logo"><img class="preload-image" data-original="img/logo.png" alt="img"></a>
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
							<!--<div class="page-login-input">
							   <i class="login-icon ion-ios-calendar-outline"></i>
							   <input class="set-today" type="date">
							</div>-->
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
							<a href="#" class="page-login-logo"><img class="preload-image" data-original="img/logo.png" alt="img"></a>
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
               
			   
			   
			   
			   
			   
			   <?php /*
			   
			   <div class="content-fullscreen">
                  <div class="call-to-action animate-top">
                     <a href="#"><i class="ion-ios-telephone"></i>Call</a>
                     <a href="#"><i class="ion-email"></i>Mail</a>
                     <a href="#"><i class="ion-ios-chatbubble"></i>Text</a>
                     <div class="decoration half-bottom"></div>
                  </div>
                  <div class="animate-fade">
                     <h3 class="center-text thin small-bottom half-top">The Mobile Website <br> You've Been Looking For</h3>
                     <p class="center-boxed-text center-text">
                        Simple and beatiful mobile solutions, that bring your page
                        to your fingertips in 3 easy steps!
                     </p>
                  </div>
                  <div class="content-center-buttons full-bottom animate-bottom animate-time-1000">
                     <a href="#" class="button button-blue button-round button-bold button-xs">GET A QUOTE</a>
                     <a href="#" class="button button-blue button-round button-bold button-xs">CALL US NOW</a>
                     <div class="clear"></div>
                  </div>
               </div>
               <div class="decoration decoration-margins animate-fade"></div>
               <div class="content-fullscreen">
                  <div class="column-half-image-left one-half-responsive">
                     <img class="preload-image" src="img/empty.png" data-original="img/1t.jpg" alt="img">
                     <h4>Pages built to rock</h4>
                     <p>
                        We've added all the pages you need, from 404 and countdown pages to simple logins and registers. Even news and store template if you want to convert to a CMS!
                     </p>
                  </div>
                  <div class="decoration hide-if-responsive"></div>
                  <div class="column-half-image-right one-half-responsive last-column">
                     <img class="preload-image" src="img/empty.png" data-original="img/2t.jpg" alt="img">
                     <h4>Application Styled</h4>
                     <p>
                        If you wish to convert our page to an app, we have a special section called App Styled which use default pages in a native application design for your app!
                     </p>
                  </div>
                  <div class="clear"></div>
               </div>
               <div class="heading-block bg-1">
                  <h2 class="thin no-bottom animate-zoom">20.000 Happy Customers</h2>
                  <h5 class="small-text animate-fade">We'd love for you to be the next one!</h5>
                  <p class="larger-text thin half-top full-bottom animate-fade">
                     We're always here for you! From the best products to the best support! So, don't wait! Join the evergrowing army of happy buyers!
                  </p>
                  <a href="#" class="button-ghost button-center-large button-bold button-round animate-bottom">GO MOBILE TODAY</a>
                  <div class="overlay dark-overlay"></div>
               </div>
               <div class="content no-bottom">
                  <div class="decoration"></div>
                  <h2 class="center-text thin small-bottom">Powerful Products</h2>
                  <p class="center-text larger-text thin">
                     We have a tone of features for you, some of the most important are right here.
                  </p>
                  <div class="decoration deco-0 decoration-small animate-zoom"></div>
                  <div class="one-half-responsive">
                     <div class="column-home-center one-half animate-left">
                        <i class="ion-ios-checkmark-outline color-green-dark"></i>
                        <h5 class="thin">Simple Code</h5>
                        <p>Extreme performance & lightweight design</p>
                     </div>
                     <div class="column-home-center one-half last-column animate-right">
                        <i class="ion-jet color-red-dark"></i>
                        <h5 class="thin">Smooth</h5>
                        <p>Very smooth transitions and page effects</p>
                     </div>
                  </div>
                  <div class="one-half-responsive last-column">
                     <div class="column-home-center one-half animate-left animate-delay-100">
                        <i class="ion-gear-a color-blue-dark"></i>
                        <h5 class="thin">Clean Code</h5>
                        <p>Making customization and loading a breeze</p>
                     </div>
                     <div class="column-home-center one-half last-column animate-right  animate-delay-100">
                        <i class="ion-help-buoy color-orange-dark"></i>
                        <h5 class="thin">24/7 Help</h5>
                        <p>Just in case you can't handle it, we're here!</p>
                     </div>
                  </div>
                  <div class="decoration"></div>
               </div>
               <div class="content">
                  <div class="container no-bottom">
                     <div class="one-half-responsive animate-fade">
                        <img src="img/empty.png" data-original="images/demo_img.png" class="preload-image responsive-image full-bottom" alt="img">
                     </div>
                     <div class="decoration hide-if-responsive"></div>
                     <div class="one-half-responsive last-column full-bottom">
                        <div class="one-half animate-left">
                           <ul class="font-icon-list no-bottom">
                              <li><i class="ion-person"></i>User List</li>
                              <li><i class="ion-ios-list-outline"></i>Activity Feed</li>
                              <li><i class="ion-android-calendar"></i>Calendar Page</li>
                              <li><i class="ion-image"></i>Coverpage</li>
                              <li><i class="ion-edit"></i>Typography</li>
                              <li><i class="ion-ios-bolt"></i>jQuery</li>
                              <li><i class="ion-power"></i>Landing Page</li>
                              <li><i class="ion-alert-circled"></i>404 Page</li>
                              <li><i class="ion-ios-clock"></i>Soon Page</li>
                              <li><i class="ion-android-menu"></i>Timeline Page</li>
                              <li><i class="ion-android-lock"></i>Login Page</li>
                           </ul>
                        </div>
                        <div class="one-half last-column animate-right">
                           <ul class="font-icon-list no-bottom">
                              <li><i class="ion-ios-circle-filled"></i>CSS3 Buttons</li>
                              <li><i class="ion-chatbubble"></i>Chat Bubbles</li>
                              <li><i class="ion-iphone"></i>OS Detection</li>
                              <li><i class="ion-toggle"></i>OS Toggles</li>
                              <li><i class="ion-ios-upload-outline"></i>Share Boxes</li>
                              <li><i class="ion-pie-graph"></i>Charts & Pies</li>
                              <li><i class="ion-alert"></i>Updates Page</li>
                              <li><i class="ion-ios-videocam"></i>Videos Page</li>
                              <li><i class="ion-android-mail"></i>Contact Page</li>
                              <li><i class="ion-images"></i>Portfolio Page</li>
                              <li><i class="ion-image"></i>Gallery Page</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="background-block background-block-fullscreen bg-5">
                  <h2 class="thin no-bottom animate-top">Our Customers Love Us!</h2>
                  <h5 class="small-text full-bottom animate-fade">Here's what they're saying!</h5>
                  <div class="quote-slider background-block-slider full-bottom animate-zoom">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="review-3">
                              <i class="color-yellow-dark review-icon ion-quote"></i>
                              <p>
                                 The usefulness of Enabled templates is unmatched. I personally find the value to be many, many times the purchase price. There is no question this is one of the top tier development houses on Envato. I am, as they say, a fan.
                              </p>
                              <div class="review-stars">
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                              </div>
                              <a href="#" class="color-blue-light">JasonKibby | ThemeForest</a>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="review-3">
                              <i class="color-yellow-dark review-icon ion-quote"></i>
                              <p>
                                 Very impressed with Enables templates! The framework makes customizing under the hood possible without having to worry about breaking functionality. Enabled support is very responsive. I highly recommend Enabled products.
                              </p>
                              <div class="review-stars">
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                              </div>
                              <a href="#" class="color-blue-light">Brad Franklin | ThemeForest</a>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="review-3">
                              <i class="color-yellow-dark review-icon ion-quote"></i>
                              <p>
                                 The template does everything I need, looks great and the designer is even helping me with something that needs additional customising. Will look at your other templates now for inclusion in any future projects.
                              </p>
                              <div class="review-stars">
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                                 <i class="ion-ios-star"></i>
                              </div>
                              <a href="#" class="color-blue-light">Brad Franklin | ThemeForest</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a href="#" class="button-ghost button-center-large button-bold button-round animate-zoom animate-delay-300">JOIN OUR CUSTOMERS</a>
                  <div class="overlay dark-overlay"></div>
               </div>
               <div class="decoration decoration-margins"></div>
               <div class="one-half-responsive">
                  <h3 class="thin center-text">Our latest Mobile Item</h3>
                  <p class="small-text center-text">Native, beautiful experience!</p>
                  <img class="responsive-image full-bottom animate-fade animate-delay-100" src="images/2.png" alt="img">
                  <p class="center-boxed-text center-text animate-fade animate-delay-200">
                     We design for your fingertips, we build for touch, from the ground up, with no element spared on our road to mobile perfection.
                  </p>
                  <a href="#" class="button button-red button-center button-round button-bold button-xs full-bottom animate-zoom animate-delay-300">SEE ALL PROJECTS</a>
               </div>
               <div class="hide-if-responsive">
                  <div class="decoration decoration-margins"></div>
                  <div class="heading-strip bg-1">
                     <h4>Our Products</h4>
                     <p>Over 100 items for you!</p>
                     <i class="ion-image"></i>
                     <div class="overlay dark-overlay"></div>
                  </div>
                  <div class="decoration decoration-margins"></div>
               </div>
               <div class="one-half-responsive last-column">
                  <h3 class="thin center-text hide-if-mobile">Over 100 Products for You</h3>
                  <p class="small-text center-text full-bottom hide-if-mobile">There's a gallery full of awesome for you!</p>
                  <div class="content">
                     <div class="gallery gallery-three-thumbs gallery-square no-bottom">
                        <a class="show-gallery animate-bottom animate-delay-100" href="img/0.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/0t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-100" href="img/1.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/1t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-100" href="img/2.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/2t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-200" href="img/3.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/3t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-200" href="img/4.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/4t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-200" href="img/5.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/5t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-300" href="img/6.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/6t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-300" href="img/7.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/7t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-300" href="img/8.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/8t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-400" href="img/9.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/9t.jpg" alt="img">
                        </a>
                        <a class="show-gallery animate-bottom animate-delay-400" href="img/0.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/0t.jpg" alt="img">
                        </a>
                        <a class="show-gallery half-bottom animate-bottom animate-delay-400" href="img/1.jpg" title="Image Caption">
                        <img class="preload-image responsive-image" src="img/empty.png" data-original="img/1t.jpg" alt="img">
                        </a>
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
               <div class="decoration decoration-margins"></div>
               <div class="heading-strip bg-1">
                  <h4>The Staff</h4>
                  <p>Are always here to help you!</p>
                  <i class="ion-heart color-red-light"></i>
                  <div class="overlay dark-overlay"></div>
               </div>
               <div class="decoration decoration-margins"></div>
               <div class="content-fullscreen">
                  <div class="staff-slider animate-fade">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="column-center-image">
                              <img class="col-img-2 no-shadow" src="img/1t.jpg" alt="img">
                              <h3>John Doe</h3>
                              <h4>Software Specialist</h4>
                              <p class="half-bottom">
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id commodo leo. Donec et efficitur mi. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                              </p>
                              <div class="three-column-icons no-bottom">
                                 <a href="#" class="icon icon-round icon-s facebook-bg"><i class="ion-social-facebook"></i></a>
                                 <a href="#" class="icon icon-round icon-s google-bg"><i class="ion-social-googleplus"></i></a>
                                 <a href="#" class="icon icon-round icon-s twitter-bg"><i class="ion-social-twitter"></i></a>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="column-center-image">
                              <img class="col-img-2 no-shadow" src="img/2t.jpg" alt="img">
                              <h3>Alexander Dark</h3>
                              <h4>Human Resources</h4>
                              <p class="half-bottom">
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id commodo leo. Donec et efficitur mi. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                              </p>
                              <div class="two-column-icons no-bottom">
                                 <a href="#" class="icon icon-round icon-s phone-bg"><i class="ion-ios-telephone"></i></a>
                                 <a href="#" class="icon icon-round icon-s mail-bg"><i class="ion-ios-email-outline"></i></a>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="column-center-image">
                              <img class="col-img-2 no-shadow" src="img/3t.jpg" alt="img">
                              <h3>Victor Hidden</h3>
                              <h4>Support Manager</h4>
                              <p class="half-bottom">
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id commodo leo. Donec et efficitur mi. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                              </p>
                              <div class="three-column-icons no-bottom">
                                 <a href="#" class="icon icon-round icon-s icon-s phone-bg"><i class="ion-ios-telephone"></i></a>
                                 <a href="#" class="icon icon-round icon-s mail-bg"><i class="ion-ios-email-outline"></i></a>
                                 <a href="#" class="icon icon-round icon-s phone-bg"><i class="ion-ios-chatbubble"></i></a>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="column-center-image">
                              <img class="col-img-2 no-shadow" src="img/4t.jpg" alt="img">
                              <h3>Jack Marker</h3>
                              <h4>Lead Developer</h4>
                              <p class="half-bottom">
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id commodo leo. Donec et efficitur mi. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                              </p>
                              <div class="three-column-icons no-bottom">
                                 <a href="#" class="icon icon-round icon-s linkedin-bg"><i class="ion-social-linkedin"></i></a>
                                 <a href="#" class="icon icon-round icon-s dribbble-bg"><i class="ion-social-dribbble-outline"></i></a>
                                 <a href="#" class="icon icon-round icon-s phone-bg"><i class="ion-ios-telephone"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
			   
			   
               <div class="decoration decoration-margins"></div>
               <div class="footer footer-dark">
                  <a href="index.html" class="footer-logo"></a>
                  <p class="footer-text">
                     The best mobile experience on Envato. Powered by pure speed, awesome features
                     and incredibly fast loading elements!
                  </p>
                  <div class="footer-socials">
                     <a href="#"><i class="ion-social-facebook"></i></a>
                     <a href="#"><i class="ion-social-instagram-outline"></i></a>
                     <a href="#"><i class="ion-social-youtube-outline"></i></a>
                     <a href="#"><i class="ion-social-twitter"></i></a>
                     <a href="#" class="show-share-bottom"><i class="ion-android-share-alt"></i></a>
                  </div>
                  <p class="copyright-text">&copy; Copyright <span class="copyright-year"></span>. All rights reserved</p>
               </div>
			   */?>
            </div>
         </div>
         <a href="#" class="back-to-top-badge"><i class="ion-ios-arrow-up"></i></a>
		 
		 <div class="share-bottom share-light">
            <h3>Share Page</h3>
            <div class="share-socials-bottom">
               <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.themeforest.net/">
               <i class="ion-social-facebook-outline facebook-bg"></i>
               Facebook
               </a>
               <a href="https://twitter.com/home?status=Check%20out%20ThemeForest%20http://www.themeforest.net">
               <i class="ion-social-twitter-outline twitter-bg"></i>
               Twitter
               </a>
               <a href="https://plus.google.com/share?url=http://www.themeforest.net">
               <i class="ion-social-googleplus-outline google-bg"></i>
               Google
               </a>
               <a href="https://pinterest.com/pin/create/button/?url=http://www.themeforest.net/&media=https://0.s3.envato.com/files/63790821/profile-image.jpg&description=Themes%20and%20Templates">
               <i class="ion-social-pinterest-outline pinterest-bg"></i>
               Pinterest
               </a>
               <a href="sms:">
               <i class="ion-ios-chatboxes-outline sms-bg"></i>
               Text
               </a>
               <a href="mailto:?&subject=Check this page out!&body=http://www.themeforest.net">
               <i class="ion-ios-email-outline mail-bg"></i>
               Email
               </a>
               <div class="clear"></div>
            </div>
         </div>
      </div>
   </body>