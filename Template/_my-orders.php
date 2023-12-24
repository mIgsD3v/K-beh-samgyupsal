<!-- Top Sale -->
<?php
require_once("database/DBController.php");
$db = new DBController();
 
?>

<!--  Datatables  -->


<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">My Orders</h4>
        <hr>
        <table id="example" class="table table-striped table-hover rounded shadow">
            <thead>
                <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Contact No.</th>
                    <th scope="col">Customer Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $user_id=$_SESSION["clientid"];
                    $orderQuery = "SELECT * FROM order_info WHERE user_id=$user_id ORDER BY created_at DESC";
                    $result = $db->con->query($orderQuery);
                    $orders = $result->fetch_all(MYSQLI_ASSOC);

                    foreach($orders as $order) {
                        (float)$totalPrice = 0;
                        $order_info_id = $order['order_info_id'];

                        $orderListsQuery = "
                        SELECT * 
                        FROM order_list 
                        LEFT JOIN product 
                        ON order_list.item_id = product.item_id 
                        WHERE order_list.order_info_id='$order_info_id'
                        ";
                        $orderListsResult = $db->con->query($orderListsQuery);
                        $orderLists = $orderListsResult->fetch_all(MYSQLI_ASSOC);

                        foreach ($orderLists as $orderList) {
                            $totalPrice += $orderList["item_quantity"] * $orderList["item_price"];
                        }
                        ?>
                    <tr>
                        <td><?php echo $order["customer_name"]?></td>
                        <td><?php echo $order["customer_contact"]?></td>
                        <td><?php echo $order["customer_address"]?></td>
                        <td><?php echo $order["order_info_status"] ?></td>
                        <td>
                            ₱<?php echo $totalPrice?>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning mb-1 w-100" data-toggle="modal" data-target="#view<?php echo $order["order_info_id"]?>Modal" data-bs-toggle="modal" data-bs-target="#view<?php echo $order["order_info_id"]?>Modal">
                                <i class="bi bi-eye pe-2"></i>View Order List
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="view<?php echo $order["order_info_id"]?>Modal" tabindex="-1" aria-labelledby="view<?php echo $order["order_info_id"]?>ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="view<?php echo $order["order_info_id"]?>ModalLabel">View Order List</h5>
                                            <button type="button" class="close btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-hover rounded shadow">
                                                <thead>
                                                    <tr>
                                                        <td>Image</td>
                                                        <td>Name</td>
                                                        <td>Quantity</td>
                                                        <td>Total Price</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($orderLists as $orderList) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <img src="./assets/products/<?php echo $orderList["item_image"]?>" class="img-fluid rounded" style="max-width: 5rem">
                                                        </td>
                                                        <td><?php echo $orderList["item_name"]?></td>
                                                        <td><?php echo $orderList["item_quantity"]?></td>
                                                        <td>₱<?php echo $orderList["item_quantity"] * $orderList["item_price"]?></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div class="d-flex">
                                                <strong>TOTAL PRICE</strong>
                                                <strong class="ms-auto ml-auto">₱<?php echo number_format((float)$totalPrice, 2, '.', '') ?: 0; ?></strong>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>


