<?php
session_start();
include_once('models/config.php');
include_once("models/auth.php");

$con = mysqli_connect("localhost", "root", "", "plantnest");
?>

<?php
//php code start
$authModel = new Auth();
// $getUser = ;
?>

<?php
// signup
if (isset($_POST['signup'])) {
    if (empty($_POST['username'])) {
        redirectWindow('signup.php');
    }
    if (empty($_POST['fullname'])) {
        redirectWindow('signup.php');
    }
    if (empty($_POST['email'])) {
        redirectWindow('signup.php');
    }
    if (empty($_POST['password'])) {
        redirectWindow('signup.php');
    }
    if (empty($_POST['confirmpassword'])) {
        redirectWindow('signup.php');
    }
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    if ($password == $confirmPassword) {
        //checking if user already exists
        $user = $authModel->findUserWithEmail($email, $pdo);
        if ($user) {
            redirectWindow("signup.php?error=Email already exists");
        }

        $authModel->signup($username, $fullname, $email, $password, $pdo);
    } else {
        //   return;
        '<script>alert("not matched!")</script>';
    }
    $user = $authModel->findUserWithEmail($email, $pdo);

    if ($user) {
        $_SESSION['USERMain'] = $user;
        redirectWindow('login.php');
    } else {
        redirectWindow("signup.php?error=Something went wrong");
    }
}
?>

<!-- //signin -->
<?php
if (isset($_POST['login'])) {
    if (empty($_POST['email'])) {
        redirectWindow('login.php?error=email is required');
    }
    if (empty($_POST['password'])) {
        redirectWindow('login.php?error=password is required');
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $authModel->findUserWithEmail($email, $pdo);
    if (password_verify($password, $user[0]['userPassword'])) {
        $_SESSION['USER'] = $user;
        redirectWindow('index.php');
    } else {
        redirectWindow('login.php?error=invalid credentials');
    }
}

if (isset($_POST['edit'])) {
    $userID = $_POST['userID'];
    $userName = $_POST['username'];
    $fullName = $_POST['fullname'];
    $emailAddress = $_POST['email'];
    $authModel->update($userName, $fullName, $emailAddress, $userID, $pdo);
    redirectWindow('my-account.php');
}
;

if (isset($_POST['submit-review'])) {
    $userID = $_POST['userID'];
    $productID = $_POST['productID'];
    $review = $_POST['review'];
    // echo '<script>alert("' . $productID .$userID.$review. '")</script>';
    $authModel->submitReview($review, $productID, $userID, $pdo);
    redirectWindow('index.php');
}
;

//add to cart
if (isset($_POST['addToCartBtn'])) {
    if (isset($_SESSION['cartTwo'])) {
        $count = count($_SESSION['cartTwo']);
        // echo "<script>alert($count)</script>";

        $productId = array_column($_SESSION['cartTwo'], 'getId');
        if (in_array($_POST['productID'], $productId)) {
            echo "<script>alert('Product already exists in the cart')</script>";
        } else {
            $count = count($_SESSION['cartTwo']);
            $_SESSION['cartTwo'][$count] = array('getId' => $_POST['productID'], 'getName' => $_POST['productName'], 'getPrice' => $_POST['productPrice'], 'getDescription' => $_POST['productDescription'], 'getImage' => $_POST['productImage'], 'getQty' => $_POST['getQty']);
            echo "<script>alert('Product added into cart')
                location.assign('index.php');
                </script>";
        }
    } else {

        $_SESSION['cartTwo'][0] = array('getId' => $_POST['productID'], 'getName' => $_POST['productName'], 'getPrice' => $_POST['productPrice'], 'getDescription' => $_POST['productDescription'], 'getImage' => $_POST['productImage'], 'getQty' => $_POST['getQty']);
        echo "<script>alert('Product added into cart');
        location.assign('index.php');
        </script>";
    }
}
;
//remove from cart
if (isset($_GET['removeFromCart'])) {
    foreach ($_SESSION['cartTwo'] as $key => $value) {
        if ($_GET['removeFromCart'] == $value['getId']) {
            unset($_SESSION['cartTwo'][$key]);
            $_SESSION['cartTwo'] = array_values($_SESSION['cartTwo']);
            echo "<script>alert('Product successfully deleted from the cart')
        location.assign('cart.php');
        </script>";
        }
    }
}
;
//add to wishlist
if (isset($_GET['wishlist'])) {
    $getWishlistId = $_GET['wishlist'];
    $getUserIdForWishlist = $_GET['userId'];
    $authModel->addWishList($pdo, $getWishlistId, $getUserIdForWishlist);
    header('location:wishlist.php');
    // echo "<script>alert('Item added to wishlist')</script>";
    // echo "<script>alert('working')</script>";
}
;
if (isset($_GET['removeFromWishlist'])) {
    $deleteWishlistProduct = $_GET['removeFromWishlist'];
    // echo "<script>alert($deleteWishlistProduct)</script>";
    $query = $pdo->prepare("delete from wishlist where wishlistProductID = :removeProductFromWishlist");
    $query->bindParam("removeProductFromWishlist", $deleteWishlistProduct);
    $query->execute();
    echo "<script>alert('Item removed from wishlist')</script>";
}
if (isset($_POST['submitOrder'])) {
    $total_qty = 0;
    $grandTotalPrice = 0;
    $getUserId = $_POST['sessionUserID'];
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $userState = $_POST['userState'];
    $zipCode = $_POST['zipCode'];
    $billing_address = $_POST['billing_address'];
    $shipping_address = $_POST['shipping_address'];
    $payment_method = $_POST['payment_method'];
    $cvv = $_POST['cvv'];
    $card = $_POST['card'];
    $expiry = $_POST['expiry'];
    foreach ($_SESSION['cartTwo'] as $key => $value) {
        $id = $value['getId'];
        $total_qty += $value['getQty'];
        $qty = $value['getQty'];
        $totalAmount = $value['getQty'] * $value['getPrice'];
        $grandTotalPrice += $totalAmount;
        $query = $pdo->prepare('INSERT into orders(userID,productID,productQuantity,totalAmount) values(:userID,:productID, :productQuantity, :totalAmount)');
        $query->bindParam("userID", $getUserId);
        $query->bindParam("productID", $id);
        $query->bindParam("productQuantity", $qty);
        $query->bindParam("totalAmount", $totalAmount);
        $query->execute();
        echo "<script>alert('order added successfully');
            location.assign('index.php');
            </script>";
        unset($_SESSION['cartTwo']);
    }

    mysqli_query($con, "INSERT INTO final_order
        (user_id,fullName,phone,city,userState,zipCode,qty,total_price,payment_method, card_number, billing_address, shipping_address, expiry_date, cvv)
        VALUES
        ('$getUserId','$fullName','$phone','$city','$userState','$zipCode','$total_qty','$grandTotalPrice', '$payment_method', '$card', '$billing_address', '$shipping_address', '$expiry', '$cvv')");
}
;
if (isset($_POST['delete-review'])) {
    $reviewID = $_POST['reviewID'];
    $authModel->deleteReview($reviewID, $pdo);
}
;

if (isset($_POST['delete-account'])) {
    $deleteAccountID = $_POST['deleteID'];
    $authModel->deleteAccount($deleteAccountID, $pdo);
    echo '<script>alert("Your account has been deleted.")</script>';
    redirectWindow('logout.php');
}
if (isset($_GET['id'])) {
    $getCategoryID = $_GET['id'];
    $query = $pdo->prepare("Select * from products where categoryID = :categoryID");
    $query->bindParam("categoryID", $getCategoryID);
    $query->execute();
}