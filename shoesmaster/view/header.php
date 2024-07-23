
 <?php
    if(isset($_SESSION['user'])&&($_SESSION['user']!="")){
        extract($_SESSION['user']);
        $html_account='<li>
        <a href="index.php?pg=logout">Thoát</a>
        </li>';

    }else{
        $html_account='<li><a href="index.php?pg=dangki">ĐĂNG KÝ</a></li>
        <li> <a href="index.php?pg=login">ĐĂNG NHẬP</a>
        </li>';
    }

?>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>shoesmaster</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="./view/assets/img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="./view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./view/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./view/assets/css/animate.min.css">
    <link rel="stylesheet" href="./view/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./view/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./view/assets/css/themify-icons.css">
    <link rel="stylesheet" href="./view/assets/css/futura-std-font.css">
    <link rel="stylesheet" href="./view/assets/css/meanmenu.css">
    <link rel="stylesheet" href="./view/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="./view/assets/css/slick.css">

    <link rel="stylesheet" href="./view/assets/css/ui.css">
    <link rel="stylesheet" href="./view/assets/css/style.css">
    <link rel="stylesheet" href="./view/assets/css/responsive.css">
</head>

<body>


    <!-- header area start -->
    <header class="header-area">
        <div class="gota_top bg-soft d-none d-sm-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <div class="gota_lang">
                            <ul>
                                <li><a href="#">usd<i class="fal fa-chevron-down"></i></a>
                                    <ul class="additional_dropdown">
                                        <li><a href="#">euro</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">english<i class="fal fa-chevron-down"></i></a>
                                    <ul class="additional_dropdown">
                                        <li><a href="#">frences</a></li>
                                        <li><a href="#">japanes</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 offset-xl-5 col-lg-6 col-md-6 col-sm-6 text-end">
                        <div class="gota_right">
                            <ul>
                                <li><a href="index.php?pg=viewcart">Wishlist</a></li>
                                <li><a href="index.php?pg=my_account">Account</a></li>
                                <li><a href="index.php?pg=donhangsubmit">Checkout</a></li>
                                <li><a href="index.php?pg=dangnhap_dangki">Login & register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gota_bottom position-relative">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 d-none d-sm-block">
                        <div class="gota_search">
                            <form action="index.php?pg=sanpham" method="post" class="search_form">
                                <button type="submit" name="timkiem" class="search_action"><i
                                        class="fal fa-search d-sm-none d-md-block"></i></button>
                                <input type="text" name="kyw" placeholder="nhập từ khóa theo tên" />
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-4 col-sm-4">
                        <div class="sidemenu sidemenu-1 d-lg-none d-md-block">
                            <a class="open" href="#"><i class="fal fa-bars"></i></a>
                        </div>
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="index.php">Home </a>
                                        
                                    </li>
                                    <li ><a href="index.php?pg=sanpham">Shop</a>
                                    
                                    </li>
                                    <!-- <li class="position-static menu-item-has-children"><a href="service.html">Features</a>
                                        <ul class="mega_menu_2">
                                            <li data-background="././view/assets/img/mega-menu/product2.jpg">
                                                <h4 class="mega_title_2">Basketball</h4>
                                                <ul class="mega_item_2">
                                                    <li><a href="shop.html">East Hampton Fleece</a></li>
                                                    <li><a href="shop.html">Faxon Canvas Low</a></li>
                                                    <li><a href="shop.html">Habitasse dictumst</a></li>
                                                    <li><a href="shop.html">Kaoreet lobortis</a></li>
                                                    <li><a href="shop.html">NikeCourt Zoom Prestige</a></li>
                                                    <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                                    <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                                </ul>
                                            </li>
                                            <li data-background="././view/assets/img/mega-menu/product3.jpg">
                                                <h4 class="mega_title_2">Helmet for Women’s</h4>
                                                <ul class="mega_item_2">
                                                    <li><a href="shop.html">Arsenal Home Jersey</a></li>
                                                    <li><a href="shop.html">Arsenal Home Jersey</a></li>
                                                    <li><a href="shop.html">Pellentesque posuere</a></li>
                                                    <li><a href="shop.html">Running 3-Stripes</a></li>
                                                    <li><a href="shop.html">Running 3-Stripes</a></li>
                                                    <li><a href="shop.html">V-Neck T-Shirt</a></li>
                                                    <li><a href="shop.html">WordPress Pennant</a></li>
                                                </ul>
                                            </li>
                                            <li data-background="././view/assets/img/mega-menu/product4.jpg">
                                                <h4 class="mega_title_2">Basketball</h4>
                                                <ul class="mega_item_2">
                                                    <li><a href="shop.html">East Hampton Fleece</a></li>
                                                    <li><a href="shop.html">Faxon Canvas Low</a></li>
                                                    <li><a href="shop.html">Habitasse dictumst</a></li>
                                                    <li><a href="shop.html">Kaoreet lobortis</a></li>
                                                    <li><a href="shop.html">NikeCourt Zoom Prestige</a></li>
                                                    <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                                    <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li>
                                        <a class="d-none d-xl-block" href="index.php">
                                            <img class="pl-50 pr-50" src="./view/assets/img/logo/logo-1.png" alt="">
                                        </a>
                                    </li>
                                    <li ><a href="index.php?pg=">Blog</a>
                                        
                                    </li>
                                    <!-- <li class="menu-item-has-children"><a href="about.html">pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="about.html">about us</a></li>
                                            <li><a href="about-2.html">about us 2</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                            <li><a href="contact-2.html">contact 2</a></li>
                                            <li><a href="single.html">single page</a></li>
                                            <li><a href="cart.html">cart page</a></li>
                                            <li><a href="checkout.html">checkout page</a></li>
                                            <li><a href="404.html">page 404</a></li>
                                            <li><a href="service.html">services</a></li>
                                            <li><a href="accordion.html">frequently questions</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- <li><a href="service.html">Portfolio</a></li> -->
                                    <li><a href="index.php?contact">contact us </a></li>
                                    <?=$html_account?>
                                </ul>
                            </nav>
                        </div>

                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                        <div class="gota_cart gotat_cart_1 text-end">
                            <a href="javascript:void(0)"><i class="fal fa-shopping-cart"></i>My Bag<span class="counter"> (2)</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <div class="search_area">
        <div class="search_close">
            <span><i class="fal fa-times"></i></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="search-wrapper text-center">
                        <h2>search</h2>
                        <!-- <div class="search-filtering pt-30">
                            <div class="search_tab">
                                <ul class="nav nav-tabs justify-content-center mb-55" id="anytab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab2" data-bs-toggle="tab" data-bs-target="#home2" type="button" role="tab" aria-selected="true">All categories</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab222" data-bs-toggle="tab" data-bs-target="#profile2" type="button" role="tab" aria-selected="false">Basketball</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab" aria-selected="false">Handbag</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sportswear-tab" data-bs-toggle="tab" data-bs-target="#sportswear" type="button" role="tab" aria-selected="false">Sportswear</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myconte">
                                    <div class="tab-pane fade show active" id="home2" role="tabpanel">

                                    </div>
                                    <div class="tab-pane fade" id="profile2" role="tabpanel">

                                    </div>
                                    <div class="tab-pane fade" id="contact2" role="tabpanel">

                                    </div>
                                    <div class="tab-pane fade" id="sportswear" role="tabpanel">

                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="main_search">
                            <form action="index.php?pg=sanpham" method="post">
                                <input type="text" name="kyw" placeholder="Nhập từ khóa theo tên">
                                <button type="submit" name="timkiem" value="tìm kiếm" class="m-search"><i class="fal fa-search d-sm-none d-md-block"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>
            <div class="side-info-content">
                <div class="mobile-menu"></div>
                <div class="contact-infos mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>123/A, Miranda City Likaoli Prikano, Dope</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+0989 7876 9865 9</p>
                        <p>+(090) 8765 86543 85</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7910171f16391c01181409151c571a1614">[email&#160;protected]</a></p>
                        <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="610419000c110d044f0c00080d2109140c4f020e0c">[email&#160;protected]</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>

    <!-- cart area start  -->
    <div class="cart__sidebar">
        <div class="container">
            <div class="cart__content">
                <div class="cart-text">
                    <h3 class="mb-40">Shopping cart</h3>
                    
                   <?php 
                   foreach ($_SESSION['giohang'] as $sp) {
                    extract($sp);
                    $thanhtien = (int)$soluong * (int)$price;
                   echo'
                   <div class="add_cart_product">
                   <div class="add_cart_product__thumb">
                       <img src="./view/assets/img/'.$img.'" alt="">
                   </div>
                   <div class="add_cart_product__content">
                       <h5><a href="shop.html">'.$name.'</a></h5>
                       <p>'.$soluong. ' × '.$price.'</p>
                       <button class="cart_close"><i class="fal fa-times"></i></button>
                   </div>
               </div>
                   ';
                }
                   ?>
                </div>
                <div class="cart-icon">
                    <i class="fal fa-times"></i>
                </div>
                <div class="cart-bottom">
                    <div class="cart-bottom__text">
                        <span>Subtotal:</span>
                        <span class="end"><?php echo get_tongdonhang(); ?></span>
                        <a href="index.php?pg=viewcart">view cart</a>
                        <a href="index.php?pg=donhangsubmit">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-offcanvas-overlay"></div>
    <!-- cart area end  -->