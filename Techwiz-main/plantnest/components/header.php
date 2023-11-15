<?php
include_once('php/query.php')
    ?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/plantfy/plantfy/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2023 21:00:55 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PlantNest - An Online Plants Nursery</title>

    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Plantfy - Plants Store Website Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lastudioicon.css" />

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/nice-select2.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css" />
</head>
<style>
    #navItems {
        margin-right: 5rem;
    }

    #logoutButton {
        cursor: pointer;
    }
</style>

<body>
    <!-- Header Start -->
    <header class="header bg-white header-height">
        <!-- Header Top Start -->
        <div class="header__top">
            <div class="container-fluid custom-container">
                <div class="header__top--wrapper justify-content-between">
                    <div class="header__top--left d-none d-md-block">
                        <ul class="header__top--items">
                            <li>
                                <a href="mailto:info.plantnest@mail.com" aria-label="mail">
                                    <i class="lastudioicon-mail-2"></i>
                                    <span>plantnest@mail.com</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:+(867)195-6696" aria-label="Phone">
                                    <i class="lastudioicon-phone-call"></i>
                                    <span>(0334)195-6696</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="Map">
                                    <i class="lastudioicon-pin-3-1"></i>
                                    <span>Pakistan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__top--right">
                        <ul class="header__top--items">
                            <li>

                                <i class="lastudioicon-single-01-1"></i>
                                <?php
                                if (isset($_SESSION['USER'])) {
                                    ?>
                                    <span id="logoutButton">Logout</span>
                                    <?php
                                } else {
                                    ?>
                                    <span> <a href="login.php" aria-label="login">Login </a></span>
                                    <?php
                                }
                                ?>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Top End -->

        <!-- Header Main Start -->
        <div class="header__main header-shadow d-flex align-items-center">
            <div class="container-fluid custom-container">
                <div class="row align-items-center position-relative">
                    <div class="col-md-4 col-3 d-xl-none">
                        <button class="header__main--toggle header__main--toggle-dark" data-bs-toggle="offcanvas"
                            data-bs-target="#mobileMenu" aria-label="menu">
                            <i class="lastudioicon-menu-8-1"></i>
                        </button>
                    </div>
                    <div class="col-xl-3 col-md-4 col-6">
                        <div class="header__main--logo text-center text-xl-start">
                            <a href="index.php">
                                <!-- <img src="assets/images/logo.png" alt="Logo" /> -->
                                <h1>PlantNest</h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 d-none d-xl-block">
                        <div class="header__main--menu">
                            <nav class="navbar-menu" id='navItems'>
                                <!-- Menu Item List Start -->
                                <ul class="menu-items-list menu-items-list--dark d-flex justify-content-center">
                                    <li>
                                        <a href="index.php">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about.php">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact-us.php">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="faqs.php">FAQs</a>
                                    </li>
                                    <li>
                                        <a href="my-account.php">Profile</a>
                                    </li>

                                    <li>
                                        <a href="allProducts.php">Shop</a>
                                    </li>

                                </ul>
                                <!-- Menu Item List End -->
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-3">
                        <div
                            class="header__main--meta header__main--dark d-flex justify-content-end align-items-center">
                            <!-- Meta Item List Start -->
                            <ul
                                class="meta-items-list meta-items-list--dark d-flex justify-content-end align-items-center">
                                <!-- <li class="search d-none d-lg-block">
                                    <form action="#">
                                        <div class="meta-search meta-search--dark">
                                            <input type="text" placeholder="Search products…" />
                                            <button aria-label="search">
                                                <i class="lastudioicon-zoom-1"></i>
                                            </button>
                                        </div>
                                    </form>
                                </li> -->
                                <li class="wishlist">
                                    <a href="wishlist.php" aria-label="Wishlist">
                                        <i class="lastudioicon lastudioicon-heart-1"></i>
                                        <!-- <span class="badge">03</span> -->
                                    </a>
                                </li>
                                <li class="cart">
                                    <button data-bs-toggle="offcanvas" data-bs-target="#cartSidebar" aria-label="Cart">
                                        <i class="lastudioicon-shopping-cart-1"></i>
                                        <?php
                                        if (isset($_SESSION['cartTwo'])) {
                                            $count = count($_SESSION['cartTwo']);
                                            // echo "<script>alert('" . $count . "')</script>";
                                            ?>

                                            <span class="badge">
                                                <?php echo $count ?>
                                            </span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="badge">0
                                            </span>
                                            <?php
                                        }
                                        ?>
                                    </button>
                                </li>
                            </ul>
                            <button class="toggle-icon d-none d-xl-block" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasSidebar" aria-label="menu">
                                <span class="bar-icon"><i class="lastudioicon-menu-8-1"></i></span>
                            </button>
                            <!-- Meta Item List Start -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Main End -->
    </header>

    <!-- Header End -->


    <!-- Cart Sidebar Start -->
    <!-- Cart Offcanvas Start -->

    <div class="offcanvas offcanvas-end cart-offcanvas" id="cartSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">My Cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="remove">
                <i class="lastudioicon-e-remove"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <ul class="offcanvas-cart-list">
                <!-- Offcanvas Cart Item Start -->
                <?php
                $grandTotal = 0;
                if (isset($_SESSION['cartTwo'])) {
                    foreach ($_SESSION['cartTwo'] as $item) {
                        $totalAmount = $item['getPrice'] * $item['getQty'];
                        $grandTotal += $totalAmount;
                        ?>
                        <li>
                            <div class="offcanvas-cart-item">
                                <div class="offcanvas-cart-item__thumbnail">
                                    <a href="#">
                                        <img src="./adminPanel/images/products/<?php echo $item['getImage'] ?>" width="70"
                                            height="84" alt="product" />
                                    </a>
                                </div>
                                <div class="offcanvas-cart-item__content">
                                    <h4 class="offcanvas-cart-item__title">
                                        <a href="#">
                                            <?php echo $item['getName'] ?>
                                        </a>
                                    </h4>
                                    <span class="offcanvas-cart-item__quantity">
                                        <?php echo $item['getQty'] ?> × $
                                        <?php echo $item['getPrice'] ?>
                                    </span>
                                </div>
                                <a class="offcanvas-cart-item__remove" href="?removeFromCart=<?php echo $item['getId'] ?>"
                                    aria-label="remove">
                                    <i class="lastudioicon-e-remove"></i>
                                </a>
                            </div>
                            <?php
                    }
                }

                ?>
                    <!-- Offcanvas Cart Item End -->
                </li>
            </ul>
        </div>
        <div class="offcanvas-footer">
            <!-- Cart Totals Table Start-->
            <div class="cart-totals-table">
                <table class="table">
                    <tbody>
                        <tr class="order-total">
                            <th>Total</th>
                            <td data-title="Total">
                                <strong><span>$
                                        <?php echo $grandTotal ?>
                                    </span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Cart Totals Table End-->

            <!-- Cart Buttons End-->
            <div class="cart-buttons">
                <a href="checkout.php" class="cart-buttons__btn-1 btn">Checkout</a>
                <a href="cart.php" class="cart-buttons__btn-2 btn">View Cart</a>
            </div>
            <!-- Cart Buttons End-->
        </div>
    </div>

    <!-- Cart Offcanvas End -->

    <!-- Cart Sidebar End -->

    <!-- Search Start -->
    <div class="search-modal modal fade" id="SearchModal">
        <!-- Search Close Start -->
        <button class="search-modal__close" data-bs-dismiss="modal" aria-label="remove">
            <i class="lastudioicon-e-remove"></i>
        </button>
        <!-- Search Close End  -->

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Search Form Start  -->
                <div class="search-modal__form">
                    <form action="#">
                        <input type="text" placeholder="Search product…" />
                        <button class="" aria-label="search">
                            <i class="lastudioicon-zoom-1"></i>
                        </button>
                    </form>
                </div>
                <!-- Search Form End  -->
            </div>
        </div>
    </div>

    <!-- Search End -->

    <!-- Offcanvas Menu Start -->
    <div class="offcanvas offcanvas-end offcanvas-sidebar" tabindex="-1" id="offcanvasSidebar">
        <button type="button" class="offcanvas-sidebar__close" data-bs-dismiss="offcanvas" aria-label="remove">
            <i class="lastudioicon-e-remove"></i>
        </button>
        <div class="offcanvas-body">
            <!-- Off Canvas Sidebar Menu Start -->
            <div class="offcanvas-sidebar__menu">
                <ul class="offcanvas-menu-list">
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
                    <li><a href="faqs.php">FAQs</a></li>
                    <li><a href="my-account.php">Profile</a></li>
                    <li><a href="allProducts.php">Shop</a></li>
                </ul>
            </div>
            <!-- Off Canvas Sidebar Menu End -->

            <!-- Off Canvas Sidebar Banner Start -->
            <div class="offcanvas-sidebar__banner" style="
                background-image: url(assets/images/shop-sidebar-banner.jpg);
            ">
                <h3 class="banner-title">NEW NOW</h3>
                <h4 class="banner-sub-title">WARM WOOL PREMIUM COAT</h4>
                <a href="allProducts.php" class="banner-btn">Discover</a>
            </div>
            <!-- Off Canvas Sidebar Banner End -->

            <!-- Off Canvas Sidebar Info Start -->
            <div class="offcanvas-sidebar__info">
                <ul class="offcanvas-info-list">
                    <li><a href="tel:+61225315600">(0334) 2531 5600</a></li>
                    <li><a href="mailto:info.plantnest@mail.com">plantnest@mail.com</a></li>
                    <li>
                        <span>
                            Pakistan,Karachi.
                        </span>
                    </li>
                </ul>
            </div>
            <!-- Off Canvas Sidebar Info End -->

            <!-- Off Canvas Sidebar Social Start -->
            <div class="offcanvas-sidebar__social">
                <ul class="offcanvas-social">
                    <li>
                        <a href="https://facebook.com" target="blank" aria-label="facebook">
                            <i class="lastudioicon-b-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com" target="blank" aria-label="twitter">
                            <i class="lastudioicon-b-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com" target="blank" aria-label="instagram">
                            <i class="lastudioicon-b-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Off Canvas Sidebar Social End -->
        </div>
    </div>

    <!-- Offcanvas Menu End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
        <!-- offcanvas-header Start -->
        <div class="offcanvas-header">
            <button type="button" class="mobile-menu__close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="lastudioicon-e-remove"></i>
            </button>
        </div>
        <!-- offcanvas-header End -->

        <!-- offcanvas-body Start -->
        <div class="offcanvas-body">
            <nav class="navbar-mobile-menu">
                <ul class="mobile-menu-items">
                    <li><a href="about.php">About us</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
                    <li><a href="faqs.php">FAQ's</a></li>
                    <li><a href="term-of-use.php">term of use</a></li>
                    <li>
                        <a href="my-account.php">Profile</a>
                    </li>
                    </li>
                    <li>
                        <a href="allProducts.php">
                            Shop
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- offcanvas-body end -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get a reference to the logout button
            const logoutButton = document.getElementById('logoutButton');

            // Attach a click event listener to the logout button
            logoutButton.addEventListener('click', function () {
                // Display a confirmation dialog
                const confirmed = window.confirm('Are you sure you want to log out?');

                // If the user confirms, log them out
                if (confirmed) {
                    // Perform the logout action here, for example, redirect to 'logout.php'
                    window.location.href = 'logout.php';
                }
            });
        });

    </script>
    <!-- Mobile Meta End -->