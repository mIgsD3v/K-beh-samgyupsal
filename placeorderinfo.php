<?php
// include header.php file


include ('header.php');

?>
    
<section id="cart" class="py-3 mb-5">
<div class="container-fluid w-75">
    <h5 class="font-baloo font-size-20">Place Order Summary</h5>

    <!--  shopping cart items   -->
    <div class="row">
        <div class="col-sm-9">
            <?php

$listOfAddOrderQuery = "SELECT * FROM `order_list` WHERE item_status='PLACE ORDER' AND user_id=? AND order_info_id=? ORDER BY item_id ASC"; // SQL with parameters
$executeOrder = $db->con->prepare($listOfAddOrderQuery); 
$executeOrder->bind_param("ss",$_SESSION["clientid"],$_GET["orderInfo"]); // string
$executeOrder->execute();
$result = $executeOrder->get_result(); // get the mysqli result
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
                    <!-- product rating -->
                    <div class="d-flex">
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                    </div>
                    <!--  !product rating-->

                    <!-- product qty -->
                    <div class="qty d-flex pt-2">
                        <div class="d-flex font-rale w-25">
                            
                           
                        </div>
                     


                    </div>
                    <!-- !product qty -->

                </div>

                <div class="col-sm-2 text-right">
                    <div class="font-size-20 text-danger font-baloo">
                    ₱<span class="product_price" data-id="<?php echo $rowGETINFO['item_id'] ?: '0'; ?>"><?php echo $rowGETINFO['item_price'] ?: 0; ?></span>
                    </div>
                </div>
            </div>
            <!-- !cart item -->

            
            <?php
                    }
                }
            }
            ?>
        </div>
        <!-- subtotal section-->
        <div class="col-sm-3">
           
            <div class="text-center">
               <a href="cart.php" class="btn btn-info mt-3">View Order</a>
               <a href="index.php" class="btn btn-success mt-3">Order Again</a>
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


