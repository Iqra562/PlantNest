<?php
include("./components/header.php");
?>
<style>
    #blog-margin {
        margin-top: -4rem;
    }
</style>
<main>
    <!-- Slider Start -->
    <div class="slider-section home-2-slider-navigation slider-active">
        <div class="container-fluid custom-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- Slider Item Start -->
                    <div class="slider-item home-2-slider-style swiper-slide d-flex align-items-center" style="
                                    background-image: url(assets/images/slider/slider-bg-2.jpg);
                                ">
                        <!-- Slider Content Start -->
                        <div class="home-2-slider-content-style-1">
                            <h4 class="home-2-slider-content-style-1__sub-title text-white">
                                Design your home with passion
                            </h4>
                            <h2 class="home-2-slider-content-style-1__title text-white">
                                Make your home green
                            </h2>
                            <ul class="home-1-slider-content-style-1__btns">
                                <li class="button-01">
                                    <a class="home-2-slider-content-style-1__btn" href="allProducts.php">
                                        Shop now
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Slider Content End -->
                    </div>
                    <!-- Slider Item End -->

                    <!-- Slider Item Start -->
                    <div class="slider-item home-2-slider-style swiper-slide d-flex align-items-center" style="
                                    background-image: url(assets/images/slider/slider-bg-3.jpg);
                                ">
                        <!-- Slider Content Start -->
                        <div class="home-2-slider-content-style-1">
                            <h4 class="home-2-slider-content-style-1__sub-title">
                                Design your home with passion
                            </h4>
                            <h2 class="home-2-slider-content-style-1__title">
                                House Plant & Office Plant
                            </h2>
                            <ul class="home-1-slider-content-style-1__btns">
                                <li class="button-01">
                                    <a class="home-2-slider-content-style-1__btn" href="allProducts.php">
                                        Shop now
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Slider Content End -->
                    </div>
                    <!-- Slider Item End -->
                </div>

                <div class="swiper-button-next">
                    <i class="lastudioicon-right-arrow"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="lastudioicon-left-arrow"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider End -->

    <!-- Quick Shop End -->
    <div class="quick-shop-section section-padding-1">
        <div class="container-fluid custom-container">
            <!-- Section Title Start -->
            <div class="section-title text-center js-scroll ShortFadeInUp">
                <h3 class="section-title__title">Quick Shop</h3>
            </div>
            <!-- Section Title End -->

            <!-- Quick Shop Wrapper Start -->
            <div class="quick-shop-wrapper quick-shop-active">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <!-- Quick Shop Item Start -->
                        <?php
                        $query = $pdo->query("Select * from categories");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $categories) {
                            ?>
                            <a href="shop-fullwidth.php?id=<?php echo $categories['categoryID'] ?>">
                                <div class="quick-shop-item swiper-slide js-scroll ShortFadeInUp">
                                    <div class="quick-shop-item__image">
                                        <a href="shop-fullwidth.php?id=<?php echo $categories['categoryID'] ?>">
                                            <img src="./adminPanel/images/category/<?php echo $categories['categoryImage'] ?>"
                                                alt="Quick Shop" width="203" height="226" loading="lazy" />
                                        </a>
                                    </div>
                                    <div class="quick-shop-item__content">
                                        <h4 class="quick-shop-item__title">
                                            <a href="shop-fullwidth.php?id=<?php echo $categories['categoryID'] ?>">
                                                <?php echo $categories['categoryName'] ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                        ?>

                        <!-- Quick Shop Item End -->
                    </div>
                </div>
                <div class="swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.624" height="30.79" viewBox="0 0 12.624 30.79">
                        <path d="m11.229 1.395-10 14 10 14" fill="none" stroke="currentColor" stroke-linecap="square"
                            stroke-miterlimit="10" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.624" height="30.79" viewBox="0 0 12.624 30.79">
                        <path d="m1.395 1.395 10 14-10 14" fill="none" stroke="currentColor" stroke-linecap="square"
                            stroke-miterlimit="10" stroke-width="2"></path>
                    </svg>
                </div>
            </div>
            <!-- Quick Shop Wrapper End -->
        </div>
    </div>
    <!-- Quick Shop End -->

    <!-- Popular Product Start -->
    <div class="popular-product-section section-padding-1">
        <div class="container-fluid custom-container">
            <!-- Section Title Start -->
            <div class="section-title text-center js-scroll ShortFadeInUp">
                <h3 class="section-title__title">Some of our products</h3>
            </div>
            <!-- Section Title End -->

            <!-- Product Wrapper Start -->
            <!-- <div class="product-wrapper"> -->
            <div class="row">

                <!-- Single product Start -->
                <?php
                $query = $pdo->query("Select * from products limit 4");
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $plants) {
                    // $wishlistProductId = $plants['productID'];
                    // echo "<script>alert($wishlistProductId)</script>";
                    ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-product js-scroll ShortFadeInUp scrolled">
                            <a href="product-single.php?id=<?php echo $plants['productID'] ?>">
                                <!-- <div class="single-product__thumbnail"> -->
                                    <div class="single-product__thumbnail--meta-3">
                                        <?php
                                        if (isset($_SESSION['USER'])) {
                                            $user = $_SESSION['USER'];
                                            foreach ($user as $user) {
                                                // echo '<script>alert("'.$user['userID'].'")</script>';
                                                $userID = $user['userID'];
                                            }
                                            ?>
                                            <a href="?wishlist=<?php echo $plants['productID'] ?>&userId=<?php echo $userID ?>"
                                                data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="wishlist">
                                                <i class="lastudioicon-heart-2"></i>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="login.php" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="wishlist">
                                                <i class="lastudioicon-heart-2"></i>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="single-product__thumbnail--holder">
                                        <a href="product-single.php?id=<?php echo $plants['productID'] ?>">
                                            <img src="./adminPanel/images/products/<?php echo $plants['productImage'] ?>"
                                                alt="Product" width="344" height="370" loading="lazy" />
                                        </a>
                                    </div>
                                <!-- </div> -->
                                <div class="single-product__info">
                                    <div class="single-product__info--tags">
                                        <a href="#">Plant</a>
                                    </div>
                                    <h3 class="single-product__info--title">
                                        <a href="product-single.php?id=<?php echo $plants['productID'] ?>">
                                            <?php echo $plants['productName'] ?>
                                        </a>
                                    </h3>
                                    <div class="single-product__info--price">
                                        <ins>$
                                            <?php echo $plants['productPrice'] ?>
                                        </ins>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <!-- Single product End -->


            </div>
            <!-- </div> -->
        </div>
        <!-- Product Wrapper End -->

        <!-- Product btn End -->
        <div class="text-center js-scroll ShortFadeInUp">
            <a href="allProducts.php" class="btn product-view-btn">
                View More Items
            </a>

        </div>
        <!-- Product btn End -->
    </div>
    </div>
    <!-- Show Some Product End -->
    <hr style="color:white">
    </hr>
    <!-- Video Promotion Start -->
    <div class="video-promotion-section" style="background-image: url(assets/images/background-2.jpg)">
        <div class="container-fluid custom-container">
            <!-- Video Promotion Content Start -->
            <div class="video-promotion-content text-center js-scroll ShortFadeInUp">
                <h4 class="video-promotion-content__sub-title">
                    Video promotion
                </h4>
                <h2 class="video-promotion-content__title">
                    Let make a Fresh & Green Life
                </h2>
                <a class="video-promotion-content__video glightbox" href="https://www.youtube.com/watch?v=a4nZvjscLRE">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="512" height="512">
                        <path
                            d="M24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13V38.13zM56.34 66.35C51.4 63.33 45.22 63.21 40.17 66.04C35.13 68.88 32 74.21 32 80V432C32 437.8 35.13 443.1 40.17 445.1C45.22 448.8 51.41 448.7 56.34 445.7L344.3 269.7C349.1 266.7 352 261.6 352 256C352 250.4 349.1 245.3 344.3 242.3L56.34 66.35z"
                            fill="currentColor"></path>
                    </svg>
                </a>
            </div>
            <!-- Video Promotion Content End -->
        </div>
    </div>
    <!-- Video Promotion End -->

    <!-- why online plant shop is necessary ? -->
    <div class="about-section section-padding">
        <div class="container-fluid custom-container mt-3">
            <!-- About Title Start -->
            <div class="about-title text-center js-scroll ShortFadeInUp">
                <h2 class="about-title__title">Why Online Nursary Is Necessary ?</h2>
                <div class='mt-5'>
                    <p><span class='text-dark'>Time-Saving:</span> Shopping online saves you time and effort. Spend less
                        time commuting and searching, and more time enjoying the company of your new botanical
                        companions.
                    </p>
                    <p>
                        <span class='text-dark'>Accessibility:</span> Our online nursery is accessible 24/7, allowing
                        you to
                        shop whenever it's convenient for you. Whether you're an early bird or a night owl, we're always
                        open.
                    </p>
                </div>
            </div>
            <!-- About Title End -->

        </div>
    </div>
    <!-- end -->

    <!-- Blog Start -->
    <div class="blog-section section-padding" id='blog-margin'>
        <div class="container-fluid custom-container">
            <!-- Section Title Start -->
            <div class="section-title text-center js-scroll ShortFadeInUp">
                <hr class="section-title__title">
                </hr>
            </div>
            <!-- Section Title End -->

            <!-- Blog Wrapper Start -->
            <div class="blog-wrapper blog-active">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <!-- Blog Item Start -->
                        <div class="blog-item-3 swiper-slide js-scroll ShortFadeInUp">
                            <div class="blog-item-3__image">
                                <a href="about.php">
                                    <img src="assets/images/blog/blog-1.jpg" alt="Blog" width="462" height="531"
                                        loading="lazy" />
                                </a>
                            </div>
                            <div class="blog-item-3__content">
                                <div class="blog-item-3__inner">

                                    <h2 class="blog-item-3__content--title">
                                        <a href="about.php">
                                            About Us
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="blog-item-3 swiper-slide js-scroll ShortFadeInUp">
                            <div class="blog-item-3__image">
                                <a href="contact-us.php">
                                    <img src="assets/images/blog/blog-2.jpg" alt="Blog" width="462" height="531"
                                        loading="lazy" />
                                </a>
                            </div>
                            <div class="blog-item-3__content">
                                <div class="blog-item-3__inner">
                                    <h4 class="blog-item-3__content--title">
                                        <a href="contact-us.php">
                                            Contact US
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="blog-item-3 swiper-slide js-scroll ShortFadeInUp">
                            <div class="blog-item-3__image">
                                <a href="faqs.php">
                                    <img src="assets/images/blog/blog-3.jpg" alt="Blog" width="462" height="531"
                                        loading="lazy" />
                                </a>
                            </div>
                            <div class="blog-item-3__content">
                                <div class="blog-item-3__inner">
                                    <h4 class="blog-item-3__content--title">
                                        <a href="faqs.php">
                                            FAQ's
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Item End -->
                    </div>
                </div>
            </div>
            <!-- Blog Wrapper End -->
        </div>
    </div>
    <!-- Blog End -->

    <!-- our info Start -->
    <div class="our-info-section section-padding">
        <div class="container-fluid custom-container">
            <div class="row gy-4 justify-content-center">
                <div class="col-md-4 col-sm-6">
                    <!-- our Info Item Start -->
                    <div class="our-info-item text-center js-scroll ShortFadeInUp">
                        <h3 class="our-info-item__title">
                            Opening Hour
                        </h3>
                        <p class="our-info-item__info">
                            9:00 AM - 18:00 PM | Mon - Sat
                        </p>
                    </div>
                    <!-- our Info Item End -->
                </div>
                <div class="col-md-4 col-sm-6">
                    <!-- our Info Item Start -->
                    <div class="our-info-item text-center js-scroll ShortFadeInUp">
                        <h3 class="our-info-item__title">
                            Our location
                        </h3>
                        <p class="our-info-item__info">
                            Pakistan,Karachi
                        </p>
                    </div>
                    <!-- our Info Item End -->
                </div>
                <div class="col-md-4 col-sm-6">
                    <!-- our Info Item Start -->
                    <div class="our-info-item text-center js-scroll ShortFadeInUp">
                        <h3 class="our-info-item__title">Hotline</h3>
                        <p class="our-info-item__info">(0334)997-4298</p>
                    </div>
                    <!-- our Info Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- our info End -->
</main>
<footer class="footer-section-2 footer-dark">
    <div class="container-fluid custom-container">
        <!-- Footer Main Start -->
        <div class="footer-margin">
            <div class="footer-right">

            </div>
            <div class="footer-right">
                <div class="footer-link">
                    <div class="">



                        <ul class="footer-link__list">
                            <h4 class="footer-title text-white">Site Map</h4>

                            <li><a href="index.php">Home</a></li>
                            <li><a href="allProducts.php">Shop</a></li>
                            <li><a href="faqs.php">Faq</a></li>
                            <li>
                                <a href="feedback.php">Feedback</a>
                            </li>
                        </ul>

                    </div>
                    <div class="footer-link__wrapper">
                        <ul class="footer-link__list">
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact-us.php">contact-us</a></li>
                            <li><a href="term-of-use.php">terms & uses</a></li>
                            <li>
                                <a href="my-account.php">My Account</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer Main End -->
        <!-- Footer CopyRight Start -->
        <div class="footer-copyright">
            <div class="row align-items-center">
                <div class="col-md-6">

                </div>

            </div>
        </div>
        <!-- Footer CopyRight End -->
    </div>
</footer>

<!-- Footer End -->
<!-- Footer Start -->
<?php
include_once('components/footer.php')
    ?>
<!-- Footer End -->