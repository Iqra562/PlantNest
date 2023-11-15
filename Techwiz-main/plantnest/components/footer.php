<!-- Footer Start -->
<style>
    #logo {
        color: white;
    }
</style>
<footer class="footer-section-2 footer-dark">
    <div class="container-fluid custom-container">
        <!-- Footer Main Start -->
        <div class="footer-main footer-padding align-items-center">
            <div class="footer-left">
                <div class="footer-about text-lg-start text-center">
                    <a class="footer-about__logo" href="index.php">
                        <h1 id="logo">PlantNest</h1>
                    </a>
                    <p>
                        Buy plants, pots, seeds and gardening services has never been easier but at PlantNest we provide
                        you the best gardening services online
                    </p>
                </div>
            </div>
            <div class="footer-right">
                <div class="footer-link">
                    <div class="footer-link__wrapper">
                        <h4 class="footer-title text-white">links</h4>

                        <ul class="footer-link__list">
                            <li><a href="about.php">About us</a></li>
                            <li><a href="allProducts.php">Shop</a></li>
                            <li><a href="term-of-use.php">Help Center</a></li>

                        </ul>
                    </div>
                    <div class="footer-link__wrapper">
                        <h4 class="footer-title text-white">Categories</h4>

                        <ul class="footer-link__list">
                            <?php
                            $query = $pdo->prepare("select * from categories");
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $singleRow) {
                                ?>
                                <li><a href="shop-fullwidth.php?id=<?php echo $singleRow['categoryID'] ?>">
                                        <?php echo $singleRow['categoryName'] ?>
                                    </a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="footer-link__wrapper">
                        <h4 class="footer-title text-white">Contact</h4>

                        <ul class="footer-link__list">
                            <li>
                                <span>
                                    121 King Street, Shahra-e-Faisal
                                    Karachi, Pakistan
                                </span>
                            </li>
                            <li>
                                <a href="mailto:info@example.com">
                                    plantnest@gmail.com
                                </a>
                            </li>
                            <li>
                                <a href="tel:626997-4298"> (+92)343-0333242</a>
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
                    <div class="text-center text-md-start">
                        <p>
                            &copy;
                            <span class="current-year">2023</span>
                            <span> PlantNest </span>

                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer CopyRight End -->
    </div>
</footer>

<!-- Footer End -->

<!-- JS Vendor, Plugins & Activation Script Files -->

<!-- Bootstrap JS -->
<script src="assets/js/code.jquery.com_jquery-3.7.1.min"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Plugins JS -->
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/js/glightbox.min.js"></script>
<script src="assets/js/nice-select2.js"></script>

<!-- Activation JS -->
<script src="assets/js/main.js"></script>

<!-- Chat Pluggin -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6508176fb1aaa13b7a77726d/1hajpn3k0';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>


<!-- Mirrored from phpdemo.net/plantfy/plantfy/login-register.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2023 21:00:56 GMT -->
</php>