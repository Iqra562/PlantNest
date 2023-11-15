<?php
include("./components/header.php");
?>
<main>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <h2 class="breadcrumb-wrapper__title">Wishlist</h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Wishlist</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Wishlist Start -->
    <div class="wishlist-section section-padding-2">
        <div class="container-fluid custom-container">
            <!-- Wishlist Table Start -->
            <div class="wishlist-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price text-md-center">
                                Price
                            </th>
                            <!-- <th class="product-stock text-md-center">
                                Stock status
                            </th> -->
                            <th class="product-action text-md-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['USER'])) {
                            $user = $_SESSION['USER'];
                            foreach ($user as $user) {
                                // echo '<script>alert("'.$user['userID'].'")</script>';
                                $userID = $user['userID'];
                            }
                        }
                        ?>
                        <?php
                        $query = $pdo->prepare("Select * from wishlist where customerID = :userId");
                        $query->bindParam("userId", $userID);
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            $getWishlistProductId = $row['wishlistProductID'];
                            $query = $pdo->prepare("Select * from products where productID = :wishlistProductID");
                            $query->bindParam("wishlistProductID", $getWishlistProductId);
                            $query->execute();
                            $wishlistData = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($wishlistData as $data) {
                                ?>
                                <tr class="wishlist-item">
                                    <td class="product-remove">
                                        <a href="?removeFromWishlist=<?php echo $row['wishlistProductID'] ?>"
                                            class="remove">×</a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <img src="./adminPanel/images/products/<?php echo $data['productImage'] ?>"
                                            alt="<?php echo $data['productName'] ?>" width="90" height="114" />
                                    </td>
                                    <td class="product-name">
                                        <?php echo $data['productName'] ?>
                                    </td>
                                    <td class="product-price text-md-center" data-title="Price">
                                        <span>
                                            <ins>$
                                                <?php echo $data['productPrice'] ?>
                                            </ins>
                                        </span>
                                    </td>
                                    <!-- <td class="product-stock text-md-center" data-title="Stock status">
                                        <span class="stock in-stock">
                                            In stock
                                        </span>
                                    </td> -->
                                    <td class="product-action text-md-end">
                                        <a href="product-single.php?id=<?php echo $data['productID'] ?>"
                                            class="wishlist-table__btn btn">
                                            See Details
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Wishlist Table End -->
        </div>
    </div>
    <!-- Wishlist End -->

    <!-- Newsletter Start -->
    <!-- Newsletter Start -->
    <div class="newsletter-section">
        <div class="newsletter-left" style="background-image: url(assets/images/newsletter-bg-1.jpg)">
            <!-- Newsletter Wrapper Start -->
            <div class="newsletter-wrapper text-center">
                <h4 class="newsletter-wrapper__title">Follow us on</h4>
              

                <div class="newsletter-social">
                    <ul class="newsletter-social__list">
                        <li>
                            <a href="https://facebook.com" target="_blank"  aria-label="facebook">
                                <i class="lastudioicon-b-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com" target="_blank"  aria-label="twitter">
                                <i class="lastudioicon-b-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com" target="_blank"  aria-label="instagram">
                                <i class="lastudioicon-b-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://vimeo.com" target="_blank"  aria-label="vimeo">
                                <i class="lastudioicon-b-vimeo"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://envato.com" target="_blank"  aria-label="envato">
                                <i class="lastudioicon-envato"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Newsletter Wrapper End -->
        </div>
        <div class="newsletter-right" style="background-image: url(assets/images/newsletter-bg-2.jpg)">
            <!-- Newsletter Wrapper Start -->
            <div class="newsletter-wrapper text-center">
                <h4 class="newsletter-wrapper__title">10% off when you sign up</h4>
                <p>
                    Our online nursery is accessible 24/7, allowing
                    you to
                    shop whenever it's convenient for you. Whether you're an early bird or a night owl, we're always
                    open.
                </p>
            </div>
            <!-- Newsletter Wrapper End -->
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Newsletter End -->
</main>

<?php
include("./components/footer.php");
?>