<?php
// include header.php file


include ('header.php');

?>
    
<section id="cart" class="py-3 mb-5">
<div class="container-fluid w-75">
    <h5 class="font-baloo font-size-20">Food Order</h5>

    <!--  shopping cart items   -->
    <div class="row">
        <div class="col-sm-9">
            <?php

$listOfAddOrderQuery = "SELECT * FROM `order_list` WHERE item_status='STORE ORDER' AND user_id=? ORDER BY item_id ASC"; // SQL with parameters
$executeOrder = $db->con->prepare($listOfAddOrderQuery); 
$executeOrder->bind_param("s",$_SESSION["clientid"]); // string
$executeOrder->execute();
$result = $executeOrder->get_result(); // get the mysqli result
$subTotalItems=0;
$subTotal=0;
if(mysqli_num_rows($result) > 0){
    while($row = $result->fetch_assoc()){
    $item_id = $row['item_id'];
    $GETINFO = "SELECT * FROM PRODUCT WHERE item_id='".$item_id."'";
    $resultGETINFO = $db->con->query($GETINFO);
    
    if($rowGETINFO = $resultGETINFO->fetch_assoc()){
        
            ?>
            <!-- cart item -->
            <div class="row border-top py-3 mt-3">
                <div class="col-sm-2">
                    <img src="<?php echo "./assets/products/".$rowGETINFO['item_image'] ?: "./assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                </div>
                <div class="col-sm-8">
                    <h5 class="font-baloo font-size-20"><?php echo $rowGETINFO['item_name'] ?: "Unknown"; ?></h5>
                    <small>by <?php echo $rowGETINFO['item_brand'] ?: "Brand"; ?></small>
             

                    <!-- product qty -->
                    <div class="qty d-flex pt-2">
                        <div class="d-flex font-rale w-25">
                            <a 
                                href="actions/cart/changeQuantity.php?modifier=add&value=1&added_order_id=<?php echo $row['added_order_id']?>&old_value=<?php echo $row['item_quantity']?>"
                                class="btn qty-up border bg-light"
                                data-id="<?php echo $rowGETINFO['item_id'] ?: '0'; ?>"
                            >
                                <i class="fas fa-angle-up"></i>
                            </a>
                            <input type="text" data-id="<?php echo $rowGETINFO['item_id'] ?: '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="<?php echo $row['item_quantity']?>" placeholder="1">
                            <a 
                                href="actions/cart/changeQuantity.php?modifier=remove&value=1&added_order_id=<?php echo $row['added_order_id']?>&old_value=<?php echo $row['item_quantity']?>"
                                class="btn qty-up border bg-light"
                                data-id="<?php echo $rowGETINFO['item_id'] ?: '0'; ?>"
                            >
                                <i class="fas fa-angle-down"></i>
                            </a>
                        </div>

                        <form method="post" action="actions/cancelledOrder.php">
                            <input type="hidden" value="<?php echo $rowGETINFO['item_id'] ?: 0; ?>" name="item_id">
                            <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                        </form>
                    </div>
                    <!-- !product qty -->

                </div>

                <div class="col-sm-2 text-right">
                    <div class="font-size-20 text-danger font-baloo">
                    &#8369 <span class="product_price" data-id="<?php echo $rowGETINFO['item_id'] ?: '0'; ?>"><?php echo number_format((float)$rowGETINFO['item_price'] * $row['item_quantity'], 2, '.', '') ?: 0; ?></span>
                    </div>
                </div>
            </div>
            <!-- !cart item -->
            <?php
                $subTotalItems += $row['item_quantity'];
                $subTotal += $rowGETINFO['item_price'] * $row['item_quantity'];
                    }
                }
            }
            ?>
        </div>
        <!-- subtotal section-->
        
        <div class="col-sm-3">
            <div class="sub-total border text-center mt-2">
                <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Before placing your order, Ensure a firm decision to proceed before placing your order.</h6>
                <div class="border-top py-4">
                <h5 class="font-baloo font-size-20">
                    Subtotal ( <?php echo isset($subTotalItems) ? $subTotalItems : 0; ?> items):
                    &nbsp;
                    <div class="text-danger">
                        &#8369
                        <?php echo isset($subTotal) ? $subTotal : 0; ?>
                    </div>
                </h5>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Place Order</button>
                </div>
            </div>
            <div class="text-center">
               <a href="myorders.php" class="btn btn-info mt-3">View Place Order</a>
               <a href="index.php" class="btn btn-success mt-3">Order Again</a>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Shipping Information</h4>
                    </div>
                    <form name="myForm" method="post" action="actions/placeOrder.php" onsubmit="return validateForm()">
                        <div class="modal-body">
                    
                            <input type="hidden" value="<?php echo $rowGETINFO['item_id'] ?: 0; ?>" name="item_id">
                            <div class="form-group">
                                <label for="usr">Receipent Name:</label>
                                <input type="text" id="name"class="form-control" name="customerName">
                                <span id="nameErr" style="color:rgb(235, 16, 16);position:absolute;margin-top:5px;"></span>
                            </div>
                            <div class="form-group">
                                <label for="pwd" style="margin-top:5px;">ReceipentContact No.:</label>
                                <input type="text" id="contact"class="form-control" name="customerNo">
                                <span id="contactErr" style="color:rgb(235, 16, 16);position:absolute;margin-top:5px;"></span>
                            </div>
                            <div class="form-group">
                                <label for="pwd" style="margin-top:5px;">Receipent Address :</label>
                                <input type="text" id="address" class="form-control" name="customerAddress">
                                <span id="addressErr" style="color:rgb(235, 16, 16);position:absolute;margin-top:5px;"></span>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info mt-3">Proceed</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>

                </div>
                </div>


        <!-- !subtotal section-->
    </div>
    <!--  !shopping cart items   -->
</div>
</section>
<!-- !Shopping cart section  -->
  


<?php
// include footer.php file

  /*  include cart items if it is not empty */

        /*  include top sale section */
       // count($product->getData('wishlist')) ? include ('Template/_wishilist_template.php') :  include ('Template/notFound/_wishlist_notFound.php');
        /*  include top sale section */


    /*  include top sale section */
      //  include ('Template/_new-phones.php');
    /*  include top sale section */



include ('footer.php');

?>


