
<?php
include_once('header_admin.php');

?>


        

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-start p-5">
                       <a href="users.php">     <i class="fa fa-users fa-3x text-primary"></i></a>
                            <div class="ms-4">
                                <p class="mb-2">Total Users</p>
                                <h6 class="mb-0"><?php
                                   $query = $pdo->query("SELECT COUNT(*) as UserCount FROM users ");
                                   $result = $query->fetch(PDO::FETCH_ASSOC);
                                   $userCount =$result[ 'UserCount'];
                                   echo $userCount
                                ?></h6>
                    

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-start p-5">
                            <a href="category.php">
                            <i class="fa fa-cubes fa-3x text-primary"></i>
                            </a>
                            <div class="ms-4">
                                <p class="mb-2">Categories</p>
                                <h6 class="mb-0"><?php
                                   $query = $pdo->query("SELECT COUNT(*) as categories  FROM categories ");
                                   $result = $query->fetch(PDO::FETCH_ASSOC);
                                   $categories =$result[ 'categories'];
                                   echo $categories 
                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-start p-5">
                            <a href="products.php">
                            <i class="fa fa-leaf fa-3x text-primary"></i>
                            </a>
                            <div class="ms-4">
                                <p class="mb-2">Products</p>
                                <h6 class="mb-0"><?php
                                   $query = $pdo->query("SELECT COUNT(*) as products  FROM products ");
                                   $result = $query->fetch(PDO::FETCH_ASSOC);
                                   $products =$result[ 'products'];
                                   echo $products ;
                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-start p-5">
                            <a href="orders.php">

                                <i class="fa fa-shopping-basket fa-3x text-primary"></i>
                            </a>
                            <div class="ms-4">
                                <p class="mb-2">Orders</p>
                                <h6 class="mb-0"><?php
                                   $query = $pdo->query("SELECT COUNT(*) as orders  FROM final_order ");
                                   $result = $query->fetch(PDO::FETCH_ASSOC);
                                   $orders =$result[ 'orders'];
                                   echo $orders ;
                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-start p-5">
                            <a href="reviews.php">

                                <i class="fa fa-star fa-3x text-primary"></i>
                            </a>
                            <div class="ms-4">
                                <p class="mb-2">Reviews</p>
                                <h6 class="mb-0"><?php
                                   $query = $pdo->query("SELECT COUNT(*) as reviews  FROM productreviews ");
                                   $result = $query->fetch(PDO::FETCH_ASSOC);
                                   $reviews =$result[ 'reviews'];
                                   echo $reviews ;
                                ?></h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-start p-5">
                            <a href="feedback.php">

                                <i class="fa fa-comment fa-3x text-primary"></i>
                            </a>
                            <div class="ms-4">
                                <p class="mb-2">Feedback</p>
                                <h6 class="mb-0"><?php
                                   $query = $pdo->query("SELECT COUNT(*) as feedback  FROM feedback ");
                                   $result = $query->fetch(PDO::FETCH_ASSOC);
                                   $feedback =$result[ 'feedback'];
                                   echo $feedback ;
                                ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


           

        
      
<?php
include('footer.php');
?>