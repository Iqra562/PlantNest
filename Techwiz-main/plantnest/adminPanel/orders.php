<?php
include_once('header_admin.php');

?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <!-- table of each products of every customer -->
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Orders By Product</h4>


                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <td>User Name</td>
                                    <td>Product Name</td>
                                    <td>Quantity</td>
                                    <td>Amount</td>
                                    <td>Date</td>
                                    <td> </td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $query = $pdo->query("SELECT * FROM orders INNER JOIN users ON orders.userID = users.userID INNER JOIN  products ON orders.productID =products.productID;");
                                $result = $query->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($result as $row) {
                                    ?>
                                    <tr class="tr-row">
                                        <th scope="row">
                                            <?php echo $row['orderID'] ?>
                                        </th>

                                        <td>
                                            <?php echo ucfirst($row['firstName']) ?>
                                            <?php echo ucfirst($row['lastName']) ?>
                                        </td>
                                        <td>
                                            <?php echo $row['productName'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['productQuantity'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['totalAmount'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date'] ?>
                                        </td>




                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<!--final  Orders  of every customers by total amount of products-->

<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Final Orders</h4>

                        <div class="d-flex">

                            <div class="dropdown d-flex align-self-center ">
                                <form method="post">
                                    <button class="btn bg-white text-dark dropdown-toggle p-2" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sort Orders
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><button class="dropdown-item" href="#" name="sort-order-by-name">Sort by
                                                user name</button></li>
                                        <li><button class="dropdown-item" href="#" name="sort-order-by-date">Sort by
                                                order date
                                            </button></li>

                                    </ul>
                                </form>
                            </div>


                        </div>
                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <td>User Name</td>
                                    <td>Total Products Quantity</td>
                                    <td>Total Amount</td>
                                    <td>Date</td>
                                    <td>Status </td>
                                    <td> </td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                // Check if the "Sort by  user name" button is clicked
                                if (isset($_POST['sort-order-by-name'])) {
                                    $query = $pdo->query("SELECT * FROM final_order INNER JOIN users ON final_order.user_id = users.userID  where orderStatus = 'pending' OR orderStatus = 'approved'; ORDER BY users.firstName ;");
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                } else if (isset($_POST['sort-order-by-date'])) {
                                    // Check if the "Sort by  user name" button is clicked
                                    $query = $pdo->query("SELECT * FROM final_order INNER JOIN users ON final_order.user_id = users.userID  where orderStatus = 'pending' OR orderStatus = 'approved' ORDER BY final_order.date_of_order;");
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                } else {
                                    // By default, get data without sorting
                                    $query = $pdo->query("SELECT users.*,final_order.*
    FROM users 
    INNER JOIN final_order ON final_order.user_id = users.userID where orderStatus = 'pending' OR orderStatus = 'approved';");
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                }
                                foreach ($result as $row) {
                                    ?>
                                    <tr class="tr-row">
                                        <th scope="row">
                                            <?php echo $row['order_id'] ?>
                                        </th>

                                        <td>
                                            <?php echo ucfirst($row['firstName']) ?>
                                            <?php echo ucfirst($row['lastName']) ?>
                                        </td>

                                        <td>
                                            <?php echo $row['qty'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['total_price'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date_of_order'] ?>
                                        </td>
                                        <?php
                                        if ($row['orderStatus'] === "pending") {
                                            ?>
                                            <td class="d-flex">
                                                <?php echo $row['orderStatus'] ?>
                                                <div class="mx-auto">
                                                    <i class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false"
                                                        id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false"></i>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="orderIDStatus"
                                                                value="<?php echo $row['order_id'] ?>">
                                                            <button class="dropdown-item" name="OrderApprove">Approve</button>
                                                            <button class="dropdown-item" name="OrdertReject">Reject</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td class="d-flex">
                                                <?php echo $row['orderStatus'] ?>

                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/script.js"></script>

<?php
include('footer.php');
?>