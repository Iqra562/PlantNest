<?php
include("./components/header.php");
?>

<main>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <h2 class="breadcrumb-wrapper__title">Cart Empty</h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Cart Empty</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="cart-section section-padding-2">
        <div class="container-fluid custom-container">
            <!-- Cart Empty Start -->
            <div class="cart-empty text-center">
                <img src="assets/images/cart-empty.svg" alt="Cart Empty" width="230" height="230" />
                <p>Your cart is currently empty.</p>

                <a href="allProducts.php" class="cart-empty__btn btn">Return to shop</a>
            </div>
            <!-- Cart Empty End -->
        </div>
    </div>
    <!-- Cart End -->
</main>

<?php
include("./components/footer.php");
?>