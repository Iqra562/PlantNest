<?php
include("./components/sessionHeader.php");
if (!isset($_SESSION['USER'])) {
    redirectWindow('login.php');
}
// if(isset($_POST['cancelOrder'])){
//     $
// }
?>
<style>
    .profile img {
        width: 18rem;
        height: 16rem;
        border-radius: 50%;
        margin-left: 3rem;
    }

    .profile {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .name {
        margin-left: 3rem !important;
    }

    #logoutButton {
        width: 20rem !important;
        height: 4rem;
    }

    #delete_btn {
        width: 20rem !important;
        height: 4rem;
        background-color: rgb(208, 60, 78) !important;
        border: none;
    }

    #logoutButton {
        cursor: pointer;
    }
</style>

</div>

<main>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <h2 class="breadcrumb-wrapper__title">My Account</h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="index.php">Home</a></li>
                    <li><span>My Account</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- My Account Start -->
    <div class="my-account-section section-padding-2">
        <div class="container-fluid custom-container">
            <!-- My Account Tabs Start -->
            <div class="my-account-tab">
                <!-- My Account Tabs Menu Start -->
                <div class="my-account-tab__menu">
                    <ul class="nav justify-content-center">
                        <li>
                            <button class="account-btn active" data-bs-toggle="tab" data-bs-target="#dashboard"
                                type="button">
                                Profile
                            </button>
                        </li>
                        <li>
                            <button class="account-btn" data-bs-toggle="tab" data-bs-target="#orders" type="button">
                                Orders
                            </button>
                        </li>
                        <li>
                            <button class="account-btn" data-bs-toggle="tab" data-bs-target="#delete-account"
                                type="button">
                                Delete Your Account
                            </button>
                        </li>
                        <li>
                            <button class="account-btn" data-bs-toggle="tab" data-bs-target="#logout" type="button">
                                Logout
                            </button>
                        </li>
                    </ul>
                </div>
                <!-- My Account Tabs Menu End -->

                <div class="tab-content">

                    <!-- account update section start -->
                    <div class="tab-pane fade show active" id="dashboard">
                        <!-- My Account Dashboard Start -->
                        <?php
                        $user = $_SESSION['USER'];
                        // print_r($user);
                        foreach ($user as $item) {
                            $userID = $item['userID'];
                            // echo '<script>alert("'.$userID.'")</script>';
                        }
                        $query = $pdo->prepare('select * from users where userID = :id');
                        $query->bindParam('id', $userID);
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $value) {
                            $userName = $value['firstName'];
                            $lastName = $value['lastName'];
                            $emailAddress = $value['userEmail'];
                        }
                        ?>
                         <div class="my-account-dashboard">
                            <form action="#" method='post'>
                                <div class="container mt-3">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="userID" value="<?php echo $userID ?>">
                                            <div class="single-form">
                                                <label class="single-form__label">First Nname *</label>
                                                <input class="single-form__input" type="text" name="username"
                                                    value="<?php echo $userName ?>" />

                                                <!-- Single Form Start -->
                                            </div>
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <label class="single-form__label">Last Name *</label>
                                                <input class="single-form__input" type="text" name="fullname"
                                                    value="<?php echo $lastName ?>" />
                                            </div>

                                            <div class="single-form">
                                                <label class="single-form__label">Email Address *</label>
                                                <input class="single-form__input" type="text" name="email"
                                                    value="<?php echo $emailAddress ?>" />

                                                <!-- Single Form Start -->
                                            </div>
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <button class="single-form__btn btn" name="edit">
                                                    Save Change
                                                </button>
                                            </div>

                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--  update account section end -->
                    <!-- orders section start -->
                    <div class="tab-pane fade" id="orders">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <h4 class="h4 mb-3">Orders Details</h4>
                                    <?php
                                    $query = $pdo->prepare("SELECT * FROM `final_order` WHERE user_id = :userID order by final_order.date_of_order desc limit 1;");
                                    $query->bindParam(":userID", $userID);
                                    $query->execute();
                                    $getOrders = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($getOrders as $singleOrder) {
                                      $getOrderID = $singleOrder['order_id'];
                                      echo '<script>alert("' . $getOrderID . '")</script>';
                                ?>
                               
                                        <div class="single-form">
                                            <div class="col-md-12 mt-4">
                                                <h4 class="contact-info-item__title">
                                                    Order #
                                                    <?php echo $singleOrder['order_id'] ?> :
                                                </h4>
                                                <?php    
                                }
                                    // echo '<script>alert("' . $getOrderID . '")</script>';
                                    ?>
                                                <!-- <ul> -->
                                                <table class="table-responsive bg- table">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Items</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $queryToGetItems = $pdo->prepare("SELECT * FROM orders INNER JOIN final_order ON orders.date = final_order.date_of_order INNER JOIN Products ON orders.productID = products.productID WHERE orders.userID = :userID  AND final_order.orderStatus = 'pending' AND orders.date=final_order.date_of_order order by final_order.date_of_order desc limit 1");
                                                        $queryToGetItems->bindParam(":userID", $userID);
                                                        $queryToGetItems->execute();
                                                        // echo '<script>alert("' . $userID . '")</script>';
                                                        $orderItems = $queryToGetItems->fetchAll(PDO::FETCH_ASSOC);
                                                        $itemCount = 1;
                                                            // echo "<script>alert('".$singleItem['productName']."')</script>";
                                                            foreach ($orderItems as $singleItem) {
                                                                ?>
                                                                <tr>
                                                                <td>
                                                                    <?php echo $itemCount ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleItem['productName'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleItem['productQuantity'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleItem['totalAmount'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $singleItem['total_price'] ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $itemCount++;
                                                        }
                                                        ?>
                                                            </tbody>
                                                       
                                                       
                                                </table>
                                                <!-- </ul> -->
                                                <div class="contact-info-item__service mt-4">
                                                </div>
                                                <?php
                                                // }
                                                // }
                                                ?>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <!-- orders section end -->

                <!-- account delete section start -->
                <div class="tab-pane fade my-4" id="delete-account">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <h5 class="h5 mb-3">Are you sure you want to Delete Your Account ?</h5>

                                <div class="single-form">
                                    <form action="" method="post">
                                        <?php
                                        $users = $_SESSION['USER'];
                                        foreach ($users as $user) {
                                            $userID = $user['userID'];
                                        }
                                        // echo '<script>alert("'.$userID.'")</script>';
                                        ?>
                                        <input type="hidden" name="deleteID" value="<?php echo $userID ?>" id="">

                                        <button class="single-form__btn btn" type="submit" name="delete-account"
                                            id='delete_btn'>
                                            <h4 class='h6'>Delete Account ?</h4>
                                        </button>

                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <!-- account delete section end -->

                <!-- logout section start -->

                <div class="tab-pane fade" id="logout">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <h5 class="h5 mb-3">Are you sure you want to sign out?</h5>

                                <div class="single-form">
                                    <a href="logout.php">
                                        <button class="single-form__btn btn" id='logoutButton'>
                                            <h4 class='h6'>Sign Out ?</h4>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <!-- logout section end  -->

            </div>
        </div>
    </div>
    <!-- My Account Tabs End -->
    </div>
    </div>
    <!-- My Account End -->


</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get a reference to the logout button
        const logoutButton = document.getElementById('logoutButton');

        // Attach a click event listener to the logout button
        logoutButton.addEventListener('click', function () {
            // Display a confirmation dialog
            const confirmed = window.confirm('Are you sure you want to Sign out?');

            // If the user confirms, log them out
            if (confirmed) {
                // Perform the logout action here, for example, redirect to 'logout.php'
                window.location.href = 'logout.php';
            }
        });
    });

</script>
<?php
include_once('components/footer.php')
    ?>
</body>

</html>