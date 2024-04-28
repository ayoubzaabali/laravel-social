<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/bootstrap.min.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/owl.carousel.min.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/slicknav.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/flaticon.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/animate.min.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/magnific-popup.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/fontawesome-all.min.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/themify-icons.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/slick.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/nice-select.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('home_prop/assets/css/style.css')  ?>">

 
</head>

<body class="body-bg">


    
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="<?php echo asset('home_prop/assets/img/logo/loder.jpg')  ?>"  alt="">
            </div>
        </div>
    </div>
</div>
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="<?php echo asset('home_prop/assets/img/logo/logo.png')  ?>"  alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{Route('home')}}">Home</a></li>
                                <li><a href="{{Route('about')}}">About</a></li>
                                <li><a href="{{Route('services')}}">Services</a></li>
                                <li><a href="{{Route('gallery')}}">Gallery</a></li>
                               
                                <li><a href="{{Route('contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>          
                    <!-- Header-btn -->
                    <div class="header-btns d-none d-lg-block f-right">
                        <a href="{{ route('register') }}" class="btn header-btn">Sign Up</a>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<main>
@yield('content')
</main>

<footer>
    <!--? Footer Start-->
    <div class="footer-area footer-bg">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="<?php echo asset('home_prop/assets/img/logo/logo2_footer.png')  ?>" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">Ensa Docs, is a global GED platform where you can share document create and independent professionals connect and collaborate with your class proffesors and admins.</p>
                                </div>
                            </div>
                            <div class="footer-number">
                                <h4><span>+564 </span>7885 3222</h4>
                                <p>youremail@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-2 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Adresse</h4>
                            </div>
                            <div class="footer-cap">
                                <span>Tanger</span>
                                <p>Route de Ziaten Km 10, Tanger Principale, BP: 1818 - Tanger.</p>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Instagram -->
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Instagram Feed</h4>
                            </div>
                            <div class="instagram-gellay">
                                <ul class="insta-feed">
                                    <li><a href="#"><img src="assets/img/gallery/instagram1.png" alt=""></a></li>
                                    <li><a href="#"><img src="assets/img/gallery/instagram2.png" alt=""></a></li>
                                    <li><a href="#"><img src="assets/img/gallery/instagram3.png" alt=""></a></li>
                                    <li><a href="#"><img src="assets/img/gallery/instagram4.png" alt=""></a></li>
                                    <li><a href="#"><img src="assets/img/gallery/instagram5.png" alt=""></a></li>
                                    <li><a href="#"><img src="assets/img/gallery/instagram6.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" >Zaabali AYOUB</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <span>Follow Us</span>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>



<!-- JS here -->
    <!-- All JS Custom Plugins Link Here here -->
    <script  src="<?php echo asset('home_prop/assets/js/vendor/modernizr-3.5.0.min.js')  ?>"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script  src="<?php echo asset('home_prop/assets/js/vendor/jquery-1.12.4.min.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/vendor/popper.min.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/vendor/bootstrap.min.js')  ?>"></script>
    <!-- Jquery Mobile Menu -->
    <script  src="<?php echo asset('home_prop/assets/js/jquery.slicknav.min.js')  ?>"></script>
    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script  src="<?php echo asset('home_prop/assets/js/owl.carousel.min.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/slick.min.js')  ?>"></script>
    <!-- One Page, Animated-HeadLin -->
    <script  src="<?php echo asset('home_prop/assets/js/wow.min.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/animated.headline.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/jquery.magnific-popup.js')  ?>"></script>
   <!-- Nice-select, sticky -->
    <script  src="<?php echo asset('home_prop/assets/js/jquery.nice-select.min.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/jquery.sticky.js')  ?>"></script>
    <!-- contact js -->
    <script  src="<?php echo asset('home_prop/assets/js/contact.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/jquery.form.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/jquery.validate.min.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/mail-script.js')  ?>"></script>
    <script  src="<?php echo asset('home_prop/assets/js/jquery.ajaxchimp.min.js')  ?>"></script>    
    <!-- Jquery Plugins, main Jquery -->  
    <script  src="<?php echo asset('home_prop/assets/js/plugins.js')  ?>"></script>    
    <script  src="<?php echo asset('home_prop/assets/js/main.js')  ?>"></script>    

    
</body>
</html>



